<?php

class SearchController extends BaseController {

	public function postReservation()
	{
		$orig 	= Request::input('orig');
		$dest 	= Request::input('dest');
		$adult 	= Request::input('adult');
		$child 	= Request::input('child');
		
		$convertDateIn 		= explode('/', Request::input('flight_date'));
		$convertDatereturn 	= explode('/', Request::input('return_date'));
		
		$dateIn				= $convertDateIn[0].$convertDateIn[1].$convertDateIn[2];
		$dateReturn			= $convertDatereturn[0].$convertDatereturn[1].$convertDatereturn[2];
		
		//echo $dateIn;
		
		return Redirect::to('flightlist/'.$orig.'.'.$dest.'.'.$dateIn.'.'.$dateReturn.'.'.$adult.'.'.$child.'');
	}
	
	public function getReservation($str)
	{
		return View::make('flight_list');
	}

}
