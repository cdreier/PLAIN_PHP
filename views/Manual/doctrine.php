<h1>Doctrine 1.2.4</h1>

<p>Per Default ist Doctrine 1.2.4 als Datenbank ORM im Framework enthalten. Eine komplette Dokumentation findet man <a href="https://doctrine.readthedocs.org/en/latest/en/manual/">hier online</a></p>
<p>Doctrine 2 kam nicht zum Einsatz, da die Handhabung und Konfiguration von Doctrine 1.2 deutlich einfacher und schneller ist.</p>
<p>Die bootstrap.php enthält die Verbindung zum Doctrine ORM und zur Datenbank</p>

<pre class="prettyprint">
$conn = Doctrine_Manager::connection('mysql://db_user:db_pw@localhost/db_name');    
</pre>

<p>Um eine Datenbank initial zu erstellen, benötigt man ein schema.yml File. Eine Ausführliche Erklärung dazu ist in der <a href="https://doctrine.readthedocs.org/en/latest/en/manual/introduction-to-models.html#schema-files">Dokumentation</a> zu finden</p>
<p>Ein User mit Autos würde wie folgt aussehen, inkl. beidseitiger Aliase</p>

<pre class="prettyprint">
User:
  actAs: [Timestampable]
  columns:
    id:
      type: integer
      primary: true
      autoincrement: true
    name: string
    age: integer
    driverLicense: boolean
    
Car:
  actAs: [Timestampable]
  columns:
    id:
      type: integer
      primary: true
      autoincrement: true
    brand: string
    ps: integer
    ownerId: integer
  relations:
    Owner:
      class: User
      foreign: id
      local: ownerId
      foreignAlias: Cars
</pre>

<p>Folgende 4 Zeilen übernehmen das komplette Erstellen der Datenbank und das Generieren der Model Klassen. 
    ACHTUNG! Beim Ausführen wird die Datenbank gedropped und komplett neu erstellt, alle Daten gehen verloren!</p>

<pre class="prettyprint">
Doctrine_Core::dropDatabases();
Doctrine_Core::createDatabases();
Doctrine_Core::generateModelsFromYaml('schema.yml', 'models');
Doctrine_Core::createTablesFromModels('models');
</pre>

<p>Davon ausgehend, dass es eine User Tabelle gibt, ist das Arbeiten mit Doctrine denkbar einfach.</p>

<h3>erstellen eines neuen Eintrags</h3>
<pre class="prettyprint">
$user = new User();
$user->name = "PLAIN PHP";
$user->save();
</pre>

<h3>finden von Einträgen</h3>
<pre class="prettyprint">
//find by primary key
$user = Doctrine_Core::getTable("User")->find($id);

//find all
$users = Doctrine_Core::getTable("User")->findAll();

//Magic finders
//all users named ralf
$users = Doctrine_Core::getTable("User")->findByName("Ralf");
//first user with name ralf
$users = Doctrine_Core::getTable("User")->findOneByName("Ralf");
//all women with name ralf
$us = Doctrine_Core::getTable("User")->findByNameAndGender("Ralf", "F");
</pre>

<h3>Doctrine Queries</h3>
<pre class="prettyprint">
$q = Doctrine_Query::create()
    ->select("*")
    ->from("User u")
    ->where("u.name = :name", array(":name" => "Ralf"));
$result = $q->execute();    
</pre>
<h3>advanced Queries</h3>
<pre class="prettyprint">
//find all ralfs with a Winzer as friend order by age descending
$q = Doctrine_Query::create()
    ->select("*")
    ->from("User u")
    ->leftJoin("u.Friend f")
    ->where("u.name = :name AND f.job = :job", 
        array(":name" => "Ralf",
            ":job" => "Winzer"))
    ->orderBy("f.age DESC");
$result = $q->execute();    
</pre>

<h3>löschen von Einträgen</h3>
<pre class="prettyprint">
$user = Doctrine_Core::getTable("User")->find($id);
$user->delete();    
</pre>

