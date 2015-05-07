<script>
	
	jQuery(function(){jQuery("#datepicker,#datepicker2,#datepicker3,#datepicker4,#datepicker5,#datepicker6,#datepicker7,#datepicker8,#datepicker9,#datepicker10,#datepicker11,#datepicker12,#datepicker13,#datepicker14").datepicker();});

</script>
<?PHP
if (isset($_GET['fill']) && $_GET['fill'] == 'getDate'){
?>

	<table width="100%">
			<tr>
				<td width="2%" style="background-color: #f0f0f0">&nbsp;</td>
				<td style="background-color: #f0f0f0"><span class="opensans size13"><b>Check in</b></span> <br> <input type="text" name="in" class="form-control mySelectCalendar" id="datepicker" value="<?PHP echo $_GET['in']?>" placeholder="mm/dd/yyyy"/></td>
				<td style="background-color: #f0f0f0"><span class="opensans size13"><b>Check Out</b></span> <br> <input type="text" name="out" class="form-control mySelectCalendar" id="datepicker2" value="<?PHP echo $_GET['out']?>" placeholder="mm/dd/yyyy"/></td>
				<td style="background-color: #f0f0f0"><span class="opensans size13"><b>Anak</b></span> <br> 
					<select class="form-control mySelectBoxClass" name="adult">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
					</select>
				</td>
				<td style="background-color: #f0f0f0"><span class="opensans size13"><b>Dewasa</b></span><br>
				<select class="form-control mySelectBoxClass" name="child">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
				</select>
				</td>
				<td align="center" style="background-color: #f0f0f0">
				<input type="hidden" name="act" value="rev" />
				<input type="hidden" name="id" value="<?PHP echo $_GET['id']?>" />
				<button class="bookbtn mt1">Perbaharui</button>
				</td>
				<td width="2%" style="background-color: #f0f0f0">&nbsp;</td>
			</tr>
	</table>

<?PHP
	}else{
?>
		<form action="search.php" method="post">
			<table width="100%" id="getschedule">
				<tr>
					<td colspan="5" align="right" style="border-top: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-left: 2px solid #ebebeb;"><a href="javascript:;" onclick="location.href='index.php?menu=list&loc=<?PHP echo $_GET['tags']?>&in=<?PHP echo $_GET['in']?>&out=<?PHP echo $_GET['out']?>&pax=<?PHP echo $_GET['pax']?>'"><img src="images/close.png"/></a>&nbsp;</td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
					<td colspan="3">Waktu Menginap</td>
					<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
					<td width="40%">Check-in</td>
					<td width="2%">:</td>
					<td><input type="text" name="in" class="form-control mySelectCalendar" id="datepicker" value="<?PHP echo $_GET['in']?>" placeholder="mm/dd/yyyy"/></td>
					<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td style="border-left: 2px solid #ebebeb;">&nbsp;</td>
					<td>Check-out</td>
					<td>:</td>
					<td><input type="text" name="out" class="form-control mySelectCalendar" id="datepicker2" value="<?PHP echo $_GET['out']?>" placeholder="mm/dd/yyyy"/></td>
					<td style="border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" style="border-left: 2px solid #ebebeb;border-right: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5" style="border-left: 2px solid #ebebeb;border-right: 2px solid #ebebeb;" align="center">
					<input type="hidden" name="menu" value="reschedule"/>
					<input type="hidden" name="tags" value="<?PHP echo $_GET['tags']?>"/>
					<input type="hidden" name="pax" value="<?PHP echo $_GET['pax']?>"/>
					<button style="text-decoration: none;" class="bookbtn">Perbaharui Waktu</button>
					
					</td>
				</tr>
				<tr>
					<td colspan="5" style="border-left: 2px solid #ebebeb;border-right: 2px solid #ebebeb;border-bottom: 2px solid #ebebeb;">&nbsp;</td>
				</tr>
			</table>
			</form>
		<?PHP
		}
		?>