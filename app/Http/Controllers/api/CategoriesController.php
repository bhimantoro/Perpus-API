<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesCollection;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return new CategoriesCollection(Category::paginate(10));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), ['name' => 'required', 'code' => 'required'], ['name.required' => 'nama tidak boleh kosong', 'code.required' => 'kode tidak boleh kosong']);
		if ($validator->fails()) {
			return response()->json(['status' => false, 'data' => $validator->errors(), 'message' => 'gagal'], 400);
		} else {
			$store = Category::create(['name' => $request->input('name'), 'code' => $request->input('code')]);
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
		return new CategoriesResource(Category::find($id));
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
		$validator = Validator::make($request->all(), ['name' => 'required', 'code' => 'required'], ['name.required' => 'nama tidak boleh kosong', 'code.required' => 'kode tidak boleh kosong']);
		if ($validator->fails()) {
			return response()->json(['status' => false, 'data' => $validator->errors(), 'message' => 'gagal'], 400);
		} else {
			$store = Category::find($id)->update(['name' => $request->input('name'), 'code' => $request->input('code')]);
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
		$category = Category::find($id);
		$destroy = $category ? $category->delete() : false;
		return $destroy ? response()->json(['status' => true, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'message' => 'gagal'], 400);
	}
}
