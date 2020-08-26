<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CirculationsResource extends JsonResource
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
			'users' => new UsersResource($this->users),
			'books' => new BooksResource($this->books),
			'code' => $this->code,
			'entry_date' => $this->entry_date,
			'out_date' => $this->out_date,
			'status' => $this->status,
			'penalty' => $this->penalty
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
