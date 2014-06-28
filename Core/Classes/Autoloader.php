<?php

Class Autoloader
{
	public function __construct()
	{

	}

	public static function Initialize()
	{
		Autoloader::LoadConfiguration();
		Autoloader::LoadComponents();
	}

	public static function LoadConfiguration()
	{
		require_once($_SERVER['DOCUMENT_ROOT'].'/Core/Configuration.php');
	}
	
	public static function LoadComponents()
	{
		$Components = array('Classes', 'Modules');
		foreach($Components as $Component)
			Autoloader::LoadOrder($Component);
	}

	public static function LoadOrder($Dirname, $Exclude=null)
	{
		$FullPath = $_SERVER['DOCUMENT_ROOT'].'/Core/'.$Dirname.'/';
		$LoadOrderFile = $FullPath."LoadOrder.json";
		$LoadOrder = json_decode(file_get_contents($LoadOrderFile), true);
		foreach($LoadOrder['LoadOrder'] as $LoadItem)
		{
			if(!empty($LoadItem))
			{
				require_once($FullPath.$LoadItem);
			}
		}
	}
}

?>