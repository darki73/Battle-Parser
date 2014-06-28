<?php

Class Functions
{
	public static function FormatSizeUnits($bytes)
	{
		if ($bytes >= 1073741824)
	        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        elseif ($bytes >= 1048576)
        	$bytes = number_format($bytes / 1048576, 2) . ' MB';
        elseif ($bytes >= 1024)
        	$bytes = number_format($bytes / 1024, 2) . ' KB';
        elseif ($bytes > 1)
        	$bytes = $bytes . ' bytes';
        elseif ($bytes == 1)
        	$bytes = $bytes . ' byte';
        else
        	$bytes = '0 bytes';
        return $bytes;
	}

	public static function GetBaseURL()
	{
		$BaseURL = "http://".$_SERVER['HTTP_HOST'];
		return $BaseURL;
	}

	public static function CurrentTimeStamp()
	{
		$Date = date(DATE_RFC822);
		$Timestamp = strtotime($Date);
		return $Timestamp;
	}

	public static function CorrectCWD()
	{
		$cwd = str_replace("\\", "/", getcwd());
		return $cwd;
	}
}

?>