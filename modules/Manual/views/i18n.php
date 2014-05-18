<h1><?php echo __("i18nTitle") ?></h1>
<p><?php echo __("i18n_p1") ?></p>
<p><?php echo __("i18n_p2") ?></p>
<p><?php echo __("i18n_p3") ?></p>
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
<p><?php echo __("i18n_p4") ?></p>
<pre class="prettyprint lang-php">
"yay" => "i think $1 is the most important word in $2"

echo __("yay", "yay", "programming");
//i think yay is the most important word in programming
echo __("yay", "beer", "germany");
//i think beer is the most important word in germany
</pre>