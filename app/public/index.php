<?php

declare(strict_types=1);

use dockerphp\framework\Http\Request;
use dockerphp\framework\Http\Response;
use dockerphp\framework\Http\HttpKernel;

define('BASE_PATH', dirname(__DIR__));
define('ROOT_PATH', dirname(__FILE__). DIRECTORY_SEPARATOR);

require_once dirname(__DIR__) . '/vendor/autoload.php'; 

try {

    // $dsn = "mysql:host=db;dbname=app_test";
    $dsn = "mysql:host=$_ENV[MYSQL_HOST];dbname=$_ENV[MYSQL_DATABASE]";
    $db = new \PDO($dsn, $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'] , []);    

    $query = 'SELECT * FROM users';
    $stmt = $db->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    foreach ($users as $user) {
        echo $user->name . '<br>';
    }


} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), $e->getCode());
}

$request = Request::createFromGlobals();
$kernel = new HttpKernel();

$response = $kernel->handle($request);
$response->send();
