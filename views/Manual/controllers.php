<h1><?php echo __("controllerTitle") ?></h1>

<p><?php echo __("controller_p1") ?></p>
<pre class="prettyprint">
class MyAwesomeController extends Controller {
    
}
</pre>
<p><?php echo __("controller_p2") ?></p>

<h3>linkTo</h3>
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
<h3>redirectTo</h3>
<p><?php echo __("controller_redirTo1") ?></p>
<p><?php echo __("controller_redirTo2") ?></p>
<pre class="prettyprint">
public static function login(){
    //a lot of validation
    if($success){
        MyAwesomeController::redirectTo("superSecretWebsite", 1);
    }
    
    //error - back to frontpage
    App::redirectTo("index");
    
    //unreachable code
    echo "yay";
}
</pre>


<br/>
<h3>render</h3>
<p><?php echo __("controller_render1") ?></p>
<?php //TODO: i18n with params to insert data like links ?>
<p>Ausführliches dazu gibts unter <a href="<?php echo Manual::linkTo("views"); ?>">render Views</a></p>

<br/>
<h3>renderPartial</h3>
<p>Die renderPartial Methode sucht die zugehörige View und rendert diese an der Stelle wo der Aufruf stattgefunden hat.</p>
<p>Ausführliches dazu gibts unter <a href="<?php echo Manual::linkTo("views"); ?>">render Views</a></p>

<br/>
<h3>always</h3>
<p>Die always Funktion wird bei jedem render Aufruf des Controllers ausgeführt. 
    So kann man z.B. Stylesheets oder Script in jeder render Methode eines Controllers laden oder eine Userauthentifizierung für einen 
    kompletten Controller gültig machen.</p>
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
<h3>addScript</h3>
<p>Es gibt immer wieder Javascripts, die man nur auf einer einzigen, oder auf nur wenigen Seiten gebrauchen kann.
Damit diese nicht bei jedem Seitenaufruf geladen werden müssen, kann man in der entsprechenden Controller Funktion die gewünschten Scripte laden</p>
<pre class="prettyprint">
public static function controllers(){
    self::addScript("prettify/prettify.js");
    self::addStylesheet("sunburst-theme.css");
    self::render();
}
</pre>


<br/>
<h3>addStylesheet</h3>
<p>Hat die gleiche Funktionalität wie addScript, nur für Stylesheets</p>
<p>Ebenso im Beispiel oben vorhanden</p>

<br/>
<h3>isActive</h3>
<p>Die isActive Funktion versucht anhand der URL und der renderArgs (der View) herauszufinden ob der Controller von dem der Aufruf stammt, auch grade angezeigt wird</p>
<p>Als optionaler Parameter kann die View (bzw die Funktion) mitgegeben werden, so wird das "active" zusätzlich auf die View beschränkt</p>
<p>Ein aktuelles Beispiel: auf der aktuellen Seite wird das Seitenmenü nur angezeigt wenn man sich im Manual Controller befindet, bzw. in Manual::controllers ein zusätzlicher Style ausgegeben</p>
<pre class="prettyprint">
if(Manual::isActive()){
    //render side menu
    Manual::sideMenu();
}    
//for active state in menu
if(Manual::isActive("controllers")) echo "style='color: blue;'";
</pre>


<br/>
<h3>keep & get</h3>
<p>Die keep Funktion speichert key - value Paare in eine eigene Session, allerdings nur so lange bis sie mit der get Funktion wieder herausgeholt wurden.</p>
<p>So kann man sich ohne auf die GET Parameter zurückgreiffen zu müssen, Informationen über einen oder mehrere Requests und Controller hinweg behalten.</p>
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


