<?php
require_once('Core/Libraries/Smarty.class.php');

global $Directory, $FCCore, $Smarty;

$Directory = str_replace("\\", "/", getcwd());

Class Smarty_FCCore extends Smarty
{
	function Smarty_FCCore()
	{
		global $Directory, $FCCore, $Functions;
		$this->__construct();
		$this->template_dir = $Directory.'/Templates/'.$FCCore['Template'].'/';
		$this->compile_dir = $Directory.'/Cache/Compile/Templates/'.$FCCore['Template'].'/';
		$this->config_dir = $Directory.'/Core/Languages/';
		$this->cache_dir = $Directory.'/Cache/';

		// Debug Mode
		$this->debugging = $FCCore['Debug'];

		// Template Vars
		$this->left_delimiter = '{';
		$this->right_delimiter = '}';

		// Caching
		$this->caching = $FCCore['Caching'];

		// System Vars
		$this->assign('AppName', $FCCore['ApplicationName']);
		$this->assign('AppDescription', $FCCore['ApplicationDescription']);
		$this->assign('Template', $FCCore['Template']);
		$this->assign('Timestamp', Functions::CurrentTimeStamp());
		$this->assign('BaseURL', Functions::GetBaseURL());
	}

	function display($template = NULL, $cache_id = NULL, $compile_id = NULL, $parent = NULL)
	{
		Smarty::Display($template);
	}
}
$Smarty = new Smarty_FCCore($FCCore['Template']);
?>