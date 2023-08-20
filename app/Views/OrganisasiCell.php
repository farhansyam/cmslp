<?php namespace App\Views;
use App\Models\ModelOrganisasi;

class OrganisasiCell
{
       public function dd($id)
    {
       
        return view('organisasi', ['data' => $data]);
    }
}
