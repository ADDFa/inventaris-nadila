<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\User;

class Auth extends BaseController
{
    public function login()
    {
        if (session('login')) return redirect()->to('/dashboard');

        $data = [
            'title'         => 'Login Inventaris',
            'style'         => 'login'
        ];

        return view('pages/login', $data);
    }

    public function masuk()
    {
        $user_models = new User();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data_user = $user_models->where('username', $username)->find();

        if (!$data_user) return redirect()->to('/')->withInput()->with('wrongUsername', 'Username Salah');
        if (!password_verify($password, $data_user[0]->password)) return redirect()->to('/')->withInput()->with('wrongPassword', 'Password Salah');

        session()->set([
            'login' => true,
            'user'  => $data_user[0]
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
