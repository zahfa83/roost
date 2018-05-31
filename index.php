<?php

function writeLog($data)
{
		$timenow = date('Y-m-d H:s:i'); 
        $myFile = "roost.log";
        $fh = fopen($myFile, 'a') or die("can't open file");
        fwrite($fh, $timenow." - ".$data."\n");
        fclose($fh);
}

function main()
{
	// Prevent caching.
	header('Cache-Control: no-cache, must-revalidate');
	
	// The JSON standard MIME header.
	header('Content-type: application/json');
	
	$json=file_get_contents('php://input');
	
	writeLog($json);
	
	//if(strlen($json) == 0){
	//if(!empty($json)){	
		$obj=json_decode($json,true);
		$myArr = array('result'=>'OK');
		$res = json_encode($myArr);
		
	//}
	/*
	else{
		$myArr = array('result'=>'Empty body');
		$res = json_encode($myArr);
	}
	*/
	echo $res;
}

main();

?>