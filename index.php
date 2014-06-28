<?php
require_once('Core/Core.php');

if(isset($_REQUEST['type']))
{
	$Query = $_SERVER['QUERY_STRING'];
	$Smarty->assign('Query', $Query);
	switch($_REQUEST['type'])
	{
		case 'item':
			if(isset($_REQUEST['parse']))
			{
				$ItemInfo = Parser::GetItemInfo($_REQUEST['parse']);
				if($ItemInfo)
				{
					$Data = Parser::PrepareData($ItemInfo);
					$Smarty->assign('Data', $Data);
				}
				if(isset($_REQUEST['final']))
				{
					$ItemInfo = Parser::GetItemInfo($_REQUEST['parse']);
					if($ItemInfo)
					{
						$Data = Parser::PrepareData($ItemInfo);
						$FinalArray = array('entry' => $_POST['id'], 'displayid' => $_POST['displayid'], 'Flags' => $_POST['flags'], 'FlagsExtra' => $_POST['eflags'], 'socketBonus' => $_POST['socketbonus'], 'spellid_1' => $_POST['spell1'], 'spellid_2' => $_POST['spell2'], 'spellid_3' => $_POST['spell3']);
						foreach(array_keys($FinalArray) as $key)
						{
							unset($Data[$key]);
						}
						$FinalData = array_merge($FinalArray, $Data);
						$Smarty->assign('SQL', Parser::PrepareSQL($FinalData));
						$Smarty->assign('FinalData', $FinalData);
					}
					else
						echo "Item Not Found!";
				}
				else
				{
					$ItemInfo = Parser::GetItemInfo($_REQUEST['parse']);
					if($ItemInfo)
					{
						$Data = Parser::PrepareData($ItemInfo);
						if($Data['itemset'] != 0)
							$Smarty->assign('ISInfo', Parser::GetSetInfo($Data['itemset']));
						$Smarty->assign('FinalData', $Data);
						$Smarty->assign('SQL', Parser::PrepareSQL($Data));
					}
					else
						echo "Item Not Found!";
				}
				$Smarty->display('ParsedItem.tpl');
			}
			else
				$Smarty->display('ItemParser.tpl');
		break;

		case 'set':
			if(isset($_REQUEST['parse']))
			{
				$SetInfo = Parser::GetSetInfo($_REQUEST['parse']);
				$Smarty->assign('Set', $SetInfo);
				$Smarty->assign('INDB', Parser::IFSet($_REQUEST['parse']));
				$Smarty->assign('SQL', Parser::ISNSQL($SetInfo));
				$Smarty->display('ParsedSet.tpl');
			}
			else
				$Smarty->display('SetParser.tpl');
		break;

		case 'spell':
			$Smarty->display('SpellParser.tpl');
		break;
	}
}
else
{
	$Smarty->display('Main.tpl');
}
?>