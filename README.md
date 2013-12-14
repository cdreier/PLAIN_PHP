PLAIN_PHP
=========

Quick-Start
-----------

To get started, just go to the lib/config/conf.php and edit the PATH and LOCAL_PATH, with PATH is the URL to the webserver and LOCAL_PATH is the path to the localhost. With the AUTOLOAD_FOLDER array, you can add additional folders to the autoloader (classname = filename)

```php
// lib/config/conf.php
$_CONFIG = array(
    "PATH" => "http://plain-php.drailing.net/",
    "LOCAL_PATH" => "http://localhost/PLAIN_PHP/",
    "AUTOLOAD_FOLDERS" => array(
		"lib/vendor/PLAIN_PHP/",
		"controllers/"
	)
);
```

now you can write your first controller and render the view

```php
// controllers/App.php
class App extends Controller {
    public static function index() {
        self::render();
    }
}
```

please find the full documentation at: http://plain-php.drailing.net/
