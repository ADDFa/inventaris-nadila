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
            'style'         => 'login',
            'script'        => 'template'
        ];

        return view('pages/login', $data);
    }

    public function masuk()
    {
        $user_models = new User();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data_user = $user_models->where('username', $username)->find();

        if ($data_user === []) {
            $pesan = [0, 'Username Salah'];
            session()->setFlashdata('pesan', $pesan);

            return redirect()->to('/');
        }

        if (!password_verify($password, $data_user[0]->password)) {
            $pesan = [0, 'Password Salah'];
            session()->setFlashdata('pesan', $pesan);

            return redirect()->to('/');
        }

        session()->set('login', true);
        session()->set('username', $username);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
