<?php

/**
 * ConnectDB a singleton class to connect db
 */
class ConnectDb
{
  //@var $instance hold the class instance
  private static $instance = null;
  //@var $conn hold PDO class instance
  private $conn;

  //@var string $host particular host name as per db server
  private $host = 'localhost';
  //@var string $user hold username for particular db server
  private $user = 'db user-name';
  //@var $pass hold password of particular db server
  private $pass = 'db password';
  //@var string $name hold name DataBase name
  private $name = 'db name';

  /**
   * Private constructor to establish db connection
   */
  private function __construct()
  {
    $this->conn = new PDO("mysql:host={$this->host};
      dbname={$this->name}",$this->user,$this->pass,
      array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
    );
  }


  /**
   * static function to create instance of class if already not created
   *
   * @return object of ConnectDB class
   */
  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new ConnectDb();
    }

    return self::$instance;
  }

  /**
   * Function to check if connection with db is established or not
   *
   * @return conn
   */
  public function getConnection()
  {
    return $this->conn;
  }
}
