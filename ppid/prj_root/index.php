<?php
// phpinfo();
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 	//echo $uri;
	header('Location: '.$uri.'public');
	exit;
?>
