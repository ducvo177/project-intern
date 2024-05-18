<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\StatisRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class StatisController extends Controller
{
    protected $userRepository;
    protected $statisRepository;
    public function __construct(UserRepository $userRepository, StatisRepository $statisRepository)
    {
        $this->statisRepository = $statisRepository;
        $this->userRepository = $userRepository;

    }

    public function index()
    {
        return view('admin.statistical.index',['userList' => $this->userRepository->getAll(request()->all())]);
    }

    public function detail(Request $request){
        if($request['type']= "revenue"){
            $statis = $this->statisRepository->getBillStatis($request['user_id'],$request['begin_date'],$request['end_date']);
        }

        return view('admin.statistical.detail',['statis'=>$statis]);


    }
}
