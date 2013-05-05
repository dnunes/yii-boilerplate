<?php

class Object extends CActiveRecord {
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() { return 'tbl_name'; }
	//public function primaryKey() { return 'id'; }
}
