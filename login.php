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
	$fname = $_POST["username"];
	$pass=$_POST["password"];


	$sql="select * from login";
	$result = $connect->query($sql);
	$flag=0;

	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{

			if($fname==$row["email"])
			{
				$flag=1;
				if($pass==$row['password'])
				{
					//header("Location:signin.html");
					//exit;
					header("Location:Domestic_Services.html");
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
