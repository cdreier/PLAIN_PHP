<h1><?php echo __("routesTitle") ?></h1>

<h3 id="routes">Routes</h3>
<p><?php echo __("routes_urls1") ?></p>
<pre class="prettyprint ">
// http://localhost/PLAIN_PHP/index.php/Manual/routes
</pre>
<p><?php echo __("routes_urls2") ?></p>
<p><?php echo __("routes_urls3") ?></p>
<pre class="prettyprint ">
<?php echo htmlentities('<li><a href="<?php echo Manual::linkTo("routes"); ?>">Ordnerstruktur und Routing</a></li>') ?>
</pre>
<p><?php echo __("routes_urls4", Manual::linkTo("controllers")) ?></p>


<h3 id="custom"><?php echo __("routes_custom") ?></h3>
<p><?php echo __("routes_custom1") ?></p>
<pre class="prettyprint ">
// http://localhost/PLAIN_PHP/index.php/CUSTOMROUTING
</pre>
<p><?php echo __("routes_custom2") ?></p>
<pre class="prettyprint ">
$_ROUTES = array(
	"/CUSTOMROUTING" => "Manual::routes"
);
</pre>

<p><?php echo __("routes_custom3") ?></p>
<pre class="prettyprint ">
$_ROUTES = array(
	"/yay/{val}" => "App::yay",
	"/debug/{value}/test/{yay}" => "App::debug"
);
</pre>
<p><?php echo __("routes_custom4") ?></p>
