<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
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
			'title' => $this->title,
			'books_registrations' => new BooksRegistrationResource($this->books_registrations),
			'author' => new AuthorsResource($this->author),
			'category' => new CategoriesResource($this->category),
			'publisher' => new PublishersResource($this->publisher),
			'year' => $this->year,
			'total' => $this->total,
			'created_at' => $this->created_at->format('d-m-Y H:i:s'),
			'updated_at' => $this->updated_at->format('d-m-Y H:i:s')
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
