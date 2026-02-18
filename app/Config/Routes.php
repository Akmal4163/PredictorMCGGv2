<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->post('api/predict', 'Api\GogoPredictor::predict');
