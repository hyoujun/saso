<?php
namespace saso\classes\base;
class PdoManager{    
    private static $_pdo;
    
    private function __construct() {
        try{
            self::$_pdo = new \PDO(
                  DSN
                , USER
                , PASSWORD
                , array(
                      \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                    , \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_CLASS
                )
            );
            self::$_pdo->exec('SET NAMES utf8');
        }catch (\PDOException $e){
            $ctrlbase = new \saso\classes\controllers\ControllerBase();
            $ctrlbase->error('database');
            die();
        }
    }
    
    public static function getPdo() {
        new PdoManager();
        return self::$_pdo;
    }
        
    public final function __clone() {
        throw new \Exception('invalidClone');
    }
}

