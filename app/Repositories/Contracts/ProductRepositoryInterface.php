<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getproductsByTenantId(int $idTenant, array $categories);
    public function getProductByFlag(string $flag);
}
