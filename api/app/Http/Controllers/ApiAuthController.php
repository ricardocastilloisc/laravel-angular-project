<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiAuthController extends Controller
{
	public function UserAuth(Request $request)
	{
		$credentials = $request->only('email', 'password');
		$token = null;
		try {
			if(!$token = JWTAuth::attempt($credentials))
			{
				return response()->json(['error' => 'invalid_credentials'])
			}
			
		} catch (JWTException $ex) {
			return response()->json(['error' => 'something_went_wrog'], 500);
		}
		return response()->json(compact('token'));
	}
    //
}
