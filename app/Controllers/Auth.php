<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Credential;

class Auth extends BaseController
{
    public function login()
    {
        if (session('login')) return redirect()->to('/dashboard');

        $data = [
            'title'         => 'Login Inventaris',
            'style'         => 'login'
        ];

        return view('login', $data);
    }

    public function entry()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $users = (new Credential())->where('username', $username)->first();

        if (!$users) return redirect()->to('/')->with('fail-u', 'Username Salah');
        if (!password_verify($password, $users->password)) return redirect()->to('/')->withInput()
            ->with('fail-p', 'Password Salah');

        session()->set([
            'login' => true,
            'users' => $users
        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
