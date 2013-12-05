<h1><?php echo __("ajaxTitle"); ?></h1>

<h3><?php echo __("ajax_jsTitle"); ?></h3>
<p><?php echo __("ajax_js1"); ?></p>
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
<p><?php echo __("ajax_js2"); ?></p>
<p><?php echo __("ajax_js3"); ?></p>

<br/>

<p><p><?php echo __("ajax_js4"); ?></p></p>

<pre class="prettyprint">
new AjaxCall({
    class : "Manual", //can set to a default class in ajaxCall.js
    method : "ajax",
    args : {
        ...
    }
}).load($("#ajax-content"));
</pre>
<br />

<p><?php echo __("ajax_js5"); ?></p>
<pre class="prettyprint">
//ajaxCall.js line 4-8
this.params = {
    class : args.class || "App",
    method : args.method || "test",
    args : args.args || {}
};
</pre>
<br/>
<p><?php echo __("ajax_js6", Manual::linkTo("controllers")."#controller_renderText", Manual::linkTo("controllers")."#controller_renderJson" ); ?></p>


<h3><?php echo __("ajax_phpTitle"); ?></h3>


