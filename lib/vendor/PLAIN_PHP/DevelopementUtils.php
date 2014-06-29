<?php 

class DevelopementUtils {
	
	public static function always(){}
	
	public static function createController(){
		echo $_POST["name"];
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
				<form action="<?php echo PLAIN_PHP_ROOT ?>index.php/DevelopementUtils/createController" method="post">
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