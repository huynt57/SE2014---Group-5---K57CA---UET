<?php

Yii::import('application.controllers.BaseController');

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
                            if (strcmp($user->user_password, md5($loginFormData['user_password']) == 0)) {
                                $this->retVal->message = "Đăng nhập thành công";
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
                                if (Validator::validateUsername($loginFormData['user_email'])) {
                                    if (Validator::validateUsername($loginFormData['user_password'])) {


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
                                                    $model->user_password - $loginFormData['user_password'];
                                                    $model->user_email = $loginFormData['user_email'];
                                                    $model->save(FALSE);
                                                    if ($model->save(FALSE)) {
                                                        $this->retVal->message = "Đăng ký thành công";
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
