<?php
	$user= 'root';
	$pwd='';
	$db='second';
	$connect= new mysqli('localhost',$user,$pwd,$db) or die('Unable to connect database');
	
	



	echo "Successfully register done!";





	$first=$_POST["Firstname"];
	$last=$_POST["Lastname"];
	$mail=$_POST["Email"];
	$mobile=$_POST["Mobileno"];
	$address=$_POST["Address"];
	$username=$_POST["username"];
	$password=$_POST["Password"];
	$cpassword=$_POST["cpassword"];
	
	
	
	$sql= "select * from register";
	$result= $connect->query($sql);
	
	$flag=0;
	
	if($result->num_rows>0)
	{
		while($rows=$result->fetch_assoc())
		{
			if($mail==$rows['Email'])
			{
				$flag=1;
				echo "Username alredy exists";
				echo $mail;
				echo $rows['Email'];
				
				break;
			}
		}
			if($flag==0){ 
				$newrow="insert into register values ('$first','$last','$mail','$mobile','$address','$username','$password','$cpassword')";
				if ($connect->query($newrow))
				{ 

				}
				
				else{ }
					
					}
				
	
	
	}
	else{
	$newrow="insert into register values ('$first','$last','$mail','$mobile','$address','$username','$password','$cpassword')";
				if ($connect->query($newrow))
				{
					
				}
				else
					echo "not connected";
					echo $connect->error;
	}
	
	$connect->close();
	
	
	
	
	?>

