<html>
<head>
  <meta charset="UTF-8">
  <title>The Dice Coalition Team Builder</title>
  <meta name="description" content="Dice Masters Team Builder, Database and Card Search Utility">
  <!--favicons-->
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="/css/general.css">
  <link rel="stylesheet" href="/css/theme.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, user-scalable=yes">
  <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs" data-app-key="7ig431nnv3z3xpr"></script>
  <script src="https://dicecoalition.com/js/w3.js"></script>
	
	<?php
 	
 		require ('cards.php');
 	
 	?>
 	
  <style>
    a:hover {color:#d9b310!important;}
    .tab:hover{color:#d9b310!important;}
    body { font-family: 'Arial'; font-size: 1em; background: #ebebeb; }
    table.savedteams { border-collapse:collapse; width:50%; table-layout: auto; margin:0px auto;}
    table.savedteams th { border:1px solid white; padding:1px; margin:0px; background: gray; }
    table.savedteams td { border:1px solid white; padding:1px; margin:0px; background: #ebebeb; }
    table.savedteams tr:hover td { background: lightgreen; }
    table.savedteams td:nth-child(1) { text-align:center; width: 65px;}
    table.savedteams td:nth-last-child(1) { text-align:center; width: 35px;}
    table.m { border-collapse:collapse; width:100%; table-layout: auto;}
    table.m td { border-top: 1px solid #1d2731; border-bottom:1px solid #1d2731; padding:1px; margin:0px; vertical-align:top;}
    table.m tr:hover td { background: #d9b310; color: #1d2731}
    table.s tr td:hover { background: #328CC1 !important; cursor: pointer; }
    table.m td:nth-child(1) { text-align:center; width: 28px;}
    table.m td:nth-child(2) { text-align:center; width: 28px;}
    table.m td:nth-child(3) { text-align:center; width: 32px;}
    table.m td:nth-child(4) { text-align:center; width: 32px;}
    table.m td:nth-child(5) { text-align:center; width: 32px;}
    table.m td:nth-child(6) { text-align:center; width: 4px;}
    table.m td:nth-child(7) { text-align:right; width: 50px;}
    table.m td:nth-child(8) { width: 20%; font-size: 1em; }
    table.m td:nth-child(9) { text-align:right; width: 20px;}
    table.m td:nth-child(10) { text-align:center; width: 24px;}
    table.m td:nth-child(11) { text-align:center; width: 24px;}
    table.m td:nth-child(12) { text-align:center; width: 16px;}
    table.m td:nth-child(13) { text-align:center; width: 4px;}
    table.m td:nth-child(14) { font-size: 1em; }
    table.m td:nth-child(15) { text-align:center; width: 72px;}
    table.m button {font-family: monospace;font-size: 1em;}
    table.m table.inline3 { 
        border: 1px solid black;
        background: #ebebeb;
        font-family: monospace;
        display: inline-table;
        border-collapse: collapse;
        line-height: 100%;
        font-size: .7em;
        margin: 0px 2px;
        padding: 0px;
     }
    small { font-size: xx-small; }
    table.m table.inline3 td:nth-child(1) { border:0px solid white; padding:0px; margin:0px; background: #328cc1; color:white; width: 50%; text-align:left; padding-right:2px; }
    table.m table.inline3 td:nth-child(2) { border:0px solid white; padding:0px; margin:0px; background: #328cc1; color:white; width: 50%; text-align:right; padding-left:2px; }
    table.m tr td.r0, .r0 { background: gray; }
    table.m tr td.r1, .r1 { background: gray; }
    table.m tr td.r2, .r2 { background: green; }
    table.m tr td.r3, .r3 { background: yellow; }
    table.m tr td.r4, .r4 { background: red; }
    table.m tr td.r5, .r5 { background: blue; }
    table.m tr td.s2 { background: #77dd77; }
    table.m tr td.s3 { background: #fdfd96; }
    table.m tr td.s4 {  }
    table.m tr td img { vertical-align: 0%; }
    input#filt0 { width: 32px; }
    input#filt1 { width: 300px; }
    div.tt { position: absolute; background: white; border: 1px solid black; display: none; z-index:1; }
    table.s td:hover>div.tt { display: block; }
    p:nth-child(1) { margin:0; }
    p { margin:.3em 0 0 0; }
    p.global { color: darkred; }
    div.d { text-align:center; padding: 3px; font-size: small; }
    div.dnd { float:left; width:16px; padding-right:5px; }
    span.flip { display: inline-block; transform: scaleX(-1); filter: FlipH; }
    .mm td.edit { display: none; }
    .mm.edit td.edit { display: table-cell; }
    .mm td.team { display: none; }
    .mm.team td.team { display: table-cell; }
    .mm td.collection { display: none; }
    .mm.collection td.collection { display: table-cell; }
    @media (max-width:450px) {
      table.m td.extra { display: none; }
      table.m td:nth-child(8) { width: auto; }
    }
    .hide { display: none !important; }
    div.divider { background: #0b3c5d; width: 100%; height:20px; margin: 10px 0; padding: 0;}
    span.search_category { display: inline-block; background:#bbbbbb; margin: 2px; padding: 2px; }
    button.inc, button.dec, .button { display: inline-block; background: #0b3c5d; border-radius: 1px; color: white; cursor: pointer; padding: 4px; margin: 1px; text-decoration: none; }
    .hide.button { display: none; }
    .button:hover { color:#d9b310; }
    .button:visited { color: white; }
    .button_file { position: relative; }
    .button_file input { position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; cursor: pointer; opacity: 0;}
    .cardpreview { border: 2px solid black; border-radius: 3.5%/2.5%; position: absolute; top:0px; left: 0px; }
    .cardimage { display: inline-block; margin: 0px; padding: 0px;}
    .cardimage div.cardimagebox { overflow: hidden; border: 1px solid black; border-radius: 3.5%/2.5%; display: inline-block; width: 175px; height: 245px; font-family: "serif"; text-align: center; position: relative; background-color: black; }
	.cardimage div.cardimageboxflip { overflow: hidden; border: 1px solid black; border-radius: 3.5%/2.5%; display: inline-block; width: 350px; height: 245px; font-family: "serif"; text-align: center; position: relative; background-color: black; }
    .cardimage div.im_title .im_main { font-size: 14px; }
    .cardimage div.im_title .im_sub { font-size: 10px; }
    .cardimage div.im_title { position: absolute; top: 2%; right: 1%; width: 78%; color:white; }
    .cardimage div.im_costbg { position: absolute; background-color: white; width: 22%; height: 16% }
    .cardimage div.im_cost { font-family: Arial,"sans-serif"; font-weight: bolder; font-size: 22px; position: absolute; top: 1%; left: 4%; }
    .cardimage div.im_energy img { width: 25px; position: absolute; top: 4%; left: 6%; opacity: .5; border: 1.5px solid black; border-radius: 50%; }
    .cardimage div.im_aff img { width: 21px; position: absolute; top: 12%; left: 3%; }
    .cardimage div.im_text { width: 95%; bottom: 16%; position: absolute; color:black; background-color:white; font-size: 9px; padding: 3px 2.5%; text-align: left; }
    .cardimage div.im_text img { height: 10px; vertical-align: -20%}
    .cardimage div.im_rarity { width: 100%; height: 1%; position: absolute; top: 84%; }
    .cardimage img.ci_img { position: absolute; width: 175px; height: 245px; left: 0; top: 0; }
	.cardimage img.ci_imgflip { position: absolute; width: 350px; height: 245px; left: 0; top: 0; }
    .cardimage td.edit { width: 30px; }
    hr { color: white; }
    @font-face { font-family: "Doop"; src: url(roswreck.ttf); }
    .doop { font-family: "Doop", Arial; }
	.bac { background: #BBBBBB}
  </style>
</head>
<body style="margin:0; padding:0; background-color:#ebebebe;">
 <!--Navbar-->
  <!--<div w3-include-html="topbar.html"></div>-->
  <div>
   <?php include '/home/users/web/b2072/ipg.dicecoalitioncom/topbar.html';?>
  </div>
  <!--teambuilder code resumes-->
  <div style="background-color:#0b3c5d; color:white;">
  <div style="margin: 38.4px"></div>
  <span class="show_mode1 show_mode2 show_mode3 hide tab" style="cursor:pointer; margin:0 4px; background-color:#0b3c5d; color:white;" onclick="setmode(0)">Search</span>
  <span class="show_mode0 hide" style="margin:0 4px; background-color:#0b3c5d; color:#d9b310;">Search</span>
  <span class="show_mode0 show_mode2 show_mode3 hide tab" style="cursor:pointer; margin:0 4px; background-color:#0b3c5d; color:white;" onclick="setmode(1)">Edit Team</span>
  <span class="show_mode1 hide" style="margin:0 4px; background-color:#0b3c5d; color:#d9b310;">Edit Team</span>
  <span class="show_mode0 show_mode1 show_mode3 hide tab" style="cursor:pointer; margin:0 4px; background-color:#0b3c5d; color:white;" onclick="setmode(2)">View Team</span>
  <span class="show_mode2 hide" style="margin:0 4px; background-color:#0b3c5d; color:#d9b310;">View Team</span>
  <!--<span class="show_mode0 show_mode1 show_mode2 hide" style="cursor:pointer; margin:0 4px; background-color:gray; color:white;" onclick="setmode(3)">My Collection</span>-->
  <!--<span class="show_mode3 hide" style="margin:0 4px; background-color:white; color:black;">My Collection</span>-->
  <span style="float:right;cursor:pointer; margin: 0 4px;background-color:#0b3c5d; color:white"><a style="text-decoration:none;color:white" href="mailto:thedicecoalition@gmail.com" target="_blank">Contact</a></span>
  </div>
  <div style="margin:4px;">
  <span class="show_nonempty hide">
    <span class="show_mode1 hide"><span class="button" onclick="clearteam()">Clear Team</span><br></span>
    <span class="show_mode1 show_mode2 hide">
      <span class="button show_teamlist" onclick="teamdisplaymode(1)">Show as images</span>
      <span class="button show_teampic hide" onclick="teamdisplaymode(0)">Show as a list</span>
      <span id="teamstatus"></span>
      <span class="show_mode1 hide"><span class="show_teamlist hide"><table class="m mm s">
  <tr>
  <td class="edit"></td><td class="edit"></td><td class="team"></td><td class="collection"></td><td class="collection"></td><td></td>
  <td id="teamsort1">&nbsp;<div class="tt">Sort by Card #</div></td>
  <td id="teamsort2">&nbsp;<div class="tt">Sort by Card Name</div></td>
  <td id="teamsort3">&nbsp;<div class="tt">Sort by Cost</div></td>
  <td id="teamsort4">&nbsp;<div class="tt">Sort by Energy Type</div></td>
  <td id="teamsort5">&nbsp;<div class="tt">Sort by Affiliation</div></td>
  <td id="teamsort6">&nbsp;<div class="tt">Sort by Max dice</div></td>
  <td id="teamsort7">&nbsp;<div class="tt">Sort by Rarity</div></td>
  <td class="extra" id="teamsort8">&nbsp;<div class="tt">Sort by D&amp;D Alignment</div></td>
  <td class="extra"></td>
  </tr>
      </table></span></span>
      <table class="m mm show_teamlist" id="team">
      </table>
      <div id="teampic" class="mm show_teampic hide"></div>
    </span>
    <span class="show_mode2 hide">
      <br>
      <span style="display:none">
      <a id="visual_team_link" class="button" target="_blank">Team Display</a>
      </span>
      <span class="button" onclick="save_team()">Save this team</span> Link to this team: <a id="teamlink" href=""></a><br>
      <span class="button" onclick="print_team_sheet()">Print Tournament Team Sheet</span><br>	
      
      <span style="display:none">
      <span>TRP forum codes - <span id="trpcodes"></span></span>
      <br><span class="button button_file">Import DiceMastersDB Teams<input type="file" id="import_dmdb_teams" onchange="import_dmdb_teams_changed()"/></span>
      </span>
    </span>	
  </span>
  <span class="show_mode2">
		<span id="dboxSave" class="button" onclick="dropbox_save()">Connect to Dropbox</span>	
	</span>
	<span class="show_mode2">
		<span id="textSave" class="button" onclick="text_save()">Save to text</span><br>	 
			
		<span id="textLoad" >Load from text file: <input type="file" name="file" id="file"></span></br>
	</span>
  <span class="show_empty hide"><span class="show_mode1 show_mode2 hide">Click on '+' in the result table to add cards to the team.<br></span></span>
  <span class="show_mode1 hide">
    <br><span class="button show_addrandom hide" onclick="add_random()">+ Random</span>
    <span class="button show_addrandombac hide" onclick="add_random_bac()">+ Random Basic Action</span>
	 <input type="checkbox" id="teamlimits" onclick="filter()">Disable team limits</input>
  </span>
  <span class="show_mode3 hide">
  <span id="collection_status"></span><br>
  Editing mode: <select id="edit_mode" onchange="set_edit_mode(this.value)">
    <option value="3">Owned Cards with Dice</option>
    <option value="1">Owned Cards</option>
    <option value="2">Owned Dice</option>
    <option value="4">Wanted Cards</option>
    <option value="8">Wanted Dice</option>
  </select><br>
    All selected: <span class="button" onclick="click_plus_all()"> +1</span>
    <span class="button" onclick="click_minus_all()"> -1 </span>
    <span class="button" onclick="click_clear_all()">Clear</span>
    <span class="show_editdice hide"><span class="button" onclick="click_max_all()">Set to Max Dice</span></span>
    <span style="float:right;">
      <a class="button" id="export_collection" download="dm_collection.txt">Export Collection</a>
      <!-- <a class="button" id="export_trades" download="dm_trades.txt">My Trade List</a> -->
      <span class="button button_file">Import Collection<input type="file" id="import_collection" onchange="import_collection_changed()"/><span>
    </span>
  </span>
  </div>
  <span class="show_mode1 show_mode3 hide">
  <div class="divider"></div>
  </span>
  <div style="margin:4px;">
  <span class="show_mode0 show_mode1 show_mode3 hide">
  <div style="background-color:#bbbbbb;">
  <span class="search_category">
  <input type="checkbox" id="set0" title="Avengers Vs X-men" checked>AvX
  <input type="checkbox" id="set1" title="Uncanny X-Men" checked>UXM
  <input type="checkbox" id="set5" title="Age of Ultron" checked>AoU
  <input type="checkbox" id="set7" title="Amazing Spider-man" checked>ASM
  <input type="checkbox" id="set11" title="Civil War" checked>CW
  <input type="checkbox" id="set13" title="Dr. Strange" checked>DrS
  <input type="checkbox" id="set14" title="Deadpool" checked>DP
  <input type="checkbox" id="set16" title="Iron Man and War Machine" checked>IMW
  <input type="checkbox" id="set18" title="Defenders" checked>Def
  <input type="checkbox" id="set20" title="Spider-man Maximum Carnage" checked>SMC
  <input type="checkbox" id="set21" title="Guardians of the Galaxy" checked>GotG
  <input type="checkbox" id="set22" title="X-men First Class" checked>XFC
  <input type="checkbox" id="set24" title="The Mighty Thor" checked>Thor
  <input type="checkbox" id="set25" title="Avengers Infinity" checked>AI
  <input type="checkbox" id="set26" title="Kree Invasion" checked>KI
  <input type="checkbox" id="set27" title="Justice, Like Lightning" checked>JLL
  <input type="checkbox" id="set35" title="X-men Forever" checked>XMF
  <input type="checkbox" id="set36" title="Uncanny X-Force" checked>XFO
  <input type="checkbox" id="set37" title="Dark X-men" checked>DXM
  <input type="checkbox" id="set44" title="Avengers Infinity Gauntlet" checked>IG
  <input type="checkbox" id="set45" title="Dark Phoenix Saga" checked>DPS
  <input type="checkbox" id="set47" title="Marvel Secret Wars" >MSW
  <input type="checkbox" id="set4" title="Justice League" checked>JL
  <input type="checkbox" id="set6" title="War of Light" checked>WoL
  <input type="checkbox" id="set9" title="World's Finest" checked>WF
  <input type="checkbox" id="set12" title="Green Arrow and The Flash" checked>GAF
  <input type="checkbox" id="set17" title="Batman" checked>BAT
  <input type="checkbox" id="set19" title="Superman Wonder Woman" checked>SWW
  <input type="checkbox" id="set28" title="Harley Quinn" checked>HQ 
  <input type="checkbox" id="set32" title="Justice" checked>JUS
  <input type="checkbox" id="set33" title="Doom Patrol" checked>DOOM 
  <input type="checkbox" id="set34" title="Mystics" checked>MYST
  <input type="checkbox" id="set46" title="Superman Kryptonite Crisis" checked>SKC   
  <input type="checkbox" id="set2" title="Battle for Faerun" checked>BFF
  <input type="checkbox" id="set8" title="Faerun Under Siege" checked>FUS
  <input type="checkbox" id="set23" title="Tomb of Annihilation" checked>TOA
  <input type="checkbox" id="set38" title="Trouble in Waterdeep" checked>TIW
  <input type="checkbox" id="set39" title="Adventures in Waterdeep" checked>AIW
  <input type="checkbox" id="set40" title="The Zhentarim" checked>ZHN
  <input type="checkbox" id="set10" title="Teenage Mutant Ninja Turtles" checked>TMNT
  <input type="checkbox" id="set15" title="Heroes In a Half Shell" checked>HHS
  <input type="checkbox" id="set3" title="Yu-Gi-Oh!" checked>YGO
  <input type="checkbox" id="set29" title="Battle For Ultramar" checked>BFU 
  <input type="checkbox" id="set30" title="Orks" checked>ORK 
  <input type="checkbox" id="set31" title="Space Wolves" checked>SW 
  <input type="checkbox" id="set41" title="WWE" checked>WWE
  <input type="checkbox" id="set42" title="Bitter Rivals" checked>BIT
  <input type="checkbox" id="set43" title="Tag Teams" checked>TAG



 
    
   <button id="setall" type="button">All</button>
   <button id="setmarvel" type="button">Marvel</button>
   <button id="setdc" type="button">DC</button>
   <button id="setdnd" type="button">D&amp;D</button>
  <button id="setnone" type="button">None</button>
  </span>
  <br>
  <span class="search_category">
  <span id="search_type_off">
  <button onclick="document.getElementById('search_type_off').style.display='none';document.getElementById('search_type_on').style.display='block';filter()">Type</button>
  </span>
  <span id="search_type_on" style="display:none">
  <button onclick="document.getElementById('search_type_off').style.display='block';document.getElementById('search_type_on').style.display='none';filter()">X</button>
  <input type="checkbox" id="type0">Characters
  <input type="checkbox" id="type1">Actions
  <input type="checkbox" id="type2">Basic Actions
  </span>
  </span><span class="search_category">
  <span id="search_energy_off">
  <button onclick="document.getElementById('search_energy_off').style.display='none';document.getElementById('search_energy_on').style.display='block';filter()">Energy</button>
  </span>
  <span id="search_energy_on" style="display:none">
  <button onclick="document.getElementById('search_energy_off').style.display='block';document.getElementById('search_energy_on').style.display='none';filter()">X</button>
  <input type="checkbox" id="energy0">Generic
  <input type="checkbox" id="energy1"><img src="e1.png">
  <input type="checkbox" id="energy2"><img src="e2.png">
  <input type="checkbox" id="energy3"><img src="e3.png">
  <input type="checkbox" id="energy4"><img src="e4.png">
  </span>
  </span><span class="search_category">
  <span id="search_rarity_off">
  <button onclick="document.getElementById('search_rarity_off').style.display='none';document.getElementById('search_rarity_on').style.display='block';filter()">Rarity</button>
  </span>
  <span id="search_rarity_on" style="display:none">
  <button onclick="document.getElementById('search_rarity_off').style.display='block';document.getElementById('search_rarity_on').style.display='none';filter()">X</button>
  <input type="checkbox" id="rarity0">Starter
  <input type="checkbox" id="rarity1">C
  <input type="checkbox" id="rarity2">U
  <input type="checkbox" id="rarity3">R
  <input type="checkbox" id="rarity4">SR
  <input type="checkbox" id="rarity5">Promo
  </span>
  </span><span class="search_category">
  Cost:
  <select id="cost_min">
    <option value="0" selected>0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
  </select> - <select id="cost_max">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
	<option value="11">11</option>
	<option value="12" selected>12</option>
  </select>
  </span><span class="search_category">
  <span id="search_gender_off">
  <button onclick="document.getElementById('search_gender_off').style.display='none';document.getElementById('search_gender_on').style.display='block';filter()">Gender</button>
  </span>
  <span id="search_gender_on" style="display:none">
  <button onclick="document.getElementById('search_gender_off').style.display='block';document.getElementById('search_gender_on').style.display='none';filter()">X</button>
  <input type="checkbox" id="gender0">♂
  <input type="checkbox" id="gender1">♀
  <input type="checkbox" id="gender2">⚲
  </span>
  </span><span class="search_category">
  <span id="search_affiliation_off">
  <button onclick="document.getElementById('search_affiliation_off').style.display='none';document.getElementById('search_affiliation_on').style.display='block';filter()">Affiliation</button>
  </span>
  <span id="search_affiliation_on" style="display:none">
  <button onclick="document.getElementById('search_affiliation_off').style.display='block';document.getElementById('search_affiliation_on').style.display='none';filter()">X</button>
  <span id="search_aff"></span>
  </span>
  </span>
  <span class="search_category" style="display:none">
    <select id="incollection">
     <option value="">Collection status</option>
     <option value="C">In collection</option>
     <option value="N">Not in Collection</option>
     <option value="W">Want in Trade</option>
     <option value="H">Have for Trade</option>
    </select>
  </span>
  <span class="search_category">
  <select id="informat">
   <option value="">No Format</option>
   <option value="G">Golden Era</option>
   <option value="K">Silver Age</option>
   <option value="M">Modern Era</option>   
   <option value="P">Global Escalation</option>
<!--    <option value="K">Two Team Takedown Legacy</option> -->
   <option value="N">Dice Fight Legacy</option>
   <option value="T">Two Team Take Down</option>
  </select>
  </span>  
  </div>
  Search operators: &=AND ~=NOT ^=Starts With
  <br>
  <input id="filt0" type="text" placeholder="#">
  <input id="filt1" type="text" placeholder="Filter name">
  <input id="filt2" type="text" placeholder="Filter text">
  <button id="clear" type="button">Clear</button>
  <button id="showlink" type="button">Show Search Link</button> <span id="linkloc"></span>
  <br>
  <span id="count">0</span> card(s) selected.
  <br>
  <table class="s m mm">
  <tr>
  <td class="edit">&nbsp;</td>
  <td class="edit">&nbsp;</td>
  <td class="team">&nbsp;</td>
  <td class="collection">🂠</td>
  <td class="collection">⚄</td>
  <td></td>
  <td id="sort1"><span id="sorti1">&#9660;</span><div class="tt">Sort by Card #</div></td>
  <td id="sort2"><span id="sorti2">&nbsp;</span><div class="tt">Sort by Card Name</div></td>
  <td id="sort3"><span id="sorti3">&nbsp;</span><div class="tt">Sort by Cost</div></td>
  <td id="sort4"><span id="sorti4">&nbsp;</span><div class="tt">Sort by Energy Type</div></td>
  <td id="sort5"><span id="sorti5">&nbsp;</span><div class="tt">Sort by Affiliation</div></td>
  <td id="sort6"><span id="sorti6">&nbsp;</span><div class="tt">Sort by Max dice</div></td>
  <td id="sort7"><span id="sorti7">&nbsp;</span><div class="tt">Sort by Rarity</div></td>
  <td class="extra" id="sort8"><span id="sorti8">&nbsp;</span><div class="tt">Sort by D&amp;D Alignment</div></td>
  <td class="extra">
  <table class="s inline3 show_tdm0"><tr><td id="sort9"><span id="sorti9">&nbsp;</span></td><td id="sort10"><span id="sorti10">&nbsp;</span></td></tr><tr><td id="sort11"><span id="sorti11">&nbsp;</span></td><td id="sort12"><span id="sorti12">&nbsp;</span></td></tr></table><table class="inline3 show_tdm0"><tr><td id="sort13"><span id="sorti13">&nbsp;</span></td><td id="sort14"><span id="sorti14">&nbsp;</span></td></tr><tr><td id="sort15"><span id="sorti15">&nbsp;</span></td><td id="sort16"><span id="sorti16">&nbsp;</span></td></tr></table><table class="inline3 show_tdm0"><tr><td id="sort17"><span id="sorti17">&nbsp;</span></td><td id="sort18"><span id="sorti18">&nbsp;</span></td></tr><tr><td id="sort19"><span id="sorti19">&nbsp;</span></td><td id="sort20"><span id="sorti20">&nbsp;</span></td></tr></table>
  <table class="inline3 show_tdm1 hide"><tr><td id="sort21"><span id="sorti21">&nbsp;</span></td><td id="sort22"><span id="sorti22">&nbsp;</span></td></tr><tr><td><span>&nbsp;</span></td><td id="sort23"><span id="sorti23">&nbsp;</span></td></tr></table>
  </td>
  </tr>
  </table>
  <table class="m mm" id="main">
  </table>
  </span>
  <span class="show_mode2 hide">
  <table class="savedteams" id="savedteams">
  </table>
  </span>
  <div class="d">
   Teambuilder originally hosted on dm.retrobox.com and built by Nutki. Lots of thanks to him! The information on this website is copyrighted by NECA/WizKids LLC. This website is not affiliated with nor endorsed by NECA/WizKids LLC.
  </div>
  </div>
  <img id="cardpreview" class="cardpreview show_cardpreview hide" src="http://www.dicecoalition.com/cardservice/Cards/AVX/48large.jpg">
  <script>
  //navbar
  "use strict";
  w3.includeHTML();
  
  var accessParams = [];
  
  

  if (location.protocol === 'https:' && location.href.includes('access_token')) {
	 var accessToken = /access_token=([^&]+)/.exec(location.href)[1];
	 var accountId = /account_id=([^&]+)/.exec(location.href)[1];
	 var state = /state=([^&]+)/.exec(location.href)[1];

	 localStorage.dboxAccessToken = accessToken;
	 localStorage.dboxAccountId = accountId;
	 
	 state = atob(state);
	 //needs to be run twice for some reason
	 state = decodeURIComponent(state);
	 localStorage.current_team = state;
  }
	  
  if(location.protocol === 'https:' && "dboxAccessToken" in localStorage){
	  //document.getElementById("dboxSave").innerHTML = "Save To Dropbox";
	  document.getElementById("dboxSave").style.display = 'none';
	  dropbox_load();
  }

  function E(t) { return document.getElementById(t); }
  function C(t) { return document.getElementsByClassName(t); }
  
  var marvelsets = [0,1,5,7,11,13,14,16,18,20,21,22,24,25,26,27,35,36,37,44,45,47]; 
  var dcsets = [4,6,9,12,17,19,28,32,33,34,46];
  var dndsets =[2,8,23,38,39,40];
  var entityMap = {"&": "&amp;","<": "&lt;",">": "&gt;",'"': '&quot;',"'": '&#39;',"/": '&#x2F;'};
  function escapeHtml(x) {
      return x.replace(/[&<>"'\/]/g, function(s){return entityMap[s]});
  }
  var saved_teams = [];
  var team = [];
  var team_num = {};
  var team_name = "Unnamed";
  var team_search = [];
  
  var collection_num_string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXWZ';
  var MAXCOLNUM = collection_num_string.length - 1;
  var collection_sub_table = function (t) {
    this.tab = [];
    if (t !== undefined) {
      for(var i = 0; i < t.length; i++) {
        var v = collection_num_string.indexOf(t[i]);
        if (v > 0) this.tab[i+1] = v;
      }
    }
  };
  collection_sub_table.prototype = {
  get: function(nr) { return this.tab[nr]||0 },
  set: function(nr, val) {
    if (val < 0) val = 0;
    if (val > MAXCOLNUM) val = MAXCOLNUM;
    if (val !== 0 || nr < this.tab.length) this.tab[nr] = val;
    if (!val) {
      var i = this.tab.length;
      while (i > 0 && !this.tab[i-1]) i--;
      this.tab.length = i;
    }
  },
  inc: function(nr) { this.set(nr, this.get(nr) + 1); },
  dec: function(nr) { this.set(nr, this.get(nr) - 1); },
  total: function() { var t = 0; for (var i = 0; i < this.tab.length; i++) t += this.get(i); return t; },
  maxedtotal: function(m) { var t = 0; for (var i = 0; i < this.tab.length; i++) { var c = this.get(i); var l = m.get(i); t += c>l?l:c; } return t; },
  stringify: function () {
    var a = [];
    for (var i = 1; i < this.tab.length; i++) a.push(collection_num_string[this.get(i)]||'Z');
    return a.join('');
  },
  diff: function(b) {
    var a = [];
    for (var i = 1; i < this.tab.length || i < (b ? b.tab.length : 0); i++) {
      var d = this.get(i) - (b ? b.get(i) : 0);
      if (d) a.push([i,d]);
    }
    return a;
  }
  }
  
  var collection_table = function (t,id) {
    var tab = [];
    if (t) {
      t.map(function(x){
        if (x.substring(0,id.length) !== id) return;
        var z = x.indexOf(':');
        tab[parseInt(x.substring(id.length,z))] = new collection_sub_table(x.substring(z+1));
      });
    }
    this.tab = tab;
  };
  collection_table.prototype = {
  get: function(nr) { var snr = Math.floor(nr/1000); return this.tab[snr] ? this.tab[snr].get(nr % 1000) : 0; },
  set: function(nr, val) { var snr = Math.floor(nr/1000); if (val) {
    if (!this.tab[snr]) this.tab[snr] = new collection_sub_table();
    this.tab[snr].set(nr % 1000, val);
  } else if (this.tab[snr]) {
    this.tab[snr].set(nr % 1000, 0);
    if (this.tab[snr].tab.length == 0) this.tab[snr] = undefined;
  }},
  inc: function(nr) { this.set(nr, this.get(nr) + 1); },
  dec: function(nr) { this.set(nr, this.get(nr) - 1); },
  total: function() { var t = 0; for (var i = 0; i < this.tab.length; i++) if (this.tab[i]) t += this.tab[i].total(); return t; },
  maxedtotal: function(m) { var t = 0; for (var i = 0; i < this.tab.length; i++) if (this.tab[i] && m.tab[i]) t += this.tab[i].maxedtotal(m.tab[i]); return t; },
  stringify: function (id) {
    var a = [];
    id = id || "";
    for (var i = 1; i < this.tab.length; i++) if (this.tab[i]) a.push(id + i+':'+this.tab[i].stringify());
    return a;
  },
  diff: function(b) {
    var diff = [];
    var empty = new collection_sub_table;
    for (var i = 0; i < this.tab.length || i < b.tab.length; i++) {
      var c = (this.tab[i] || empty).diff(b.tab[i]);
      c = c.map(function(x){return [x[0]+i*1000,x[1]];});
      diff = diff.concat(c);
    }
    return diff;
  },
  }
  
  
  var havecards = new collection_table;
  var havedice = new collection_table;
  var wantcards = new collection_table;
  var wantdice = new collection_table;
  var lastsavetime = 0;
  
  function update_export_link(c) {
  //   var cardtrades = havecards.diff(wantcards);
  //   var dicetrades = havedice.diff(wantdice);
  //   var w = [], h = [], t = [];
  //    for (var i = 0; i < cardtrades.length; i++) {
  //      var card = trs_all[cardtrades[i][0]];
  //      var n = cardtrades[i][1];
  //      (n > 0 ? h : w).push(Math.abs(n) + "x " + card.mainname + ": " + card.subname);
  //    }
  //    if (h.length) t.push('[H]'), t = t.concat(h);
  //    if (w.length) t.push('[W]'), t = t.concat(w);
  //   E('export_trades').href = 'data:text/plain;charset=utf-8,' + t.join('%0A');
    E('export_collection').href = 'data:text/plain;charset=utf-8,' + c.join('%0A');
  }
  function import_dmdb_collection(s) {
    var dmdb_sets = [
    0, 1, 2, 3, 4, 11, 14, 15, 14, 18, 22, 24,
    8, 9, 12, 13, 13, 16, 20, 21,
    5, 10, 6, 19, 17,
    7, 23,
    ];
    var hc = new collection_table;
    var hd = new collection_table;
    var wc = new collection_table;
    var wd = new collection_table;
    s.replace(/\r/g,'').split("\n\n\n").forEach(function (s, i) {
      if (s === '') return;
      var m = s.match(/(.*?)\nCards\n([\S\s]*?)\n\nDice\n([\S\s]*?)$/);
      if (!m) throw 1;
      var name = m[1].replace(/[^A-Za-z0-9]/g,'').toLowerCase();
      var cards = m[2].split('\n');
      var dice = m[3].split('\n');
      var setidx = dmdb_sets[i] * 1000 + 1001;
      var sum = 0;
      var dnr = {};
      if (i === 6) setidx += 3; // Iron Fist
      if (i === 15) setidx += 2; // Batmobile
      cards.forEach(function (c, j) {
        var m = c.match(/^(\d+) \* (\d+) (.*?) - (.*?)$/);
        if (!m) throw 1;
        var num = parseInt(m[1]);
        var myidx = setidx + j;
        hc.set(myidx, num);
        sum += num;
        dnr[m[3]] = trs_all[myidx].dice_nr;
  //       var name = m[m[3] === "Basic Action Card" ? 4 : 3];
  //       var subname = m[m[3] === "Basic Action Card" ? 3 : 4];
  //       var myname = trs_all[myidx].mainname;
  //       var mysubname = trs_all[myidx].subname;
  //       name = name.replace(/’/g,"'").replace(/[“”]/g,'"');
  //       subname = subname.replace(/’/g,"'").replace(/[“”]/g,'"');
  //       mysubname = mysubname.replace(/~/g,'');
  //       if (name === myname && subname === mysubname) return;
  //       console.log(m[2], "-", name, subname, "-", trs_all[myidx].mainname, trs_all[myidx].subname);
      });
      console.log(sum);
      if (sum) cards.forEach(function (c, j) {
        var myidx = setidx + j;
        var mydidx = trs_all[myidx].dice_nr;
        wc.set(myidx, 1);
        if (mydidx && trs_all[myidx].maxdice > wd.get(mydidx))
          wd.set(mydidx, trs_all[myidx].maxdice);
      });
      dice.forEach(function (c, j) {
        var m = c.match(/^(\d+) \* (.*?)$/);
        if (!m) throw 2;
        var num = parseInt(m[1]);
        if (!dnr[m[2]]) throw 3;
        while (num--) hd.inc(dnr[m[2]]);
      });
    });
    havecards = hc;
    havedice = hd;
    wantcards = wc;
    wantdice = wd;
    collection_update();
    update_export_link(collection);
  }
  function import_collection(s) {
    if(s.substring(0,18) === "Avengers vs. X-Men") {
      import_dmdb_collection(s);
      return;
    }
    if(s.substring(0,7) !== "DMSE:1\n") {
      alert("Wrong collection file format");
      return;
    }
    var collection = s.split("\n");
    havecards = new collection_table(collection,"HC");
    wantcards = new collection_table(collection,"WC");
    havedice = new collection_table(collection,"HD");
    wantdice = new collection_table(collection,"WD");
    for (var i = 0; i < collection.length; i++) {
      if (collection[i].substring(0, 3) === "TS:") lastsavetime = parseInt(collection[i].substring(3));
    }
    collection_update();
    update_export_link(collection);
  }
  function import_collection_changed() {
    var f = E('import_collection').files[0];
    E('import_collection').value = "";
    if (f) {
      var r = new FileReader();
      r.onload = function(e){
        var contents = e.target.result;
        import_collection(contents);
        nv_save_collection();
      }
      r.readAsText(f);
    }
  }
  function import_dmdb_teams(t) {
    var norm = function (s) { return s.toLowerCase().replace(/[^a-z0-9]/g,''); }
    var setname = function (nr) {
      if (nr === 15004) return 'm2015wkop'; // Iron Fist
      if (nr === 14003) return 'dc2015wkop'; // Batmobile
      var myname = setnames[nr/1000|0];
      var dmdbname = {
        wko16m:'m2016wkop',
        wko16dc:'dc2016wkop',
        wolop:'dc2015',
        ygo:'s1',
      }[myname];
      return dmdbname || myname;
    }
    var cards = {};
    for (var i = 0; i < set_names.length; i++) trs_by_set[i].forEach(function (c) {
      var key = setname(c.nr) + '|' + norm(c.mainname);
      if (c.type !== 2) key += '|' + norm(c.subname);
      cards[key] = c.nr;
    });
    t.replace(/\r/g,'').split(/\n{3,}/).forEach(function (t, i) {
      var l = t.replace(/\nDescription\n[\s\S]*/, '').split('\n');
      var tosave = {};
      tosave.name = l[0];
      team_name = tosave.name;
      tosave.cards = [];
      tosave.dice = [];
      for (var i = 1; i < l.length; i++) {
        var m = l[i].match(/^((\d+) \* (.*?)|Basic Action Card) - (.*?) \((.*?)\)$/);
        if (!m) console.log('bad' + l[i]);
        var n = m[2] ? parseInt(m[2]) : 3;
        var c = norm(m[5]);
        if (m[3]) c += '|' + norm(m[3]);
        c += '|' + norm(m[4]);
        if (!cards[c]) {
          console.log('Unknown: ' + c);
          return 0;
        }
        tosave.cards[i-1] = cards[c];
        tosave.dice[i-1] = n;
      }
      for (var i = 0; i < saved_teams.length; i++) {
    if (saved_teams[i].name === tosave.name) {
        break;
    }
      }
      saved_teams[i] = tosave;
    });
  }
  function import_dmdb_teams_changed() {
    var f = E('import_dmdb_teams').files[0];
    E('import_dmdb_teams').value = "";
    if (f) {
      var r = new FileReader();
      r.onload = function(e){
        var contents = e.target.result;
        import_dmdb_teams(contents);
        display_saved_teams();
        nv_save_teams();
      }
      r.readAsText(f);
    }
  }
  function nv_load_current_team(json) {
    var d = JSON.parse(json);
    team_name = d.team_name;
    team_num = d.team_num;
    team = d.team.map(function(e){return trs_all[e]});
  }
  if (localStorage !== undefined) {
      try {
        if ("saved_teams" in localStorage)
			saved_teams = JSON.parse(localStorage.saved_teams);
        if ("collection" in localStorage) {
			import_collection(localStorage.collection);
        }
		
      } catch(e) {
      }
  }
  function sync_save_collection (collection) {
    var dt = new FormData();
    dt.append('content', collection);
    dt.append('type', 'collection');
    dt.append('version', 0);
    dt.append('user', 'nutki');
    dt.append('auth', '134513451345');
    var req = new XMLHttpRequest();
    req.onload = function (e) {
      console.log('Got it!', req.responseText);
    };
    req.open("POST", "save.pl", true);
    req.send(dt);
    console.log('Sent!');
  }
  function nv_save_teams() {
      if (localStorage !== undefined) {
    localStorage.saved_teams = JSON.stringify(saved_teams);
      }
  }
  function nv_save_current_team() {
    if (localStorage !== undefined) {
      localStorage.current_team = JSON.stringify({
        team_name:team_name,
        team_num:team_num,
        team:team.map(function(e){return e.nr})
      });
    }
  }
  function nv_save_collection() {
    var d = Date.now();
    var collection = [ "DMSE:1", "TS:" + d ];
    collection = collection.concat(havecards.stringify("HC"));
    collection = collection.concat(wantcards.stringify("WC"));
    collection = collection.concat(havedice.stringify("HD"));
    collection = collection.concat(wantdice.stringify("WD"));
    if (localStorage !== undefined) {
      if (lastsavetime && lastsavetime + 2*24*60*60*1000 < d)
        localStorage.setItem("collection_" + lastsavetime, localStorage.collection);
      localStorage.collection = collection.join('\n');
    }
    update_export_link(collection);
    lastsavetime = d;
  //sync_save_collection(collection);
  }
  function display_saved_teams() {
      var t = E("savedteams");
      var s = saved_teams.length > 0 ? '<tr><th colspan="3">Saved Teams</th>' : '';
      for (var i = 0; i < saved_teams.length; i++) {
    s += '<tr><td><button onclick="load_team('+i+')">Load</button></td>';
    s += "<td>"+escapeHtml(saved_teams[i].name)+"</td>";
    s += '<td><button onclick="delete_team('+i+')">✖</button></td>';
      }	  
      t.innerHTML = s;
  }
  //check team for errors.  Remove problem entries
  function check_team(team) {
      var probs = [];
      for (var i = 0; i < team.length; i++) {
          if(team[i] == null || team[i].nr == null) {
              probs.push(i);
          }
      }
      for(var i = 0; i < probs.length; i++){
          team.splice(probs[i]-i, 1);
      }
  }
  function load_team(nr) {
      if (!("cards" in saved_teams[nr])) return;
      if (!("dice" in saved_teams[nr])) return;
      team_name = saved_teams[nr].name || "Unnamed";
      team = saved_teams[nr].cards.map(function(e){return trs_all[e]});
      check_team(team);
      team_num = {};
      for (var i = 0; i < team.length; i++) {
    team_num[team[i].nr] = saved_teams[nr].dice[i] || 0;
      }
      team_search = [];
      team_update();
  }
  function delete_team(nr) {
      if(!confirm('Delete team "'+saved_teams[nr].name+'"?')) return;
      saved_teams.splice(nr,1);
      display_saved_teams();
      nv_save_teams();
	  saveToDropbox();
  }
  function dropbox_save(){
	  var accessToken = "";
	  if ("dboxAccountId" in localStorage && location.protocol === 'https:') {			
			saveToDropbox();
        }
		else{
			var authUrlCode = "https://www.dropbox.com/oauth2/authorize?client_id=7ig431nnv3z3xpr&response_type=code&redirect_uri=https://tb.dicecoalition.com/index.php&state="+btoa(encodeURIComponent(localStorage.current_team));
			//State is limited to 500 characters, so could only send like 3 teams
			//&state="+btoa(JSON.stringify(saved_teams));
			var authUrlToken = "https://www.dropbox.com/oauth2/authorize?client_id=7ig431nnv3z3xpr&response_type=token&redirect_uri=https://tb.dicecoalition.com/index.php&state="+btoa(encodeURIComponent(localStorage.current_team));
		  window.open(authUrlToken, "_self");
		  
		}	  
  } 
    
  function download(strData, strFileName, strMimeType) {
    var D = document,
        A = arguments,
        a = D.createElement("a"),
        d = A[0],
        n = A[1],
        t = A[2] || "text/plain";
    //build download link:
    a.href = "data:" + strMimeType + "charset=utf-8," + escape(strData);

    if (window.MSBlobBuilder) { // IE10
        var bb = new MSBlobBuilder();
        bb.append(strData);
        return navigator.msSaveBlob(bb, strFileName);
    } /* end if(window.MSBlobBuilder) */

    if ('download' in a) { //FF20, CH19
        a.setAttribute("download", n);
        a.innerHTML = "downloading...";
        D.body.appendChild(a);
        setTimeout(function() {
            var e = D.createEvent("MouseEvents");
            e.initMouseEvent("click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
            a.dispatchEvent(e);
            D.body.removeChild(a);
        }, 66);
        return true;
    }; /* end if('download' in a) */

    //do iframe dataURL download: (older W3)
    var f = D.createElement("iframe");
    D.body.appendChild(f);
    f.src = "data:" + (A[2] ? A[2] : "application/octet-stream") + (window.btoa ? ";base64" : "") + "," + (window.btoa ? window.btoa : escape)(strData);
    setTimeout(function() {
        D.body.removeChild(f);
    }, 333);
    return true;
}

  function text_save(){      

		var txtData = JSON.stringify(saved_teams);
       download(txtData, "teams.txt", 'text/plain');    
  }
  
document.getElementById('file').onchange = function(){
  var file = this.files[0];
  var reader = new FileReader();
  reader.onload = function(progressEvent){
	  if (confirm('This will overwrite your current saved teams. Continue?')) {
    	 saved_teams = JSON.parse(this.result);
		 nv_save_teams();
		 saveToDropbox();
		 display_saved_teams();
		 alert("Teams imported!");
	  }
  };
  reader.readAsText(file);
};
	
  function saveToDropbox(auth){
		if(location.protocol === 'https:' && "dboxAccessToken" in localStorage){
			var path = "/teams.txt";
			var content = JSON.stringify(saved_teams);
			
			var uploadUrl = "https://content.dropboxapi.com/2/files/upload"
			var result;

			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
			 if (xhr.readyState === 4) {
			 result = xhr.responseText;
			 //console.log(result);
			 }
			};
			xhr.open("POST", uploadUrl, true);
			xhr.setRequestHeader("Authorization", "Bearer " + localStorage.dboxAccessToken);
			xhr.setRequestHeader("Content-type", "application/octet-stream");
			xhr.setRequestHeader("Dropbox-API-Arg", '{"path": "' + path + '","mode":{".tag":"overwrite"}}');
			var formData = new FormData();
			formData.append("teams", content);
			xhr.send(content);
		}
  }
  
  function dropbox_load(){
	  readFromDropbox();
  }
  
  function readFromDropbox(auth){
	  if(location.protocol === 'https:' && "dboxAccessToken" in localStorage){
	    var path = "/teams.txt";
		var content = saved_teams;
		
		var uploadUrl = "https://content.dropboxapi.com/2/files/download"
		var result;

		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
		 if (xhr.readyState === 4) {
		 result = xhr.responseText;
		 //console.log(result);
		 saved_teams = JSON.parse(xhr.responseText);
		 nv_save_teams();
		 display_saved_teams();
		 }
		};
		xhr.open("POST", uploadUrl, true);
		xhr.setRequestHeader("Authorization", "Bearer " + localStorage.dboxAccessToken);
		xhr.setRequestHeader("Content-type", "application/octet-stream");
		xhr.setRequestHeader("Dropbox-API-Arg", '{"path": "' + path + '"}');
		xhr.send();
	  }
  }
  
  function save_team() {
      var tosave = {};
      tosave.name = prompt("Team name", team_name);
      if (!tosave.name) return;
      team_name = tosave.name;
      tosave.cards = team.map(function(e){return e.nr});
      tosave.dice = team.map(function(e){return team_num[e.nr]});
      for (var i = 0; i < saved_teams.length; i++) {
    if (saved_teams[i].name === tosave.name) {
        break;
    }
      }
      saved_teams[i] = tosave;
      display_saved_teams();
      nv_save_teams();
	  saveToDropbox();
  }
  
  var click_minus;
  var click_plus;
  var collection_edit_mode = 3; // 1 = cards, 2 = dice, 3 = both, 4 = want cards, 8 = want dice
  function set_edit_mode(v) {
    collection_edit_mode = v;
    if (v == 2 || v == 8) showelem('editdice'); else hideelem('editdice');
    collection_update();
  }
  function click_update_collection() {
    var pluses = C("inc");
    var minuses = C("dec");
    for (var i = 0; i < pluses.length; i++) {
      var cur = trs_all[minuses[i].id.substring(3)];
      var show = true;
      if (collection_edit_mode & 1 && havecards.get(cur.nr) > MAXCOLNUM - 1) show = false;
      if (collection_edit_mode & 2 && (!cur.dice_nr || havedice.get(cur.dice_nr) > MAXCOLNUM - 1)) show = false;
      if (collection_edit_mode & 4 && wantcards.get(cur.nr) > MAXCOLNUM - 1) show = false;
      if (collection_edit_mode & 8 && (!cur.dice_nr || wantdice.get(cur.dice_nr) > MAXCOLNUM - 1)) show = false;
      pluses[i].style.display = show ? "block" : "none";
    }
    for (var i = 0; i < minuses.length; i++) {
      var cur = trs_all[minuses[i].id.substring(3)];
      var show = true;
      if (collection_edit_mode & 1 && !havecards.get(cur.nr)) show = false;
      if (collection_edit_mode & 2 && !(cur.dice_nr && havedice.get(cur.dice_nr))) show = false;
      if (collection_edit_mode & 4 && !wantcards.get(cur.nr)) show = false;
      if (collection_edit_mode & 8 && !(cur.dice_nr && wantdice.get(cur.dice_nr))) show = false;
      minuses[i].style.display = show ? "block" : "none";
    }
  }
  function collection_status_update() {
    var statlines = E("main").getElementsByClassName("collstat");
    for (var i = 0; i < statlines.length; i++) {
      var cur = trs_all[statlines[i].id.substring(4)];
      var c = '';
      if (wantcards.get(cur.nr)) {
        var cards_ok = havecards.get(cur.nr) >= wantcards.get(cur.nr);
        var dice_ok = havedice.get(cur.dice_nr) >= wantdice.get(cur.dice_nr);
        if (cards_ok && dice_ok) c = ' s2';
        else if (cards_ok) c = ' s3';
        else c = ' s4';
      }
      statlines[i].className = "collstat" + c;
    }
  }
  function team_status_update() {
    var statlines = E("team").getElementsByClassName("collstat");
    for (var i = 0; i < statlines.length; i++) {
      var cur = trs_all[statlines[i].id.substring(4)];
      var c = '';
      var cards_ok = havecards.get(cur.nr) > 0;
      var dice_ok = cur.type == 2 || havedice.get(cur.dice_nr) >= team_num[cur.nr];
      if (cards_ok && dice_ok) c = ' s2';
      else if (cards_ok) c = ' s3';
      else c = ' s4';
      statlines[i].className = "collstat" + c;
    }
  }
  function collection_update() {
    function smallif(n, v) {
      return collection_edit_mode & v ? n : '<small>' + n + '</small>';
    }
    if (mode == 3) click_update_collection();
    var cardlines = C("cardcount");
    var dicelines = C("dicecount");
    for (var i = 0; i < cardlines.length; i++) {
      var nr = cardlines[i].id.substring(4);
      var w = wantcards.get(nr);
      var h = havecards.get(nr);
      cardlines[i].innerHTML = w || h ? smallif(h,1) +smallif('/',15) + smallif(w,4) : '';
    }
    for (var i = 0; i < dicelines.length; i++) {
      var cur = trs_all[dicelines[i].id.substring(4)];
      var w = wantdice.get(cur.dice_nr);
      var h = havedice.get(cur.dice_nr);
      dicelines[i].innerHTML = w || h ? smallif(h,2) +smallif('/',15) + smallif(w,8) : '';
    }
    var ch = havecards.maxedtotal(wantcards);
    var ce = havecards.total() - ch;
    var cw = wantcards.total();
    var dh = havedice.maxedtotal(wantdice);
    var de = havedice.total() - dh;
    var dw = wantdice.total();
    var status = E("collection_status");
    status.innerHTML = "In collection: " + ch + "/" + cw + " wanted cards (" + ce + " extra), " + dh + "/" + dw + " wanted dice (" + de + " extra)";
    collection_status_update();
  }
  function collection_click_minus (nr) {
    function collection_minus(tab) {
      tab.dec(nr);
    }
    if (collection_edit_mode & 1) collection_minus(havecards);
    if (collection_edit_mode & 4) collection_minus(wantcards);
    nr = trs_all[nr].dice_nr;
    if (collection_edit_mode & 2) collection_minus(havedice);
    if (collection_edit_mode & 8) collection_minus(wantdice);
    collection_update();
    nv_save_collection();
  }
  function collection_click_plus (nr) {
    function collection_plus(tab) {
      tab.inc(nr);
    }
    if (collection_edit_mode & 1) collection_plus(havecards);
    if (collection_edit_mode & 4) collection_plus(wantcards);
    nr = trs_all[nr].dice_nr;
    if (collection_edit_mode & 2) collection_plus(havedice);
    if (collection_edit_mode & 8) collection_plus(wantdice);
    collection_update();
    nv_save_collection();
  }
  function click_all(txt, f) {
    var what = 'nr', tab;
    var marked = {};
    function plusall(row) {
      if (!row[what]) return;
      if (marked[row[what]]) return;
      marked[row[what]] = true;
      f(tab,row[what]);
    }
    var mode_names = { 1:"owned cards", 2: "owned dice", 3:"owned cards and dice", 4:"wanted cards", 8:"wanted dice" };
    if (!confirm("Are you sure to "+txt+" all "+mode_names[collection_edit_mode]+" in "+rows.length+" search results?")) return;
    tab = havecards;
    if (collection_edit_mode & 1) rows.map(plusall);
    tab = wantcards;
    if (collection_edit_mode & 4) rows.map(plusall);
    what = 'dice_nr';
    marked = {};
    tab = havedice;
    if (collection_edit_mode & 2) rows.map(plusall);
    tab = wantdice;
    if (collection_edit_mode & 8) rows.map(plusall);
    collection_update();
    nv_save_collection();
  }
  function click_plus_all() {
    click_all("add 1 to", function (tab,nr){tab.inc(nr)});
  }
  function click_minus_all() {
    click_all("subtract 1 from", function (tab,nr){tab.dec(nr)});
  }
  function click_clear_all() {
    click_all("zero", function (tab,nr){tab.set(nr,0)});
  }
  function click_max_all() {
    var max = {};
    for (var i = 0; i < rows.length; i++) {
      var d = rows[i].dice_nr;
      if (!d) continue;
      if (!max[d] || max[d] < rows[i].maxdice) max[d] = rows[i].maxdice;
    }
    click_all("set to max dice", function (tab,nr){tab.set(nr,max[nr])});
  }
  
  var pool_bac = [];
  var pool_oth = [];
  
  function add_random() {
    if (!pool_oth.length) return;
    var i = Math.floor(Math.random() * pool_oth.length);
    team_click_plus(pool_oth[i].nr);
    team_search[team.length-1] = lastsearch;
  }
  
  function add_random_bac() {
    if (!pool_bac.length) return;
    var i = Math.floor(Math.random() * pool_bac.length);
    team_click_plus(pool_bac[i].nr);
    team_search[team.length-1] = lastsearch;
  }
  
  function click_update_team() {
	 var nolimits = E('teamlimits').checked;
    var pluses = C("inc");
    var minuses = C("dec");
    var has_name = {};
    var num_bac = 0;
    var num = 0;
    for (var i = 0; i < team.length; i++) {
      has_name[team[i].mainname.replace('™', '')] = true;
      if (team[i].type == 2) num_bac++; else num++;
    }
    for (var i = 0; i < pluses.length; i++) {
      var cur = trs_all[pluses[i].id.substring(3)];
      var show;
      if (team_num[cur.nr]) {
        show = team_num[cur.nr] < cur.maxdice;
      } else {
        show = !has_name[cur.mainname.replace('™', '')];
		if (!nolimits){
			if (cur.type == 2 && num_bac >= 2) show = false;
			if (cur.type != 2 && num >= 8) show = false;
		}
      }
      pluses[i].style.display = show ? "block" : "none";
    }
    for (var i = 0; i < minuses.length; i++) {
      var cur = trs_all[minuses[i].id.substring(3)];
      minuses[i].style.display = team_num[cur.nr] ? "block" : "none";
    }
    pool_oth = num >= 8 && !nolimits ? [] : rows.filter(function(x){return x.type!=2 && !team_num[x.nr] && !has_name[x.mainname.replace('™', '')];});
    pool_bac = num_bac >= 2 && !nolimits? [] : rows.filter(function(x){return x.type==2 && !team_num[x.nr];});
    hideelem('addrandom');
    hideelem('addrandombac');
    if (pool_oth.length) showelem('addrandom');
    if (pool_bac.length) showelem('addrandombac');
  }
  function team_update() {
    display_team();
    team_status_update();
    click_update_team();
    visualize_team_link();
    nv_save_current_team();
    var teamlines = C("teamcount");
    for (var i = 0; i < teamlines.length; i++) {
      var cur = trs_all[teamlines[i].id.substring(4)];
      teamlines[i].innerHTML = team_num[cur.nr] ? team_num[cur.nr]+'<small>/'+cur.maxdice+'</small>' : '';
    }
  }
  function team_click_minus (nr) {
    for (var i = 0; i < team.length; i++) {
      if (nr == team[i].nr) {
        team_num[nr] -= trs_all[nr].type == 2 ? 3 : 1;
        if (team_num[nr] <= 0) {
    delete team_num[nr];
    team.splice(i,1);
    team_search.splice(i,1);
    document.body.scrollTop = 0;
        }
        team_update();
        return;
      }
    }
  }
  function team_click_plus (nr) {
    for (var i = 0; i < team.length; i++) {
      if (nr == team[i].nr) {
        team_num[nr]++;
        team_update();
        return;
      }
    }
    team.push(trs_all[nr]);
    team_num[nr] = trs_all[nr].type == 2 ? 3 : 1;
    document.body.scrollTop = 0;
    team_update();
  }
  function clearteam(prompt) {
      if(prompt == undefined){
        prompt = true;
      }
      if(prompt) {
          if (team.length && !confirm('Clear the current team?')) return false;
      }
    team_name = "Unnamed";
    team_serial = '';
    team_coloncode = '';
    team = [];
    team_num = {};
    team_search = [];
    team_update();
    return true;
  }
  function decode(t,v) {
      return t[v];
  }
  
  var team_serial = '';
  var team_coloncode = '';
  var mode = localStorage !== undefined && localStorage.mode ? parseInt(localStorage.mode) : 0;
  var modeteampic = localStorage !== undefined && localStorage.modeteampic ? parseInt(localStorage.modeteampic) : 0;
  var total_dice_mode = false;
  var trs_all = [];
  var trs_by_set = [];
  var setnames = [];
  var urlbans =[];
  function getdice(s,v) {
    v = v.replace('™', '');
    return dice[s+'@'+v] || dice[v];
  }
  function gendice1(c,v) {
      return '<table class="inline3 show_tdm'+c+'"><tr><td>'+v[0]+'</td><td>'+v[1]+'</td></tr><tr><td>'+(v[3]||' ')+'</td><td>'+v[2]+'</td></tr></table>';
  }
  function gendicetotals(s) {
      if (!s) return undefined;
      return parseInt(s[0],16) + parseInt(s[4],16) + parseInt(s[8],16);
  }
  function gendice(s) {
      if (!s) return '';
      var totals = [gendicetotals(s),gendicetotals(s.substring(1)),gendicetotals(s.substring(2))];
      //TODO: Need to rework this line for showing 4 character faces
      var dice = gendice1(0,s)+gendice1(0,s.substring(4))+gendice1(0,s.substring(8));
      if(s.length > 12)
          dice += gendice1(0,s.substring(12));
      dice += gendice1('1 hide',totals);
      return dice;
  }
  function getgender(s,v) {
    v = v.replace('™', '');
    if (gender.hasOwnProperty(s+'@'+v)) return gender[s+'@'+v];
    return gender[v] || 0;
  }
  function init(setid,set,setname,trs_name,die_sources,affiliation_map) {
  var trs_idx = set_names.indexOf(trs_name);
  var trs = (trs_by_set[trs_idx] = trs_by_set[trs_idx] || []);
  setnames[setid + 1] = setname.toLowerCase();
  var is_dnd = trs_name === 'bff' || trs_name === 'fus' || trs_name === 'toa'|| trs_name === 'tiw'||trs_name === 'aiw'||trs_name === 'zhn';
  var set_dice = {};
  var setbase = (setid + 1) * 1000;
  var new_die = setbase + 1;
  var new_dice_name = [];
  for(var i = 0; i < set.length; i++) {
  var nr = setbase + i + 1;
  var p_src = set[i].substring(is_dnd? 7: 5);
  var p = p_src.replace('||','|<hr>|').split('|');
  var cost = parseInt(set[i][1],16);
  var affiliation = affiliation_map ? affiliation_map[set[i][3]] : set[i][3];
  var affiliationB = undefined;
  if (affiliation.indexOf("/") >= 0) {
    var affiliations = affiliation.split("/");
    affiliation = affiliations[0];
    affiliationB = affiliations[1];
  }
  var energy = {
   0:1,
   1:2, // M
   2:4, // F
   3:8, // B
   4:16, // S
   5:12, // BF
   6:10, // BM
   7:24, // BS
   8:6, // FM
   9:20, // FS
   A:18, // MS
   B:30, // BFMS
  }[set[i][2]];
  var name = p[0].split('@')[0];
  var thisdie = getdice(setname, p[0]);
  var type = thisdie ? 0 : p[1] === 'Basic Action Card' || p[1] === 'Epic Basic Action' || p[1] === 'Basic Action'  || setname == 'JLop' ? 2 : 1;
  var gend = type == 0 ? getgender(setname, p[0]) || 0 : 2;
  var t = '<tr data-nr="'+nr+'">', txt = '';
  var subname = p[1];
  var rarity = parseInt(set[i][0]);
  var dice_nr = set_dice[p[0]];
  if (type != 2 && die_sources) if (die_sources.length === set.length) {
    var die_src = trs_by_set[set_names.indexOf(die_sources[i])];
    for (var j = 0; j < die_src.length; j++) {
      if (die_src[j].mainname === name) dice_nr = die_src[j].dice_nr, thisdie = die_src[j].dice_stats;
    }
  } else for (var k = 0; k < die_sources.length; k++) {
    var die_src = trs_by_set[set_names.indexOf(die_sources[k])];
    for (var j = 0; j < die_src.length; j++) {
      if (die_src[j].mainname === name) dice_nr = die_src[j].dice_nr, thisdie = die_src[j].dice_stats;
    }
  }
  if (!dice_nr && type != 2) {
    dice_nr = new_die++;
    new_dice_name.push(name);
  }
  set_dice[p[0]] = dice_nr;
  if (subname[0] == '~') subname = '<span class="flip">' + subname.substring(1) + '</span>';
  t += '<td class="edit"><button class="dec" id="dec'+nr+'" onclick="click_minus('+nr+');event.stopPropagation();">-</button></td>';
  t += '<td class="edit"><button class="inc" id="inc'+nr+'" onclick="click_plus('+nr+');event.stopPropagation();">+</button></td>'
  t += '<td class="team teamcount" id="team'+nr+'"></td>'
  t += '<td class="collection cardcount" id="card'+nr+'"></td>'
  t += '<td class="collection dicecount" id="dice'+nr+'"></td>'
  t += '<td class="collstat" id="stat'+nr+'">&nbsp</td>';
  t += "<td>"+(i+1)+"<small>"+setname+"</small></td>";
  t += "<td>"+name+': '+subname+"</td>";
  t += "<td>"+cost+"</td>";
  if(energy > 1) t += '<td><img src="e'+set[i][2]+'.png"></td>'; else t+='<td></td>';
  t += '<td>';
  if(affiliation!=0) t += '<img src="a'+affiliation+'.png">';
  if(affiliationB!==undefined) {
    t += "<hr>";
    if(affiliationB!=0) t += '<img src="a'+affiliationB+'.png">';
  }
  t += '</td>';
  t += "<td>"+set[i][4]+"</td>";
  t += '<td class="r'+rarity+'">&nbsp</td>';
  t += '<td class="extra">';
  if (is_dnd) {
  t += '<div class="dnd">';
  if (set[i][5] != 0) t += '<img src="d'+set[i][5]+'.png">';
  if (set[i][6] != 0) t += '<img src="eq.png">';
  t += '</div>';
  }
  affiliation_add(nr,affiliation,trs_idx);
  if (affiliationB != undefined) affiliation_add(nr,affiliationB,trs_idx);
  var tk = "";
  for(var j = 2; j < p.length; j++) {
  var pj=p[j];
  var pc="";
  var pjk = pj;
  pj = pj.replace(/\[([0-9A-Z]+)\]/g,function(m,id){if(iconid[id]===undefined) console.log('Undefined icon: '+id); return '<img src="'+iconid[id]+'.png" alt="'+iconname[id]+'">'});
  pj = pj.replace(/\*/g,'<img src="burst.png" alt="*">');
  pjk = pjk.replace(/\]\[/g,'] [').replace(/\[([0-9A-Z]+)\]/g,function(m,id){return iconname[id]}).toLowerCase();
  pj = pj.replace("Overcrush", "<strong>Overcrush</strong>");
  pj = pj.replace("Ally", "<strong>Ally</strong>");
  pj = pj.replace("Immortal", "<strong>Immortal</strong>");
  pj = pj.replace("Underdog", "<strong>Underdog</strong>");
  pj = pj.replace("Regenerate", "<strong>Regenerate</strong>");
  pj = pj.replace("Aftershock", "<strong>Aftershock</strong>");
  pj = pj.replace("Iron Will", "<strong>Iron Will</strong>");
  pj = pj.replace(/Fast/g, "<strong>Fast</strong>");
  pj = pj.replace("Resistance", "<strong>Resistance</strong>");
  pj = pj.replace("Enlistment", "<strong>Enlistment</strong>");
  pj = pj.replace("Intimidate", "<strong>Intimidate</strong>");
  pj = pj.replace("Crossover", "<strong>Crossover</strong>");
  pj = pj.replace("Deadly", "<strong>Deadly</strong>");
  pj = pj.replace("Suit Up", "<strong>Suit Up</strong>");
  pj = pj.replace("Boomerang", "<strong>Boomerang</strong>");
  pj = pj.replace("Call Out", "<strong>Call Out</strong>");
  pj = pj.replace("Call out", "<strong>Call out</strong>"); //for Kane card typo bolding
  pj = pj.replace("Infiltrate", "<strong>Infiltrate</strong>");
  pj = pj.replace("Awaken", "<strong>Awaken</strong>");
  pj = pj.replace("Attune", "<strong>Attune</strong>");
  pj = pj.replace("Trap", "<strong>Trap</strong>");
  pj = pj.replace("Trigger", "<strong>Trigger</strong>");
  pj = pj.replace("Effect", "<strong>Effect</strong>");
  pj = pj.replace("Amplify", "<strong>Amplify</strong>");
  pj = pj.replace("Impulse", "<strong>Impulse</strong>");
  pj = pj.replace("Swarm", "<strong>Swarm</strong>");
  pj = pj.replace("Fabricate", "<strong>Fabricate</strong>");
  pj = pj.replace("Frag", "<strong>Frag</strong>");
  pj = pj.replace("Range 1", "<strong>Range 1</strong>");
  pj = pj.replace("Range 2", "<strong>Range 2</strong>");
  pj = pj.replace("Range 3", "<strong>Range 3</strong>");
  pj = pj.replace("Range", "<strong>Range</strong>");
  pj = pj.replace("Breath Weapon 1", "<strong>Breath Weapon 1</strong>");
  pj = pj.replace("Breath Weapon 2", "<strong>Breath Weapon 2</strong>");
  pj = pj.replace("Breath Weapon 3", "<strong>Breath Weapon 3</strong>");
  pj = pj.replace("Anti-Breath Weapon X", "<strong>Anti-Breath Weapon X</strong>");
  pj = pj.replace("Anti-Breath Weapon - X", "<strong>Anti-Breath Weapon - X</strong>");
  pj = pj.replace("Retaliation", "<strong>Retaliation</strong>");
  pj = pj.replace("Strike", "<strong>Strike</strong>");
  pj = pj.replace("Founder", "<strong>Founder</strong>");  
  pj = pj.replace(/Energize/g, "<strong>Energize</strong>");
  pj = pj.replace("Corrupt", "<strong>Corrupt</strong>");
//   pj = pj.replace("Experience", "<strong>Experience</strong>");  
  pj = pj.replace("Energy Drain 2", "<strong>Energy Drain 2</strong>");
  pj = pj.replace("Energy Drain", "<strong>Energy Drain</strong>");
  pj = pj.replace("Spark", "<strong>Spark</strong>");
  pj = pj.replace("Obscure", "<strong>Obscure</strong>");
  pj = pj.replace("Tag Out", "<strong>Tag Out</strong>");
  pj = pj.replace("Recruit", "<strong>Recruit</strong>");
  pj = pj.replace("Rush", "<strong>Rush</strong>");
  pj = pj.replace("(E)", "(<a href='https://win.wizkids.com/bb/viewtopic.php?f=10&t=4588' target='_new'>E</a>)");
  if (pj.substring(0,7) == 'Heroic:' || pj.substring(0,7) == 'Fusion:') {
      pj = '<strong>'+pj.substring(0,7)+'</strong>'+pj.substring(7);
  } else if (pj.substring(0,7) == 'Global:' || pj.substring(0,7) == 'Ritual:') {
      pj = '<strong>'+pj.substring(0,7)+'</strong>'+pj.substring(7);
      pc = ' class="global"';
  } else if (pj.substring(0,6) == 'Global') {
      pj = '<strong>Global</strong>'+pj.substring(6);
      pc = ' class="global"';
  } else if (pj.substring(0,10) == 'Experience') {
      pj = '<strong>Experience</strong>'+pj.substring(10);
  } else if (pj.substring(0,13) == 'Retaliation -') {
      pj = '<strong>Retaliation</strong> -'+pj.substring(13);
  } else if (pj.substring(0,8) == 'Zombie -') {
      pj = '<strong>Zombie</strong> -'+pj.substring(8);
  } else if (pj.substring(0,10) == 'Teamwork -') {
      pj = '<strong>Teamwork</strong> -'+pj.substring(10);
  } else if (pj.substring(0,11) == 'Teamwatch -') {
      pj = '<strong>Teamwatch</strong> -'+pj.substring(11);
  } else if (pj.substring(0,11) == 'Vengeance -') {
      pj = '<strong>Vengeance</strong> -'+pj.substring(11);
  } else if (pj.substring(0,9) == 'Synergy -') {
      pj = '<strong>Synergy</strong> -'+pj.substring(9);
  } else if (pj.substring(0,12) == 'Crosspulse -') {
      pj = '<strong>Crosspulse</strong> -'+pj.substring(12);
  } else if (pj.substring(0,12) == 'Continuous: ') {
      pj = '<strong><i>Continuous</i></strong>: '+pj.substring(11);
  } else if (pj.substring(0,12) == 'Turtle Power') {
      pj = '<strong>Turtle Power</strong>'+pj.substring(12);
  } else if (pj.substring(0,15) == 'Back for More -') {
      pj = '<strong>Back for More</strong> -'+pj.substring(15);
  } else if (pj.substring(0,9) == 'Gadgeteer') {
      pj = '<strong>Gadgeteer</strong>'+pj.substring(9);
  } else if (pj.substring(0,15) == 'Common Ground -') {
      pj = '<strong>Common Ground</strong> -'+pj.substring(15);
  }
  txt += "<p"+pc+">"+pj+"</p>";
  tk += " "+pjk;
  }
  t += txt;
  t += "</td>";
  t += '<td class="extra totaldicetoggle">'+gendice(thisdie)+'</td>';
  var cdice = thisdie || '';
  var namekey = name.toLowerCase();
  if (namekey.substring(0,4) === 'the ') namekey = namekey.substring(4);
  trs.push(trs_all[nr] = {
      html:t,
      txt:tk,
      nr:nr,
      dice_nr:dice_nr,
      dice_stats:thisdie,
      mainname:name,
      subname:p[1],
      name:name.toLowerCase()+': '+p[1].toLowerCase(),
      type:type,
      energy:energy,
      rarity:rarity,
      cost:cost,
      gender:gend,
      maxdice:1*set[i][4],
      affiliationimg:affiliation,
      affiliationflipimg:affiliationB,
      energyimg:set[i][2],
      text:txt,
      formats:63^(format_bans[setname]||0)^(format_bans[(i+1)+setname]||0),
      sk:[
    i - setbase,
    namekey,
    cost,
    energy,
    affiliation,
    set[i][4],
    rarity,
    is_dnd ? set[i][5] : 'x',
    cdice[0],cdice[1],cdice[3],cdice[2],
    cdice[4],cdice[5],cdice[7],cdice[6],
    cdice[8],cdice[9],cdice[11],cdice[10],
    gendicetotals(cdice),gendicetotals(cdice.substring(1)),gendicetotals(cdice.substring(2)),
      ],
      });
  }
  //console.log("dice nr " + setname + ": " + (new_die - setbase - 1),new_dice_name);
  }
  
  var format_bans = convert_to_map({
	  //Two Team Takedown Legacy 
/*
  K: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL", "WoLop", "M2015", "ASM", "FUS", "WF", "CW", "GAF", "DP", "TMNT", "D2016", "DC2016", "M2016", "wko16dc", "wko16m", "wko16dd", "DrS", "IMW", "Def", "SMC", "GotG", "XFC", "THOR", "BAT", "SWW", "TOA", "HHS", "sk2017", "DC2017", "M2017", "DC2016", "M2016", "WKO16DC", "WKO16M", "WKO16DD", 
       "12AI", "19MYST", "2MYST", "10AI", "16JUS", "6JLL", "9KI", "34JUS", "13BFU", "71JUS", "5M2019", "19JLL", "24JLL", "22XMF", "24HQ", "1M2019", "42AI", "18SW", "20ORK", "21KI", "7KI", "64XMF", "16DXM", "20XMF", "4DXM", "10XFO", "5XFO", "24DXM", "51XMF", "70XMF", "66XMF", "21JUS", "3JUS", "13DOOM", "10DOOM", "53AI", "23HQ", "58BFU", "3TIW", "17BIT", "21WWE", "7WWE", "12TIW", "14ZHN", "13TAG", "51WWE", "50WWE",
       "57AI", "24AIW", "1BFU", "19BFU", "52BFU", "4DXM", "15HQ", "105IG", "50IG", "151IG", "107IG", "9IG", "4IG", "102IG", "126IG", "16IG", "32JUS", "72JUS", "7JUS", "65JUS", "70JUS", "3MYST", "20MYST", "38TIW", "18TIW", "44TIW", "37TIW", "32TIW", "17TIW", "9WWE", "41WWE", "31WWE", "16XFO", "9XFO", "4XFO", "5XFO", "20XMF"],
*/
	//Modern
	M: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL",
       "WoLop", "M2015", "ASM", "FUS", "WF", "CW", "GAF", "DP", "TMNT", "D2016", "DC2016", "M2016", "wko16dc", "wko16m", "wko16dd", "DrS", "IMW", "Def", "SMC", "GotG", "XFC", "THOR", "BAT", "SWW", "TOA", "HHS", "sk2017", "DC2017", "M2017", "AI", "KI", "JLL", "HQ", "BFU", "ORK", "SW", "JUS", "DOOM", "MYST", "XMF", "DXM", "XFO", "TIW", "AIW", "ZHN", "WWE", "BIT", "TAG", "M2019", "WD2018"],
	
	//new Two Team Takedown   
	T: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL",
       "WoLop", "M2015", "ASM", "FUS", "WF", "CW", "GAF", "DP", "TMNT", "D2016", "DC2016", "M2016", "wko16dc", "wko16m", "wko16dd", "DrS", "IMW", "Def", "SMC", "GotG", "XFC", "THOR", "BAT", "SWW", "TOA", "HHS", "sk2017", "DC2017", "M2017"],
   /*
   //not sure why i'm keeping old moderns here... but i am.  
  M: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL",
       "WoLop", "M2015", "ASM", "FUS", "WF", "CW", "GAF", "DP", "TMNT", "D2016", "86GotG", 
	   "DC2016", "M2016", "wko16dc", "wko16m", "wko16dd", "132TOA", "16SMC"],
	   
	   
  M: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL",
       "WoLop", "M2015", "ASM", "FUS", "WF", "CW", "GAF", "DP", "TMNT", "D2016", "DC2016", "M2016", "wko16dc", "wko16m", "wko16dd", "DrS", "IMW", "Def", "SMC", "GotG", "XFC", "THOR", "BAT", "SWW", "TOA", "HHS", "sk2017", "DC2017", "M2017"],
	*/   
  //2017 M: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "15FUS" ],
  //golden age.  Bans Relenetless & Swords of Revealing light, Ring of Mag, Imprisoned, and Beholder
  G: [ "31UXM", "119YGO", "63YGO", "28UXM", "3BFF" ],
  
      // Silver Age
  	K: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL",
       "WoLop", "M2015", "ASM", "FUS", "WF", "CW", "TMNT", "D2016", "DC2016", "M2016", "wko16dc", "wko16m", "wko16dd", "sk2017"],
  //global escalation
  P: [ "31UXM", "119YGO", "63YGO", "28UXM", "3BFF", "2MYST", "4BAT", "86BAT", "83BAT", "6DOOM", "11TMNT", "81FUS", "42FUS", "29FUS", "137JL", "48GotG", "86GotG", "4XFO", "70AvX", "19YGO", "65JUS", "113FUS", "92DP", "67TOA",  "47FUS", "32TOA", "130AvX", "21JUS", "7WoL", "15FUS", "77AvX", "78AvX", "9TOA", "6THOR", "68JUS", "88YGO",  "34TOA", "118WoL", "55YGO", "76BFF", "58YGO", "21XFC", "120XFC", "9DXM", "58WoL", "98XFC", "36THOR", "51HHS", "53HHS", "90CW", "119GotG", "14WF", "115TOA", "30BAT", "2DC2016", "31XFC", "16SMC", "66JL", "18AvX", "74XFC", "45JUS", "112GotG", "35BAT", "32IMW", "126AvX", "22SWW", "22DrS", "128THOR", "89TOA", "132TOA"],
  //Dice Fight Legacy
  N: [ "32YGO", "60YGO", "94YGO", "68YGO", "103YGO", "109YGO", "29DP", "69DP", "119DP", "16THOR", "56THOR", "96THOR", "32THOR", "72THOR", "112THOR", "5M2019", "57WoL", "90WoL", "121WoL", "53WoL", "87WoL", "118WoL", "64WoL", "97WoL", "127WoL", "49UXM", "81UXM", "109UXM", "14JUS", "15JUS", "16JUS", "47FUS", "85FUS", "114FUS", "46FUS", "84FUS", "113FUS", "13FUS", "14FUS", "15FUS", "58FUS", "70FUS", "103FUS", "138FUS", "16SMC", "17SMC", "18SMC", "13WF", "14WF", "15WF", "60WF", "54WF", "90WF", "120WF", "46JL", "84JL", "137JL", "4JLop", "39JL", "78JL", "109JL", "36AvX", "100AvX", "129AvX", "61BFF", "93BFF", "121BFF", "41BFF", "75BFF", "107BFF", "51TOA", "91TOA", "132TOA", "36TOA", "76TOA", "115TOA", "8GotG", "48GotG", "86GotG", "36GotG", "76GotG", "112GotG", "24GotG", "64GotG", "119GotG", "35XMF", "36XMF", "37XMF", "27GAF", "67GAF", "104GAF", "7GAF", "47GAF", "86GAF", "18GAF", "58GAF", "97GAF", "19BAT", "59BAT", "98BAT", "7KI", "8KI", "9KI", "31XFC", "71XFC", "107XFC", "31TIW", "32TIW", "33TIW", "13TIW", "14TIW", "15TIW", "10TIW", "11TIW", "12TIW", "16TIW", "17TIW", "18TIW", "47TIW", "48TIW", "49TIW", "13ZHN", "14ZHN", "15ZHN", "7WWE", "8WWE", "9WWE", "19WWE", "20WWE", "21WWE", "48CW", "84CW", "116CW", "11CW", "12CW", "13CW", "60CW", "15HQ", "16HQ", "17HQ", "40AI", "41AI", "42AI", ,"134TOA", "17XFC", "57XFC", "119XFC", "26XFC", "66XFC", "102XFC", "8GAF", "48GAF", "87GAF", "63ASM", "99ASM", "128ASM", "30TOA", "70TOA", "109TOA", "50BFF", "84BFF", "126BFF", "1YGO", "12YGO", "74YGO", "24TOA", "64TOA", "129TOA", "22FUS", "23FUS", "24FUS", "73FUS", "21XFC", "61XFC", "120XFC", "37FUS", "77FUS", "135FUS", "62WoL", "95WoL", "136WoL", "25THOR", "65THOR", "105THOR", "31GAF", "71GAF", "108GAF", "4WWE", "5WWE", "6WWE", "50IG", "90IG", "130IG", "19GotG", "59GotG", "97GotG", "10GAF", "50GAF", "89GAF", "46IG", "86IG", "126IG", "148IG", "27IG", "67IG", "107IG", "19XMF", "20XMF", "21XMF", "1M2019", "10AI", "11AI", "12AI", "16SW", "17SW", "18SW", "4MYST", "5MYST", "6MYST", "25HHS", "26HHS", "27HHS", "22SWW", "23SWW", "24SWW", "57CW", "93CW", "125CW", "26YGO", "54YGO", "88YGO", "54CW", "90CW", "122CW", "19KI", "20KI", "21KI", "7WoL", "8WoL", "9WoL", "45WoL", "58WoL", "91WoL", "122WoL", "52FUS", "90FUS", "119FUS", "24THOR", "64THOR", "104THOR", "37TIW", "38TIW", "52IG", "92IG", "132IG", "151IG", "7BIT", "8BIT", "9BIT", "4JLL", "5JLL", "6JLL", "19MYST", "20MYST", "21MYST", "26XMF", "27XMF", "28XMF", "22XMF", "23XMF", "23TOA", "63TOA", "103TOA", "22JLL", "23JLL", "24JLL", "66YGO", "101YGO", "108YGO", "22AIW", "23AIW", "24AIW", "38WF", "78WF", "136WF", "34IG", "74IG", "114IG", "35UXM", "64UXM", "95UXM", "45JUS", "46JUS", "47JUS", "73WoL", "105WoL", "134WoL", "4M2015", "55IG", "95IG", "135IG", "22IG", "62IG", "102IG", "138IG", "7SWW", "8SWW", "9SWW", "34THOR", "74THOR", "129THOR", "1WoLop", "16TIW", "17TIW", "18TIW", "35WF", "75WF", "107WF", "1MYST", "2MYST", "3MYST", "31GotG", "71GotG", "108GotG", "10GAF", "50GAF", "89GAF", "1BFU", "2BFU", "3BFU", "7JUS", "8JUS", "1IMW", "2IMW", "3IMW", "3M2015", "22XFC", "62XFC", "98XFC", "58AvX", "90AvX", "122AvX", "16ORK", "17ORK", "18ORK", "40BFU", "41BFU", "42BFU", "46XMF", "47XMF", "48XMF", "8XFC", "48XFC", "117XFC", "16AI", "17AI", "18AI", "3GotG", "43GotG", "117GotG", "28GotG", "68GotG", "105GotG", "5GotG", "45GotG", "84GotG", "6GotG", "46GotG", "118GotG", "4XFO", "5XFO", "6XFO", "10KI", "11KI", "12KI", "71AoU", "104AoU", "132AoU", "19THOR", "59THOR", "99THOR", "35JL", "74JL", "106JL", "10DOOM", "11DOOM", "12DOOM", "22JL", "23JL", "24JL", "73JL", "17BAT", "57BAT", "96BAT", "20JUS", "21JUS", "22JUS", "1HQ", "2HQ", "3HQ", "32TOA", "72TOA", "111TOA", "20GotG", "60GotG", "98GotG", "1AIW", "2AIW", "3AIW", "18IG", "58IG", "98IG", "17DP", "57DP", "96DP", "28DP", "68DP", "106DP", "35IG", "75IG", "115IG", "144IG", "19TOA", "59TOA", "99TOA", "60AvX", "95AvX", "124AvX", "10ORK", "11ORK", "12ORK", "13ORK", "14ORK", "15ORK", "42FUS", "81FUS", "111FUS", "52WF", "89WF", "119WF", "46THOR", "86THOR", "124THOR", "34TOA", "74TOA", "113TOA", "1BFF", "2BFF", "3BFF", "25BFF", "70CW", "103CW", "133CW", "45AvX", "109AvX", "130AvX", "42UXM", "71UXM", "102UXM", "1AvX", "2AvX", "3AvX", "66AvX", "22DrS", "23DrS", "24DrS", "56WF", "92WF", "121WF", "16TMNT", "17TMNT", "18TMNT", "33GAF", "73GAF", "110GAF", "1sk2017", "42BFF", "76BFF", "108BFF", "51UXM", "83UXM", "111UXM", "39THOR", "79THOR", "118THOR", "63AoU", "98AoU", "127AoU", "54IG", "94IG", "134IG", "152IG", "4BAT", "44BAT", "84BAT", "7UXM", "8UXM", "9UXM", "72UXM", "11XFC", "51XFC", "90XFC", "43TOA", "83TOA","122TOA", "31WWE", "32WWE", "33WWE", "3XFC", "43XFC", "83XFC", "4DXM", "5DXM", "6DXM", "44TIW", "45TIW", "46TIW", "12BAT", "52BAT", "117BAT", "12HQ", "13HQ", "14HQ", "1JL", "2JL", "3JL", "38JL", "7XFC", "47XFC", "87XFC", "141FUS", "1SW", "2SW", "3SW", "64WF", "98WF", "127WF", "40DP", "80DP", "120DP", "10TMNT", "11TMNT", "12TMNT", "42IG", "82IG", "122IG","16BFU", "17BFU", "18BFU", "38GotG", "78GotG", "114GotG", "37AvX", "68AvX", "101AvX", "30IG", "70IG", "110IG", "40WWE", "41WWE", "42WWE", "35TOA", "75TOA", "114TOA", "39IG", "79IG", "119IG", "146IG", "40XMF", "41XMF", "42XMF", "43THOR", "83THOR", "121THOR", "7AvX", "8AvX", "9AvX", "77AvX", "32GotG", "72GotG", "109GotG", "37BFU", "38BFU", "39BFU", "25YGO", "53YGO", "87YGO", "19IG", "59IG", "99IG", "32IG", "72IG", "112IG", "135TOA", "19BFU", "20BFU", "21BFU", "13DrS", "14DrS", "15DrS", "18GotG", "58GotG", "96GotG", "23GAF", "63GAF", "119GAF", "27GotG", "67GotG", "104GotG", "10AvX", "11AvX", "12AvX", "78AvX", "16AvX", "17AvX", "18AvX", "91AvX", "8AvXop", "10WWE", "11WWE", "12WWE", "19AvX", "20AvX", "21AvX", "92AvX", "36THOR", "76THOR", "115THOR", "18BAT", "58BAT", "97BAT", "35THOR", "75THOR", "114THOR", "37XFC", "77XFC", "113XFC", "72WoL", "104WoL", "133WoL", "25GotG", "65GotG", "102GotG", "13SWW", "14SWW", "15SWW", "33IG", "73IG", "113IG", "143IG", "2M2020", "4M2020", "10AvXop", "6DC2016", "68AoU", "103AoU", "138AoU", "63JL", "97JL", "127JL", "32JUS", "33JUS", "34JUS", "1BAT", "41BAT", "81BAT", "4AI", "5AI", "6AI", "2M2016", "62ASM", "98ASM", "127ASM", "40XFC", "80XFC", "116XFC", "36DP", "76DP", "113DP", "4SMC", "5SMC", "6SMC", "41IG", "81IG", "121IG", "72WF", "104WF", "133WF", "22YGO", "51YGO", "84YGO", "55FUS", "91FUS", "120FUS", "30THOR", "70THOR", "110THOR", "61CW", "96CW", "137CW", "64BFF", "96BFF", "124BFF", "24GAF", "64GAF", "101GAF", "22MYST", "23MYST", "24MYST","35BAT", "75BAT", "111BAT", "19SW", "20SW", "21SW", "51AoU", "86AoU", "137AoU", "20CW", "21CW", "22CW", "71CW", "42THOR", "82THOR", "120THOR", "34TIW", "35TIW", "36TIW", "63AvX", "97AvX", "127AvX", "16XFO", "17XFO", "18XFO", "43UXM", "103UXM", "124UXM", "56AvX", "88AvX", "120AvX", "4AIW", "5AIW", "6AIW", "50UXM", "82UXM", "110UXM", "27BFF", "65BFF", "97BFF", "13DP", "53DP", "92DP", "5XFC", "45XFC", "85XFC", "25TIW", "26TIW", "27TIW", "30BAT", "70BAT", "107BAT", "38IG","78IG","118IG","139CW","5DP","45DP","85DP","31THOR","71THOR","111THOR","61WF","96WF","125WF","46TOA","86TOA","130TOA","16DP","56DP","95DP","52WoL","86WoL","135WoL","3BAT","43BAT","83BAT","33DP","73DP","110DP","44ASM","83ASM","114ASM","37GotG","77GotG","113GotG","36BAT","76BAT","112BAT","28WWE","29WWE","30WWE","40IG","80IG","120IG","37DP","77DP","114DP","16Def","17Def","18Def","27THOR","67THOR","107THOR","37TOA","77TOA","116TOA","52THOR","92THOR","128THOR","52BFF","86BFF","127BFF","4AoU","5AoU","6AoU","39AoU","56IG","96IG","136IG","38BAT","78BAT","114BAT","16BIT","17BIT","18BIT","39AvX","70AvX","103AvX","4HHS","5HHS","6HHS","60BFF","92BFF","120BFF","7BFFop","59AoU","94AoU","123AoU","38ASM","78ASM","109ASM","10SWW","11SWW","12SWW","71WoL","103WoL","132WoL","22WF","23WF","24WF","67WF","19WF","20WF","21WF","65WF","59XMF","60XMF","14TOA","54TOA","94TOA","44AoU","82AoU","113AoU","7BFU","8BFU","9BFU","23IG","63IG","103IG","139IG","7TIW","8TIW","9TIW","27BAT","67BAT","104BAT","62JL","96JL","126JL","69FUS","102FUS","131FUS","68WF","100WF","129WF","19DrS","20DrS","21DrS","56XMF","57XMF","58XMF","45JL","83JL","115JL","23JUS","24JUS","49FUS","87FUS","116FUS","16TOA","56TOA","96TOA","51JL","87JL","118JL","33TOA","73TOA","112TOA","12XFC","52XFC","91XFC","13THOR","53THOR","93THOR","7SW","8SW","9SW","4XFC","44XFC","84XFC","13SMC","14SMC","15SMC","40BAT","80BAT","116BAT","47WF","85WF","115WF","46BFF","80BFF","111BFF","62AvX","126AvX","132AvX","9AvXop","36XFC","76XFC","112XFC", "36AoU","76AoU","108AoU","4DOOM","5DOOM","6DOOM","31IG","71IG","111IG","20IG","60IG","100IG","45IG","85IG","125IG","147IG","48IG","88IG","128IG","47IG","87IG","127IG","149IG","7XFO","8XFO","9XFO","16BFF","17BFF","18BFF","39BFF","38AvX","69AvX","102AvX","12AvXop","39UXM","68UXM","99UXM","43IG","83IG","123IG","29IG","69IG","109IG","142IG","9GotG","49GotG","87GotG","1JLL","2JLL","3JLL","51AvX","83AvX","115AvX","15GAF","55GAF","94GAF","6CW","7CW","8CW","40CW","42TOA","82TOA","121TOA","4KI","5KI","6KI","40BFF","74BFF","106BFF","41CW","78CW","110CW","24BAT","64BAT","102BAT","14BAT","54BAT","93BAT","43WoL","81WoL","113WoL","10HHS","11HHS","12HHS","4XMF","5XMF","6XMF","34HHS","35HHS","36HHS","35GAF","75GAF","112GAF","73AoU","105AoU","133AoU","35AvX","65AvX","99AvX","56WoL","89WoL","120WoL","10SMC","11SMC","12SMC","19DOOM","20DOOM","21DOOM","123XFC","22BAT","62BAT","118BAT","22ASM","23ASM","24ASM","73ASM","12GotG","52GotG","90GotG","60AoU","95AoU","124AoU","22XFO","23XFO","24XFO","19SMC","20SMC","21SMC","69CW","102CW","138CW","35ASM","75ASM","107ASM","142ASM","19YGO","48YGO","81YGO","27DPS","67DPS","107DPS","16XMF","17XMF","18XMF","42DPS","82DPS","122DPS","147DPS","43DPS","83DPS","123DPS","148DPS","56DPS","96DPS","136DPS","152DPS","28TIW","29TIW","30TIW","44DPS","84DPS","124DPS","37THOR","77THOR","116THOR","36DPS","76DPS","116DPS","143DPS","53AvX","85AvX","117AvX","31BFU","32BFU","33BFU","52TOA","92TOA","128TOA","23DPS","63DPS","103DPS","40AoU","78AoU","110AoU","7DXM","8DXM","9DXM","29DPS","69DPS","109DPS","49DPS","89DPS","129DPS","151DPS","41DPS","81DPS","121DPS","146DPS","7AIW","8AIW","9AIW","29XMF","30XMF","31XMF","10XFC","50XFC","89XFC","55AoU","90AoU","119AoU","24DPS","64DPS","104DPS","139DPS","18DPS","58DPS","98DPS","138DPS","25DPS","65DPS","105DPS","140DPS","62UXM","94UXM","122UXM","31DPS","71DPS","111DPS","38DPS","78DPS","118DPS","145DPS","19DPS","59DPS","99DPS","35DPS","75DPS","115DPS","17JUS","18JUS","19JUS","48DPS","88DPS","128DPS","150DPS","46CW","82CW","114CW","34WWE","35WWE","36WWE","36IG","76IG","116IG","4TAG","5TAG","6TAG","45TOA","85TOA","124TOA","16DXM","17DXM","18DXM","32SKC","72SKC","112SKC","140SKC","26IG","66IG","106IG","141IG","26DPS","66DPS","106DPS","141DPS","51SKC","91SKC","131SKC","52SKC","92SKC","132SKC","148SKC","35SKC","75SKC","115SKC","142SKC","53SKC","93SKC","133SKC","149SKC","54SKC","94SKC","134SKC","150SKC","40SKC","80SKC","120SKC","145SKC","17SKC","57SKC","97SKC","20SKC","60SKC","100SKC","137SKC","18SKC","58SKC","98SKC","48SKC","88SKC","128SKC","146SKC","39SKC","79SKC","119SKC","144SKC","46SKC","86SKC","126SKC","28BAT","68BAT","105BAT","59JL","94JL","124JL","65JL","99JL","129JL","43SKC","83SKC","123SKC","19SKC","59SKC","99SKC","28GAF","68GAF","105GAF","39DPS","79DPS","119DPS","45DPS","85DPS","125DPS","149DPS","54DPS","94DPS","134PDS","28XFC","68XFC","104XFC","51DPS","91DPS","131DPS","6XMF","7XMF","20XFC","60XFC","97XFC","13DXM","14DXM","15DXM","25SKC","65SKC","105SKC","45THOR","85THOR","123THOR","17GAF","57GAF","96GAF","40DPS","80DPS","120DPS","5UXMop","1TAG","2TAG","3TAG","1CW","2CW","3CW","35CW","25BAT","65BAT","103BAT","44SKC","84SKC","124SKC","1XFO","2XFO","3XFO","16JLL","17JLL","18JLL","16XFC","56XFC","94XFC","27XFC","67XFC","103XFC","34XFC","74XFC","110XFC","19JLL","20JLL","21JLL","37IG","77IG","117IG","145IG","28SKC","68SKC","108SKC","52DPS","92DPS","132DPS","55SKC","95SKC","135SKC","151SKC","34SKC","74SKC","114SKC","50SKC","90SKC","130SKC","147SKC","10WoL","11WoL","12WoL","46WoL","33SKC","73SKC","113SKC","141SKC","16IMW","17IMW","18IMW","5GAF","45GAF","84GAF","34DPS","74DPS","114DPS","142DPS","46AoU","84AoU","136AoU","1UXM","2UXM","3UXM","63UXM","19TAG","20TAG","21TAG","16ASM","17ASM","18ASM","69ASM","37YGO","65YGO","100YGO","10ASM","11ASM","12ASM","58ASM","140ASM","38SKC","78SKC","118SKC","143SKC","41SKC","81SKC","121SKC","40AvX","71AvX","104AvX","51IG","91IG","131IG","22TAG","23TAG","24TAG","4BIT","5BIT","6BIT","13MYST","14MYST","15MYST","17DPS","57DPS","97DPS","137DPS","22SKC","62SKC","102SKC","37WF","77WF","135WF","2BFFop","32BFF","70BFF","102BFF","121GotG","5WoL","6WoL","38WoL","11BAT","51BAT","91BAT","31SKC","71SKC","111SKC","22DPS","62DPS","102DPS","46AI","47AI","48AI","50THOR","90THOR","126THOR","28THOR","68THOR","108THOR","48WoL","84WoL","116WoL","48UXM","80UXM","108UXM","37DPS","77DPS","117DPS","144DPS","16DrS","17DrS","18DrS","21DPS","61DPS","101DPS","9JUS","10JUS","11JUS","20DPS","60DPS","100DPS","43XMF","44XMF","45XMF","35JUS","36JUS","37JUS","59UXM","90UXM","119UXM","29GotG","69GotG","106GotG","56SKC","96SKC","136SKC","152SKC","1XMF","2XMF","3XMF","10GotG","50GotG","88GotG","13KI","14KI","15KI","1FUS","2FUS","3FUS","40FUS","22ZHN","23ZHN","24ZHN","1AI","2AI","3AI","49TOA","89TOA","126TOA","19AIW","20AIW","21AIW","35Aou","75AoU","107AoU","16ZHN","17ZHN","18ZHN","140FUS","1ORK","2ORK","3ORK","19ORK","20ORK","21ORK",/*bacs*/ "71JUS", "58BFU", "4TOA", "29FUS", "9M2019", "54TMNT", "28SWW", "137BFF", "33WF", "24HQ", "50WWE", "51WWE", "29IMW", "32AvX", "32WoL", "34JL", "25ASM", "26SWW", "66JUS", "1THOR", "51HHS", "135BFF", "11TOA", "32SWW", "16IG", "12THOR", "5M2016", "33JL", "3IG", "8IG", "49AI", "2THOR", "25WoL", "54HHS", "57AI", "27FUS", "58WWE", "30AoU", "136BFF", "56HHS", "72JUS", "53TIW", "55WWE", "4IG", "8THOR", "23HQ", "25AvX", "30ASM", "52HHS", "34WF", "72XMF", "52BFU", "70JUS", "32UXM", "1JLop", "64XMF", "12IG", "2AvXop", "9THOR", "117YGO", "55TIW", "7TOA","7IG", "68JUS", "6THOR", "65XMF", "26JL", "5IG", "9TOA", "32WF", "58HHS", "32IMW", "70XMF", "10TOA", "33SWW", "9JLop", "3TOA", "26IMW", "131BFF", "66XMF", "30AvX","51AI", "34UXM", "55AI", "8TOA","28IMW","69JUS","5TOA","58TMNT","29AoU","49BFU","138BFF","33AoU","14IG","11THOR","30IMW","113YGO","13IG","57TIW","34FUS","57WWE","57HHS","33WoL","1IG","25JL","51TMNT","49HHS","55BFU","65JUS","132BFF","25SWW","4THOR","67JUS","137TOA","15IG","32ASM","34IMW","32CW","31CW","15DPS","9DPS","29JL","9IG","51BFU","57BFU","1DPS","26FUS","56AI","32JL","14DPS","31SWW","33AvX","10THOR","7DPS","54BFU","9SKC","16SKC","11SKC","8SKC","5SKC","11IG","6DPS","69XMF","1AvXop","3THOR","54WWE","2M2022","26UXM","6AvXop","2TOA","25CW","56WWE","1M2022","3DPS","26CW","3M2022","8DPS","31WoL","13DPS","53BFU","54AI","52AI","24CW","55HHS","31AoU",/*Golden Bans*/ "31UXM", "119YGO", "63YGO", "28UXM", "3BFF" ],
  });
  
  /*
  PDC Prime format:
  P: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL",
       "WoLop", "M2015", "ASM", "FUS" ],  
  */
  
  function convert_to_map(bans) {
    var map = {};
    for (var i in bans) {
      var bit = 1 << "GMPKNT".indexOf(i);
      bans[i].forEach(function (e) {map[e] = (map[e] || 0)|bit;});
    }
    return map;
  }
  
  init(0,avx,'AvX','avx');
   init(1,avxop,'AvXop','avx',['avx']);
  init(2,uxm,'UXM','uxm');
   init(3,uxmop,'UXMop','uxm',['avx','uxm']);
   init(4,uxmop2,'UXMop2','uxm',['avx','uxm']);
  init(5,bff,'BFF','bff');
   init(6,bff_promo,'BFFpr','bff');
  init(7,ygo,'YGO','ygo');
  init(8,dcjl,'JL','jl');
   init(9,dctw,'JLop','jl',['jl']);
   init(10,bff_op,'BFFop','bff',['bff']);
  init(11,aou,'AoU','aou', [], aou_aff);
  init(12,wol,'WoL','wol',[],wol_aff);
   init(13,wol_op,'WoLop','wol',['jl','wol'],wol_aff);
   init(14,aou_op,'M2015','aou',['aou','avx']);
  init(15,asm,'ASM','asm',[],asm_aff);
   init(17,dd_op2016,'D2016','bff',['bff']);
  init(19,fus,'FUS','fus');
  init(20,dc_wf,'WF','wf',[],dc_wf_aff);
   init(21,wkop_2016_dc,'wko16dc','wf',[],dc_wf_aff);
   init(22,wkop_2016_m,'wko16m','asm');
  init(23,tmnt,'TMNT','tmnt',[],tmnt_aff);
  init(24,cw,'CW','cw',[],cw_aff);
   init(18,m_op2016,'M2016','asm',m_op2016_dice,asm_aff);
   init(25,wkop_2016_dd,'wko16dd','fus');
  init(26,gaf,'GAF','gaf',[],gaf_aff);
   init(16,dc_op2016,'DC2016','wol',dc_op2016_dice,dc_op2016_aff);
  init(27,drs,'DrS','drs',[],drs_aff);
  init(28,dp,'DP','dp',[],dp_aff);
  init(29,hhs,'HHS','hhs',[],tmnt_aff);
  init(30,imw,'IMW','imw',[],imw_aff);
  init(31,bat,'BAT','bat',[],bat_aff);
  init(32,def,'Def','def',[],def_aff);
  init(33,m_op2017,'M2017','dp',m_op2017_dice,m_op2017_aff);
  init(34,dc_op2017,'DC2017','bat',dc_op2017_dice,dc_op2017_aff);
  init(35,sww,'SWW','sww',[],bat_aff);
  init(36,smc,'SMC','smc',[],asm_aff);

  init(37,gotg,'GotG','gotg',[],gotg_aff);
  init(38,xfc,'XFC','xfc',[],xfc_aff);
  init(39,toa,'TOA','toa');
  init(40,thor,'THOR','thor',[],thor_aff);
  init(41,sk_op2017,'sk2017','avx');
  init(42,ai,'AI','ai',[],ai_aff);
  init(43,ki,'KI','ki',[],ki_aff);
  init(44,jll,'JLL','jll',[],jll_aff);
  init(45,hq,'HQ','hq',[],hq_aff); 
  init(46,bfu,'BFU','bfu',[],bfu_aff);
  init(47,ork,'ORK','ork',[],ork_aff); 
  init(48,sw,'SW','sw',[],sw_aff);  
  init(49,wd_op2018,'WD2018','bfu');
  init(50,m_op2019,'M2019','ai',m_op2019_dice,m_op2019_aff);
  init(51,jus,'JUS','jus',[],jus_aff);
  init(52,doom,'DOOM','doom',[],doom_aff);
  init(53,myst,'MYST','myst',[],myst_aff);
  init(54,xmf,'XMF','xmf',[],xmf_aff);
  init(55,xfo,'XFO','xfo',[],xfo_aff);
  init(56,dxm,'DXM','dxm',[],dxm_aff);
  init(57,tiw,'TIW','tiw',[],tiw_aff);	
  init(58,aiw,'AIW','aiw',[],aiw_aff);
  init(59,zhn,'ZHN','zhn',[],zhn_aff);
  init(60,wwe,'WWE','wwe',[],wwe_aff);	
  init(61,bit,'BIT','bit',[],bit_aff);
  init(62,tag,'TAG','tag',[],tag_aff);
  init(63,ig,'IG','ig',[],ig_aff);
  init(64,m_op2020,'M2020','ig',m_op2020_dice,m_op2020_aff);
  init(65,dps,'DPS','dps',[],dps_aff);
  init(66,m_op2022,'M2022','dps',m_op2022_dice,m_op2022_aff);
  init(67,skc,'SKC','skc',[],skc_aff);
  init(68,msw,'MSW','msw',[],msw_aff);
   
  Array.prototype.extend = function (a) {
      a.forEach(function(x){this.push(x)},this);
  }
  var rows = [];
  var dn = 0;
  
  if (localStorage !== undefined && "current_team" in localStorage) {
    nv_load_current_team(localStorage.current_team);
  }
  var lastteamsortkey = undefined;
  function teamsort(key) {
    var idxs = team.map(function(e,i){return i});
    var ak = key - 1;
    var sign = key === lastteamsortkey ? -1 : 1;
    lastteamsortkey = sign === 1 ? key : undefined;
    idxs.sort(function(ai,bi){
      var a = team[ai], b = team[bi];
      if (a.sk[ak] === undefined) return b.sk[ak] === undefined ? 0 : 1;
      if (b.sk[ak] === undefined) return -1;
      if (a.sk[ak] < b.sk[ak]) return -sign;
      if (a.sk[ak] > b.sk[ak]) return sign;
      return ai - bi;
    });
    team = idxs.map(function(e) { return team[e] });
    team_update();
  }
  function team_drag(ev) {
      ev.dataTransfer.setData("nr", ev.target.dataset.nr);
  }
  function team_drag2(ev) { ev.preventDefault(); }
  function team_drag3(ev) {
    var tr = ev.target;
    for (var tr = ev.target; tr && !tr.dataset.nr; tr = tr.parentNode)
      ;
    if (!tr || ev.dataTransfer.getData("nr") == tr.dataset.nr) return;
    var srcpos = team.findIndex(function(e) {return e.nr == ev.dataTransfer.getData("nr")});
    var src = team.splice(srcpos, 1)[0];
    var dstpos = team.findIndex(function(e) {return e.nr == tr.dataset.nr});
    if (srcpos <= dstpos) dstpos++;
    team.splice(dstpos, 0, src);
    lastteamsortkey = undefined;
    team_update();
  }
  function make_draggable(e) {
    e.setAttribute('draggable', 'true');
    e.addEventListener('dragstart', team_drag, false);
    e.addEventListener('dragover', team_drag2, false);
    e.addEventListener('drop', team_drag3, false);
  }
  document.addEventListener("dragstart", function( event ) {
    if (!event.target) return;
    event.target.style.opacity = .5;
  }, false);
  document.addEventListener("dragend", function( event ) {
    if (!event.target) return;
    event.target.style.opacity = "";
  }, false);
  
  function display_pic(a) {
    var t = '';	
	t += '<table data-nr="'+a.nr+'" class="cardimage"><tr><td class="edit">';    
    t += '<button class="dec" id="dec'+a.nr+'" onclick="click_minus('+a.nr+');event.stopPropagation();">-</button>';
    t += '</td><td class="edit">';
    t += '<button class="inc" id="dec'+a.nr+'" onclick="click_plus('+a.nr+');event.stopPropagation();">+</button>';
    t += '</td><td class="team teamcount" id="team'+a.nr+'">'
    t += '</td></tr><tr><td colspan="3">';
	if(a.html.indexOf('<hr>') > 0)
		t += '<div class="cardimageboxflip">';
	else
		t += '<div class="cardimagebox">';
    t += '<div class="im_costbg"></div>';
    t += '<div class="im_cost">'+a.cost+'</div>';
    if (a.energyimg != '0') t += '<div class="im_energy"><img src="e'+a.energyimg+'.png"></div>';
    if (a.affiliationimg != '0') t += '<div class="im_aff"><img src="a'+a.affiliationimg+'.png"></div>';
    t += '<div class="im_title"><span class="im_main">'+a.mainname+'</span><br><span class="im_sub">'+a.subname+'</span></div>';
    t += '<div class="im_text">'+a.text+'</div>';
    t += '<div class="im_rarity r'+a.rarity+'"></div>';
    if (tdccode(a.nr)){ 
		if(a.html.indexOf('<hr>') > 0)
		  t += '<img class="ci_imgflip" draggable="false" src="' + tdcaddress(a.nr) + '">';
		else
			t += '<img class="ci_img" draggable="false" src="' + tdcaddress(a.nr) + '">';
	}
    t += '</div>';
    t += '<td></tr></table>';
    return t;
  }
  function display_team() {
    try {
		var teamDisp = [];

		for(var i = 0; i < team.length; i++){
			//need to make a copy of the object for color change
			//don't want to do a reference
			teamDisp.push(JSON.parse(JSON.stringify(team[i])));
			//don't do the red when on view team
			if(mode !== 2){
				var index = rows.findIndex(x => x.name === team[i].name);				
				if(index == -1){
					teamDisp[i].html = teamDisp[i].html.replace("<tr ", "<tr style='background:red' ");
				}
			}
		}
		
        var bac = teamDisp.filter(function (a) {
            return a.type == 2
        });
        var cString = "class='bac' ";
        for (var i = 0; i < bac.length; i++) {
            var html = bac[i].html;
            var newHtml = [html.slice(0, 4), cString, html.slice(4)].join('');
            bac[i].html = newHtml;
        }
        var oth = teamDisp.filter(function (a) {
            return a.type != 2
        });
        var bactxt = bac.map(function (a) {
            return a.html
        }).join('');
        var othtxt = oth.map(function (a) {
            return a.html
        }).join('');
        var all = othtxt + '<tr><td style="background-color: transparent;">&nbsp;</td>' + bactxt;
        var allpic = oth.map(display_pic).join('') + bac.map(display_pic).join('');
        var num_bac = 0, num_cards = 0, num_dice = 0;
        for (var i = 0; i < team.length; i++) {
            if (team[i].type != 2) {
                num_dice += team_num[team[i].nr];
                num_cards++;
            } else {
                num_bac++;
            }
        }
        team_serial = oth.concat(bac).map(function (a) {
            return team_num[a.nr] + 'x' + num2cardname(a.nr)
        }).join(';');
        team_coloncode = oth.concat(bac).map(function (a) {
            return ':' + tdccode(a.nr) + ':'
        }).join(' ');
        E('team').innerHTML = all;
        E('teampic').innerHTML = allpic;
        if (mode == 1) {
            var team_rows = E('team').getElementsByTagName('TR');
            for (var i = 0; i < team_rows.length; i++) make_draggable(team_rows[i]);
            team_rows = E('teampic').getElementsByTagName('TABLE');
            for (var i = 0; i < team_rows.length; i++) make_draggable(team_rows[i]);
        }
        E('teamstatus').innerHTML = 'Cards: ' + num_cards + ', Dice: ' + num_dice + ', Basic Actions: ' + num_bac + '.';
        hideelem('nonempty');
        hideelem('empty');
        if (team.length > 0) showelem('nonempty');
        else showelem('empty');
        maketeamlink();
    }
    catch(err){
       //there was error with the team saved in the cache.  Clear it and start over.
        clearteam(false);
    }
  }
  function display() {
      var changed = false;
      if (mode != 2) {
    var inc = 50;
    while ((!dn || document.body.scrollHeight - document.body.scrollTop - 30 <= window.innerHeight) && dn < rows.length) {
        var txt = rows.slice(0,dn+=inc).map(function(a){return a.html}).join('');
        if (dn < rows.length) txt += '<tr><td colspan="15">...Loading</td></tr>'
        E('main').innerHTML = txt;
        changed = true;
    }
    if (changed) team_update();
    if (changed && mode == 3) collection_update();
    else collection_status_update();
      }
      if (mode == 2) {
    team_status_update();
    display_saved_teams();
      }
      if (changed) {
    hideelem(total_dice_mode ? 'tdm0' : 'tdm1');
    showelem(total_dice_mode ? 'tdm1' : 'tdm0');
      }
  }
  function display_all() {
      dn = 0;
      E('main').innerHTML = '';
      hidecardpreview();
      display();
  }
  function getcheckboxval(name,count) {
      var res = 0;
      var element = E('search_'+name+'_on');
      if (element && element.style.display === 'none') return (1<<count)-1;
      for (var i = 0; i < count; i++)
    if (E(name + i).checked) res += 1<<i;
      return res;
  }
  function getactivesets(count) {
	  var res2 = [];
	  var element = E('search_set_on');
	  for (var i = 0; i < count; i++)
		if (E('set' + i).checked) res2.push(set_names[i]);
	  return res2;
  }
  var lastfilter = {};
  var lastsearch = "";
  function filter() {
      var set = {};
      set.n = E('filt0').value;
      set.name = E('filt1').value.toLowerCase();
      set.text = E('filt2').value.toLowerCase();
      set.type = set.energy = set.rarity = set.gender = set.set = 0;
      set.set = getactivesets(set_names.length);//getcheckboxval('set',set_names.length);
      set.type = getcheckboxval('type',3);
      set.energy = getcheckboxval('energy',5);
      set.rarity = getcheckboxval('rarity',6);
      set.cost_max = E('cost_max').selectedIndex;
      set.cost_min = E('cost_min').selectedIndex;
      set.gender = getcheckboxval('gender',3);
      set.incollection = E('incollection').value;
      set.informat = E('informat').value ? 1 << "GMPKNT".indexOf(E('informat').value) : 0;
      set.affiliation = '';
      var all = E('search_affiliation_on').style.display === 'none';
      for (var i = 0; i < affiliation_properites.length; i++)
    set.affiliation += all || E('affiliation'+i).checked ? '1' : '0';
      rows = dofilter(set);
      E('count').innerHTML = rows.length;
      sort();
      makesearchlink();
  }
  function regexfilter(v) {
      if (v.indexOf("&") >= 0 || v.indexOf("|") >=0 || v.indexOf("~") >=0 || v.indexOf("^") >=0){
    return new RegExp(v.split(/ *\| */).map(function(a){return '^'+a.split(/ *\& */).map(function(a){
		if(a.startsWith("^")){
			var aa = a.replace('^', '');
			return "(?="+aa.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&')+")";
		}
		else{
			var aa = a.replace(/^~ */,'');
			return (a === aa ? "(?=.*" : "(?!.*")+aa.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&')+")";
		}
    }).join('')}).join('|'));
      }
  }
  function dofilter(set) {
      var k0 = set.n;
      var k1 = set.name;
      var k2 = set.text;
      var k3 = set.type, k4 = set.energy, k5 = set.rarity, k6, k7 = set.gender;
      var incol = set.incollection;
      var infor = set.informat;
	  var sets = set.set === undefined ? [] : set.set;
	  var bans = set.bans;
      //var sets = set.set === undefined ? -1 : set.set;
      var rows = [];
      k6 = 1 << set.cost_max + 1;
      k6 -= 1 << set.cost_min;
      if (!sets) sets = -1;
      if (k6 < 0) k6 = 0;
	  /*if(sets>0){
		  for (var i = 0; i < set_names.length; i++) {
		if (sets & (1 << i)) rows.extend(trs_by_set[i]);
		  }
	  }*/
	  if(sets.length > 0){
		 for (var i = 0; i < set_names.length; i++) {
			if (sets.indexOf(set_names[i]) > -1) rows.extend(trs_by_set[i]);
		  }
	  }
      function f0(e) {
    return e.nr%1000==k0;
      }
      function f1(e) {
    return e.name.indexOf(k1)>=0;
      }
      function f2(e) {
    return e.txt.indexOf(k2)>=0;
      }
      function f3(e) {
    return 0 != ((1 << e.type) & k3);
      }
      function f4(e) {
    return 0 != (e.energy & k4);
      }
      function f5(e) {
    return 0 != ((1 << e.rarity) & k5);
      }
      function f6(e) {
    return 0 != ((1 << e.cost) & k6);
      }
      function f7(e) {
    return 0 != ((1 << e.gender) & k7);
      }
      function f8(e) {
    for (var i = 0; i < set.affiliation.length; i++) if (set.affiliation[i] === '1') {
        if (affiliation_set[affiliation_properites[i].name][e.nr]) return true;
    }
    return false;
      }
      function f9(e) {
    return 0 != (e.formats & infor);
      }
	  function f10(e) {
		  /*var set = parseInt(e.nr.toString().substring(0, e.nr.length-3));
		  var cardNum = e.nr.toString().substring(e.nr.length-2, e.nr.length);
		  cardNum = cardNum.replace(/^0+/, '');
		  var card = cardNum+setnames[set];*/
    return urlbans.indexOf(e.nr.toString()) == -1;
      }
      if (incol === 'C') rows = rows.filter(function (e) { return havecards.get(e.nr)>0; });
      if (incol === 'N') rows = rows.filter(function (e) { return havecards.get(e.nr)===0; });
      if (incol === 'W') rows = rows.filter(function (e) { return havecards.get(e.nr) < wantcards.get(e.nr); });
      if (incol === 'H') rows = rows.filter(function (e) { return havecards.get(e.nr) > wantcards.get(e.nr); });
      if (k0) rows = rows.filter(f0);
      if (k1) {
    var k1a = regexfilter(k1);
    rows = rows.filter(k1a ? function(e){return e.name.match(k1a);} : f1);
      }
      if (k2) {
    var k2a = regexfilter(k2);
    rows = rows.filter(k2a ? function(e){return e.txt.match(k2a);} : f2);
      }
      if (k3 && k3 != 7) rows = rows.filter(f3);
      if (k4 && k4 != 31) rows = rows.filter(f4);
      if (k5 && k5 != 63) rows = rows.filter(f5);
      if (k6 && k6 != 2047) rows = rows.filter(f6);
      if (k7 && k7 != 7) rows = rows.filter(f7);
      if (infor) rows = rows.filter(f9);
	  if(urlbans.length >0) rows = rows.filter(f10);
      if (set.affiliation && set.affiliation.indexOf('0') >= 0 && set.affiliation.indexOf('1') >= 0) rows = rows.filter(f8);
      return rows;
  }
  function directfilter(t) {
    var set = decodeProp(t);
    var res = dofilter(set);
    console.log(set);
    console.log(res);
    return;
  }
  var skeys = [ 1 ];
  function sort() {
      rows.sort(function(a,b){
    for(var i = 0; i < skeys.length; i++) {
        var ak = Math.abs(skeys[i])-1;
        if (a.sk[ak] === undefined) return b.sk[ak] === undefined ? 0 : 1;
        if (b.sk[ak] === undefined) return -1;
        if (a.sk[ak] < b.sk[ak]) return -skeys[i];
        if (a.sk[ak] > b.sk[ak]) return skeys[i];
    }
    return 0;
      });
      display_all();
  }
  function setsort(col) {
      if (Math.abs(skeys[0]) == col) {
    skeys[0] = -skeys[0];
      } else if (col == 1) {
    skeys = [ 1 ];
      } else {
    var i = skeys.indexOf(col);
    if (i < 0) i = skeys.indexOf(-col);
    if (i > 0) skeys.splice(i, 1);
    skeys.unshift(col);
      }
      for(var i = 1; i <= 23; i++) {
    E('sorti'+i).innerHTML = '&nbsp;';
      }
      for(var i = 0; i < skeys.length; i++) {
    E('sorti'+Math.abs(skeys[i])).innerHTML = skeys[i] > 0 ? i ? '&#9663;': '&#9660;' : i ? '&#9653;': '&#9650;';
      }
      sort();
      makesearchlink();
  }
  function clearfilters_checkbox(name,count) {
      E('search_'+name+'_on').style.display = 'none';
      E('search_'+name+'_off').style.display = 'block';
      for (var i = 0; i < count; i++) {
    E(name + i).checked = false;
      }
  }
  function clearfilters() {
      clearfilters_checkbox('type', 3);
      clearfilters_checkbox('energy', 5);
      clearfilters_checkbox('rarity', 6);
      E('cost_min').selectedIndex = 0;
      E('cost_max').selectedIndex = 10;
      clearfilters_checkbox('gender', 3);
      clearfilters_checkbox('affiliation', affiliation_names.length);
      E('filt0').value = '';
      E('filt1').value = '';
      E('filt2').value = '';
      E('incollection').selectedIndex = 0;
      E('informat').selectedIndex = 0;
      filter();
  }
  function setcheckbox(name,set,all) {
      var element = E('search_'+name+'_on');
      if (element) {
    element.style.display = set === undefined ? 'none' : 'block';
    element = E('search_'+name+'_off');
    element.style.display = set === undefined ? 'block' : 'none';
    if (set === undefined) set = [];
      }
      for (var i = 0; i < all.length; i++) {
    E(name + i).checked = set === undefined || set.indexOf(all[i]) >= 0;
      }
  }
  function getcheckbox(name,all) {
      var res = '', sep = '';
      var allchecked = true;
      var element = E('search_'+name+'_on');
      if (element && element.style.display === 'none') return undefined;
      for (var i = 0; i < all.length; i++) {
    var checked = E(name + i).checked;
    if (checked) {
        res += sep + all[i];
        if (typeof all !== 'string') sep = '.';
    } else {
        allchecked = false;
    }
      }
      return allchecked ? undefined : res;
  }
  function settextbox(name,set) {
      E(name).value = set === undefined ? '' : set;
  }
  function gettextbox(name) {
      var val = E(name).value;
      return val === '' ? undefined : val;
  }
  function setselectbox(name, set, dflt) {
    E(name).selectedIndex = set === undefined ? dflt : set;
  }
  function getselectbox(name, dflt) {
    var val = E(name).selectedIndex;
    return val === dflt ? undefined : val;
  }
  function setfilters(set) {
      setcheckbox('type', set.type, 'CAB');
      setcheckbox('energy', set.energy, 'GMFBS');
      setcheckbox('rarity', set.rarity, 'BCURSP');
      setcheckbox('gender', set.gender, 'MFO');
      setselectbox('cost_min', set.mincost, 0);
      setselectbox('cost_max', set.maxcost, 10);
      var s = set.set === undefined ? undefined : set.set.toLowerCase().split('.');
      setcheckbox('set', s, set_names);
      var s = set.affiliation === undefined ? undefined : set.affiliation.toLowerCase().split('.');
      console.log(s);
      setcheckbox('affiliation', s, affiliation_names);
      settextbox('filt0', set.n);
      settextbox('filt1', set.name);
      settextbox('filt2', set.text);
      setselectbox('informat', set.format === undefined ? undefined : "GMPKNT".indexOf(set.format) + 1, 0);
      if (set.sort !== undefined)
    skeys = set.sort.split('.');
      filter();
  }
  function addtosearchlink(name, val) {
      if (val === undefined) return '';
      return '&' + encodeURIComponent(name) + '=' + encodeURIComponent(val);
  }
  function makesearchlink() {
      var container = E('permalink');
      var loc = window.location;
      var link = loc.protocol + '//' + loc.host + window.location.pathname + '?search';
      var search = '';
      search += addtosearchlink('type', getcheckbox('type', 'CAB'));
      search += addtosearchlink('energy', getcheckbox('energy', 'GMFBS'));
      search += addtosearchlink('rarity', getcheckbox('rarity', 'BCURSP'));
      search += addtosearchlink('mincost', getselectbox('cost_min',0));
      search += addtosearchlink('maxcost', getselectbox('cost_max',10));
      search += addtosearchlink('gender', getcheckbox('gender', 'MFO'));
      search += addtosearchlink('set', getcheckbox('set', set_names));
      search += addtosearchlink('affiliation', getcheckbox('affiliation', affiliation_names));
      search += addtosearchlink('n', gettextbox('filt0'));
      search += addtosearchlink('name', gettextbox('filt1'));
      search += addtosearchlink('text', gettextbox('filt2'));
      search += addtosearchlink('format', E('informat').value ? E('informat').value : undefined);
      link += search;
      if (skeys.length != 1 || skeys[0] != 1)
    link += addtosearchlink('sort', skeys.join('.'));
      if (container) {
    container.innerHTML = link;
    container.href = link;
      }
      search += addtosearchlink('incollection', E('incollection').value ? E('incollection').value : undefined);
      lastsearch = search;
  }
  function maketeamlink() {
    var container = E('teamlink');
    if (!container) return;
    var loc = window.location;
    var link = loc.protocol + '//' + loc.host + window.location.pathname + '?view';
    link += '&cards=' + team_serial;
    if (team_name !== "Unnamed")
      link += '&name=' + encodeURIComponent(team_name);
    container.innerHTML = link;
    container.href = link;
    E('trpcodes').innerHTML = team_coloncode;
  }
  function print_team_sheet() {
    var w = open("", '_blank');
    w.document.body.innerHTML = '<img id="img">';
    w.document.getElementById('img').onload = function() {w.print();w.close()};
    w.document.getElementById('img').src=maketeamsheet();
  }
  function maketeamsheet() {
    var bac = team.filter(function(a){return a.type == 2});
    var oth = team.filter(function(a){return a.type != 2});
    var num_dice = 0;
  var r='';
  r+='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 765 990" height="990" width="765">';
  r+='<g transform="matrix(1.25 0 0 -1.25 0 990)" font-family="Calibri, Arial Black, Arial" font-size="12">';
  r+='<path d="M17.715 606.66h73.233v72H17.715v-72zM320.18 606.66h112.77v72H320.18v-72zM17.697 555.82h578.5v24h-578.5v-24zM17.697 459.34h578.5v24h-578.5v-24zM17.697 238.54h511v24h-511v-24zM17.697 183.29h578.5v24h-578.5v-24z" fill="#bfbfbf"/>';
  r+='<path d="M90.947 679.16v-73m-73.732 48.5H294.21m-276.995-24H294.21m-276.495 48.5v-73m275.995 73v-73m-276.495 72.5H294.21m-276.995-72H294.21M432.95 679.16v-73m-113.27 48.5h277m-277-24h277m-276.5 48.5v-73m276 73v-73m-276.5 72.5h277m-277-72h277M17.197 555.82H596.7m-579.503-21.6H596.7m-579.003 46.1v-68.2m578.503 68.2v-68.2m-579.003 67.7H596.7m-579.503-67.2H596.7M240.7 459.84v-197.8m216 197.8v-197.8m72 197.8v-221.8M17.197 459.34H596.7m-579.503-24H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7M17.697 483.84v-245.8M596.2 483.84v-245.8M17.197 483.34H596.7M17.197 238.54H596.7M142.2 207.79V74.795m141 132.995V74.795m102 132.995V74.795M17.197 183.29H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7m-579.503-21.6H596.7M17.197 96.895H596.7M17.697 207.79V74.795M596.2 207.79V74.795M17.197 207.29H596.7M17.197 75.295H596.7" stroke="#000"/>';
  r+='<g font-weight="bold" font-size="14">';
  r+='<text transform="matrix(1 0 0 -1 159.84 741.79)" font-size="28">Dice Masters Team Sheet</text>';
  r+='<text transform="matrix(1 0 0 -1 68.16 699.43)" font-size="18">Tournament Information</text>';
  r+='<text transform="matrix(1 0 0 -1 390.94 699.43)" font-size="18">Player Information</text>';
  r+='<text transform="matrix(1 0 0 -1 24.91 661.94)">Date:</text>';
  r+='<text transform="matrix(1 0 0 -1 24.91 637.94)">Event:</text>';
  r+='<text transform="matrix(1 0 0 -1 24.91 613.94)">Location:</text>';
  r+='<text transform="matrix(1 0 0 -1 253.82 563.11)">Basic Action Cards</text>';
  r+='<text transform="matrix(1 0 0 -1 327.43 661.94)">Name:</text>';
  r+='<text transform="matrix(1 0 0 -1 327.43 637.94)">Email:</text>';
  r+='<text transform="matrix(1 0 0 -1 327.43 613.94)">WES Username:</text>';
  r+='<text transform="matrix(1 0 0 -1 239.66 466.61)">Character/Action Cards</text>';
  r+='<text transform="matrix(1 0 0 -1 116.28 442.61)">Title</text>';
  r+='<text transform="matrix(1 0 0 -1 325.9 442.61)">Subtitle</text>';
  r+='<text transform="matrix(1 0 0 -1 474.36 442.61)">Card #</text>';
  r+='<text transform="matrix(1 0 0 -1 537.36 442.61)"># of Dice</text>';
  r+='<text transform="matrix(1 0 0 -1 160.94 245.78)">Total Number of Character/Action Dice</text>';
  r+='<text transform="matrix(1 0 0 -1 56.04 190.51)">Round #</text>';
  r+='<text transform="matrix(1 0 0 -1 160.03 190.51)">Opponent’s Name</text>';
  r+='<text transform="matrix(1 0 0 -1 314.62 190.51)">Initials</text>';
  r+='<text transform="matrix(1 0 0 -1 426.96 190.51)">Match Result (W/L/D)</text>';
  r+='</g>';
  r+='<text transform="matrix(1 0 0 -1 76.92 168.31)">1</text>';
  r+='<text transform="matrix(1 0 0 -1 76.92 146.71)">2</text>';
  r+='<text transform="matrix(1 0 0 -1 76.92 125.11)">3</text>';
  r+='<text transform="matrix(1 0 0 -1 76.92 103.51)">4</text>';
  r+='<text transform="matrix(1 0 0 -1 76.92 81.91)">5</text>';
  if (bac[0]) r+='<text transform="matrix(1 0 0 -1 24.91 540.91)">1. '+bac[0].mainname+'</text>';
  if (bac[1]) r+='<text transform="matrix(1 0 0 -1 24.91 519.31)">2. '+bac[1].mainname+'</text>';
  oth.forEach(function(e,i) {
  var y = 420.40 - 21.6*i;
  num_dice+=team_num[e.nr];
  r+='<text transform="matrix(1 0 0 -1 24.91 '+y+')">'+(i+1)+'. '+e.mainname+'</text>';
  r+='<text transform="matrix(1 0 0 -1 250 '+y+')">'+e.subname+'</text>';
  r+='<text transform="matrix(1 0 0 -1 465 '+y+')">'+setnames[e.nr/1000|0].toUpperCase()+' #'+e.nr%1000+'</text>';
  r+='<text transform="matrix(1 0 0 -1 565 '+y+')" text-anchor="end">'+team_num[e.nr]+'</text>';
  });
  r+='<text transform="matrix(1 0 0 -1 565 245.78)" text-anchor="end">'+num_dice+'</text>';
  r+='</g></svg>';
  return 'data:image/svg+xml;charset=utf8,'+encodeURIComponent(r);
  }
  function showlink() {
      if (E('permalink')) {
    E('showlink').innerHTML = 'Show Search Link';
    E('linkloc').innerHTML = '';
      } else {
    E('showlink').innerHTML = 'Hide Search Link';
    E('linkloc').innerHTML = '<a id="permalink" href=""></a>';
    makesearchlink();
    if (window.getSelection) {
        var range = document.createRange();
        range.selectNodeContents(E('linkloc'));
        window.getSelection().addRange(range);
    }
      }
  }
  function clearsets(val) {
      for(var i = 0; i < set_names.length; i++) {
    E('set' + i).checked = val;
      }
      update_affiliations();
      filter();
  }
  function selectsets(val) {
      for(var i = 0; i < set_names.length; i++) {
		  if(val === 'marvel'){
			  if(marvelsets.indexOf(i) > -1){
				  E('set' + i).checked = true;
			  }else{
				  E('set' + i).checked = false;
			  }			  
		  }
		  else if(val === 'dc'){
			  if(dcsets.indexOf(i) > -1){
				  E('set' + i).checked = true;
			  }else{
				  E('set' + i).checked = false;
			  }
		  }
		  else if(val === 'dnd'){
			  if(dndsets.indexOf(i) > -1){
				  E('set' + i).checked = true;
			  }else{
				  E('set' + i).checked = false;
			  }
		  }		
      }
      update_affiliations();
      filter();
  }
  function num2cardname(a) {
      return a%1000 + setnames[a/1000|0];
  }
  function cardname2num(a) {
      var m = /[^0-9]/.exec(a);
      if (m) {
    var set = setnames.indexOf(a.substring(m.index).toLowerCase());
    if (set > 0) return parseInt(a) + set * 1000;
      }
      return parseInt(a);
  }
  function setteam(set) {
      if (!set.cards) return;
	  //Wallop was re-coded to be in the m2019 OP instead of Thor set.  Adding this to be backwards compatible with old team lists
	  set.cards = set.cards.replace("137thor", "9m2019");
      var cards = set.cards.split(';');
      if (!clearteam()) return;
      if (set.name) team_name = set.name;
      team = cards.map(function(a){var m = /x/.exec(a);var c = cardname2num(a.substring(m.index+1)); team_num[c] = parseInt(a); return trs_all[c];});
      team_search = [];
      team_update();
  }
  function setbans(set) {
      if (!set.bans) return;
      var cards = set.bans.split(';');  
	var setregex = /[A-Za-z]+/g;
	//var cardregex = /[0-9]+/g;
	var cardregex  = /[^A-Za-z]*/;
	for (i = 0; i < cards.length; i++) {
		//var set = cards[i].toLowerCase().match(setregex);
		var card = parseInt(cards[i].match(cardregex));
		var set = cards[i].replace(card.toString(), "").toLowerCase();
		var index = setnames.indexOf(set);
		var newcard = index.toString() + pad(card, 3);
		cards[i] = newcard;
	}
	urlbans = cards;
  }
	function pad(num, size) {
		var s = num+"";
		while (s.length < size) s = "0" + s;
		return s;
	}

  var trpsetname = {
      avx:'avx',
      avxop:'avxop',
      uxm:'uxm',
      uxmop:'uxmop',
      bff:'bff',
      bffpr:"bffpromo",
      ygo:'ygo',
      jl:"jul",
      aou:'aou',
      wol:'wol',
      asm:'asm',
      fus:'fus',
      wf:'wrf',
      cw:'cwr',
  };
  function trpcode(nr) {
      var sn = trpsetname[setnames[nr/1000|0]];
      if (!sn) return '';
      return sn+(nr%1000);
  }
  function trpaddress(nr) {
      var code = trpcode(nr);
      if (!code) return '';
      return 'http://www.thereservepool.com/images/smilies/cards/'+code+'large.jpg';
  }
  //list of sets currently available on TDC CardService
  var tdcsetname = {
      avx:'avx',      
      uxm:'uxm',      
      bff:'bff',      
      ygo:'ygo',
      jl:'jl',
      aou:'aou',
      wol:'wol',
      asm:'asm',
      fus:'fus',
      wf:'wf',
      cw:'cw',
	  drs:'drs',
	  dp:'dp',
	  imw:'imw',
	  def:'def',
	  smc:'smc',
	  gotg:'gotg',
	  xfc:'xfc',
	  thor:'thor',
	  ai:'ai',
	  ki:'ki',
	  gaf:'gaf',
	  bat:'bat',
	  sww:'sww',
	  toa:'toa',
	  tmnt:'tmnt',
	  hhs:'hhs',
	  jll:'jll',
	  hq:'hq',
	  bfu:'bfu',
	  ork:'ork',
	  sw:'sw',
    imp:'imp',
    jus:'jus',
    doom:'doom',
    myst:'myst',
	xmf:'xmf',
	xfo:'xfo',
	dxm:'dxm',
	tiw:'tiw',
	aiw:'aiw',
	zhn:'zhn',
	wwe:'wwe',
	tag:'tag',
	bit:'bit',
	ig:'ig',
	dps:'dps',
	skc:'skc',
	msw:'msw',
	
	  //op sets]
	m2022:'m2022',
	m2020:'m2020',
    m2019:'m2019',
    wd2018:'wd2018',
	  sk2017:'sk2017',
	  m2017:'m2017',
	  m2016:'m2016',
	  m2015:'m2015',
	  m2014:'m2014',
	  uxmop2:'m2014',
	  uxmop:'uxmop',
	  avxop:'avxop',	  
	  dc2017:'dc2017',
	  dc2016:'dc2016',
	  dc015:'dc2015',
	  wolop:'wolop',
	  jlop:'jlop',
	  d2016:'d2016',
	  d2015:'d2015',	
	  bffop:'bffop',
	  bffpr:'bffpr',
	  wko16dd:'wko16dd',
	  wko16m:'wko16m',
    wko16dc:'wko16dc',    	  	  
  };
  
  function tdccode(nr) {
      var sn = tdcsetname[setnames[nr/1000|0]];
      if (!sn) return '';
      return sn+(nr%1000);
  }
  
  //check for card in setnames for TDC. If it doesn't exist, try it in TRP list.
  function tdcaddress(nr) {      
	  var sn = tdcsetname[setnames[nr/1000|0]];
	  if (!sn){ return trpaddress(nr);}
	  var cardNum = nr%1000;
      return 'http://dicecoalition.com/cardservice/Image.php?set='+sn+'&cardnum='+cardNum+'&res=l';
  }
  
  function visualize_team_link() {
      var f = function(x){
    return addtosearchlink(type, tdccode(x.nr));
      };
      var loc = window.location;
      var pn = window.location.pathname;
      var link = loc.protocol + '//' + loc.host + pn.substring(0,pn.lastIndexOf('/')) + '/view.html?view';
      var type = 'c';
      var oth = team.filter(function(a){return a.type != 2}).map(f);
      var type = 'b';
      var bac = team.filter(function(a){return a.type == 2}).map(f);
      E("visual_team_link").href = link + oth.join('') +bac.join('');
  }
  function hidecol(col) {
    var tables = C("mm");
    for (var i = 0; i < tables.length; i++)
      tables[i].classList.remove(col);
  }
  function showcol(col) {
    var tables = C("mm");
    for (var i = 0; i < tables.length; i++)
      tables[i].classList.add(col);
  }
  function hideelem(prop) {
    var tables = C("show_"+prop);
    for (var i = 0; i < tables.length; i++)
      tables[i].classList.add("hide");
  }
  function showelem(prop) {
    var tables = C("show_"+prop);
    for (var i = 0; i < tables.length; i++)
      tables[i].classList.remove("hide");
  }
  function setmode(newmode) {
    mode = newmode;
    if(localStorage) localStorage.mode = mode;
    hidecol("edit");
    hidecol("team");
    hidecol("collection");
    hideelem("mode0");
    hideelem("mode1");
    hideelem("mode2");
    hideelem("mode3");
    showelem("mode"+mode);
    if (mode == 0) {
    } else if (mode == 1) {
      showcol("edit");
      showcol("team");
      click_plus = team_click_plus;
      click_minus = team_click_minus;
      team_update();
    } else if (mode == 2) {
      showcol("team");
      team_update();
    } else if (mode == 3) {
      showcol("edit");
      showcol("collection");
      click_plus = collection_click_plus;
      click_minus = collection_click_minus;
      collection_update();
    }
    display_all();
  }
  function teamdisplaymode(v) {
    modeteampic = v;
    if (localStorage) localStorage.modeteampic = v;
    if (v) {
      hideelem('teamlist');
      showelem('teampic');
    } else {
      hideelem('teampic');
      showelem('teamlist');
    }
  }
  function decodeProp(prop) {
      var set = {};
      prop = prop.split('&');
      for (var i = 0; i < prop.length; i++) {
    var dat = prop[i].split('=');
    var p1 = dat[0];
    var p2 = decodeURIComponent(dat[1]);
    set[p1] = p2;
      }
      return set;
  }
  function update_affiliations() {
      var s = getcheckboxval('set', set_names.length);
      if (!s) s = -1;
      for (var i = 0; i < affiliation_properites.length; i++) {
    var m = affiliation_in_sets[affiliation_properites[i].name];
    //TODO: we've got an issue trying to limit these based on the checkbox due to bitshifting beyond 32bit
    //E('affiliationbox'+i).style.display = s & m ? 'inline' : 'none';
    E('affiliationbox'+i).style.display = 'inline';
      }
  }
  var txt = '';
  for (var i = 0; i < affiliation_properites.length; i++)
      txt += '<span id="affiliationbox'+i+'"><input type="checkbox" id="affiliation'+i+'"><img src="'+affiliation_properites[i].pic+'.png"></span>'
  E('search_aff').innerHTML = txt;
  for (var i = 0; i < affiliation_properites.length; i++)
      E('affiliation'+i).addEventListener('change',function() { filter() },false);
  setmode(mode);
  teamdisplaymode(modeteampic);
  if (window.location.search) {
      var prop = window.location.search.substring(1);
      var set = decodeProp(prop);
      if (set.hasOwnProperty('search')) {
        setmode(0);
        setfilters(set);
      } else if (set.hasOwnProperty('view')) {
        setmode(2);
        setteam(set);
      }
	  if (set.hasOwnProperty('bans')) {
		  setbans(set);
	  }
      history.replaceState("", document.title, window.location.pathname);
  }
  filter();
  update_affiliations();
  set_edit_mode(E('edit_mode').value);
  E('filt0').addEventListener('keyup',function() { var v = E('filt0').value; if(lastfilter.filt0 !== v) filter(); lastfilter.filt0 = v; },false);
  E('filt0').addEventListener('change',function() { var v = E('filt0').value; if(lastfilter.filt0 !== v) filter(); lastfilter.filt0 = v; },false);
  E('filt1').addEventListener('keyup',function() { { var v = E('filt1').value; if(lastfilter.filt1 !== v) filter(); lastfilter.filt1 = v; } },false);
  E('filt1').addEventListener('change',function() { { var v = E('filt1').value; if(lastfilter.filt1 !== v) filter(); lastfilter.filt1 = v; } },false);
  E('filt2').addEventListener('keyup',function() { { var v = E('filt2').value; if(lastfilter.filt2 !== v) filter(); lastfilter.filt2 = v; } },false);
  E('filt2').addEventListener('change',function() { { var v = E('filt2').value; if(lastfilter.filt2 !== v) filter(); lastfilter.filt2 = v; } },false);
  for (var i = 0; i < set_names.length; i++)
      E('set'+i).addEventListener('change',function() { filter(); update_affiliations(); },false);
  E('type0').addEventListener('change',function() { filter() },false);
  E('type1').addEventListener('change',function() { filter() },false);
  E('type2').addEventListener('change',function() { filter() },false);
  E('energy0').addEventListener('change',function() { filter() },false);
  E('energy1').addEventListener('change',function() { filter() },false);
  E('energy2').addEventListener('change',function() { filter() },false);
  E('energy3').addEventListener('change',function() { filter() },false);
  E('energy4').addEventListener('change',function() { filter() },false);
  E('rarity0').addEventListener('change',function() { filter() },false);
  E('rarity1').addEventListener('change',function() { filter() },false);
  E('rarity2').addEventListener('change',function() { filter() },false);
  E('rarity3').addEventListener('change',function() { filter() },false);
  E('rarity4').addEventListener('change',function() { filter() },false);
  E('rarity5').addEventListener('change',function() { filter() },false);
  E('cost_min').addEventListener('change',function() {
    var a = E('cost_min');
    var b = E('cost_max');
    if (a.selectedIndex > b.selectedIndex) b.selectedIndex = a.selectedIndex;
    filter()
  },false);
  E('cost_max').addEventListener('change',function() {
    var a = E('cost_min');
    var b = E('cost_max');
    if (a.selectedIndex > b.selectedIndex) a.selectedIndex = b.selectedIndex;
    filter()
  },false);
  E('gender0').addEventListener('change',function() { filter() },false);
  E('gender1').addEventListener('change',function() { filter() },false);
  E('gender2').addEventListener('change',function() { filter() },false);
  E('incollection').addEventListener('change',function() { filter() },false);
  E('informat').addEventListener('change',function() { filter() },false);
  window.addEventListener("scroll", function() { display() });
  window.addEventListener("resize", function() { display() });
  for (var i = 1; i <= 23; i++)
    E('sort'+i).addEventListener('click',function(x){return function() { setsort(x) }}(i),false);
  for (var i = 1; i <= 8; i++)
    E('teamsort'+i).addEventListener('click',function(x){return function() { teamsort(x) }}(i),false);
  E('clear').addEventListener('click',function() { clearfilters() },false);
  E('setall').addEventListener('click',function() { clearsets(true) },false);
  E('setmarvel').addEventListener('click',function() { selectsets('marvel') },false);
  E('setdc').addEventListener('click',function() { selectsets('dc') },false);
  E('setdnd').addEventListener('click',function() { selectsets('dnd') },false);
  E('setnone').addEventListener('click',function() { clearsets(false) },false);
  E('showlink').addEventListener('click',function() { showlink() },false);
  var lastcardpreview = undefined;
  var preloadpreview0 = new Image();
  var preloadpreview1 = new Image();
  var lastcardpreviewtr = undefined;
  function hidecardpreview() {
      hideelem('cardpreview');
      lastcardpreview = undefined;
      lastcardpreviewtr = undefined;
  }
  function showcardpreview(tr) {
      var cardpreview = E('cardpreview');
      var nr = tr ? parseInt(tr.dataset.nr) : 0;
      if (nr === lastcardpreview || !nr || !tdcaddress(nr))
          return hidecardpreview();
      var prevnr = tr.previousElementSibling && tr.previousElementSibling.childNodes[5] ? parseInt(tr.previousElementSibling.childNodes[5].id.substring(4)) : 0;
      var nextnr = tr.nextElementSibling && tr.nextElementSibling.childNodes[5] ? parseInt(tr.nextElementSibling.childNodes[5].id.substring(4)) : 0;
      var rect = tr.childNodes[7] ? tr.childNodes[7].getBoundingClientRect() : undefined;
      showelem('cardpreview');
	  var width = 368;
	  if(tr.innerHTML.indexOf('<hr>') > 0){
		  width = 736;
	  }
      lastcardpreview = nr;
      lastcardpreviewtr = tr;
      if (rect && window.innerHeight > 800 && window.innerWidth > 500) {
          cardpreview.style.top = (rect.bottom + window.pageYOffset)+'px';
          cardpreview.style.left = (rect.left + window.pageXOffset)+'px';
          cardpreview.style.height = '521px';
          cardpreview.style.width = width +'px';
          cardpreview.style.position = 'absolute';
      } else {
          var w = window.innerWidth *0.8;//- 4;
          var h = window.innerHeight *0.8;//- 4;
          if (h / w > 521 / width) {
              h = w / width * 521;
          } else {
              w = h / 521 * width;
          }
          cardpreview.style.height = h + 'px';
          cardpreview.style.width = w + 'px';
          cardpreview.style.top = ((window.innerHeight - 4 - h) / 2) + 'px';
          cardpreview.style.left = ((window.innerWidth - 4 - w) / 2) + 'px';
          cardpreview.style.position = 'fixed';
          if (rect) window.scrollTo(0,rect.top + window.pageYOffset);
      }
      cardpreview.src = '';
      cardpreview.src = tdcaddress(nr);
      if (nextnr) preloadpreview0.src = tdcaddress(nextnr);
      if (prevnr) preloadpreview1.src = tdcaddress(prevnr);
  }
  for (var i = 0; i < C('mm').length; i++) {
      C('mm')[i].addEventListener('click',function(ev) {
          var t = ev.target;
    var lasttd, lasttr;
    while (t && t.classList && !t.classList.contains('m')) {
        if (t.tagName === 'TD') lasttd = t;
        if (t.dataset.nr) lasttr = t;
        t = t.parentNode;
    }
          if (lasttd && lasttd.classList.contains('totaldicetoggle')) {
        total_dice_mode = !total_dice_mode;
        hideelem(total_dice_mode ? 'tdm0' : 'tdm1');
        showelem(total_dice_mode ? 'tdm1' : 'tdm0');
    } else if (lasttr) {
              showcardpreview(lasttr);
    }
      }, false);
  }
  E('cardpreview').addEventListener('click',function() { hidecardpreview() },false);
  var touchstarttime = undefined;
  var touchstartX, touchstartY, touchid;
  E('cardpreview').addEventListener('touchstart', function(e){
      var touchobj = e.changedTouches[0];
      touchstartX = touchobj.pageX;
      touchstartY = touchobj.pageY;
      touchid = touchobj.identifier;
      touchstarttime = new Date().getTime();
      e.preventDefault();
  }, false);
  E('cardpreview').addEventListener('touchmove', function(e){ e.preventDefault() }, false); 
  E('cardpreview').addEventListener('touchend', function(e){
      var touchobj = e.changedTouches[0];
      var distX = touchobj.pageX - touchstartX;
      var distY = touchobj.pageY - touchstartY;
      var elapsedTime = new Date().getTime() - touchstarttime;
      e.preventDefault();
      if (elapsedTime <= 500 && Math.abs(distX) > 20 && Math.abs(distY) < Math.abs(distX)) {
          showcardpreview(distX < 0 ? lastcardpreviewtr.nextElementSibling : lastcardpreviewtr.previousElementSibling);
      } else {
          hidecardpreview();
      }
  }, false)
  // hidecol("extra");
  // if (screen.width < 400) {
  //   hidecol("extra");
  // }
  // window.addEventListener('orientationchange', function() { screen.width < 400 ? hidecol("extra") : showcol("extra"); });
  // TODO
  // save team
  // - fix link update when saved with a new name
  // - fix add random update when no results
  // !!rerolling teams
  // - add reroll button to the team
  // - add reroll button to each card
  // collection
  // - limit card want to 1? easy want mode?
  // - resiliancy: undo?
  // !- proper backup saving
  // - date in export name
  // !!- trade reports
  // !!-- minimum have rarity
  // -- match your collection
  
  // Script for side navigation
  function w3_open() {
      var x = document.getElementById("mySidebar");
      x.style.width = "300px";
      x.style.paddingTop = "10%";
      x.style.display = "block";
  }
  // Close side navigation
  function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
  }
  // Used to toggle the menu on smaller screens when clicking on the menu button
  function openNav() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
      } else { 
          x.className = x.className.replace(" w3-show", "");
      }
  }
  </script>
</body>
</html>