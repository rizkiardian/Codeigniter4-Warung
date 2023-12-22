<?php

namespace App\Controllers;

use App\Models\TabelUser;

class LoginController extends BaseController
{
    protected $TabelUser;

    public function __construct()
    {
        $this->TabelUser = new TabelUser();
    }

    public function index()
    {
        return view('login');
    }

    public function proses()
    {
        $post  = $this->request->getPost();
        $query = $this->TabelUser->getNamaUser($post['username']);
        // dd($query);

        if ($query) {
            $encryptedPassword = md5($post['password']);
            if ($encryptedPassword == $query->password) {
                $simpan_session = [
                    'id_level_user' => $query->id_level_user,
                    'id_user' => $query->id_user,
                    'nama_user' => $query->nama_user
                ];
                session()->set($simpan_session);
                if ($query->id_level_user == '1') {
                    return redirect()->to(site_url('/UserController'));
                } elseif ($query->id_level_user == '2') {
                    return redirect()->to(site_url('/AdminController'));
                }
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username salah');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('/LoginController'));
    }

    public function register()
    {
        return view('register');
    }
}
