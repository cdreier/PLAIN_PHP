<h1>DB / RedBeanPHP</h1>
<p>Link to the official website and documentation: <a href='http://redbeanphp.com/'>Link</a></p>
<p>RedBeanPHP is an ORM that generates the tables and columns at runtime. Thus, a very simple and fast development is possible as the database will be build in the background.</p>
<p>After the development, the database schema gets 'freezed' to ensure a performant database access to the production environment. All necessary data is configured in lib/config/db.php</p>
<p>To connect with a database, you just need to create a config file in the folder lib/config/db/ with the same name as your target-server (without http or www). If a db-config file is found, we try to connect. In this way we can have several database-configs for diffrent server (local, dev, live)</p>
<pre class="prettyprint lang-php">
//conf/db/plain-php.drailing.net.php
$_DB = array(
	"db_name" => "debug",
	"db_user" => "debug",
	"db_password" => "debug",
	"db_host" => "localhost",
	"db_freeze" => false // check redbeanphp docu
);
</pre>
