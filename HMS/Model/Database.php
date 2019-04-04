<?php 
class Database{
 public static $conn;
 public static $stmt;
 const serverName="localhost";
 const serverUsername="root";
 const serverPassword="";
 const databaseName="HMS";
 const dsn="mysql:host=".Database::serverName.";dbname=".Database::databaseName;

	public static function connectDb()
	{

                Database::$conn = new PDO(Database::dsn, Database::serverUsername,Database::serverPassword);
                Database::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }

	public static function insert($query)
	{
	
		$result=-1;
		if ($query!='') {
			$result=Database::$conn->exec($query);
		}
		return $result;	
	}

	public static function read($query)
	{  $result=NULL;
	  if ($query!='') {
                     $result=Database::$conn->query($query);
	   }
                   return $result;
	}

	public static function delete($query)
	{
	
			$result=-1;
		if ($query!='') {
			$result=Database::$conn->exec($query);
		}
		return $result;
		
		
	}

	public static function update($query)
	{
	
			$result=-1;
		if ($query!='') {
			 $result=Database::$conn->exec($query);
                                    }
		return $result;
	}
         public static function close()
     {
     	if (!is_null(Database::$conn)) {
     		Database::$conn=null;
     	}
     	if (!is_null(Database::$pstmt)) {
     		Database::$pstmt=null;
     	}
     }
	
}



 ?>