<!DOCTYPE html>
<html lang="de">
    
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title><?php echo Controller::getTitle(); ?></title>

		<link type="text/css" rel="stylesheet" href="<?php echo Controller::PATH() ?>/public/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo Controller::PATH() ?>/public/css/style.css" />
		<?php Controller::injectStylesheets() ?>
		
        <?php Controller::_JSPATH(); ?>
        <script src="<?php echo Controller::PATH() ?>/public/js/jquery-2.0.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Controller::PATH() ?>/public/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Controller::PATH() ?>/public/js/ajaxCall.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Controller::PATH() ?>/public/js/main.js" type="text/javascript" charset="utf-8"></script>
        <?php Controller::injectScripts() ?>
        
	</head>
	
	<body >
		
		<div class="container">
			<nav class="col-md-3 col-sm-3" >
		    <?php 
		    if(Manual::isActive()){
	            Manual::sideMenu();
	        }
		     ?>
			</nav>
		    
		    
		    
		    
		    <div id="content" class="col-md-9 col-sm-9">
	        <?php
	        $template->_yield();
	         ?>
	         </div>
		</div>

	</body>

</html>
