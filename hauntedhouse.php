<!DOCTYPE HTML> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $roadErr = "";
$name = $email = $gender = $comment = $website = $road = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
   if (empty($_POST["road"])) {
	 $roadErr = "road is required";
	} else {
	 $road = test_input($_POST["road"]);
	}
	
	$command="python search.py $road";
	//use the passthru command to execute and return the result

	$buffer='';
	ob_start(); // prevent outputting till you are done
	passthru($command);
  
	//get the result out
	$buffer=ob_get_contents();
	//clean up the buffer
	ob_end_clean();
	//echo the result
	//$file = file_get_contents('./data.txt',true);
	if($road == "臺北市中正區濟南路"){
		$path = "taip1.txt";
	} elseif ($road=="臺北市大安區信義路") {
		$path = "taip2.txt";
	} elseif ( $road=="臺北市大安區復興南路") {
		$path = "taip3.txt";
	} else if ($road=="新北市蘆洲區民族路") {
		$path = "newtp1.txt";
	} else if ($road=="新北市中和區景平路") {
		$path = "newtp2.txt";
	} else if ($road=="新北市永和區民有街") {
		$path = "newtp3.txt";
	} else if ($road=="基隆市信義區東明路") {
		$path = "keel1.txt";
	} else if ($road=="桃園縣桃園市朝陽街") {
		$path = "taoy1.txt";
	} else if ($road=="臺中市西區後龍街") {
		$path = "taic1.txt";
	} else if ($road=="臺南市東區長榮路") {
		$path = "tain1.txt";
	}
	$file = fopen($path,"r");

	
	
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Hanuted House</h2>
<p><span class="error">Choose address</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   
   <select size = "10" name = "road">
	<option <?php if (isset($road) && $road=="臺北市中正區濟南路") echo "checked";?> value = "臺北市中正區濟南路">臺北市中正區濟南路二段62巷</option>
	<option <?php if (isset($road) && $road=="臺北市大安區信義路") echo "checked";?> value = "臺北市大安區信義路">臺北市大安區信義路三段109號</option>
	<option <?php if (isset($road) && $road=="臺北市大安區復興南路") echo "checked";?> value = "臺北市大安區復興南路"> 臺北市大安區復興南路二段成功國宅第38棟5樓</option>
	<option <?php if (isset($road) && $road=="新北市蘆洲區民族路") echo "checked";?> value = "新北市蘆洲區民族路">新北市蘆洲區民族路422巷114弄13至31號</option>
	<option <?php if (isset($road) && $road=="新北市中和區景平路") echo "checked";?> value = "新北市中和區景平路">新北市中和區景平路180至190號</option>
	<option <?php if (isset($road) && $road=="新北市永和區民有街") echo "checked";?> value = "新北市永和區民有街">新北市永和區民有街67巷4號2樓</option>
	<option <?php if (isset($road) && $road=="基隆市信義區東明路") echo "checked";?> value = "基隆市信義區東明路">基隆市信義區東明路77巷1弄16-3號</option>
	<option <?php if (isset($road) && $road=="桃園縣桃園市朝陽街") echo "checked";?> value = "桃園縣桃園市朝陽街">桃園縣桃園市朝陽街101號</option>
	<option <?php if (isset($road) && $road=="臺中市西區後龍街") echo "checked";?> value = "臺中市西區後龍街">臺中市西區後龍街35號</option>
	<option <?php if (isset($road) && $road=="臺南市東區長榮路") echo "checked";?> value = "臺南市東區長榮路">臺南市東區長榮路四段135巷15號</option>
	
	<span class="error">* <?php echo $roadErr;?></span>
   </select>
   
   <input type="submit" name="submit" value="Submit"> 
</form>




<?php
echo "<h2>平均房價(每單位)</h2>";
echo "<br>";
echo "<h2>路段：</h2>";
echo $road;
echo "<br>";
echo "<h2>元/坪 ：</h2>";
echo $buffer;
echo "<br>";
echo "<h2>事故：</h2>";
if($file){
while ( $line = fgets($file, 1000) ) {
print $line;
echo "<br>";
	}
}
?>



</body>
</html>
