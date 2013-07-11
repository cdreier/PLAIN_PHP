<h1>Views rendern</h1>
<p>Um nun auch endlich etwas in Browser anzuzeigen, müssen Views gerendert werden.</p>
<h3>render</h3>
<pre class="prettyprint">
class Manual extends Controller{
    public static function views(){
        //renders the file in views/Manual/views.php
        self::render();
    }
}
</pre>
<p>Die render Funktion kann nur aus einer statischen Controllerfunktion aus aufgerufen werden.</p>
<p>Dabei wird in den views Ordner geschaut und überprüft ob es einen Ordner gibt, der genauso benannt ist wie die Controllerklasse
    und eine php-Datei mit dem gleichen Namen wie die Funktion selbst.</p>
<p>diese Datei wird in der index.php included, an der Stelle wo yield() aufgerufen wurde.</p>
<pre class="prettyprint">
//index.php
if(Controller::$shouldRender){
    Controller::yield();
}
</pre>

<p>Um aus einem Controller heraus auch Daten an die View zu schicken, kann ein assoziatives Array übergeben werden. 
    Die keys aus dem Array werden zu nutzbaren Variablen in der View</p>
    
<pre class="prettyprint">
public static function welcome(){
    self::render(array(
        "name" => "Ralf",
        "gender" => "Frau"
    ));
}
</pre>
<pre class="prettyprint lang-php">
//welcome.php
echo "Herzlich Willkommen $gender $name";
//wird ausgegeben als
Herzlich Willkommen, Frau Ralf 
</pre>


<br />
<h3>renderPartial</h3>
<p>Die renderPartial Funktion wird im grunde genommen genauso verwendet wie die render Funktion, mit dem Unterschied, 
    dass die View an genau dem Punk included wird, wo die Funktion aufgeruden wurde. Zum Beispiel wieder das Seitenmenü</p>
<pre class="prettyprint">
//index.php
if(Manual::isActive()){
    //the side menu is rendere right here
    Manual::sideMenu();
}

//Manual.php Controller
public static function sideMenu(){
    self::renderPartial();
}
</pre>
<p>Auch hier können wieder Daten über ein assoziatives Array übergeben werden.</p>