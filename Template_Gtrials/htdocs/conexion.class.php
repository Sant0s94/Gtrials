<?php
class Conexion
{
    private static $instancia;
    private $dbh;
 
    private function __construct()
    {
        try {
 
            $this->dbh = new PDO('mysql:host=localhost;dbname=miApp', 'root', '');
            $this->dbh->exec("SET CHARACTER SET utf8");
 
        } catch (PDOException $e) {
 
            print "Error!: " . $e->getMessage();
 
            die();
        }
    }
 
    public function prepare($sql)
    {
 
        return $this->dbh->prepare($sql);
 
    }
 
    public static function singleton_conexion()
    {
 
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
 
        }
 
        return self::$instancia;
        
    }
}

?>