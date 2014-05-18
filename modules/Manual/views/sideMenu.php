<div id="sideMenu" data-spy="affix" data-offset-top="0" >
    <ul id="nav" class="nav nav-stacked nav-pills">
        <li class="<?php echo (Manual::isActive("index"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("index"); ?>">Home</a></li>
        <li class="<?php echo (Manual::isActive("coreconcepts"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("coreconcepts"); ?>"><?php echo __("coreConcepts_title") ?></a></li>
        <li class="<?php echo (Manual::isActive("folder"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("folders"); ?>"><?php echo __("foldersTitle") ?></a></li>
        <li class="<?php echo (Manual::isActive("controllers"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("controllers"); ?>"><?php echo __("controllerTitle") ?></a></li>
        <li class="<?php echo (Manual::isActive("views"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("views"); ?>"><?php echo __("viewsTitle") ?></a></li>
        <li class="<?php echo (Manual::isActive("redbean"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("redbean") ?>"><?php echo __("rbTitle") ?></a></li>
        <li class="<?php echo (Manual::isActive("ajax"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("ajax"); ?>"><?php echo __("ajaxTitle") ?></a></li>
        <li class="<?php echo (Manual::isActive("routes"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("routes"); ?>"><?php echo __("routesTitle") ?></a></li>
        <li class="<?php echo (Manual::isActive("i18n"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("i18n"); ?>"><?php echo __("i18nTitle") ?></a></li>
        
        <li ><a href="<?php echo App::linkTo("login"); ?>"><?php echo __("DEMO login") ?></a></li>
    </ul>
    
    <ul class="nav nav-tabs nav-justified">
        <li><a href="<?php echo App::linkTo("setLang", "en") ?>"><img src="<?php echo App::img("en.png") ?>" /></a></a></li>
        <li><a href="<?php echo App::linkTo("setLang", "de") ?>"><img src="<?php echo App::img("de.png") ?>" /></a></li>
    </ul>
    
    
</div>
