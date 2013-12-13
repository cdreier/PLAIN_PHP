<h1><?php echo __("manualTitle") ?></h1>

<h3 id="hai">Oh, Hai...</h3>
<p><?php echo __("manual_start2", "https://github.com/cdreier/PLAIN_PHP") ?></p> 

<h3 id="motication">Motivation</h3>
<p><?php echo __("manual_p1") ?></p> 
<p><?php echo __("manual_p2") ?></p> 
<br/>

<h3 id="features">Features</h3>
<p><?php echo __("manual_features") ?></p> 
<ul>
    <li>Model-View-Controller</li>
    <li>RESTfull Routes</li>
    <li>I18n</li>
    <li>AJAX-Wrapper</li>
    <li>Database Abstraction with RedbeanPHP</li>
    <li>~ 500 Lines of Code (without RedbeanPHP)</li>
    <li>PLAIN PHP</li>
</ul>
<br/>


<h3 id="quick-start">Quick-Start</h3>
<p><?php echo __("manual_p3") ?></p> 

<pre class="prettyprint lang-php">
// lib/config/conf.php
$_CONFIG = array(
    "PATH" => "http://plain-php.drailing.net/",
    "LOCAL_PATH" => "http://localhost/PLAIN_PHP/",
    "AUTOLOAD_FOLDERS" => array(
		"lib/vendor/PLAIN_PHP/",
		"controllers/"
	)
);
</pre>
<pre class="prettyprint lang-php">
// controllers/App.php
class App extends Controller {
    public static function index() {
        self::render();
    }
}
</pre>


