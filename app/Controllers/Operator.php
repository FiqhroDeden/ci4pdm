<?php

namespace App\Controllers;

class Operator extends BaseController
{
	public function index()
	{
		$data['title'] = 'My Profile';

		return view('operator/index', $data);
	}


	//--------------------------------------------------------------------

}
