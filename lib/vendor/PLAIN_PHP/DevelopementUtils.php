<?php 

namespace PLAIN_PHP;

class DevelopementUtils {
	
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
				}
				#plainDev:hover{
					height: 100px;
					width: 100px;
				}
			</style>
			<div id="plainDev">
				<p>[+]</p>
			</div>
			<?php 
		}
	}
	
}

 ?>