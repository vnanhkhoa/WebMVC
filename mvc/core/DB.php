<?php 
class DB
{
    public $con;
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'qlbg';

    public function __construct()
    {
        $this->con = new mysqli($this->servername,$this->username,$this->password, $this->dbname) or die(mysqli_error($this->con));
        mysqli_set_charset($this->con, 'UTF8');
    }
}

?>