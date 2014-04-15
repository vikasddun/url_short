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

	public function showhash()
	{
		
		$urls = Url_short::all();

    	return View::make('urls')->with('urls', $urls);

    	/*
    	echo hash("crc32", "http://www.google.com")." http://www.google.com<br/>";
		echo hash("crc32", "http://www.facebook.com")." http://www.facebook.com<br/>";
		echo hash("crc32", "http://www.twitter.com")." http://www.twitter.com<br/>";
		echo hash("crc32", "http://www.yahoo.com")." http://www.yahoo.com<br/>";
		echo hash("crc32", "http://www.youtube.com")." http://www.youtube.com<br/>";
		*/
	}

	/**
     * Show the url entered by user.
     */
    public function showUrl($url)
    {
        $model = Url_short::where('url_hash', '=', $url)->firstOrFail();
        return Redirect::to($model->actual_url);
    }


    /**
     * Show the url entered by user.
     */
    public function generateHash()
    {
        $url = Input::get('url');

        $hash = hash("crc32", $url);

        $record = new Url_short;

		$record->actual_url = $url;
		$record->url_hash = $hash;

		$record->save();

        $response['data'] = url($hash);
        $response['status'] = 'success';
        return json_encode($response);
    }

}