<?php 

namespace App\Http\Controllers\Traits;

use App\Flyer;

use Illuminate\Http\Request;


trait AuthorizesUsers {
	protected function userCreatedFlyer(Request $request)
	{
	    return Flyer::where([
	        'zip' => $request->zip,
	        'street' => $request->street,
	        'user_id' => \Auth::user()->id
	    ])->exists();
	}



	public function unautorized(Request $request)
	{
	    if($request->ajax()){
	    return response(['message' => 'No way. You dont have permission'], 403);
	    }

	    flash('Nope!!! You are not authorized');

	    return redirect('flyers');
	}
}