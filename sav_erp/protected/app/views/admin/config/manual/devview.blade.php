
  <div class="page-content">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> Help <small> Developer Guide </small></h3>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">Home</a></li>
        <li><a href="{{ URL::to('config/help') }}">Help</a></li>
        <li class="active"> Developer </li>
      </ul>
	</div> 
	<div class="row">

	@include('admin.config.manual.developersidebar')
	<div class="col-md-8" style="margin-bottom:50px;">
	
		<h2 > View Detail Structure </h2>
			<p> As laravel default engine template , all files generated by LCRUD using <a href="http://laravel.com/docs/templates"> Blade template </a> syntax , but template engine will not limiting you to use tag php at all template, you can use any php function in all element template </p>
						<p> view.Blade.php structure code </p>
<pre class="prettyprint lang-php">
 # body template
	  #header title 
	  #breadcrumb            #grid action control 

	  #start table view

	  	<!-- Looping head table -->

	  	

	  #end table view

	 

#end body template	  

</pre>
					
</div>
</div>
</div>

