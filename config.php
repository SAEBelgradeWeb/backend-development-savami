<?php

return [
  "database" => [
      "db_engine" => 'mysql',
      'host' => '127.0.0.1',
      'database_name' => 'job_listings',
      'user' => 'root',
      'password' => '',
      "options" => [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
  ],
];
