<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ShelvesCollection extends ResourceCollection
{
	/**
	 * Transform the resource collection into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */

	public function toArray($request)
	{
		return ShelvesResource::collection($this->collection);
	}

	public function with($request)
	{
		return [
			'status' => true,
			'message' => 'sukses'
		];
	}
}
