<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.users.index', [
            'all_users' => $this->userRepository->getAll(request()->all())
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'digits_between:10,11', 'numeric', 'unique:users,phone'],
            'email' => ['required', 'max:255', 'regex:/^.+@.+$/i', 'unique:users,email'],
            'password' => ['required_with:password_confirmation', 'same:password_confirmation', 'max:255', Password::min(6)->letters()->numbers()->symbols()],
            'password_confirmation' => [Password::min(6)->letters()->numbers()->symbols()]
        ]);

        return redirect()->route('user.index', [
            'all_users' => $this->userRepository->store(request()->all()),
        ])->with('notification', 'Add new user successfully!!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.users.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
