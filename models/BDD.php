<?php


include_once 'config.php';

class BDD
{
    /**
     * Connection To BDD
     * @return PDO
     */
    public function connect(){
        try{
            return new PDO(
                'mysql:host='.HOST.';dbname='.DBNAME.'',
                USERNAME,
                PASSWORD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
        }
        catch (Exception $e){
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }
}