<?php

class Helpers {
	public static function gCookie($n) {
		return (isset(Yii::app()->request->cookies[$n]) ?
			Yii::app()->request->cookies[$n]->value : false;
	}
	public static function sCookie($n, $v, $opts = null) {
		Yii::app()->request->cookies[$n] = new CHttpCookie($n, $v, $opts);
	}
}
