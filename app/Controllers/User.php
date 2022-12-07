<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    private $table, $credential;

    public function __construct()
    {
        $this->credential = new \App\Models\Credential();
        $this->table = new \App\Models\User();
    }

    public function index()
    {
        if (session('users')->role !== 'admin') return;

        $limit = 10;
        $users = $this->table->getAll($limit);
        $pages = $this->request->getGet('pages');

        if ($pages) {
            $offset = (int) $pages * $limit - $limit;
            $users = $this->table->getAll($limit, $offset);
        }

        $data = [
            'title'         => 'Daftar Petugas',
            'users'         => $users,
            'pages'         => ceil($this->table->countAllResults() / $limit)
        ];

        return view('users/index', $data);
    }

    public function show($id = null)
    {
        $user = $this->table->get($id);

        if ($user->id !== session('users')->id) return;

        $data = [
            'title'         => 'Edit Profile',
            'user'          => $user
        ];

        return view('users/detail', $data);
    }

    public function new()
    {
        if (session('users')->role !== 'admin') return;

        $data = [
            'title'         => 'Tambah Petugas',
            'validation'    => $this->validation
        ];

        return view('users/new', $data);
    }

    public function edit($id = null)
    {
        $user = $this->table->get($id);

        if ($user->id !== session('users')->id) return redirect()->to('/');

        $data = [
            'title'         => 'Edit Profile',
            'user'          => $user,
            'validation'    => $this->validation
        ];

        return view('users/edit', $data);
    }

    public function create()
    {
        if (!$this->userValid()) return redirect()->to('user/new')->withInput();

        $user = ['name'     => $this->request->getPost('name')];
        $userId = $this->table->insert($user);

        $credential = [
            'user_id'       => $userId,
            'username'      => $this->request->getPost('username'),
            'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        $this->credential->insert($credential);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Petugas Berhasil Ditambahkan'
        ]);

        return redirect()->to('user');
    }

    public function update($id = null)
    {
        if (!$this->updateUserValid($id)) return redirect()->to("user/{$id}/edit")->withInput();

        $user = $this->table->find($id);
        $data = ['name' => $this->request->getPost('name')];
        $credential = [
            'username'      => $this->request->getPost('username'),
            'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        if ($this->request->getFile('profilePicture')->getError() === 0) {
            $profilePicture = $this->checkImageValid('profilePicture');
            if (!$profilePicture) return redirect()->to("user/{$id}/edit")->withInput();
            if (file_exists("images/users/{$user->profile_picture}") && $user->profile_picture !== 'default.jpg') unlink("images/users/{$user->profile_picture}");

            $this->request->getFile('profilePicture')->move('images/users', $profilePicture);
            $data += ['profile_picture' => $profilePicture];
        }

        $this->table->update($id, $data);
        $this->credential->where('user_id', $id)->update(null, $credential);

        session()->set('users', $this->table->find($id));

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Berhasil Memperbaharui Profile'
        ]);

        return redirect()->to("user/{$id}");
    }

    public function delete($id = null)
    {
        $this->table->delete($id);
        $this->credential->where('user_id', $id)->delete();

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Berhasil Menghapys Petugas'
        ]);

        return redirect()->to("user");
    }

    public function updateUserValid($id)
    {
        $userCredentials = $this->credential->where('user_id', $id)->first();
        $oldPassword = $this->request->getPost('oldPassword');
        $validation = [
            'name' => [
                'rules'             => 'required|max_length[40]',
                'errors'            => [
                    'required'      => 'Nama Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],

            'password' => [
                'rules'             => 'required|min_length[8]|max_length[40]',
                'errors'            => [
                    'required'      => 'Password Harus Diisi',
                    'min_length'    => 'Panjang Karakter Minimal 8',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ]
        ];

        if ($userCredentials->username !== $this->request->getPost('username')) {
            $validation += [
                'username' => [
                    'rules'             => 'required|max_length[40]|is_unique[credentials.username]',
                    'errors'            => [
                        'required'      => 'Username Prtugas Harus Diisi',
                        'max_length'    => 'Panjang Karakter Maksimal 40',
                        'is_unique'     => 'Username Telah Terdaftar'
                    ]
                ]
            ];
        }

        if (!$this->validate($validation)) {
            if (!password_verify($oldPassword, $userCredentials->password)) $this->validation->setError('oldPassword', 'Password Tidak Valid');
            return false;
        }

        return true;
    }

    public function userValid()
    {
        return $this->validate([
            'name' => [
                'rules'             => 'required|max_length[40]',
                'errors'            => [
                    'required'      => 'Nama Petugas Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],

            'username' => [
                'rules'             => 'required|max_length[40]|is_unique[credentials.username]',
                'errors'            => [
                    'required'      => 'Username Prtugas Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40',
                    'is_unique'     => 'Username Telah Terdaftar'
                ]
            ],

            'password' => [
                'rules'             => 'required|min_length[8]|max_length[40]',
                'errors'            => [
                    'required'      => 'Password Harus Diisi',
                    'min_length'    => 'Panjang Karakter Minimal 8',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ]
        ]);
    }
}
