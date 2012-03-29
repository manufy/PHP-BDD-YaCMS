<?php

/**
 *  Experimental - Behaviour Driven Development of a Content Management System
 *  -------
 *  Developed by Manuel Fernández Yáñez
 *  Distributed under MIT License
 *
 *  @version 0.0.1
 */

// 1 - PHP Initialization

// Make PHP autoload classes

spl_autoload_extensions('.php,.class.php');
spl_autoload_register();

// INSTANTIATION 

$BDDCMS = new BDDCMS\Core\CoreCMS();

?>