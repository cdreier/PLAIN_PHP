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
                    <li>
                        Controller.php
                    </li>
                </ul>
            </li>
            <li>
                lib
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
                    <li>
                        vendor (doctrine)
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



<h2>URLs und Links</h2>
<p>Das Routing macht sich die PHP PATH_INFO zu nutze, wobei hinter der index.php der entsprechende Controller und die Funktion zu sehen sind.</p>
<p>Die aktuelle Seite befindet sich also im <i>Manual</i> Controller und hat die <i>folder</i> Funktion aufgerufen.</p>
<br/>
<p>Um einen Link auf diese Seite zu erzeugen, ist eine Hilfefunktion vorgesehen. Anbei ein Auszug aus dem Seitenmenü</p>
<pre class="prettyprint ">
<?php echo htmlentities('<li><a href="<?php echo Manual::linkTo("folders"); ?>">Ordnerstruktur und Routing</a></li>') ?>
</pre>
<p>Näheres dazu ist bei den <a href="<?php echo Manual::linkTo("controllers") ?>">Controllern</a> zu finden.</p> 











