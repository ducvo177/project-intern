<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Bill;

class BillRepository extends BaseRepository
{
    public function __construct(Bill $model)
    {
        $this->model = $model;
    }

}
