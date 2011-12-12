<html>
<head>
<title>PeopleHub Search Portal</title>
<link rel="shortcut icon" href="templates/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="library/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="library/jquery.js"></script>
<script type="text/javascript" src="library/jquery-ui.min.js"></script>
<?php include ("templates/style.css"); ?>
<script type="text/javascript">
$(document).ready(function(){	
	$("#search").click(function(){
	
		$(function() {
			// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
			$( "#box" ).dialog( "destroy" );
		
			$( "#box" ).dialog({
				height: 140,
				modal: true
			});
		});
	});
});

function printpage()
{
 window.print();
}


</script>
</head>
<body>
<div class="content">
<?php 
		 include ("includes/connection.php"); 
		 $connect =  new Connection();
		 if($connect->connectdb("hub_db"))
		{
				if(isset($_GET['id']))
				{
					$id = $_GET['id'];
					$replace_id = str_replace(" ","%",$id);
					$query.= "name like '%$replace_id%' OR b_day like '%$replace_id%' OR address like '%$replace_id%' OR network_status = '$replace_id'";
					$sql= "
								select name,gender,phone_no,address,b_day,guardian,count(*) as Attendance From hub_tbl Where $query group by phone_no  
						  ";
					 $result=mysql_query($sql);
					 $count=mysql_num_rows($result);	
					 $counter="<b>Result</b>".":"."  "."Found!".".$count.";
						 	echo '<div class="search_result">'.'<font color="#800000" face="Arial">'.'<center>'.$counter.'</center>'.'</font>'.'</div>';
							  	if($count>0)
									{   
								    $x=0; 
									echo "<table width=1100 border=0 align=center cellspacing=2 cellpadding=2 bgcolor=#7897D8 style='font-size:12px'>";
									echo"<td>"."<b>"."<font size = 5>#</font>"."</b>"."</td>";
									echo"<td>"."<b>"."<font size = 5>Name</font>"."</b>"."</td>";
									echo"<td>"."<b>"."<font size = 5>Gender</font>"."</b>"."</td>";
									echo"<td>"."<b>"."<font size = 5>Contact#</font>"."</b>"."</td>";
									echo"<td>"."<b>"."<font size = 5>Address</font>"."</b>"."</td>";
									echo"<td>"."<b>"."<font size = 5>Birthday</font>" ."</b>"."</td>";
									echo"<td>"."<b>"."<font size = 5>Guardian</font>" ."</b>"."</td>";
									echo"<td>"."<b>"."<font size = 5>Attendance</font>" ."</b>"."</td>";
									while($row=mysql_fetch_array($result))
										{
											
											if($x%2==0)
											{
												$color = " bgcolor = '#BFEF64' ";
											}else
											{
												$color=" bgcolor='#FFF5EE'";
										  	}
			
							        		$x++;
											echo '<tr'.$color.'>';
											echo"<td>".$x."</td>";
											echo"<td>". "<font size = 3>".$row['name']."</font>"."</td>";
											echo"<td>". "<font size = 3>".$row['gender'] ."</font>"."</td>";
											echo"<td>". "<font size = 3>".$row['phone_no']."</font>"."</td>";
											echo"<td>". "<font size = 3>".$row['address'] ."</font>"."</td>";
											echo"<td>". "<font size = 3>".$row['b_day'] ."</font>"."</td>";
											echo"<td>"."<font size = 3>".$row['guardian']."</font>"."</td>";
											echo"<td>"."<font size = 3>".$row['Attendance']."</font>"."</td>";

											echo"</tr>";
			
										}
				    				 	echo "</table>";
									}
									
						
									echo "<div class = but_prnt ><input type=button value=Print Page! onclick=window.print() /></div>";
				}
				else
				{
					echo "error get!";
				}
		}
		else
		{
			echo "error db!";
		}
		?>
</div>  
</body>
</html>