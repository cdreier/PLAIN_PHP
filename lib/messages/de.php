<?php 

$_MESSAGES = array(

	"title" => "PLAIN_PHP",
    
    "ajaxTitle" => "AJAX",
    "ajax_p1" => "Die JQuery Ajax Schnittstalle wurde nocheinmal gewrapped, damit ohne Umwege eine Controllerfunktion aufgerufen werden kann.",
    "ajax_p2" => "Die Callbacks in der execute und load Funktion sind immer optional.",
    "ajax_p3" => "In den Callbacks wird immer versucht die Antwort in ein JSON Object zu parsen, schlägt das fehl, kommt die Antwort als String an.",
    "ajax_p4" => "Die execute Funktion auf ein AjaxCall Object schickt den request an die Entsprechende Controllerfunktion, in der Callback-Funktion kommt die Antwort an",
    "ajax_p5" => "Die load Funktion erwartet mindestens einen Parameter, ein JQuery Object in das die Antwort geladen wird.",
    "ajax_p6" => "Es bietet sich auch an, in der ajaxCall.js den Default wert für die Klasse anzupassen, dann spart man sich den class Parameter",
	
	"controllerTitle" => "Controllers",
	"controller_p1" => "Jeder Controller der mit dem Framework benutzt werden soll (d.h. rendern, Links zu Funktionen etc) muss von der Controller.php Klasse erben:",
	"controller_p2" => "Jeder Controller erbt dadurch eine ganze Reihe nützlicher Funktionen",
	"controller_linkTo1" => "Sollte immer bei einer Verlinkung innerhalb des Frameworks benutzt werden, da durch das Routing immer absolute Links benötigt werden und auch immer gegen das Custom Routing gechecked wird.",
	"controller_linkTo2" => "Da es bei der Anzeige von Daten immer notwendig ist, eine ID o.ä. mit zu schicken, gibt es die Möglichkeit einen 2. Parameter zu übergeben, dieser wird in die Custom Routes eingesetzt und wird auch in dieser Reihenfolge mit in den Controller übergeben. 
	Es kann ein String oder Array übergeben werden",
	"controller_redirTo1" => "Wird genauso wie die linkTo Funktion verwendet um zB nach einem Login 2 verschiedene Wege einschlagen.",
	"controller_redirTo2" => "Nach einem Redirect wird kein weiterer Code mehr ausgeführt",
	"controller_render1" => "Die render Methode sucht die zugehörige View und rendert diese auf der index.php",
	"controller_" => "",
	"controller_" => "",
	"controller_" => "",
	"controller_" => "",
	"controller_" => "",

)

 ?>