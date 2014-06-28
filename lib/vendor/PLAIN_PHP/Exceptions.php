<?php 
namespace PLAIN_PHP;

class Exceptions {
	
	
	public static function VIEW_NOT_FOUND($view){
		
		
		//check if in dev mode, ask for creation
		
		//else
		self::throws("VIEW NOT FOUND: " . $view);
	}
	
	public static function CONFIG_NOT_FOUND($forClass){
		//check if in dev mode, ask for creation
		
	}
	
	public static function throws($reason){
		self::head($reason);
		self::help("TODO: ask if view should be created");
		exit();
	}
	
	private static function help($text){
		echo '<div style="width: 100%; background-color: #33B5E5; padding: 20px;">';
		echo $text;
		echo '</div>';
	} 
	
	private static function head($text){
		?>
		<style>
			body{
				margin: 0px;
				padding: 0px;
				font-family: Arial, Helvetica, sans-serif;
			}
		</style>
		<div style="width: 100%; background-color: #FF4444; padding: 20px;">
			<h1 style="color: white; ">
				<?php echo $text; ?>
			</h1>
		</div>
		<?php 
	}
	
}

 ?>