<?php

Artisan::command('api:test', function () {
    $accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMxNWYwYmZjMjJhNWYyMzhkMzBjNmYyYWUyZDNiZmQwNzc4MjIxNzhkMDE1ZWM3ZjE5MDBmZDI4YTc3MDdiYTFlNTE2NDQ2NjYwYTM5OTBjIn0.eyJhdWQiOiIxIiwianRpIjoiYzE1ZjBiZmMyMmE1ZjIzOGQzMGM2ZjJhZTJkM2JmZDA3NzgyMjE3OGQwMTVlYzdmMTkwMGZkMjhhNzcwN2JhMWU1MTY0NDY2NjBhMzk5MGMiLCJpYXQiOjE1MzI1NzUzODQsIm5iZiI6MTUzMjU3NTM4NCwiZXhwIjoxNTY0MTExMzg0LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.gzjsUmwgFOe9fceWyhRhczR8bUcZEMFHCP-Q_Q_HB7tOo-Kr8dNRfO29bOCA9VpD36_RYkKRi32kQYqkPTW3IfuMYy_5toZwuetat02QmC0Hq9qJbzO0j_2JCzk7B25mfPe0dnL1RaTwPdjNmT1xGb8dW-4rns7sKKFsWvy3iy1B9Y6YSm9q-ZzDJ47_scr6fcwn02-pqbknt2UpDIeHsVlu_ixnZgIEEETAymlHv1yQukM4K_qCJQOYQ-q2_Ae7CoadXIpxlCg6ko9rZxg1vM0WkeQzoyvzG49YQl_Dw7g6zZvMrEn_V8lMyzCQbfPJtQsuHQbD_xANeH0oYNY2d68kMkofiq3bQmAthr3Qge_w-iAJ8ahCUQ7YYqy05oWXSYhEpwJbePGdEPhHZpnH0t4GRLiVhjIJi7onBp-6FKebMlCaci0xssR35d9uqhXU7JHHU1QVdq1yrRIJzZxT2nuEl448b9DW4tTQE2_SxC2VKO8EEO72PQeYHAPS2v1q6rudYb7V06vj49_gRXi3LVd5tkLCnnauQdYZ9DXeMpRPWFRKQGAjMJQahkXAPP2aUVO3H9Z8Kj3R-Q1jk7UYkAlxWMos7ZhFYghkfDO9gdExQHtGDAAXC8ojSWA48J0Ja5Q94FRtUrnWCsrFDqkIdCMXOvkYYWZmknvnnU_F668';

	$http = new \GuzzleHttp\Client;

	$response = $http->get('https://b-pass.app/api/user', [
	    'headers' => [
	        'Accept' => 'application/json',
	        'Authorization' => 'Bearer ' . $accessToken,
	    ],
	]);
	$user = json_decode((string) $response->getBody());
	dd($user);
})->describe('API Playground');