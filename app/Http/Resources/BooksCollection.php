<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BooksCollection extends ResourceCollection
{
	/**
	 * Transform the resource collection into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		return BooksResource::collection($this->collection);
	}

	public function with($request)
	{
		return [
			'status' => true,
			'message' => 'sukses'
		];
	}
}
