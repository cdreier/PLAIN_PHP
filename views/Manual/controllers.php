<h1>Controllers</h1>

<p>Jeder Controller der mit dem Framework benutzt werden soll (d.h. rendern, Links zu Funktionen etc) muss von der Controller.php Klasse erben:</p>
<pre class="prettyprint">
class MyAwesomeController extends Controller {
    
}
</pre>
<p>Jeder Controller erbt dadurch eine ganze Reihe nützlicher Funktionen</p>

<h3>linkTo</h3>
<p>Sollte immer bei einer Verlinkung innerhalb des Frameworks benutzt werden, da durch das Routing immer absolute Links benötigt werden.</p> 
<pre class="prettyprint">
MyAwsomeController::linkTo("moreAwesomerFunction");
// returns http://localhost/PHP_PLAIN/index.php/MyAwsomeController/moreAwsomerFunction
</pre>
<p>Da es bei der Anzeige von Daten immer notwendig ist, eine ID o.ä. mit zu schicken, gibt es die Möglichkeit einen 2. Parameter zu übergeben,
    der dann als Parameter in der entsprechenden Controllerfunktion erscheint</p>
<pre class="prettyprint">
MyAwsomeController::linkTo("moreAwesomerFunction", 33);
// returns http://localhost/PHP_PLAIN/index.php/MyAwesomeController/moreAwesomerFunction/33

//in the controller
public static moreAwesomerFunction($id){
    //$id = 33
    $post = Doctrine_Core::getTable("Post")->find($id);
}
</pre>

<br/>
<h3>redirectTo</h3>
<p>Wird genauso wie die linkTo Funktion verwendet um zB nach einem Login 2 verschiedene Wege einschlagen.</p>
<p>Nach einem Redirect wird kein weiterer Code mehr ausgeführt</p>
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
<p>Die render Methode sucht die zugehörige View und rendert diese auf der index.php</p>
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


