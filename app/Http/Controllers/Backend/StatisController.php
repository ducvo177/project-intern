<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class StatisController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    public function index()
    {

        return view('admin.statistical.index',['userList' => $this->userRepository->getAll(request()->all())]);
    }

    public function detail(Request $request){
        dd($request->all());
    }
}
