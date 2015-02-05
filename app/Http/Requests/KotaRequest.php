<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class KotaRequest extends Request {

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
			'nama' => 'required|between:2,100|unique:kota,nama,'. $this->segment(2, 0).',id',
			'ongkos_kirim' => 'required|integer'
		];
	}

}
