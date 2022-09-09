<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RWData;

class TwiController extends Controller
{


	function getTweets()
	{
		$data = RWData::all();
		foreach ($data as $key => $a) {

			$eventId[] = $a->id;
			$eventType[] = $a->event_type;
			$eventLocation[] = $a->event_location;
			$eventDate[] = $a->event_date;
		}
		$client = new \GuzzleHttp\Client();

		$response = $client->get("https://api.twitter.com/2/tweets/search/all?query=" . $eventType[0] . "%20" . $eventLocation[0] . "%20-RT&tweet.fields=author_id&media.fields=alt_text,preview_image_url,url&max_results=30", [
			'headers' => [
				"Authorization" => "Bearer AAAAAAAAAAAAAAAAAAAAACWMfAEAAAAANsaSCs1UXjl1DwETJWpOKK%2F%2FPWk%3Djcxf71C0A8mur3zW3lyJWza4CHLQ4rOCEQysTJZAB95FuUYaKN",
				"Cache-Control" => "no-cache",
				"Accept" => "application/json",
			]
		]);
		$decodedJson = json_decode($response->getBody(), true);


		return view('tweet')
		->with('data', $decodedJson['data'])
		->with('type', $eventType[0])
		->with('location', $eventLocation[0])
		->with('date', $eventDate[0]);
	}

	// function getRWinto()
	// {

	// 	$data = RWData::all();

	// 	foreach ($data as $key => $a) {

	// 		$eventId[] = $a->id;
	// 		$eventType[] = $a->event_type;
	// 		$eventLocation[] = $a->event_location;
	// 		$eventDate[] = $a->event_date;
	// 	}

	// 	$client = new \GuzzleHttp\Client();
	// 	$response = $client->get("https://api.twitter.com/2/tweets/search/all?query=" . $eventType[0] . "%20" . $eventLocation[0] . "%20-RT&tweet.fields=author_id&media.fields=alt_text,preview_image_url,url", [
	// 		'headers' => [
	// 			"Authorization" => "Bearer AAAAAAAAAAAAAAAAAAAAACWMfAEAAAAANsaSCs1UXjl1DwETJWpOKK%2F%2FPWk%3Djcxf71C0A8mur3zW3lyJWza4CHLQ4rOCEQysTJZAB95FuUYaKN",
	// 			"Cache-Control" => "no-cache",
	// 			"Accept" => "application/json",
	// 		]
	// 	]);
	// 	echo $response->getBody()->getContents();
	// }
}
