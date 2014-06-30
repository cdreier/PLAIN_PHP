<h1>Routing</h1>

<h3 id="routes">Routes</h3>
<p>The routing makes use of the PHP PATH_INFO, which can be seen behind the index.php of the appropriate controller and the function.</p>
<pre class="prettyprint ">
// http://localhost/PLAIN_PHP/index.php/Manual/routes
</pre>
<p>The route above should be in the <i>Manual</i> controller and calls the <i>routes</i> function.</p>
<p>To create a link to this page, a controller function is provided. Below is an excerpt from the page menu:</p>
<pre class="prettyprint ">
<?php echo htmlentities('<li><a href="<?php echo Manual::linkTo("routes"); ?>">Ordnerstruktur und Routing</a></li>') ?>
</pre>
<p></p>


<p>For details, please see the <a href='<?php echo Manual::linkTo("controllers") ?>'>controllers</a>.</p>

<h3 id="custom">Custom Routing</h3>
<p>It is not difficult to note that the URL of the current page does not match the expected route:</p>
<pre class="prettyprint ">
// http://localhost/PLAIN_PHP/index.php/CUSTOMROUTING
</pre>
<p>It is possible to specify your own route for each controller function in <strong>lib/config/routes.php</strong>. </p>
<pre class="prettyprint ">
$_ROUTES = array(
	"/CUSTOMROUTING" => "Manual::routes"
);
</pre>

<p>You can specify more complex custom routes with dynamic values. These values ​​are given in brackets, the name has no meaning and it will only help you read the routes (\"syntactic sugar\").</p>
<pre class="prettyprint ">
$_ROUTES = array(
	"/yay/{val}" => "App::yay",
	"/debug/{value}/test/{yay}" => "App::debug"
);
</pre>
<p>You can now pass a second parameter to a linkTo function, this is set to the appropriate location in the route. (See Controller)</p>
