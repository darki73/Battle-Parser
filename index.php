<body style="background-color: white; color: black; width:960px;">
<?php
require_once('BattleNet.Parser.php');
require_once('Markup.Class.php');
if(isset($_REQUEST['itemparse']))
{
	$ItemInfo = Parser::GetItemInfo($_REQUEST['itemparse']);
	$Data = Parser::PrepareData($ItemInfo);
	if(isset($_REQUEST['final']))
	{
		$FinalArray = array('entry' => $_POST['id'], 'displayid' => $_POST['displayid'], 'Flags' => $_POST['flags'], 'FlagsExtra' => $_POST['eflags'], 'socketBonus' => $_POST['socketbonus'], 'spellid_1' => $_POST['spell1'], 'spellid_2' => $_POST['spell2'], 'spellid_3' => $_POST['spell3']);
		foreach(array_keys($FinalArray) as $key)
		{
			unset($Data[$key]);
		}
		$FinalData = array_merge($FinalArray, $Data);
		echo "Here is a SQL for:  ".Markup::GenerateTooltip('item', $ItemInfo['id'], $ItemInfo['name'])."<br /><br />";
		echo "<div id='DataZone'>";
		Markup::PrepareSQLData(Parser::PrepareSQL($FinalData));
		Markup::PrepareEditArea($FinalData);
		echo "</div>";
	}
	else
	{
		$ItemInfo = Parser::GetItemInfo($_REQUEST['itemparse']);
		$Data = Parser::PrepareData($ItemInfo);
		echo "Here is a SQL for:  ".Markup::GenerateTooltip('item', $ItemInfo['id'], $ItemInfo['name'])."<br /><br />";
		echo "<div id='DataZone'>";
		Markup::PrepareSQLData(Parser::PrepareSQL($Data));
		Markup::PrepareEditArea($Data);
		echo "</div>";
		//Parser::PrepareSQL(Parser::PrepareData($ItemInfo));
	}
}
elseif(isset($_REQUEST['setparse']))
{
	echo "<pre>";
	echo "Item_set_names table SQL:<br />";
	$SetInfo = Parser::GetSetInfo($_REQUEST['setparse']);
	Parser::ISNSQL($SetInfo)."<br /><br />";
	Parser::PrepareSetData($SetInfo);
}
else
{
	echo '
	<form action="" method="get">
	Parse Item: <input type="text" name="itemparse"> <input type="submit" value="Parse">
	</form>
	<form action="" method="get">
	Parse Set: <input type="text" name="setparse"> <input type="submit" value="Parse">
	</form>
	';
}

?>
<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>
</body>