<?php

namespace App\Http\Controllers;

use App\Models\RWData;

class ExternalController extends Controller
{


	function loadDataToDB()
	{
		RWData::truncate();
		$endpoint = "https://api.reliefweb.int/v1/reports?appname=rwint-user-0&profile=list&preset=latest&slim=1&query%5Bvalue%5D=primary_country.id%3A147&query%5Boperator%5D=AND&limit=100";
		$client = new \GuzzleHttp\Client();

		$response = $client->request('GET', $endpoint);

		$decodedJson = json_decode($response->getBody(), true);

		foreach ($decodedJson['data'] as $key2 => $k2) {
			if (str_contains($decodedJson['data'][$key2]['fields']['title'], 'Malaysia, Flooding in ') || str_contains($decodedJson['data'][$key2]['fields']['title'], 'Malaysia, Landslide in ') || str_contains($decodedJson['data'][$key2]['fields']['title'], 'Malaysia, Flooding and Landslide in ')) {
				$post = new RWData();
				$post->post_id = $decodedJson['data'][$key2]['id'];

				$post->post_date = $decodedJson['data'][$key2]['fields']['date']['created'];


				$post->source_name = $decodedJson['data'][$key2]['fields']['source'][0]['name'];
				$post->source_homepage = $decodedJson['data'][$key2]['fields']['source'][0]['homepage'];
				$post->post_title = $decodedJson['data'][$key2]['fields']['title'];
				$post->post_url = $decodedJson['data'][$key2]['fields']['url'];


				$titleGet = $decodedJson['data'][$key2]['fields']['title']; //assign title
				$titleEx = explode('(', $titleGet);
				$titleDate = substr(end($titleEx), 0, -1); //get only date from title

				$post->event_date = $titleDate;

				// echo "Event ID: ", $decodedJson['data'][$key2]['id'], "<br>";
				// echo "Event Date:", $titleDate, "<br>";

				if (str_contains($decodedJson['data'][$key2]['fields']['title'], 'Malaysia, Flooding in ')) {
					$repl1flood = str_replace("Malaysia, Flooding in ", "", $titleGet);
					$repl2flood = str_replace($titleDate, "", $repl1flood);
					$repl3flood = str_replace("()", "", $repl2flood);
					// echo "Event Type: Flood <br>";
					// echo "Location:", $repl3flood, "<br>";

					$post->event_type = "Flood";
					$post->event_location = $repl3flood;
				} else if (str_contains($decodedJson['data'][$key2]['fields']['title'], 'Malaysia, Landslide in ')) {
					$repl1landslide = str_replace("Malaysia, Landslide in ", "", $titleGet);
					$repl2landslide = str_replace($titleDate, "", $repl1landslide);
					$repl3landslide = str_replace("()", "", $repl2landslide);
					// echo "Event Type: Landslide <br>";
					// echo "Location:", $repl3landslide, "<br>";

					$post->event_type = "Landslide";
					$post->event_location = $repl3landslide;
				} else if (str_contains($decodedJson['data'][$key2]['fields']['title'], 'Malaysia, Flooding and Landslide in ')) {
					$repl1fl = str_replace("Malaysia, Flooding and Landslide in ", "", $titleGet);
					$repl2fl = str_replace($titleDate, "", $repl1fl);
					$repl3fl = str_replace("()", "", $repl2fl);
					// echo "Event Type: Flooding and Landslide <br>";
					// echo "Location:", $repl3fl, "<br>";

					$post->event_type = "Flooding and Landslide";
					$post->event_location = $repl3fl;
				}

				// echo $decodedJson['data'][$key2]['fields']['url'], "<br><br>";
				$post->save();
			}
		}
	}

	function getRWData()
	{
		$data = RWData::all();
		return view('news', ['rw' => $data]);
	}

}
