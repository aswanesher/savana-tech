<?php
class Kategoribarang extends BaseModel  {
	
	protected $table = 'tb_kategori_barang';
	protected $primaryKey = 'id_kategori';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		
		return "  SELECT tb_kategori_barang.* FROM tb_kategori_barang  ";
	}
	public static function queryWhere(  ){
		
		return " WHERE tb_kategori_barang.id_kategori IS NOT NULL   ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
