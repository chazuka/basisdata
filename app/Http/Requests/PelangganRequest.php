<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PelangganRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'kota_id' => 'required|integer|exists:kota,id',
			'email' => 'required|email|unique:pelanggan,email,'.$this->segment(2, 0).',id',
			'alamat' => 'required',
		];
	}

}
