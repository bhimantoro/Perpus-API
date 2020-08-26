<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublishersCollection;
use App\Http\Resources\PublishersResource;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublishersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return new PublishersCollection(Publisher::paginate(10));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'name' => 'required',
				'address' => 'required',
				'email' => 'required|unique:publishers'
			],
			[
				'name.required' => 'Nama tidak boleh kosong',
				'address.required' => 'alamat tidak boleh kosong',
				'email.required' => 'email tidak boleh kosong dan sama'
			]
		);

		if ($validator->fails()) {
			return response()->json([
				'status' => false,
				'data' => $validator->errors(),
				'message' => 'gagal'
			], 400);
		} else {
			$store = Publisher::create([
				'name' => $request->input('name'),
				'address' => $request->input('address'),
				'email' => $request->input('email'),
				'telephone' => $request->input('telephone'),
				'fax' => $request->input('fax')
			]);
			return $store ? response()->json(['status' => true, 'message' => 'sukses'], 201) : response()->json(['status' => false, 'message' => 'gagal'], 400);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return new PublishersResource(Publisher::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'name' => 'required',
				'address' => 'required',
				'email' => 'required|unique:publishers'
			],
			[
				'name.required' => 'Nama tidak boleh kosong',
				'address.required' => 'alamat tidak boleh kosong',
				'email.required' => 'email tidak boleh kosong dan sama'
			]
		);

		if ($validator->fails()) {
			return response()->json(['status' => false, 'data' => $validator->errors(), 'message' => 'gagal'], 400);
		} else {
			$update = Publisher::find($id)->update([
				'name' => $request->input('name'),
				'address' => $request->input('address'),
				'email' => $request->input('email'),
				'telephone' => $request->input('telephone'),
				'fax' => $request->input('fax')
			]);
			return $update ? response()->json(['status' => true, 'message' => 'sukses'], 201) : response()->json(['status' => false, 'message' => 'gagal'], 400);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$publisher = Publisher::find($id);

		$destroy = $publisher ? $publisher->delete() : false;

		return $destroy ? response()->json(['status' => true, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'message' => 'gagal'], 400);
	}
}
