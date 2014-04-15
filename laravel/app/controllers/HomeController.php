<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('form');
	}


    /**
     * Redirect user to the actual url.
     */
    public function goToUrl($url)
    {
        //Search the table if a matching record exists in the table, if not throw an exception
        $model = Url_short::where('url_hash', '=', $url)->firstOrFail();

        //Record exists, redirect user to the corresponding actual URL
        return Redirect::to($model->actual_url);
    }


    /**
     * Generate the hash code for input URL
     */
    public function generateHash()
    {
        $url = Input::get('url');

        //Check if a record already exists for the entered url
        $data = DB::table('url_short')->where('actual_url', $url)->first();

        $response = array();
        
        if(!empty($data->url_hash)) {         //If Yes, display the existing record
        	$response['data'] = url($data->url_hash);
        }
        else{								 //URl does not exist, create a new record

        	$hash = hash("crc32", $url);

	        $record = new Url_short;

			$record->actual_url = $url;
			$record->url_hash = $hash;

			$record->save();

	        $response['data'] = url($hash);
        
        }

        $response['status'] = 'success';
        return json_encode($response);

    }

}