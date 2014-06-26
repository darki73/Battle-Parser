<body style="background-color: black; color: white;">
<?php
require_once('BattleNet.Parser.php');
if(isset($_REQUEST['parseitem']))
{
	$ItemInfo = Parser::GetItemInfo($_REQUEST['parseitem']);
	echo 'Here is a SQL for:  <a href="#" rel="item='.$ItemInfo['id'].'">'.$ItemInfo['name'].'</a><br /><br />';
	Parser::PrepareSQL(Parser::PrepareData($ItemInfo));
}
elseif(isset($_REQUEST['parseset']))
{
	echo "<pre>";
	echo "Item_set_names table SQL:<br />";
	$SetInfo = Parser::GetSetInfo($_REQUEST['parseset']);
	Parser::ISNSQL($SetInfo)."<br /><br />";
	Parser::PrepareSetData($SetInfo);
}
else
{
	echo '
	<form action="" method="get">
	Parse Item: <input type="text" name="parseitem"> <input type="submit" value="Parse">
	</form>
	<form action="" method="get">
	Parse Set: <input type="text" name="parseset"> <input type="submit" value="Parse">
	</form>
	';
}

?>
<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>
</body>