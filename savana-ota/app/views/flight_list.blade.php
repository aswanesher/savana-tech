<!DOCTYPE html>
<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Website Ota</title>
	{{ HTML::style('../dist/css/bootstrap.css') }}
	{{ HTML::style('../assets/css/custom.css') }}
	{{ HTML::style('../updates/update1/css/style01.css') }}
	{{ HTML::style('../examples/carousel/carousel.css') }}
	{{ HTML::style('../assets/css/font-awesome.css') }}
	{{ HTML::style('../css/fullscreen.css') }}
	{{ HTML::style('../rs-plugin/css/settings.css') }}
	{{ HTML::style('../plugins/jslider/css/jslider.css') }}
	{{ HTML::style('../plugins/jslider/css/jslider.round.css') }}

	
    <!-- Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'>	
    
	
	
  </head>
  <body id="top" class="thebg" >
    
	
	
	<div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
		<div class="navbar mtnav">

			<div class="container offset-3">
			  @include('header')		  
			</div>
		
        </div>
      </div>
    </div>
	
	
	
	
	<div class="container breadcrub">
	    <div>
			<a class="homebtn left" href="#"></a>
			<div class="left">
				<ul class="bcrumbs">
					<li>/</li>
					<li><a href="#">Hotels</a></li>
					<li>/</li>
					<li><a href="#">U.S.A.</a></li>
					<li>/</li>					
					<li><a href="#" class="active">New York</a></li>					
				</ul>				
			</div>
			<a class="backbtn right" href="#"></a>
		</div>
		<div class="clearfix"></div>
		<div class="brlines"></div>
	</div>	

	<!-- CONTENT -->
	<div class="container">
		<div class="container pagecontainer offset-0">	
			
			
			<!-- FLIGHTS GRID -->
			<div class="flightsgrid">
			
			  
				<!-- Carousel -->
				<div class="flights_wrapper">
					<div class="flights_list_carousel">
						<div class="fconnection">19 offers with connection</div>
						<ul id="flightsfoo">
							<li class="fl1">
								<ul class="ftable">
									<li class="fch"><img src="updates/update1/img/logo1.png"  alt=""></li>
									<li><a href="#ticketid0123" class="fscrollto">764</a></li>
									<li><a href="#ticketid0123" class="fscrollto">788</a></li>
									<li><a href="#ticketid0123" class="fscrollto">878</a></li>
									<li><a href="#ticketid0123" class="fscrollto">950</a></li>
									<li><a href="#ticketid0123" class="fscrollto">1,100</a></li>
									<li><a href="#ticketid0123" class="fscrollto">1,500</a></li>
									<li><a href="#ticketid0123" class="fscrollto">2,500</a></li>
									<li><a href="#ticketid0123" class="fscrollto">2,800</a></li>
									<li><a href="#ticketid0123" class="fscrollto">3,100</a></li>
									<li><a href="#ticketid0123" class="fscrollto">3,600</a></li>
								</ul>
							</li>
							<li class="fl1">
								<ul class="ftable">
									<li class="fch"><img src="updates/update1/img/logo2.png"  alt=""></li>
									<li><a href="#ticketid0123" class="fscrollto">996</a></li>
									<li><a href="#ticketid0123" class="fscrollto">3,358</a></li>
									<li><a href="#ticketid0123" class="fscrollto">5,660</a></li>
									<li><a href="#ticketid0123" class="fscrollto">5,800</a></li>
									<li><a href="#ticketid0123" class="fscrollto">6,100</a></li>
									<li><a href="#ticketid0123" class="fscrollto">6,500</a></li>
									<li><a href="#ticketid0123" class="fscrollto">7,000</a></li>
								</ul>
							</li>
							<li class="fl1">
								<ul class="ftable">
									<li class="fch"><img src="updates/update1/img/logo3.png"  alt=""></li>
									<li><a href="#ticketid0123" class="fscrollto">6,968</a></li>
									<li><a href="#ticketid0124" class="fscrollto">7,054</a></li>
									<li><a href="#ticketid0123" class="fscrollto">7,894</a></li>
									<li><a href="#ticketid0123" class="fscrollto">8,000</a></li>
								</ul>
							</li>
						</ul>
						<div class="clearfix"></div>
						<a id="flightsprev_btn" class="flightsprev" href="#"><img src="images/spacer.png" alt=""/></a>
						<a id="flightsnext_btn" class="flightsnext" href="#"><img src="images/spacer.png" alt=""/></a>
					</div>
				</div>
				<!-- End of Carousel -->
				
				
				<!-- Carousel -->
				<div class="flights2_wrapper">
					<div class="flights2_list_carousel">
						<div class="fconnection">88 offers without connection</div>
						<ul id="flights2foo">
							<li class="fl1">
								<ul class="ftable2">
									<li class="fch2"><img src="updates/update1/img/logo1.png"  alt=""></li>
									<li><a href="#ticketid0123" class="fscrollto">764</a></li>
								</ul>
							</li>
							<li class="fl1">
								<ul class="ftable2">
									<li class="fch2"><img src="updates/update1/img/logo2.png"  alt=""></li>
									<li><a href="#ticketid0123" class="fscrollto">764</a></li>
									<li><a href="#ticketid0123" class="fscrollto">788</a></li>
									<li><a href="#ticketid0123" class="fscrollto">878</a></li>
									<li><a href="#ticketid0123" class="fscrollto">950</a></li>
									<li><a href="#ticketid0123" class="fscrollto">1,250</a></li>
									<li><a href="#ticketid0123" class="fscrollto">1,500</a></li>
									<li><a href="#ticketid0123" class="fscrollto">2,200</a></li>
								</ul>
							</li>
							<li class="fl1">
								<ul class="ftable2">
									<li class="fch2"><img src="updates/update1/img/logo3.png"  alt=""></li>
									<li><a href="#ticketid0123" class="fscrollto">764</a></li>
									<li><a href="#ticketid0123" class="fscrollto">788</a></li>
								</ul>
							</li>
						</ul>
						<div class="clearfix"></div>
						<a id="flights2prev_btn" class="flights2prev" href="#"><img src="images/spacer.png" alt=""/></a>
						<a id="flights2next_btn" class="flights2next" href="#"><img src="images/spacer.png" alt=""/></a>
					</div>
				</div>
				<!-- End of Carousel -->

				<div class="clearfix"></div>
				
			</div>
			<!-- /FLIGHTS GRID -->
			
			<div class="flightsgridmore">
				<a href="#" onclick="addflights()">More</a> <span class="farrow-btm"></span>
				<span class="farrow-top"></span> <a href="#" onclick="removeflights()">Less</a>
			</div>
			
			
			
			<div class="clearfix"></div>

			<!-- FILTERS -->
			<div class="col-md-3 filters offset-0">
			
				
				<!-- TOP TIP -->
				<div class="filtertip2">
					<div class="padding20">
						<p class="size13"><span class="size13 bold">19</span> offers with connection</p>
						<span class="size14">from</span> <span class="size30 bold green">$<span class="countpriceflights"></span></span>
						<p class="size13 mt10"><b>88</b> offers without connection</p>
					</div>
					<div class="tip-arrow2"></div>
				</div>
				
	

	
	
				<div class="bookfilters hpadding20">
					
					
						<div class="size30 dark">Flights</div>
						
						<table>
							<tr>
								<td>
									<div class="radio radiomargin0">
									  <label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
										Roundtrip&nbsp;&nbsp;&nbsp;
									  </label>
									</div>
								</td>
								<td>
									<div class="radio radiomargin0">
									  <label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
										One Way
									  </label>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="radio radiomargin0">
									  <label>
										<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
										Multiple destinations
									  </label>
									</div>
								</td>
							</tr>							
						</table>

						<div class="clearfix"></div><br/>
						
						<!-- ROUNDTRIP TAB -->
						<div class="hotelstab2 none">
							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">Flying from</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>

							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">To</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							
							
							<div class="clearfix pbottom15"></div>
							
							<div class="w50percent">
								<div class="wh90percent textleft">
									<span class="opensans size13">Departing</span>
									<input type="text" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy"/>
								</div>
							</div>

							<div class="w50percentlast">
								<div class="wh90percent textleft right">
									<span class="opensans size13">Returning</span>
									<input type="text" class="form-control mySelectCalendar" id="datepicker4" placeholder="mm/dd/yyyy"/>
								</div>
							</div>
							
							<div class="clearfix pbottom15"></div>
							
							<div class="room1" >
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13">Adult</span>
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
										<span class="opensans size13">Child</span>
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
							</div><div class="clearfix"></div><br/>
							<button type="submit" class="btn-search3">Search</button>
						</div>
						<!-- END OF ROUNDTRIP TAB -->
						
						<!-- ONEWAY TAB -->
						<div class="flightstab2 none">
							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">Flying from</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>

							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">To</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							
							
							<div class="clearfix pbottom15"></div>
							
							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">Departing</span>
									<input type="text" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy"/>
								</div>
							</div>


							
							<div class="clearfix pbottom15"></div>
							
							<div class="room1" >
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13">Adult</span>
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
										<span class="opensans size13">Child</span>
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
							</div><div class="clearfix"></div>
							<button type="submit" class="btn-search3">Search</button>
						</div>
						<!-- END OF ONEWAY TAB -->
						
						<!-- MULTIPLE DESTINATIONS TAB -->
						<div class="vacationstab2 none">
						
							<span class="bold dark">Flight 1:</span><br/>
							<div class="w50percent">
								<div class="wh90percent textleft">
									<span class="opensans size13">Flying from</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							<div class="w50percentlast">
								<div class="wh90percent textleft right">
									<span class="opensans size13">To</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							<div class="clearfix pbottom15"></div>
							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">Departing</span>
									<input type="text" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy"/>
								</div>
							</div><br/>
							
							
							<span class="bold dark">Flight 2:</span><br/>
							<div class="w50percent">
								<div class="wh90percent textleft">
									<span class="opensans size13">Flying from</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							<div class="w50percentlast">
								<div class="wh90percent textleft right">
									<span class="opensans size13">To</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							<div class="clearfix pbottom15"></div>
							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">Departing</span>
									<input type="text" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy"/>
								</div>
							</div><br/>
							
							
							<span class="bold dark">Flight 3:</span><br/>
							<div class="w50percent">
								<div class="wh90percent textleft">
									<span class="opensans size13">Flying from</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							<div class="w50percentlast">
								<div class="wh90percent textleft right">
									<span class="opensans size13">To</span>
									<input type="text" class="form-control" placeholder="City or airport">
								</div>
							</div>
							<div class="clearfix pbottom15"></div>
							<div class="wh100percent">
								<div class="wh100percent textleft">
									<span class="opensans size13">Departing</span>
									<input type="text" class="form-control mySelectCalendar" id="datepicker3" placeholder="mm/dd/yyyy"/>
								</div>
							</div><br/>
							
							<div class="clearfix pbottom15"></div>
							
							<div class="room1" >
								<div class="w50percent">
									<div class="wh90percent textleft">
										<span class="opensans size13">Adult</span>
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
										<span class="opensans size13">Child</span>
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
							</div><div class="clearfix"></div>
							<button type="submit" class="btn-search3">Search</button>
						</div>
						<!-- END OF MULTIPLE DESTINATIONS TAB -->
						

						
				</div>
				<!-- END OF BOOK FILTERS -->	
				
				<div class="line2"></div>
				
				<div class="padding20title"><h3 class="opensans dark">Filter by</h3></div>
				<div class="line2"></div>
				


				<!--  Connection -->
				<button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse5">
				  Connection <span class="collapsearrow"></span>
				</button>	
				<div id="collapse5" class="collapse in">
					<div class="hpadding20">
						<div class="checkbox">
							<label>
							  <input type="checkbox">Offers without connection (13)
							</label>
						</div>
						<div class="checkbox">
							<label>
							  <input type="checkbox">Offers with connection (88)
							</label>
						</div>
					</div>
					<div class="clearfix"></div>						
				</div>	
				<!-- End of Connection -->




				
				<div class="line2"></div>
				
				<!-- Price range -->					
				<button type="button" class="collapsebtn" data-toggle="collapse" data-target="#collapse2">
				  Price range <span class="collapsearrow"></span>
				</button>
					
				<div id="collapse2" class="collapse in">
					<div class="padding20">
						<div class="layout-slider wh100percent">
						<span class="cstyle09"><input id="Slider1" type="slider" name="price" value="770;2500" /></span>
						</div>
						<script type="text/javascript" >
						  jQuery("#Slider1").slider({ from: 100, to: 5000, step: 5, smooth: true, round: 0, dimension: "&nbsp;$", skin: "round" });
						</script>
					</div>
				</div>
				<!-- End of Price range -->	
				
				<div class="line2"></div>
				
				<!--  Airlines -->
				<button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse3">
				  Airlines <span class="collapsearrow"></span>
				</button>	
				<div id="collapse3" class="collapse in">
					<div class="hpadding20">
						<div class="checkbox">
							<label>
							  <input type="checkbox">Qatar Airways (6)
							</label>
						</div>
						<div class="checkbox">
							<label>
							  <input type="checkbox">Emirates (11)
							</label>
						</div>
						<div class="checkbox">
							<label>
							  <input type="checkbox">Olympic (15)
							</label>
						</div>
						<div class="checkbox">
							<label>
							  <input type="checkbox">Wizz(15)
							</label>
						</div>	
						<div class="checkbox">
							<label>
							  <input type="checkbox">Tarom
							</label>
						</div>	
					</div>
					<div class="clearfix"></div>						
				</div>	
				<!-- End of Airlines -->
				
				<div class="line2"></div>
				
				<!-- Hotel Preferences -->
				<button type="button" class="collapsebtn last" data-toggle="collapse" data-target="#collapse4">
				  Departure time <span class="collapsearrow"></span>
				</button>	
				<div id="collapse4" class="collapse in">
					<div class="hpadding20">
						<div class="checkbox">
							<label>
							  <input type="checkbox">Morning (5:00a - 11:59a)
							</label>
						</div>
						<div class="checkbox">
							<label>
							  <input type="checkbox">Afternoon (12:00p - 5:59p)
							</label>
						</div>
						<div class="checkbox">
							<label>
							  <input type="checkbox">Evening (6:00p - 11:59p)
							</label>
						</div>
					</div>
					<div class="clearfix"></div>						
				</div>	
				<!-- End of Hotel Preferences -->
				
				<div class="line2"></div>
				<div class="clearfix"></div>
				<br/>
				<br/>
				<br/>
				
				
			</div>
			<!-- END OF FILTERS -->
			
			<!-- LIST CONTENT-->
			<div class="rightcontent col-md-9 offset-0">
			
				<div class="hpadding20">
					<!-- Top filters -->
					<div class="topsortby">
						<div class="col-md-4 offset-0">
								
								<div class="left mt7"><b>Sort by:</b></div>
								
								<div class="right wh70percent">
									<select class="form-control mySelectBoxClass ">
									  <option selected>Departure</option>
									  <option>Morning (5:00a - 11:59a)</option>
									  <option>Afternoon (12:00p - 5:59p)</option>
									  <option>Evening (6:00p - 11:59p)</option>
									</select>
								</div>



						</div>			
						<div class="col-md-4">
							<div class="w50percent">
								<div class="wh90percent">
									<select class="form-control mySelectBoxClass ">
									  <option selected>Arrival</option>
									  <option>Morning (5:00a - 11:59a)</option>
									  <option>Afternoon (12:00p - 5:59p)</option>
									  <option>Evening (6:00p - 11:59p)</option>
									</select>
								</div>
							</div>
							<div class="w50percentlast">
								<div class="wh90percent">
									<select class="form-control mySelectBoxClass ">
									  <option selected>Price</option>
									  <option>Ascending</option>
									  <option>Descending</option>
									</select>
								</div>
							</div>					
						</div>
						<div class="col-md-4 offset-0">
							<button class="popularbtn left">Duration</button>
							<div class="right">
								<button class="gridbtn active">&nbsp;</button>
								<button class="listbtn active">&nbsp;</button>
								<button class="grid2btn active">&nbsp;</button>
							</div>
						</div>
					</div>
					<!-- End of topfilters-->
				</div>
				<!-- End of padding -->
				
				<br/><br/>
				<div class="clearfix"></div>
				

				<div class="itemscontainer offset-1">
			
	
					<!-- FLIGHT TICKET-->
					<div id="ticketid0123" class="offset-2" >
						<div class="fblueline"><b>Bucharest</b> Otopeni <span class="farrow"></span> <b>London</b> Heathrow</div>
						
						
						<!-- GOING TICKET-->
						<div class="frow1">
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/tarom.png"  alt="">
								</li>
								<li class="ft2">
									<div class="radio radiomargin0">
									  <label>
										<input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsFradios">
										Departure
									  </label>
									</div>
									<span class="grey">3 February, Mon</span><br/>
									<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
									Arrival<br/>
									<span class="grey">3 February, Mon</span><br/>
									<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
									Flight<br/>
									<span class="grey">LH-1419</span><br/>
									Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse10">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>
						</div>
						
						<div  class="collapse frowexpand" id="collapse10">
							
							<ul class="flightstable mt20">
								<li class="ft1">
									
								</li>
								<li class="ft2">
									Duration<br/>
									<span class="grey">Economy</span><br/>
									<b>5 h 45 min</b><br/>
								</li>
								<li class="ft3">
									Connections<br/>
									<span class="grey">Frankfurt, Germany</span><br/>
									<b>1 h 25 min</b><br/>
								</li>
								<li class="ft4">
									Seats left<br/><br/>
									<b>6</b>
								</li>
								<li class="ft5">
									<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse10">Hide</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>

						</div>
						
						<div class="frow2">

						
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/tarom.png"  alt="">
								</li>
								<li class="ft2">
									<div class="radio radiomargin0">
									  <label>
										<input type="radio"  value="option1" id="optionsRadios1" name="optionsFradios">
										Departure
									  </label>
									</div>
									<span class="grey">3 February, Mon</span><br/>
									<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
									Arrival<br/>
									<span class="grey">3 February, Mon</span><br/>
									<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
									Flight<br/>
									<span class="grey">LH-1419</span><br/>
									Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse11">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>
						
						
						</div>	
						<div  class="collapse frowexpand" id="collapse11">

							<ul class="flightstable mt20">
								<li class="ft1">
									
								</li>
								<li class="ft2">
									Duration<br/>
									<span class="grey">Economy</span><br/>
									<b>5 h 45 min</b><br/>
								</li>
								<li class="ft3">
									Connections<br/>
									<span class="grey">Frankfurt, Germany</span><br/>
									<b>1 h 25 min</b><br/>
								</li>
								<li class="ft4">
									Seats left<br/><br/>
									<b>6</b>
								</li>
								<li class="ft5">
									<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse11">Hide</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>

						</div>
						<!-- END OF GOING TICKET-->
						
						<div class="fgreenline"><b>London</b> Heathrow <span class="farrow"></span> <b>Bucharest</b> Otopeni</div>
						
						<!-- RETURNING TICKET-->
						<div class="frow2">
						
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/tarom.png"  alt="">
								</li>
								<li class="ft2">
									<div class="radio radiomargin0">
									  <label>
										<input type="radio" checked="" value="option2" id="optionsRadios2" name="optionsFradios2">
										Departure
									  </label>
									</div>
									<span class="grey">3 February, Mon</span><br/>
									<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
									Arrival<br/>
									<span class="grey">3 February, Mon</span><br/>
									<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
									Flight<br/>
									<span class="grey">LH-1419</span><br/>
									Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse12">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>
							
						</div>	
						<div  class="collapse frowexpand" id="collapse12">

								<ul class="flightstable mt20">
									<li class="ft1">
										
									</li>
									<li class="ft2">
										Duration<br/>
										<span class="grey">Economy</span><br/>
										<b>5 h 45 min</b><br/>
									</li>
									<li class="ft3">
										Connections<br/>
										<span class="grey">Frankfurt, Germany</span><br/>
										<b>1 h 25 min</b><br/>
									</li>
									<li class="ft4">
										Seats left<br/><br/>
										<b>6</b>
									</li>
									<li class="ft5">
										<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse12">Hide</button>
									</li>
								</ul>
								<div class="clearfix"></div><br/><br/>
								

							<div class="clearfix"></div>
						</div>
						<!-- END OF RETURNING TICKET -->
						
						
						<div class="fselect">
							<span class="size12 lightgrey">Roundtrip / per person</span> <span class="size18 green bold">$770</span>&nbsp; <button class="selectbtn mt1" type="button">Select</button>	
						</div>
					</div>
					<!-- END OF FLIGHT TICKET-->


					<!-- FLIGHT TICKET-->
					<div id="ticketid0124" class="offset-2 margtop40">
						<div class="fblueline"><b>Bucharest</b> Otopeni <span class="farrow"></span> <b>London</b> Heathrow</div>
						
						<!-- GOING TICKET-->
						<div class="frow1">
							
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/wizz.png"  alt="">
								</li>
								<li class="ft2">
										<div class="radio radiomargin0">
										  <label>
											<input type="radio" value="option3" id="optionsRadios3" name="optionsFradios3">
											Departure
										  </label>
										</div>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
										Arrival<br/>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
										Flight<br/>
										<span class="grey">LH-1419</span><br/>
										Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse13">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>

						</div>
						<div  class="collapse in frowexpand" id="collapse13">
							
								
								<ul class="flightstable mt20">
									<li class="ft1">
										
									</li>
									<li class="ft2">
										Duration<br/>
										<span class="grey">Economy</span><br/>
										<b>5 h 45 min</b><br/>
									</li>
									<li class="ft3">
										Connections<br/>
										<span class="grey">Frankfurt, Germany</span><br/>
										<b>1 h 25 min</b><br/>
									</li>
									<li class="ft4">
										Seats left<br/><br/>
										<b>6</b>
									</li>
									<li class="ft5">
										<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse13">Hide</button>
									</li>
								</ul>
								<div class="clearfix"></div><br/><br/>
								

							<div class="clearfix"></div>
						</div>
						
						<!-- END OF GOING TICKET-->
						
						<div class="fgreenline"><b>London</b> Heathrow <span class="farrow"></span> <b>Bucharest</b> Otopeni</div>
						
						<!-- RETURNING TICKET-->
						<div class="frow2">
						
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/wizz.png"  alt="">
								</li>
								<li class="ft2">
										<div class="radio radiomargin0">
										  <label>
											<input type="radio" value="option4" id="optionsRadios4" name="optionsFradios4">
											Departure
										  </label>
										</div>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
										Arrival<br/>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
										Flight<br/>
										<span class="grey">LH-1419</span><br/>
										Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse14">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>
						
						</div>	
						<div  class="collapse frowexpand" id="collapse14">

								
								<ul class="flightstable mt20">
									<li class="ft1">
										
									</li>
									<li class="ft2">
										Duration<br/>
										<span class="grey">Economy</span><br/>
										<b>5 h 45 min</b><br/>
									</li>
									<li class="ft3">
										Connections<br/>
										<span class="grey">Frankfurt, Germany</span><br/>
										<b>1 h 25 min</b><br/>
									</li>
									<li class="ft4">
										Seats left<br/><br/>
										<b>6</b>
									</li>
									<li class="ft5">
										<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse14">Hide</button>
									</li>
								</ul>
								<div class="clearfix"></div><br/><br/>
								

							<div class="clearfix"></div>
						</div>
						<!-- END OF RETURNING TICKET -->
						
						
						<div class="fselect">
							<span class="size12 lightgrey">Roundtrip / per person</span> <span class="size18 green bold">$770</span>&nbsp; <button class="selectbtn mt1" type="button">Select</button>	
						</div>
					</div>
					<!-- END OF FLIGHT TICKET-->
	

					<!-- FLIGHT TICKET-->
					<div id="ticketid0125" class="offset-2 margtop40">
						<div class="fblueline"><b>Bucharest</b> Otopeni <span class="farrow"></span> <b>London</b> Heathrow</div>
						
						<!-- GOING TICKET-->
						<div class="frow1">
							
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/emirates.png"  alt="">
								</li>
								<li class="ft2">
										<div class="radio radiomargin0">
										  <label>
											<input type="radio" value="option5" id="optionsRadios5" name="optionsFradios5">
											Departure
										  </label>
										</div>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
										Arrival<br/>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
										Flight<br/>
										<span class="grey">LH-1419</span><br/>
										Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse15">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>
						
						</div>
						<div  class="collapse frowexpand" id="collapse15">
							
								
								<ul class="flightstable mt20">
									<li class="ft1">
										
									</li>
									<li class="ft2">
										Duration<br/>
										<span class="grey">Economy</span><br/>
										<b>5 h 45 min</b><br/>
									</li>
									<li class="ft3">
										Connections<br/>
										<span class="grey">Frankfurt, Germany</span><br/>
										<b>1 h 25 min</b><br/>
									</li>
									<li class="ft4">
										Seats left<br/><br/>
										<b>6</b>
									</li>
									<li class="ft5">
										<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse15">Hide</button>
									</li>
								</ul>
								<div class="clearfix"></div><br/><br/>
								

							<div class="clearfix"></div>
						</div>
						
						<!-- END OF GOING TICKET-->
						
						<div class="fgreenline"><b>London</b> Heathrow <span class="farrow"></span> <b>Bucharest</b> Otopeni</div>
						
						<!-- RETURNING TICKET-->
						<div class="frow2">
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/emirates.png"  alt="">
								</li>
								<li class="ft2">
										<div class="radio radiomargin0">
										  <label>
											<input type="radio" value="option6" id="optionsRadios6" name="optionsFradios6">
											Departure
										  </label>
										</div>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
										Arrival<br/>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
										Flight<br/>
										<span class="grey">LH-1419</span><br/>
										Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse16">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>						
						</div>	
						<div  class="collapse frowexpand" id="collapse16">

								
								<ul class="flightstable mt20">
									<li class="ft1">
										
									</li>
									<li class="ft2">
										Duration<br/>
										<span class="grey">Economy</span><br/>
										<b>5 h 45 min</b><br/>
									</li>
									<li class="ft3">
										Connections<br/>
										<span class="grey">Frankfurt, Germany</span><br/>
										<b>1 h 25 min</b><br/>
									</li>
									<li class="ft4">
										Seats left<br/><br/>
										<b>6</b>
									</li>
									<li class="ft5">
										<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse16">Hide</button>
									</li>
								</ul>
								<div class="clearfix"></div><br/><br/>
								

							<div class="clearfix"></div>
						</div>
						<!-- END OF RETURNING TICKET -->
						
						
						<div class="fselect">
							<span class="size12 lightgrey">Roundtrip / per person</span> <span class="size18 green bold">$770</span>&nbsp; <button class="selectbtn mt1" type="button">Select</button>	
						</div>
					</div>
					<!-- END OF FLIGHT TICKET-->
	
	
					<!-- FLIGHT TICKET-->
					<div id="ticketid0126" class="offset-2 margtop40">
						<div class="fblueline"><b>Bucharest</b> Otopeni <span class="farrow"></span> <b>London</b> Heathrow</div>
						
						<!-- GOING TICKET-->
						<div class="frow1">
							
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/airfrance.png"  alt="">
								</li>
								<li class="ft2">
										<div class="radio radiomargin0">
										  <label>
											<input type="radio" value="option7" id="optionsRadios7" name="optionsFradios7">
											Departure
										  </label>
										</div>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
										Arrival<br/>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
										Flight<br/>
										<span class="grey">LH-1419</span><br/>
										Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse17">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>		
						
						</div>
						<div  class="collapse frowexpand" id="collapse17">
							
								
								<ul class="flightstable mt20">
									<li class="ft1">
										
									</li>
									<li class="ft2">
										Duration<br/>
										<span class="grey">Economy</span><br/>
										<b>5 h 45 min</b><br/>
									</li>
									<li class="ft3">
										Connections<br/>
										<span class="grey">Frankfurt, Germany</span><br/>
										<b>1 h 25 min</b><br/>
									</li>
									<li class="ft4">
										Seats left<br/><br/>
										<b>6</b>
									</li>
									<li class="ft5">
										<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse17">Hide</button>
									</li>
								</ul>
								<div class="clearfix"></div><br/><br/>
								

							<div class="clearfix"></div>
						</div>
						
						<!-- END OF GOING TICKET-->
						
						<div class="fgreenline"><b>London</b> Heathrow <span class="farrow"></span> <b>Bucharest</b> Otopeni</div>
						
						<!-- RETURNING TICKET-->
						<div class="frow2">
							<ul class="flightstable mt20">
								<li class="ft1">
									<img src="../updates/update1/img/airfrance.png"  alt="">
								</li>
								<li class="ft2">
										<div class="radio radiomargin0">
										  <label>
											<input type="radio" value="option8" id="optionsRadios8" name="optionsFradios8">
											Departure
										  </label>
										</div>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">14:00</span><br/>
								</li>
								<li class="ft3">
										Arrival<br/>
										<span class="grey">3 February, Mon</span><br/>
										<span class="size16 dark bold">17:45</span><br/>
								</li>
								<li class="ft4">
										Flight<br/>
										<span class="grey">LH-1419</span><br/>
										Embraer ERJ-190<br/>
								</li>
								<li class="ft5">
									<button class="lightbtn mt1" type="button" data-toggle="collapse" data-target="#collapse18">More</button>
								</li>
							</ul>
							<div class="clearfix"></div><br/><br/>							
						</div>	
						<div  class="collapse frowexpand" id="collapse18">

								
								<ul class="flightstable mt20">
									<li class="ft1">
										
									</li>
									<li class="ft2">
										Duration<br/>
										<span class="grey">Economy</span><br/>
										<b>5 h 45 min</b><br/>
									</li>
									<li class="ft3">
										Connections<br/>
										<span class="grey">Frankfurt, Germany</span><br/>
										<b>1 h 25 min</b><br/>
									</li>
									<li class="ft4">
										Seats left<br/><br/>
										<b>6</b>
									</li>
									<li class="ft5">
										<button class="hidebtn mt1" type="button" data-toggle="collapse" data-target="#collapse18">Hide</button>
									</li>
								</ul>
								<div class="clearfix"></div><br/><br/>
								


						</div>
						<!-- END OF RETURNING TICKET -->
						
						
						<div class="fselect">
							<span class="size12 lightgrey">Roundtrip / per person</span> <span class="size18 green bold">$770</span>&nbsp; <button class="selectbtn mt1" type="button">Select</button>	
						</div>
					</div>
					<!-- END OF FLIGHT TICKET-->

					<div class="clearfix"></div>
					<div class="offset-2"><hr class="featurette-divider3"></div>
					

				</div>	
				<!-- End of offset1-->		

				<div class="hpadding20">
				
					<ul class="pagination right paddingbtm20">
					  <li class="disabled"><a href="#">&laquo;</a></li>
					  <li><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					  <li><a href="#">&raquo;</a></li>
					</ul>

				</div>

			</div>
			<!-- END OF LIST CONTENT-->
			
		

		</div>
		<!-- END OF container-->
		
	</div>
	<!-- END OF CONTENT -->
	
	
	@include('footer')
	
	{{ HTML::script('../assets/js/jquery.v2.0.3.js') }}
	{{ HTML::script('../plugins/jslider/js/jshashtable-2.1_src.js') }}
	{{ HTML::script('../plugins/jslider/js/jquery.numberformatter-1.2.3.js') }}
	{{ HTML::script('../plugins/jslider/js/tmpl.js') }}
	{{ HTML::script('../plugins/jslider/js/jquery.dependClass-0.1.js') }}
	{{ HTML::script('../plugins/jslider/js/draggable-0.1.js') }}
	{{ HTML::script('../plugins/jslider/js/jquery.slider.js') }}
	{{ HTML::script('../assets/js/js-list4.js') }}
	{{ HTML::script('../assets/js/jquery.customSelect.js') }}
	{{ HTML::script('../js/lightbox.js') }}
	{{ HTML::script('../assets/js/jquery.easing.js') }}
	{{ HTML::script('../assets/js/functions.js') }}
	{{ HTML::script('../rs-plugin/js/jquery.themepunch.revolution.min.js') }}
	{{ HTML::script('../updates/update1/js/js-flights.js') }}
	{{ HTML::script('../updates/update1/js/jquery.carouFredSel-wrapper2.js') }}
	{{ HTML::script('../assets/js/helper-plugins/jquery.touchSwipe.min.js') }}
	{{ HTML::script('../assets/js/helper-plugins/jquery.mousewheel.min.js') }}
	{{ HTML::script('../assets/js/helper-plugins/jquery.transit.min.js') }}
	{{ HTML::script('../assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js') }}
	{{ HTML::script('../assets/js/counter.js') }}
	{{ HTML::script('../assets/js/jquery.nicescroll.min.js') }}
	{{ HTML::script('../assets/js/jquery-ui.js') }}
	{{ HTML::script('../dist/js/bootstrap.min.js') }}
  </body>
</html>
