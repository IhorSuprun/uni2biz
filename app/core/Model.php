<?php
namespace app\core;
use \PDO;
abstract class Model {
//    abstract public function get_all();
    /**
     *
     * @var PDO
     */
    protected $db;
    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $db = 'unibiz_db';
        $this->db = new PDO('mysql:host='.$host.';dbname='.$db, $user, $password);
    }
}