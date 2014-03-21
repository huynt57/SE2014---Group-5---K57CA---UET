<?php

Yii::import('application.controllers.BaseController');

class ShareController extends BaseController {

    public function actionIndex() {
        $this->actionShare();
    }

    public function actionShare() {
        
        $this->render('share');
    }
    
    public function actionSideBarLeft(){
        $subCriterial = new CDbCriteria();
        $subCriterial->select = "*";
        $subCriterial->order = "year_id ASC";
        
        $this->render('side_bar_left', array('year' => Subject::model()->findAll($subCriterial)));
    }


    public function actionTeacher() {
        $this->render('teacher');
    }

    public function actionViewSubject() {
        if(isset($_GET["subname"])){
            $subCriterial = new CDbCriteria();
            $subCriterial->select = "*";
            $subCriterial->condition = "subject_name = " .$_GET["subname"];
            $this->render('subject',array("subject"=> Subject::model()->findAll($subCriterial)));
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
