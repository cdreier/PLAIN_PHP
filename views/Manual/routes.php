<h1>Routing</h1>

<h2>URLs und Links</h2>
<p>Das Routing macht sich die PHP PATH_INFO zu nutze, wobei hinter der index.php der entsprechende Controller und die Funktion zu sehen sind.</p>
<pre class="prettyprint ">
// http://localhost/PLAIN_PHP/index.php/Manual/routes
</pre>
<p>Die aktuelle Seite befände sich also im <i>Manual</i> Controller und hat die <i>routes</i> Funktion aufgerufen.</p>
<p>Um einen Link auf diese Seite zu erzeugen, ist eine Hilfefunktion vorgesehen. Anbei ein Auszug aus dem Seitenmenü</p>
<pre class="prettyprint ">
<?php echo htmlentities('<li><a href="<?php echo Manual::linkTo("routes"); ?>">Ordnerstruktur und Routing</a></li>') ?>
</pre>
<p>Näheres dazu ist bei den <a href="<?php echo Manual::linkTo("controllers") ?>">Controllern</a> zu finden.</p> 


<h2>Custom Routing</h2>
Unschwer ist zu erkennen, dass die URL zur aktuellen Seite nicht mit der erwarteten Route übereinstimmt:
<pre class="prettyprint ">
// http://localhost/PLAIN_PHP/index.php/CUSTOMROUTING
</pre>
<p>Es besteht die Möglichkeit in der routes.php in lib/config/ für jede Controllerfunktion eine eigene Route anzugeben.</p>
<pre class="prettyprint ">
$_ROUTES = array(
	"/CUSTOMROUTING" => "Manual::routes"
);
</pre>
<p>In der linkTo oder redirectTo Funktion ändert sich dadurch nichts, sobald eine Route eingertagen ist, wird der erzeugte Link sich auch
	dementsprechend ändern.</p>