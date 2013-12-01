<h1><?php echo __("controllerTitle") ?></h1>

<p><?php echo __("controller_p1") ?></p>
<pre class="prettyprint">
class MyAwesomeController extends Controller {
    
}
</pre>
<p><?php echo __("controller_p2") ?></p>

<h3 id="linkTo"><?php echo __("controller_linkTo") ?></h3>
<p><?php echo __("controller_linkTo1") ?></p> 
<pre class="prettyprint">
//without custom routes
MyAwsomeController::linkTo("moreAwesomerFunction");
// returns http://localhost/PHP_PLAIN/index.php/MyAwsomeController/moreAwsomerFunction
</pre>
<p><?php echo __("controller_linkTo2") ?></p> 
<pre class="prettyprint">
//config/routes.php
$_ROUTES = array(
	"/awsome/{value}" => "MyAwsomeController::awesomeFunction",
	"/debug/{value}/test/{yay}" => "MyAwsomeController::moreAwesomerFunction"
);	
	
MyAwsomeController::linkTo("awesomeFunction", 33);
// returns http://localhost/PHP_PLAIN/index.php/awsome/33

MyAwsomeController::linkTo("moreAwesomerFunction", "33", "AWESOME"); // or
MyAwsomeController::linkTo("moreAwesomerFunction", array("33", "AWESOME"));
// returns http://localhost/PHP_PLAIN/index.php/debug/33/test/AWESOME

//in the controller
public static awesomeFunction($id){
    //$id = 33
    $post = Doctrine_Core::getTable("Post")->find($id);
}

public static moreAwesomerFunction($id, $test){
    //$id = 33, $test = "AWESOME"
    $post = Doctrine_Core::getTable("Post")->find($id);
}
</pre>

<br/>
<h3 id="redirTo"><?php echo __("controller_redirTo") ?></h3>
<p><?php echo __("controller_redirTo1") ?></p>
<p><?php echo __("controller_redirTo2") ?></p>
<pre class="prettyprint">
public static function login(){
    //a lot of validation
    if($success){
        MyAwesomeController::redirectTo("superSecretWebsite", 333);
    }
    
    //error - back to frontpage
    App::redirectTo("index");
    
    //unreachable code
    echo "yay";
}
</pre>


<br/>
<h3 id="render"><?php echo __("controller_render") ?></h3>
<p><?php echo __("controller_render1") ?></p>
<p><?php echo __("controller_render2", Manual::linkTo("views")) ?></p>

<br/>
<h3 id="controller_renderPartial"><?php echo __("controller_renderPartial") ?></h3>
<p><?php echo __("controller_renderPartial1") ?></p>
<p><?php echo __("controller_renderPartial2", Manual::linkTo("views")) ?></p>

<br/>
<h3 id="always"><?php echo __("controller_always") ?></h3>
<p><?php echo __("controller_always1") ?></p>
<pre class="prettyprint">
public static function always(){
    
    if($userValidationFailed){
        App::redirectTo("index");
    }
    
    self::addScript("prettify.js");
    self::addStylesheet("sunburst-theme.css");
}
</pre>


<br/>
<h3 id="addScript"><?php echo __("controller_addScript") ?></h3>
<p><?php echo __("controller_addScript1") ?></p>
<pre class="prettyprint">
public static function controllers(){
    self::addScript("prettify/prettify.js");
    self::addStylesheet("sunburst-theme.css");
    self::render();
}
</pre>


<br/>
<h3 id="addStylesheet"><?php echo __("controller_addStylesheet") ?></h3>
<p><?php echo __("controller_addStylesheet1") ?></p>
<p><?php echo __("controller_addStylesheet2") ?></p>

<br/>
<h3 id="isActive"><?php echo __("controller_isActive") ?></h3>
<p><?php echo __("controller_isActive1") ?></p>
<p><?php echo __("controller_isActive2") ?></p>
<p><?php echo __("controller_isActive3") ?></p>
<pre class="prettyprint">
if(Manual::isActive()){
    //render side menu
    Manual::sideMenu();
}    
//for active state in menu
if(Manual::isActive("controllers")) echo "style='color: blue;'";
</pre>


<br/>
<h3 id="keepGet"><?php echo __("controller_keepGet") ?></h3>
<p><?php echo __("controller_keepGet1") ?></p>
<p><?php echo __("controller_keepGet2") ?></p>
<pre class="prettyprint">
public static function perhapsYouNeverUseThisFeature(){
    //store the new created object id in the temp session
    self::keep("aNewPrimaryKey", 33);
}


public static function soYouUsedItThenGetItBack(){
    //returns 33
    self::get("aNewPrimaryKey");
    
    //returns null, you already got the value back
    self::get("aNewPrimaryKey");
}
</pre>


<br/>
<h3 id="renderContent"><?php echo __("controller_renderContent"); ?></h3>
<p><?php echo __("controller_addSetRenderContent1") ?></p>
<p><?php echo __("controller_addSetRenderContent2") ?></p>
<pre class="prettyprint">
    // App::index 
    App::addRenderContent("subtitle", "PLAIN_PHP is really simple, fast and i enjoy coding with it");
    
    // some view
    &lt;?php echo Controller::getRenderContent("subtitle"); ?&gt;
</pre>


<br/>
<h3 id="setTitleTitle"><?php echo __("controller_getSetTitleTitle") ?></h3>
<p><?php echo __("controller_getSetTitle") ?></p>
<pre class="prettyprint">
    //in Manual controller 
    self::setTitle("PLAIN_PHP - Manual");
    
    //in the index.php file
    &lt;title&gt;&lt;?php echo Controller::getTitle(); ?&gt;&lt;/title&gt;
</pre>