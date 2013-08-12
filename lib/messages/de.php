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
	"controller_linkTo" => "linkTo",
	"controller_linkTo1" => "Sollte immer bei einer Verlinkung innerhalb des Frameworks benutzt werden, da durch das Routing immer absolute Links benötigt werden und auch immer gegen das Custom Routing gechecked wird.",
	"controller_linkTo2" => "Da es bei der Anzeige von Daten immer notwendig ist, eine ID o.ä. mit zu schicken, gibt es die Möglichkeit einen 2. Parameter zu übergeben, dieser wird in die Custom Routes eingesetzt und wird auch in dieser Reihenfolge mit in den Controller übergeben. 
	Es kann ein String oder Array übergeben werden",
	"controller_redirTo" => "redirectTo",
	"controller_redirTo1" => "Wird genauso wie die linkTo Funktion verwendet um zB nach einem Login 2 verschiedene Wege einschlagen.",
	"controller_redirTo2" => "Nach einem Redirect wird kein weiterer Code mehr ausgeführt",
	"controller_render" => "render",
	"controller_render1" => "Die render Methode sucht die zugehörige View und rendert diese auf der index.php",
	"controller_render2" => "Ausführliches dazu gibts unter <a href='$1'>render Views</a>",
	"controller_renderPartial" => "renderPartial",
	"controller_renderPartial1" => "Die renderPartial Methode sucht die zugehörige View und rendert diese an der Stelle wo der Aufruf stattgefunden hat.",
	"controller_renderPartial2" => "Ausführliches dazu gibts unter <a href='$1'>render Views</a>",
	"controller_always" => "always",
	"controller_always1" => "Die always Funktion wird bei jedem render Aufruf des Controllers ausgeführt. So kann man z.B. Stylesheets oder Script in jeder render Methode eines Controllers laden oder eine Userauthentifizierung für einen kompletten Controller gültig machen.",
	"controller_addScript" => "addScript",
	"controller_addScript1" => "Es gibt immer wieder Javascripts, die man nur auf einer einzigen, oder auf nur wenigen Seiten gebrauchen kann. Damit diese nicht bei jedem Seitenaufruf geladen werden müssen, kann man in der entsprechenden Controller Funktion die gewünschten Scripte laden",
	"controller_addStylesheet" => "addStylesheet",
	"controller_addStylesheet1" => "Hat die gleiche Funktionalität wie addScript, nur für Stylesheets",
	"controller_addStylesheet2" => "Ebenso im Beispiel oben vorhanden",
	"controller_isActive" => "isActive",
	"controller_isActive1" => "Die isActive Funktion versucht anhand der URL und der renderArgs (der View) herauszufinden ob der Controller von dem der Aufruf stammt, auch grade angezeigt wird",
	"controller_isActive2" => "Als optionaler Parameter kann die View (bzw die Funktion) mitgegeben werden, so wird das \"active\" zusätzlich auf die View beschränkt",
	"controller_isActive3" => "Ein aktuelles Beispiel: auf der aktuellen Seite wird das Seitenmenü nur angezeigt wenn man sich im Manual Controller befindet, bzw. in Manual::controllers ein zusätzlicher Style ausgegeben",
	"controller_keepGet" => "keep & get",
	"controller_keepGet1" => "Die keep Funktion speichert key - value Paare in eine eigene Session, allerdings nur so lange bis sie mit der get Funktion wieder herausgeholt wurden.",
	"controller_keepGet2" => "So kann man sich ohne auf die GET Parameter zurückgreiffen zu müssen, Informationen über einen oder mehrere Requests und Controller hinweg behalten."

)

 ?>