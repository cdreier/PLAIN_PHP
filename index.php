<?php 
session_start();

//loading base controller
require_once "lib/vendor/PLAIN_PHP/Controller.php";

//check if path is set and execute controller method
if(isset($_SERVER['PATH_INFO'])){
    Controller::execute($_SERVER['PATH_INFO']);
}else if( isset($_POST["PLAIN_PHP_AJAX"]) ){
    //ajax request found
    Controller::execute("/" . $_POST["class"] . "/" . $_POST["method"]);
}else{
    //no path is set, call default 
    Manual::index();
}

 ?>

<!DOCTYPE html>
<html lang="de">
    
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title><?php echo Controller::getTitle(); ?></title>

		<link type="text/css" rel="stylesheet" href="<?php echo Controller::PATH() ?>/lib/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo Controller::PATH() ?>/lib/css/style.css" />
		<?php Controller::injectStylesheets() ?>
		
        <?php Controller::_JSPATH(); ?>
        <script src="<?php echo Controller::PATH() ?>/lib/js/jquery-2.0.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Controller::PATH() ?>/lib/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Controller::PATH() ?>/lib/js/ajaxCall.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo Controller::PATH() ?>/lib/js/main.js" type="text/javascript" charset="utf-8"></script>
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
	        //check if render method is called and insert view
	        if(Controller::$shouldRender){
	            Controller::yield();
	        }
	         ?>
	         </div>
		</div>

	</body>

</html>
