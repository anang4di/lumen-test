<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
    	$users = User::all();

    	$response["status"] = "success";
    	$response["data"]["users"] = $users;
        
        return response($response, 200);
    }

    public function view(Request $request, string $user)
    {
		$user = User::find($user);

		if($user)
		{
			if($request->with)
	    	{
	    		if($request->with == 'phone')
	    		{
		    		if($user->phone()->count())
		    		{
		    			$user['phone'] = $user->phone;

				        $response["status"] = "success";
			    		$response["data"]["user"] = $user;

				    	return response($response, 200);
		    		}
		    		else
		    		{

		    			$response["status"] = "error";
			    		$response["message"] = "phone data not found";

				    	return response($response, 200);
		    		}
	    		}
	    	}
	    	else
	    	{
		    	$response["status"] = "success";
		    	$response["data"]["user"] = $user;

		    	return response($response, 200);
	    	}

		}
		else
		{
			$response["status"] = "error";
	    	$response["message"] = "data not found";

	    	return response($response, 200);
		}
	    	

    }
}
