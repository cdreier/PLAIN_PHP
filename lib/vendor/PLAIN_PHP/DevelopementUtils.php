<?php 
use PLAIN_PHP\Controller;

class DevelopementUtils extends Controller{
	
	public static function createController(){
		//create controller
        self::mkController($_POST["name"]);
        //create view
        self::mkView($_POST["name"], "index");
        
        $_POST["name"]::redirectTo("index");
	}
    
    public static function createView($controller, $view){
        self::mkView($controller, $view);
        $controller::redirectTo($view);
    }

    private static function mkController($name){
        $newController = "controllers/" . $name . ".php";
        if(!is_file($newController)){
            //create controller file
            $c = file_get_contents("lib/vendor/PLAIN_PHP/misc/ControllerTemplate.php");
            $c = str_replace("ClassName", $name, $c );
            file_put_contents($newController, "<?php\n" . $c . "\n?>");
            
        }
    }
    
    private static function mkView($controller, $view){
        $path = "views/" . $controller;
        mkdir( $path );
        if(!is_file($path . "/" . $view . ".php")){
            file_put_contents($path . "/" . $view . ".php", "<?php PLAIN_PHP\Template::extend(\"index\") ?> \n\n<h1>$view View from $controller</h1>");
        }
    }    
    
	
	public static function devMenu(){
		if(PLAIN_PHP_DEV){
			
			?>
			<style>
				#plainDev{
					width: 20px;
					height: 20px;
					position: fixed;
					bottom: 0px;
					right: 0px;
					background-color: #33B5E5;
					padding: 5px;
				}
				#plainDev:hover{
					height: 200px;
					width: 200px;
				}
				#plainDev p{
					position: absolute;
					bottom: 1px;
					right: 1px;
					margin: 0;
				}
				#plainDev input{
					width: 100%;
				}
			</style>
			<div id="plainDev">
				<h5>new Controller</h5>
				<form action="<?php echo self::linkTo("createController") ?>" method="post">
					<input type="text" name="name" placeholder="Controller-name" />
					<br>
					<input type="submit" value="save" />
				</form>
				<hr>
				
				<p>[+]</p>
			</div>
			<?php 
		}
	}
	
}

 ?>