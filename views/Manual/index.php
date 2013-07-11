<h1>Manual</h1>

<p>das PLAIN_PHP Framework ist ein schmales MVC-Framework.</p> 
<p>Es vereinfacht die Erstellung und das Strukturieren von Webseiten deutlich und hat bei Bedarf Doctrine 1.2.x zur Datenbank-Abstraktion mit dabei.</p>
<br/>
<p>Um sofort loszulegen muss nur im App.php Controller die Konstanten _PATH und _LOCAL_PATH angepasst werden und es kann losgehen, 
    wobei _PATH die URL zum Server darstellt und _LOCAL_PATH den Pfad zum localhost.</p>

<pre class="prettyprint lang-php">
// controllers/App.php
const _PATH = "http://192.168.0.33/PHP_PLAIN/";
const _LOCAL_PATH= "http://localhost/PHP_PLAIN/";
</pre>


