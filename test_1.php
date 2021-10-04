<?php
session_start();
set_time_limit(5);
$servername = "localhost";
$username = "root";
$password = "";
$db_name="beacon";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);
$phpArray=array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
	$l=0;
	$sql="select * from parking where status=1";
	$result = mysqli_query($conn, $sql);
	$phpArray=array();
	if(mysqli_num_rows($result) > 0)
	{
		
    // output data of each row
		$i=0;
		
		while($row = mysqli_fetch_assoc($result)) 
		{
			//$x=$result[$l];
			//echo("<h1>".$row["parking_id"]."</h1>");
			$phpArray[$i]=$row["parking_id"];
			
			$i=$i+1;
			//$l=$l+1;
		}
		//$encoded_array=json_encode($phpArray);
		
	 

	}	
	else
	{
		$phpArray[0]="7";		
	}
	//sleep(2);
	/*<?php	
		header('Refresh:5;url=test_1.php');
		exit;?>*/
	
	

?>
<html>
	<head>
	</head>
	<body>
		
		<table border="border" style="position:absolute;left:30%;top:20%" width="500px" height="500px">
			<tr><td id="1"></td><td id="7" rowspan="3"></td><td id="4"></td>
			</tr>
			
			<tr><td id="2"></td><td id="5"></td>
			</tr>
			
			<tr><td id="3"></td><td id="6"></td>
			</tr>
		</table>
		
		<script type="text/javascript">
				var jArray=<?php echo json_encode($phpArray); ?>;
				var jstring=JSON.stringify(jArray);
				var jstring=JSON.parse(jstring);
				//document.writeln(jstring.length);
				var valid_ids=Array("1","2","3","4","5","6","7")
			for(var i=0;i<valid_ids.length;i++)
			{	if(jstring.indexOf(valid_ids[i])!=-1)
				{
					var td=document.getElementById(valid_ids[i]);
					td.style.backgroundColor="red";
				}
				else
				{
					var td=document.getElementById(valid_ids[i]);
					td.style.backgroundColor="limegreen";
				}
			}
			setInterval(function(){window.location.reload();},1000);
			
		
		</script>
	</body>
</html>
