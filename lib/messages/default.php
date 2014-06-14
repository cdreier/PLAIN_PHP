<?php 

$_MESSAGES = array(
	
	"title" => "PLAIN_PHP",
	"other_example" => "other example:",
	
    "manualTitle" => "Home",
    "manual_start2" => "if you are just looking for the code or the download, here is the <a href='$1'>github link</a>",
    "manual_p1" => "Of course, there is one or the other PHP framework, however, im missing <strong>a lightweight, fast, flexible, beginner-friendly and transparent MVC framework</strong>.",
    "manual_p2" => "Here PLAIN_PHP comes into play, without much configuration (\"convention over configuration \") but with all the basic functions you need in life. And everything in transparent PLAIN PHP.",
    
    "manual_features" => "PLAIN_PHP is constructed in a Model-View-Controller architecture and could be a mixture of the wonderful PlayFramework (Java) and rails, just for PHP and with only 500 lines of code.",
    
    "manual_p3" => "To get started no additional config is needed, just unzip on your webserver and start.",
    
    "coreConcepts_title" => "Core Concepts",
    
    "coreConcepts_static_title" => "All static",
    "coreConcepts_static" => "All controller functions are static, you do not need any instantiation at any time. Also you can access your controllers across each other.",
    
    "coreConcepts_conventions_title" => "Naming conventions",
    "coreConcepts_conventions" => "For any who has ever worked with an MVC framework that should be nothing new: the link between controller and view is done by correctly naming the folders and files to the controller and the calling function.",
    
    "coreConcepts_plain_title" => "Plain PHP",
    "coreConcepts_plain" => "The framework consists of pure PHP code, nothing like the popular PHP annotations or something else is used, but only the native PHP language constructs.",
    
    
    
    "ajaxTitle" => "AJAX",
    "ajax_jsTitle" => "Javascript",
    "ajax_js1" => "The jQuery ajax API gets a small wrapper, where you can call controller-functions without detour.",
    "ajax_js2" => "Callbacks in the execute and load functions are always optional.",
    "ajax_js3" => "The callback always tries to parse the response to a JSON object, if the parser fails, the response is a normal string.",
    "ajax_js4" => "The load callback needs the minimum of one parameter, a jQuery object which receives the response",
    "ajax_js5" => "TIP: in AjaxCall.js you can define default values.",
    "ajax_js6" => "TIP: create easy responses in your controller with <a href='$1'>renderText</a> and <a href='$2'>renderJSON</a>",
    
    "ajax_phpTitle" => "PHP",
    "ajax_php1" => "Unlike calling a controller function via a custom route with parameters, the parameters in a AJAX request are transfereed in the \$_POST array.",
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
	
    "controllerTitle" => "Controllers",
    "controller_p1" => "Each controller to be used with the framework (i.e. render views, links to functions etc) must extend Controller class:",
    "controller_p2" => "Each controller inherits a whole range of useful and needed features",
    "controller_linkTo" => "linkTo",
    "controller_linkTo1" => "Should always be used when linking within the framework, because absolute links are needed by the routing and always checks against your custom routes.",
    "controller_linkTo2" => "Since it is always necessary when displaying data, e.g. an ID, it is possible to pass parameters. These are used in the custom routes and are in the same order the parameters in your controller function. You can pass an array or lined up values.",
    "controller_redirTo" => "redirectTo",
    "controller_redirTo1" => "Is just the same usage like the linkTo function.",
    "controller_redirTo2" => "After a redirect no other code is interpret.",
    "controller_render" => "render",
    "controller_render1" => "The render method looks up the appropriate view and renders it on the index.php (in the yield())",
    "controller_render2" => "Please find details in <a href='$1'>render views</a>",
    "controller_renderPartial" => "renderPartial",
    "controller_renderPartial1" => "The renderPartial method searches the associated view and renders it to the point where the call took place.",
    "controller_renderPartial2" => "Please find details in <a href='$1'>render views</a>",
    "controller_always" => "always",
    "controller_always1" => "The always function runs at the latest before each render call. So you can add stylesheets or scripts for your controllers or make a user authentication for a full controller valid.",
    "controller_always2" => "Usually (in most other frameworks), this function is called as before(), as it simply is not true depending on the execution order, I was looking here for a new name.",
    "controller_addScript" => "addScript",
    "controller_addScript1" => "There are always JavaScripts that can be used only on a single, or only a few pages. In order for this not to be loaded on every page request, you can load the required scripts in the corresponding controller function",
    "controller_addStylesheet" => "addStylesheet",
    "controller_addStylesheet1" => "Has the same functionality as addScript, only for stylesheets",
    "controller_addStylesheet2" => "Also available in the above example",
    "controller_isActive" => "isActive",
    "controller_isActive1" => "The isActive function tries to find out (based on the URL and the renderArgs) if the calling controller is the currently active.",
    "controller_isActive2" => "As an optional parameter, the view (or function) cann be passed, so the \"active\" result is additionally limited to the view",
    "controller_isActive3" => "A recent example: on the current page, the side menu is only displayed when you are in the Manual Controller.",
    "controller_keepGet" => "keep & get",
    "controller_keepGet1" => "The keep function stores key - value pairs in a private session cookie, and kept as long until they brought back with the get() function.",
    
    "controller_renderContent" => "add & setRenderContent", 
    "controller_addSetRenderContent1" => "With addRenderContent(key, val) you can add dynamic parts before the render() call, e.g. to set in a view a subtitle (or with setTitle the title tag in the index.php)",
    "controller_addSetRenderContent2" => "With getRenderContent(key) the content can be loaded in the view.",
    "controller_addSetRenderContent3" => "Difference to keep & get: renderContent is temporarily stored by the controller and issued with a render() call, and not stored in a cookie, so it can not be seen from outside, but also not valid for a request away.",
    
    "controller_getSetTitleTitle" => "get & setTitle",
    "controller_getSetTitle" => "setTitle is a shortcut for addRenderContent('title', your title) to fill the title tag.",
    
    "controller_renderTextTitle" => "renderText",
    "controller_renderText" => "
    renderText does not render in the yield() function, but prints the text with the correct Content-Type header (text / plain) set, and ends the script processing.",
    
    "controller_renderJsonTitle" => "renderJSON",
    "controller_renderJson" => "renderJSON works similarly to renderText, but expects an array. The data will output as a json_encoded string with the Content-Type header is set to application / json. The script processing is suspended here.",
    
    "foldersTitle" => "Folder-structure",
    "folders_p1" => "Following you'll see a blank application.",
    "folders_p2" => "For all the folders that were specified in the lib/config/conf.php file in AUTOLOAD_FOLDERS, the naming convention is prerequisite: class name = filename. You can also use the * wildcard to add all subfolders",
    "folders_p3" => "The public folder contains all the JavaScript, CSS or image-files, in short: all data that should be accassable from outside. All other folders are protected with a .htaccess file.",
    
    "viewsTitle" => "Views rendern",
    "views_p1" => "To finally show something in the browser, the view must be rendered.",
    "views_render" => "render",
    "views_render1" => "The render function can only be called from a static controller function.",
    "views_render2" => "It is checked if there is a folder with the same name as the calling controller in the views folder, and if there is a php file with the same name as the calling function.",
    "views_render3" => "This file is in the index.php included, at the point where yield() function is called.",
    "views_render4" => "In order to send data to the view of a controller, an associative array can be passed. The keys of the array are expanded to the variables in the view",
    "views_renderPartial" => "renderPartial",
    "views_renderPartial1" => "The renderPartial function is used basically in the same way as the render function, with the difference that the view is included in the exact point where the function was called. For example, again the side menu:",
    "views_renderPartial2" => "Again, data can be transferred via an associative array.",
    "views_renderPartial3" => "If you want to load a partial view via AJAX, the second argument (\$ajax) should be set to true, to output the plain html and cancel the script execution. (-> <a href='$1'>ajax - PHP</a>)",
    
    "i18nTitle" => "Internationalization",
    "i18n_p1" => "All languages ​​are managed in lib/messages/ , with the filename from the first part of the current language-codes (the \"ISO 639-2 language code\": e.g. de.php, instead of de_DE), except for the default language, which is always used as fallback.",
    "i18n_p2" => "In the best case the language is recognized using the HTTP_ACCEPT_LANGUAGE parameter in the request and used the corresponding message files.",
    "i18n_p3" => "In order to output a string, the __() function was introduced, which can be parameterized as often as required:",
    "i18n_p4" => "The placeholders \$1 consisted of the dollar sign and the index, the parameters are thus used in exactly the order they are passed.",
    
    "rbTitle" => "DB / RedBeanPHP",
    "rb_p1" => "Link to the official website and documentation: <a href='http://redbeanphp.com/'>Link</a>",
    "rb_p2" => "RedBeanPHP is an ORM that generates the tables and columns at runtime. Thus, a very simple, fast and completely object-oriented development is possible.",
    "rb_p3" => "After the development, the database schema gets 'gefreezed' to ensure a performant database access to the production environment. All necessary data is configured on the db.php",
    "rb_p4" => "To connect with a database, you just need to create a config file in the folder lib/config/db/ with the same name as your target-server (without http or www). If a db-config file is found, we try to connect. In this way we can have several database-configs for diffrent server (local, dev, live)"


);


 ?>