<?php 
$user = 'root' ;
$pwd = '';
$db = 'second';


$connect = new mysqli("localhost", $user, $pwd, $db);

/*if ($connect -> connect_error)
	die("connection failed:" . $connect->connect_error);
else
	echo "ok";*/

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$email = $_POST["Email"];
	$password=$_POST["Password"];


	$sql="select * from register";
	$result = $connect->query($sql);
	$flag=0;

	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{

			if($email==$row["Email"])
			{
				$flag=1;
				if($password==$row["Password"])
				{
					//header("Location:signin.html");
					//exit;
					header("Location:Other_Services.html");
				}

				else
				{
					echo "check password once";
					break;
				}
				
			}
		}
		if(($flag==0))
		{
			echo "Username is not found";
		}
	}
	else
	{
			echo 'Username is not found';
	}
}

$connect->close();


?>
