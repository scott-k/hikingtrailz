<?php namespace App\Http\Controllers;
use DB;
use App\Models\Search;
use Request;


class SearchController extends Controller {

	// public function getAll() {
	// 	return view('Trails');
	// }

	public function getSearch() {
		$message = Request::input('message');
		$search = Search::getSearch($message);
		return $search;
		print_r($search);

	}

}