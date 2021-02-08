<?php

namespace App\Controllers;

use App\Models\ProdiModel;

class Prodi extends BaseController
{
    protected $prodiModel;
    public function __construct()
    {
        $this->prodiModel = new ProdiModel();
    }


    //--------------------------------------------------------------------

}
