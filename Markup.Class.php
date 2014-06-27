<?php

Class Markup
{
	public static function GenerateTooltip($Type, $ItemID, $ItemName)
	{
		if($ItemID != 0)
			$Tooltip = '<a href="#" rel="'.$Type.'='.$ItemID.'">'.$ItemName.'</a>';
		else
			$Tooltip = "";
		return $Tooltip;
	}

	public static function PrepareSQLData($Data)
	{
		echo "<div id='SQLZone' style='float:left; width:50%;'><textarea rows='30' cols='110' readonly>";
		echo $Data;
		echo "</textarea><br /><br />";
		if(isset($Data['itemset']))
			echo "We have found, that this item is part of the set <a href='/?setparse=".$Data['itemset']."' target='_blank'>".$Data['itemset']."</a>";
		echo"</div>";
	}

	public static function PrepareEditArea($Data)
	{
		echo "<div id='EditZone' style='float:left; width:40%;'><h2><strong>Edit SQL:</strong></h2><form action='?".$_SERVER['QUERY_STRING']."&final=true' method='post'>";
		echo "
		<table>
		<tr><td><strong>Item ID:</strong></td><td> <input type='text' name='id' value='".$Data['entry']."'></td><td></td></tr>
		<tr><td><strong>Display ID:</strong></td><td> <input type='text' name='displayid' value='".$Data['displayid']."'></td><td></td></tr>
		<tr><td><strong>Flags:</strong></td><td> <input type='text' name='flags' value='".$Data['Flags']."'></td><td></td></tr>
		<tr><td><strong>Extra Flags:</strong></td><td> <input type='text' name='eflags' value='".$Data['FlagsExtra']."'></td><td></td></tr>
		<tr><td><strong>Socket Bonus:</strong></td><td> <input type='text' name='socketbonus' value='".$Data['socketBonus']."'></td><td>".$Data['socketBonusText']."</td></tr>
		<tr><td><strong>Spell 1:</strong></td><td> <input type='text' name='spell1' value='".$Data['spellid_1']."'></td><td>".Markup::GenerateTooltip('spell',$Data['spellid_1'],$Data['spellid_1'])."</td></tr>
		<tr><td><strong>Spell 2:</strong></td><td> <input type='text' name='spell2' value='".$Data['spellid_2']."'></td><td>".Markup::GenerateTooltip('spell',$Data['spellid_2'],$Data['spellid_2'])."</td></tr>
		<tr><td><strong>Spell 3:</strong></td><td> <input type='text' name='spell3' value='".$Data['spellid_3']."'></td><td>".Markup::GenerateTooltip('spell',$Data['spellid_3'],$Data['spellid_3'])."</td></tr>
		";
		echo "<tr><td><input type='submit' value='submit'></td><td></td></tr></table></form></div>";
	}
}

?>