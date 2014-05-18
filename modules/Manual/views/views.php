<h1><?php echo __("viewsTitle") ?></h1>
<p><?php echo __("views_p1") ?></p>
<h3 id="render"><?php echo __("views_render") ?></h3>
<pre class="prettyprint">
class Manual extends Controller{
    public static function views(){
        //renders the file in views/Manual/views.php
        self::render();
    }
}
</pre>
<p><?php echo __("views_render1") ?></p>
<p><?php echo __("views_render2") ?></p>
<p><?php echo __("views_render3") ?></p>
<pre class="prettyprint">
//index.php
if(Controller::$shouldRender){
    Controller::yield();
}
</pre>

<p><?php echo __("views_render4") ?></p>
    
<pre class="prettyprint">
public static function welcome(){
    self::render(array(
        "name" => "Ralf",
        "gender" => "Frau"
    ));
}
</pre>
<pre class="prettyprint lang-php">
//welcome.php
echo "Herzlich Willkommen $gender $name";
//wird ausgegeben als
Herzlich Willkommen, Frau Ralf 
</pre>


<br />
<h3 id="renderPartial"><?php echo __("views_renderPartial") ?></h3>
<p><?php echo __("views_renderPartial1") ?></p>
<pre class="prettyprint">
//index.php
if(Manual::isActive()){
    //the side menu is rendere right here
    Manual::sideMenu();
}

//Manual.php Controller
public static function sideMenu(){
    self::renderPartial();
}
</pre>
<p><?php echo __("views_renderPartial2") ?></p>
<p><?php echo __("views_renderPartial3", Manual::linkTo("ajax")."#ajax_php") ?></p>
