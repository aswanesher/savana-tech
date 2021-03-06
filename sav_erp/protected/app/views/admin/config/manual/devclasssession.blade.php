
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
	
		<h2 > Class & Session  </h2>

			<p>Every Model generated by code builder will have same structure and code </p>
			<h6> Retrive current login active session </h6>
<pre class="prettyprint lang-php">
// User ID 
$userid = Session::get('uid') ;
// Group ID
$gid = Session::get('gid') ;
// Email
$eid = Session::get('eid');
// Full Name
$fid = Session::get('fid')	

</pre>
		<h6>Registering more session once users login  </h6>
Open file <code> /protected/app/controllers/userController.php	 </code>	
<pre class="prettyprint linenums lang-php">
	public function postSignin() {
		/* Block Code */

		Session::put('uid', $row->id);
		Session::put('gid', $row->group_id);
		Session::put('eid', $row->email);
		Session::put('fid', $row->first_name.' '. $row->last_name);	
		// More session register 
		Session::put('myCustumsession', 'value session here ');

		/* End Block Code */
	}	
</pre>		
<div class="doc-line"></div>
<h2 > Create Own Class Helper  </h2>			
		
<h6>Class Structure </h6>
<pre class="prettyprint linenums lang-php">
class YourHelpers
{
	public static function myFunction() {
		/* Your Code */
	}
}	

</pre>
<p><b>Calling your function </b></p>
<pre class="prettyprint linenums lang-php">
YourHelpers::myFunction();

</pre>							
</div>
</div>
</div>

