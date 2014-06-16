<h1>Views and Templates</h1>
<p>To finally show something in the browser, the view must be rendered.</p>
<h3 id="render">render</h3>
<pre class="prettyprint">
class Manual extends Controller{
    public static function views(){
        //renders the file in views/Manual/views.php
        self::render();
    }
}
</pre>
<p>The render function can only be called from a static controller function.</p>
<p>It is checked if there is a folder with the same name as the calling controller in the views folder, and if there is a php file with the same name as the calling function.</p>
<p>This file is in the index.php included, at the point where yield() function is called.</p>
<pre class="prettyprint">
//index.php
if(Controller::$shouldRender){
    Controller::yield();
}
</pre>

<p>In order to send data to the view of a controller, an associative array can be passed. The keys of the array are expanded to the variables in the view</p>
    
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
<h3 id="renderPartial">renderPartial</h3>
<p>The renderPartial function is used basically in the same way as the render function, with the difference that the view is included in the exact point where the function was called. For example, again the side menu:</p>
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
<p>Like in the render function, data can be transferred via an associative array.</p>
<p>If you want to load a partial view via AJAX, the second argument (\$ajax) should be set to true, to output the plain html and cancel the script execution. (-> <a href='<?php echo Manual::linkTo("ajax")."#ajax_php" ?>'>ajax - PHP</a>)</p>
