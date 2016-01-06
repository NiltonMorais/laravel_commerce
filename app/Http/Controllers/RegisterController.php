<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function index()
    {
        return view('register.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RegisterRequest $request)
    {
        $input = $request->all();

        $data = [
            'email' => $input['email'],
            'password' => $input['password'],
        ];

        $input['is_admin'] = $request->get('is_admin') ? true : false;
        $input['password'] = bcrypt($input['password']);

        $user = $this->userModel->fill($input);
        $user->save();



        Auth::attempt($data);

        return redirect()->route('account.orders');
    }

}
