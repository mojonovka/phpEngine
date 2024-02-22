<?php

include_once 'setting.php';

echo PHP_VERSION;

echo '-- '.$_SERVER['REQUEST_URI'];

if ($_SERVER['REQUEST_URI'] == '/'){
	
	echo '<br />';
	echo '-- REQUEST_URI = "/"';
	$Page = 'index';
	$Module  = 'index';	
	
} else {
	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	echo '<br />';	

	var_dump(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));	
	
	$URL_Parts = explode('/', trim($URL_Path, '/'));
	print_r($URL_Parts);	
	
	$Page = array_shift($URL_Parts);
	echo '<br />';
	printf("-- Page = %s", $Page);
	
	$Module = array_shift($URL_Parts);
	echo '<br />';
	printf("--Module = %s", $Module);
	
	if(!empty($Module)){
		$Param = array();
		for($i = 0; $i < count($URL_Parts); $i++){
			$Param[$URL_Parts[$i]] = $URL_Parts[++$i];			
		}
	}	
}

echo '<br />';

if($Page == 'phpself' && $Module == ''){
	echo 'Главная страница';
} else if ($Page == 'phpself' && $Module == 'photo'){
	echo 'Фотогалерея';
} else if ($Page == 'phpself' && $Module == 'comment'){
	echo 'Коментарии';
} else if ($Page == 'phpself' && $Module == 'register'){
	echo 'Регистрация';
}

?>