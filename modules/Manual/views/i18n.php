<h1>Internationalization</h1>
<p>All languages ​​are managed in lib/messages/ , with the filename from the first part of the current language-codes (the "ISO 639-2 language code": e.g. de.php, instead of de_DE), except for the default language, which is always used as fallback.</p>
<p>In the best case the language is recognized using the HTTP_ACCEPT_LANGUAGE parameter in the request and used the corresponding message files.</p>
<p>In order to output a string, the __() function was introduced, which can be parameterized as often as required:</p>
<pre class="prettyprint lang-php">
//lib/messages/default.php
"title" => "PLAIN PHP",
"welcome" => "welcome, $1",

//lib/messages/de.php
"welcome" => "Willkommen, $1"

//usage
echo __("title");
echo __("welcome", "Ralf");
</pre>
<p>The placeholders $1 consisted of the dollar sign and the index, the parameters are thus used in exactly the order they are passed.</p>
<pre class="prettyprint lang-php">
"yay" => "i think $1 is the most important word in $2"

echo __("yay", "yay", "programming");
//i think yay is the most important word in programming
echo __("yay", "beer", "germany");
//i think beer is the most important word in germany
</pre>