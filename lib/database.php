<?php

class Database {

    public function __construct() {
        $this->server = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "bhaktinow";

        $this->dbcon = mysqli_connect($this->server, $this->username, $this->password, $this->database);
        if (mysqli_connect_errno()) {
            die('Could not connect: ' . mysqli_connect_error($this->dbcons));
        }
        return $this->dbcon;
    }

}
