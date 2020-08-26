<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksRegistrationResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'registration_number' => $this->registration_number,
			'shelf' => new ShelvesResource($this->shelf)
		];
	}

	public function with($request)
	{
		return [
			'status' => true,
			'message' => 'sukses'
		];
	}
}
