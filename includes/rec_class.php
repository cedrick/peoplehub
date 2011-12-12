<?php
 
include ("connection.php");
Class Check extends Connection
{
    
	
	//function look attendance
	function get_attendees($sdate,$edate)
	{
		if($this->connectdb("hub_db"))
		{	
			$esc_sdate = $this->escape_string($sdate);
			$esc_edate  = $this->escape_string($edate);
			$sql= "
					select name,gender,phone_no,address,b_day,guardian,count(*) as Attendance From hub_tbl Where rdate >= '$sdate' and rdate<= '$edate' group by phone_no 
				";
			 $result=mysql_query($sql);
			 $sql_count= " select * from hub_tbl Where rdate >= '$sdate' and rdate<= '$edate'";
			 $result_count=mysql_query($sql_count);
			 $count=mysql_num_rows($result_count);	
			 $counter="<b>No. of Attendees</b>".":"."  "."<font size = 5 color = BLACK>$count</font>";
							 	echo '<div class="search_result">'.'<font color="#800000" face="Arial">'.'<center>'.$counter.'</center>'.'</font>'.'</div>';
								  	if($count>0)
										{   
									    $x=0; 
										echo "<table width=1100 border=0 align=center cellspacing=2 cellpadding=2 bgcolor=#7897D8 style='font-size:12px'>";
										echo"<td>"."<b>"."#"."</b>"."</td>";
										echo"<td>"."<b>"."Name"."</b>"."</td>";
										echo"<td>"."<b>"."Gender"."</b>"."</td>";
										echo"<td>"."<b>"."Contact#"."</b>"."</td>";
										echo"<td>"."<b>"."Address"."</b>"."</td>";
										echo"<td>"."<b>"."Birthday" ."</b>"."</td>";
										echo"<td>"."<b>"."Guardian" ."</b>"."</td>";
										echo"<td>"."<b>"."Attendance" ."</b>"."</td>";
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
												echo"<td>". $row['name']."</td>";
												echo"<td>". $row['gender'] ."</td>";
												echo"<td>". $row['phone_no']."</td>";
												echo"<td>". $row['address'] ."</td>";
												echo"<td>". $row['b_day'] ."</td>";
												echo"<td>".$row['guardian'] ."</td>";
												echo"<td>".$row['Attendance'] ."</td>";
	
												echo"</tr>";
				
											}
					    				 	echo "</table>";
					    				 	echo '<a target="_blank"  href="data.php?sdate='.$sdate.'&&edate='.$edate.'">Print Preview</a>';
					    				 	
										}
				
		}else 
		{
			echo'<div class="counter">'. "Database error".'</div>';
		}
							
	}
	
	
	//function for registration
	function register($infos = array())
	{
		if($this->connectdb("hub_db"))
		{
				if($infos['month']!=NULL && $infos['day']!=NULL && $infos['txtyear']!=NULL && $infos['txtname']!=NULL && $infos['txtmi']!=NULL && $infos['txtlname']!=NULL && $infos['txtaddress']!=NULL && $infos['gender']!=NULL && $infos['txtcontact']!=NULL && $infos['txtguardian']!=NULL && $infos['txtdate']!=NULL)
				{
					
					if($infos['month'] == 'September' && $infos['day']<=30 || $infos['month'] == 'April' && $infos['day']<=30 || $infos['month'] == 'June' && $infos['day']<=30 || $infos['month'] == 'November' && $infos['day']<=30 || $infos['month'] == 'February' && $infos['day']<=29 || $infos['month'] == 'January' && $infos['day']<=31 || $infos['month'] == 'March' && $infos['day']<=31 || $infos['month'] == 'May' && $infos['day']<=31 || $infos['month'] == 'July' && $infos['day']<=31 || $infos['month'] == 'August' && $infos['day']<=31 || $infos['month'] == 'October' && $infos['day']<=31  || $infos['month'] == 'December' && $infos['day']<=31)
						{
							$network = array(
											     '0905' => Globe,
												 '0906'  => Globe,
												 '0915'  => Globe,
												 '0916'  => Globe,
												 '0917'  => Globe,
												 '0926'  => Globe,
												 '0927'  => Globe,
												 '0935'  => Globe,
												 '0936'  => Globe,
												 '0937'  => Globe,
												 '0908' =>  Smart,
												 '0909'  => Smart,
												 '0910'  => Smart,
												 '0912'  => Smart,
												 '0918'  => Smart,
												 '0919'  => Smart,
												 '0920'  => Smart,
												 '0921'  => Smart,
												 '0928'  => Smart,
												 '0929'  => Smart,
												 '0923'  => Sun,
												 '0932'  => Sun,
												 '0933'  => Sun,
												 '0942'  => Sun,
												 '0943'  => Sun,
											);
											
											$area = trim($this->escape_string($infos['txtarea']));
											
											foreach ($network as $key => $value) {
											    while (strpos($area, $key) === 0) {
											        $net_status = $value;
											        $area = substr($area, strlen($key));
											    }
											}
										
							$network_stat = $net_status;											
							$bdate = $this->escape_string($infos['month'])." ".$this->escape_string($infos['day'])." ".$this->escape_string($infos['txtyear']);
							$name = $this->escape_string($infos['txtname'])." ".$this->escape_string($infos['txtmi'])." ".$this->escape_string($infos['txtlname']);
							$contact = trim($this->escape_string($infos['txtarea'])).trim($this->escape_string($infos['txtcontact']));
							$update = "
								INSERT INTO hub_tbl (name,address,gender,b_day,phone_no,guardian,network_status,rdate)
								VALUES ('".$name."','".$this->escape_string($infos['txtaddress'])."','".$infos['gender']."','".$bdate."','".$contact."','".$this->escape_string($infos['txtguardian'])."','".$network_stat ."','".$this->escape_string($infos['txtdate'])."')
							";
							if (mysql_query($update)) 
							{
								echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#35B3E6" face="Arial" size = "5">'.'<center>'.'<b>'."Successful!".'</b>'.'</center>'.'</font>'.'</div>';;
								return TRUE;
							}
							echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#800000" face="Arial" size = "5">'.'<center>'.'<b>'."Inserting data Failed!".'</b>'.'</center>'.'</font>'.'</div>';
							return FALSE;
							$this->closedb();
					}else 
					{
						echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#800000" face="Arial" size = "5">'.'<center>'.'<b>'."Invalid BirthDate!".'</b>'.'</center>'.'</font>'.'</div>';
					}
				}else
				{
					echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#800000" face="Arial" size = "5">'.'<center>'.'<b>'."Do not leave blank Feilds!".'</b>'.'</center>'.'</font>'.'</div>';
				}
		}else
			{
				echo'<div class="counter">'. "Database error".'</div>';
			}
	}
	
	
	
	//function escape string
	function escape_string($string)
	{
	  
	 	return str_replace("'","''",$string);
	}
	 
	
	
	 //function for search
	 function main($search,$rad_id)
	 { 
		
	    if($this->connectdb("hub_db"))
		{
	       
			
			$escape=$this->escape_string($search);
				if($escape != NULL)
				{
					if($escape!= NULL && $rad_id == 4)
					{
						$replace_address = str_replace(" ","%",$escape);
						$query.= "network_status =  '$replace_address' ";	
						
					}
					elseif($escape!= NULL && $rad_id == 3)
					{
						$replace_address = str_replace(" ","%",$escape);
						$query.= "address like '%$replace_address%' ";	
						
					
					}elseif($escape!= NULL && $rad_id == 2)
					{
						$replace_name = str_replace(" ","%",$escape);
						$query.= "name like '%$replace_name%'";
						
					
					}elseif($escape!= NULL && $rad_id == 1)
					{
						$replace_bday = str_replace(" ","%",$escape);
						$query.= "b_day like '%$replace_bday%' ";
						
						
					
					}
							
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
									echo"<td>"."<b>"."#"."</b>"."</td>";
									echo"<td>"."<b>"."Name"."</b>"."</td>";
									echo"<td>"."<b>"."Gender"."</b>"."</td>";
									echo"<td>"."<b>"."Contact#"."</b>"."</td>";
									echo"<td>"."<b>"."Address"."</b>"."</td>";
									echo"<td>"."<b>"."Birthday" ."</b>"."</td>";
									echo"<td>"."<b>"."Guardian" ."</b>"."</td>";
									echo"<td>"."<b>"."Attendance" ."</b>"."</td>";
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
											echo"<td>". $row['name']."</td>";
											echo"<td>". $row['gender'] ."</td>";
											echo"<td>". $row['phone_no']."</td>";
											echo"<td>". $row['address'] ."</td>";
											echo"<td>". $row['b_day'] ."</td>";
											echo"<td>".$row['guardian'] ."</td>";
											echo"<td>".$row['Attendance'] ."</td>";
											
											echo"</tr>";
			
										}
				    				 	echo "</table>";
										echo '<a target="_blank"  href="data_view.php?id='.$escape.'">Print Preview</a>';
									}else
									{
										echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#800000" face="Arial">'.'<center>'.'<b>'."Record is not Existing!".'</b>'.'</center>'.'</font>'.'</div>';;
									}
											
					}else 
					{
						echo $_COOKIE['error_msg']='<div class="search_result">'.'<font color="#800000" face="Arial">'.'<center>'.'<b>'."You Searched for Nothing!".'</b>'.'</center>'.'</font>'.'</div>';;
						
					}
					
				
		   $this->closedb();
				
		}
		else
			{
				echo'<div class="counter">'. "Database error".'</div>';
			}
	 }
	 
	 
}
?>
