<?php
namespace App\Controller;

use Psr\Container\ContainerInterface;
use App\Model\Movie;

class MoviesController {
    public function __construct(ContainerInterface $container, Movie $model)
    {
        $this->container = $container;
        $this->model = $model;
    }

    public function test($request, $response, $args) 
    {
        $movies = [
            '1' => [
                'name' => 'Pulp Fiction',
                'director' => 'Quentin Tarantino'
            ],
            '2' => [
                'name' => 'Rear Window',
                'director' => 'Alfred Hitchcock'
            ]
        ];
        $response->getBody()->write(\json_encode($movies));
        return $response->withHeader('Content-Type', 'application/json');
    }
}