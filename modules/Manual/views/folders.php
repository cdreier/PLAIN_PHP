<h1>Skelletton</h1>

<p>Following you'll see a blank application.</p>

<ul>
    <li>
        root
        <ul>
            <li>
                controllers
                <ul>
                    <li>
                        App.php
                    </li>
                </ul>
            </li>
            <li>
                lib
                <ul>
                	<li>
                		config
                		<ul>
                		    <li>db
                		        <ul>
                		            <li>localhost</li>
                		        </ul>
                		    </li>
                			<li>conf.php</li>
                			<li>routes.php</li>
                		</ul>
                	</li>
                    <li>
                        vendor
                        <ul>
                        	<li>redbeanphp</li>
                        	<li>
                        		PLAIN_PHP
                        		<ul>
                        			<li>Controller.php</li>
                        			<li>Routing.php</li>
                        			<li>I18n.php</li>
                        		</ul>
                    		</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
            	modules
            </li>
            <li>
            	public
            	<ul>
            		<li>
                        css
                    </li>
                    <li>
                        img
                    </li>
                    <li>
                        js
                    </li>
            	</ul>
            </li>
            <li>
            	templates
            	<ul>
            		<li>
            			index.php
            		</li>
            	</ul>
            </li>
            <li>
                views
                <ul>
                    <li>
                        App
                        <ul>
                            <li>
                                index.php
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li>
                index.php
            </li>
        </ul>
    </li>
</ul>

<p>For all the folders that were specified in the lib/config/conf.php file in AUTOLOAD_FOLDERS, the naming convention is prerequisite: class name = filename. You can also use the * wildcard to add all subfolders</p>
<p>The public folder contains all the JavaScript, CSS or image-files, in short: all data that should be accassable from outside. All other folders are protected with a .htaccess file.</p>



