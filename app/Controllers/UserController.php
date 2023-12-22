<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;

class UserController extends BaseController
{
    protected $TabelLevelMenu;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
    }

    public function index()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(1);
        return view('user/homepage', $data);
    }
}
