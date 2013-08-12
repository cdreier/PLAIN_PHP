<div id="sideMenu">
    <ul>
        <li><a href="<?php echo Manual::linkTo("index"); ?>">Home</a></li>
        <li><a href="<?php echo Manual::linkTo("folders"); ?>"><?php echo __("foldersTitle") ?></a></li>
        <li><a href="<?php echo Manual::linkTo("routes"); ?>"><?php echo __("routesTitle") ?></a></li>
        <li><a href="<?php echo Manual::linkTo("controllers"); ?>"><?php echo __("controllerTitle") ?></a></li>
        <li><a href="<?php echo Manual::linkTo("views"); ?>"><?php echo __("viewsTitle") ?></a></li>
        <li><a href="<?php echo Manual::linkTo("ajax"); ?>"><?php echo __("ajaxTitle") ?></a></li>
        <li><a href="<?php echo Manual::linkTo("doctrine"); ?>"><?php echo __("doctrineTitle") ?></a></li>
        <li><a href="<?php echo App::linkTo("debug", array("one", "two")); ?>">DEBUG</a></li>
    </ul>
</div>