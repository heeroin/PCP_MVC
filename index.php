<?php

require_once "vendor/autoload.php";
require "models/Request.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Models\Competence;

// Spot2 ORM Configuration
function spot() {
    static $spot;
    if ($spot === null) {
      $cfg = new \Spot\Config();
      $cfg->addConnection('mysql', [
          'dbname' => 'victor_pcp',
          'user' => 'victor',
          'password' => '2018',
          'host' => 'localhost',
          'driver' => 'pdo_mysql',
      ]);
      $spot = new \Spot\Locator($cfg);
    }
    return $spot;
}

$conn = array(
    'dbname' => 'victor_pcp',
    'user' => 'victor',
    'password' => '2018',
    'host' => 'localhost',
    'driver' => 'pdo_mysql'  
);

$request = new Request();
$request->get = array();
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
$request->em = EntityManager::create($conn, $config);

$class = "Controllers\\" . (isset($_GET['c']) ? ucfirst($_GET['c']) . 'Controller' : 'IndexController');
$target = isset($_GET['t']) ? $_GET['t'] : "index";
$getParams = isset($_GET['params']) ? $_GET['params'] : null;
$postParams = isset($_POST) ? $_POST : null;
$request->params = [
    "get"  => $getParams,
    "post" => $postParams
];
  
if (class_exists($class, true)) {
    $class = new $class();
    if (in_array($target, get_class_methods($class))) {
        call_user_func_array([$class, $target], $request->params);
    } else {
        call_user_func([$class, "index"]);
    }
} else {
    echo "404 - Error";
}