<?php

namespace App\Application\Ports;

use App\Application\Queries\GetAllProductsQuery;

interface ICatalogService
{

    public function getAllProducts(GetAllProductsQuery $getAllProductsQuery): array;
}
