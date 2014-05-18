<h1><?php echo __("coreConcepts_title"); ?></h1>

<h3 id="static"><?php echo __("coreConcepts_static_title"); ?></h3>
<p><?php echo __("coreConcepts_static"); ?></p>
<pre class="prettyprint">
// in view App/index.php
&lt;html&gt; ...
    &lt;div&gt;
    &lt;?php Manual::sideMenu() ?&gt;
    &lt;/div&gt;
&lt;/html&gt;
</pre>
<p><?php echo __("other_example") ?></p>
<pre class="prettyprint">
// in App controller
public static function index(){
    Manual::index();
}
</pre>
<br>


<h3 id="conventions"><?php echo __("coreConcepts_conventions_title"); ?></h3>
<p><?php echo __("coreConcepts_conventions"); ?></p>
<pre class="prettyprint">
// Manual controller
public static function coreconcepts(){
    // tries to render the view at 
    // views/Manual/coreconcepts.php
    self::render();
}
</pre>
<br>



<h3 id="plain"><?php echo __("coreConcepts_plain_title"); ?></h3>
<p><?php echo __("coreConcepts_plain"); ?></p>
