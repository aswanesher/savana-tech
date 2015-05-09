<?php
class Barang extends BaseModel  {
	
	protected $table = 'tb_barang';
	protected $primaryKey = 'id_brg';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT tb_barang.* FROM tb_barang  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE tb_barang.id_brg IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
