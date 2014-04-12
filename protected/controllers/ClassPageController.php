<?php

class ClassPageController extends Controller {

    public function actionIndex() {
        $this->actionClassPage();
    }

    public function actionClassPage() {
        $this->render('classpage');
    }

}
