<?php 

$_MESSAGES = array(

    "manualTitle" => "Home",
    "manual_start" => "\"bitte nicht noch ein PHP Framework was kein Mensch braucht... \" ",
    "manual_start2" => "Hier der <a href='$1'>Github Link</a>",
    "manual_p1" => "Mir ist vollkommen bewusst, dass es in der großen weiten Welt schon genug PHP Web-Frameworks gibt, die auch durchaus gut benutzbar sind und es liegt mir fern irgendeine Daseinsberechtigung in Frage zu stellen oder in den direkten Vergleich zu treten und zu Urteilen.
     Beim Start von neuen Projekten war ich immer mal wieder auf der Suche nach kleinen, transparenten und flexiblen Frameworks, allerdings habe ich bisher nicht das gefunden was ich suche.",
    "manual_p2" => "Ziel war es also etwas zu bauen, was ohne viel Konfiguration (\"convention over configuration\") und zusätzlichen Bibliotheken auskommt, dabei aber alle Grundfunktionen bereitstellt, alles in transparentem PLAIN PHP.",
    
    "manual_features" => "PLAIN_PHP ist in einer Model-View-Controller Architektur aufgebaut und könnte eine Mischung aus dem wunderbaren Playframework (Java) und Rails, nur für PHP und mit 500 Zeilen Code sein.",
    
    "manual_p3" => "Um sofort loszulegen muss nur in der conf.php der PATH und LOCAL_PATH angepasst werden und es kann losgehen, wobei PATH die URL zum Server darstellt und LOCAL_PATH den Pfad zum localhost. Über das AUTOLOAD_FOLDER Array, können zusätzliche Ordner dem Autoloader zugefügt werden (Klassenname = Dateiname)",
    
    "ajaxTitle" => "AJAX",
    "ajax_jsTitle" => "Javascript",
    "ajax_js1" => "Die jQuery Ajax Schnittstelle wurde nocheinmal gewrapped, damit ohne Umwege eine Controllerfunktion aufgerufen werden kann.",
    "ajax_js2" => "Die Callbacks in der execute und load Funktion sind immer optional.",
    "ajax_js3" => "In den Callbacks wird immer versucht die Antwort in ein JSON Object zu parsen, schlägt das fehl, kommt die Antwort als String an.",
    "ajax_js4" => "Die load Funktion erwartet mindestens einen Parameter, ein JQuery Object in das die Antwort geladen wird.",
    "ajax_js5" => "TIP: Im AjaxCall.js können default Werte eingetragen werden",
    "ajax_js6" => "TIP: Im Controller kann mit <a href='$1'>renderText</a> und <a href='$2'>renderJSON</a> geantwortet werden.",
    
    "ajax_phpTitle" => "PHP",
    "ajax_php1" => "Anders als bei dem Aufruf einer Controllerfunktion über eine Custom-Route mit Parametern, werden bei einem AJAX Request die Parameter im \$_POST Array übertragen.",
    "ajax_php2" => "Es besteht auch die Möglichkeit eine View über AJAX zu laden, indem die View über renderPartial mit dem zweiten Parameter auf true gesetzt wird.",
    
    "routesTitle" => "Routing",
    "routes_urls" => "URLs und Links",
    "routes_urls1" => "Das Routing macht sich die PHP PATH_INFO zunutze, wobei hinter der index.php der entsprechende Controller und die Funktion zu sehen sind.",
    "routes_urls2" => "Die aktuelle Seite befände sich also im <i>Manual</i> Controller und hat die <i>routes</i> Funktion aufgerufen.",
    "routes_urls3" => "Um einen Link auf diese Seite zu erzeugen, ist eine Hilfefunktion vorgesehen. Anbei ein Auszug aus dem Seitenmenü",
    "routes_urls4" => "Näheres dazu ist bei den <a href='$1'>Controllern</a> zu finden.",
    "routes_custom" => "Custom Routing",
    "routes_custom1" => "Unschwer ist zu erkennen, dass die URL zur aktuellen Seite nicht mit der erwarteten Route übereinstimmt:",
    "routes_custom2" => "Es besteht die Möglichkeit in der routes.php in lib/config/ für jede Controllerfunktion eine eigene Route anzugeben.",
    "routes_custom3" => "Es können auch komplexere Routen angegeben werden, in die Werte eingefügt werden können. Diese Werte werden in gechweiften Klammern in den Routes angegeben, der Name hat dabei keine Bedeutung und soll nur beim lesen der Routen helfen.",
    "routes_custom4" => "Wird nun in eine linkTo Funktion ein zweiter Parameter übergeben, wird dieser an die entsprechende Stelle in der Route gesetzt. (Siehe Controller)",
    	
	"controllerTitle" => "Controllers",
	"controller_p1" => "Jeder Controller der mit dem Framework benutzt werden soll (d.h. rendern, Links zu Funktionen etc) muss von der Controller.php Klasse erben:",
	"controller_p2" => "Jeder Controller erbt dadurch eine ganze Reihe nützlicher und benötigter Funktionen",
	"controller_linkTo" => "linkTo",
	"controller_linkTo1" => "Sollte immer bei einer Verlinkung innerhalb des Frameworks benutzt werden, da durch das Routing immer absolute Links benötigt werden und auch immer gegen das Custom Routing gechecked wird.",
	"controller_linkTo2" => "Da es bei der Anzeige von Daten immer notwendig ist, eine ID o.ä. mit zu schicken, gibt es die Möglichkeit Parameter zu übergeben, diese werden in die Custom Routes eingesetzt und auch in dieser Reihenfolge mit in den Controller übergeben. Es können die Parameter aneinander gereiht oder als Array übergeben werden.",
	"controller_redirTo" => "redirectTo",
	"controller_redirTo1" => "Wird genauso wie die linkTo Funktion verwendet.",
	"controller_redirTo2" => "Nach einem Redirect wird kein weiterer Code mehr ausgeführt",
	"controller_render" => "render",
	"controller_render1" => "Die render Methode sucht die zugehörige View und rendert diese auf der index.php",
	"controller_render2" => "Ausführliches dazu gibts unter <a href='$1'>render Views</a>",
	"controller_renderPartial" => "renderPartial",
	"controller_renderPartial1" => "Die renderPartial Methode sucht die zugehörige View und rendert diese an der Stelle wo der Aufruf stattgefunden hat.",
	"controller_renderPartial2" => "Ausführliches dazu gibts unter <a href='$1'>render Views</a>",
	"controller_always" => "always",
	"controller_always1" => "Die always Funktion wird spätestens vor jedem render Aufruf des Controllers ausgeführt. So kann man z.B. Stylesheets oder Script in jeder render Methode eines Controllers laden oder eine Userauthentifizierung für einen kompletten Controller gültig machen.",
	"controller_always2" => "Üblicherweise (in den meisten anderen Frameworks) ist diese Funktion als before() benannt, da es je nach Ausführung einfach nicht zutrifft, habe ich hier nach einem neuen Namen gesucht.",
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
	"controller_keepGet1" => "Die keep Funktion speichert key - value Paare in ein eigenes Session-Cookie, allerdings nur so lange bis sie mit der get Funktion wieder herausgeholt wurden.",

    "controller_renderContent" => "add & setRenderContent", 
    "controller_addSetRenderContent1" => "Mit addRenderContent(key, val) können noch dynamische Teile vor dem render() Aufruf gesetzt werden, um zB in einer View einen Subtitle zu setzen (oder wie mit setTitle den title-Tag in der index.php)",
    "controller_addSetRenderContent2" => "Mit getRenderContent(key) kann in der View der entsprechende Content wieder geladen werden",
    "controller_addSetRenderContent3" => "Unterschied zu keep & get: renderContent wird temporär vom Controller gespeichert und mit einem render() Aufruf ausgegeben und nicht in einem Cookie hinterlegt, ist also nicht von außen einsehbar, allerdings auch nicht über einen Request hinweg gültig.",
    
    "controller_getSetTitleTitle" => "get & setTitle",
    "controller_getSetTitle" => "setTitle ist ein Shortcut für addRenderContent('title', yourTitle), um den title-Tag zu befüllen.",
    
    "controller_renderTextTitle" => "renderText",
    "controller_renderText" => "renderText rendert nicht über die yield() Funktion, sondern setzt gibt den Text mit dem korrekten Content-Type Header (text/plain) aus, und beendet die Scriptverarbeitung.",
    
    "controller_renderJsonTitle" => "renderJSON",
    "controller_renderJson" => "renderJSON funktioniert ähnlich wie renderText, erwartet allerdings ein Array. Die Daten werden entsprechend json_encoded und der Content-Type Header wird auf application/json gesetzt. Die Scriptverarbeitung wird auch hier unterbrochen.",
	
    "foldersTitle" => "Ordnerstruktur",
    "folders_p1" => "Eine leere Applikation sieht folgendermaßen aus.",
    "folders_p2" => "Für alle Ordner die in der lib/config/conf.php Datei in AUTOLOAD_FOLDERS angegeben wurden, ist die Namenskonvention vorrausetzung: Klassenname = Dateiname.",
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
    "views_renderPartial3" => "Wenn eine partial View über AJAX geladen werden soll, kann der zweite Parameter (\$ajax) auf true gesetzt werden um die View auszugeben und die Scriptverarbeitung zu unterbrechen. (-> <a href='$1'>ajax - PHP</a>)",
    
    "i18nTitle" => "Internationalisierung",
    "i18n_p1" => "Alle Sprachen werden in lib/messages/ verwaltet, wobei die Dateinamen aus dem ersten Teil der gängigen I18n - Codes bestehen (der \"ISO 639-2 language code\" z.B. de.php, anstelle von de_DE), bis auf die default-Sprache, die auch als Fallback genutzt wird.",
    "i18n_p2" => "Im normalfall wird die Sprache anhand des HTTP_ACCEPT_LANGUAGE Parameters im Request erkannt und die entsprechende Messagefiles genutzt.",
    "i18n_p3" => "Um einen String auszugeben wurde die __() Funktion eingeführt, die auch beliebig oft Parameterisiert werden kann:",
    "i18n_p4" => "Die Platzhalter $1 setzten sich aus dem Dollarzeichen und dem Index zusammen, die Parameter werden also in genau der Reihenfolge in die Platzhalter eingesetzt, in der sie übergeben werden.",
    
    "rbTitle" => "RedBeanPHP",
    "rb_p1" => "Link zur Homepage und Dokumentation: <a href='http://redbeanphp.com/'>Link</a>",
    "rb_p2" => "RedBeanPHP ist ein ORM der zur Laufzeit die Tabellen und Spalten generiert. Somit ist eine sehr einfache, schnelle und komplett objektorientierte Entwicklung möglich.",
    "rb_p3" => "Nach der Entwicklung wird das Datenbankschema 'gefreezed' um in der Produktionsumgebung einen performanteren Datenbankzugriff zu gewährleisten. Alle benötigten Daten werden über die db.php konfiguriert"
    

)

 ?>