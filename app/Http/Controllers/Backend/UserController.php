<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Repositories\CourseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository, CourseRepository $courseRepository)
    {
        $this->userRepository = $userRepository;
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return view('admin.users.index', [
            'users' => $this->userRepository->getAll(request()->all())
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();
        $inputs['type'] = User::TYPES['admin'];
        $this->userRepository->save($inputs);
        return redirect()->route('user.index')->with('notification', 'Add new user successfully!!');
    }

    public function show($id)
    {
        return view('admin.users.show', ['user' => $this->userRepository->findById($id, User::class), 'courses' => $this->courseRepository->getByUserId($id)]);
    }

    public function edit($id)
    {
        return view('admin.users.edit', ['user' => $this->userRepository->findById($id, User::class)]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $inputs = $request->all();

        if (!empty($inputs['password'])) {
            $inputs['password'] = Hash::make($inputs['password']);
        } else {
            unset($inputs['password']);
        }

        $this->userRepository->save($inputs, ['id' => $id]);
        return redirect()->route('user.index')->with('notification', 'Update user successfully!!');
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('user.index')->with('error', 'You can not delete your self!!');
        }

        User::destroy($id);
        return redirect()->route('user.index')->with('notification', 'Delete user successfully!!');
    }
}
