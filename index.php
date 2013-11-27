<?php 
session_start();

//loading base controller
require_once "lib/vendor/PLAIN_PHP/Controller.php";

//check if path is set and execute controller method
if(isset($_SERVER['PATH_INFO'])){
    Controller::execute($_SERVER['PATH_INFO']);
}else{
    //no path is set, call default 
    Manual::index();
}

// Doctrine_Core::dropDatabases();
// Doctrine_Core::createDatabases();
// Doctrine_Core::generateModelsFromYaml('schema.yml', 'models');
// Doctrine_Core::createTablesFromModels('models');

 ?>

<!DOCTYPE html>
<html lang="de">
    
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title><?php echo Controller::getTitle(); ?></title>

		<link type="text/css" rel="stylesheet" href="<?php echo App::PATH() ?>/lib/css/normalize.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo App::PATH() ?>/lib/css/style.css" />
		<?php Controller::injectStylesheets() ?>
		
        <?php App::_JSPATH(); ?>
        <script src="<?php echo App::PATH() ?>/lib/js/jquery-2.0.3.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo App::PATH() ?>/lib/js/ajaxCall.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?php echo App::PATH() ?>/lib/js/main.js" type="text/javascript" charset="utf-8"></script>
        <?php Controller::injectScripts() ?>
        
	</head>
	
	<body>
		
	    <?php 
	    if(Manual::isActive()){
            Manual::sideMenu();
        }
	     ?>
	    
	    <div id="content">
        <?php
        //check if render method is called and insert view
        if(Controller::$shouldRender){
            Controller::yield();
        }
         ?>
         </div>

	</body>

</html>
