<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        'db' => function(ContainerInterface $c){
            $settings = $c->get('settings');
          
            $db = $settings['db'];
           
            $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'] . ';port=' . $db['port'],
           $db['user'], $db['pass']);
           // $pdo = new PDO('mysql:host=localhost;dbname=moviedb;port=3306',
            //  "root", "root");
                    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        },
        'MoviesController' => function(ContainerInterface $c){
            $model = new \App\Model\Movie($c->get('db'));
            return new \App\Controller\MoviesController($c, $model);
        },
    ]);
};
