<?php

$app = [];

$app['config'] = require 'config.php';

require 'core/Router.php';
require 'core/database/Conectar.php';
require 'core/database/QueryBuilder.php';
require 'core/Request.php';

$app['database'] = new QueryBuilder(
    Conectar::make($app['config']['database'])
);

date_default_timezone_set('America/Bogota');

function fetch_user_last_activity($user_id, $connect)
{
    $query = "
    SELECT * FROM login_details 
    WHERE user_id = '$user_id' 
    ORDER BY last_activity DESC 
    LIMIT 1
    ";

    $statement = $connect->updateSQL($query);

    $result = $statement->fetchAll();
    
    foreach($result as $row)
    {
        return $row['last_activity'];
    }
}