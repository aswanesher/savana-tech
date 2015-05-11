<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Website Ota</title>
	{{ HTML::style('dist/css/bootstrap.css') }}
	{{ HTML::style('assets/css/custom.css') }}
	{{ HTML::style('examples/carousel/carousel.css') }}
	{{ HTML::style('assets/css/font-awesome.css') }}
	{{ HTML::style('css/fullscreen.css') }}
	{{ HTML::style('rs-plugin/css/settings.css') }}
	{{ HTML::style('assets/css/jquery-ui.css') }}
	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
	

	
	
  </head>
  <body id="top">
    @include('header')
    @include('banner')

	<!-- WRAP -->
	<div class="wrap cstyle03">
		
		<div class="container mt-130 z-index100">		
		  <div class="row">
			<div class="col-md-12">
				<div class="bs-example bs-example-tabs cstyle04">
				
					<ul class="nav nav-tabs" id="myTab">
						<li onclick="mySelectUpdate()" class="active"><a data-toggle="tab" href="#air2"><span class="flight"></span><span class="hidetext">Air</span>&nbsp;</a></li>
						<!--<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#hotel2"><span class="hotel"></span><span class="hidetext">Hotel</span>&nbsp;</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#car2"><span class="car"></span><span class="hidetext">Car</span>&nbsp;</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#vacations2"><span class="suitcase"></span><span class="hidetext">Vacations</span>&nbsp;</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#flighthotel2"><span class="flighthotel"></span><span class="hidetext">Flight + Hotel</span>&nbsp;</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#cruise2"><span class="cruise"></span><span class="hidetext">Cruise</span>&nbsp;</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#hotelcar2"><span class="hotelcar"></span><span class="hidetext">Hotel + Car</span>&nbsp;</a></li>
						<li onclick="mySelectUpdate()" class=""><a data-toggle="tab" href="#flighthotelcar2"><span class="flighthotelcar"></span><span class="hidetext">Flight + Hotel + Car</span>&nbsp;</a></li>-->
					</ul>
					
					<div class="tab-content2" id="myTabContent">
						<div id="air2" class="tab-pane fade active in">
							<?php echo Form::open(array('url' => '/search', 'method' => 'post'))?>
							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Flying from</b></span>
										<select class="form-control" name="orig">
										  <?php 
											 $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=W2&app=data&action=get_org";
											$jsonUrl = file_get_contents($url, False);
											$json_idr = json_decode($jsonUrl, true);
								
											echo "<option value=''>Origin</option>";
											foreach ($json_idr['origin'] as $myd) {
												echo "<option value='$myd[0]'>$myd[1] ($myd[0])</option>";
											}
										   ?>
											
										  </select>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>To</b></span>
										<select class="form-control" name="dest">
										<option value="">Destination</option>
										<?php 
										 $url = "http://ws.demo.awan.sqiva.com/?rqid=5EB9FE68-8915-11E0-BEA0-C9892766ECF2&airline_code=W2&app=data&action=get_des";
										$jsonUrl = file_get_contents($url, False);
										$json_idr = json_decode($jsonUrl, true);
										foreach ($json_idr['destination'] as $myd) {
											echo "<option value='$myd[0]'>$myd[1] ($myd[0])</option>";
										}
										?>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Departing</b></span>
										<input type="text" name="flight_date" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Returning</b></span>
										<input type="text" name="return_date" class="form-control mySelectCalendar" id="datepicker4" placeholder="mm/dd/yyyy"/>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="room1" >
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>Adult(18-64)</b></span>
											<select class="form-control mySelectBoxClass" name="adult">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<span class="opensans size13"><b>Children(0-17)</b></span>
											<select class="form-control mySelectBoxClass" name="child">
												<option value="0">0</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="searchbg2">
								
									<button type="submit" class="btn-search right mr30">Search</button>
								
							</div>
							</form>
						</div>
						<!--End of 1st tab -->
						
						<div id="hotel2" class="tab-pane fade">

							<div class="col-md-4 pt-6">
								<span class="opensans size18" >Where do you want to go?</span>
								<input type="text" class="form-control" placeholder="Greece">
							</div>

							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Check in date</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Check in date</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker2" placeholder="mm/dd/yyyy"/>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="room1" >
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 1</b></span><br/>
											
											<div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option selected>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>0</option>
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="room2 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 2</b></span><br/>
											<div class="addroom2 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option>2</option>
													  <option selected>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>		

								<div class="room3 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 3</b></span><br/>
											<div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						
						</div>
						<!--End of 2nd tab -->
						
						<div id="car2" class="tab-pane fade">

							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Picking up</b></span>
										<input type="text" class="form-control" placeholder="Airport, address">
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Dropping off</b></span>
										<input type="text" class="form-control" placeholder="Airport, address">
									</div>
								</div>
							</div>
							
							<div class="col-md-4">							
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Pick up date</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker5" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Hour</b></span>
										<select class="form-control mySelectBoxClass">
										  <option>12:00 AM</option>
										  <option>12:30 AM</option>
										  <option>01:00 AM</option>
										  <option>01:30 AM</option>
										  <option>02:00 AM</option>
										  <option>02:30 AM</option>
										  <option>03:00 AM</option>
										  <option>03:30 AM</option>
										  <option>04:00 AM</option>
										  <option>04:30 AM</option>
										  <option>05:00 AM</option>
										  <option>05:30 AM</option>
										  <option>06:00 AM</option>
										  <option>06:30 AM</option>
										  <option>07:00 AM</option>
										  <option>07:30 AM</option>
										  <option>08:00 AM</option>
										  <option>08:30 AM</option>
										  <option>09:00 AM</option>
										  <option>09:30 AM</option>
										  <option>10:00 AM</option>
										  <option selected>10:30 AM</option>
										  <option>11:00 AM</option>
										  <option>11:30 AM</option>
										  <option>12:00 PM</option>
										  <option>12:30 PM</option>								  
										  <option>01:00 PM</option>
										  <option>01:30 PM</option>
										  <option>02:00 PM</option>
										  <option>02:30 PM</option>
										  <option>03:00 PM</option>
										  <option>03:30 PM</option>
										  <option>04:00 PM</option>
										  <option>04:30 PM</option>
										  <option>05:00 PM</option>
										  <option>05:30 PM</option>
										  <option>06:00 PM</option>
										  <option>06:30 PM</option>
										  <option>07:00 PM</option>
										  <option>07:30 PM</option>
										  <option>08:00 PM</option>
										  <option>08:30 PM</option>
										  <option>09:00 PM</option>
										  <option>09:30 PM</option>
										  <option>10:00 PM</option>
										  <option>10:30 PM</option>
										  <option>11:00 PM</option>
										  <option>11:30 PM</option>								  
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>Drop off date</b></span>
											<input type="text" class="form-control mySelectCalendar" id="datepicker6" placeholder="mm/dd/yyyy"/>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<span class="opensans size13"><b>Hour</b></span>
											<select class="form-control mySelectBoxClass">
											  <option>12:00 AM</option>
											  <option>12:30 AM</option>
											  <option>01:00 AM</option>
											  <option>01:30 AM</option>
											  <option>02:00 AM</option>
											  <option>02:30 AM</option>
											  <option>03:00 AM</option>
											  <option>03:30 AM</option>
											  <option>04:00 AM</option>
											  <option>04:30 AM</option>
											  <option>05:00 AM</option>
											  <option>05:30 AM</option>
											  <option>06:00 AM</option>
											  <option>06:30 AM</option>
											  <option>07:00 AM</option>
											  <option>07:30 AM</option>
											  <option>08:00 AM</option>
											  <option>08:30 AM</option>
											  <option>09:00 AM</option>
											  <option>09:30 AM</option>
											  <option>10:00 AM</option>
											  <option selected>10:30 AM</option>
											  <option>11:00 AM</option>
											  <option>11:30 AM</option>
											  <option>12:00 PM</option>
											  <option>12:30 PM</option>								  
											  <option>01:00 PM</option>
											  <option>01:30 PM</option>
											  <option>02:00 PM</option>
											  <option>02:30 PM</option>
											  <option>03:00 PM</option>
											  <option>03:30 PM</option>
											  <option>04:00 PM</option>
											  <option>04:30 PM</option>
											  <option>05:00 PM</option>
											  <option>05:30 PM</option>
											  <option>06:00 PM</option>
											  <option>06:30 PM</option>
											  <option>07:00 PM</option>
											  <option>07:30 PM</option>
											  <option>08:00 PM</option>
											  <option>08:30 PM</option>
											  <option>09:00 PM</option>
											  <option>09:30 PM</option>
											  <option>10:00 PM</option>
											  <option>10:30 PM</option>
											  <option>11:00 PM</option>
											  <option>11:30 PM</option>		
											</select>
										</div>
									</div>
							</div>
						
						</div>
						<!--End of 3rd tab -->
						
						<div id="vacations2" class="tab-pane fade">

							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Flying from</b></span>
										<input type="text" class="form-control" placeholder="City or airport">
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>To</b></span>
										<input type="text" class="form-control" placeholder="City or airport">
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Check in date</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker7" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Check in date</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker8" placeholder="mm/dd/yyyy"/>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="room1" >
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 1</b></span><br/>
											
											<div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option selected>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>0</option>
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="room2 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 2</b></span><br/>
											<div class="addroom2 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option>2</option>
													  <option selected>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>		

								<div class="room3 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 3</b></span><br/>
											<div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
						
						</div>
						
						<div id="flighthotel2" class="tab-pane fade">
							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Flying from</b></span>
										<input type="text" class="form-control" placeholder="City or airport">
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>To</b></span>
										<input type="text" class="form-control" placeholder="City or airport">
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Departing</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker10" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Returning</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker9" placeholder="mm/dd/yyyy"/>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="room1" >
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 1</b></span><br/>
											
											<div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option selected>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>0</option>
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="room2 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 2</b></span><br/>
											<div class="addroom2 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option>2</option>
													  <option selected>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>		

								<div class="room3 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 3</b></span><br/>
											<div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End of Flight + Hotel -->
						
						<div id="cruise2" class="tab-pane fade">
							<div class="col-md-6">
								<span class="opensans size13"><b>Going to</b></span>
								<select class="form-control mySelectBoxClass">
								  <option selected>Show all</option>
								  <optgroup label="Most Popular">
									  <option>Caribbean</option>
									  <option>Bahamas</option>
									  <option>Mexico</option>
									  <option>Alaska</option>
									  <option>Europe</option>
									  <option>Bermuda</option>
									  <option>Hawaii</option>
								  </optgroup>
								  <optgroup label="Other Destinations">
									  <option>Africa</option>
									  <option>Arctic/Antartctic</option>
									  <option>Asia</option>
									  <option>Australia/New Zealand</option>
									  <option>Central America</option>
									  <option>Cruise to Nowhere</option>
									  <option>Galapagos</option>
									  <option>Greenland/Iceland</option>
									  <option>Middle East</option>
									  <option>Pacific Coastal</option>
									  <option>Panama Canal</option>
									  <option>South Africa</option>
									  <option>South Pacific</option>
									  <option>Tahiti</option>
									  <option>Transatlantic</option>
									  <option>World Cruises</option>
								  </optgroup>
								</select>

							</div>
							<div class="col-md-6">
								<span class="opensans size13"><b>Departure</b></span>
								<select class="form-control mySelectBoxClass">
								  <option selected>Show all</option>
								  <option>October 2013</option>
								  <option>November 2013</option>
								  <option>December 2013</option>
								  <option>January 2014</option>
								  <option>February 2014</option>
								  <option>March 2014</option>
								  <option>April 2014</option>
								  <option>May 2014</option>
								  <option>June 2014</option>
								  <option>July 2014</option>
								  <option>August 2014</option>
								  <option>September 2014</option>
								  <option>October 2014</option>
								  <option>November 2014</option>
								  <option>December 2014</option>
								</select>
							</div>		
						</div>
						
						<div id="hotelcar2" class="tab-pane fade">
							<div class="col-md-4 pt-6">
								<span class="opensans size18" >Where do you want to go?</span>
								<input type="text" class="form-control" placeholder="Greece">
							</div>

							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Check in date</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker11" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Check in date</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker12" placeholder="mm/dd/yyyy"/>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="room1" >
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 1</b></span><br/>
											
											<div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option selected>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>0</option>
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="room2 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 2</b></span><br/>
											<div class="addroom2 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option>2</option>
													  <option selected>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>		

								<div class="room3 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 3</b></span><br/>
											<div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="center size10 ca02 ">! An economy car will be added to your search. (You may change your car options later.) </div>
						</div>
						<!--End of Flight + Car -->
						
						<div id="flighthotelcar2" class="tab-pane fade">
							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Flying from</b></span>
										<input type="text" class="form-control" placeholder="City or airport">
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>To</b></span>
										<input type="text" class="form-control" placeholder="City or airport">
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13"><b>Departing</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker13" placeholder="mm/dd/yyyy"/>
									</div>
								</div>

								<div class="w50percentlast">
									<div class="wh90percent textleft right">
										<span class="opensans size13"><b>Returning</b></span>
										<input type="text" class="form-control mySelectCalendar" id="datepicker14" placeholder="mm/dd/yyyy"/>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="room1" >
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 1</b></span><br/>
											
											<div class="addroom1 block"><a href="#room2" onclick="addroom2()" class="grey">+ Add room</a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option selected>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>0</option>
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="room2 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 2</b></span><br/>
											<div class="addroom2 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom2()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option>1</option>
													  <option>2</option>
													  <option selected>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>		

								<div class="room3 none">
									<div class="clearfix"></div><div class="line1"></div>
									<div class="w50percent">
										<div class="wh90percent textleft">
											<span class="opensans size13"><b>ROOM 3</b></span><br/>
											<div class="addroom3 block grey"><a href="#" onclick="addroom3()" class="grey">+ Add room</a> | <a href="#" onclick="removeroom3()" class="orange"><img src="images/delete.png" alt="delete"/></a></div>
										</div>
									</div>

									<div class="w50percentlast">	
										<div class="wh90percent textleft right">
											<div class="w50percent">
												<div class="wh90percent textleft left">
													<span class="opensans size13"><b>Adult</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>							
											<div class="w50percentlast">
												<div class="wh90percent textleft right">
												<span class="opensans size13"><b>Child</b></span>
													<select class="form-control mySelectBoxClass">
													  <option selected>0</option>
													  <option>1</option>
													  <option>2</option>
													  <option>3</option>
													  <option>4</option>
													  <option>5</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="center size10 ca03">! An economy car will be added to your search. (You may change your car options later.)</div>							
						</div>						
						<!--End of Flight + Hotel + Car -->
					</div>
						
				</div>
			</div>
			
		  </div>
		</div>
		

		<div class="lastminute2 lcfix">
			<div class="container lmc">	
				<img src="images/rating-4.png" alt=""/><br/>
				LAST MINUTE: <b>Barcelona</b> - 2 nights - Flight+4* Hotel, Dep 27h Aug from $209/person<br/>
				<form action="list4.html">
					<button class="btn iosbtn" type="submit">Read more</button>
				</form>
			</div>
		</div>
		
		@include('footer')
	</div>
    <!-- /WRAP -->
	
	
	{{ HTML::script('assets/js/jquery.v2.0.3.js') }}
	{{ HTML::script('assets/js/home.js') }}
	{{ HTML::script('assets/js/js-index3.js') }}
	{{ HTML::script('assets/js/functions.js') }}
	{{ HTML::script('assets/js/jquery-ui.js') }}
	{{ HTML::script('assets/js/jquery.easing.js') }}
	{{ HTML::script('rs-plugin/js/jquery.themepunch.revolution.min.js') }}
	{{ HTML::script('assets/js/jquery.nicescroll.min.js') }}
	{{ HTML::script('assets/js/jquery.carouFredSel-6.2.1-packed.js') }}
	{{ HTML::script('assets/js/helper-plugins/jquery.touchSwipe.min.js') }}
	{{ HTML::script('assets/js/helper-plugins/jquery.mousewheel.min.js') }}
	{{ HTML::script('assets/js/helper-plugins/jquery.transit.min.js') }}
	{{ HTML::script('assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js') }}
	{{ HTML::script('assets/js/jquery.customSelect.js') }}
	{{ HTML::script('dist/js/bootstrap.min.js') }}
    
  </body>
</html>
