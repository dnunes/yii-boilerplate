<?php

final class Helpers {
	static public function gCookie($n) {
		return (isset(Yii::app()->request->cookies[$n])) ?
			Yii::app()->request->cookies[$n]->value : false;
	}
	static public function sCookie($n, $v, $opts = null) {
		Yii::app()->request->cookies[$n] = new CHttpCookie($n, $v, $opts);
	}


	static private function getSearchTranslations() {
		return array(
			//acentos e caracteres malucos em geral
			'À'=>'A','Á'=>'A','Â'=>'A','Ã'=>'A','Ä'=>'A','Å'=>'A','Ç'=>'C','È'=>'C',
			'É'=>'E','Ê'=>'C','Ë'=>'E','Ì'=>'C','Í'=>'I','Î'=>'C','Ï'=>'I','Ð'=>'D',
			'Ñ'=>'N','Ò'=>'O','Ó'=>'O','Ô'=>'O','Õ'=>'O','Ö'=>'O','Ø'=>'O','Ù'=>'U',
			'Ú'=>'U','Û'=>'U','Ü'=>'U','Ý'=>'Y','ß'=>'s','à'=>'a','á'=>'a','â'=>'a',
			'ã'=>'a','ä'=>'a','å'=>'a','ç'=>'c','è'=>'e','é'=>'e','ê'=>'e','ë'=>'e',
			'ì'=>'i','í'=>'i','î'=>'i','ï'=>'i','ñ'=>'n','ò'=>'o','ó'=>'o','ô'=>'o',
			'õ'=>'o','ö'=>'o','ø'=>'o','ù'=>'u','ú'=>'u','û'=>'u','ü'=>'u','ý'=>'y',
			'ÿ'=>'y','Ā'=>'A','ā'=>'a','Ă'=>'A','ă'=>'a','Ą'=>'A','ą'=>'a','Ć'=>'C',
			'ć'=>'c','Ĉ'=>'C','ĉ'=>'c','Ċ'=>'C','ċ'=>'c','Č'=>'C','č'=>'c','Ď'=>'D',
			'ď'=>'d','Đ'=>'D','đ'=>'d','Ē'=>'E','ē'=>'e','Ĕ'=>'E','ĕ'=>'e','Ė'=>'E',
			'ė'=>'e','Ę'=>'E','ę'=>'e','Ě'=>'E','ě'=>'e','Ĝ'=>'G','ĝ'=>'g','Ğ'=>'G',
			'ğ'=>'g','Ġ'=>'G','ġ'=>'g','Ģ'=>'G','ģ'=>'g','Ĥ'=>'H','ĥ'=>'h','Ħ'=>'H',
			'ħ'=>'h','Ĩ'=>'I','ĩ'=>'i','Ī'=>'I','ī'=>'i','Ĭ'=>'I','ĭ'=>'i','Į'=>'I',
			'į'=>'i','İ'=>'I','ı'=>'i','Ĵ'=>'J','ĵ'=>'j','Ķ'=>'K','ķ'=>'k','Ĺ'=>'L',
			'ĺ'=>'l','Ļ'=>'L','ļ'=>'l','Ľ'=>'L','ľ'=>'l','Ŀ'=>'L','ŀ'=>'l','Ł'=>'l',
			'ł'=>'l','Ń'=>'N','ń'=>'n','Ņ'=>'N','ņ'=>'n','Ň'=>'N','ň'=>'n','ŉ'=>'n',
			'Ō'=>'O','ō'=>'o','Ŏ'=>'O','ŏ'=>'o','Ő'=>'O','ő'=>'o','Ŕ'=>'R','ŕ'=>'r',
			'Ŗ'=>'R','ŗ'=>'r','Ř'=>'R','ř'=>'r','Ś'=>'S','ś'=>'s','Ŝ'=>'S','ŝ'=>'s',
			'Ş'=>'S','ş'=>'s','Š'=>'S','š'=>'s','Ţ'=>'T','ţ'=>'t','Ť'=>'T','ť'=>'t',
			'Ŧ'=>'T','ŧ'=>'t','Ũ'=>'U','ũ'=>'u','Ū'=>'U','ū'=>'u','Ŭ'=>'U','ŭ'=>'u',
			'Ů'=>'U','ů'=>'u','Ű'=>'U','ű'=>'u','Ų'=>'U','ų'=>'u','Ŵ'=>'W','ŵ'=>'w',
			'Ŷ'=>'Y','ŷ'=>'y','Ÿ'=>'Y','Ź'=>'Z','ź'=>'z','Ż'=>'Z','ż'=>'z','Ž'=>'Z',
			'ž'=>'z','ſ'=>'s','ƒ'=>'f','Ơ'=>'O','ơ'=>'o','Ư'=>'U','ư'=>'u','Ǎ'=>'A',
			'ǎ'=>'a','Ǐ'=>'I','ǐ'=>'i','Ǒ'=>'O','ǒ'=>'o','Ǔ'=>'U','ǔ'=>'u','Ǖ'=>'U',
			'ǖ'=>'u','Ǘ'=>'U','ǘ'=>'u','Ǚ'=>'U','ǚ'=>'u','Ǜ'=>'U','ǜ'=>'u','Ǻ'=>'A',
			'ǻ'=>'a','Ǿ'=>'O','ǿ'=>'o', 'Æ'=>'AE','æ'=>'ae','Ĳ'=>'IJ','ĳ'=>'ij'
		);
	}
	static public function toSearch($str) {
		$translations = Helpers::getSearchTranslations();
		$str = strtr($str, $translations);
		$str = strtolower($str);

		$str = preg_replace('/[^a-z0-9, ]+/', ' ', $str);
		$str = preg_replace('/([a-z ])\1+/', '$1', $str);
		return trim($str);
	}

	static public function saveToSession($n, $v) {
		Yii::app()->session[$n] = $v; return $v;
	}
	static public function getFromSession($v) {
		return (isset(Yii::app()->session[$v])) ?
			Yii::app()->session[$v] : false;
	}
	static public function saveToCache($n, $v) { Yii::app()->session[$n] = $v;
		Yii::app()->session[$n .'_cachetime'] = time(); return $v;
	}
	static public function getFromCache($n, $expireTime = 5) {
		$r = Helpers::getFromSession($n);
		return (!$r || Helpers::isCacheExpired($n .'_cachetime', $expireTime)) ?
			false : $r;
	}
	static public function killSession($n = false) {
		if (!$n) { $_SESSION = array(); session_destroy(); } //whole session
		else { unset($_SESSION[$n]); } //specific var
	}
	static public function isCacheExpired($cacheName, $expireTime = 5) {
		$old = Helpers::getFromSession($cacheName);
		$diff = time() -$old; $limit = $expireTime * 60;
		return $diff > $limit;
	}


	static public function Ex($code, $msg) {
		throw new Exception('Erro código '. $code .'. Descrição: '. $msg);
	}
}
