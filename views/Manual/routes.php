<h2>URLs und Links</h2>
<p>Das Routing macht sich die PHP PATH_INFO zu nutze, wobei hinter der index.php der entsprechende Controller und die Funktion zu sehen sind.</p>
<p>Die aktuelle Seite befindet sich also im <i>Manual</i> Controller und hat die <i>folder</i> Funktion aufgerufen.</p>
<br/>
<p>Um einen Link auf diese Seite zu erzeugen, ist eine Hilfefunktion vorgesehen. Anbei ein Auszug aus dem Seitenmenü</p>
<pre class="prettyprint ">
<?php echo htmlentities('<li><a href="<?php echo Manual::linkTo("folders"); ?>">Ordnerstruktur und Routing</a></li>') ?>
</pre>
<p>Näheres dazu ist bei den <a href="<?php echo Manual::linkTo("controllers") ?>">Controllern</a> zu finden.</p> 


<h2>Custom Routing</h2>