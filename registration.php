<html>
<head>
<title>PeopleHub Search Portal</title>
<link rel="shortcut icon" href="templates/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="library/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="library/jquery.js"></script>
<script type="text/javascript" src="library/jquery-ui.min.js"></script>
 <script type="text/javascript" src="_template/jquery/datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#but").click(function(){
	
		$(function() {
			// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
			$( "#box" ).dialog( "destroy" );
		
			$( "#box" ).dialog({
				height: 140,
				modal: true
			});
		});
	});
	$('#example1').datepicker({ dateFormat: 'mm/dd/yy' });
});


</script>
</head>
<body>
	<div id="box" style = "display:none;">
	 	Searching Record....
	</div>
<?php include ("templates/style.css"); ?>
<?php include ("templates/template.php"); ?>



	<style>
		body{
		font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
		font-size:12px;
		}
		p, h1, form, button{border:0; margin:0; padding:0;}
		.spacer{clear:both; height:1px;}
		/* ----------- My Form ----------- */
		.myform{
		margin:0 auto;
		width:237px;
		height:159px;
		padding:14px;
		position:absolute;
		left:200px;
		top:1px;
		}
		
		/* ----------- stylized ----------- */
		#stylized{
		
		}
		#stylized h1 {
		font-size:14px;
		font-weight:bold;
		margin-bottom:8px;
		}
		#stylized p{
		font-size:11px;
		color:#666666;
		margin-bottom:20px;
		border-bottom:solid 1px #b7ddf2;
		padding-bottom:10px;
		}
		#stylized label{
		display:block;
		font-weight:bold;
		text-align:right;
		width:140px;
		float:left;
		}
		#stylized .small{
		color:#666666;
		display:block;
		font-size:11px;
		font-weight:normal;
		text-align:right;
		width:140px;
		}
		#stylized .inp_text{
		float:left;
		font-size:12px;
		padding:4px 2px;
		border:solid 1px #666666;
		width:200px;
		margin:2px 0 20px 10px;
		border-top-left-radius:5px;
		border-bottom-left-radius:5px;
		}
		#stylized button{
		clear:both;
		margin-left:150px;
		width:104px;
		height:26px;
		background:#666666 url(templates/images/register.png) no-repeat;
		text-align:center;
		line-height:31px;
		color:#FFFFFF;
		font-size:11px;
		font-weight:bold;
		position:absolute;
		right:150px;
		top:280px;
		}
		
		#search:hover{
				background-color: #B7DDF2;
		
		}
		.radioFields {
			padding:4px 2px;
			border:solid 1px #aacfe4;
			width:195px;
			margin:2px 0 20px 10px;
			float: left;
			background-color: #FFFFFF;
		}
		.inp_radio{
			width: 20px;
		}
		
		#but{
			width:89px;
			height:25px;
		}
	</style>
	
<center>
<div class="content">
<div id="stylized" class="myform">
		<form id="form1" name="form1" method="post" action="">
			<table>
				<tr>
					<td>
						Name:
					</td>
					<td>
						<input type="text" name="txtname" id="txtname"  value="<?php echo $info['txtname']; echo $_POST['txtname']; ?> " />		
					</td>
				</tr>
				<tr>
					<td>
						Mi:
					</td>
					<td>
						<input size = "2" type="text" name="txtmi" id="txtmi"  value="<?php echo $info['txtmi'];  echo $_POST['txtmi'];?> " />		
					</td>
				</tr>
				<tr>
					<td>
						Last Name:
					</td>
					<td>
						<input type="text" name="txtlname" id="txtlname"  value="<?php echo $info['txtlname']; echo $_POST['txtlname'];?> " />		
					</td>
				</tr>
				<tr>
					<td>
						Gender:
					</td>
						<td>
							<select name="gender">
								<option value="" <?php echo $info['gender"']=='' ? 'selected="selected"' : ''; ?>></option>
								<option value="Male" <?php echo $info['gender"']=='Male' ? 'selected="selected"' : ''; ?>>Male</option>
								<option value="Female" <?php echo $info['gender"']=='Female' ? 'selected="selected"' : ''; ?>>Female</option>
							</select>
						</td>
				</tr>
				<tr>
					<td>
						Contact#:
					</td>
					<td>
						<input type="text" name="txtcontact" id="txtcontact"  value="<?php echo $info['txtcontact']; echo $_POST['txtcontact'];?> " />		
					</td>
				</tr>
				<tr>
					<td>
						Address:
					</td>
					<td>
						<input size = "50" type="text" name="txtaddress" id="txtaddress"  value="<?php echo $info['txtaddress']; echo $_POST['txtaddress'];?> " />		
					</td>
				</tr>
				<tr>
					<td>
						BirthDate:
					</td>
						<td>
							<select name="month">
								<option value="" <?php echo $info['month']=='' ? 'selected="selected"' : ''; ?>></option>
								<option value="January" <?php echo $info['month']=='January' ? 'selected="selected"' : ''; ?>>January</option>
								<option value="February" <?php echo $info['month']=='February' ? 'selected="selected"' : ''; ?>>February</option>
								<option value="March" <?php echo $info['month']=='March' ? 'selected="selected"' : ''; ?>>March</option>
								<option value="April" <?php echo $info['month']=='April' ? 'selected="selected"' : ''; ?>>April</option>
								<option value="May" <?php echo $info['month']=='May' ? 'selected="selected"' : ''; ?>>May</option>
								<option value="June" <?php echo $info['month']=='June' ? 'selected="selected"' : ''; ?>>June</option>
								<option value="July" <?php echo $info['month']=='July' ? 'selected="selected"' : ''; ?>>July</option>
								<option value="August" <?php echo $info['month']=='August' ? 'selected="selected"' : ''; ?>>August</option>
								<option value="September" <?php echo $info['month']=='September' ? 'selected="selected"' : ''; ?>>September</option>
								<option value="October" <?php echo $info['month']=='October' ? 'selected="selected"' : ''; ?>>October</option>
								<option value="November" <?php echo $info['month']=='November' ? 'selected="selected"' : ''; ?>>November</option>
								<option value="December" <?php echo $info['month']=='December' ? 'selected="selected"' : ''; ?>>December</option>
							</select>
						
							<select name="day">
								<option value="" <?php echo $info['day']=='' ? 'selected="selected"' : ''; ?>></option>
								<option value="1" <?php echo $info['day']=='1' ? 'selected="selected"' : ''; ?>>1</option>
								<option value="2" <?php echo $info['day']=='2' ? 'selected="selected"' : ''; ?>>2</option>
								<option value="3" <?php echo $info['day']=='3' ? 'selected="selected"' : ''; ?>>3</option>
								<option value="4" <?php echo $info['day']=='4' ? 'selected="selected"' : ''; ?>>4</option>
								<option value="5" <?php echo $info['day']=='5' ? 'selected="selected"' : ''; ?>>5</option>
								<option value="6" <?php echo $info['day']=='6' ? 'selected="selected"' : ''; ?>>6</option>
								<option value="7" <?php echo $info['day']=='7' ? 'selected="selected"' : ''; ?>>7</option>
								<option value="8" <?php echo $info['day']=='8' ? 'selected="selected"' : ''; ?>>8</option>
								<option value="8" <?php echo $info['day']=='9' ? 'selected="selected"' : ''; ?>>9</option>
								<option value="10" <?php echo $info['day']=='10' ? 'selected="selected"' : ''; ?>>10</option>
								<option value="11" <?php echo $info['day']=='11' ? 'selected="selected"' : ''; ?>>11</option>
								<option value="12" <?php echo $info['day']=='12' ? 'selected="selected"' : ''; ?>>12</option>
								<option value="13" <?php echo $info['day']=='13' ? 'selected="selected"' : ''; ?>>13</option>
								<option value="14" <?php echo $info['day']=='14' ? 'selected="selected"' : ''; ?>>14</option>
								<option value="15" <?php echo $info['day']=='15' ? 'selected="selected"' : ''; ?>>15</option>
								<option value="16" <?php echo $info['day']=='16' ? 'selected="selected"' : ''; ?>>16</option>
								<option value="17" <?php echo $info['day']=='17' ? 'selected="selected"' : ''; ?>>17</option>
								<option value="18" <?php echo $info['day']=='18' ? 'selected="selected"' : ''; ?>>18</option>
								<option value="19" <?php echo $info['day']=='19' ? 'selected="selected"' : ''; ?>>19</option>
								<option value="20" <?php echo $info['day']=='20' ? 'selected="selected"' : ''; ?>>20</option>
								<option value="21" <?php echo $info['day']=='21' ? 'selected="selected"' : ''; ?>>21</option>
								<option value="22" <?php echo $info['day']=='22' ? 'selected="selected"' : ''; ?>>22</option>
								<option value="23" <?php echo $info['day']=='23' ? 'selected="selected"' : ''; ?>>23</option>
								<option value="24" <?php echo $info['day']=='24' ? 'selected="selected"' : ''; ?>>24</option>
								<option value="25" <?php echo $info['day']=='25' ? 'selected="selected"' : ''; ?>>25</option>
								<option value="26" <?php echo $info['day']=='26' ? 'selected="selected"' : ''; ?>>26</option>
								<option value="27" <?php echo $info['day']=='27' ? 'selected="selected"' : ''; ?>>27</option>
								<option value="28" <?php echo $info['day']=='28' ? 'selected="selected"' : ''; ?>>28</option>
								<option value="29" <?php echo $info['day']=='29' ? 'selected="selected"' : ''; ?>>29</option>
								<option value="30" <?php echo $info['day']=='30' ? 'selected="selected"' : ''; ?>>30</option>
								<option value="31" <?php echo $info['day']=='31' ? 'selected="selected"' : ''; ?>>31</option>
							</select>
							
							<input size = "5" type="text" name="txtyear" id="txtyear"  value="<?php echo $info['txtyear']; echo $_POST['txtyear'];?> " />		
							<font color = "#A0A0A4">(m/d/y)</font>
						</td>
				</tr>
				<tr>
					<td>
						Guardian:
					</td>
					<td>
						<input type="text" name="txtguardian" id="txtguardian"  value="<?php echo  $info['txtguardian'];  echo $_POST['txtguardian'];?> " />		
					</td>
				</tr>
				<tr>
					<td>
						Date Attended:
					</td>
					<td>
						<input type="text" name="txtdate" id="example1"  value="<?php echo   $info['txtdate'];  echo $_POST['txtdate'];?> " />		
					</td>
				</tr>
				<tr>
					<td>
						<button type="submit" name="register" id="register"></button>
					</td>
					<td>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="registration.php">Reset</a>
					</td>
				</tr>
			</table>
	</div>
<?php
  if(isset($_POST['register']))
	  { 
			
			include ("includes/rec_class.php");
			$check= new Check();
			$check->register($_POST);
			
	  }
?>
<br />

</div>  
<?php include ("templates/footer.php"); ?>
</center>
</body>
</html>

