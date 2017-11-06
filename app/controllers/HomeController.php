<?php

namespace App\Controller;

use App\Models\DAO\UserDAO;
use Core\Controller;
use Core\Model;
use Modulos\Classes\Registry;
use Modulos\Database\PDOConnector;

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'contaazul');
define('CHARSET', 'utf8');
/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends Controller
{


    public function index()
    {

        $conect = new PDOConnector(HOST, DB, USER, PASS, CHARSET);

        $registry = Registry::getInstance();
        $registry->setRegistry('PDO', $conect->getConnection());


        $dao = new UserDAO();
        $results = $dao->getAll();


        ($conect->connect());


        //$model = new Model();

//        $con = new PDOConnector(HOST,DB,USER,PASS,CHARSET);
//        $stmt = $con->getConnection();

//        $stmt->prepare($sql);
//        $stmt->bindValue();
//        $stmt->execute("SELECT * FROM  {$this->table} WHERE email = :email");
//
//        $con->disconnect();

        $data = array('nome' =>'Fulano');
        $this->renderView('login', $data);

    }

}