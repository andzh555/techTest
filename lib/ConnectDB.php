<?php


class ConnectDB
{
    private static $link;
    private $dbHost;
    private $dbUserName;
    private $dbPass;
    private $dbName;


    public function __construct()
    {
        $this->dbHost = 'localhost';
        $this->dbUserName = 'root';
        $this->dbPass = 'root';
        $this->dbName = 'scandi';

    }

    public function connectToDataBase()
    {
        if ($this->checkConnectToDataBase()) {
            self::$link = mysqli_connect($this->dbHost, $this->dbUserName, $this->dbPass, $this->dbName);
        }
        if (!self::getLinkForDataBase()) {
            die('Connect Error: ' . mysqli_connect_errno());
        }
    }

    private function checkConnectToDataBase()
    {
        if (!empty($this->dbHost) and
            !empty($this->dbName) and
            !empty($this->dbPass) and
            !empty($this->dbUserName)) {
            return true;
        } else {

            return false;
        }

    }

    public static function getLinkForDataBase()
    {
        return self::$link;
    }

    public function queryDef($str)
    {
        return mysqli_real_escape_string(self::$link, $str);
    }

    public function checkUniqSkuInDb($str)
    {
        $sql = "SELECT sku FROM products WHERE sku ='{$str}'";
        $check = $this->executeQuery($sql);
        if (mysqli_num_rows($check) > 0) {
            return false;
        } else {
            return true;
        }

    }

    public function executeQuery($sql)
    {
        return mysqli_query(self::$link, $sql);
    }


}

?>