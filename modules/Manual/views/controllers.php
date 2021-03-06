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
<p>From time to time, you need to pass some dynamic values to your controllers, e.g. an ID to display specific content. Therefore you can pass an array or lined up values to your controller function. These values occur as parameter in the same order as given to to linkTo function.</p>
<pre class="prettyprint">
Users::linkTo("show", 3 );
// returns http://localhost/PHP_PLAIN/index.php/Users/show/3

//Users controller
public static function show($userId){
    // $userId = 3
}
</pre>
<p>Note: It is possible to line up as many parameters as you like.</p>

<p>For more informations, please visit the <a href="<?php echo Manual::linkTo("routes"); ?>">routing section</a></p>

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
<h3 id="controller_renderPartial">extendFromTemplate</h3>
<p>With extendFromTemplate we can tell our render call to extend the corresponding view in the given template.</p>
<p>Please find details in the <a href='<?php echo Manual::linkTo("views") ?>#templates'>templates</a> section</p>


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
<h3 id="controller_renderBinary">renderBinary</h3>
<p>renderBinary, perhaps the name gives a hint, will render a binary. This is pretty useful if you have images or files that should not be accessible with the full path.</p>
<p>renderBinary will output an image or starts a download.</p>
<p>For example: you created an uploads folder in the lib directory, and the lib directory is protected from the .htaccess file. So no one can access these files wihtout permission.</p>
<pre class="prettyprint">
//you generate an image tag
<?php echo htmlentities("<img src='<?php echo App::linkTo('getImage', 123) ?>' />"); ?>

//results to
<?php echo htmlentities("<img src='http://plain-php.drailing.net/index.php/App/renderImage/123' />"); ?>


//and calls the controller function the App controller
public static function getImage($imageId){
    //fetch image from db or imageId is a hash
    self::renderBinary("lib/data/".$imageId);
}
</pre>
<p>In most of all cases, the binary path should be enough. With the file_info extension renderBinary will find the mime-type and file extension by its own, even your file name is hashed.</p>
<p>You can rename your output (perhaps a generated zip) and if you can't enable the file_info estension, you can set the mime-type by yourself</p>
<pre class="prettyprint">
public static function getImage($hashedFile){
    self::renderBinary("lib/data/".$hashedFile, "your-personal-download", "application/zip");
}
</pre>
<p>Please not: if you add a filename, renderBinary will add the <i>Content-Disposition: attachment</i> to your header, so e.g. a image will start a download and is not rendered!</p>

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