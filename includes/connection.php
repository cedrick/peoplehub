<?php 
Class Connection {

		var $connection;

		function connectdb($database) {
			$this->connection = mysql_connect("localhost","root","");
			                            if($this->connection)
										   {
											   if(mysql_select_db($database))
											      {
													return TRUE;
												  }
												  
												else{
													  return FALSE;
												    }
										   }
										   
										 else{ echo "Error Connection";}
										 
				 						
										
		                               }


		function closedb() {
								mysql_close($this->connection) or die("Unable to close database: ");
								$this->connection = false;
								return;
							}
							
		







}

?>