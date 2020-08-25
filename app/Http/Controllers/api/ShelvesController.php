<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShelvesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$index = Shelf::latest()->get();
		return response()->json(['status' => true, 'data' => $index, 'message' => 'sukses'], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), ['code' => 'required', 'location' => 'required'], ['code.required' => 'kode tidak boleh kosong', 'location.required' => 'lokasi tidak boleh kosong']);
		if ($validator->fails()) {
			return response()->json(['status' => false, 'data' => $validator->errors(), 'message' => 'gagal'], 400);
		} else {
			$store = Shelf::create([
				'code' => $request->input('code'),
				'location' => $request->input('location'),
			]);
			return $store ? response()->json(['status' => true, 'message' => 'sukses'], 201)  : response()->json(['status' => false, 'message' => 'gagal'], 400);
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
		$show = Shelf::find($id);
		return $show ? response()->json(['status' => true, 'data' => $show, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'data' => $show, 'message' => 'gagal'], 404);
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
		$validator = Validator::make($request->all(), ['code' => 'required', 'location' => 'required'], ['code.required' => 'kode tidak boleh kosong', 'location.required' => 'lokasi tidak boleh kosong']);
		if ($validator->fails()) {
			return response()->json(['status' => false, 'data' => $validator->errors(), 'message' => 'gagal'], 400);
		} else {
			$store = Shelf::find($id)->update([
				'code' => $request->input('code'),
				'location' => $request->input('location'),
			]);
			return $store ? response()->json(['status' => true, 'message' => 'sukses'], 201)  : response()->json(['status' => false, 'message' => 'gagal'], 400);
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
		$shelf = Shelf::find($id);
		$destroy = $shelf ? $shelf->delete() : false;
		return $destroy ? response()->json(['status' => true, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'message' => 'gagal'], 400);
	}
}
