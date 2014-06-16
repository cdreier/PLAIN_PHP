<h1>Controllers</h1>

<p>Each controller to be used with the framework (i.e. render views, links to functions etc) must extend Controller class:</p>
<pre class="prettyprint">
class MyAwesomeController extends Controller {
    
}
</pre>
<p>Each controller inherits a whole range of useful and needed features</p>

<h3 id="linkTo">linkTo</h3>
<p>Should always be used when linking within the framework, because absolute links are needed by the routing and always checks against your custom routes.</p> 
<pre class="prettyprint">
//without custom routes
MyAwsomeController::linkTo("moreAwesomerFunction");
// returns http://localhost/PHP_PLAIN/index.php/MyAwsomeController/moreAwsomerFunction
</pre>
<p>Since it is always necessary when displaying data, e.g. an ID, it is possible to pass parameters. These are used in the custom routes and are in the same order the parameters in your controller function. You can pass an array or lined up values.</p> 
<pre class="prettyprint">
//config/routes.php
$_ROUTES = array(
	"/awsome/{value}" => "MyAwsomeController::awesomeFunction",
	"/debug/{value}/test/{yay}" => "MyAwsomeController::moreAwesomerFunction"
);	
	
MyAwsomeController::linkTo("awesomeFunction", 33);
// returns http://localhost/PHP_PLAIN/index.php/awsome/33

MyAwsomeController::linkTo("moreAwesomerFunction", "33", "AWESOME"); // or
MyAwsomeController::linkTo("moreAwesomerFunction", array("33", "AWESOME"));
// returns http://localhost/PHP_PLAIN/index.php/debug/33/test/AWESOME

//in the controller
public static awesomeFunction($id){
    //$id = 33
    $post = Doctrine_Core::getTable("Post")->find($id);
}

public static moreAwesomerFunction($id, $test){
    //$id = 33, $test = "AWESOME"
    $post = Doctrine_Core::getTable("Post")->find($id);
}
</pre>

<br/>
<h3 id="redirTo">redirectTo</h3>
<p>Is just the same usage like the linkTo function.</p>
<p>After a redirect no other code is interpret.</p>
<pre class="prettyprint">
public static function login(){
    //a lot of validation
    if($success){
        MyAwesomeController::redirectTo("superSecretWebsite", 333);
    }
    
    //error - back to frontpage
    App::redirectTo("index");
    
    //unreachable code
    echo "yay";
}
</pre>


<br/>
<h3 id="render">render</h3>
<p>The render method looks up the appropriate view and renders it on the index.php (in the yield())</p>
<p>Please find details in <a href='<?php echo Manual::linkTo("views") ?>'>render views</a></p>

<br/>
<h3 id="controller_renderPartial">renderPartial</h3>
<p>The renderPartial method searches the associated view and renders it to the point where the call took place.</p>
<p>Please find details in <a href='<?php echo Manual::linkTo("views") ?>'>render views</a></p>

<br/>
<h3 id="controller_renderText">renderText</h3>
<p>renderText does not render in the _yield() function, but prints the text with the correct Content-Type header (text / plain) set, and ends the script processing.</p>
<pre class="prettyprint">
public static function debugMe(){
    self::renderText("plain text here");
    
    //unreachable code
    $var = "im completely useless";
}
</pre>

<br/>
<h3 id="controller_renderJson">renderJSON</h3>
<p>renderJSON works similarly to renderText, but expects an array. The data will output as a json_encoded string with the Content-Type header is set to application / json. The script processing is suspended here.</p>
<pre class="prettyprint">
public static function someJSONResponse(){
    self::renderJSON(array(
    	"ok" => true
    ));
}
</pre>


<br/>
<h3 id="always">always</h3>
<p>The always function runs at the latest before each render call. So you can add stylesheets or scripts, extend all render calls from a template oe secure the whole controller with validations. </p>
<pre class="prettyprint">
public static function always(){
    
    if($userValidationFailed){
        App::redirectTo("index");
    }
    
    self::addScript("prettify.js");
    self::addStylesheet("sunburst-theme.css");
}
</pre>
<p>Usually (in most other frameworks), this function is called as before(), as it simply is not true depending on the execution order, I was looking here for a new name.</p>


<br/>
<h3 id="addScript">addScript</h3>
<p>There are always JavaScripts that can be used only on a single, or only a few pages. In order for this not to be loaded on every page request, you can load the required scripts in the corresponding controller function</p>
<pre class="prettyprint">
public static function controllers(){
    self::addScript("prettify/prettify.js");
    self::addStylesheet("sunburst-theme.css");
    self::render();
}
</pre>


<br/>
<h3 id="addStylesheet">addStylesheet</h3>
<p>Has the same functionality as addScript, only for stylesheets</p>
<p>Also available in the above example</p>

<br/>
<h3 id="isActive">isActive</h3>
<p>The isActive function tries to find out (based on the URL and the renderArgs) if the calling controller is the currently active.</p>
<p>As an optional parameter, the view (or function) cann be passed, so the \"active\" result is additionally limited to the view</p>
<p>A recent example: on the current page, the side menu is only displayed when you are in the Manual Controller.</p>
<pre class="prettyprint">
if(Manual::isActive()){
    //render side menu
    Manual::sideMenu();
}    
//for active state in menu
if(Manual::isActive("controllers")) echo "style='color: blue;'";
</pre>


<br/>
<h3 id="keepGet">keep & get</h3>
<p>The keep function stores key - value pairs in a private session cookie, and kept as long until they brought back with the get() function.</p>
<pre class="prettyprint">
public static function auth(){
    //authorization failed, store error in temp cookie
    self::keep("error", "failed to login for some reason");
}


public static function login(){
    //if nothing is set, get() returns false 
    //so every error disappers after a reload 
    //(see login example in the default download)
    self::render(array(
        "error" => self::get("error")
    ));
}
</pre>


<br/>
<h3 id="renderContent">add & setRenderContent</h3>
<p>With addRenderContent(key, val) you can add dynamic parts before the render() call, e.g. to set in a view a subtitle (or with setTitle the title tag in the index.php)</p>
<p>With getRenderContent(key) the content can be loaded in the view.</p>
<p>Difference to keep & get: renderContent is temporarily stored by the controller and issued with a render() call, and not stored in a cookie, so it can not be seen from outside, but also not valid for a request away.</p>
<pre class="prettyprint">
    // App::index 
    App::addRenderContent("subtitle", "PLAIN_PHP is really simple, fast and i enjoy coding with it");
    
    // some view
    &lt;?php echo Controller::getRenderContent("subtitle"); ?&gt;
</pre>


<br/>
<h3 id="setTitleTitle">get & setTitle</h3>
<p>setTitle is a shortcut for addRenderContent('title', your title) to fill the title tag.</p>
<pre class="prettyprint">
    //in Manual controller 
    self::setTitle("PLAIN_PHP - Manual");
    
    //in the dafault index.php file
    &lt;title&gt;&lt;?php echo Controller::getTitle(); ?&gt;&lt;/title&gt;
</pre>