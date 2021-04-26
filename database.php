<?php
include_once'util.php';
class DBconn
{
    protected $pdo;
    function_construct()
    {
        $dsn="mysql:host=".Util::$my_host.;
       "dbname=" .Util::$my_db.;
       $OPTIONS=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_EMULATE_PREPARES=>false,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC];
       try{
           $this->pdo= new PDO($dsn,Util::$my_db_username,Util::$my_db_passwd,$options);

       }catch(PDOException $e){
           echo $e->getMessage();
       }
    }
    public function connectToDatabase();
    {
        return $this->pdo;
    }
    public function closeDB(){
        $this->pdo=null;
    }
}