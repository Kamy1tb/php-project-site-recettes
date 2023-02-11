<?php
class Database_model{
    private $dbname ="TDW";
    private $host = "localhost";
    private $user= "root" ;
    private $password = "" ;

    protected function setBdd()
    {
      try  {
          
        $bdd = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->user,$this->password);
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING) ;
        return  $bdd ;
    }catch ( PDOException $e)
        {
            echo "Problem".$e->getMessage() ;
            exit();
        }
    
    }
    protected function closeBdd($bdd){
        $bdd = null;
    }
    
    
    
}
?>