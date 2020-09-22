<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class SecureController extends Controller
{
	public function profile(Request $request)
	{
		$user = User::find(Auth::user()->id);

		return $user;
	}
}