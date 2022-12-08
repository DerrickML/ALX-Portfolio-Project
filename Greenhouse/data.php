<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'localhost');
define('DB_USERNAME','wlgykctu_agro');
define('DB_PASSWORD','@ALXGrow1.');
define('DB_NAME','wlgykctu_alx');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
    die("Connection failed: ". $mysqli->error);
}

//query to get data from the table
$no = 66;
// $no;  //24Hr = 312

if(isset($_POST['value'])){
    $no=$_POST['value'];
    if($no == ''){
        $no=312;
    }
    else{
        $no = $_POST["value"];
    }
}
//$query = sprintf("SELECT moisture, LightIntensity, Temperature, Humidity, timestamp FROM moisture ORDER BY ID DESC  LIMIT 8");
$query = sprintf("SELECT * FROM (SELECT * FROM moisture ORDER BY ID DESC LIMIT $no) sub ORDER BY ID ASC");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach($result as $row){
    $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print data
print json_encode($data);