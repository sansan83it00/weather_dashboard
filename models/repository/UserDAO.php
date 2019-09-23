<?php

include_once 'models/BDD.php';
include_once 'models/entity/User.php';

/**
 * Class UserDAO
 * Repository de la classe User
 */
class UserDAO
{
    public function __construct(){

    }

    /**
     * Gets all the users
     *
     * @return array
     */
    public function getAllCityUser(){
        $BDD = new BDD();
        $sth = $BDD->connect()->query("SELECT * FROM user");
        $sth->execute();
        $results = $sth->fetchAll(PDO::FETCH_ASSOC);

        $array = array();

        foreach ($results as $result){
            $user = $this->createObjectUser($result);
            $array[] = $user;
        }

        return $array;
    }

    /**
     * Create a new city in the database for the user
     *
     * @param $city
     * @return bool
     */
    public function addNewCity($city)
    {
        $BDD = new BDD();
        $query = "INSERT INTO user (city) 
                  VALUES (:city)";

        $sth = $BDD->connect()->prepare($query);

        try
        {
            $queryParameters = [
                'city' => $city,
            ];
            $sth->execute($queryParameters);
        }
        catch (PDOException $e)
        {?>
            <strong> Caught <?= get_class($e) ?></strong>: <?= $e->getMessage() ?><br />
            Query <?= $query ?><br />
            Query parameters: <pre><?= var_export($queryParameters, true) ?></pre><br />
            Exception trace: <pre><?= $e->getTraceAsString() ?></pre>
            <?php
            die();
        }

        return true;
    }

    /**
     * Delete a city in the database
     *
     * @param $city
     * @return bool
     */
    public function deleteCity($city)
    {
        $BDD = new BDD();
        $query = "DELETE FROM user WHERE city = :city";

        $sth = $BDD->connect()->prepare($query);

        try
        {
            $queryParameters = [
                'city' => $city,
            ];
            $sth->execute($queryParameters);
        }
        catch (PDOException $e)
        {?>
            <strong> Caught <?= get_class($e) ?></strong>: <?= $e->getMessage() ?><br />
            Query <?= $query ?><br />
            Query parameters: <pre><?= var_export($queryParameters, true) ?></pre><br />
            Exception trace: <pre><?= $e->getTraceAsString() ?></pre>
            <?php
            die();
        }

        return true;
    }

    /**
     * Create a user object
     *
     * @param $results
     * @return User
     */
    public function createObjectUser($results)
    {
        $user = new User();
        $user->setId($results["id"]);
        $user->setCity($results["city"]);
        return $user;
    }

}