<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/passport', function () {
    $query = http_build_query([
        'client_id' => 4,
        'redirect_uri' => 'https://b-pass-consumer.app/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('https://b-pass.app/oauth/authorize?'.$query);
});

Route::get('/callback', function (\Illuminate\Http\Request $request) {
    $http = new \GuzzleHttp\Client;

    $response = $http->post('https://b-pass.app/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 4,
            'client_secret' => 'h59bohJbneWRwk3A7S8JNA5a28pMpwt07RHfti9J',
            'redirect_uri' => 'https://b-pass-consumer.app/callback',
            'code' => $request->code,
        ],
    ]);

    $token = json_decode((string) $response->getBody());
    // use json api to use
    $accessToken = $token->access_token;
    // dd($accessToken);
    $http = new \GuzzleHttp\Client;

	$response = $http->get('https://b-pass.app/api/user', [
	    'headers' => [
	        'Accept' => 'application/json',
	        'Authorization' => 'Bearer ' . $accessToken,
	    ],
	]);
	$user = json_decode((string) $response->getBody());
	return $user;
    // return json_decode((string) $response->getBody(), true);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
