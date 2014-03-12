<?php

class DocumentController extends Controller {

    public function actionIndex() {
        $this->actionDocument();
    }

    public function actionDocument() {


        $this->render('document');
    }

    public function actionUpload() {
        //$ds = DIRECTORY_SEPARATOR;  //1
        $api_key = "6cqkf5gln6qa1ky5eu5wy";
        $secret = "sec-ga9jk2qgz0j0qn25io6k1igei";



        $scribd = new Scribd($api_key, $secret);

        $storeFolder = Yii::app()->basePath . '/uploads/';   //2


        $tempFile = $_FILES['file']['tmp_name'];          //3             
        $targetPath = $storeFolder;  //4
        $targetFile = $targetPath . $_FILES['file']['name'];  //5
        move_uploaded_file($tempFile, $targetFile); //6
        $upload_scribd = $scribd->upload($targetFile);
        var_dump($upload_scribd);
        $thumbnail_info = array('doc_id' => $upload_scribd["doc_id"],
            'method' => NULL,
            'session_key' => NULL,
            'my_user_id' => NULL,
            'width' => 400,
            'height' => 1000);
        $get_thumbnail = $scribd->postRequest('thumbnail.get', $thumbnail_info);
        var_dump($get_thumbnail);
        
       
         $request = Yii::app()->request;
        if ($request->isPostRequest && isset($_POST)) {
            try {
                $loginFormData = array(
                    'description' => @$_POST['description'],
                    'title' => @$_POST['title'],
                    
                );
                $doc_model = new Doc;
            } catch (exception $e) {
                $this->retVal->message = $e->getMessage();
            }
            echo CJSON::encode($this->retVal);
            Yii::app()->end();
        }
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
