<h1><?php echo __("foldersTitle") ?></h1>

<p><?php echo __("folders_p1") ?></p>

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
                			<li>conf.php</li>
                			<li>db.php</li>
                			<li>routes.php</li>
                		</ul>
                	</li>
                    <li>
                        css
                    </li>
                    <li>
                        img
                    </li>
                    <li>
                        js
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
                ajax.php
            </li>
            <li>
                index.php
            </li>
        </ul>
    </li>
</ul>

<p><?php echo __("folders_p2") ?></p>
<p><?php echo __("folders_p3", Manual::linkTo("doctrine")) ?></p>



