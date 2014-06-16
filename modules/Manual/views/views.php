<h1>Views and Templates</h1>
<p>To finally show something in the browser, the view must be rendered.</p>

<pre class="prettyprint">
class Manual extends Controller{
    public static function views(){
        //renders the file in views/Manual/views.php
        self::render();
    }
}
</pre>
<p>The render function should only be called from a static controller function. It is checked if there is a folder with the same name as the calling controller in the views folder, and if there is a php file with the same name as the calling function.</p>
<p>The render call should always be the end of our request. Everything is done, data is collected and we flush it our to the browser.</p>

<h3 id="templates">Templates</h3>
<p>Assuming the view is found, it is basicly just included in the index.php.</p>
<p>As it's not that productive if we need to write our headers etc. in every view, we can write Templates.</p>
<p>A template is a php file, located in the template folder. The core-template named index.php, contains all the code in it, we need in every view.</p>
<p>In every template you need to specify where the content should be inserted. This is done by a small call which can be placed everywhere in the template.</p>
<pre class="prettyprint lang-php">
//templates/index.php
&lt;div id="content"&gt;
&lt;?php $template->_yield(); ?&gt;
&lt;/div&gt;
</pre>

<p>Now we only need to tell our view in which template it should be rendered. For that we have 2 diffrent ways:</p>
<p>1. We tell it every single view </p>
<pre class="prettyprint lang-php">
//views/myController/myView.php
//must be on top of the file
&lt;?php Template::extend("index") ?&gt;
</pre>

<p>Sidenote: The template name is the same as the filename.</p>

<p>2. We can tell our controller, that every render() call should extend always the same template. Best place for this is the <a href="<?php echo Manual::linkTo("controllers") ?>#always">always</a> function</p>
<pre class="prettyprint lang-php">
//controllers/App.php
public static function always(){
    self::extendFromTemplate("index");
}
</pre>
<p>Of course, you can use the extendFromTemplate function in every controller function before the render call, but this would be the same like Template::extend in every single view.</p>
<p>Templates can also be used with renderPartial of course, but note that extendFromTemplate only affects the render call.</p>



<h3 id="render">render</h3>
<p>As shown above, we can render a view.</p>
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
