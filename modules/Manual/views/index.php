<h1>Home</h1>

<h3 id="hai">Oh, Hai...</h3>
<p>if you are just looking for the code or the download, here is the <a href='https://github.com/cdreier/PLAIN_PHP'>github link</a></p>
<br/>

<h3 id="motivation">Motivation</h3>
<p>Of course, there is already one or the other PHP framework, however, im missing <strong>a lightweight, fast, flexible, beginner-friendly and transparent MVC framework</strong>.</p> 
<p>This is where i started PLAIN_PHP, without much magic or configuration ("convention over configuration") but with all the basic functions you need in life. And everything in transparent PLAIN PHP.</p> 
<p>When i started, the first thing i asked myself: what do i want to write, to see wich result.</p>
<br/>

<h3 id="features">Features</h3>
<p>PLAIN_PHP is designed in a Model-View-Controller architecture and could be a mixture of the wonderful PlayFramework (Java) and RoR (Ruby on rails).</p> 
<ul>
    <li>Model-View-Controller</li>
    <li>fully customizable and RESTfull Routes</li>
    <li>I18n</li>
    <li>AJAX-Wrapper for calling an action directly</li>
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


