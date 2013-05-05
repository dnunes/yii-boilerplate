<?php

class MainController extends DefaultExtendController {
	public function __construct($name) {
		parent::__construct($name);
		$this->layout = "index";
	}

	public function actionIndex() {
		$this->render('index');
	}
}
