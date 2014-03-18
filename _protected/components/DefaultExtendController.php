<?php

class DefaultExtendController extends CController {
	public $b; //URLs
	public $cfb;

	public function __construct($n) {
		parent::__construct($n); global $_CONFIG;
		$this->b = Yii::app()->getBaseUrl(true);
		if (!isset($_CONFIG['cookieFreeDomain'])) {
			$this->cfb = $this->b;
		} else { //Cookie-Free Domain :)
			$scriptURL = Yii::app()->getRequest()->getScriptUrl();
			$basePath = rtrim(dirname($scriptURL),'\\/');
			$this->cfb = '//'. $_CONFIG['cookieFreeDomain'] . $basePath;
		}
		$this->b = Yii::app()->getBaseUrl(true);
	}
}
