<?php

namespace App\Controllers;
use App\Models\InfoKontak;

class infoKontakController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        return view('users/infokontak/index');
      
    }

    function save(){

    }

}
