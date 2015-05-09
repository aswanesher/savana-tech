<?php
class Customer extends BaseModel  {
	
	protected $table = 'customer';
	protected $primaryKey = 'CustomerId';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT customer.* FROM customer  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE customer.CustomerId IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
