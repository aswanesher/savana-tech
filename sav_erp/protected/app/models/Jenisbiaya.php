<?php
class Jenisbiaya extends BaseModel  {
	
	protected $table = 'tb_jenis_biaya';
	protected $primaryKey = 'id_jen_biaya';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT tb_jenis_biaya.* FROM tb_jenis_biaya  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE tb_jenis_biaya.id_jen_biaya IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
