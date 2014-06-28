{include file="Head.tpl"}
<div id='DataZone' style="float:left; width: 50%;">
<strong>Parsed Item:</strong> <a href="#" rel="item={$Data.entry}">{$Data.name}</a><br />
<textarea rows='48' cols='70' id="parseddata" readonly>
{$SQL}
</textarea>
</div>
{if isset($FinalData)}
	<div id='EditZone' style='float:right; width:40%;'>
		<h2>
			<strong>Edit SQL:</strong>
		</h2>
		<form action='/item/?parse={$FinalData.entry}&final=true' method='post'>
			<table>
				<tr><td><strong>Item ID:</strong></td><td> <input type='text' name='id' value='{$FinalData.entry}'></td><td></td></tr>
				<tr><td><strong>Display ID:</strong></td><td> <input type='text' name='displayid' value='{$FinalData.displayid}'></td><td></td></tr>
				<tr><td><strong>Flags:</strong></td><td> <input type='text' name='flags' value='{$FinalData.Flags}'></td><td></td></tr>
				<tr><td><strong>Extra Flags:</strong></td><td> <input type='text' name='eflags' value='{$FinalData.FlagsExtra}'></td><td></td></tr>
				<tr><td><strong>Socket Bonus:</strong></td><td> <input type='text' name='socketbonus' value='{$FinalData.socketBonus}'></td><td>{$FinalData.socketBonusText}</td></tr>
				<tr><td><strong>Spell 1:</strong></td><td> <input type='text' name='spell1' value='{$FinalData.spellid_1}'></td><td>{if $FinalData.spellid_1 != 0}<a href="#" rel="spell={$FinalData.spellid_1}">{$FinalData.spellid_1}</a>{/if}</td></tr>
				<tr><td><strong>Spell 2:</strong></td><td> <input type='text' name='spell2' value='{$FinalData.spellid_2}'></td><td>{if $FinalData.spellid_2 != 0}<a href="#" rel="spell={$FinalData.spellid_2}">{$FinalData.spellid_2}</a>{/if}</td></tr>
				<tr><td><strong>Spell 3:</strong></td><td> <input type='text' name='spell3' value='{$FinalData.spellid_3}'></td><td>{if $FinalData.spellid_3 != 0}<a href="#" rel="spell={$FinalData.spellid_3}">{$FinalData.spellid_3}</a>{/if}</td></tr>
				<tr><td><input type='submit' value='submit'></td><td></td></tr>
			</table>
		</form>
		<br />
		<br />
		{if $Data.itemset != 0}
			This item is part of the set <a href='/set/?parse={$Data.itemset}' target='_blank'><font color="purple">{$ISInfo.name}</font></a><br />
			<strong>You can parse these items:</strong><br />
			{foreach from=$ISInfo.items item=Set}
				<a href="/item/?parse={$Set}" rel="item={$Set}" target="_blank">{$Set}</a><br />
			{/foreach}
			<font color="red">We recommend to parse all set items first!</font>
		{/if}
	</div>
{/if}
{include file="Footer.tpl"}