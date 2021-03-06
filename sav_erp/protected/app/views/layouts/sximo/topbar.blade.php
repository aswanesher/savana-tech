

{{--*/ $menus = SiteHelpers::menus('top') /*--}}
 	  <ul class="nav navbar-nav navbar-collapse collapse navbar-right"  id="topmenu">
		@foreach ($menus as $menu)
			 <li class="@if(Request::is($menu['module'])) active @endif" >
			 	<a 
				@if($menu['menu_type'] =='external')
					href="{{ URL::to($menu['url'])}}" 
				@else
					href="{{ URL::to($menu['module'])}}" 
				@endif
			 
				 @if(count($menu['childs']) > 0 ) class="dropdown-toggle" data-toggle="dropdown" @endif>
			 		<i class="{{$menu['menu_icons']}}"></i><span>{{$menu['menu_name']}}</span>
					@if(count($menu['childs']) > 0 )
					 <b class="caret"></b> 
					@endif  
				</a> 
				@if(count($menu['childs']) > 0)
					 <ul class="dropdown-menu dropdown-menu-right">
						@foreach ($menu['childs'] as $menu2)
						 <li class=" 
						 @if(count($menu2['childs']) > 0) dropdown-submenu @endif
						 @if(Request::is($menu2['module'])) active @endif">
						 	<a 
								@if($menu['menu_type'] =='external')
									href="{{ URL::to($menu2['url'])}}" 
								@else
									href="{{ URL::to($menu2['module'])}}" 
								@endif
											
							>
								<i class="{{$menu2['menu_icons']}}"></i> {{$menu2['menu_name']}}
							</a> 
							@if(count($menu2['childs']) > 0)
							<ul class="dropdown-menu dropdown-menu-right">
								@foreach($menu2['childs'] as $menu3)
									<li @if(Request::is($menu3['module'])) class="active" @endif>
										<a 
											@if($menu['menu_type'] =='external')
												href="{{ URL::to($menu3['url'])}}" 
											@else
												href="{{ URL::to($menu3['module'])}}" 
											@endif										
										
										>
											<span>{{$menu3['menu_name']}}</span>  
										</a>
									</li>	
								@endforeach
							</ul>
							@endif							
							
						</li>							
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach  
		
					@if(!Auth::check()) 
						<li class="dropdown"><a href="{{ URL::to('user/login') }}"><i class="fa fa-lock"></i>  {{ Lang::get('core.signin'); }}</a></li>
					@else
					<li class="">
						<a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
							 My Account <b class="caret"></b>
							  
						</a> 
						<ul class="dropdown-menu dropdown-menu-right ">
							<li ><a href="{{ URL::to('config/dashboard') }}"> Dashboard </a></li>
							<li ><a href="{{ URL::to('config/dashboard') }}">My Profile </a></li>					
						</ul>
					</li>
						
						<li class="dropdown"><a   href="{{ URL::to('user/logout') }}"><i class="fa fa-lock"></i>  {{ Lang::get('core.m_logout'); }}</a></li>
					@endif		
  </ul> 
 