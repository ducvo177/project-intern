<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Bill;
use App\Models\CourseUser;
use Illuminate\Support\Facades\Schema;

class StatisRepository extends BaseRepository
{
    protected $Bmodel;
    public function __construct(CourseUser $CUmodel, Bill $Bmodel)
    {
        $this->model = $CUmodel;
        $this->Bmodel = $Bmodel;
    }

    public function getBillStatis($userId, $beginDate, $endDate)
    {
        $beginDate = date('Y-m-d H:i:s', strtotime($beginDate . ' 00:00:00'));
        $endDate = date('Y-m-d H:i:s', strtotime($endDate . ' 23:59:59'));
            $bills = $this->Bmodel->where('user_id', $userId)
                ->whereBetween('created_at', [$beginDate, $endDate])
                ->get();

            return $bills;
    }
    public function getActionStatis($userId, $beginDate, $endDate)
    {
        $beginDate = date('Y-m-d H:i:s', strtotime($beginDate . ' 00:00:00'));
        $endDate = date('Y-m-d H:i:s', strtotime($endDate . ' 23:59:59'));
            $bills = $this->model->where('user_id', $userId)
                ->whereBetween('created_at', [$beginDate, $endDate])
                ->get();

            return $bills;
    }


}
