<?php 

$_MESSAGES = array(
	
	"title" => "PLAIN_PHP",
	
	"manualTitle" => "Manual",
    "manual_p1" => "PLAIN_PHP is a lightweight, easy and fast to learn MVC - framework.",
    "manual_p2" => "The Target is to give an easy and flexible way to develop and structure your web-project, with having fun on coding.",
    "manual_p3" => "To get started, just go to the conf.php and edit the PATH and LOCAL_PATH, with PATH is the URL to the webserver and LOCAL_PATH your path to the localhost. With the AUTOLOAD_FOLDER array, you can add additional folders to the autoloader (classname = filename)",
    
    "ajaxTitle" => "AJAX",
    "ajax_jsTitle" => "Javascript",
    "ajax_js1" => "The jQuery ajax API gets a small wrapper, where you can call controller-functions without detour.",
    "ajax_js2" => "Callbacks in the execute and load functions are always optional.",
    "ajax_js3" => "The callback always tries to parse the response to a JSON object, if the parser fails, the response is a normal string.",
    "ajax_js4" => "The load callback needs the minimum of one parameter, a jQuery object which receives the response",
    "ajax_js5" => "TIP: in AjaxCall.js you can define default values.",
    "ajax_js6" => "TIP: create easy responses in your controller with <a href='$1'>renderText</a> and <a href='$2'>renderJSON</a>",
    
    "ajax_phpTitle" => "PHP",
    "ajax_php1" => "Unlike calling a controller function via a custom route with parameters, the parameters in a AJAX request are transfereed in the \$ _POST array.",
    "ajax_php2" => "There is also the possibility to load a view via AJAX, by setting the second parameter of the renderPartial method to true.",
    
    "routesTitle" => "Routing",
    "routes_urls" => "URLs ans links",
    "routes_urls1" => "The routing makes use of the PHP PATH_INFO, which can be seen behind the index.php of the appropriate controller and the function.",
    "routes_urls2" => "The current page should be in the <i>Manual</i> controller and calls the <i>routes</i> function.",

    "routes_urls3" => "To create a link to this page, a help function is provided. Below is an excerpt from the page menu:",
    "routes_urls4" => "For details, please see the <a href='$1'>controllers</a>.",
    "routes_custom" => "Custom Routing",
    "routes_custom1" => "It is not difficult to appreciate that the URL of the current page does not match the expected route:",
    "routes_custom2" => "It is possible to specify your own route for each controller function in lib/config/routes.php.",
    "routes_custom3" => "You can specify more complex routes with dynamic values. These values ​​are given in brackets, the name has no meaning and it will only help you read the routes (\"syntactic sugar\").",
    "routes_custom4" => "You can now pass a second parameter to a linkTo function, this is set to the appropriate location in the route. (See Controller)",
	
	//TODO
	"controllerTitle" => "Controllers",
	"controller_p1" => "Jeder Controller der mit dem Framework benutzt werden soll (d.h. rendern, Links zu Funktionen etc) muss von der Controller.php Klasse erben:",
	"controller_p2" => "Jeder Controller erbt dadurch eine ganze Reihe nützlicher Funktionen",
	"controller_linkTo" => "linkTo",
	"controller_linkTo1" => "Sollte immer bei einer Verlinkung innerhalb des Frameworks benutzt werden, da durch das Routing immer absolute Links benötigt werden und auch immer gegen das Custom Routing gechecked wird.",
	"controller_linkTo2" => "Da es bei der Anzeige von Daten immer notwendig ist, eine ID o.ä. mit zu schicken, gibt es die Möglichkeit Parameter zu übergeben, diese werden in die Custom Routes eingesetzt und auch in dieser Reihenfolge mit in den Controller übergeben. Es können die Parameter aneinander gereiht oder als Array übergeben werden.",
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
	"controller_always1" => "Die always Funktion wird spätestens vor jedem render Aufruf des Controllers ausgeführt. So kann man z.B. Stylesheets oder Script in jeder render Methode eines Controllers laden oder eine Userauthentifizierung für einen kompletten Controller gültig machen.",
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
	"controller_keepGet2" => "So kann man sich ohne auf die GET Parameter zurückgreiffen zu müssen, Informationen über einen oder mehrere Requests und Controller hinweg behalten.",
	
    "foldersTitle" => "Ordnerstruktur",
    "folders_p1" => "Eine MVC Ordnerstruktur wurde beibehalten. Eine leere Applikation sieht folgendermaßen aus.",
    "folders_p2" => "Dabei werden alle Controller im controllers Ordner automatisch geladen, wobei hier die Namenskonvention vorrausetzung ist: Klassenname = Dateiname.",
    "folders_p3" => "Der lib Ordner beherbergt alle Javascript und CSS Dateien, sowie eventuelle Bilder und auch die Frameworkdaten.",
    
    "viewsTitle" => "Views rendern",
    "views_p1" => "Um nun auch endlich etwas in Browser anzuzeigen, müssen Views gerendert werden.",
    "views_render" => "render",
    "views_render1" => "Die render Funktion kann nur aus einer statischen Controllerfunktion aus aufgerufen werden.",
    "views_render2" => "Dabei wird in den views Ordner geschaut und überprüft ob es einen Ordner gibt, der genauso benannt ist wie die Controllerklasse und eine php-Datei mit dem gleichen Namen wie die Funktion selbst.",
    "views_render3" => "diese Datei wird in der index.php included, an der Stelle wo yield() aufgerufen wurde.",
    "views_render4" => "Um aus einem Controller heraus auch Daten an die View zu schicken, kann ein assoziatives Array übergeben werden. Die keys aus dem Array werden zu nutzbaren Variablen in der View",
    "views_renderPartial" => "renderPartial",
    "views_renderPartial1" => "Die renderPartial Funktion wird im grunde genommen genauso verwendet wie die render Funktion, mit dem Unterschied, dass die View an genau dem Punk included wird, wo die Funktion aufgeruden wurde. Zum Beispiel wieder das Seitenmenü",
    "views_renderPartial2" => "Auch hier können wieder Daten über ein assoziatives Array übergeben werden.",
    
    "i18nTitle" => "Internationalisierung",
    "i18n_p1" => "Alle Sprachen werden in lib/messages/ verwaltet, wobei die Dateinamen aus dem ersten Teil der gängigen I18n - Codes bestehen (z.B. de.php, anstelle von de_DE), bis auf die default-Sprache, die auch als Fallback genutzt wird.",
    "i18n_p2" => "Im normalfall wird die Sprache anhand des Landes aus dem der User kommt erkannt und dementsprechende Messagefiles genutzt.",
    "i18n_p3" => "Um einen String auszugeben wurde die __() Funktion eingeführt, die auch beliebig oft Parameterisiert werden kann:",
    "i18n_p4" => "Die Plazuhalter $1 setzten sich aus dem Dollarzeichen und dem Index zusammen, die Parameter werden also in genau der Reihenfolge in die Platzhalter eingesetzt, in der sie übergeben werden.",
    
    "rbTitle" => "RedBeanPHP",
    "rb_p1" => "Link zur Homepage und Dokumentation: <a href='http://redbeanphp.com/'>Link</a>",
    "rb_p2" => "RedBeanPHP ist ein ORM der zur Laufzeit die Tabellen und Spalten generiert. Somit ist eine sehr einfache, schnelle und komplett objektorientierte Entwicklung möglich.",
    "rb_p3" => "Nach der Entwicklung wird das Datenbankschema 'gefreezed' um in der Produktionsumgebung einen performanteren Datenbankzugriff zu gewährleisten. Alle benötigten Daten werden über die db.php konfiguriert",
    
    "controller_renderContent" => "add & setRenderContent", 
    "controller_addSetRenderContent1" => "Mit addRenderContent(key, val) können noch dynamische Teile vor dem render() Aufruf gesetzt werden, um zB in einer View einen Subtitle zu setzen (oder wie mit setTitle den title-Tag in der index.php)",
    "controller_addSetRenderContent2" => "Mit getRenderContent(key) kann in der View der entsprechende Content wieder geladen werden",
    
    "controller_getSetTitleTitle" => "get & setTitle",
    "controller_getSetTitle" => "setTitle ist ein Shortcut für addRenderContent('title', yourTitle), um den title-Tag zu befüllen.",
    
    "controller_renderTextTitle" => "renderText",
    "controller_renderText" => "renderText rendert nicht über die yield() Funktion, sondern setzt gibt den Text mit dem korrekten Content-Type Header (text/plain) aus, und beendet die Scriptverarbeitung.",
    
    "controller_renderJsonTitle" => "renderJson",
    "controller_renderJson" => "renderJson funktioniert ähnlich wie renderText, erwartet allerdings ein Array. Die Daten werden entsprechend json_encoded und der Content-Type Header wird auf application/json gesetzt. Die Scriptverarbeitung wird auch hier unterbrochen."
	

);


 ?>