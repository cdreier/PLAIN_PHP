<div id="sideMenu" data-spy="affix" data-offset-top="0" >
    <ul id="nav" class="nav nav-stacked nav-pills">
        <li class="<?php echo (Manual::isActive("index"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("index"); ?>">Home</a></li>
        <li class="<?php echo (Manual::isActive("coreconcepts"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("coreconcepts"); ?>">Core Concepts</a></li>
        <li class="<?php echo (Manual::isActive("tasks"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("tasks"); ?>">Common Tasks</a></li>
        <li class="<?php echo (Manual::isActive("controllers"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("controllers"); ?>">Controllers</a></li>
        <li class="<?php echo (Manual::isActive("views"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("views"); ?>">Views and Templates</a></li>
        <li class="<?php echo (Manual::isActive("redbean"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("redbean") ?>">DB / RedBeanPHP</a></li>
        <li class="<?php echo (Manual::isActive("ajax"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("ajax"); ?>">AJAX</a></li>
        <li class="<?php echo (Manual::isActive("routes"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("routes"); ?>">Routing</a></li>
        <li class="<?php echo (Manual::isActive("i18n"))?"active":""; ?>" ><a href="<?php echo Manual::linkTo("i18n"); ?>">Internationalization</a></li>
        
    </ul>
    
</div>
