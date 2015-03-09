<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public static function getWeather(){
		$weather = [];
		// get weather data
		$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Phoenix');

		$data = json_decode($json);

		// get temperature in farenheit, round to whole degree  
		$temperature = round((($data->main->temp)- 273.15) * 1.8 + 32);

		// // use cloud or sun font awesome icon
		// if(($data->clouds->all) > 50){
		// 	$clouds = '<i class="fa fa-cloud"></i>';
		// } else {
		// 	$clouds = '<i class="fa fa-sun-o"></i>';
		// }
		
		$code = $data->weather[0]->id;

		switch ($code) {

			//clear skies
			case '800':
				$clouds = '<i class="wi wi-day-sunny" title = "' . $data->weather[0]->description . '"></i>';
				break;

			//overcast in any way
			case ($code > '801' && $code < '805'):
				$clouds = '<i class="wi wi-day-cloudy" title = "' . $data->weather[0]->description . '"></i>';
				break;	

			//thunderstorms	
			case ($code > '199' && $code < '233'):
				$clouds = '<i class="wi wi-storm-showers" title = "' . $data->weather[0]->description . '"></i>';
				break;		

			//	drizzle
			case ($code > '299' && $code < '322'):
				$clouds = '<i class="wi wi-day-showers" title = "' . $data->weather[0]->description . '"></i>';
				break;

			//	freezing rain
			case '511':
				$clouds = '<i class="wi wi-day-sleet" title = "' . $data->weather[0]->description . '"></i>';
				break;

			//	just Rainy
			case ($code > '499' && $code < '532' && $code != '511'):
				$clouds = '<i class="wi wi-day-showers" title = "' . $data->weather[0]->description . '"></i>';
				break;

			//	Snow
			case ($code > '599' && $code < '623'):
				$clouds = '<i class="wi wi-day-snow" title = "' . $data->weather[0]->description . '"></i>';
				break;


			default:
				$clouds = '<i class="wi wi-alien" title = "' . $data->weather[0]->description . '"></i>';
				break;
		}

		$weather = ['temperature' => $temperature, 'clouds'=>$clouds];

		return $weather;
	}
}
