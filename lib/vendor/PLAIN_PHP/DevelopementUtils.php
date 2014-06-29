<?php 
use PLAIN_PHP\Controller;

class DevelopementUtils extends Controller{
	
	public static function createController(){
		$newController = "controllers/" . $_POST["name"] . ".php";
        if(!is_file($newController)){
            //create controller file
            $c = file_get_contents("lib/vendor/PLAIN_PHP/misc/ControllerTemplate.php");
            $c = str_replace("ClassName", $_POST["name"], $c );
            file_put_contents($newController, "<?php\n".$c."\n?>");
            
            //create view
            mkdir("views/" . $_POST["name"] );
            file_put_contents("views/" . $_POST["name"] . "/index.php", "<?php PLAIN_PHP\Template::extend(\"index\") ?> \n\n <h1>Index from " . $_POST["name"] . "</h1>");
        }
        
        $_POST["name"]::redirectTo("index");
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