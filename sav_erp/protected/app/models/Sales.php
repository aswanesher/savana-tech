<?php
class Sales extends BaseModel  {
	
	protected $table = 'tb_sales';
	protected $primaryKey = 'id_sales';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT tb_sales.* FROM tb_sales  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE tb_sales.id_sales IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
