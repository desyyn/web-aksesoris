<?php

namespace App\Controllers;

use App\Models\UserModel; // Kita pakai query builder saja biar cepat
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $db = \Config\Database::connect();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Cari user di database
        $user = $db->table('users')->where('username', $username)->get()->getRowArray();

        if ($user) {
            // Cek Password
            if (password_verify($password, $user['password'])) {
                $ses_data = [
                    'username'  => $user['username'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/produk'); // Berhasil, masuk ke Admin
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}