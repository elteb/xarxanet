<?php
	//Configuration
	$ws_key = "9f44c9f651023f2799b0e72acdaf28e3";
	$ws_url = "http://www.xarxanet.org/xmlrpc.php";
	$tid = "13529";

	//Check CAPTCHA
	if (md5($_POST['captcha']) == $_POST['hash']){
		$name = (isset($_POST['name'])) ? $_POST['name'] : '';
		$email = (isset($_POST['name'])) ? '<'.$_POST['email'].'>' : $_POST['email'];
		$request = xmlrpc_encode_request($_POST['method'], array($ws_key, $name.$email, $tid));
		$context = stream_context_create(array('http' => array(
											'method' => "POST",
											'header' => "Content-Type: text/xml",
											'content' => $request
										)));
		$file = file_get_contents($ws_url, false, $context);
		$response = xmlrpc_decode($file);
		if (empty($response)){
			echo 3;
		} else {
			echo 1;
		}
	}else{
		echo 2;
	}
?>
