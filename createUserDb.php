<?php

class userDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "bancoproduto",
        $tablename = "users",
        $servername = "localhost",
        $username = "root",
        $password = "159263"
    )
    {
    $this->dbname = $dbname;
    $this->tablename = $tablename;
    $this->servername = $servername;
    $this->username = $username;
    $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Conexão mal sucedida: " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            if (!mysqli_query($this->con, $sql)){
                echo "Erro ao criar tabela: " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getUser($user){

        $sql = "SELECT * FROM $this->tablename WHERE username = '$user' ";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}