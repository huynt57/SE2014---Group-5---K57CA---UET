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
                    'user_name' => $_POST['username'],
                    'user_password' => $_POST['Password'],
                );

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
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }

        $this->render('Login');
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
