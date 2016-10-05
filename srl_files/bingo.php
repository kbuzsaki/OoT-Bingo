<!doctype html>
<html>
<head>
	<!-- Title -->
	<title>Ocarina of Time Bingo - SpeedRunsLive</title>
	
	<!-- Meta -->
	<meta name="description" content="Generates 'Bingo' boards for Zelda: Ocarina of Time" />
	<meta name="keywords" content="oot bingo, zelda bingo" />

	<?php include($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>

	<!-- get seed random, the bingo script, and this game's item list -->
	<script src="/scripts/seedrandom-min.js" type="text/javascript"></script>
	<script src="generator_v9.1.js" type="text/javascript"></script> <!--custom generator for OoT-->
	<script src="goallist_v9.1.js" type="text/javascript"></script>
	<script src="querystring.js" type="text/javascript"></script>
	<script src="bingosetup.js" type="text/javascript"></script>

	<div id="bingoPage">
		<div id="about_bingo">
			<h1>Ocarina of Time Bingo</h1>
			
			<div id="newcards">
				<?php echo ('<a class="newcard" href="?seed='.mt_rand(0, 999999).'">Normal card</a>'); ?>
				<?php echo ('<a class="newcard" href="?seed='.mt_rand(0, 999999).'&mode=short">Short card</a>'); ?>
				<!--<?php echo ('<a class="newcard" href="?seed='.mt_rand(0, 999999).'&mode=long">Long card</a>'); ?>-->
				<?php echo ('<a class="newcard" href="?seed='.mt_rand(0, 999999).'&mode=blackout">Blackout card</a>'); ?>
			</div>
			<div style="clear:both;"></div>
			
			<h1>About</h1>
			
			<p>This is a "Bingo" board for Ocarina of Time races.</p>
			<p>To win, you must complete 5 of the tasks in a row horizontally, vertically, or diagonally.</p>
			<p>The seed number is used to generate the board. Changing the seed will make a new board.</p>
			<p>You can click on the squares to turn them green and red. This may help you organize your route planning.</p>
			<p>For OoT-Bingo, there are some specific rules in place:</p>
			
			<ul>
			<li>Banned Tricks for Bingo: "Using Stick on B as Adult", "Get Item Manipulation (GIM)", and ""Hold R to obtain Early Eyeball Frog".</li>
			<li>Item specific explainations:<br> "At least 1 skulltula from each dungeon": Only dungeons with blue warps are required. <br>
				"X Songs": Scarecrow's Song does not count.<br>"Frog's HP": You only need to get one of the frog's HPs.<br>"5 Zora Area HPs": Ice Cavern and Jabu Jabu does not count.
</li>
			<li>If it says to have an item, you must actually keep it. For example, if it says to have "Blue Potion," you 
			must not drink it, and you must still have it in your inventory at the time you finish getting all 5 objectives.
			</li>
			<li>Sometimes there is a question of when to say you are finished. For dungeons, you are "finished" with the dungeon when you step into the blue warp after defeating the boss. For items, you are "finished" when you are holding the item above your head. For songs, when the text says "You have learned the..."</li>
			<li>For collection goals such as "8 hearts", "5 songs", "3 unused keys", etc, you are allowed to exceed the required amount.
			</ul>
			 
			<p class="note">GENERATOR: Originally written and designed by Narcissa. Improved by Giuocob. v9 redesign by Saltor.<br>
			GOAL LIST: Original goal list by Narcissa. Rebalanced by the #zelda community with analysis by Gombill, Runnerguy2489, and Zamiel. v9 data collection and coordination by Gombill. Goal timing by Exodus, SnipinG117, Moose1137, Runnerguy2489, and the #zelda community.</p>
		</div>

		<div id="results">

			<table id="bingo">
			<tr>
			<td class="popout" id="tlbr">TL-BR</td>
			<td class="popout" id="col1">COL1</td>
			<td class="popout" id="col2">COL2</td>
			<td class="popout" id="col3">COL3</td>
			<td class="popout" id="col4">COL4</td>
			<td class="popout" id="col5">COL5</td>
			</tr>
			<tr>
			<td class="popout" id="row1">ROW1</td>
			<td class="row1 col1 tlbr" id="slot1"></td> 
			<td class="row1 col2" id="slot2"></td> 
			<td class="row1 col3" id="slot3"></td> 
			<td class="row1 col4" id="slot4"></td> 
			<td class="row1 col5 bltr" id="slot5"></td> 
			</tr><tr> 
			<td class="popout" id="row2">ROW2</td>
			<td class="row2 col1" id="slot6"></td> 
			<td class="row2 col2 tlbr" id="slot7"></td> 
			<td class="row2 col3" id="slot8"></td> 
			<td class="row2 col4 bltr" id="slot9"></td> 
			<td class="row2 col5" id="slot10"></td> 
			</tr><tr> 
			<td class="popout" id="row3">ROW3</td>
			<td class="row3 col1" id="slot11"></td> 
			<td class="row3 col2" id="slot12"></td> 
			<td class="row3 col3 tlbr bltr" id="slot13"></td> 
			<td class="row3 col4" id="slot14"></td> 
			<td class="row3 col5" id="slot15"></td> 
			</tr><tr> 
			<td class="popout" id="row4">ROW4</td>
			<td class="row4 col1" id="slot16"></td> 
			<td class="row4 col2 bltr" id="slot17"></td> 
			<td class="row4 col3" id="slot18"></td> 
			<td class="row4 col4 tlbr" id="slot19"></td> 
			<td class="row4 col5" id="slot20"></td> 
			</tr><tr> 
			<td class="popout" id="row5">ROW5</td>
			<td class="row5 col1 bltr" id="slot21"></td> 
			<td class="row5 col2" id="slot22"></td> 
			<td class="row5 col3" id="slot23"></td> 
			<td class="row5 col4" id="slot24"></td> 
			<td class="row5 col5 tlbr" id="slot25"></td> 
			</tr>
			<tr>
			<td class="popout" id="bltr">BL-TR</td></tr>
			</table>

			<?php // remove lang from the current url
			$lang_url = preg_replace('/&lang=[a-z]+/', '', $_SERVER['REQUEST_URI']);
			// this produces a suck url if lang is the first option, but i lazy
			?>

			<a href="<?php echo $lang_url ?>"><img src="http://cdn.speedrunslive.com/images/flags/United_States_of_America.png" alt="English" /></a>&emsp;<a href="<?php echo $lang_url ?>&lang=jp"><img src="http://cdn.speedrunslive.com/images/flags/Japan.png" alt="Japanese" /></a>

		</div>
	</div>

	<?php include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>