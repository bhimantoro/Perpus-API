<?php

namespace App\Http\Controllers\api;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BooksCollection;
use App\Http\Resources\BooksResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return new BooksCollection(Book::paginate(10));
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
				'title' => 'required',
				'publisher' => 'required',
				'category' => 'required',
				'author' => 'required',
				'registration_number' => 'required',
				'shelf' => 'required',
				'year' => 'required|max:4'
			],
			[
				'title.required' => 'title tidak boleh kosong',
				'publisher.required' => 'publisher tidak boleh kosong',
				'category.required' => 'category tidak boleh kosong',
				'author.required' => 'author tidak boleh kosong',
				'registration_number.required' => 'kode registrasi tidak boleh kosong',
				'shelf.required' => 'kode rak tidak boleh kosong',
				'year.required' => 'tahun tidak boleh kosong'
			]
		);

		if ($validator->fails()) {
			return response()->json(['status' => false, 'data' => $validator->errors(), 'message' => 'gagal'], 400);
		} else {
			$store = Book::create([
				'title' => $request->input('title'),
				'publisher' => $request->input('publisher'),
				'category' => $request->input('category'),
				'author' => $request->input('author'),
				'registration_number' => $request->input('registration_number'),
				'shelf' => $request->input('shelf'),
				'year' => $request->input('year'),
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
		return new BooksResource(Book::find($id));
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
				'title' => 'required',
				'publisher' => 'required',
				'category' => 'required',
				'author' => 'required',
				'registration_number' => 'required',
				'shelf' => 'required',
				'year' => 'required|max:4'
			],
			[
				'title.required' => 'title tidak boleh kosong',
				'publisher.required' => 'publisher tidak boleh kosong',
				'category.required' => 'category tidak boleh kosong',
				'author.required' => 'author tidak boleh kosong',
				'registration_number.required' => 'kode registrasi tidak boleh kosong',
				'shelf.required' => 'kode rak tidak boleh kosong',
				'year.required' => 'tahun tidak boleh kosong'
			]
		);

		if ($validator->fails()) {
			return response()->json(['status' => false, 'data' => $validator->errors(), 'message' => 'gagal'], 400);
		} else {
			$store = Book::find($id)->update([
				'title' => $request->input('title'),
				'publisher' => $request->input('publisher'),
				'category' => $request->input('category'),
				'author' => $request->input('author'),
				'registration_number' => $request->input('registration_number'),
				'shelf' => $request->input('shelf'),
				'year' => $request->input('year'),
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
		$book = Book::find($id);
		$destroy = $book ? $book->delete() : false;
		return $destroy ? response()->json(['status' => true, 'message' => 'sukses'], 200) : response()->json(['status' => false, 'message' => 'gagal'], 400);
	}
}
