If you want to display the disk usage of your server directly from the application, you can use the api2 from cpanel. 
The sitaxis is as follows:

<?php
// var
$usu = "myusu";
$pass = "mypass";
$domain = "mydomain.com";
$port = "2083"; //protocol use https

// query
$query =  $domain. ":". $port. "/ Json-api / cpanel? Cpanel_jsonapi_user = user & cpanel_jsonapi_apiversion = 2 & cpanel_jsonapi_module = DiskUsage & cpanel_jsonapi_func = fetchdiskusagewithextras";

// Consult
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($curl, CURLOPT_HEADER,0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
$header[0] = "Authorization: Basic " . base64_encode($usu.":".$pass) . "\n\r";
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_URL, $query);
$result = curl_exec($curl);
if ($result == false) {
    error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");
}
curl_close($curl);



// prin in json
// print $result;


// Check values in json trees
$total;
$usado;
$i=1; $x=1;
$dato=json_decode($result, true);
foreach ($dato as $indice => $valor) {
 foreach ($dato['cpanelresult'] as $indice2 => $valor2) {
 	foreach ($dato['cpanelresult']['data'] as $indice3 => $valor3) {
 		foreach ($dato['cpanelresult']['data']['0'] as $indice4 => $valor4) {
	 		if($indice4=='quotaused' && $i==1){
	 		$usado=$valor4;
	 		$i++;
	 		}
	 		if($indice4=='quotalimit' && $x==1){
	 		$total=$valor4;
	 		$x++;
	 		}
	 	}
 	}
 }
}

// Extract values
$porciento=($usado/$total*100); // percentage of quota usage
$totalmb=round(($total/1048576),2);  // Double value with two decimal characters in MB for the total
$usadomb=round(($usado/1048576),2);  // Double value with two decimal characters in MB for use
$diferenciamb=round((($total-$usado)/1048576),2); // Double value with two decimal characters in MB for the difference

//1048576 == 1MB
?>
