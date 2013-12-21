<?php
$spreadsheet_url="https://docs.google.com/spreadsheet/pub?key=0Api8y3Iuwmc6dHhLUHhnX0o4WXllTG41TDhqWWREemc&single=true&gid=1&output=csv";

if(!ini_set('default_socket_timeout',    15)) echo "<!-- unable to change socket timeout -->";

if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $spreadsheet_data[]=$data;
        }
    
    fclose($handle);
    // print_r($spreadsheet_data);
    $firstElement = true;
    foreach ($spreadsheet_data as $spreadsheet) {
    	if($firstElement){
    		$firstElement = false;
    	}else{
    		$gemeentes[] = $spreadsheet[1];
    	}
    	
    }
}
else
    die("Problem reading csv");
foreach ($gemeentes as $gemeente) {
	echo $gemeente;
}
?>