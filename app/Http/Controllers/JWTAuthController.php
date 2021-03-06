<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class JWTAuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api', ['except' => ['login', 'register']]);
	}

	public function register(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'name' => 'required',
				'username' => 'required',
				'email' => 'required|unique:users|email',
				'password' => 'required|min:6',
				'level' => 'required|max:1'
			]
		);

		$user = User::create(array_merge(
			$validator->validated(),
			['password' => bcrypt($request->password)]
		));

		return response()->json([
			'message' => 'sukses',
			'user' => $user
		], 201);
	}

	public function login(Request $request)
	{
		$validator = Validator::make(
			$request->all(),
			[
				'email' => 'required|email',
				'password' => 'required|min:6'
			]
		);

		if ($validator->fails()) {
			return response()->json($validator->errors(), 422);
		}

		if (!$token = auth()->attempt($validator->validated())) {
			return response()->json(['error' => 'Unauthorized'], 401);
		}

		return $this->createNewToken($token);
	}

	public function profile()
	{
		return response()->json(auth()->user());
	}

	public function logout()
	{
		auth()->logout();

		return response()->json([
			'message' => 'sukses'
		]);
	}

	public function refresh()
	{
		return $this->createNewToken(auth()->refresh());
	}

	protected function createNewToken($token)
	{
		return response()->json([
			'token' => $token,
			'token_type' => 'bearer',
			'expires_in' => auth()->factory()->getTTL() * 60
		]);
	}
}
