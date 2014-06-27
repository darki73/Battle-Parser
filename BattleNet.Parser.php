<?php

Class Parser
{
	public static function GetItemInfo($ItemID)
	{
		$ItemInfo = json_decode(file_get_contents('http://us.battle.net/api/wow/item/'.$ItemID), true);
		return $ItemInfo;
	}

	public static function GetSetInfo($SetID)
	{
		$SetInfo = json_decode(file_get_contents('http://us.battle.net/api/wow/item/set/'.$SetID), true);
		return $SetInfo;
	}

	public static function ISNSQL($Data)
	{
		echo '<textarea rows="5" cols="150" readonly>';
		echo "INSERT INTO `item_set_names`(`entry`, `name`, `InventoryType`, `VerifiedBuild`) VALUES ('".$Data['id']."','".$Data['name']."','2','12340');";
		echo '</textarea>';
	}

	public static function FHIS($Data)
	{
		echo '<br /><br />freedomhead_itemset SQL: <br /><textarea rows="5" cols="150" readonly>';
		echo "INSERT INTO `freedomhead_itemset`(`itemsetID`, `name_loc0`, `name_loc8`, `item1`, `item2`, `item3`, `item4`, `item5`, `item6`, `item7`, `item8`, `item9`, `item10`, `spell1`, `spell2`, `spell3`, `spell4`, `spell5`, `spell6`, `spell7`, `spell8`, `bonus1`, `bonus2`, `bonus3`, `bonus4`, `bonus5`, `bonus6`, `bonus7`, `bonus8`, `skillID`, `skilllevel`, `classes`, `note`, `heroic`) VALUES ('-".$Data['id']."','".$Data['name']."','','".$Data['item1']."','".$Data['item2']."','".$Data['item3']."','".$Data['item4']."','".$Data['item5']."','".$Data['item6']."','".$Data['item7']."','".$Data['item8']."','".$Data['item9']."','".$Data['item10']."','".$Data['spell1']."','".$Data['spell2']."','".$Data['spell3']."','".$Data['spell4']."','".$Data['spell5']."','".$Data['spell6']."','".$Data['spell7']."','".$Data['spell8']."', '2' , '2', '4' , '4' ,'0','0','0','0','0','0',2,30,0)";
		echo '</textarea>';
	}

	public static function PrepareSQL($Data)
	{
		$ItemSQL = "INSERT INTO `item_template`(`entry`, `class`, `subclass`, `SoundOverrideSubclass`, `name`, `displayid`, `Quality`, `Flags`, `FlagsExtra`, `BuyCount`, `BuyPrice`, `SellPrice`, `InventoryType`, `AllowableClass`, `AllowableRace`, `ItemLevel`, `RequiredLevel`, `RequiredSkill`, `RequiredSkillRank`, `requiredspell`, `requiredhonorrank`, `RequiredCityRank`, `RequiredReputationFaction`, `RequiredReputationRank`, `maxcount`, `stackable`, `ContainerSlots`, `StatsCount`, `stat_type1`, `stat_value1`, `stat_type2`, `stat_value2`, `stat_type3`, `stat_value3`, `stat_type4`, `stat_value4`, `stat_type5`, `stat_value5`, `stat_type6`, `stat_value6`, `stat_type7`, `stat_value7`, `stat_type8`, `stat_value8`, `stat_type9`, `stat_value9`, `stat_type10`, `stat_value10`, `ScalingStatDistribution`, `ScalingStatValue`, `dmg_min1`, `dmg_max1`, `dmg_type1`, `dmg_min2`, `dmg_max2`, `dmg_type2`, `armor`, `holy_res`, `fire_res`, `nature_res`, `frost_res`, `shadow_res`, `arcane_res`, `delay`, `ammo_type`, `RangedModRange`, `spellid_1`, `spelltrigger_1`, `spellcharges_1`, `spellppmRate_1`, `spellcooldown_1`, `spellcategory_1`, `spellcategorycooldown_1`, `spellid_2`, `spelltrigger_2`, `spellcharges_2`, `spellppmRate_2`, `spellcooldown_2`, `spellcategory_2`, `spellcategorycooldown_2`, `spellid_3`, `spelltrigger_3`, `spellcharges_3`, `spellppmRate_3`, `spellcooldown_3`, `spellcategory_3`, `spellcategorycooldown_3`, `spellid_4`, `spelltrigger_4`, `spellcharges_4`, `spellppmRate_4`, `spellcooldown_4`, `spellcategory_4`, `spellcategorycooldown_4`, `spellid_5`, `spelltrigger_5`, `spellcharges_5`, `spellppmRate_5`, `spellcooldown_5`, `spellcategory_5`, `spellcategorycooldown_5`, `bonding`, `description`, `PageText`, `LanguageID`, `PageMaterial`, `startquest`, `lockid`, `Material`, `sheath`, `RandomProperty`, `RandomSuffix`, `block`, `itemset`, `MaxDurability`, `area`, `Map`, `BagFamily`, `TotemCategory`, `socketColor_1`, `socketContent_1`, `socketColor_2`, `socketContent_2`, `socketColor_3`, `socketContent_3`, `socketBonus`, `GemProperties`, `RequiredDisenchantSkill`, `ArmorDamageModifier`, `duration`, `ItemLimitCategory`, `HolidayId`, `ScriptName`, `DisenchantID`, `FoodType`, `minMoneyLoot`, `maxMoneyLoot`, `flagsCustom`, `VerifiedBuild`) VALUES ('".$Data['entry']."', '".$Data['class']."', '".$Data['subclass']."', '".$Data['SoundOverrideSubclass']."', '".$Data['name']."', '".$Data['displayid']."', '".$Data['Quality']."', '".$Data['Flags']."', '".$Data['FlagsExtra']."', '".$Data['BuyCount']."', '".$Data['BuyPrice']."', '".$Data['SellPrice']."', '".$Data['InventoryType']."', '".$Data['AllowableClass']."', '".$Data['AllowableRace']."', '".$Data['ItemLevel']."', '".$Data['RequiredLevel']."', '".$Data['RequiredSkill']."', '".$Data['RequiredSkillRank']."', '".$Data['requiredspell']."', '".$Data['requiredhonorrank']."', '".$Data['RequiredCityRank']."', '".$Data['RequiredReputationFaction']."', '".$Data['RequiredReputationRank']."', '".$Data['maxcount']."', '".$Data['stackable']."', '".$Data['ContainerSlots']."', '".$Data['StatsCount']."', '".$Data['stat_type1']."', '".$Data['stat_value1']."', '".$Data['stat_type2']."', '".$Data['stat_value2']."', '".$Data['stat_type3']."', '".$Data['stat_value3']."', '".$Data['stat_type4']."', '".$Data['stat_value4']."', '".$Data['stat_type5']."', '".$Data['stat_value5']."', '".$Data['stat_type6']."', '".$Data['stat_value6']."', '".$Data['stat_type7']."', '".$Data['stat_value7']."', '".$Data['stat_type8']."', '".$Data['stat_value8']."', '".$Data['stat_type9']."', '".$Data['stat_value9']."', '".$Data['stat_type10']."', '".$Data['stat_value10']."', '".$Data['ScalingStatDistribution']."', '".$Data['ScalingStatValue']."', '".$Data['dmg_min1']."', '".$Data['dmg_max1']."', '".$Data['dmg_type1']."', '".$Data['dmg_min2']."', '".$Data['dmg_max2']."', '".$Data['dmg_type2']."', '".$Data['armor']."', '".$Data['holy_res']."', '".$Data['fire_res']."', '".$Data['nature_res']."', '".$Data['frost_res']."', '".$Data['shadow_res']."', '".$Data['arcane_res']."', '".$Data['delay']."', '".$Data['ammo_type']."', '".$Data['RangedModRange']."', '".$Data['spellid_1']."', '".$Data['spelltrigger_1']."', '".$Data['spellcharges_1']."', '".$Data['spellppmRate_1']."', '".$Data['spellcooldown_1']."', '".$Data['spellcategory_1']."', '".$Data['spellcategorycooldown_1']."', '".$Data['spellid_2']."', '".$Data['spelltrigger_2']."', '".$Data['spellcharges_2']."', '".$Data['spellppmRate_2']."', '".$Data['spellcooldown_2']."', '".$Data['spellcategory_2']."', '".$Data['spellcategorycooldown_2']."', '".$Data['spellid_3']."', '".$Data['spelltrigger_3']."', '".$Data['spellcharges_3']."', '".$Data['spellppmRate_3']."', '".$Data['spellcooldown_3']."', '".$Data['spellcategory_3']."', '".$Data['spellcategorycooldown_3']."', '".$Data['spellid_4']."', '".$Data['spelltrigger_4']."', '".$Data['spellcharges_4']."', '".$Data['spellppmRate_4']."', '".$Data['spellcooldown_4']."', '".$Data['spellcategory_4']."', '".$Data['spellcategorycooldown_4']."', '".$Data['spellid_5']."', '".$Data['spelltrigger_5']."', '".$Data['spellcharges_5']."', '".$Data['spellppmRate_5']."', '".$Data['spellcooldown_5']."', '".$Data['spellcategory_5']."', '".$Data['spellcategorycooldown_5']."', '".$Data['bonding']."', '".$Data['description']."', '".$Data['PageText']."', '".$Data['LanguageID']."', '".$Data['PageMaterial']."', '".$Data['startquest']."', '".$Data['lockid']."', '".$Data['Material']."', '".$Data['sheath']."', '".$Data['RandomProperty']."', '".$Data['RandomSuffix']."', '".$Data['block']."', '".$Data['itemset']."', '".$Data['MaxDurability']."', '".$Data['area']."', '".$Data['Map']."', '".$Data['BagFamily']."', '".$Data['TotemCategory']."', '".$Data['socketColor_1']."', '".$Data['socketContent_1']."', '".$Data['socketColor_2']."', '".$Data['socketContent_2']."', '".$Data['socketColor_3']."', '".$Data['socketContent_3']."', '".$Data['socketBonus']."', '".$Data['GemProperties']."', '".$Data['RequiredDisenchantSkill']."', '".$Data['ArmorDamageModifier']."', '".$Data['duration']."', '".$Data['ItemLimitCategory']."', '".$Data['HolidayId']."', '".$Data['ScriptName']."', '".$Data['DisenchantID']."', '".$Data['FoodType']."', '".$Data['minMoneyLoot']."', '".$Data['maxMoneyLoot']."', '".$Data['flagsCustom']."', '".$Data['VerifiedBuild']."');";	
		return $ItemSQL;
	}

	public static function PrepareSetData($Result)
	{
		$Data = array();
		$Data['id'] = $Result['id'];
		$Data['name'] = $Result['name'];
		for($i=1; $i<=10; $i++)
		{
			if(isset($Result['items'][$i-1]))
			{
				$Data['item'.$i] = $Result['items'][$i-1];
			}
			else
			{
				$Data['item'.$i] = "0";
			}
		}
		for($i=1; $i<=10; $i++)
		{
			$Data['spell'.$i] = "LOOK AT WOWHEAD";
		}
		Parser::FHIS($Data);
	}

	private static function GetMoney($Money)
	{
		$Coins = array();

		if($Money >= 10000)
		{
			$Coins['moneygold'] = floor($Money / 10000);
			$Money = $Money - $Coins['moneygold']*10000;
		}

		if($Money >= 100)
		{
			$Coins['moneysilver'] = floor($Money / 100);
			$Money = $Money - $Coins['moneysilver']*100;
		}

		if($Money > 0)
			$Coins['moneycopper'] = $Money;

		return $Coins;
	}

	private static function AllowableClass($Classes)
	{
		$ClassMask = array(
			1 => 1,
			2 => 2,
			3 => 4,
			4 => 8,
			5 => 16,
			6 => 32,
			7 => 64,
			8 => 128,
			9 => 256,
			11 => 1024
		);
		$AllowableClass = "";
		foreach($Classes as $Class)
		{
			$AllowableClass += $ClassMask[$Class];
		}

		return $AllowableClass;
	}

	private static function AllowableRace($Races)
	{
		$RaceMask = array(
			1 => 1,
			2 => 2,
			3 => 4,
			4 => 8,
			5 => 16,
			6 => 32,
			7 => 64,
			8 => 128,
			9 => 256,
			10 => 512,
			11 => 1024,
			12 => 2048,
			13 => 4096,
			14 => 8192,
			15 => 16384,
			16 => 32768,
			17 => 65536,
			18 => 131072,
			19 => 262144,
			20 => 524288,
			21 => 1048576,
			22 => 2097152
		);

		$AllowableRace = "";
		foreach($Races as $Race)
		{
			$AllowableRace += $RaceMask[$Race];
		}

		return $AllowableRace;
	}

	private static function SpellTriggerType($Trigger)
	{
		$TriggerMask = array(
			"ON_USE" => "0",
			"ON_EQUIP" => "1",
			"ON_PROC" => "2",
			"NOT_EXISTS" => "4",
			"ON_PICKUP" => "5",
			"NOT_EXISTS" => "6",
		);

		$SpellTrigger = $TriggerMask[$Trigger];
		return $SpellTrigger;
	}

	private static function GetSocketColor($Color)
	{
		$ColorMask = array(
			"META" => "1",
			"RED" => "2",
			"YELLOW" => "4",
			"BLUE" => "8",
		);

		$SocketColor = $ColorMask[$Color];
		return $SocketColor;
	}

	private static function GetSocketBonus($Bonus)
	{
		$BonusMask = array(
			// Spell Power Bonuses
			"+4 Spell Power" => "2900",
			"+5 Spell Power" => "3752",
			"+7 Spell Power" => "3602",
			"+9 Spell Power" => "3753",
			// Attack Power Bonuses
			"+4 Attack Power" => "3114",
			"+8 Attack Power" => "2936",
			"+12 Attack Power" => "3764",
			"+16 Attack Power" => "1589",
			"+32 Attack Power" => "1597",
			"+16 Attack Power" => "3877",
			// Strenght Bonuses
			"+2 Strength" => "2892",
			"+4 Strength" => "2927",
			"+6 Strength" => "3357",
			"+8 Strength" => "3312",
			"+10 Strength" => "4135",
			"+20 Strength" => "4136",
			"+30 Strength" => "4158",
			// Agility Bonuses
			"+2 Agility" => "3149",
			"+4 Agility" => "2877",
			"+6 Agility" => "3355",
			"+8 Agility" => "3313",
			"+10 Agility" => "2782",
			"+20 Agility" => "4133",
			"+30 Agility" => "4145",
			"+60 Agility" => "4827",
			// Stamina Bonuses
			"+4 Stamina" => "2895",
			"+6 Stamina" => "2882",
			"+8 Stamina" => "3307",
			"+12 Stamina" => "3766",
			"+15 Stamina" => "4154",
			"+30 Stamina" => "4134",
			"+40 Stamina" => "4159",
			// Intellect Bonuses
			"+4 Intellect" => "2869",
			"+6 Intellect" => "3310",
			"+8 Intellect" => "3353",
			"+10 Intellect" => "4143",
			"+20 Intellect" => "4144",
			"+30 Intellect" => "4150",
			// Spirit Bonuses
			"+4 Spirit" => "2890",
			"+6 Spirit" => "3311",
			"+8 Spirit" => "3352",
			"+10 Spirit" => "4142",
			"+20 Spirit" => "4129",
			"+30 Spirit" => "4125",
			// Resilience Bonuses
			"+4 Resilience" => "2878",
			"+6 Resilience" => "3600",
			"+8 Resilience" => "3821",
			"+10 Resilience" => "4184",
			"+20 Resilience" => "4185",
			"+30 Resilience" => "4186",
			// Need More Ratings......
		);
		if(array_key_exists($Bonus, $BonusMask))
		{
			$SocketBonus = $BonusMask[$Bonus];
		}
		else
		{
			$SocketBonus = "TO BE FILLED!!!!!!";
		}
		return $SocketBonus;
	}

	public static function PrepareData($Result)
	{
		$Data = array();
		$Data['entry'] = $Result['id'];
		$Data['class'] = $Result['itemClass'];
		$Data['subclass'] = $Result['itemSubClass'];
		$Data['SoundOverrideSubclass'] = "-1";
		$Data['name'] = addslashes($Result['name']);
		$Data['displayid'] = $Result['displayInfoId'];
		$Data['Quality'] = $Result['quality'];
		if(isset($Result['nameDescription']))
		{
			if(preg_match('[Heroic]', $Result['nameDescription']))
				$Data['Flags'] = "8";
			else
				$Data['Flags'] = "TO BE FILLED";
		}
		else
			$Data['Flags'] = "TO BE FILLED";
		$Data['FlagsExtra'] = "TO BE FILLED";
		$Data['BuyCount'] = "1";
		$Data['BuyPrice'] = $Result['buyPrice'];
		$Data['SellPrice'] = $Result['sellPrice'];
		$Data['InventoryType'] = $Result['inventoryType'];
		if(isset($Result['allowableClasses']))
			$Data['AllowableClass'] = Parser::AllowableClass($Result['allowableClasses']);
		else
			$Data['AllowableClass'] = "-1";
		if(isset($Result['allowableRaces']))
			$Data['AllowableRace'] = Parser::AllowableRace($Result['allowableRaces']);
		else
			$Data['AllowableRace'] = "-1";
		$Data['ItemLevel'] = $Result['itemLevel'];
		$Data['RequiredLevel'] = $Result['requiredLevel'];
		$Data['RequiredSkill'] = $Result['requiredSkill'];
		$Data['RequiredSkillRank'] = $Result['requiredSkillRank'];
		$Data['requiredspell'] = "0";
		$Data['requiredhonorrank'] = "0";
		$Data['RequiredCityRank'] = "0";
		$Data['RequiredReputationFaction'] = $Result['minFactionId'];
		$Data['RequiredReputationRank'] = $Result['minReputation'];
		$Data['maxcount'] = $Result['maxCount'];
		$Data['stackable'] = $Result['stackable'];
		$Data['ContainerSlots'] = $Result['containerSlots'];
		if(isset($Result['bonusStats']))
		{
			$Data['StatsCount'] = count($Result['bonusStats']);
			for($i = 1; $i <= 10; $i++)
			{
				if(isset($Result['bonusStats'][$i-1]['stat']) && isset($Result['bonusStats'][$i-1]['amount']))
				{
					$Data['stat_type'.$i] = $Result['bonusStats'][$i-1]['stat'];
					$Data['stat_value'.$i] = $Result['bonusStats'][$i-1]['amount'];
				}
				else
				{
					$Data['stat_type'.$i] = "0";
					$Data['stat_value'.$i] = "0";
				}
			}
		}
		else
		{
			$Data['StatsCount'] = "0";
		}
		$Data['ScalingStatDistribution'] = "0";
		$Data['ScalingStatValue'] = "0";
		if(isset($Result['weaponInfo']))
		{
			$Data['dmg_min1'] = round($Result['weaponInfo']['damage']['exactMin'], 2);
			$Data['dmg_max1'] = round($Result['weaponInfo']['damage']['exactMax'], 2);
			$Data['dmg_type1'] = "0";
			$Data['dmg_min2'] = "0";
			$Data['dmg_max2'] = "0";
			$Data['dmg_type2'] = "0";
		}
		else
		{
			$Data['dmg_min1'] = "0";
			$Data['dmg_max1'] = "0";
			$Data['dmg_type1'] = "0";
			$Data['dmg_min2'] = "0";
			$Data['dmg_max2'] = "0";
			$Data['dmg_type2'] = "0";
		}
		$Data['armor'] = $Result['armor'];
		$Data['holy_res'] = "0";
		$Data['fire_res'] = "0";
		$Data['nature_res'] = "0";
		$Data['frost_res'] = "0";
		$Data['shadow_res'] = "0";
		$Data['arcane_res'] = "0";
		if(isset($Result['weaponInfo']))
			$Data['delay'] = $Result['weaponInfo']['weaponSpeed']*1000;
		else
			$Data['delay'] = "0";
		if($Data['class'] == 2 && $Data['subclass'] == 2 ||  $Data['class'] == 2 && $Data['subclass'] == 18)
			$Data['ammo_type'] = "2";
		elseif($Data['class'] == 2 && $Data['subclass'] == 3)
			$Data['ammo_type'] = "3";
		else
			$Data['ammo_type'] = "0";
		if($Data['class'] == 2 && $Data['subclass'] == 2 || $Data['class'] == 2 && $Data['subclass'] == 3 || $Data['class'] == 2 && $Data['subclass'] == 18)
			$Data['RangedModRange'] = "100";
		else
			$Data['RangedModRange'] = "0";
		if(isset($Result['itemSpells']))
		{
			$ItemSpells = count($Result['itemSpells']);
			for($i = 1; $i <= 5; $i++)
			{
				if(isset($Result['itemSpells'][$i-1]))
				{
					$Data['spellid_'.$i] = $Result['itemSpells'][$i-1]['spellId'];
					$Data['spelltrigger_'.$i] = Parser::SpellTriggerType($Result['itemSpells'][$i-1]['trigger']);
					$Data['spellcharges_'.$i] = $Result['itemSpells'][$i-1]['nCharges'];
					$Data['spellppmRate_'.$i] = "1";
					$Data['spellcooldown_'.$i] = "-1";
					$Data['spellcategory_'.$i] = $Result['itemSpells'][$i-1]['categoryId'];
					$Data['spellcategorycooldown_'.$i] = "-1";
				}
				else
				{
					$Data['spellid_'.$i] = "0";
					$Data['spelltrigger_'.$i] = "1";
					$Data['spellcharges_'.$i] = "0";
					$Data['spellppmRate_'.$i] = "0";
					$Data['spellcooldown_'.$i] = "-1";
					$Data['spellcategory_'.$i] = "0";
					$Data['spellcategorycooldown_'.$i] = "-1";
				}
			}
		}
		$Data['bonding'] = $Result['itemBind'];
		$Data['description'] = addslashes($Result['description']);
		$Data['PageText'] = "0";
		$Data['LanguageID'] = "0";
		$Data['PageMaterial'] = "0";
		$Data['startquest'] = "0";
		$Data['lockid'] = "0";
		$Data['Material'] = "-1";
		$Data['sheath'] = rand(1,6);
		$Data['RandomProperty'] = "0";
		$Data['RandomSuffix'] = "0";
		$Data['block'] = "0";
		if(isset($Result['itemSet']['id']))
			$Data['itemset'] = $Result['itemSet']['id'];
		else
			$Data['itemset'] = "0";
		$Data['MaxDurability'] = $Result['maxDurability'];
		if(isset($Result['boundZone']))
			$Data['area'] = $Result['boundZone']['id'];
		else
			$Data['area'] = "0";
		$Data['Map'] = "0";
		$Data['BagFamily'] = "0";
		$Data['TotemCategory'] = "0";
		if(isset($Result['socketInfo']['sockets']))
		{
			for($i = 1; $i <= 3; $i++)
			{
				if(isset($Result['socketInfo']['sockets'][$i-1]))
				{
					$Data["socketColor_".$i] = Parser::GetSocketColor($Result['socketInfo']['sockets'][$i-1]['type']);
					$Data["socketContent_".$i] = "0";
				}
				else
				{
					$Data["socketColor_".$i] = "0";
					$Data["socketContent_".$i] = "0";
				}
			}
		}
		else
		{
			for($i = 1; $i <= 3; $i++)
			{
				$Data["socketColor_".$i] = "0";
				$Data["socketContent_".$i] = "0";
			}
		}
		if(isset($Result['socketInfo']['socketBonus']))
		{
			$Data['socketBonus'] = Parser::GetSocketBonus($Result['socketInfo']['socketBonus']);
			$Data['socketBonusText'] = $Result['socketInfo']['socketBonus'];
		}
		else
		{
			$Data['socketBonus'] = "0";
			$Data['socketBonusText'] = "No Bonus";
		}
		$Data['GemProperties'] = "0";
		if(isset($Result['disenchantingSkillRank']))
			$Data['RequiredDisenchantSkill'] = $Result['disenchantingSkillRank'];
		else
			$Data['RequiredDisenchantSkill'] = "-1";
		$Data['ArmorDamageModifier'] = "0";
		$Data['duration'] = "0";
		$Data['ItemLimitCategory'] = "0";
		$Data['HolidayId'] = "0";
		$Data['ScriptName'] = "";
		$Data['DisenchantID'] = "0";
		$Data['FoodType'] = "0";
		$Data['minMoneyLoot'] = "0";
		$Data['maxMoneyLoot'] = "0";
		$Data['flagsCustom'] = "0";
		$Data['VerifiedBuild'] = "12340";
		return $Data;
	}
}

?>
