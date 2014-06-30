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
<br>


<h3 id="params">Passing parameters</h3>
<p>To pass parameters to your controller, you can add any amount of parameters to your route. A common case is a database id to fetch some content.</p>
<p>These additional parameters are added straight to the end of your default route</p>
<pre class="prettyprint">
Users::linkTo("showTODOList", 3, 9);
// will build to http://host/index.php/Users/showTODOList/3/9
</pre>
<p>Your controller can receive these values by just grab them in the order they are in the route</p>
<pre class="prettyprint">
// User controller
public static function showTODOList($userId, $listId){ ... }
</pre>
<p>Cool PHP feature: you can use the default values with your controller parameters of course!</p>
<pre class="prettyprint">
// User controller
public static function showTODOList($userId, $listId = false){
    if(!$listId){
        //fetch first one
    }
}
</pre>
<br>

<h3 id="custom">Custom Routing</h3>
<p>It is not difficult to note that the URL of the current page does not match the expected route:</p>
<pre class="prettyprint">
// http://localhost/PLAIN_PHP/index.php/CUSTOMROUTING
</pre>
<p>If you want to hide your controller names or rearrange the values to match other APIs, you can create a whole new route</p>
<p>It is possible to specify your own route for each controller function in <strong>lib/config/routes.php</strong>. </p>
<pre class="prettyprint">
//config/routes.php
$_ROUTES = array(
    "/CUSTOMROUTING" => "Manual::routes",
    "/debug/{value}/test/{yay}" => "MyAwsomeController::awesomerFunction",
    "/goodbye/{userId}" => "Users::delete",
);  
    
Users::linkTo("delete", 8);
// returns http://localhost/PHP_PLAIN/index.php/goodbye/8

MyAwsomeController::linkTo("awesomerFunction", "33", "AWESOME"); // or
MyAwsomeController::linkTo("awesomerFunction", array("33", "AWESOME"));
// returns http://localhost/PHP_PLAIN/index.php/debug/33/test/AWESOME

//in the Users controller
public static delete($id){
    //$id = 8
}

//in the MyAwsomeController controller
public static awesomerFunction($id, $test){
    //$id = 33, $test = "AWESOME"
}
</pre>

