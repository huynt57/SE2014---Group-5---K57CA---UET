<?php

class DocumentController extends Controller {

    public function actionIndex() {
        $this->actionDocument();
    }

    public function actionDocument() {
//        $path = $this->actionUpload();
//        $scribd = new Scribd($api_key, $secret);
//        
//        $upload_res = $scribd->upload($path);
//        echo $upload_res;
                $path = $this->actionUpload();
        $this->render('document');
    }
    
    public function actionUpload() {
         //$ds = DIRECTORY_SEPARATOR;  //1
        $storeFolder = Yii::app()->basePath.'\uploads\u';   //2
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];          //3             
            $targetPath =  $storeFolder ;  //4
            $targetFile = $targetPath . $_FILES['file']['name'];  //5
            move_uploaded_file($tempFile, $targetFile); //6
        }
        
      //  return $targetFile;
        
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
