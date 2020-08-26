<?php

namespace App\Http\Controllers\api;

use App\BooksRegistration;
use App\Http\Controllers\Controller;
use App\Http\Resources\BooksRegistrationCollection;
use App\Http\Resources\BooksRegistrationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BooksRegistrationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// $index = BooksRegistration::get();
		// return response()->json(['status' => true, 'data' => $index, 'message' => 'sukses'], 200);
		return new BooksRegistrationCollection(BooksRegistration::paginate(10));
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
				'registration_number' => 'required|unique:books_registrations',
				'shelf' => 'required'
			],
			[
				'registration_number.required' => 'Nama tidak boleh kosong!',
				'shelf.required' => 'Email tidak boleh kosong dan sama'
			]
		);

		if ($validator->fails()) {
			return response()->json([
				'status' => false,
				'data' => $validator->errors(),
				'message' => 'gagal'
			], 400);
		} else {
			$store = BooksRegistration::create([
				'registration_number' => $request->input('registration_number'),
				'shelf' => $request->input('shelf')
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
		// $show = BooksRegistration::find($id);
		// return $show ? response()->json(['status' => true, 'data' => $show, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'data' => $show, 'message' => 'gagal'], 404);
		return new BooksRegistrationResource(BooksRegistration::find($id));
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
				'registration_number' => 'required|unique:books_registrations',
				'shelf' => 'required'
			],
			[
				'registration_number.required' => 'Nama tidak boleh kosong!',
				'shelf.required' => 'Email tidak boleh kosong dan sama'
			]
		);

		if ($validator->fails()) {
			return response()->json([
				'status' => false,
				'data' => $validator->errors(),
				'message' => 'gagal'
			], 400);
		} else {
			$store = BooksRegistration::find($id)->update([
				'registration_number' => $request->input('registration_number'),
				'shelf' => $request->input('shelf')
			]);
			return $store ? response()->json(['status' => true, 'message' => 'sukses'], 201) : response()->json(['status' => false, 'message' => 'gagal'], 400);
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
		$code = BooksRegistration::find($id);
		$destroy = $code ? $code->delete() : false;
		return $destroy ? response()->json(['status' => true, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'message' => 'gagal'], 400);
	}
}
