<?php

class AboutUsController extends Controller {

    public function actionIndex() {
        $this->actionAboutUs();
    }

    public function actionAboutUs() {
        $this->render('aboutUs');
    }

}
