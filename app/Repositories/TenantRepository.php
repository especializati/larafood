<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantRepository implements TenantRepositoryInterface
{
    protected $entity;

    public function __construct(Tenant $tenant)
    {
        $this->entity = $tenant;
    }

    public function getAllTenants($per_page)
    {
        return $this->entity->paginate($per_page);
    }

    public function getTenantByUuid(string $uuid)
    {
        return $this->entity
                        ->where('uuid', $uuid)
                        ->first();
    }
}
