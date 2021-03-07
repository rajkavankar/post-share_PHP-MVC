<?php

require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

function __autoload($classname)
{
    require_once 'libraries/' . $classname . '.php';
}
