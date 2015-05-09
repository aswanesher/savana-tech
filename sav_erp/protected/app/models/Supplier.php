<?php
class Supplier extends BaseModel  {
	
	protected $table = 'tb_supplier';
	protected $primaryKey = 'id_supplier';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT tb_supplier.* FROM tb_supplier  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE tb_supplier.id_supplier IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
