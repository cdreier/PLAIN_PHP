<?php

require_once(dirname(__FILE__) . '/lib/vendor/doctrine/Doctrine.php');
spl_autoload_register(array('Doctrine', 'autoload'));
spl_autoload_register(array('Doctrine_Core', 'modelsAutoload'));
$manager = Doctrine_Manager::getInstance();

$manager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine_Core::VALIDATE_ALL);
$manager->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core::EXPORT_ALL);
$manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core::MODEL_LOADING_CONSERVATIVE);
$manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);

//$conn = Doctrine_Manager::connection('mysql://db_user:db_pw@localhost/db_name');
$conn = Doctrine_Manager::connection('mysql://debug:debug@localhost/debug');
$conn->setAttribute(Doctrine_Core::ATTR_QUOTE_IDENTIFIER, true);
$conn->setCollate('utf8_general_ci');
$conn->setCharset('utf8');

Doctrine_Core::loadModels('models');
