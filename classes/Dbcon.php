<?php
defined('HZiKj338G') OR exit('No direct script access allowed');

class Dbcon
{

	private $host="localhost";
	private $user="root";
	private $password="";
	private $dbname="test";
	

     public function db_connect()
    {
        $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . '', $this->user, $this->password) or die("Cannot connect to mySQL.");

        return $db;
    }
}