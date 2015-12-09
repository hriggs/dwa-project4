<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiverCrossingController extends Controller {
	
  /**
	* Construct function
	*/
    public function __construct() {
    }
    
    /**
    * Responds to requests to GET /the-river-crossing-puzzle
    */
    public function getIndex() {
    	
        return view("river.index");
    }
    
   /**
    * Responds to requests to POST /the-river-crossing-puzzle
    */
    public function postIndex(Request $request) {
 		
 		// array to save data in
 		$data = [];
		
		// put all request data in array
 		foreach ($request->all() as $key => $value) {
 			$data[$key] = $value;
 		}
 		
 		// remove "T" from start and end times
 		$start_time = str_replace("T", " ", $data["start_time"]);
 		$end_time = str_replace("T", " ", $data["end_time"]);
 		
 		// remove last 5 characters from start and end time strings (milliseconds)
 		$start_time = substr($start_time, 0, 19);
 		$end_time = substr($end_time, 0, 19);
 		
 		// save start and end times in ways they can be manipulated with carbon
 		//$start_carbon = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $start_time)->toDateTimeString();
 		//$end_carbon = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $end_time)->toDateTimeString();
 		
 		//\Carbon\Carbon::create($year, $month, $day, $hour, $minute, $second);
 		
 		/*$datetime1 = date_create($start_time);
 		$datetime2 = date_create($end_time);
 		
 		//echo $datetime1->format('Y-m-d H:i:s');
 		
 		$interval = $datetime1->diff($datetime2);*/
 		
 		//echo $interval->format('%i');
 		
 		$datetime1 = strtotime($start_time);
		$datetime2 = strtotime($end_time);
		$interval  = abs($datetime2 - $datetime1);
		$total_time   = round($interval / 60);
		//echo 'Diff. in minutes is: '.$total_time; 
    	
        return " POST!";
    }
}