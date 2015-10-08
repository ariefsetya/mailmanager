<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/mandrill',function ()
{
	$a = new Mandrill("_C4gRd_RxE-JskVlDK8wrQ");
	$message = array(
        'html' => '<p>halo kalian semua, <br><img src="http://setya.me/wp-content/uploads/2015/10/0fe03d5.jpg"></p>',
        'text' => 'halo kalian semua,',
        'subject' => 'baca dulu, jangan dihapus',
        'from_email' => 'a@setya.me',
        'from_name' => 'Arief Setya',
        'to' => array(
            array(
                'email' => 'arief@pointer.co.id',
                'name' => 'Arief Setya',
                'type' => 'to'
            ),
            array(
                'email' => 'emailanenih@gmail.com',
                'name' => 'Arief Setya',
                'type' => 'to'
            ),
            array(
                'email' => 'copasajadisini@gmail.com',
                'name' => 'Arief Setya',
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'a@setya.me',
                            'X-MC-Track'=> 'opens, clicks_textonly'),
        'important' => TRUE,
        'track_opens' => TRUE,
        'track_clicks' => TRUE
    );
    $async = false;
    $ip_pool = '103.27.206.159';
    $send_at = null;
    $result = $a->messages->send($message, $async, $ip_pool, $send_at);
	echo "<pre>".print_r($result,1)."</pre>";
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
