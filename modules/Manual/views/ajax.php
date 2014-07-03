<h1>AJAX</h1>

<h3 id="ajax_js">Javascript</h3>
<p>The jQuery ajax API gets a small wrapper, where you can call controller-functions without detour.</p>
<pre class="prettyprint">
new AjaxCall({
    class : "Manual", //can set to a default class in ajaxCall.js
    method : "ajax",
    args : "string or object"
}).execute(function(response){
    //optional callback handling here
    //response is parsed to a JSON object, or if not possible a string
});
</pre>
<p>Callbacks in the execute and load functions are always optional.</p>
<p>The callback always tries to parse the response to a JSON object, if the parser fails, the response is a normal string.</p>

<br/>

<p>The load callback needs the minimum of one parameter, a jQuery object which receives the response</p>

<pre class="prettyprint">
new AjaxCall({
    class : "Manual", //can set to a default class in ajaxCall.js
    method : "ajax",
    args : {
        "param" => "value"
    }
}).load($("#ajax-content"));
</pre>
<br />

<p>TIP: in AjaxCall.js you can define default values.</p>
<pre class="prettyprint">
//ajaxCall.js line 4-8
this.params = {
    class : args.class || "App",
    method : args.method || "test",
    args : args.args || {}
};
</pre>
<br/>
<p>TIP: create easy responses in your controller with <a href='<?php echo Manual::linkTo("controllers")."#controller_renderText" ?>'>renderText</a> and <a href='<?php echo Manual::linkTo("controllers")."#controller_renderJson" ?>'>renderJSON</a></p>


<h3 id="ajax_php">PHP</h3>
<p>Unlike calling a controller function via a custom route with parameters, the parameters in a AJAX request are transfereed in the <i>args</i> parameter in the AjaxCall. 
The args parameter is not limited to a type. You can pass a simple string, a boolean or komplex objects and arrays.</p>
<p>The value of your args parameter are passed in your controller function as parameter</p>
<pre class="prettyprint">
public static function ajaxTargetFunction($args){
	//find something 
	$bean = R::load('bean', $args["id"]);
	self::renderJSON(array(
		"data" => $bean
	));
	//unreachable code
}
</pre>
<br />
<p>There is also the possibility to load a view via AJAX, by setting the second parameter of the renderPartial method to true. 
    The response is then just the plain HTML from your view. This can be used very effective with the load function from the AjaxCall.</p>
<pre class="prettyprint">
public static function loadView(){
	self::renderPartial(array(), true);
	//unreachable code
}
</pre>
