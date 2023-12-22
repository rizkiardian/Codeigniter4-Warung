<?php

namespace App\Controllers;

use App\Models\TabelLevelMenu;

class AdminController extends BaseController
{
    protected $TabelLevelMenu;

    public function __construct()
    {
        $this->TabelLevelMenu = new TabelLevelMenu();
    }

    public function index()
    {
        $data['menu'] = $this->TabelLevelMenu->getLevelMenuAktif(2);
        return view('admin/dashboard', $data);
    }
}
