<?php
	
	$cs = Yii::app()->clientScript;

	if($this->id != 'site'){
		//css
		$cs->registerCssFile($this->getAssetsUrl().'/style/system.css');

		$cs->registerScriptFile($this->getAssetsUrl().'/js/menu.js', CClientScript::POS_HEAD);
	}

	$cs->registerCssFile($this->getAssetsUrl().'/style/init.css');

	/*$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/style.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui/overcast/jquery-ui-1.10.3.custom.min.css');
	//$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox-buttons.css');
	
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
	//$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox-buttons.js', CClientScript::POS_END);
	//$cs->registerScriptFile('http://api-maps.yandex.ru/2.0.27/?load=package.standard&lang=ru-RU', CClientScript::POS_HEAD);
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.timepicker.addon.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.ui.timepicker.ru.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/common.js', CClientScript::POS_END);*/
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<meta content="index,follow" name="robots">
    	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

    	<link href="/files/images/site/favicon.ico" rel="shortcut icon">
		
		<title><?php echo $this->title; ?></title>
		<!--[if IE]>
	    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	</head>
	<body class="404_page">				
    <div class="width_520">
        <p class="logo"></p>
        <div class="description">
            <?php echo $content; ?>
        </div>
    </div>
</body>
</html>