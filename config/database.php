<?php

use Illuminate\Support\Str;

$DATABASE_URL = parse_url(env('DATABASE_URL', 'postgres://pftmjvbyozfron:e513187dad7faf53882141769f99f51d43282b8b0148671b7d26064bfb6328ac@ec2-54-209-187-69.compute-1.amazonaws.com:5432/deuv3dfk45impl'));
$CLEARDB_DATABASE_URL = parse_url(env("CLEARDB_DATABASE_URL", 'mysql://b992ae83e6eb30:839ca4ec@us-cdbr-east-06.cleardb.net/heroku_34ef08290ced3b8'));
$JAWSDB_DATABASE_URL = parse_url(env('JAWSDB_URL','mysql://ffef7curujxh7pqg:zm38mw2fcfk498aj@n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/qna2ye0ph7zpko6i')) ;
return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],
        /**/
        'mysql' => [
            'driver' => 'mysql',
            //'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'softxkah_wims2'),
            'username' => env('DB_USERNAME', 'softxkah_wims_user1'),
            'password' => env('DB_PASSWORD', 'R4GVTRa4N7a5Ush'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => 'wims1_',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            //'options' => extension_loaded('pdo_mysql') ? array_filter([
            //    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            //]) : [],
        ],
        
        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],/*
        
        'mysql' => [
            'driver' => 'mysql',
            'url' => env('JAWSDB_URL', 'mysql://ffef7curujxh7pqg:zm38mw2fcfk498aj@n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/qna2ye0ph7zpko6i'),
            'host' => env('CLEARDB_DATABASE_HOST', '4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'),
            'port' => env('CLEARDB_PORT', '3306'),
            'database' => env('CLEARDB_DATABASE', 'qna2ye0ph7zpko6i'),
            'username' => env('CLEARDB_USERNAME', 'ffef7curujxh7pqg'),
            'password' => env('CLEARDB_PASSWORD', 'zm38mw2fcfk498aj'),
            'unix_socket' => env('CLEARDB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => 'wims_',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            //'options' => extension_loaded('pdo_mysql') ? array_filter([
             //   PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            //]) : [],
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => $DATABASE_URL["host"],
            'port' => $DATABASE_URL["port"],
            'database' => ltrim($DATABASE_URL["path"], "/"),
            'username' => $DATABASE_URL["user"],
            'password' => $DATABASE_URL["pass"],
            'charset' => 'utf8',
            
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'require',
        ],*/

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
