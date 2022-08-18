<?php

use App\Core\App;
use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;

require 'functions.php';

// Calls the App DI container and the bind method within
// 1st value is the label (alias)
// 2nd value is what to require, in this case the config array

//$app['config'] = require 'config.php';
App::bind('config', require 'config.php');


//$app['database'] = new QueryBuilder(Connection::connect($app['config']['database'])); // New PDO instance (database connection)
App::bind('database', new QueryBuilder(
    Connection::connect(App::get('config')['database'])
));



