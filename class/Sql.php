<?php
/**
 * Created by PhpStorm.
 * User: BrGomes
 * Date: 15/05/2018
 * Time: 20:01
 */

class Sql extends PDO{

        private $con;

    /**
     * Sql constructor.
     * @param $con
     */
    public function __construct()
    {
        $this->con = new PDO('mysql:host=localhost; dbname=dbphp7',"root","");
    }

    private function setParam($stmt, $key, $value){
            $stmt->bindParam($key, $value);

    }
    private function setParams($rawQuery, $params = array())
    {
        foreach ($params as $key => $value) {
            $this->setParam($key, $value);
        }
    }

        public function query($rawQuery, $params = array()){
            $stmt = $this->con->prepare($rawQuery);
            $this->setParams($stmt, $params);
            $stmt->execute();

            return $stmt;
        }

        public function SELECT($rawQuery, $params = array())
        {
                $stmt = $this->query($rawQuery,$params);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}
