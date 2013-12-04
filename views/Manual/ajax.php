<h1><?php echo __("ajaxTitle"); ?></h1>

<p><?php echo __("ajax_p1"); ?></p>
<p><?php echo __("ajax_p2"); ?></p>
<p><?php echo __("ajax_p3"); ?></p>
<p><?php echo __("ajax_p4"); ?></p>

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
<br/>

<p><p><?php echo __("ajax_p5"); ?></p></p>

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

<p><?php echo __("ajax_p6"); ?></p>
<pre class="prettyprint">
//ajaxCall.js line 4-8
this.params = {
    class : args.class || "App",
    method : args.method || "test",
    args : args.args || {}
};
</pre>
<br/>
<p><?php echo __("ajax_p7", Manual::linkTo("controllers")."#controller_renderText", Manual::linkTo("controllers")."#controller_renderJson" ); ?></p>