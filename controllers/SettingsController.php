<?php
include_once "AbstractController.php";
include_once "models/repository/UserDAO.php";

/**
 * Class SettingsController
 *
 * All the actions made to display the settings page
 *
 *
 */
class SettingsController extends AbstractController
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

		// Add city
		if (isset($_POST['newCity']) && !empty($_POST['newCity'])){
		    // Avoid SQL injections
		    $newCity = htmlspecialchars($_POST['newCity']);
		    // Transform string to lowercase
		    $name = strtolower($newCity);
		    // String's first character uppercase
		    $name = ucfirst($name);
		    $this->addCity($name, $cities);
            $cities = $modelsUser->getAllCityUser();
        }

        // Delete city
        if (isset($_POST['deleteCity']) && !empty($_POST['deleteCity'])){
            // Avoid SQL injections
            $city = htmlspecialchars($_POST['deleteCity']);
            $this->deleteCity($city);
            $cities = $modelsUser->getAllCityUser();
        }


        if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            $this->getBlock('settings', $cities);
        }else{
            $this->getBlock('base/header', array($date));
            $this->getBlock('settings', array($cities));
        }
    }

    /**
     * Add new city
     * @param $name
     * @param $cities
     * @return bool
     */
    public function addCity($name, $cities)
    {
        foreach ($cities as $city){
            if ($name === $city->getCity()){
                return false;
            }
        }
        $modelsUser = new UserDAO();
        return $modelsUser->addNewCity($name);

    }

    /**
     * Remove selected city
     * @param $name
     * @return bool
     */
    public function deleteCity($name)
    {
        $modelsUser = new UserDAO();
        return $modelsUser->deleteCity($name);
    }
}