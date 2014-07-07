<h1>Common Tasks</h1>


<h3>sending a form</h3>
<p></p>
<pre class="prettyprint">

</pre>
<br>


<h3>calling a webservice</h3>
<p>PLAIN_PHP comes with a small but nice WebService library ("WS").</p>
<p>Does not matter if you want a full REST communication or just a one-liner to fetch a few jsons.</p>
<pre class="prettyprint">
    $ws = new PLAIN_PHP\WS("http://base-url.de");
    $ws->addData("apiToken", "supercrypticalsecurehash");
    $ws->get("/users/2");
    $ws->post("/users/2");
    $ws->delete("/users/2");

    //static shortcut for a get request
    $latestAsaphPosts = PLAIN_PHP\WS::getData("http://asaph.drailing.net/json/2");
</pre>
<br>


<h3></h3>
<p></p>
<br>


<h3></h3>
<p></p>
<br>


<h3>add my own folders to the autoloader</h3>
<p>For all the folders that were specified in the <strong>lib/config/conf.php</strong> file in the AUTOLOAD_FOLDERS array, the naming convention is prerequisite: class name = filename. You can also use the * wildcard to add all subfolders</p>
<br>




