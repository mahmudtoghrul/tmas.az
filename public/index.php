<?php
/**
 * TMAS.az - TM Analytics & Strategy
 * Front Controller
 */

define('ROOT_PATH', dirname(__DIR__));
define('START_TIME', microtime(true));

require_once ROOT_PATH . '/config/app.php';
require_once ROOT_PATH . '/core/autoload.php';

// Initialize application
$app = new Core\App();
$app->run();
