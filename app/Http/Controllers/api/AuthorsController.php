<?php

namespace App\Http\Controllers\api;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$index = Author::latest()->get();
		return response([
			'status' => true,
			'data' => $index,
			'message' => 'List Semua Author'
		], 200);
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
				'email' => 'required|unique:authors'
			],
			[
				'name.required' => 'Nama tidak boleh kosong!',
				'email.required' => 'Email tidak boleh kosong dan sama'
			]
		);

		if ($validator->fails()) {
			return response()->json([
				'status' => false,
				'data' => $validator->errors(),
				'message' => 'Silahkan isi bagian yang kosong'
			], 400);
		} else {
			$store = Author::create([
				'name' => $request->input('name'),
				'email' => $request->input('email')
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
		$show = Author::whereId($id)->first();

		return $show ? response()->json(['status' => true, 'data' => $show, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'data' => null, 'message' => 'id tidak ditemukan'], 404);
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
				'email' => 'required|unique:authors'
			],
			[
				'name.required' => 'Nama tidak boleh kosong',
				'email.required' => 'email tidak boleh kosong dan sama'
			]
		);

		if ($validator->fails()) {
			return response()->json([
				'status' => false,
				'data' => $validator->errors(),
				'message' => 'Silahkan isi bagian yang kosong'
			], 400);
		} else {
			$update = Author::whereId($id)->update([
				'name' => $request->input('name'),
				'email' => $request->input('email')
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
		$author = Author::find($id);

		$destroy = $author ? $author->delete() : false;

		return $destroy ? response()->json(['status' => true, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'message' => 'gagal'], 400);
	}
}
