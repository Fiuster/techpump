<?php

namespace App\Application\Queries;

readonly class GetAllProductsQuery
{
    public string $minimumPrice;

    public function __construct(string $minimumPrice)
    {
        $this->minimumPrice = $minimumPrice;
    }
}
