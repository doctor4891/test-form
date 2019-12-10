<?php


namespace model;


use PDO;

/**
 * Class User
 * @package model
 */
class User
{
    /**
     * @var
     */
    private static $_instance;

    //singleton Users table

    /**
     * User constructor.
     */
    private function __construct()
    {
        $user = 'root';
        $pswd = 'password';
        $dsn = 'mysql:host=jobtest-mysql; dbname=users';
        $dbh = new PDO($dsn, $user, $pswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'', PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET \'UTF8\';'));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $dbh;

        return $dbh;
    }

    /**
     * @return User
     */
    public static function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @param $userLogin
     * @param $userPassword
     * @param $userEmail
     * @param $userCookie
     * @param $userPic
     * @return bool
     */
    public function addUser($userLogin, $userPassword, $userEmail, $userCookie, $userPic)
    {
        $sql = "INSERT into Users SET UserLogin=:UserLogin, UserPassword=:UserPassword, UserEmail=:UserEmail, UserCookie=:UserCookie, UserPic=:UserPic";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':UserLogin', $userLogin);
        $stmt->bindParam(':UserPassword', $userPassword);
        $stmt->bindParam(':UserEmail', $userEmail);
        $stmt->bindParam(':UserCookie', $userCookie);
        $stmt->bindParam(':UserPic', $userPic);

        $result = $stmt->execute();

        return $result;
    }

    /**
     * @param $userLogin
     * @return bool
     */
    public function ifUserExistByLogin($userLogin)
    {
        $sql = "SELECT * from Users where UserLogin=:UserLogin";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':UserLogin', $userLogin);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $userEmail
     * @return bool
     */
    public function ifEmailExist($userEmail)
    {
        $sql = "SELECT * from Users where UserEmail=:UserEmail";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':UserEmail', $userEmail);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $userCookie
     * @return bool|mixed
     */
    public function getUserByCookie($userCookie)
    {
        $sql = "SELECT * from Users where UserCookie=:UserCookie";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':UserCookie', $userCookie);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result) == 1) {
            return $result[0];
        } else {
            return false;
        }
    }

    /**
     * @param $userLogin
     * @return bool|mixed
     */
    public function getUserByLogin($userLogin)
    {
        $sql = "SELECT * from Users where UserLogin=:UserLogin";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':UserLogin', $userLogin);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (count($result) == 1) {
            return $result[0];
        } else {
            return false;
        }
    }

    /**
     * @param $userCookie
     * @param $userLogin
     */
    public function updateUserCookie($userCookie, $userLogin)
    {
        $sql = "UPDATE Users set UserCookie=:UserCookie where UserLogin=:UserLogin";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':UserLogin', $userLogin);
        $stmt->bindParam(':UserCookie', $userCookie);
        $stmt->execute();
    }

    private function __clone()
    {
        //
    }

    private function __wakeup()
    {
        //
    }
}