<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Validator extends Controller
{
    /**
	 * {@inheritdoc}
	 */
	protected function formatErrors(Validator $validator)
	{
	    return $validator->errors()->all();
	}
}
