<h1>Core Concepts</h1>

<h3 id="static">All static</h3>
<p>All controller functions are static, you do not need any instantiation at any time. Also you can access your controllers across each other.</p>
<pre class="prettyprint">
// in view App/index.php
&lt;html&gt; ...
    &lt;div&gt;
    &lt;?php Manual::sideMenu() ?&gt;
    &lt;/div&gt;
&lt;/html&gt;
</pre>
<p>other example:</p>
<pre class="prettyprint">
// in App controller
public static function index(){
    Manual::index();
}
</pre>
<br>


<h3 id="conventions">Naming conventions</h3>
<p>For any who has ever worked with an MVC framework that should be nothing new: the link between controller and view is done by correctly naming the folders and files to the controller and the calling function.</p>
<pre class="prettyprint">
// Manual controller
public static function coreconcepts(){
    // tries to render the view at 
    // views/Manual/coreconcepts.php
    self::render();
}
</pre>
<br>



<h3 id="plain">Plain PHP</h3>
<p>The framework consists of pure PHP code, nothing like the popular PHP annotations or something else is used, but only the native PHP language constructs.</p>
