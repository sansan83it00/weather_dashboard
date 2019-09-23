<?php
include_once "AbstractController.php";
include_once "models/repository/UserDAO.php";

/**
 * Class HomeController
 *
 * All the actions made to display the homepage
 *
 *
 */
class HomeController extends AbstractController
{
    /**
     *  Displays the home page.
     */
    public function index()
    {
        // Get cities's user
        $modelsUser = new UserDAO();
        $cities = $modelsUser->getAllCityUser();

		// Define the date now
		$date = new DateTime('now');
		$date = $date->format('Y/m/d - H:i');

        /* defines the data send to the home page */
		$result = array();
		foreach ($cities as $city){
            $url = "api.openweathermap.org/data/2.5/weather?q=".$city->getCity()."&APPID=83ef82e1f2a60fc23be080ff410fd75c";

			 $ch = curl_init($url);
			 curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			 $response = curl_exec($ch);
			 array_push($result, json_decode($response));
		}

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            $this->getBlock('home', $result);
        }else{
            $this->getBlock('base/header', array($date));
            $this->getBlock('home', array($result));
        }
    }
}