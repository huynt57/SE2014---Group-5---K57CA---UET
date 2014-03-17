<?php

Yii::import('application.controllers.BaseController');
Yii::import('application.components.facebook');
Yii::import('application.components.base_facebook');

class LoginController extends BaseController {

    public function actionIndex() {
        $this->actionLogin();
    }

    public function actionLogin() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'user_name' => @$_POST['username'],
                    'user_password' => @$_POST['Password'],
                );
                if (!empty($loginFormData['user_name'])) {
                    if (!empty($loginFormData['user_password'])) {

                        $user = User::model()->findByAttributes(array('user_name' => $loginFormData['user_name']));
                        if ($user) {
                            //user existed, check password
                            if (strcmp($user->user_password, $loginFormData['user_password'] == 0)) {
                                $this->retVal->message = "Đăng nhập thành công";
                                //     Yii::app()->request->redirect('discussion');
                            } else {
                                //user not existed
                                $this->retVal->message = "Sai tên người dùng hoặc mật khẩu";
                            }
                        } else {
                            $this->retVal->message = "Ten nguoi dung chua dc dang ky";
                        }
                    } else {
                        $this->retVal->message = "Password không được để trống";
                    }
                } else {
                    $this->retVal->message = "User name không được để trống";
                }
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }

        $this->render('Login');
    }

    public function actionSignup() {
        $this->retVal = new stdClass();
        $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'user_name' => $_POST['contact_name'],
                    'user_password' => $_POST['Password'],
                    'user_email' => $_POST['contact_email'],
                );
                if (!empty($loginFormData['user_name'])) {
                    if (!empty($loginFormData['user_email'])) {
                        if (!empty($loginFormData['user_password'])) {
                            if (Validator::validateUsername($loginFormData['user_name'])) {
                                if (Validator::validateEmail($loginFormData['user_email'])) {
                                    if (Validator::validatePassword($loginFormData['user_password'])) {


                                        $user = User::model()->findByAttributes(array('user_name' => $loginFormData['user_name']));
                                        if ($user) {
                                            //user existed, check password
                                            $this->retVal->message = "Tên người dùng đã được đăng ký";
                                        } else {
                                            $user = User::model()->findByAttributes(array('user_email' => $loginFormData['user_email']));
                                            if ($user) {
                                                $this->retVal->message = "Email đã được đăng ký";
                                            } else {
                                                $model = new User;
                                                if ($model) {
                                                    $model->user_name = $loginFormData['user_name'];
                                                    $model->user_password = $loginFormData['user_password'];
                                                    $model->user_email = $loginFormData['user_email'];
                                                    $model->user_status = 1;
                                                    $model->save(FALSE);
                                                    if ($model->save(FALSE)) {
                                                        $this->retVal->message = "Đăng ký thành công, hãy đăng nhập bằng tài khoản của bạn";
                                                    } else {
                                                        $this->retVal->message = "Không thể lưu user";
                                                    }
                                                } else {
                                                    $this->retVal->message = "Không thể lưu user";
                                                }
                                            }
                                        }
                                    } else {
                                        $this->retVal->message = "password phải nhiều hơn 5 kí tự";
                                    }
                                } else {
                                    $this->retVal->message = "Sai định dạng email";
                                }
                            } else {
                                $this->retVal->message = "username không được có khoảng trắng và phải nhiều hơn 5 kí tự";
                            }
                        } else {
                            $this->retVal->message = "password không được để trống";
                        }
                    } else {
                        $this->retVal->message = "email không được để trống";
                    }
                } else {
                    $this->retVal->message = "username không được để trống";
                }
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }

        $this->render('login/signup');
    }

    public function actionloginFacebook() {
        $app_id = "1428478800723370";
        $app_secret = "64b21e0ab23ec7db82979f9607065704";
        $site_url = "bluebee-uet.com";
        
        $facebook = new Facebook(array(
            'appId' => $app_id,
            'secret' => $app_secret,
        ));

// Get User ID
        $user = $facebook->getUser();
// We may or may not have this data based
// on whether the user is logged in.
// If we have a $user id here, it means we know
// the user is logged into
// Facebook, but we don’t know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

        if ($user) {
//==================== Single query method ======================================
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $facebook->api('/me');
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = NULL;
            }
//==================== Single query method ends =================================
        }

        if ($user) {
            // Get logout URL
            $logoutUrl = $facebook->getLogoutUrl();
        } else {
            // Get login URL
            $loginUrl = $facebook->getLoginUrl(array(
                'scope' => 'read_stream, publish_stream, user_birthday, user_location, user_work_history, user_hometown, user_photos',
                'redirect_uri' => $site_url,
            ));
        }

        if ($user) {
            // Proceed knowing you have a logged in user who has a valid session.
//========= Batch requests over the Facebook Graph API using the PHP-SDK ========
            // Save your method calls into an array
            $queries = array(
                array('method' => 'GET', 'relative_url' => '/' . $user),
                array('method' => 'GET', 'relative_url' => '/' . $user . '/home?limit=50'),
                array('method' => 'GET', 'relative_url' => '/' . $user . '/friends'),
                array('method' => 'GET', 'relative_url' => '/' . $user . '/photos?limit=6'),
            );

            // POST your queries to the batch endpoint on the graph.
            try {
                $batchResponse = $facebook->api('?batch=' . json_encode($queries), 'POST');
            } catch (Exception $o) {
                error_log($o);
            }

            //Return values are indexed in order of the original array, content is in ['body'] as a JSON
            //string. Decode for use as a PHP array.
            $user_info = json_decode($batchResponse[0]['body'], TRUE);
            $feed = json_decode($batchResponse[1]['body'], TRUE);
            $friends_list = json_decode($batchResponse[2]['body'], TRUE);
            $photos = json_decode($batchResponse[3]['body'], TRUE);
////========= Batch requests over the Facebook Graph API using the PHP-SDK ends =====
//            // Update user's status using graph api
//            if (isset($_POST['publish'])) {
//                try {
//                    $publishStream = $facebook->api("/$user/feed", 'post', array(
//                        'message' => 'Check out 25 labs',
//                        'link' => 'http://25labs.com',
//                        'picture' => 'http://25labs.com/images/25-labs-160-160.jpg',
//                        'name' => '25 labs',
//                        'caption' => '25labs.com',
//                        'description' => 'A Technology Laboratory. Highly Recomented technology blog.',
//                    ));
//                } catch (FacebookApiException $e) {
//                    error_log($e);
//                }
//            }
//
//            // Update user's status using graph api
//            if (isset($_POST['status'])) {
//                try {
//                    $statusUpdate = $facebook->api("/$user/feed", 'post', array('message' => $_POST['status']));
//                } catch (FacebookApiException $e) {
//                    error_log($e);
//                }
//            }
        }
        $this->render('fb');
    }

// Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
