<?php

Class Database
{
	public static $DBConnection;
	private $Template;
	private static $Statement;

	public function __construct()
	{
		global $FCCore, $Smarty, $Directory, $Language;
		$this->Template = $Smarty;
		try
		{
			Database::$DBConnection = new PDO("mysql:host=".$FCCore['world']['host'].";dbname=".$FCCore['world']['database'].";charset=UTF8", $FCCore['world']['username'], $FCCore['world']['password'], array(PDO::ATTR_PERSISTENT => true));
			Database::$DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e)
		{
			echo "<pre>";
			print_r($e->getMessage());
			die();
		}
	}

	public static function Query($Query)
	{
		Database::$Statement = Database::$DBConnection->prepare($Query);
	}

	public static function Bind($Parameter, $Value, $Type = null)
	{
		if (is_null($Type)) 
		{
	        switch (true) {
	            case is_int($Value):
	                $Type = PDO::PARAM_INT;
	                break;
	            case is_bool($Value):
	                $Type = PDO::PARAM_BOOL;
	                break;
	            case is_null($Value):
	                $Type = PDO::PARAM_NULL;
	                break;
	            default:
	                $Type = PDO::PARAM_STR;
	        }
	    }
	    Database::$Statement->bindValue($Parameter, $Value, $Type);
	}

	public static function Execute()
	{
    	return Database::$Statement->execute();
	}

	public static function FetchAll()
	{
	    Database::Execute();
	    return Database::$Statement->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function FetchOne()
	{
	    Database::Execute();
	    return Database::$Statement->fetch(PDO::FETCH_ASSOC);
	}

	public static function BeginTransaction()
	{
	    return Database::$DBConnection->beginTransaction();
	}

	public static function EndTransaction()
	{
	    return Database::$DBConnection->commit();
	}

	public static function CancelTransaction()
	{
	    return Database::$DBConnection->rollBack();
	}

}
global $Database, $FCCore;
$Database = new Database();

?>