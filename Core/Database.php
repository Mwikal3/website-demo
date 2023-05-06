<?php
//  require 'router.php';

//connecting to mysql database and execute a query

// a class is a collection of methods and properties 
namespace Core;

use PDO;

class Database
{

  public $connection;
  public $statement;

  public function __construct($config) //a constructor is a method which is run when an object is created
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');
    $this->connection = new PDO($dsn, 'root', '', [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }


  public function query($query, $params = []) /*the query method runs the query against the db*/
  {

    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);

    return $this;
  } 

  public function find()
  {
    return $this->statement->fetch();
  }

  public function get()
  {
    return $this->statement->fetchAll();
  }


  public function findOrFail() //this function finds info in db and aborts if not available
  {
    $result = $this->find();

    if (!$result) {
      abort();
    }
    return $result;
  }
}
