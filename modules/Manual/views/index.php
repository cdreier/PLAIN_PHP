<h1>Home</h1>

<h3 id="hai">Oh, Hai...</h3>
<p>if you are just looking for the code or the download, here is the <a href='https://github.com/cdreier/PLAIN_PHP'>github link</a></p>
<br/>

<h3 id="motication">Motivation</h3>
<p>Of course, there is one or the other PHP framework, however, im missing <strong>a lightweight, fast, flexible, beginner-friendly and transparent MVC framework</strong>.</p> 
<p>Here PLAIN_PHP comes into play, without much configuration (\"convention over configuration \") but with all the basic functions you need in life. And everything in transparent PLAIN PHP.</p> 
<br/>

<h3 id="features">Features</h3>
<p>PLAIN_PHP is constructed in a Model-View-Controller architecture and could be a mixture of the wonderful PlayFramework (Java) and rails, just for PHP and with only 500 lines of code.</p> 
<ul>
    <li>Model-View-Controller</li>
    <li>RESTfull Routes</li>
    <li>I18n</li>
    <li>AJAX-Wrapper</li>
    <li>Database Abstraction with RedbeanPHP</li>
    <li>PLAIN PHP</li>
</ul>
<br/>


<h3 id="quick-start">Quick-Start</h3>
<p>To get started no additional config is needed, just unzip on your webserver and start.</p> 
<pre class="prettyprint lang-php">
// controllers/App.php
class App extends Controller {
    public static function index() {
        self::render();
    }
}
</pre>


