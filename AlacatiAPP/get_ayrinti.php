

<?php

$response = array();
 
if (isset($_POST['mekanAdi'])){
 

 
    $mekan = $_POST['mekanAdi'];

    // include db connect class
     require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
	
	
	 $result = mysql_query("SELECT * FROM Mekanlar WHERE adi = '$mekan' ");
	 
	 $response["mekanlar"] = array();
	 
	  
	
    $Sorunlu = array("\u00fc","\u011f","\u0131","\u015f","\u00e7","\u00f6","\u00dc","\u011e","\u0130","\u015e","\u00c7","\u00d6");
	$Duzeltilecek = array("u","ğ","ı","ş","c","ö","Ü","Ğ","İ","Ş","Ç","Ö");
	
	 $response["success"] = 1;
	 
	 while ($results = mysql_fetch_assoc($result)) 
	{
	
			$bilgiler = array();
			$bilgiler["mekan_adi"] = $results["adi"];
			$bilgiler["mekan_turu"] = $results["turu"];
			$bilgiler["mekan_yil"] = $results["yapim_yili"];
			$bilgiler["mekan_kalite"] = $results["kalitesi"];
			
	array_push($response["mekanlar"], $bilgiler);

	}
 echo $Duzelmis = str_replace($Sorunlu, $Duzeltilecek, json_encode($response));

 }
  else {

    $response["success"] = 0;
    $response["message"] = "Olmadi kardo";

    echo json_encode($response);

 }

 ?>
 
 