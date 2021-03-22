<?php

namespace Core;

use PDO;
use PDOException;
use PDOStatement;

class Database
{
    private PDO $pdo;
    private PDOStatement $stmt;
    private string $error;
    private static Database $instance;

    /**
     * Connect to database
     * Save instance into property $pdo
     *
     * @param string $type
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     */
    private function __construct(string $type, string $host, string $dbname, string $username, string $password){
        $params = $type . ':host=' . $host . ';dbname=' . $dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->pdo = new PDO($params, $username, $password, $options);
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Singleton
     * Create object only if instance does't already exists
     *
     * @param string $type
     * @param string $host
     * @param string $dbname
     * @param string $username
     * @param string $password
     * @return Database
     */
    public static function getInstance(string $type, string $host, string $dbname, string $username, string $password): Database
    {
        if (self::$instance === null) {
            self::$instance = new self($type, $host, $dbname, $username, $password);
        }
        return self::$instance;
    }

    /**
     * Make prepared statement
     *
     * @param $sql
     * @return Database
     */
    public function query($sql): Database
    {
        $this->stmt = $this->pdo->prepare($sql);

        return $this;
    }

    /**
     * Bind params to prepared statement if needed
     *
     * @param $param
     * @param $value
     * @param null $type
     * @return Database
     */
    public function bind($param, $value, $type = null): Database
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);

        return $this;
    }

    /**
     * Execute prepared statement
     *
     * @return mixed
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * @param string $className
     * @return null | array [objects]
     */
    public function resultSet(string $className)
    {
        $this->setFetchMode($className);
        $this->execute();
        return $this->stmt->fetchAll();
    }

    /**
     * @param string $className
     * @return null | object
     */
    public function single(string $className)
    {
        $this->setFetchMode($className);
        $this->execute();
        return $this->stmt->fetch();
    }

    public function rowCount(): int
    {
        return $this->stmt->rowCount();
    }
    private function setFetchMode(string $className): void
    {
        $this->stmt->setFetchMode(PDO::FETCH_CLASS, $className);
    }
}