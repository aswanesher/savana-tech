<?php

class DashboardController extends \BaseController {

	public function index()
	{
			$data['allsp'] = DB::table('smartphones')
											->join('brands','brand_id','=','id_brand')
											->join('categories','category_id','=','id_category')
											->join('ostypes','ostype_id','=','id_ostype')
											->select('*')
											->paginate(7);
			$data['categories'] = Categories::all();
			$data['brands'] = Brands::all();
			$data['ostypes'] = Ostypes::all();

			return View::make('pages.data',$data);
	}
	public function getMerk()
	{
			$data['allsp'] = DB::table('brands')
											->select('*')
											->paginate(7);

			return View::make('pages.merk',$data);
	}
	public function addPage()
	{
			$data['categories'] = Categories::all();
			$data['brands'] = Brands::all();
			$data['ostypes'] = Ostypes::all();

			return View::make('pages.add',$data);
	}
	public function addMerk()
	{
			$data['categories'] = Categories::all();
			$data['brands'] = Brands::all();
			$data['ostypes'] = Ostypes::all();

			return View::make('pages.addmerk');
	}
	public function saveData()
	{
		if (Input::file('foto')) {
			$file = Input::file('foto');
			$filename = str_random(24).'-'.$file->getClientOriginalName();

			$path = 'assets/img/sp/';
			$file->move($path,$filename);
		}
		else
		{
			$filename = 'sp_default.png';
		}

		$smartphone = new Smartphones;

		$smartphone->category_id = Input::get('kategori');
		$smartphone->brand_id = Input::get('merk');
		$smartphone->ostype_id = Input::get('os');
		$smartphone->type = Input::get('nama');
		$smartphone->description = Input::get('deskripsi');
		$smartphone->image = $filename;
		$smartphone->price = Input::get('harga');

		$smartphone->save();
		return Redirect::to('/');
	}
	public function saveDataMerk()
	{
		$brands = new Brands;

		$brands->brand = Input::get('merk');

		$brands->save();
		return Redirect::to('/');
	}
	public function detailPage($id_sp)
	{
		$data['detailsp'] = DB::table('smartphones')
											->join('brands','brand_id','=','id_brand')
											->join('categories','category_id','=','id_category')
											->join('ostypes','ostype_id','=','id_ostype')
											->select('*')
											->where('id_smartphone','=',$id_sp)
											->get();

			return View::make('pages.detail',$data);
	}
	public function editPage($id_sp)
	{
		$data['getsp'] = DB::table('smartphones')
											->join('brands','brand_id','=','id_brand')
											->join('categories','category_id','=','id_category')
											->join('ostypes','ostype_id','=','id_ostype')
											->select('*')
											->where('id_smartphone','=',$id_sp)
											->get();
			$data['categories'] = Categories::all();
			$data['brands'] = Brands::all();
			$data['ostypes'] = Ostypes::all();

			return View::make('pages.edit',$data);
	}
	public function editData()
	{
		$smartphone = Smartphones::find(Input::get('id'));

		if (Input::file('foto')) {
			$file = Input::file('foto');
			$filename = str_random(24).'-'.$file->getClientOriginalName();

			$path = 'assets/img/sp/';
			$file->move($path,$filename);

			$smartphone->category_id = Input::get('kategori');
			$smartphone->brand_id = Input::get('merk');
			$smartphone->ostype_id = Input::get('os');
			$smartphone->type = Input::get('nama');
			$smartphone->description = Input::get('deskripsi');
			$smartphone->image = $filename;
			$smartphone->price = Input::get('harga');

		}
		else
		{
			$smartphone->category_id = Input::get('kategori');
			$smartphone->brand_id = Input::get('merk');
			$smartphone->ostype_id = Input::get('os');
			$smartphone->type = Input::get('nama');
			$smartphone->description = Input::get('deskripsi');
			$smartphone->price = Input::get('harga');
		}
		$smartphone->save();
		return Redirect::intended('dashboard');
	}
	public function deleteData($id_sp)
	{
		DB::table('smartphones')
					->where('id_smartphone','=',$id_sp)
					->delete();
		return Redirect::to('/');
	}
	public function searchPage()
	{
		$param['category_id'] = Input::get('kategori');
		$param['brand_id'] = Input::get('merk');
		$param['ostype_id'] = Input::get('os');
		$param['type'] = Input::get('nama');
		$param['price'] = Input::get('harga');

		$data['allsp'] = DB::table('smartphones')
					->join('brands','brand_id','=','id_brand')
					->join('categories','category_id','=','id_category')
					->join('ostypes','ostype_id','=','id_ostype')
					->select('*')
					->where('type','LIKE','%'.$param['type'].'%')
					->orWhere('category_id','=',''.$param['category_id'].'')
					->orWhere('brand_id','=',''.$param['brand_id'].'')
					->orWhere('ostype_id','=',''.$param['ostype_id'].'')
					->paginate(10);
		$data['categories'] = Categories::all();
		$data['brands'] = Brands::all();
		$data['ostypes'] = Ostypes::all();

		return View::make('pages.data',$data);
		
	}
}
