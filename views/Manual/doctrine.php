<h1><?php echo __("doctrineTitle"); ?></h1>

<p><?php echo __("doctrine_p1"); ?></p>
<p><?php echo __("doctrine_p2"); ?></p>
<p><?php echo __("doctrine_p3"); ?></p>

<pre class="prettyprint">
$conn = Doctrine_Manager::connection('mysql://db_user:db_pw@localhost/db_name');    
</pre>

<p><?php echo __("doctrine_p4"); ?></p>
<p><?php echo __("doctrine_p5"); ?></p>

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

<p><?php echo __("doctrine_p6"); ?></p>

<pre class="prettyprint">
Doctrine_Core::dropDatabases();
Doctrine_Core::createDatabases();
Doctrine_Core::generateModelsFromYaml('schema.yml', 'models');
Doctrine_Core::createTablesFromModels('models');
</pre>

<p><?php echo __("doctrine_p7"); ?></p>

<h3><?php echo __("doctrine_create") ?></h3>
<pre class="prettyprint">
$user = new User();
$user->name = "PLAIN PHP";
$user->save();
</pre>

<h3><?php echo __("doctrine_find") ?></h3>
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

<h3><?php echo __("doctrine_query") ?></h3>
<pre class="prettyprint">
$q = Doctrine_Query::create()
    ->select("*")
    ->from("User u")
    ->where("u.name = :name", array(":name" => "Ralf"));
$result = $q->execute();    
</pre>

<h3><?php echo __("doctrine_queryAdvanced") ?></h3>
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

<h3><?php echo __("doctrine_delete") ?></h3>
<pre class="prettyprint">
$user = Doctrine_Core::getTable("User")->find($id);
$user->delete();    
</pre>

