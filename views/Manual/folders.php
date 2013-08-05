<h1>Ordnerstruktur</h1>

Eine MVC Ordnerstruktur wurde beibehalten. Eine leere Applikation sieht folgendermaßen aus. 
<br />

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
                        	<li>doctrine</li>
                        	<li>
                        		PLAIN_PHP
                        		<ul>
                        			<li>Controller.php</li>
                        			<li>Routes.php</li>
                        		</ul>
                    		</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                models
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

<p>Dabei werden alle Controller im controllers Ordner automatisch geladen, wobei hier die Namenskonvention vorrausetzung ist: Klassenname = Dateiname.</p>
<p>Der lib Ordner beherbergt alle Javascript und CSS Dateien, sowie Bilder und auch <a href="<?php echo Manual::linkTo("doctrine") ?>">Doctrine</a></p>



