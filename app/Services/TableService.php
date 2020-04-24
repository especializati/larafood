<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService
{
    protected $table, $tenantRepository;

    public function __construct(
        TableRepositoryInterface $table,
        TenantRepositoryInterface $tenantRepository
    ) {
        $this->table = $table;
        $this->tenantRepository = $tenantRepository;
    }

    public function getTablesByUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->table->getTablesByTenantId($tenant->id);
    }

    public function getTableByUuid(string $uuid)
    {
        return $this->table->getTableByUuid($uuid);
    }
}
