<?php

class ShareController extends Controller {

    public function actionIndex() {
        $this->actionShare();
    }

    public function actionShare() {
        $yeaCriterial = new CDbCriteria();
        $yeaCriterial->select = "*";
        $yeaCriterial->order = "year_id ASC";
        $this->render('share');
        }

    public function actionSideBarLeft(){
//        $subject = Yii::app()->db->createCommand()
//        ->select('*')
//        ->from('tbl_subject')
//        ->join('tbl_relation_faculty_subject', 'tbl_subject.subject_id = tbl_relation_faculty_subject.subject_id')
//        ->queryAll();
       
        $this->renderPartial("partial/side_bar_left"/*, array('year'=>  $subject)*/);
    }


    public function actionTeacher(){
        $this->render('teacher');
    }
    
    public function actionSubject(){
        $this->render('subject');
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
