<h1>AJAX</h1>

<p>Die JQuery Ajax Schnittstalle wurde nocheinmal gewrapped, damit ohne Umwege eine Controllerfunktion aufgerufen werden kann.</p>
<p>Die Callbacks in der execute und load Funktion sind immer optional.</p>
<p>In den Callbacks wird immer versucht die Antwort in ein JSON Object zu parsen, schlägt das fehl, kommt die Antwort als String an.</p>
<p>Die execute Funktion auf ein AjaxCall Object schickt den request an die Entsprechende Controllerfunktion, 
    in der Callback-Funktion kommt die Antwort an</p>
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

<p>Die load Funktion erwartet mindestens einen Parameter, ein JQuery Object in das die Antwort geladen wird.</p>

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

<p>Es bietet sich auch an, in der ajaxCall.js den Default wert für die Klasse anzupassen, dann spart man sich den class Parameter</p>
<pre class="prettyprint">
//ajaxCall.js line 4-8
this.params = {
    class : args.class || "App",
    method : args.method || "test",
    args : args.args || {}
};
</pre>