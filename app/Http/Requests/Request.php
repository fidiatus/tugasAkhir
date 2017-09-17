<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    /**
	 * {@inheritdoc}
	 */
	protected function formatErrors(Validator $validator)
	{
	    return $validator->errors()->all();
	}
}
