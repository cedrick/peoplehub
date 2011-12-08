<?php
 
include ("connection.php");
Class Check extends Connection
{
    
	//function for registration
	function register($infos = array())
	{
		if($this->connectdb("hub_db"))
		{
				if($infos['month']!=NULL && $infos['day']!=NULL && $infos['txtyear']!=NULL && $infos['txtname']!=NULL && $infos['txtmi']!=NULL && $infos['txtlname']!=NULL && $infos['txtaddress']!=NULL && $infos['gender']!=NULL && $infos['txtcontact']!=NULL && $infos['txtguardian']!=NULL && $infos['txtdate']!=NULL)
				{
					
					if($infos['month'] == 'September' && $infos['day']<=30 || $infos['month'] == 'April' && $infos['day']<=30 || $infos['month'] == 'June' && $infos['day']<=30 || $infos['month'] == 'November' && $infos['day']<=30 || $infos['month'] == 'February' && $infos['day']<=29   )
						{
							$bdate = $this->escape_string($infos['month'])." ".$this->escape_string($infos['day'])." ".$this->escape_string($infos['txtyear']);
							$update = "
								INSERT INTO hub_tbl (name,mi,lname,address,gender,b_day,phone_no,guardian,rdate)
								VALUES ('".$this->escape_string($infos['txtname'])."','".$this->escape_string($infos['txtmi'])."','".$this->escape_string($infos['txtlname'])."','".$this->escape_string($infos['txtaddress'])."','".$infos['gender']."','".$bdate."','".$this->escape_string($infos['txtcontact'])."','".$this->escape_string($infos['txtguardian'])."','".$this->escape_string($infos['txtdate'])."')
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
					if($escape!= NULL && $rad_id == 3)
					{
						$replace_address = str_replace(" ","%",$escape);
						$query.= "address like '%$replace_address%' ";	
						
					
					}elseif($escape!= NULL && $rad_id == 2)
					{
						$replace_name = str_replace(" ","%",$escape);
						$query.= "name like '%$replace_name%' OR mi like '%$replace_name%' OR lname like '%$replace_name%'";
						
					
					}elseif($escape!= NULL && $rad_id == 1)
					{
						$replace_bday = str_replace(" ","%",$escape);
						$query.= "b_day like '%$replace_bday%' ";
						
						
					
					}
							
						 $sql= "
								Select * From hub_tbl Where $query
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
											echo"<td>". $row['name']." ".$row['mi']." ".$row['lname']."</td>";
											echo"<td>". $row['gender'] ."</td>";
											echo"<td>". $row['phone_no']."</td>";
											echo"<td>". $row['address'] ."</td>";
											echo"<td>". $row['b_day'] ."</td>";
											echo"<td>".$row['guardian'] ."</td>";
											
											echo"</tr>";
			
										}
				    				 	echo "</table>";
										
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
