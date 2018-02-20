
<html>
<head>
  <meta charset="UTF-8">
  <title>The Dice Coalition Team Builder</title>
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
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <script>
    "use strict";

    var iconname = {
     M:"mask",F:"fist",B:"bolt",S:"shield",
     EQ:"equip",TDF:"thousand dragon fusion",
     AV:"avengers",VM:"villain",GG:"guardians of the galaxy",ZO:"zombie",1:1,2:2,"2B":"Double Bolt","2F":"Double Fist",
     GOOD:"good",
     DCV:"villain",WT:"teen titan",
     WL:"lantern",WLG:"green lantern", WLB:"blue lantern", WLY:"sinestro corps", WLI:"indigo tribe", WLK:"black lantern", WLR:"red lantern", WC:"conduit",
     Q:"?", "2M":"double mask",
     SF:"spidey friend",4:4,XMEN:'x-men',
     DCLOD:"legion of doom",
     DDM:"monster", EVIL: "evil", NEUTRAL: "neutral", 3:3, 5:5,
     DCB:"batman family", DCS:"superman friends",
     MSHIELD:"shield",
     TURTLE:"turtle",
     CWTB:"thunderbolts",
     DCJL:"justice league", DCSS:"suicide squad", DCA:"team arrow", 0:0, MYSTIC:"mystic",
     MSTARK:"stark industries",
     DCNG:"new gods", A:"action", FLIP:"flip",
     MDFD:"defenders",
    };
    // convert to BW: TDF, AV, VM, GG, ZO, GOOD, SF, XMEN, DCLOD, DDM, DCB, DCS
    var iconid = {
     M:'e1', F:'e2', B:'e3', S:'e4',
     EQ:'eq', TDF:'aA',
     AV:'a2', VM:'a4', GG:'aG', ZO:'aD', 1:'eg1c', 2:'eg2b', "2B":'e33', "2F":'e22',
     GOOD:'dg',
     DCV:"WVbw",WT:"WTbw",
     WL:"WLbw",WLG:"WGbw", WLB:"WBbw", WLY:"WYbw", WLI:"WIbw", WLK:"WKbw", WLR:"WRbw", WC:"WCbw",
     Q:"qu", "2M":'e11',
     SF:"aASF",4:'eg4',XMEN:'a1',
     DCLOD:'aJLL',
     DDM:'aM',EVIL:'db',NEUTRAL:'dn',3:'eg3',5:'eg5',6:'eg6',X:'egx',
     DCB:'aWFB', DCS:'aWFS', "2S":'e44',
     MSHIELD:'aF',
     TURTLE:'aT',
     CWTB:'aCWT',
     DCJL:'a7', DCSS:'aDCSS', DCA:'aDCGA', TT:'WTbw', 0:'eg0', MYSTIC:'aMYSTIC',
     MIH:'aMIH', MDP:'aMDP',
     MSTARK:'aMSTARK',
     DCNG:'aDCNG', A:'action', FLIP:'flip',
     MDFD:'aMDFD',
     BOM:'aMBOM', MEX:'aMEX',
     PAWN:'pawn',
    };
    var raritycolor = ["gray","gray","green","yellow","red"];

    var set_names = ['avx','uxm','bff','ygo','jl','aou','wol','asm','fus','wf','tmnt','cw','gaf','drs','dp','hhs','imw','bat','def','sww','smc','gotg','xfc','toa','thor'];

    var affiliation_names = [
    'no', 'xm', 'av', 'ff', 'vn', 'pf',
    'sh', 'gg', 'zo', 
    'ss', 'sf',
    'nw', 'tb', 'mk', 'm',
    'dp', 'ih',
    'si',
    'def',
    'jl', 'js', 'ld', 'cs',
    'bl', 'gl', 'kl', 'il', 'pl', 'rl', 'ol', 'yl', 'tt', 'co',
    'bat', 'sup',
    'ta', 'ssq', 'wl',
    'ng',
    'ddh', 'ddo', 'ddl', 'dde', 'ddz', 'ddm',
    'turtle',
    'ytd', 'yeg',
    ];
    var affiliation_properites = [
    { name:'none', pic: 'a0' },
    { name:'xmen', pic: 'a1' },
    { name:'avengers', pic: 'a2' },
    { name:'fantastic4', pic: 'a3' },
    { name:'villain', pic: 'a46' },/////
    { name:'brotherhoodofmutants',pic:'aMBOM' },
    { name:'phoenixforce', pic: 'a5' },
    { name:'shield', pic: 'aF' },
    { name:'gotg', pic: 'aG' },
    { name:'exiles', pic:'aMEX'},
    { name:'zombie', pic: 'aD' },
    { name:'sinistersix', pic: 'aASS1' },
    { name:'spideyfriends', pic: 'aASF' },
    { name:'newwarriors', pic: 'aCWW' },
    { name:'thunderbolts', pic: 'aCWT' },
    { name:'marvelknights', pic: 'aMK' },
    { name:'mystic', pic: 'aMYSTIC' },
    { name:'deadpool', pic: 'aMDP' },
    { name:'inhumans', pic: 'aMIH' },
    { name:'starkindustries', pic: 'aMSTARK' },
    { name:'defenders', pic: 'aMDFD' },
    { name:'justiceleague', pic: 'a7' },
    { name:'jsa', pic: 'a8' },
    { name:'legionofdoom', pic: 'aJLL' },////
    { name:'cs', pic: 'aJLC' },
    { name:'bluelantern', pic: 'aWB' },
    { name:'greenlantern', pic: 'aWG' },
    { name:'blacklantern', pic: 'aWK' },////
    { name:'indigo', pic: 'aWI' },
    { name:'purple', pic: 'aWP' },
    { name:'redlantern', pic: 'aWR' },
    { name:'orange', pic: 'aWO' },///
    { name:'yellowlantern', pic: 'aWY' },
    { name:'teentitans', pic: 'aWT' },
    { name:'conduit', pic: 'aWC' },
    { name:'batman', pic: 'aWFB' },
    { name:'superman', pic: 'aWFS' },
    { name:'teamarrow', pic: 'aDCGA' },
    { name:'suicidesquad', pic: 'aDCSS' },
    { name:'whitelantern', pic: 'aDCWL' },
    { name:'newgods', pic: 'aDCNG' },
    { name:'harpers', pic: 'aH90' },
    { name:'order', pic: 'aO90' },
    { name:'lords', pic: 'aL90' },
    { name:'emerald', pic: 'aE90' },
    { name:'zhentarim', pic: 'aZ90' },
    { name:'monster', pic: 'aM90' },
    { name:'turtle', pic: 'aT' },
    { name:'tdf', pic: 'aA' },
    { name:'egyptian', pic: 'aB' },
    ];

    var affiliation_map = {
     0:'none',
     1:'xmen',
     2:'avengers',
     3:'fantastic4',
     4:'villain',
     5:'phoenixforce',
     6:'villain',
     7:'justiceleague',
     8:'jsa',
     9:['legionofdoom','villain'],
     A:'tdf',
     ASF:'spideyfriends',
     ASS:['sinistersix','villain'],
     B:'egyptian',
     BV:'brotherhoodofmutants',
     C:['cs','villain'],
     CWW:'newwarriors',
     CWT:'thunderbolts',
     CWTV:['thunderbolts', 'villain'],
     D:'zombie',
     DCGA:'teamarrow',
     DCNG:'newgods',
     DCSS:'suicidesquad',
     DCWL:'whitelantern',
     E:'emerald',
     MEX:'exiles',
     F:'shield',
     G:'gotg',
     GA:['gotg','avengers'],
     H:'harpers',
     I:['avengers','shield'],
     J:['avengers','gotg'],
     JLC:'cs',
     L:'lords',
     M:'monster',
     MBOMV:['brotherhoodofmutants','villain'],
     MDP:'deadpool',
     MDFD:'defenfers',
     MIH:'inhumans',
     MIHV:['villain','inhumans'],
     MK:'marvelknights',
     MKMYSTIC:['marvelknights','mystic'],
     MSTARKSF:['starkindustries','spideyfriends'],
     MSTARK:'starkindustries',
     MYSTIC:'mystic',
     O:'order',
     T:'turtle',
     WB:'bluelantern',
     WC:'conduit',
     WFB:'batman',
     WFS:'superman',
     WG:'greenlantern',
     WGC:['greenlantern','conduit'],
     WI:'indigo',
     WKV:['blacklantern','villain'],
     WP:'purple',
     WPV:['purple','villain'],
     WR:'redlantern',
     WT:'teentitans',
     WVO:['orange','villain'],
     WVR:['redlantern','villain'],
     WVY:['yellowlantern','villain'],
     WY:'yellowlantern',
     WYC:['yellowlantern','conduit'],
     Z:'zhentarim',
    };

    var affiliation_set = {};
    var affiliation_in_sets = {};

    function affiliation_add_one(nr, aff, set_idx) {
        if (affiliation_set[aff] === undefined) affiliation_set[aff] = {};
        affiliation_set[aff][nr] = true;
        if (affiliation_in_sets[aff] === undefined) affiliation_in_sets[aff] = 0;
        affiliation_in_sets[aff] |= 1 << set_idx;
    }
    function affiliation_add(nr, aff, set_idx) {
        if (!affiliation_map[aff]) {
      console.log('Unknown aff:'+aff);
      return;
        }
        if (affiliation_map[aff].constructor === Array) {
      affiliation_add_one(nr, affiliation_map[aff][0], set_idx);
      affiliation_add_one(nr, affiliation_map[aff][1], set_idx);
        } else {
      affiliation_add_one(nr, affiliation_map[aff], set_idx);
        }
    }




    //BEGIN THOR HACK
    var thor_aff = { 0:'0', I:'MIH', A:'2', V:'6', F:'ASF', G:'G',  S:'MSTARK', M:'MYSTIC', g:'GA', H:'F'};
    // Dice / Genders
    var thor =[
    '04003Archnemesis|Basic Action Card|Target character die you control and target opposing character die deal damage to each other equal to their A.|Global: Pay [S]. Target character die has D equal to it’s A (until end of turn).',
    '03003Big Entrance|Basic Action Card|When purchased, you may add this die to your bag. When used, dice purchased this turn cost 1 less than their printed cost (minimum 1), and may be put directly into your dice bag instead of your Used Pile. (No matter how many Big Entrance dice are used.)',
    '03003Don the Helm|Basic Action Card|Roll a character die from your Used Pile. If it rolls a character face, field it for free. Otherwise, Prep it.',
    '04003Flying Hammer|Basic Action Card|KO target level 1 character die.  ** Instead, KO target level 1 or level 2 character die.|Global: Pay [F]. Target blocked character die deals no damage.',
    '02003Get Thee Hence|Basic Action Card|Deal 1 damage to target player or character die. If you have an active character die with Immortal, instead deal 2 damage.|Global: Pay [B]. Once during your turn, deal 1 damage to target player if you have no character dice in the Field Zone.',
    '03003Investigation|Basic Action Card|Draw and roll 2 dice.',
    '03003Midgard|Basic Action Card|Each time you field a Sidekick die this turn, reduce the fielding cost of another character die by [1] and Prep a die from your bag.',
    '02003Odin\'s Fury|Basic Action Card|Target character die gets +2A and +1D until end of turn.|Global: Pay [2M]. Once during your turn, you may remove one of your character dice from the Field Zone until end of turn.',
    '02003Released from the Ice|Basic Action Card|Prep a die from your Used Pile.',
    '05003Shockwave|Basic Action Card|KO all level 1 character dice.  */** Also, deal 3 damage to target opponent.|Global: Pay [1]. Target level 1 character die is unaffected by action dice this turn.',
    '02003Surprise Attack|Basic Action Card|Deal 1 damage to target character die.  */** Instead, deal 2 damage.',
    '04003Villainous Pact|Basic Action Card|Your opponent chooses one non-Villain character die. All other non-Villain character dice cannot block this turn.|Global: Pay [M]. Once per turn, on your turn, if you have no dice in your Prep Area, you may Prep a die from your bag.',
    '131V4Absorbing Man|Carl "Crusher" Creel|When Absorbing Man attacks or blocks, he may copy the A and/or D value of the character die Absorbing Man is blocking or blocked by.',
    '15104Balder|The Brave|While Balder is blocking or blocked, if both Balder and one of the character dice Balder is engaged with are KO\'d, return Balder to the Field Zone at the same level.',
    '164G4Beta Ray Bill|Simon Walters|Prevent the first 2 damage dealt to each Beta Ray Bill character die each turn.',
    '12104Billy Club|Strike True|Deal 2 damage to target character die.  */** If Daredevil is active, also deal 2 damage to another target character die or opponent.',
    '142V4Blackheart|Evil Incarnate|While Blackheart is active, when you field a [B] character die, Blackheart gets +2A and +2D (until end of turn).',
    '13404Chipmunk Hunk|Tomas Lara-Perez|While Chipmunk Hunk is the character die in the Field Zone with the highest purchase cost, he gets +2A and +2D.',
    '122I4Crystal|Crystalia Amaquelin|While Crystal is active, during your Roll and Reroll Step, you may reroll your action dice an additional time.',
    '132F4Daredevil|The Good Kind of Noise|Daredevil deals double damage to [M] character dice.',
    '142V4Destroyer|Skyfather\'s Design|Destroyer must attack each turn (if able). When Destroyer attacks, it gets +1A (until end of turn).',
    '161M4Enchantress|Spellbound|While Enchatress is active, the first time you or one of your character dice is damaged each turn, prevent that damage.',
    '15304Fandral|The Dashing|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) When Fandral attacks, the opposing character die with the highest purchase cost must block him.',
    '16104Heimdall|The All-Seeing|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) When fielded, draw a die. If it is a character die withImmortal, field it for free at level 1. Otherwise, Prep it.|Global: Pay [M]. Once per turn, on your turn, you may Prep 2 Sidekick dice from your Used Pile.',
    '161V4Hela|The Death Queen|When fielded, each player may Prep up to 3 non-Sidekick dice from their Used Pile.',
    '15204Hogun|The Grim|Intimidate|While Hogun is active, Fandral and Volstagg get +2A and +2D and gain Intimidate.',
    '162A4Hulk|Power of Attorney|While Hulk is active, when a different character die you control is damaged, spin Hulk up 1 level. If you cannot, deal 2 damage to target opponent.|Global: Pay [F]. Target character die gets +1A until end of turn.',
    '143S4Iron Man|Amalgam of Metal|Iron Man gets +1D for each opposing [B] character die in the Field Zone.',
    '12404Jane Foster|Hospital Romance|Ally|When Jane Foster is KO\'d, you may field a Thor character die from your Used Pile for free on the same level Jane Foster was on.',
    '14204Jarnbjorn|And My Axe|Replace target character die\'s A with double its printed A (until end of turn).',
    '134I4Karnak|The Shatterer|Deadly',
    '121A4Kate Bishop|Young Avenger|When fielded, you lose life equal to Kate Bishop\'s D.',
    '153M4Loki|The Maker of Mischief|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) While Loki is active, whenever a Global Ability is used, any player may pay [B] to cancel it.',
    '143V4Malekith|The Accursed|While Malekith is active, when you use an action die, Prep a die from your bag.',
    '14304Mjolnir|Whosoever Holds This Hammer|KO all level 1 character dice other than Thor.    ** Also, KO all level 2 character dice.',
    '16204Mr. Fixit|Muscle For Hire|When Mr. Fixit is damaged, he gets +XA, where X is his printed A value (until end of turn).',
    '124H4Nick Fury|Commanding the Commandos|While Nick Fury and an opposing [B] character die are active, you may field character dice for free.',
    '16404Odin|The All-Father|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.)',
    '123S4Pepper Potts|Virginia|Pepper Potts can\'t attack.    While Pepper Potts is active, draw an extra die at the beginning of your Clear and Draw Step. If it is a non-Sidekick die, Prep it.',
    '15304Punisher|Wedding Day Massacre|When Punisher deals damage to an opponent, you may purchase a Punisher character die for [1].',
    '163V4Ragnarok|Codename: Lightning|When Ragnarok attacks, deal 1 damage to all opposing character dice.',
    '143F4SP//dr|Mechanized|While SP//dr is active, double all damage dealt to [B] character dice.',
    '144H4Samantha Wilson|Project: Rebirth|While Samantha Wilson is active, when you field a Sidekick die, draw and roll a die.|Global: Pay [S]. Prevent 1 damage to target character die or player.',
    '15104Sif|The Stunning|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) While Thor is active, Sif gets +3A.',
    '171V4Surtur|The Fire Giant|Breath Weapon 2(Pay [2] to deal 2 damage to your opponent and all their character dice.)',
    '13404The Bifrost|Rainbow Road|Until the end of the turn, when you field a character die, you may move one copy of that character die from your Used pile to the Field Zone at the same level.',
    '163A4Thor (M)|A Journey Into Mystery|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.)|Global: Pay [2B]. Once per turn, deal 1 damage to target character die.',
    '164A4Thor (F)|Warrior\'s Spirit|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) Thor cannot be damaged by [B] character dice or action dice.|Global: Pay [S]. Target attacking character die goes to the Used Pile if KO\'d this turn.',
    '161S4Thorbuster Iron Man|Model 22|Thorbuster Iron Man gets +4A and +4D while blocking, and when blocked by, Thor character dice.',
    '152A4US Agent|John Walker|When fielded, you may sacrifice a Sidekick die. If you do, Prep 2 dice from your Used Pile.',
    '15404Volstagg|The Voluminous|Overcrush|While Volstagg is active, Hogun and Fandral get +2A and +2D and gainOvercrush.',
    '142V4Wrecker|Dirk Garthwaite|While Wrecker is active, your other [B] character dice get +1A and +1D.',
    '231V4Absorbing Man|Harold\'s Ice Cream|While Absorbing Man is active, when a "when KO\'d" effect is used, you may use a copy of that effect.',
    '26104Balder|Barry Landers|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) When Balder is blocked, he gets +2A (until end of turn).',
    '264G4Beta Ray Bill|Shake the Planet to Its Foundation|Beta Ray Bill cannot be targeted by action dice or Global Abilities.',
    '23104Billy Club|Manriki-Gusari|Move target character die to this card. Return it to the Field Zone at end of turn.',
    '242V4Blackheart|Heart of Darkness|While Blackheart is active, when you purchase a [DCV] character die, you may pay [1]. If you do, add it to your bag, and Blackheart gets +1A and +1D (until end of turn).',
    '24404Chipmunk Hunk|Handsome Puncher|While Chipmunk Hunk is active, at the beginning of your turn, you may place a Chipmunk token with 1A and 1D into the Field Zone.',
    '232I4Crystal|Geokinesis|While Crystal is active, when your opponent rolls dice during their Roll and Reroll Step, the first time they roll a character die and it lands on its level 3 face, they must reroll it.',
    '232F4Daredevil|Parker Protector|While Daredevil is active, when an opponent fields a [DCV] character die, Prep a die from your bag.',
    '24204Destroyer|Confronting the Celestials|While Destroyer is active, when a [B] character die is fielded, Destroyer gets +1A and +1D, and gains the [B] affiliation (until end of turn).',
    '261M4Enchantress|The Art of Seduction|While Enchantress is active, when an opposing character die is fielded, that die deals 1 damage to all other opposing character dice.',
    '25304Fandral|Path of Cunning|Deadly|While Fandral is active, Hogun and Volstagg get +2A and +2D and gainDeadly.',
    '26104Heimdall|Guardian of the Bifrost|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) When Heimdall is KO\'d, draw a die. If it is a character die withImmortal, field it for free at level 3. Otherwise, Prep it.|Global: Pay [M]. Once per turn, on your turn, you may Prep 2 Sidekick dice from your Used Pile.',
    '271V4Hela|Stealer of Souls|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.)|While Hela is active, your character dice have Immortal. ',
    '24204Hogun|Path of Mastery|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) When fielded, target opponent Preps a die from their bag.',
    '252A4Hulk|Savage Shulkie|While Hulk is active, when an opponent uses a Global Ability, spin Hulk up 1 level.|Global: Pay [F]. Target character die gets +1A until end of turn.',
    '243S4Iron Man|Demon in a Bottle|While Iron Man is active, when an opponent uses a Global Ability, he gets +1A and +1D (until end of turn).',
    '22404Jane Foster|Survivor|Ally|While Jane Foster is active, your character dice withImmortal have a fielding cost of 0.',
    '23204Jarnbjorn|Iron Bear|Character dice you control with Immortal get +2A and +2D and gainOvercrush(until end of turn).',
    '224I4Karnak|Exploiting Weakness|',
    '231A4Kate Bishop|Hawkingbird|When fielded, deal 1 damage to target opponent.|Global: Pay [M]. Target attacking character die is no longer attacking. (It remains in the Field Zone.)',
    '253M4Loki|Norn Stones|While Loki is active, character dice with Immortal deal only 1 damage.',
    '243V4Malekith|King of the Dark|While Malekith is active, your Sidekick character dice get +1A and +1D, and gain the [DCV] affiliation.',
    '25304Mjolnir|If He Be Worthy|Deal 1 damage to target character die for each [B] in your Reserve Pool.  */** Also deal that same amount of damage to target opponent.',
    '26204Mr. Fixit|Smashing Style|When a character die is KO\'d, Mr. Fixit gets +2A and +2D (until end of turn).',
    '234H4Nick Fury|Agent of H|When fielded, you may KO target level 1 [B] character die.',
    '26404Odin|Wielder of Gungnir|While Odin is active, your other character dice get +1A and +1D.',
    '223S4Pepper Potts|Salt of the Earth|While a single Pepper Potts character die is the only character die in your Field Zone, she gets +3A and +3D.',
    '25304Punisher|Vengeful Widow|When Punisher is KO\'d, roll her and any Punisher character dice in your Used Pile. Deal 1 damage to target opponent for each [B] rolled, then Prep those dice.',
    '263V4Ragnarok|Thou Art No Thor|When Ragnarok attacks, you may pay [2B]. If you do, deal 2 damage to target character die or opponent.',
    '253F4SP//dr|Legacy Lives On|While SP//dr is active, your Sidekick character dice cannot be KO\'d except by combat damage.',
    '254H4Samantha Wilson|Civilian Air Patrol|While Samantha Wilson is active, when a Sidekick die you control deals combat damage to an opponent, Prep a die from your bag.|Globa: Pay [S]. Prevent 1 damage to target character die or player.',
    '25104Sif|Daughter of Asgard|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) Sif gets +1A and +1D for each different character die withImmortal you control.',
    '271V4Surtur|Ancient Menace|Surter gets +2A and +2D for each opposing character die.',
    '23404The Bifrost|Einstein-Rosen Bridge|When you field a character die this turn, you may Prep a die of the same energy type in your Used Pile.  ** Also, Prep a die from your bag.',
    '273A4Thor (M)|A God Amongst Men|While Thor is active, when you would take damage, redirect that damage to Thor.|Global: Pay [2B]. Once per turn, deal 1 damage to target character die.',
    '274A4Thor (F)|Representative of Midgard|When Thor attacks, when she KO\'s an opposing character die with combat damage, gain 2 life.|Global: Pay [S]. Target attacking character die goes to the Used Pile if KO\'d this turn.',
    '261S4Thorbuster Iron Man|A Gift From the Gods|Thorbuster Iron Man costs [1] less to purchase for each active character die with Immortal, to a minimum of 2. (Thorbuster Iron Man does not need to be active to use this ability.)|Global: Pay [2M]. Once during your turn, target opposing character die with Immortal and target character die you control deal damage equal to their A to each other.',
    '252A4US Agent|Super-Patriot|When fielded, you may sacrifice any number of Sidekick dice. If you do, deal 1 damage to target opponent for each die sacrificed by this effect. ',
    '25404Volstagg|Path of Brawn|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) Volstagg cannot be blocked by lower level character dice.',
    '242V4Wrecker|Demolition Man|When Wrecker attacks, target opposing character die must block Wrecker (if able).|Global: Pay [2F]. Target character die must block this turn, and a different target character die gets +1A this turn.',
    '341V4Absorbing Man|Ol\' Ball and Chain|While Absorbing Man is active, when a "when fielded" effect is used, you may use a copy of it.',
    '36104Balder|God of Light and Courage|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) Balder can only be blocked by 2 or more character dice.',
    '374G4Beta Ray Bill|A Worthy Opponent|When Beta Ray Bill attacks, KO target [B] character die of equal or lower level.',
    '33104Billy Club|Tool of Justice|Choose target opposing character die and reroll it. If it rolls an energy face, move it to the Used Pile. Otherwise, return it to the Field Zone at its original level.|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to its [M] face.',
    '352V4Blackheart|The Abyss Gazes Back|While Blackheart is active, other [DCV] character dice you control get +1A and +1D.',
    '34404Chipmunk Hunk|Defender of Punks|When you field a level 1 character die, Chipmunk Hunk gets +1A and +1D (until end of turn).',
    '322I4Crystal|Aerokinesis|While Crystal is active, during your Roll and Reroll Step, you may spin [Q] faces to [PAWN] faces.',
    '332F4Daredevil|Blind Justice|While Daredevil is active, when an opposing [DCV] character die is KO\'d, gain 1 life.',
    '352V4Destroyer|Imbued With Power|Destroyer gets +1A and +1D for each Sidekick character die in your field zone.',
    '361M4Enchantress|Fatal Attraction|While Enchantress is active, your opponents must pay [1] to use a Global Ability or action die.',
    '35304Fandral|13th Century Hoodsman|While Fandral is active, character dice with purchase cost 4 or more cost [1] more to field.',
    '37104Heimdall|None Shall Pass|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) When fielded, draw and roll 1 die for each character die withImmortal in the Field Zone.|Global: Pay [M]. Once per turn, on your turn, you may Prep 2 Sidekick dice from your Used Pile.',
    '361V4Hela|Even in Death…|While Hela is active, when an opposing Immortal character die is KO\'d, Prep a die from your bag.|Global: Pay [6]. Return target die from an opponent\'s Field Zone, Prep Area, or Used Pile to its card. That opponent then chooses target die from your Field Zone, Prep Area, or Used Pile and returns it to its card.',
    '35204Hogun|First to Fall|Immortal (Except when purchased, when this die would go to the Used Pile, instead add it to your bag.) When fielded, all players Prep 2 dice from their bag. If at least one of the dice you Prepped was a character die withImmortal, Prep an additional die.',
    '362A4Hulk|Rules Lawyer|When fielded, if your opponent controls a character die with a higher level than Hulk, deal 4 damage to it and spin Hulk up 1 level.',
    '353S4Iron Man|Bucket of Bolts|While Iron Man is active, once per turn, when you use a Global Ability, Prep a die from your bag.',
    '32404Jane Foster|For Goddess Shalt Thou Be!|Ally|When Jane Foster is active, your character dice with Immortal cost 2 less to purchase (minimum 1).',
    '33204Jarnbjorn|Celestial Destroyer|You may purchase a character die with Immortal for [3] less (minimum 1) and add it to your bag (until end of turn). ** Instead, you may purchase it for [4] less (minimum 1).|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to its [F] face.',
    '334I4Karnak|Magister of the Tower of Wisdom|When fielded, before the Attack Step, the first opposing character die you damage this turn is KO\'d (until end of turn). (If multiple character dice are damaged at once, you choose one.)',
    '331A4Kate Bishop|The Archer\'s Legacy|When fielded, Kate Bishop cannot be blocked by character dice of a higher level.',
    '363M4Loki|Brotherly Hate|When fielded, you may take control of target opposing character die of equal or lower purchase cost and remove Loki from play. At end of turn, return the character die and Loki to the Field Zone under their owner\'s control (regardless of their location).',
    '33304Mjolnir|Possess the Power of Thor|Deal 1 damage to target character die, then deal 2 damage to a target character die that hasn\'t been damaged by this effect. Continue increasing the damage dealt and selecting new targets in this way until a character die is KO\'d or all character dice have been damaged.|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to its [B] face.',
    '37204Mr. Fixit|Joe|When Mr. Fixit KOs an opposing character die with combat damage, target opponent draws 1 less die during their next Clear and Draw Step.',
    '334H4Nick Fury|The Unseen|When fielded, sping each opposing [B] character die down 1 level.',
    '37404Odin|Entering Odinsleep|When fielded, draw 3 dice. Field any drawn character dice with Immortal at level 3 for free. Add the rest to your Used Pile.',
    '323S4Pepper Potts|Behind Every Great Man|While Iron Man is active, Pepper Potts gets +3A and +3D.',
    '36304Punisher|Bringing Down The Exchange|While Punisher is active, each time a character die you control is damaged during an opponent\'s turn, deal 1 damage to target opponent.',
    '353F4SP//dr|Arachnid CPU|While SP//dr is active, when an opposing non-SP//dr ability deals damage to you , deal that same amount of damaget to target opponent. While SP//dr is active, when you are dealt damage, cancel any active effects of previously used action dice. ',
    '354H4Samantha Wilson|Working People, Working Together|While Samantha Wilson is active, when you field a Sidekick die, you may spin a die in your Reserve Pool on an energy face to another aenergy face (if able).|Global: Pay [S]: Prevent 1 damage to target character die or player.',
    '36104Sif|Fairest of the Fair|While Sif is active, if one of your other character dice is damaged, Sif cannot be blocked (until end of turn).',
    '371V4Surtur|Bring Forth Ragnarök|When Surtur KOs an opposing character die, KO all opposing character dice. ',
    '34404The Bifrost|Bridge Between Realms|When you field a character die, you may field target character die in your Used Pile on the same level for free.|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to it\'s [S] face.',
    '361S4Thorbuster Iron Man|Type X Repulsors|While Thorbuster Iron Man is active, character dice with Immortal get -4A.',
    '362A4US Agent|CSA Watchdog|When fielded, KO all your other active character dice. Deal 1 damage to target opponent for each character die KO\'d by this effect.',
    '35404Volstagg|Glutton For Punishment|While Volstagg is active, when an opponent fields a character die, deal 1 damage to it.',
    '342V4Wrecker|Enchanted Crowbar|While Wrecker is active, players can only use the Global Abilities of active characters.',
    '443V4Malekith|13th Son of a 13th Son|While Malekith is active, when you use an action die, you may add it to your bag at the end of the turn (instead of moving it into your Used Pile).|Global: Pay [B]. Once during your turn, KO target character die you control. If you do, reduce the purchase cost of the next action die you purchase by [2].',
    '473V4Ragnarok|Dark Avenger|When fielded, KO all opposing Sidekick dice. You may then choose to KO any number of your Sidekick dice. Deal 1 damage to target opponent for each Sidekick die KO\'d by this effect (both you and your opponent\'s).',
    '464A4Thor (F)|Understand What It Means to Be Mortal|When Thor attacks, until end of turn, prevent the first 2 damage to each or your other attacking character dice.|Global: Pay [S]. Target attacking character die goes to Used Pile if KO\'d this turn.',
    '473A4Thor (M)|Unworthy|While Thor is active, you may sacrifice him. If you do, prevent all damage dealt to you or your character dice (until end of turn).',
    '45401Earth X Captain America|Freedom Fighter|Earth X Captain America can\'t be blocked by [DCV] character dice.|When fielded, if an opponent has more life than you, gain 4 life.|Underdog - When fielded, you may field up to 2 character dice from your Used Pile at level 1 with combined A of 4 or less.',
    '45201Earth X Machine Man|X-51|Opponents can\'t target Earth X Machine Man. Opposing action dice have no effect on Earth X Machine Man.|Underdog - Earth X Machine Man cost 2 less to purchase. (Earth X Machine Man doesn\'t need to be active to use this ability.)',
    '45901Earth X The Skull|Telepathic Awakening|Underdog - When fielded, each player Kos all but 1 of their [M] character dice.|When fielded, your opponent\'s life total cannot go below 1 this turn.',
    '45901Earth X Thor|She Be Worthy|When fielded, if you have less life than an opponent, KO target character die.|When fielded, KO target [DCV] character die.|Underdog - When fielded, KO target character die with fielding cost 0.',
    ];




    //BEGIN TOA Promo -OP
    //var dd_op2017_dice = [ 'dp', 'dp', 'dp', 'dp', 'dp', 'dp'];
    //var dd_op2017 = [


    //BEGIN Tomb of Annihilation
    var toa = [
    '04003n0Burning Hands|Basic Action Card|Deal 1 damage to target character die or player [PAWN] for each different energy type ([B], [F], [M], [S]) you have in your Reserve Pool.  ** Also, deal 1 additional damage if you have a [Q] energy in your Reserve Pool.',
    '04003n0Candlekeep|Basic Action Card|Choose one:|&bull; Draw 2 dice from your bag and roll them.|&bull; Prep two dice from your bag.',
    '03003n0Cone of Cold|Basic Action Card|Deal 1 damage to target character die, deal 2 damage to a different target character die, and deal 3 damage to another different target character die. You may only use this action if there are at least 3 character dice in the Field Zone.|Pay [F]. Target blocked character die gets +2A.',
    '03003n0Create Food and Water|Basic Action Card|Draw dice from your bag until you draw a non-NPC die or your bag is empty. Prep all dice drawn this way.|Global: Pay [1]. Once per turn, draw a die from your bag. Return it to your bag or add it to your Used Pile.',
    '03003n0Guardian of Faith|Basic Action Card|Continuous: Whenever you could use a Global Ability, you can send this die to the Used Pile to have target level 1 attacking character die considered blocked without assigning a character die to block it.  */** Instead, you may target an attacking character die of any level.',
    '02003n0Heavy Armor|Basic Action Card|Equip (Attach to a character with [EQ])  Equipped character die gets +XD, where X is the character die\'s printed D value.  ** Character dice engaged with the equipped character lose, and cannot gain, Overcrush.  This die counts as Gear. This cannot be ignored.|Global: Pay [S]. Target character die gets +1D (until end of turn).',
    '03003n0Heist|Basic Action Card|Target opponent draws 2 dice from their bag. Place one in that opponent\'s Prep Area. Roll the other die and place it in your Reserve Pool. At the end of your turn, place the rolled die in your opponent\'s Used Pile (regardless of where it is).',
    '04003n0Holy Avenger|Basic Action Card|Equip (Attach to a character dice with [EQ])  Equipped character die gets +3A. If the equipped character would be KO\'d, you may instead clear all damage from the equipped die and send Holy Avenger to the Used Pile.  This die counts as Gear. Text cannot be ignored.',
    '01003n0Improvised Weapon|Basic Action Card|Roll a die from your Used Pile. If it rolls a character face, target character die gets +XA (until end of turn), where X is the rolled face\'s A. If it rolls an energy face, Prep a die from your bag. Return the rolled die to your Used Pile.',
    '03003n0Insect Plague|Basic Action Card|Draw every die in your bag. Roll all NPC dice you drew. You may then reroll any number of those NPC dice. Field any of those dice that rolled a character face. Place the rest in your Used Pile.|Global: Pay [M]. Once per turn, target NPC die is unblockable (until end of turn).',
    '03003n0Magic Missile|Basic Action Card|Deal 2 damage to target character die or player.  ** Deal extra damage to a character die equal to the level of your highest level Adventurer in the Field Zone.|Global: Pay [B]. Deal 1 damage to target character die.',
    '04003n0Scorching Ray|Basic Action Card|Draw a die from your bag. Deal damage to target character die or player equal to its purchase cost. Return the die to your bag.',
    '132O4g1Aasimar Paladin|Lesser Order of the Gauntlet|Experience|While Aasimar paladin is active, your Adventurer character dice cannot be targeted or affected by character abilities of Evil characters.',
    '163M4e1Acererak|Terrifying Lich|Attune (While this character is active, when you use an action die, deal 1 damage to target player of character die.)|When fielded, resolve the ** effect of a Basic Action Card.',
    '144M4n0Allosaurus|Lesser Beast|',
    '154M4n0Amber Golem|Lesser Construct|Fabricate 2-5. You may KO 2 character dice with total purchase cost 5 or more to purchase this die for free.|When Amber Golem deals combat damage to a blocking character die, deal damage equal to that blocking character die\'s A to a different opposing character die.',
    '15204g1Artus Cimber|Slow to Trust|While Artus Cimber is attacking, all Evil character dice must block him (if able).',
    '153M4e0Basilisk|Lesser Monstrosity|When fielded, roll target character die from your Used Pile. If it rolls a character face, KO target opposing character die of the same level as the face rolled. Return the rolled die to your Used Pile.',
    '122M4e1Batiri Battle Stack|Lesser Humanoid|Swarm|Batiri Battle Stack gains +1A and +1D for each other Batiri Battle Stack character die in the Field Zone.',
    '134H4g1Birdsong|Lesser Harper|Experience|While Birdsong is active, at the end of each turn, you may spin one of your Adventurer character dice up 1 level.',
    '14404e1Captain Elok Jaharwon|Captain of the Dragonfang|While Captain Elok Jaharwon has gear equipped he gains +3A. Captain Elok Jaharwon counts as a Pirate, this text cannot be ignored.',
    '14404e1Captain Laskilar|Captain of the Stirge|While Captain Laskilar has gear equipped he gains +3A. Captain Laskilar counts as a Pirate, this text cannot be ignored.',
    '113M4n0Chwinga|Lesser Elemental|Swarm|If Chwinga is level 2 or 3, it must attack each turn (if able).',
    '131M4n0Doppelganger|Lesser Monstrosity|When fielded, you may select a target character die you control. If you do, your Doppelganger character dice become copies of that target character die. (The copy has all of the names, subtitles, affiliations, abilities, and stats of the original in place of its own.) They remain copies until another character die is selected or you no longer have any active Doppelganger character dice.',
    '13404n0Dragon Statue Trap|Lesser Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: An opponent attacks you.|&nbsp;|Effect: You may pay [X] to deal X damage to all opposing character dice.',
    '133O4g1Dragonborn Sorcerer|Lesser Order of the Gauntlet|Experience',
    '131E4g1Elf Druid|Lesser Emerald Enclave|Experience|While Elf Druid is active, at the end of your turn, if you control an active Dragon character die, Elf Druid gains an Experience token.',
    '134M4e0Fenthaza|High Priestess|When fielded, swap target character die\'s A and D (until end of turn).',
    '163M4e1Frost Giant|Lesser Giant|While Frost Giant is active, opposing character dice cannot attack. Your opponent may pay 1 per character die to ignore this effect (until end of turn).',
    '152M4g0Gold Dragon|Lesser Dragon|Breath Weapon 1 (Pay [1] to deal 1 damage to your opponent and all their character dice.)|Anti-Breath Weapon X (When an opponent uses a Breath Weapon, you may pay an amount equal to the opponent\'s Breath Weapon cost to cancel the effect.)',
    '132Z4e1Goliath Fighter|Lesser Zhentarim|Experience|While Goliath Fighter is active, at the end of each turn, if 2 or more opposing NPC character dice were KO\'d, Goliath Fighter gains an Experience token.',
    '14104n0Green Devil Mask|Lesser Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: Your opponent has 4 or more active character dice.|&nbsp;|Effect: Your opponent must reroll all of their active character dice. Move any that roll an energy face to their Used Pile.',
    '143H4n1Human Outlander|Lesser Harper|Experience|While Human Outlander is active, during your Roll and Reroll Step, you may reroll one die an additional time.',
    '11204n0Kobold Trap|Lesser Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: An opponent fields a level 2 character die.|&nbsp;|Effect: Choose one of your unpurchased character dice with a purchase cost of 2 or less. Move that character die to your Field Zone on its level 2 side.',
    '13304n0Poison Dart Trap|Lesser Trap|Trap (Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: Your opponent would roll 2 or more of the same non-NPC character die at the same time.|&nbsp;|Effect: Before the roll occurs, place one of those character dice into your opponent\'s Used Pile.',
    '121M4g0Pseudodragon|Lesser Familiar|If you have an active character die with Attune, Pseudodragon costs [1] less to purchase. (Pseudodragon does not need to be active to use this ability.)',
    '142M4e1Queen Grabstab|Batiri Boss|When fielded, field all Batiri Battle Stack character dice in your Used Pile at level 1.',
    '151M4e1Ras Nsi|Banished Paladin|When fielded, you may purchase a gear die for 1 and immediately equip it to Ras Nsi. (You must still meet the energy type purchase requirement of that die.)',
    '173M4e0Red Dragon|Lesser Dragon|Breath Weapon 2 (Pay 2 to deal 2 damage to all opponents and all their character dice.)|Red Dragon\'s Breath Weapon deals an additional 2 damage to Adventurer character.',
    '141M4g0Silver Dragon|Lesser Dragon|Anti-Breath Weapon 1 (When an opponent uses a Breath Weapon, you may pay [1] to reduce the damage done by that Breath Weapon to you and each of your character dice by 1 each.)|When Silver Dragon attacks, it gets +1A (until end of turn).',
    '121M4e0Skeleton Key|Lesser Undead|When fielded, you may move target Trap die in the Field Zone to it\'s owner\'s Used Pile.',
    '154M4n0Stone Golem|Lesser Construct|Fabricate 2-4: You may KO 2 character dice with total purchase cost [4] or more to purchase this die for free.|While Stone Golem is active, prevent 1 combat damage to you from each attacking character die each turn.',
    '131Z4e1Tabaxi Rogue|Lesser Zhentarim|Experience|While Tabaxi Rogue is active, when an opponent draws a die, other than during their Clear and Draw Step, Tabaxi Rogue deals them 1 damage.|Global: Pay [2]. Once per turn, both players Prep a die from their bag.',
    '141M4e1Tomb Dwarf|Lesser Undead|While Tomb Dwarf is active, Trap dice cost you [2] less to purchase (to a minimum of 1).',
    '154M4n0Tomb Guardian|Lesser Construct|Fabricate 2-4: You may KO 2 character dice with total purchase cost [4] or more to purchase this die for free.|While Tomb Guardian is active, prevent the first 1 damage to each of your [DDM] character dice from each source each turn.',
    '152M4n0Triceratops|Lesser Beast|Overcrush|Triceratops cannot be blocked by level 1 character dice.',
    '162M4n0Tyrannosaurus Zombie|Lesser Undead|When fielded, field all Zombie character dice in your Used Pile at level 2.',
    '151M4e1Valindra Shadowmantle|Scholarly Wizard|Energy Drain|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)',
    '14304e1Xandala Cimber|Surrounded By Fools|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|When fielded, spin target opposing Good character die down 1 level (if able).|Global: Pay [1]. Target character die loses its alignment (until end of turn).',
    '152M4e1Yuan-ti Abomination|Lesser Monstrosity|While Yuan-ti Abomination is attacking, after blockers are declared, you may remove target blocking character die from combat for each attacking Yuan-ti Abomination character die. (The character dice they were originally blocking are still considered blocked.)',
    '123M4e1Yuan-ti Pureblood|Lesser Humanoid|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|When you use an action die, your Yuan-ti Pureblood character dice cannot be blocked (until end of turn).',
    '124M4e0Zombie|Lesser Undead|When Zombie KOs an NPC character die, choose one:|• Field a Zombie character die in your Used Pile at level 2.|• Spin all of your active Zombie character Dice up 1 level.',
    '232H4g1Aasimar Paladin|Greater Harper|Experience|Prevent half (rounded up) of the combat damage dealt to Aasimar Paladin by Evil character dice.',
    '263M4e1Acererak|The Eternal|Attune (While this character is active, when you use an action die, deal 1damae to target player or character die.)|While Acererak is active, when you use an action die, the next Evil character you purchase this turn costs 2 less (to a minimum of 1).|Global: Pay [1]. Once per turn, reroll target action die in your Reserve Pool or Field Zone.',
    '254M4n0Allosaurus|Greater Beast|When Allosaurus attacks, it gets +2A (until end of turn).',
    '264M4n0Amber Golem|Greater Construct|Fabricate 2-5: You may KO 2 character dice with total purchase cost [5] or more to purchase this die for free.|When Amber Golem KOs a blocking character die, you may pay [1] to move the KO\'d die to your opponent\'s Used Pile (instead of the Prep Area).',
    '25204g1Artus Cimber|Friend of Dragonbait|While Artus Cimber is active, your non-Evil character dice get +2A and +2D when blocking, or when blocked by, Evil character dice (until end of turn).',
    '243M4e0Basilisk|Greater Monstrosity|Deadly|When Basilisk attacks, target opposing character die must block this turn (if able).',
    '222M4e1Batiri Battle Stack|Greater Humanoid|Swarm|When fielded, you may move an NPC die from your Used Pile under this character die.|While a Batiri Battle Stack character die has an NPC die under it, it gets +1A and +1D, and if it leaves the Field Zone move any NPC dice under it to the Used Pile.',
    '244O4g1Birdsong|Greater Order of the Gauntlet|Experience|When Birdsong attacks, character dice you control get +1A and +2D (until the end of turn).',
    '24404e1Captain Elok Jaharwon|Aspiring Leader|Captain Elok Jaharwon gains +3A for each other different Pirate you control.|Captain Elok Jaharwon counts as a Pirate, this text cannot be ignored.',
    '24404e1Captain Laskilar|Seeking Treasure Seekers|Captain Laskilar gains +3A for each other different Pirate you control.| Captain Laskilar counts as a Pirate, this text cannot be ignored.',
    '223M4n0Chwinga|Greater Elemental|Swarm.| When a NPC is fielded spin each of your Chwinga character dice up 1 level.',
    '231M4n0Doppelganger|Greater Monstrosity|When fielded, your Doppelganger character dice become copies of the active character die with the lowest purchase cost (in case of a tie, you choose). (The copy has all of the names, subtitles, affiliations, abilities, and stats of the original in place of its own.) Doppelganger remains a copy of the original die until another character die is selected or you no longer have any active Doppelganger character dice. If you damage the copied character die the turn Doppelganger copies it, KO that die.',
    '23401n0Dragon Statue Trap|Greater Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: An opponent attacks you.|&nbsp;|Effect: Move an unpurchased Dragon character die from one of your cards to the Field Zone at level 3. Return the die to its card at the end of the turn.',
    '243E4g1Dragonborn Sorcerer|Greater Emerald Enclave|Experience|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|While Dragonborn Sorcerer is active, when your action dice deal damage to a character die or player, increase that damage by 1. If your action die damages more than one character die and/or player, only increase the damage done to one of those character dice or players.',
    '231O4g1Elf Druid|Greater Order of the Gauntlet|Experience|Attune (While this character is active, when you use an action die, deal 1 damage to target player of character die.)',
    '244M4e0Fenthaza|Dender\'s Nightmare Speaker|When fielded, your [S] character dice have A equal to their D (until end of turn).',
    '263M4e1Frost Giant|Greater Giant|Frost Giant cannot be blocked by level 1 character dice.',
    '262M4g0Gold Dragon|Greater Dragon|Breath Weapon 2.|While Gold Dragon is active, when an opposing character die uses Breath Weapon, that Breath Weapon also damages its controller and their character dice.',
    '232L4g1Goliath Fighter|Greater Lords\' Alliance|Experience|Goliath Fighter character dice get +1A and +1D for each gear equipped to them.',
    '24104n0Green Devil Mask|Greater Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger:|Your opponent fields a character die with purchase cost greater than the purchase cost of any character dice you have fielded.|&nbsp;|Effect: Prep 3 dice from your bag.',
    '243E4n0Human Outlander|Greater Emerald Enclave|Experience|While Human Outlander is active, your NPC character dice get +1A and +1D.',
    '21204n0Kobold Trap|Greater Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: Your opponent fields an Adventurer character die.|&nbsp;|Effect: Purchase one of your character dice with Swarm for free and place it into your bag.',
    '22301n0Poison Dart Trap|Greater Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger:|An opponent, during the first roll of their Roll and Reroll Step, rolls 2 or more NPC dice on their character face.|&nbsp;|Effect: Move up to 2 of the NPC dice that rolled a character face to your opponent\'s Used Pile.|*/** Instead, move all of the NPC dice that rolled a character face to your opponent\'s Used Pile.',
    '221M4g0Pseudodragon|Greater Familiar|When fielded, draw a die for each active character die with Attune in your Field Zone.',
    '242M4e1Queen Grabstab|Queen of a Mobile Village|While Queen Grabstab is active, when one of your character\'s Swarm abilities is triggered, draw two dice instead of one.',
    '251M4e1Ras Nsi|The Ravager of Chult|While Ras Nsi has gear equipped, he gets +3A and +3D.',
    '263M4e0Red Dragon|Greater Dragon|Breath Weapon 1',
    '251M4g0Silver Dragon|Greater Dragon|Anti-Breath Weapon X (When an opponent uses a Breath Weapon, you may pay an amount equal to the opponent\'s Breath Weapon cost to cancel the effect.)|While an opponent has more life than you, Silver Dragon\'s Anti-Breath Weapon costs only [1] to cancel any Breath Weapon.',
    '231M4e0Skeleton Key|Greater Undead|While Skeleton Key is active, when a Trap die is triggered, Prep a die from your bag. If it is a Trap die, Prep an additional die from your bag.',
    '254M4n0Stone Golem|Greater Construct|Fabricate 2-4: You may KO 2 character dice with total purchase cost [4] or more to purchase this die for free.|While Stone Golem is active, you may redirect 1 damage from target character die to Stone Golem each turn.',
    '231L4n1Tabaxi Rogue|Greater Lords\' Alliance|Experience|When fielded, move target opposing Trap die from the Field Zone to the Used Pile.',
    '241M4e1Tomb Dwarf|Greater Undead|While Tomb Dwarf is active, when one of your Trap dice triggers, you may pay [1]. If you do, Prep that Trap die (instead of moving it to the Used Pile.',
    '254M4n0Tomb Guardian|Greater Construct|Fabricate 2-4: You may KO 2 character dice with total purchase cost [4] or more to purchase this die for free.|While Tomb Guardian is active, your [DDM] character dice take 2 less damage from action dice.',
    '252M4n0Triceratops|Greater Beast|When fielded, KO target level 1 character die.',
    '262M4n0Tyrannosaurus Zombie|Greater Undead|When fielded, you may purchase a Zombie character die for free and immediately field it at level 2.',
    '251M4e1Valindra Shadowmantle|Power Hungry|Energy Drain|While Valindra Shadowmantle is active, when you use a Basic Action Die, remove 1 Experience token from target opposing Adventurer card.',
    '233M4e1Xandala Cimber|Destined for Greatness|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|When Xandala Cimber would be KO\'d, instead clear all damage from her if your opponent has any active active Good character dice.',
    '252M4e1Yuan-ti Abomination|Greater Monstrosity|When Yuan-ti Abomination attacks, KO target NPC character die.',
    '223M4e1Yuan-ti Pureblood|Greater Humanoid|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|Yuan-ti Pureblood cannot be targeted by action dice or Global Abilities.',
    '234M4e0Zombie|Greater Undead|Regenerate|When Zombie successfully regnerates during the Attack Step, Prep any Zombie character dice in your Used Pile.',
    '332E4g1Aasimar Paladin|Paragon Emerald Enclave|Experience|While Aasimar Paladin is active,if there is an active opposing Evil character die, your NPC character dice get +2A and +1D. ',
    '373M4e1Acererak|Archlich|Attune|Acererak costs [2] less to purchase for each Construct, Undead, Trap, or Ras Nsi die in your Field Zone to a minimum of [3].|(Acererak does not need to be active to use this ability.)',
    '354M4n0Allosaurus|Paragon Beast|Overcrush',
    '364M4n0Amber Golem|Paragon Construct|Fabricate 2-5|When you purchase this die with Fabricate, gain 2 life.|While Amber Golem is active, reduce the character die and purchase cost requirements of Fabricate abilities on your character cards by 1.',
    '35204g1Artus Cimber|Bearer of the Ring of Winter|While Artus Cimber is active, when an Evil character die is fielded, spin that die to level 1.',
    '343M4e0Basilisk|Paragon Monstrosity|Deadly|When Basilisk attacks, reroll all active NPC character dice. Move any that show energy faces to their owner\'s Prep Area.',
    '332M4e1Batiri Battle Stack|Paragon Humanoid|Swarm|&nbsp;|While Queen Grabstab is active, Batiri Battle Stack gets +1A and +1D and when Batiri Battle Stack\'s Swarm ability is triggered, draw two dice instead of one.',
    '344L4g1Birdsong|Paragon Lords\' Alliance|Experience|While Birdsong is active, when you field an Adventurer character die of equal or lower level to your lowest level Birdsong character die, Prep a die from your bag.',
    '34404e1Captain Elok Jaharwon|Ill-mannered Wereboar|While Captain Elok Jaharwon is active, when you purchase an Evil character die, you may pay an additional [1]. If you do, place the purchased character die into your bag (instead of the Used Pile).|Captain Elok Jaharwon counts as a Pirate, this text cannot be ignored.',
    '34404e1Captain Laskilar|Flamboyant Pirate Captain|When fielded, place the next die you purchase this turn into your bag (instead of the Used Pile).|Captain Laskilar counts as a Pirate, this text cannot be ignored.',
    '323M4n0Chwinga|Paragon Elemental|Swarm|When fielded, when Chwinga attacks, it gets +1A (until end of turn).|When Chwinga is KO\'d by non-combat damage, Prep a die from your bag.',
    '32401n0Dragon Statue Trap|Paragon Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: An opponent attacks you.|&nbsp;|Effect: Roll all Dragon dice in your Used Pile. Field any that roll a character face for free. Return the rest to your Used Pile.|** Also, Prep this die when triggered (it is still triggered and its effect still occurs).',
    '353H4g1Dragonborn Sorcerer|Paragon Harper|Experience|When fielded, deal 2 damage to all Evil character dice.',
    '331H4g1Elf Druid|Paragon Harper|Experience|While Elf Druid is active, when a Dragon character die is fielded, Prep a die from your bag.',
    '344M4e0Fenthaza|Dreams of the Black Opal Crown|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|While Fenthaza is active, when you use an action die, character dice you control get +1A (until end of turn).',
    '373M4e1Frost Giant|Paragon Giant|When fielded, deal 4 damage to all Adventurer character dice.',
    '362M4g0Gold Dragon|Paragon Dragon|Breath Weapon 3|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)',
    '332H4g1Goliath Fighter|Paragon Harper|Experience|While Goliath Fighter is active, when you KO an opposing monster character die that is a higher level than the highest level of your active Goliath Fighter character dice, Goliath Fighter gains an additional Experience token at the end of your turn.',
    '33104n0Green Devil Mask|Paragon Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: Three or more of your character dice are KO\'d during an opponent\'s turn.|&nbsp;|Effect: Return all friendly character dice KO\'d this turn to your Field Zone at level 3.',
    '343Z4e1Human Outlander|Paragon Zhentarim|Experience|When Human Outlander is KO\'d, deal 2 damage to target character die or player.',
    '31204n0Kobold Trap|Paragon Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: An opposing NPC die is fielded.|&nbsp;|Effect: Field target character die with Swarm from your Used Pile on its level 3 side.',
    '32301n0Poison Dart Trap|Paragon Trap|Trap (Place in your Field Zone when used. Send to your Used Pile when triggered.)|&nbsp;|Trigger: An opponent attacks you.|&nbsp;|Effect: KO any attacking level 1 character dice.',
    '321M4g0Pseudodragon|Paragon Familiar|While Pseudodragon is active, your Attune character dice deal 2 damage with the Attune ability (instead of 1).',
    '342M4e1Queen Grabstab|Leader of the Biting Ant Tribe|While Queen Grabstab is active, opponents cannot target your character dice with purchase cost 2 or less with action dice or abilities.',
    '351M4e1Ras Nsi|Ruler of the Forbidden City|When you equip Ras Nsi, deal 2 damage to all opposing character dice.',
    '373M4e0Red Dragon|Paragon Dragon|Breath Weapon 2|If the defending player has no active character dice, Red Dragon\'s Breath Weapon deals an additional 2 damage to that opponent.',
    '351M4g0Silver Dragon|Paragon Dragon|Breath Weapon 2|While Silver Dragon is active, Dragons cost [2] less to purchase (minimum 1).',
    '321M4e0Skeleton Key|Paragon Undead|While Skeleton Key is active, it gets +1A and +1D for each Trap die in the Field Zone.',
    '354M4n0Stone Golem|Paragon Construct|Fabricate 2-4. You may KO 2 character dice with total purchase cost 4 or more to purchase this die for free.|While Stone Golem is active, you may redirect 1 damage from you to Stone Golem every turn.?|Global: Pay 2. Once per turn, on your turn, deal 1 damage to each player.',
    '331H4g1Tabaxi Rogue|Paragon Harper|Experience|While Tabaxi Rogue is active, when your opponent fields an NPC character die, you may Prep a die from your bag.',
    '341M4e1Tomb Dwarf|Paragon Undead|While Tomb Dwarf is active, you may reroll your Trap dice an additional time during your Roll and Reroll Step each turn.',
    '344M4n0Tomb Guardian|Paragon Construct|"Fabricate 2-3: You may KO 2 character dice with total purchase cost [3] or more to purchase this die for free.|&nbsp;|While Tomb Guardian is active, Global Abilities cost an additional [1] to use."',
    '362M4n0Tyrannosaurus Zombie|Paragon Undead|While Tyrannosaurus Zombie is active, at the start of your turn, field an NPC die from your Used Pile.|While Tyrannosaurus Zombie is active, your NPC character dice are considered 2A and 2D Zombies (only their name and A and D values change).',
    '34304e1Xandala Cimber|Seeker of the Ring|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|When Xandala Cimber attacks, draw 2 dice from your bag. You may roll any action dice you drew and place the rest (including unrolled action dice) in your Used Pile. Place any rolled dice showing an action face in the Reserve Pool. Prep the other rolled dice.',
    '352M4e1Yuan-ti Abomination|Paragon Monstrosity|Yuan-ti Abomination cannot be blocked by lower level character dice.',
    '324M4e0Zombie|Paragon Undead|When you field an NPC, you may roll a Zombie in your Used Pile. If you roll a character face, KO the fielded NPC character die and field the rolled Zombie character die for free on the face you rolled. If you roll an energy face, place it in your Used Pile. (Zombie dice to not need to be active to use this ability.) ',
    '431M4n0Doppelganger|Epic Monstrosity|When fielded, you may select target opposing character die of equal or lower level to Doppelganger. If you do, your Doppelganger character dice become copies of that target character die. (The copy has all of the names, subtitles, affiliations, abilities, and stats of the original in place of its own.) They remain copies until another character die is selected or you no longer have any active Doppelganger character dice.',
    '442M4n0Triceratops|Epic Beast|While Triceratops is active, when an opponent fields a level 1 character die, deal damage to that die equal to the A of your active Triceratops character die with the highest A.',
    '461M4e1Valindra Shadowmantle|The Right Hand of Szass Tam|Energy Drain 2|&nbsp;|While Valindra Shadowmantle is active, opposing non-evil character dice get -1A and -1D.',
    '423M4e1Yuan-ti Pureblood|Epic Humanoid|Attune (While this character is active, when you use an action die, deal 1 damage to target player or character die.)|&nbsp;|While Yuan-ti Pureblood is active, when you purchase an action die, trigger the Attune ability of all active character dice.',
    '44401n0Kir Sabal|Aarakocra Monastery|Move up to two NPC dice from your Used Pile to the Field Zone on their [Q] side. They are considered 3A and 3D Aarakocra character dice. KO them at the end of the turn.',
    '42301n0Ring of Winter|Epic Magical Object|Move each Dragon character die in your Used Pile to the Field Zone at level 3.|Global: Pay [B]. Once per turn, the next die you purchase with purchase cost 6 or more costs [2] less.',
    '43201n0Staff of the Forgotten One|Epic Magical Object|Until end of turn, when an opposing character die is damaged, KO it.|*/** Also, until end of turn, if you KO 2 or more character dice, Prep 2 dice from your bag.',
    '43101e0The Soulmonger|Ungodly Necromantic Device|At the end of the turn, move each of your Evil character dice that were KO\'d this turn to your Field Zone at level 3.|** Also, deal 2 damage to target opponent for each character die moved to the Field Zone this way.',
    '54003n0Brazen Pegasus|Basic Action Card|Up to two target character dice you control can only be blocked by two or more character dice (until end of turn).',
    ];





    //BEGIN X-Men First Class Hack
    var xfc_aff = { 0:'0', X:'1', V:'6', B:'MBOMV', E:'MEX'};
    var xfc = [
    '134X4Angel|Heaven Sent|While Angel is active, when you use an Action die, spin target character up one level.',
    '142B4Avalanche|Collateral Damage|When Avalanche is KO\'d, KO all level 1 character dice.',
    '131X4Banshee|The Wail of the Banshee|When fielded, deal 1 damage to all opposing character dice.',
    '122X4Beast|Acrobatic Aggression|When Beast is KO\'d, you may add up to 2 dice from your Used Pile to your bag.',
    '154X4Bishop|Finding Fitzroy|Prevent all damage to Bishop from [M] character dice.',
    '151E4Blink|Warp-Powered Crystals|When Blink is KO\'d, you may pay [M]. If  you do, return her to the Field Zone at end of turn (on the same level).',
    '134B4Blob|"Crash" Diet|When fielded, capture all opposing Sidekick dice until Blob leaves the Field Zone or you field another Blob die.',
    '123X4Boom Boom|Time Bomb|While Boom Boom is active, when you use a Basic Action Die, it deals 2 damage to target opponent or character die.',
    '172X4Colossus|Comrade in Arms|When Colossus is KO\'d, if you control a level 3 character die, return Colossus to the Field Zone at level 1 (<em>clear all damage from Colossus</em>).',
    '153X4Cyclops|Boy Scout|Awaken -  deal 3 damage to target character. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '14304Danger Room|Training is Key|Reroll all active character dice. Move any that show energy faces to their owner\'s Used Pile. Return the rest to their owner\'s Field Zone (<em>on their rolled levels</em>).',
    '142X4Doop|Lights! Camera! Action!|When Doop is KO\'d, capture target opposing character die until the start of your next turn.',
    '154V4Emma Frost|Girl\'s Best Friend|When Emma Frost takes damage, redirect 1 damage to target character die. If this damage does not KO it, spin it up 1 level.',
    '144X4Havok|Cosmic Absorption|When Havok takes damage, you may deal equal amount of damage to target opposing character die.',
    '153X4Iceman|Cold Hands, Warm Heart|Awaken -  Once per turn, double Iceman\'s printed A. (<em>until end of turn</em>). (When this dies spins up 1 or more levels, you may use this effect.)',
    '163X4Jean Grey|Mind Over Matter|When fielded, spin all other active character dice to level 1.',
    '123X4Jubilee|Life on the Streets|Awaken -  Deal 1 damage to all opposing character dice. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '164B4Juggernaut|Get Outta My Head Charles!|Awaken -  KO target Sidekick die or move target Sidekick die from your opponent\'s Prep Are to their Used Pile. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '141X4Kitty Pryde|Madam Headmistress|Kitty Pryde cannot be blocked when attacking alone.',
    '161B4Magneto|Vision of a New World|While Magneto is active, at the start of your turn, spin all non-[BOM] dice down 1 level.',
    '131E4Mimic|Borrowed Talent|When fielded, copy the printed A and D of target character die. When a copy of that character die is fielded, draw 2 dice from your bag and Prep them.',
    '141E4Morph|Kevin Sydney|* Whenever a non-Sidekick character die is fielded, Morph becomes a copy of that character die but retains this ability (<em>until end of turn</em>).',
    '151E4Nocturne|Talia Wagner|While Nocturne is active, at the end of your Roll and Reroll Step, you may take control of a character die with 2 or less A (<em>until end of turn</em>).',
    '171V4Onslaught|Feeding Dark Thoughts|Awaken -  Onslaught is unblockable this turn. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '144X4Polaris|Polar Opposites|While Polaris is active, when an opponent uses a Global Ability or Action die, your character dice gain +2D (<em>until end of turn</em>).',
    '161X4Professor X|Peaceful Coexistence|While Professor X is active, at the start of your turn, spin all [XMEN] character dice up 1 level.',
    '143B4Pyro|Firestarter|When Pyro is KO\'d, deal damage to target opposing character die equal to the number of [B] character dice in the Field Zone.',
    '133B4Quicksilver|Terrigenesis|Impulse: You may pay [B]. If you do, during your next Main Step, field Quicksilver for free on his level 1 side (<em>regardless of his location</em>).',
    '142B4Sabretooth|Archenemy|When fielded, spin all your other character dice up 1 level.',
    '152E4Sasquatch|Heather Hudson|While Sasquatch is attacking, after blockers are declared, deal 1 damage to each blocking die.',
    '133B4Scarlet Witch|Careful What You Wish For|While Scarlet Witch is active, during your opponent\'s Roll and Reroll Step, your opponent must reroll any Action dice that land on an Action face and cannot reroll any Action dice on energy faces.',
    '132V4Sebastian Shaw|Black King|',
    '164V4Sentinel|HALT! MUTANT!|While Sentinel is active, when an [XMEN] character die is fielded, deal 2 damage to it\'s controller.',
    '133X4Storm|Queen of Wakanda|When Storm is KO\'d, you may pay [B]. If you do, you may reroll her as if she had Regenerate.',
    '154X4Sunfire|Shiro Yoshida|When fielded, if you fielded another character die this turn, Sunfire gains +2A and +2D (<em>until end of turn</em>).',
    '13404The Blackbird|SR-71|Your opponent must pay 1 to block each of your [XMEN] character dice (<em>until end of turn</em>).',
    '12204The Hellfire Club|Inner Circles|You may field [DCV] for free this turn. When you field a [DCV] this turn, Prep a die from your bag.',
    '142X4Thunderbird|John Proudstar|When Thunderbird attacks, spin all your other [XMEN] character dice up 1 level.',
    '152X4Wolverine|James Howlett|When Wolverine attacks alone, spin him up 1 level.',
    '13104Xavier\'s School|Home for Gifted Youngsters|"Spin all of your character dice up 1 level. |*/** Also, draw a die from your bag. If it is an X-Men character die, field it for free at level 3. Otherwise, Prep it.',
    '234X4Angel|Carrying the Team!|While Angel is active, when you purchase a character die, you may spin all fielded copies of that character up to level 3. ',
    '242B4Avalanche|The Vizer of Vibration|While Avalanche is active, when you use a Basic Action Die, KO target level 1 character.',
    '231X4Banshee|Fallen Hero|While Banshee is active, deal 1 damage to target opponent when they use an Action die.',
    '222X4Beast|Into the Wild Blue Yonder|When Beast is KO\'d during your opponents turn, Prep a Basic Action Die from your Used Pile.',
    '254X4Bishop|Back From the Frontline|While Bishop is attacking, after character dice are assigned to block, you may swap those blocker as desired before combat damage is dealt. (<em>Attacking character die must have the same number of blockers after your swap.</em>)',
    '241E4Blink|Prepared in the Pens|While Blink is active, when you play an Action die, spin target character die up 1 level.',
    '263X4Jean Grey|Professor\'s Protégé|While Jean Grey is active, when an opposing character die is fielded, deal damage to it equal to her level.',
    '244B4Blob|Nothing Moves the Blob!|When fielded, capture target opposing character die until Blob leave the Field Zone.',
    '223X4Boom Boom|Mutate 35|While Boom Boom is active, the first time you use a Global Ability each turn, deal 1 damage to target opponent.',
    '272X4Colossus|Thick Skin|Overcrush|Opposing level 3 character dice cannot block Colossus.',
    '253X4Cyclops|Balancing the Scales|While Cyclops is active, when you field an [XMEN] character die, deal 1 damage to target opponent.',
    '23304Danger Room|Housing Hidden Perils|Until the start of your next turn, when a character die takes damage, KO that character die.',
    '242X4Doop|Uniquely Adapted|Awaken -  Capture target opposing character die (<em>until end of turn</em>).  (When this dies spins up 1 or more levels, you may use this effect.)',
    '244V4Emma Frost|All That Glitters|While Emma Frost is active, prevent the first point of damage dealt to you each turn.',
    '244X4Havok|Protecting the Galaxy|Awaken -  Spend all [S] energy in your Reserve Pool. Deal damage equal to the amount spent to target opponent or character die. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '243X4Iceman|Frosty|When you field a character die, Iceman gets +1A and +1D (<em>until end of turn</em>).',
    '223X4Jubilee|A Real Firecracker|When an opposing character die is KO\'d, spin this character up 1 level. |Awaken -  Deal 1 damage to target opponent.',
    '264B4Juggernaut|Nothing Can Stop Me!|When a Sidekick die is KO\'d, Juggernaut gains +2A and +2D (<em>until end of turn</em>).',
    '241X4Kitty Pryde|Guiding the Past|Awaken -  Kitty Pryde gains +2A and +2D (<em>until end of turn</em>). (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '261B4Magneto|The House of M|While Magneto is active, your [BOM] character dice have Infiltrate.',
    '241E4Mimic|The Big M|When fielded, copy the printed A and D of target character die. When Mimic attacks, if he is not blocked, KO the copied character Die.',
    '241E4Morph|Change of Heart|When fielded, choose a Basic Action Card. When Morph attacks, use the ** version of it\'s effect.',
    '241E4Nocturne|T.J.|While Nocturne is active, once per turn, when your opponent uses a Global Ability with 1 target, you may redirect the effect to another legal target.',
    '261V4Onslaught|Consequences of Tragedy|Onslaught cannot be blocked by higher level character dice.',
    '234X4Polaris|The Devil Had a Daughter|When a character die is KO\'d, spin Polaris up 1 level.',
    '261X4Professor X|Noble Intentions|While Professor X is active, your [XMEN] character dice have +1A and +1D.',
    '243B4Pyro|Bonfire of Vanity|While Pyro is active, if you roll 2 or more BOLTs during your Roll and Reroll Step, deal 2 damage to target opponent.',
    '243B4Quicksilver|Seeking Redemption|When fielded, Prep the next character die you purchase this turn.',
    '242B4Sabretooth|XXXXXX|When Sabretooth attacks, spin all other attacking character dice up 1 level.',
    '252E4Sasquatch|Great Beast Tanaraq|When another character die you control spins up a level, spin this character up 1 level.',
    '243B4Scarlet Witch|Reshaping Reality|While Scarlet Witch is active, when you roll a character die, you may spin it up or down 1 level before moving it to your Reserve Pool.',
    '242V4Sebastian Shaw|The Power of Politics|When a character die is damaged and not KO\'d, spin your Sebastian Shaw dice up 1 level.',
    '264V4Sentinel|TARGET IDENTIFIED|When fielded, KO target opposing [XMEN] character die of equal or lower level.',
    '223X4Storm|Misspent Youth|Awaken -  Prep a die from your bag. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '244X4Sunfire|Moeagaru!|Awaken -  Character dice you control gain +1A and +1D until end of turn.  (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '22404The Blackbird|Under the Radar|[XMEN] character dice you control cannot be targeted by Global Abilities or Aciton dice until the start of your next turn.|Global: Pay [1]. Target Global Ability cannot be used until the start of your next turn. Use this Global Ability only once per turn.',
    '24204The Hellfire Club|Members Only|If you control the character die with the highest A, KO all other character dice.',
    '242X4Thunderbird|Warrior of the Apache|When Thunderbird is KO\'d, spin all your other character dice up 1 level.',
    '262X4Wolverine|Patch|When Wolverine is KO\'d, deal damage equal to his A divided as you choose to any number of target opposing character dice.',
    '22104Xavier\'s School|1407 Graymalkin Lane|Draw 2 dice from your bag. Field any [XMEN] for free at level 1. You may add the remaining dice to your bag or Used Pile.',
    '334X4Angel|Championing the Cause|While Angel is active, whenever a Sidekick Die is KO\'d, you may spin target character die up 1 level.',
    '342B4Avalanche|Quake in Your Boots|While Avalanche is active, when a [DCV] character Die is fielded, deal 1 damage to all opposing character dice.',
    '341X4Banshee|Hitting the High Notes|While Banshee is active, when your opponent draws a Basic Action Die, deal 2 damage to target opponent or character die.',
    '322X4Beast|Oh My Stars and Garters!|When Beast is KO\'d, you my Prep a Beast die from your Used Pile.',
    '354X4Bishop|Butterfly Effect|While Bishop is active, prevent all non-combat damage dealt to you.',
    '341E4Blink|Unhinged From Reality|Whenever you use an Action die, Blink gains Infiltrate (<em>until end of turn</em>).',
    '344B4Blob|Appetite for Destruction|When fielded, choose an opposing card, cancelling all previous choices. Your opponent may not purchase or field that character until Blob leave the Field Zone.',
    '372X4Colossus|Protecting Illyana|Overcrush|When Colossus deals combat damage to your opponent, roll a character die in your Used Pile. If you roll a character face, field it for free, otherwise return it to your Used Pile.',
    '363X4Cyclops|Through Rose Colored Lenses|When Cyclops is dealt damage, deal 1 damage to each opposing character die.',
    '32304Danger Room|Flame-Throwers and Rotating Knives|All character dice lose their affiliations and gain [DCV] (until end of turn).|Global: Global: Pay [B]. Deal 1 damage to target [DCV] character die.',
    '352X4Doop|D~Doopspeak|When Doop attacks, you may capture target character die you control until end of turn. If you do, also capture target opposing character die until end of turn.',
    '344X4Havok|Blood Brother|While Havok is active, when an [XMEN] character die is damaged, spin it up 1 level before determining if it\'s is KO\'d.',
    '343X4Iceman|Absolute Zero|If Iceman is KO\'d while blocking, you may pay [B] to KO the blocked character die.',
    '353X4Jean Grey|Something Beneath the Surface|While Jean Grey is active, you may pay [B] to spin target character die you control up or down 1 level.',
    '364B4Juggernaut|Ruby Rampage|When fielded, all opposing character dice get -2A until end of turn.',
    '341X4Kitty Pryde|Over Here!|Kitty Pryde cannot be blocked unless your opponent pays [1].',
    '361B4Magneto|Come, X-Chicken|While Magneto is active, when your opponent fields a character die, spin it down 1 level.',
    '341E4Morph|The Comedy of Tragedy|When fielded, choose a target opposing character die in the Field Zone. Morph becomes a copy of that character die.',
    '341E4Nocturne|Shadowy Lineage|While Nocturne is active, the first time your opponent uses an Action die each turn, you may redirect the effect to another legal target.',
    '361V4Onslaught|Shattered Psyche|If your opponent has any active [DCV] character dice, Onslaught cannot be blocked.',
    '344X4Polaris|Mistress of Magnetism|While Polaris is active, when one of your character dice is KO\'d, you may pay [S]. If you do, return it to the Field Zone at level 1.',
    '351X4Professor X|No More, Magnus!|While Professor X is active, your Sidekick dice have +2D.|Global: Pay [M]. Once per turn, field target Sidekick die in your Used Pile.',
    '353B4Pyro|Too Hot to Handle|Awaken -  deal 1 damage to target opponent for each [B] in your Reserve Pool. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '333B4Quicksilver|Quick on His Feet|Awaken -  Field your next character die for free. (<em>When this die spins up 1 or more levels, you may use this effect.</em>)',
    '342B4Sabretooth|Global: Pay [M]. Once per turn, field target Sidekick die in your Used Pile.|Awaken: prevent all damage dealt to Sabretooth (until end of turn). (When this die spins up one or more levels, you may use this effect.)',
    '352E4Sasquatch|Hulking Beast|Overcrush|When your opponent uses a Global Ability, spin Sasquatch up 1 level.',
    '333B4Scarlet Witch|Hexes and O\'s|Awaken: Roll a [Brotherhood of Mutants] character die in your Used Pile. If you roll a character face, you may field it for free. Otherwise, return it to the Used Pile. (When this die spins up 1 or more levels, you may use this effect.)',
    '342V4Sebastian Shaw|Overclocked|Awaken -  Prep a Die from your bag. (<em>When this Die spins up 1 or more levels, you may use this effect.</em>)',
    '374V4Sentinel|SURRENDER OR DIE|When fielded, spin all [XMEN] character dice down 1 level and deal 2 damage to your opponent for each that cannot spin down.',
    '333X4Storm|Morlock Champion|Awaken: Reroll target opposing die. If it is an energy face, put it in the opponent\'s Used Pile. Otherwise return it to the Field Zone on its original face. (When this die spins up 1 or more levels, you may use this effect.)',
    '344X4Sunfire|Solar Flare|While Sunfire is active, damage dealt to your [XMEN] character dice from each source is reduced by 2.',
    '32404The Blackbird|School Bus|Your [XMEN] characters cost 1 less to purchase and field for each unique [XMEN] character die in your Field Zone.',
    '35204The Hellfire Club|Council of the Chosen|All character dice gain +2A this turn. At the end of the turn, KO all character dice that did not attack or block this turn.',
    '342X4Thunderbird|Tribal Fury|While Thunderbird is active, when you field an [XMEN] character die, spin it up 1 level.',
    '362X4Wolverine|Logan|When Wolverine attacks, he gains +1A for each opposing character die.|* Wolverine cannot be targeted by Global Abilities.',
    '32104Xavier\'s School|Unique Curriculum|Draw dice from your bag until you draw an [XMEN] character die or your bag is empty. Prep 1 of the drawn dice, and add the rest to your Used Pile.',
    '433X4Boom Boom|Meltdown|When fielded, deal 1 damage to your opponent for each of your active characters.',
    '454V4Emma Frost|Head of the Class|While Emma Frost is active, your opponent must pay [1] to attack with each non-[DCV] character dice.',
    '423X4Jubilee|Mallrat|While Jubilee is active, when you field a Sidekick die, deal 1 damage to target opponent or character die.',
    '451E4Mimic|Calvin Rankin|When fielded, Mimic copies the abilities and printed A and D of target character die until he leaves the Field Zone. Once per turn, when you could use a Global Ability, you may target a different character die. If you do, Mimic copies the abilities and printed A and D of that character die (replacing all previous choices) until he leaves the Field Zone.',
    '44BX1Blink In-Betweener|Agent of Order and Chaos|"You my not use [Q] energy to purchase this die, this text may not be ignored.|When fielded, and when Blink In-Betweener attacks, roll target die in your Used Pile. If it shows an energy face, KO all opposing character dice that match that energy type. Then, return the die to your Used Pile."',
    '44BX1Comic X-23|Uni-Powered|You my not use [Q] energy to purchase this die, this text may not be ignored.  |When Cosmic X-23 is blocked, deal damage equal to her A to all character dice declared as blockers.      * Also deal damage to the opponent.',
    '44BX1Czar Colossus|Powering the State|"You my not use ? energy to purchase this die, this text may not be ignored.|When fielded, KO all Sidekick dice and deal 1 damage to target opponent for each Sidekick die KO\'d by this effect."',
    '44BX1Phoenix Storm|From the Ashes|You my not use [Q] energy to purchase this die, this text may not be ignored.|When fielded, draw a die from your bag. Deal damage equal to that die\'s purchase cost to your opponent and all opposing character dice. Then, return it to your bag.'
    ];
    //END X-Men First Class Hack

    var gotg_aff = { 0:'0', I:'MIH', A:'2', V:'4', F:'ASF', G:'G', K:'MK', S:'F', M:'MYSTIC', g:'GA', i:'MIHV', k:'MKMYSTIC' };
    // Dice / Genders
    var gotg = [
    '151G4Adam Warlock|The Being Known as Him|While Adam Warlock is active, your character\'s die\'s "When fielded" effects trigger twice.',
    '141G4Agent Venom|Losing Control|Call Out <em>(When this character die attacks, target character die is the only character die that may block this character die.)</em>|If Agent Venom targets a [VM] character die with Call Out, he cannot be KO\'d this turn.',
    '143G4Angela|Divine Retribution|While Angela is active, your opponent\'s "When attacks" abilities deal no damage.',
    '164G4Beta Ray Bill|I Say Thee Nay!|Beta Ray Bill cannot be blocked by Sidekicks or [S] character dice.',
    '132A4Black Widow|Red Scare|Call Out <em>(When this character die attacks, target character die is the only character die that may block this character die.)</em>',
    '144A4Captain America|"No, You Move"|Intimidate|Captain America may only use Intimidate on [VM] character dice.',
    '154A4Captain Marvel|Reaching My Full Potential|When fielded, gain 1 life.',
    '13304Cosmic Cube|Infinite Possibilities|During your Clear and Draw Step, when you draw this die from your bag, you may send it and any other dice you\'ve drawn this turn Out of Play. For each die sent Out of Play, draw a die.',
    '124G4Cosmo Space Dog|Cosmonaut|When fielded, you may KO Cosmo, Space Dog. If you do, prevent all damage dealt to your other [GG] character dice this turn.',
    '134S4Daisy Johnson|Good Vibrations|Aftershock - Deal 2 damage to all other character die.',
    '134G4Drax|Driven by Desolation|While you have a different active [GG] character die, you may field Drax for free.',
    '124S4Dum Dum Dugan|Life Model Decoy|When Dum Dum Dugan would be KO\'d, you may KO a Sidekick die in your Field Zone instead and clear all damage from Dum Dum Dugan.',
    '132G4Gamora|Disowned|While your opponent has any active [VM] character dice, Gamora gets +1A and must attack if able.',
    '141K4Ghost Rider|Road Rash|While Ghost Rider is active, during your Clear and Draw Step, if Ghost Rider is your only character in the Field Zone, draw an extra die.',
    '144G4Groot|Force of Nature|While Groot is active, your [GG] character dice cannot be targeted by Global Abilities or Action dice.|Global: Pay [S] [S]. Gain 1 life. Use this ability only once per turn.',
    '162A4Hulk|Calculated Devastation|',
    '153A4Ironheart|Riri Williams|Call Out <em>(When this character die attacks, target character die is the only character die that may block this character die.)</em>',
    '13104Knowhere|Head-Quarters|Continuous: Your character dice cost 1 more to purchase and are placed below this die. Any time you could use a Global Ability, you may send this die to the Used Pile to add all dice underneath it to your Prep Area.',
    '141V4Madame Masque|Whitney Frost|While Madame Masque is active, your character dice cannot be targeted by Global Abilities.',
    '142F4Madame Web|Threads of Fate|When Madame Web blocks a [VM] character die, she gets +2A and +2D <em>(until end of turn)</em>.',
    '131G4Mantis|Celestial Madonna|When fielded, draw a die from your bag and add it to your Prep Area.',
    '154G4Moondragon|Madame MacEvil, M.D.|When one of your character dice is targeted by an Action die, spin Moondragon up 1 level.',
    '141G4Nebula|The Family Business|While Nebula is active, when your opponent draws dice during their Clear and Draw Step, you may return one of those dice to their bag. If you do, they draw a die from their bag.',
    '132V4Norman Osborn|Chief Explosive Officer|While Norman is active, your [VM] character dice cost [1] less to field.',
    '12204Nova Corps Uniform|One Mind, One Purpose|When fielded, equip to a character. That die gets +2A and +2D. If that character die leaves the Field Zone, send this die to the Used Pile.',
    '141G4Nova Prime|Thoughts Into Actions|When fielded, prevent all damage dealt to this die <em>(until end of turn)</em>.',
    '143G4Quasar|Protector of the Universe|When Quasar attacks and is not blocked, you may pay [B]. If you do, add Quasar to your Prep Area instead of moving her to your Used Pile.',
    '123F4Ricochet|Jonathan Gallo|Infiltrate <em>(When this character die is unblocked, you may return this die to the Field Zone and it deals your opponent 1 damage.)</em>',
    '133G4Rocket Raccoon|&nbsp;|Trigger Happy|When Rocket Raccoon attacks, he gains Fast <em>(until end of turn)</em>.',
    '173V4Ronan the Accuser|Judgement Day|When fielded, Ronan gets +2A if there are no other dice in your Field Zone <em>(until end of turn)</em>.',
    '12204S.W.O.R.D. Agent|Eyes Beyond Earth|Ally|S.W.O.R.D. Agent gets +1D for every Sidekick die in either player\'s Field Zone.',
    '142A4Squirrel Girl|Unbeatable!|Infiltrate <em>(When this character die is unblocked, you may return this die to the Field Zone and it deals your opponent 1 damage.)</em>',
    '142G4Star-Lord|Moonage Daydream|When fielded, Star-Lord deals 1 damage to target player.',
    '142K4Stick|Something Good, Something Bad|Stick can\'t be blocked by character dice of a lower level.',
    '171V4Thanos|I Am Become Death|While Thanos is active, all other [VM] character cards are considered blank.',
    '161V4The Collector|Cosmic Curator|While The Collector is active, whenever you field a [VM] character die, draw a die from your bag and add it to your Prep Area.',
    '12404The Kyln|Pangalactic Prison|Continuous: Players must spend [1] more to purchase each character die for every character die in their Field Zone.',
    '124V4The Spot|Dr. Jonathan Ohnn|Infiltrate <em>(When this character die is unblocked, you may return this die to the Field Zone and it deals your opponent 1 damage.)</em>',
    '133A4Yellowjacket|Unhinged Avenger|',
    '143G4Yondu|Whistle While You Kill|When fielded, Yondu deals 1 damage to all opposing character dice.',
    '251G4Adam Warlock|Standing Watch Over Infinity|When Adam Warlock is KO\'d by combat damage, move any character dice that damaged him this turn to his card. When fielded, return those character dice to their owner\'s Field Zone at the same level.',
    '241G4Agent Venom|Secret Agent Monster|When Agent Venom attacks, he gets +2A and +2D if he is the only attacking character die <em>(until end of turn)</em>.',
    '243G4Angela|Art of the Hunt|Infiltrate <em>(When this character die is unblocked, you may return this die to the Field Zone and it deals your opponent 1 damage.)</em>|When Angela uses Infiltrate, deal an additional damage.',
    '264G4Beta Ray Bill|Stormbreaker|Beta Ray Bill only takes 1 damage from each source.',
    '232A4Black Widow|Web of Lies|Deadly <em>(At end of turn, KO all character dice that were engaged with this character.)</em>',
    '254A4Captain America|Chemistry Project|At the end of your Attack Step, if Captain America was blocked but not KO\'d, he deals damage equal to his A to target opponent.',
    '254A4Captain Marvel|Seventh Sense|When Captain Marvel is KO\'d, gain 1 life.',
    '22304Cosmic Cube|Beyond Imagination|Your first Action die purchased this turn costs [1] less <em>(to a minimum of 1)</em>. Each other different Action die you purchase this tun costs 3 less <em>(to a minimum of 1)</em>.',
    '224G4Cosmo Space Dog|C.C.C.P. Comrade|While Cosmo, Space Dog is active, your other [GG] character dice gain +1D.',
    '234S4Daisy Johnson|Mister Hyde\'s Daughter|When Daisy Johnson attacks, you may pay up to [S][S][S]. For each [S] you pay, Daisy Johnson deals 1 damage to all other character dice.',
    '234G4Drax|Reborn|While Drax is active, once per turn, if another character die is KO\'d, Drax gets +3A.',
    '224S4Dum Dum Dugan|Hardened by War|Dum Dum Dugan gets +1A for each of your Sidekick dice in the Field Zone.',
    '242G4Gamora|Death\'s Descendent|When fielded, if you purchase a different [GG] character die this turn, add it to your bag.|* Instead, add it to your Prep Area.',
    '241K4Ghost Rider|Robbie Reyes|If Ghost Rider is your only character die in the Field Zone, he may block 2 character dice.',
    '244G4Groot|The Monster from Planet X|While Groot is active, the first time damage is dealt to you each turn, reduce that damage by 1.|* Instead, reduce that damage by 2.|Global: Pay [S][S]. Gain 1 life. Use this ability only once per turn.',
    '272A4Hulk|Emerald Dawn|When one of your character dice is KO\'d, spin Hulk up 1 level. When Hulk attacks, you may spin him down 1 level. If you do, he deals 2 damage to each opposing character die.',
    '253A4Ironheart|Reverse-Engineered|When fielded. you may add a die fro your Used Pile to your bag.|* You may add up to 2 dice instead.',
    '24104Knowhere|Hive of Scum and Villainy|You may spin all character dice in your Reserve Pool to level 3. You may field level 3 character dice for [1] this turn instead of their printed Fielding Cost.',
    '241V4Madame Masque|Nefaria\'s Schemes|While Madame Masque is active, your opponent\'s "When fielded" abilities do not trigger.',
    '252F4Madame Web|Cassandra Webb|When Madame Web attacks, move target opposing character die to her character card until end of turn.',
    '231G4Mantis|Grandmistress of Martial Arts|When Mantis is KO\'d, draw a die from your bag and add it to your Prep Area.',
    '254G4Moondragon|Raised by a Mentor|When you take damage, spin Moondragon up 1 level.',
    '241G4Nebula|In Good Graces|Infiltrate <em>(When this character die is unblocked, you may return this die to the Field Zone and it deals your opponent 1 damage.)</em>',
    '232V4Norman Osborn|Separate Entity|While Norman Osborn is active, you may pay [1] when you purchase a [VM] character die. If you do, add it yo your bag instead of your Used Pile.',
    '22204Nova Corps Uniform|Stand For Something Greater|When fielded, equip to a character die. That character die takes no damage from [VM] character dice or Global Abilities. If that character die leaves the Field Zone, send this to the Used Pile.',
    '241G4Nova Prime|Bearer of the Worldmind|When Nova Prime blocks, you may pay [1] to prevent all damage to it.',
    '243G4Quasar|Might of the Quantum Bands|While Quasar is active, your opponent can only spend [Q] energy as generic energy.',
    '223F4Ricochet|Loner|When Ricochet is blocked, KO target opposing Sidekick.',
    '233G4Rocket Raccoon|Rigging Up Destruction|When Rocket Raccoon is KO\'d, deal his A to target character die.',
    '273V4Ronan the Accuser|You Stand Accused!|When fielded, KO all opposing [VM] character dice.',
    '22204S.W.O.R.D. Agent|Sentient Worlds Observation|Ally|When S.W.O.R.D. Agent attacks, S.W.O.R.D. Agent gets +1A if another character die is attacking.',
    '242A4Squirrel Girl|Nutty Nanny|While Squirrel Girl is active, at the beginning of your Clear and Draw Step, field a 1A and 1D Squirrel Token.|Global: Pay [F] . Redirect 1 damage dealt by a character die you control to target character die.',
    '242G4Star-Lord|Let\'s Dance|Infiltrate <em>(When this character die is unblocked, you may return this die to the Field Zone and it deals your opponent 1 damage.)</em>',
    '242K4Stick|Nobody Feels Sorry For You|Call Out <em>(When this character die attacks, target character die is the only character die that may block this character die.)</em>',
    '271V4Thanos|Throwing Down the Gauntlet|When fielded, name an opposing character, replacing all previous choices. While Thanos is active, the named character cannot be fielded. While Thanos is active, when the named character is put into the Used Pile, Thanos deals your opponent 4 damage.',
    '261V4The Collector|The Power Primordial|When fielded, you and target opponent each select one of your unpurchased dice. Choose one, and place the selected die in your Used Pile. Remove the other die from the game.',
    '22404The Kyln|99.9% Mortality Rate|Continuous: Randomly select a character die from each player\'s Field Zone and place them under The Kyln until The Kyln leaves the Field Zone. When you or a character you control damage your opponent, send this die to the Used Pile.',
    '224V4The Spot|Portal Jumper|While The Spot is active, whenever you draw and roll a die outside your Clear and Draw Step <em>(excluding dice drawn from The Spot\'s ability)</em>, draw and roll an extra die.',
    '243A4Yellowjacket|Identity Crisis|When Yellowjacket attacks, you may spin him down 1 level. If you do, he is unblockable this turn.',
    '253G4Yondu|Ruthless Pirate|When fielded, Yondu deals 1 damage to your opponent for each of your active [GG] characters.',
    '351G4Adam Warlock|The Man Who Stalked the Stars|When Adam Warlock attacks, ignore the text of all opposing character dice of a lower level than Adam Warlock <em>(until end of turn)</em>.',
    '341G4Agent Venom|You Want Him?|When fielded, gain control of target opposing Sidekick. Return it to your opponent\'s Field Zone on its level 1 character face at the end of the turn <em>(regardless of its location)</em>.',
    '374G4Beta Ray Bill|Last Hope of the Korbinites|When Beta Ray Bill attacks, you may KO target [F] character die of equal or lower level.',
    '342A4Black Widow|Spider\'s Bite|Infiltrate|While Black Widow is active, when your character dice use Infiltrate they deal an additional damage.',
    '364A4Captain Marvel|Photonic Fury|While Captain Marvel is active, whenever one of your Sidekick dice is KO\'d by an opposing character, an opponent\'s Global Ability, or an opponent\'s Action die, return that Sidekick to play at level 1.',
    '32304Cosmic Cube|Energy of the Beyonders|Whenever an Action die or character ability deals damage this turn, increase that damage by 2.',
    '324G4Cosmo Space Dog|Bozhe Moi! Security Alert!|If Cosmo, Space Dog is KO\'d while blocking, unblocked attacking character dice deal no more than 2 damage this turn.',
    '334S4Daisy Johnson|Genetically Damaged|Daisy Johnson gets +1A for each [S] in your Reserve Pool <em>([Q] energy don\'t count)</em>.',
    '334G4Drax|In Pursuit of Thanos|While Drax is active, your other [GG] character dice get +1A and +1D.',
    '324S4Dum Dum Dugan|Howling Commando|While Dum Dum Dugan is active, prevent all damage to your Sidekick dice by character abilities or Global Abilities.',
    '342G4Gamora|Black Sheep|Infiltrate|* When this die uses Infiltrate, deal an additional damage.',
    '341K4Ghost Rider|Hot Car|Underdog - When fielded, draw a die from your bag and add it to your Prep Area.',
    '344G4Groot|Growing Pains|When Groot is KO\'d and another one of your character dice is KO\'d in the same turn by a character, Action die, or Global Ability controlled by an opponent, return Groot and all other character dice in your Prep Area to the Field Zone at level 2.',
    '372A4Hulk|Green Titan|Overcrush|When Hulk uses Overcrush, Hulk may deal the additional damage to target opposing character die instead of your opponent.',
    '353A4Ironheart|Making A Name For Herself|While you have an active [AV] character, you may field Ironheart for free. While you have at least 2 different active [AV] characters, Ironheart gets +1A and +1D.',
    '33104Knowhere|History Shrouded in Mystery|You may swap any character die in your Used Pile or Field Zone for an unpurchased character costing 1 more <em>(return the swapped die to its card)</em>. Character dice swapped in the Field Zone stay on the same level.',
    '341V4Madame Masque|The Maggia Touch|While Madam Masque is active, if your opponent fields a non-[VM] character die, they may not use Global Abilities <em>(until end of turn)</em>.',
    '342F4Madame Web|The Great Web Unravels|When Madam Web attacks, you may pay [2]. If you do, all opposing characters must block Madame Web this turn.',
    '341G4Mantis|Burden of Precognition|When Mantis attacks and is unblocked, you may purchase a Mantis die for [M] and add it to your Prep Area.',
    '354G4Moondragon|Psychic Warding|While Moondragon is active, when you field a [GG] character die, spin all your [GG] character dice up one level.',
    '341G4Nebula|Galactic Assassin|When you draw this die from your bag during your Clear and Draw Step, you may send 2 other dice drawn this turn from your bag to your Used Pile. If you do, draw 2 extra dice.',
    '33204Nova Corps Uniform|A Symbol of Order|When fielded, equip to a character die. When that character die attacks, it deals 1 damage to all opposing character dice. If that character die leaves the Field Zone, send this die to the Used Pile.',
    '351G4Nova Prime|Hard Corps|When fielded, you may pay up to 1 energy of each type <em>(excluding )</em>. For each energy you pay, Nova Prime deals 1 damage to target opponent.',
    '353G4Quasar|The Cosmic Avenger|While Quasar is active, you may spend any type of energy to activate Global Abilities <em>(you must still spend the right amount)</em>.|Global: Pay [B]. Gain one [Q]. Use this ability only once per turn.',
    '333F4Ricochet|Slinger|Infiltrate|While Ricochet is active, each time one of your character dice uses Infiltrate, draw a die from your bag and add it to your Prep Area.',
    '333G4Rocket Raccoon|Halfworld Habitat|When KO\'d, Rocket Raccoon deals 1 damage to target opponent.',
    '383V4Ronan the Accuser|No Quarter from the Kree|When fielded, move all [VM] character dice to Ronan the Accuser\'s card until end of turn. Return them to the Field Zone at the same level.',
    '32204S.W.O.R.D. Agent|Report to Brand|Ally|While your opponent has any active [VM] character dice, S.W.O.R.D. Agent gets +1A and +1D.',
    '342A4Squirrel Girl|Super Squirrelly|When Squirrel Girl is blocked, she deals X damage to the defending player, where X is her A minus the number of blocking dice your opponent has declared this turn.',
    '342K4Stick|Taming the Fires Within|When Stick is blocked, deal 2 damage to each die blocking him before damage is dealt. If this KOs every blocking die, Stick is unblocked.',
    '381V4Thanos|Eternal Might|While Thanos is active, each time you field a [VM] character die, it deals damage to your opponent equal to its A. Then move that character die to your Used Pile.',
    '351V4The Collector|Taneleer Tivan|While The Collector is active, once per turn, you may pay the Purchase Cost of target unpurchased character die minus 2 <em>(to a minimum of 1)</em>. If you do, field that character die at level 1. Return that die to its owner\'s card at end of turn or when it leaves the Field Zone.',
    '34404The Kyln|Powered by the Crunch|Continuous: At the start of each player\'s turn, that player moves a character die from their Field Zone under The Kyln. At the end of each player\'s turn, of there are 5 or more dice underneath The Kyln, send it to the Used Pile and return all character dice under The Kyln to the Field Zone.',
    '324V4The Spot|King of Spotworld|Aftershock - Draw a die from your bag. Add it to your Prep Area if it has a purchase cost less than 4, otherwise return it to your bag.',
    '343A4Yellowjacket|Only Chance to Redeem Myself!|When Yellowjacket is targeted, you may spin him down 1 level and cancel that effect.',
    '353G4Yondu|Yaka Arrows|When Yondu is KO\'d, Yondu deals 1 damage to your opponent for each non-Sidekick character die in your Used Pile.',
    '443G4Angela|Hunter of Demons|Infiltrate|While Angela is active, your character dice with Infiltrate cannot be blocked and deal no combat damage.',
    '444A4Captain America|Soldiering On|While Captain America is active your Sidekick dice gain +1D and Infiltrate.',
    '432V4Norman Osborn|Don\'t Call Me "Gobby"!|When fielded, Norman Osborn deals 1 damage to your opponent for each [VM] character die in the Field Zone <em>(yours and your opponent\'s)</em>.',
    '442G4Star-Lord|Space Oddity|While Star-Lord is active, your other [GG] character dice gain Call Out.',
    '44BA1Captain Britain Iron Man|Union Jack Mk. I|You may not use [Q] energy to purchase this die, this text may not be ignored.|While Captain Britain Iron Man is active, whenever you field a character die or use a Basic Action Die, you may purchase a copy of that die for up to 3 less <em>(to a minimum of 1)</em>.',
    '44Bg1Groot Thor|I am Thor!|You may not use [Q] energy to purchase this die, this text may not be ignored.|When fielded, use a copy of each "when fielded" effect on every other character die in the Field Zone. <em>(including your opponent\'s character dice.)</em> Prevent all effects that would copy Groot Thor\'s abilities, even if he is not in the Field Zone.',
    '44Bi1King Black Bolt|Ruler of Attilan|You may not use [Q] energy to purchase this die, this text may not be ignored.|When King Black Bolt is targeted by a Global Ability or Action die, he deals 1 damage to your opponent.',
    '44Bk1Punisher Sorcerer Supreme|Calm. Dust.|You may not use [Q] energy to purchase this die, this text may not be ignored.|When fielded, each player KOs their character die with the lowest A. When Punisher Sorcerer Supreme attacks, KO target character die in the Field Zone with the lowest A.',
    ];
    var smc = [
    '044F4Black Cat|Keeping the Bloodhounds at Bay|While Black Cat is active, your opponent cannot field level 3 character dice.',
    '044F4Black Cat|Possessive|While Black Cat is active, your opponent must choose to reroll dice that show a [Q] energy face during their Roll and Reroll Step.',
    '044F4Black Cat|Nine Lives|Regenerate <em>(Reroll when KO\'d)</em>',
    '044A4Captain America|"How \'Bout a Hand, Son?"|When fielded, Sidekick character dice you control gain +2A <em>(until end of turn)</em>.|Global: Pay [1] [S]. Field target Sidekick die from your Used Pile.',
    '044A4Captain America|Squad Leader|When fielded, Sidekick character dice you control gain Deadly <em>(until end of turn)</em>.|Global: Pay [1] [S]. Field target Sidekick die from your Used Pile.',
    '044A4Captain America|Behind You|When fielded, if you control 2 or more Sidekick character dice, KO target [DCV] character die.',
    '053V4Carnage|No Pain, No Reign|When Carnage attacks, he may use the "When attacks" ability of target character die.',
    '053V4Carnage|Red Slayer|When Carnage is KO\'d, he may use the "When KO\'d" ability of target character die.',
    '053V4Carnage|Unfinished Business|While Carnage is active, your opponent must pay [2]  more to use each Global Ability during your turn.',
    '051V4Doppelganger|Living Fractal|While Doppelganger is active, when an opponent rolls a Sidekick die and it shows a character face, field it under your control <em>(until end of turn)</em>. At end of turn, return it to your opponent\'s Field Zone.',
    '041V4Doppelganger|Six Arms|When fielded, KO all opposing Sidekick character dice and deal 1 damage to target opponent for each Sidekick die KO\'d in this way.',
    '051V4Doppelganger|Predator|When fielded, deal damage to target non-[DCV] character die equal to the number of Sidekick dice in the Field Zone <em>(both yours and your opponent\'s)</em>.',
    '032F4Iron Fist|Sensei|When Iron Fist attacks, he gets +1A for each [F] in your Reserve Pool <em>(excluding [Q])</em> <em>(until end of turn)</em>.',
    '032F4Iron Fist|Let the Silence Speak|While Iron Fist is attacking, after blockers are assigned, you may pay [F]. If you do, deal damage equal to Iron Fist\'s A to target non-blocking character die.',
    '032F4Iron Fist|Rolling Thunder Cannon Punch|While Iron Fist is active, once during your turn, you may pay X [F] energy to deal X damage to target opposing character die.',
    '033V4Shriek|Sonic Beam|When fielded, choose an opposing character card, replacing all previous choices. While Shriek is active, ignore that card\'s text <em>(including Global Abilities)</em>.',
    '043V4Shriek|Dark Empathy|When fielded, ignore all text on opposing character cards <em>(including Global Abilities)</em> <em>(until end of turn)</em>.',
    '033V4Shriek|Sandra Deel|When Shriek attacks, players may not activate Global Abilities <em>(until end of turn)</em>.',
    '042F4Spider-Man|A Better Way|When fielded, target opposing character die cannot block <em>(until end of turn)</em>.',
    '042F4Spider-Man|Staying True|When fielded, prevent all damage dealt to this die <em>(until end of turn)</em>.',
    '042F4Spider-Man|War of the Heart|While Spider-Man is attacking, your opponent must declare at least one blocker for each of your attacking Sidekick character dice before assigning blockers to your non-Sidekick character dice. When Spider-Man attacks, prevent all damage to your Sidekick character dice <em>(until end of turn)</em>.',
    '041V4Venom|Corruptor|When fielded, take control of target level 1 character die <em>(until end of turn)</em>. Return it to its owner\'s Field Zone at level 1 at end of turn.',
    '041V4Venom|My Other|When fielded, if your opponent\'s life total is greater than yours, deal 2 damage to your opponent.',
    '041F4Venom|Lethal Protector|When fielded, take control of target [DCV] character die <em>(until end of turn)</em>. Return it to its owner\'s Field Zone at the same level at the end of turn.',
    ];
    var sww = [
    '05304Artemis|Shim\'Tar|When fielded, prevent all damage dealt to your Artemis character dice <em>(until end of turn)</em>.',
    '05304Artemis|Amazon of Bana-Mighdall|When fielded, prevent all damage dealt to Sidekick dice you control <em>(until end of turn)</em>.',
    '05304Artemis|Renouncing Olympus|While Artemis is active, all Sidekicks must attack <em>(if able)</em>.',
    '041V4Cheetah|Feline Fury|Cheetah gets +1A and +1D for each opposing non-Sidekick, non-[DCV] character die in the Field Zone.',
    '041V4Cheetah|Goddess of the Hunt|When fielded, KO target opposing Sidekick. If you do, draw a die from your bag and Prep it.',
    '041V4Cheetah|Some Manner of Monster|While Cheetah is active, when you field a non-Cheetah [DCV] character die, draw a die from your bag and Prep it.',
    '052V4Giganta|Dr. Doris Zeul|Whenever you or character dice you control are damaged, spin Giganta up 1 level.',
    '052V4Giganta|Villainy, Inc.|When fielded, spin all opposing character dice down 1 level.',
    '052V4Giganta|Standing Tall|While Giganta is active, when a character die spins up, each of your Giganta dice gets +1A and +1D <em>(until end of turn)</em>.|Global: Pay [F]. Spin target character die up 1 level.',
    '022S4Jimmy Olsen|Signal Watch|While Jimmy Olsen is active, your Superman and Supergirl character dice cost 2 less to purchase <em>(minimum 1)</em> and may be fielded for free.',
    '022S4Jimmy Olsen|Superman\'s Pal|When Jimmy Olsen is KO\'d, you may Prep a Superman or Supergirl character die in your Used Pile.',
    '022S4Jimmy Olsen|Seeing is Believing|While Superman or Supergirl is active, Global Abilities activated by opponents cannot target Jimmy Olsen and prevent all damage those abilities deal to Jimmy Olsen.',
    '02304Steve Trevor|Bachelor in a Bind|',
    '03304Steve Trevor|The Man From A.R.G.U.S.|While Wonder Woman is active, prevent all damage dealt to Steve Trevor.',
    '03304Steve Trevor|Themysciran Liaison|When Steve Trevor is KO\'d, you may immediately purchase a Wonder Woman die for up to 3 less <em>(minimum 1)</em>, and Prep it.',
    '064S4Supergirl|All in the Family|While Supergirl is active, prevent all damage dealt by [DCV] character dice <em>(yours or your opponent\'s)</em> to Supergirl character dice you control.',
    '064S4Supergirl|I Have All Your Powers!|When Supergirl deals combat damage to your opponent, you may draw 2 dice from your bag and Prep them.',
    '074S4Supergirl|Guarding National City|When fielded, if your opponent\'s life total is greater than yours, gain 3 life.',
    '064J4Superman|Phone Booth|While Superman is active, prevent all damage dealt by [DCV] character dice <em>(your or your opponent\'s)</em> to Superman character dice you control.',
    '064J4Superman|Living in a World of Cardboard|Superman gets +1A and +1D for each different energy type you have in your Reserve Pool. <em>([Q] does not count toward energy types.)</em>',
    '074J4Superman|Symbol of Hope|When fielded, if your opponent\'s life total is greater than yours, Superman deals 3 damage to your opponent.',
    '041J4Wonder Woman|Child of Clay|While Wonder Woman is active, Global Abilities activated by your opponent cannot target character dice you control.',
    '041J4Wonder Woman|Ambassador of Peace|While Wonder Woman is active, players cannot use the Global Abilities on character cards on their team.',
    '051J4Wonder Woman|Reflections|While Wonder Woman is active, "When fielded" and "When attacks" abilities are ignored.',
    '04003Dimension Door|Basic Action Card|Target character die you control cannot be blocked <em>(until end of turn)</em>.',
    '02003Misdirection|Basic Action Card|Swap target active character die you control with a character die in your Used Pile, placing it on the same level.|*/** Also, draw a die from your bag and Prep it.',
    '05003Plot Twist|Basic Action Card|Draw up to two dice from your opponent\'s bag and roll any character dice, returning the rest to their bag. You may field them for free under your control. Place them in your opponent\'s Used Pile at the end of the turn <em>(regardless of their location)</em>.',
    '04003Resurrection|Basic Action Card|Roll a die in your Used Pile and place it into your Reserve Pool.|Global: Pay [S]. Once per turn, on your turn, draw a die from your bag and Prep it.',
    '03003Save Civilians|Basic Action Card|Whenever you field a Sidekick this turn, reduce the fielding cost of another die by 1, draw a die from your bag, and Prep it.',
    '03003Small Step For Man|Basic Action Card|Spin all character dice in the Field Zone to level 1.',
    '03003Take Cover|Basic Action Card|Character dice you control get +2D.|*/** Target character die gets an extra +3D.|Global: Pay [S]. Target character die gets +1D <em>(until end of turn)</em>.',
    '04003Team Up|Basic Action Card|Each of your character dice get +1A and +1D for each different affiliation among your active character dice minus 1 <em>(until end of turn)</em>.',
    '03003The Outsider|Basic Action Card|Draw a die from your bag. If it is a [DCV] die, field it on its level 2 side without paying its fielding cost. Otherwise, place it in your Used Pile, and if it was a Sidekick die, Prep this die.|Global: Pay [F]. Target [DCV] character die gets +2A <em>(until end of  turn)</em>. Character dice may only be targeted by this Global Ability once per turn.',
    '03003Truce|Basic Action Card|KO up to two character dice you control. For each character die you KO this way, your opponent must KO a character die they control.',
    ];
    var dc_op2017_aff = {
    B:'WFB', b:'WFB/7', v:'6/WFB', V:'6', 0:'0'
    };
    var dc_op2017_dice = [ 'bat', 'wf', 'bat', 'bat', 'bat', 'bat', 'bat' ];
    var dc_op2017 = [
    '542b4Batman™|"I Am the Night"|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Batman is active, when you field a [DCB] character die, KO target character die with fielding cost 0.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Batman is active, when you field a [DCJL] character die, KO target character die with fielding cost 0.',
    '542B4Robin™|Reckoning|While Batman™ is active, Robin is unblockable. When you have 4 or more [DCB] characters, Robin returns to the Field Zone when unblocked.',
    '544v4The Joker™|The Laughing Fish|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While The Joker is active, your Harley Quinn™ character dice are free to field.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While The Joker is active, your Batman™ character dice are free to field.',
    '543V4The Riddler™|If You\'re So Smart, Why Aren\'t You Rich?|While The Riddler is active, when your opponent\'s Sidekick dice roll is a [Q], they must reroll those dice.',
    '544v4Talia al Ghul™|Off-Balance|Flip [FLIP] <em>(At the start of your turn, you may flip this character to its other side.)</em>|When fielded, if Ra\'s al Ghul™ is active, gain 2 life.||Flip [FLIP] <em>(At the start of your turn, you may flip this character to its other side.)</em>|While Batman™ is active, Talia al Ghul gains Iron Will.',
    '531v4Catwoman™|The Cat and The Claw|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, your opponent loses 1 life.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Aftershock - Your opponent loses 1 life.',
    '54104Poison Ivy™|Eternal Youth|While Poison Ivy is active, when an opponent uses an action die, field a Plant Token. It has 0A and 2D.|While Poison Ivy is active, once during your turn, you may sacrifice one of your characters in the Field Zone and deal 2 damage to target player.',
    ];
    var m_op2017_aff = {
    D:'MDP', X:'1', I:'MIH', G:'GA'
    };
    var m_op2017_dice = [ 'dp', 'dp', 'dp', 'dp','dp','dp','aou','aou'];
    var m_op2017 = [
    // DP dice
    '552D4Deadpool|Deadpool Family Values|While Deadpool is active, damage dealt to your Deadpool, Lady Deadpool, Kidpool, and Dogpool character dice is reduced by 1.',
    '544D4Lady Deadpool|Deadpool Family Values|Regenerate|While Lady Deadpool is active, your [MDP] character dice cost 2 less to field.',
    '542X4Colossus|Xavier\'s School|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Iron Will||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, target [XMEN] character die other than Colossus gains Overcrush.',
    '544X4Wolverine|Xavier\'s School|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Regenerate||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Wolverine is active, your [XMEN] character dice cost 2 less to field.',
    '554I4Lockjaw|LJ|When fielded, Prep all [MIH] character dice in your Used Pile.',
    '551I4Medusa|Devoted Wife|Deadly (At the end of turn, KO all character dice that were engaged with this character.)|While Medusa is active, Black Bolt gains Iron Will.',
    '594G4Groot|I, Am, Grooooooot|When Groot is KO\'d, deal damage equal to his D to target character die.',
    '533G4Rocket Raccoon|Rigging Up Destruction|When Rocket Raccoon is KO\'d, deal damage equal to his A to target character die.',
    ];

    var def_aff = { 0:'0', V:'4', D:'MDFD' };
    var def = [
    '063D4Clea|Mistress of the Dark Dimension|While Clea is active, deal 1 damage to your opponent whenever they field a [B] or [M] character die.',
    '063D4Clea|On Stranger Tides|While Doctor Strange is active, Clea cannot be damaged.',
    '063D4Clea|Star Crossed|While Clea is active, when you assign blockers, you may declare target character die blocked without assigning it a blocker.',
    '074D4Doctor Strange|Book of the Vishanti|While Doctor Strange is active, whenever you use a non-continuous action die, create a copy of its effect. You may choose new targets for the copy.',
    '074D4Doctor Strange|The Doctor is In|While Doctor Strange is active, whenever you or character dice you control are damaged, you may move an action die from your Used Pile to your Prep Area.',
    '064D4Doctor Strange|The Shields of the Seraphim|While Doctor Strange is active, when you use an action die, you may put it into your bag at the end of turn, instead of into the Used Pile.',
    '031D4Hellcat|It\'s Patsy!|When fielded, name target opposing non-Sidekick character, replacing all previous choices. While Hellcat is active, deal 2 damage to your opponent the first time they field that character die.',
    '031D4Hellcat|Hell\'s Belle|When fielded, name a die, replacing all previous choices. Your opponent cannot purchase that die next turn.',
    '031D4Hellcat|Demon Sight for Sore Eyes|While Hellcat is active, you opponent must pay [1] more to purchase Basic Action dice.',
    '074D4Hulk|Banner\'s Not Home|Whenever Hulk is dealt combat damage, deal damage equal to his A to another target opposing character die.',
    '074D4Hulk|Emerald Dawn|When Hulk attacks, you may pay [S]. If you do, Hulk cannot be blocked by fewer than two character die.',
    '074D4Hulk|All the Rage|While Hulk is active, whenever one of your character die is KO\'d, deal 1 damage to your opponent.',
    '051D4Iron Fist|Healing Hands|During the Attack Step, if you have [M] in your Reserve Pool, Iron Fist gets +2A.',
    '051D4Iron Fist|Pulling Punches|When Iron Fist attacks, deal 1 damage to each opposing Sidekick. While Iron Fist is active, your opponent is dealt 1 damage for each Sidekick KO\'s by this effect.',
    '051D4Iron Fist|Holding Back the Storm|As long as you have not fielded any character dice this turn, Iron Fist has +3A.',
    '052D4Jessica Jones|Mother of the Year Award|Whenever Jessica Jones deals combat damage and is not KO\'d, draw a die from your bag and add it to your Prep Area.',
    '052D4Jessica Jones|Ladies\' Night|Jessica Jones gets +1A and +1D whenever one of your character dice is targeted by a Global or character ability <em>(until end of turn)</em>.',
    '052D4Jessica Jones|Redeemed|Jessica Jones cannot be targeted by opposing Global or character abilities.',
    '063V4Loki|Paper Throne|When fielded, gain control of target character die with a level lower than Loki until end of turn. Return the character die to your opponent\'s Field Zone at the end of turn <em>(regardless of its location)</em>.',
    '053V4Loki|Sibling Rivalry|When Loki blocks or is blocked, all character dice blocking or blocked by Loki lose their character abilities until end of turn.',
    '063V4Loki|Master of Delusion|When fielded, name an energy type, replacing all previous choices. While Loki is active, dice of that energy type cost [1] more to purchase and field.',
    '052D4Luke Cage|Harlem Raised|If Luke Cage is blocked, you may reroll him. If you rolled a character face, Luke Cage gains Overcrush, otherwise, move this die to the Field Zone at level 1 <em>(he is no longer attacking)</em>.',
    '052D4Luke Cage|Always Forward|While Luke Cage is active, other [MDFD] character dice get +1A and +1D.',
    '052D4Luke Cage|Street Sweeper|While Luke Cage is active, other [MDFD] characters cost [1] less to purchase. Whenever you field another [MDFD] character die, draw a die from your bag and add it to your Prep Area.',
    ];

    var bat_aff = { 0:'0', B:'WFB', V:'6', C:'JLC', G:'DCNG', J:'7', S:'WFS', T:'WT', W:'DCWL', v:'6/WFB', b:'WFB/6' };
    var bat = [
    '122B4Ace the Bat Hound™|Taking a Bite Out of Crime|Ally',
    '152V4Bane™|King of Peña Duro|Gadgeteer <em>(When Bane attacks, you may roll an action die from your Used Pile. If you roll an [A] face, you may field it.)</em>',
    '12404Bat-Signal™|Light Up the Night|Continuous: Whenever you could use a Global Ability, you may send this die to the Used Pile to search your bag for a Batman die and roll it.|*/** Also, you may flip target character card you control.',
    '12304Batarang™|What Goes Around Comes Around|Deal 3 damage to target [DCV] character die.|Boomerang <em>(After using this die, roll it. If you roll an [A] face, add it to your Prep Area.)</em>',
    '122B4Batgirl™|Carrying the Mantle|While a non-Batgirl [DCB] character die is active, Batgirl gets +1A and +1D.',
    '142b4Batman™|One with the Night|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Batman is active, opposing [DCV] character dice cannot attack alone.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Batman is active, opposing non-[DCV] character dice cannot attack alone.',
    '144b4Batwoman™|Kate Kane|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, draw a die. If it is a [DCV] die, roll it and add it to your Reserve Pool. Otherwise, return it to your bag.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Batwoman is active, when your opponent draws two or more non-[DCV] non-Sidekick dice, Batwoman deals them 2 damage.',
    '152G4Big Barda™|Hell Hath No Fury|While Big Barda is active, other [DCNG] character dice get +2A and +2D.',
    '121b4Catwoman™|Slippery Allegiance|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>',
    '142B4Commissioner Gordon™|"Good Cop"|Ally|While Commissioner Gordon is active, your non-[DCV] character dice cost 2 less to field.',
    '124S4Conner Kent™|Project Cadmus|',
    '153V4Darkseid™|Ω|While Darkseid is active, whenever you could use a Global Ability, you may sacrifice a Parademon. If you do, capture an opposing character die <em>(until end of turn)</em>.',
    '144T4Dove™|Dawn Granger|While Hawk is active, Dove gets +2A and +2D.|Global: Pay [S]. Target attacking character die gets -1A.',
    '133V4Firefly™|Ted Carson|When fielded, deal 1 damage to your opponent for each [B] character die you control.',
    '141V4Harley Quinn™|New Queen of Crime|While Harley Quinn is active, whenever you field a non-Harley Quinn [DCV] character die, draw a die and add it to your Prep Area.',
    '152T4Hawk™|Hank Hall|While Dove is active, Hawk gets +2A and +2D.|Global: Pay [F]. Target attacking character die gains +1A <em>(until end of turn)</em>. Character dice may only be targeted by this Global Ability once per turn.',
    '121J4Hawkgirl™|Shiera Sanders|When Hawkgirl attacks, spin that die up one level.',
    '133V4Huntress™|No Rest for the Wicked|When fielded, deal damage equal to Huntress\'s A to target character die.',
    '134V4Hush™|Childhood Friend|When fielded, you may KO target [DCB] character die of equal or lower level.',
    '124V4Jervis Tetch™|Mad Hatter|When Jervis Tetch attacks, gain control of target opposing Sidekick. That Sidekick must attack this turn <em>(if able)</em>.',
    '152V4Killer Croc™|Waylon Jones|',
    '121G4Mister Miracle™|Great Escape|Mister Miracle cannot be targeted by opposing action dice or abilities.',
    '153V4Mr. Freeze™|Dr. Victor Fries|When fielded, put a Stun token on an opposing character card. <em>(Stunned character card\'s dice cannot attack or block. The card\'s owner can pay [2] any time they could use a Global Ability to remove a Stun token.)</em>',
    '143b4Nightwing™|Escrima Sticks|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Nightwing is active, the first action die you purchase each turn costs [1] less.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Nightwing is active, the first action die your opponent purchase each turn costs [1] more.',
    '163G4Orion™|God of War|When Orion is KO\'d, return him to the Field Zone at level 1.',
    '154C4Owlman™|Thomas Wayne, Jr.|When fielded, [DCV] character dice you control get +2A and +2D <em>(until end of turn)</em>.',
    '133V4Parademon™|Servant of Apokalips|Swarm',
    '151V4Ra\'s Al Ghul™|Mystery and Power|While Ra\'s al Ghul is active, opposing non-[DCV] character dice get -1A.|Global: Pay [M]. Target character card loses [DCV] <em>(until end of turn)</em>.',
    '13104Red Hood™|Jason Todd|When Red Hood attacks, he gains +1A for each other attacking character die.',
    '14404Rip Hunter™|Navigate the Sands of Time|While Rip Hunter is active, once during your Clear and Draw Step, when you draw dice from your bag you may send any number of them to the Used Pile and draw one new die for each of them.',
    '131B4Robin™|Growing Pains|Ally|While Batman is active, Robin gains Regenerate.',
    '134v4Talia al Ghul™|Forbidden Love|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Talia al Ghul is active, your non-[DCV] character dice may not attack.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Talia al Ghul is active, your [DCV] character dice may not attack.',
    '144v4The Joker™|Joke\'s On You|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While The Joker is active, your [DCB] character dice get +1A and +1D.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While The Joker is active, opposing [DCB] character dice can\'t attack unless your opponent pays [2] per die.',
    '143V4The Penguin™|Iceberg Lounge|Gadgeteer <em>(When The Penguin attacks, you may roll an action die from your Used Pile. If you roll an [A] face, you may field it.)</em>',
    '121J4The Question™|Vic Sage|Gadgeteer <em>(When The Question attacks, you may roll an action die from your Used Pile. If you roll an [A] face, you may field it.)</em>',
    '143V4The Riddler™|Prince of Puzzles|When The Riddler attacks, you may swap his A and D <em>(until end of turn)</em>.',
    '132B4Thomas Wayne™|Knight of Vengeance|Gadgeteer <em>(When Thomas Wayne attacks, you may roll an action die from your Used Pile. If you roll an [A] face, you may field it.)</em>',
    '12104Two-Face™\'s Coin|50/50|Continuous: Whenever you could use a Global Ability, you can send this die to the Used Pile to deal 1 damage to target character die or player.|*/** Then, flip this card.||Begin game with this side face-down.|Continuous: Whenever you could use a Global Ability, you can send this die to the Used Pile to prevent 2 damage to target character die. Then, flip this card.',
    '151v4Two-Face™|Two Sides of the Same Coin|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Fast|Regenerate||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Two-Face is active, opposing character dice lose, and canot gain, Fast and Regenerate.',
    '13204Utility Belt|Anything You Need|Continuous: Whenever you could use a Global Ability, you may send this die to the Used Pile to give target [DCB] character die +3A <em>(until end of turn)</em>.|*/** Then, flip this card.||Begin game with this side face-down.|Continuous: Whenever you could use a Global Ability, you may send this die to give target [DCB] character die +3A and +3D <em>(until end of turn)</em>. Then, flip this card.',
    '222B4Ace the Bat Hound™|Sic \'Em|If your opponent has any active [DCV] character dice, Ace the Bat Hound gets +2A.',
    '262V4Bane™|Knight Terror|When Bane attacks, KO target [DCB] character die, and deal 1 damage to its controller.',
    '22404Bat-Signal™|Beacon of Hope|Continuous: Whenever you could use a Global Ability, you can send this die to the Used Pile to deal 2 damage to target attacking [DCV] character die.|*/** Also, you may flip target character card you control.',
    '23304Batarang™|Multitool|Deal 1 damage to target character die for each of your [DCB] character dice in the Field Zone.|Boomerang <em>(After using this die, roll it. If you roll an [A] face, add it to your Prep Area.)</em>',
    '232B4Batgirl™|Shadow of the Bat|Intimidate|Batgirl can only use Intimidate on [DCV] character dice.',
    '252b4Batman™|Finding Strength in Loss|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Common Ground - Batman gains +2A and +2D while attacking with a [DCV] character die <em>(until end of turn)</em>.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Batman gains +2A and +2D while blocking non-[DCV] character dice <em>(until end of turn)</em>.',
    '244b4Batwoman™|Code of Honor|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Common Ground - Batwoman can\'t be blocked if she attacks with at least one [DCV] character die.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Batwoman can\'t be blocked by non-[DCV] character dice unless the defending player pays [1] for each blocking character die.',
    '252G4Big Barda™|Spare the Mega-Rod|While Big Barda is active, [DCNG] character dice cannot be damaged by [DCV] character dice or action dice.',
    '231b4Catwoman™|Stealing Hearts|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Catwoman is active, she gains +1A each time you flip one of your cards <em>(until end of turn)</em>.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Catwoman is active, she gains +1A each time you flip one of your cards <em>(until end of turn)</em>.',
    '242B4Commissioner Gordon™|More Than a Badge|Ally|While Commissioner Gordon is active, the first time you draw a Batman die each turn, draw an extra die.',
    '234S4Conner Kent™|Kon-El|Conner Kent cannot be blocked by [DCV] character dice.',
    '253V4Darkseid™|Erasure|While Darkseid is active, whenever you could use a Global Ability, you may sacrifice a Parademon. If you do, draw two additional dice from your bag during your next Clear and Draw Step.|Global: Pay [1]. Move a die from your Prep Area to your Used Pile. Then, draw a die from your bag and add it to your Prep Area.',
    '244T4Dove™|Danger!|If Dove is in your Used Pile and you take damage, move Dove to your Prep Area.|Global: Pay [S]. Target attacking character die gets -1A.',
    '233V4Firefly™|Pyromaniac|When Firefly is KO\'d, deal 2 damage to your opponent if you have any [B] energy in your Reserve Pool.',
    '241V4Harley Quinn™|Batter Up!|When Harley Quinn attacks, if at least one other [DCV] character die is attacking, and you only control [DCV] character dice, she is unblockable.',
    '262T4Hawk™|Might Makes Right|While Hawk is active, if Dove is KO\'d, deal damage equal to Hawk\'s A to your opponent.|Global: Pay [F]. Target attacking character die gains +1A <em>(until end of turn)</em>. Character dice may only be targeted by this Global Ability once per turn.',
    '221J4Hawkgirl™|Haunted by History|Whenever a Sidekick attacks, spin Hawkgirl up one level.',
    '243V4Huntress™|Family Ties|While Huntress is active, whenever an opposing character die is fielded, deal 1 damage to target opposing character die.',
    '224V4Hush™|Dr. Thomas Elliot|While Hush is active, if a [DCB] character is in the Field Zone, KO Hush and add a die from your bag to your Prep Area.',
    '244V4Jervis Tetch™|Tea Time|While Jervis Tetch is active, after your opponent declares attackers, gain control of target opposing character die with purchase cost 4 or less. That character die and Jervis Tetch must block this turn <em>(if able)</em>.',
    '262V4Killer Croc™|Blood in the Water|When fielded, KO all character dice with an A of 2 or less.',
    '221G4Mister Miracle™|Death Defying|When Mister Miracle is KO\'d, you may move another character die from your Field Zone into your Prep Area. If you do, return Mister Miracle to the Field Zone at level 3.',
    '253V4Mr. Freeze™|Cold-Blooded Criminal|When Mr. Freeze blocks or is blocked by an opposing, non-[DCV] character die, put a Stun token that die\'s card. <em>(Stunned character card\'s dice cannot attack or block. The card\'s owner can pay [2] any time they could use a Global Ability to remove a Stun token.)</em>',
    '233b4Nightwing™|Heir to the Cowl|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, deal 2 damage divided among up to 2 [DCV] character dice.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, deal 2 damage divided among up to 2 non-[DCV] character dice.',
    '263G4Orion™|The Second Son|When Orion deals combat damage to your opponent, you may pay [1]. If you do, you may move him to your Prep Area <em>(instead of the Used Pile)</em>.',
    '254C4Owlman™|Brains of the Operation|When Owlman is KO\'d, your opponent KOs the highest purchase cost non-[DCV] character dice they control.',
    '243V4Parademon™|Strength in Numbers|Swarm|While Parademon is active, it deals 1 damage to target opponent when you draw an extra die from the Swarm keyword.',
    '261V4Ra\'s Al Ghul™|Fighting Death Himself|While Ra\'s al Ghul is active, your opponent may not declare non-[DCV] character dice as attackers, unless they pay [1] per die.|Global: Pay [M]. Target character card loses [DCV] <em>(until end of turn)</em>.',
    '24104Red Hood™|What Needs To Be Done|When Red Hood attacks, deal 1 damage to target opposing character die for each other attacking character die.',
    '24404Rip Hunter™|Through the Vanishing Point|When fielded, name a non-Sidekick die <em>(replacing all previous choices)</em>. While Rip Hunter is active, when you draw the named die you may place it in your Reserve Pool on any face instead of rolling it.',
    '231B4Robin™|Hero Reborn|Ally|While Robin is active, Batman and Sidekick dice you control gain +1D.',
    '244v4Talia al Ghul™|Daughter of the Demon|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Talia al Ghul is active, after you declare attackers, if they were all [DCV] character dice, gain 1 life.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Common Ground - Whenever Talia al Ghul attacks with at least one [DCV] character die, you gain 1 life.',
    '244v4The Joker™|Last Laugh|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When a [DCB] character die is KO\'d, spin The Joker 1 level up.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While The Joker is active, whenever a [DCB] character die is fielded, you may spin target non-[DCV] character die down 1 level.',
    '243V4The Penguin™|Fowl Play|When fielded, target [DCB] card loses all text <em>(until end of turn)</em>.',
    '231J4The Question™|Find the Answers|Gadgeteer <em>(When The Question attacks, you may roll an action die from your Used Pile. If you roll an [A] face, you may field it.)</em>|Whenever you use an action die, The Question gains +1A and +1D <em>(until end of turn)</em>.',
    '243V4The Riddler™|What Am I™|When The Riddler blocks, you may swap the A and D of all character dice blocked by him <em>(until end of turn)</em>.',
    '242B4Thomas Wayne™|Surgical Precision|Common Ground - Thomas Wayne gains +1A and Fast while attacking with a [DCV] character die <em>(until end of turn)</em>.',
    '23104Two-Face™\'s Coin|Heads, I Win|[DCV] character dice you control gain +1 <em>(until end of turn)</em>.|*/** Then, flip this card.||Begin the game with this side face-down.|Opposing non-[DCV] character dice get -1A <em>(until end of turn)</em>. Then, flip this card.',
    '251v4Two-Face™|Dent\'s Not Here|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, spin all [DCB] character dice down one level.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>When Two-Face leaves the Field Zone, spin all [DCV] character dice down one level.',
    '23204Utility Belt|Worst Case Scenario|Draw a die. If it\'s a [DCB] character die, roll it; otherwise, return it to your bag.|*/** Then, flip this card.||Begin the game with this side face-down.|Draw two dice. Roll any [DCB] character dice; return the rest to your bag. Then, flip this card.',
    '332B4Ace the Bat Hound™|Bat\'s Best Friend|While Ace the Bat Hound is active, if a [DCV] character die KOs one of your character dice, deal 3 damage to that [DCV] character die.',
    '362V4Bane™|Knightfall|Whenever your opponent draws one or more [DCB] character dice, spin this die up one level <em>(if able)</em> and it gains +3A and +3D <em>(until end of turn)</em>.',
    '31404Bat-Signal™|Out of the Darkness|Continuous: Whenever you could use a Global Ability, you may send this die to the Used Pile to give target non-[DCV] character die +1A <em>(until end of turn)</em>. You may spin it up 1 level.|*/** Also, you may flip target character card you control.',
    '32304Batarang™|Striking With Fear|Spin up each of your [DCB] character dice one level.|Boomerang <em>(After using this die, roll it. If you roll an [A] face, add it to your Prep Area.)</em>',
    '332B4Batgirl™|"Don\'t Tell Dad"|When fielded, your other [DCB] character dice get +1A and +1D <em>(until end of turn)</em>.',
    '352b4Batman™|Always Prepared|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, your opponent must reroll their active [DCV] character dice.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|When fielded, your opponent must reroll their active non-[DCV] character dice.',
    '354b4Batwoman™|Elegy|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Batwoman deals 4 damage to all [DCV] character dice that block her <em>(in addition to combat damage)</em>.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Batwoman deals 4 damage to all non-[DCV] character dice that block her <em>(in addition to combat damage)</em>.',
    '352G4Big Barda™|Miraculous Escape|Big Barda cannot be KO\'d by combat damage.',
    '331b4Catwoman™|Kitten\'s Got Claws|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Catwoman is active, when you flip this character card, draw a die. If it is a Sidekick, add it to your Prep Area. Otherwise, return it to your bag.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Catwoman is active, when you flip this character card, draw a die. If it is a Sidekick, add it to your Prep Area. Otherwise, return it to your bag.',
    '342B4Commissioner Gordon™|Gotham\'s True Hero|Ally|When fielded, move a Batman die from your Used Pile to your Prep Area.',
    '334S4Conner Kent™|Experiment 13|Conner Kent gets +1A for each of your opponent\'s active [DCV] character dice.',
    '344T4Dove™|The Light of Order|When you take damage or an opponent declares an attack, spin each of your Dove character dice to level 3.',
    '343V4Firefly™|Watch the World Burn|When fielded, you may pay X [B] energy. If you do, deal X damage to your opponent.|Global: Pay [B]. Once per turn, choose target [DCV] character die. When that die attacks, deal 1 damage to your opponent.',
    '331V4Harley Quinn™|Tough Cookie|While Harley Quinn is active, at the beginning of your turn, if you control at least 2 different [DCV] character dice, your opponent loses 1 life and you gain 1 life.',
    '352T4Hawk™|The Agent of Chaos|While Hawk is active, if you take damage, spin Hawk up to level 3.',
    '331J4Hawkgirl™|Princess of Thanagar|While Hawkgirl is active, whenever a non-[DCV] character die attacks, you may spin that die up one level.',
    '333b4Huntress™|Cry for Blood|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Huntress cannot be blocked by Sidekicks.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Huntress cannot be blocked by Sidekicks.',
    '334V4Hush™|Matters of the Heart|Hush gets +2A and +2D if there are any active [DCB] character dice.',
    '344V4Jervis Tetch™|Malice in Wonderland|When Jervis Tetch attacks, gain control of target opposing character die with purchase cost of 4 or less. That character die must attack this turn <em>(if able)</em>.',
    '372V4Killer Croc™|Out of the Depths|When fielded, KO all level 1 and 2 character dice with A less than Killer Croc.',
    '363V4Mr. Freeze™|For Nora|When Mr. Freeze takes combat damage, put a Stun token on any opposing character card. <em>(Stunned character card\'s dice cannot attack or block. The card\'s owner can pay [2] any time they could use a Global Ability to remove a Stun token.)</em>',
    '323b4Nightwing™|Protector of Blüdhaven|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Nightwing can\'t attack or block unless you have another non-Nightwing [DCB] character die in the Field Zone.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|Nightwing can\'t attack or block unless you have another non-Nightwing [DCV] character die in the Field Zone.',
    '373G4Orion™|Astro-Force Powered Harness|When fielded, deal 2 damage to your opponent. When Orion attacks, deal 2 damage to your opponent.',
    '343V4Parademon™|For Darkseid!|While Parademon is active, when a player draws one or more dice, deal 1 damage to that player.',
    '361V4Ra\'s Al Ghul™|Peace Through Domination|While Ra\'s al Ghul is active, when an opponent\'s non-[DCV] character die is KO\'d by combat damage, it goes to the Used Pile <em>(instead of the Prep Area)</em>.',
    '34104Red Hood™|Broken Apprentice|While Red Hood is attacking, deal 1 damage to all character dice assigned as blockers.',
    '35404Rip Hunter™|Timeline Protector|While Rip Hunter is active, you may prevent the first instance of damage to you each turn <em>(if you take multiple instances of damage at once, you choose one to prevent)</em>.',
    '341B4Robin™|Wayne Legacy|Ally|Common Ground - Whenever Robin attacks with a [DCV] character die, you gain 1 life.',
    '354V4Talia al Ghul™|It\'s Complicated|Fast|Talia al Ghul can\'t be blocked by character dice with Flip.',
    '343V4The Penguin™|Old Money, New Crime|While The Penguin is active, your opponent can\'t flip [DCB] cards unless they pay 1 life.',
    '331J4The Question™|Ask the Right Questions|Gadgeteer <em>(When The Question attacks, you may roll an action die from your Used Pile. If you roll an [A] face, you may field it.)</em>|While The Question is active, if you control no [DCV] character dice, he gains Regenerate.',
    '353V4The Riddler™|Get a Clue|When fielded, you may swap the purchase cost of two of your non-Basic Action Dice <em>(until end of turn)</em>.',
    '332B4Thomas Wayne™|Corrupted by Pain|Suit Up - Batman <em>(When purchased, you may KO a Batman character die to field this die at level 2.)</em>',
    '33104Two-Face™\'s Coin|Tails, You Lose|KO target character die you control and gain 1 life.|*/** Then, flip this card.||Begin the game with this side face-down.|KO target character die you control and target character die you don\'t control. Then, flip this card.',
    '361v4Two-Face™|Fair is Fair|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Two-Face is active, whenever you flip a character card, if that character is active, deal 1 damage to target opponent.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|While Two-Face is active, whenever an opponent flips a character card, if that character is active you gain 2 life.',
    '33204Utility Belt|Reinforced Steel Lining|Deal each player 1 damage for every Action die in their Field Zone.|*/** Then, flip this card.||Begin the game with this side face-down|You may purchase an Action die with cost 3 or lower for free. Deal 1 damage to each player. Then, flip this card.',
    '463V4Darkseid™|Force of Entropy|While Darkseid is active, your Sidekicks gain Swarm.',
    '431G4Mister Miracle™|Show Must Go On|While Mister Miracle is active, your action dice gain Boomerang. <em>(After using this die, roll it. If you roll an [A] face, add it to your Prep Area.)</em>',
    '454C4Owlman™|I Own This City|While Owlman is active, your [DCV] character dice get +1A and +1D. When Owlman attacks, your [DCV] character dice get an additional +1A and +1D <em>(until end of turn)</em>.',
    '444v4The Joker™|One Bad Day|Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|The Joker can\'t be blocked by non-[DCV] character dice.||Flip [FLIP] <em>(At the beginning of your turn, you may flip this character to its other side.)</em>|The Joker can\'t be blocked by [DCV] character dice.',
    '44BW1White Lantern Aquaman™|The Right to Live|You may not use [Q] energy to purchase this die, this text may not be ignored.|While White Lantern Aquaman is active, whenever your opponent fields a Sidekick, deal 1 damage to your opponent.',
    '44BW1White Lantern Dove™|The Awareness to Live|You may not use [Q] energy to purchase this die, this text may not be ignored.|While White Lantern Dove is active, whenever a character deals damage to you, deal 1 damage to your opponent.',
    '44BW1White Lantern Hal Jordan™|The Will to Live|You may not use [Q] energy to purchase this die, this text may not be ignored.|While White Lantern Hal Jordan is active, whenever you flip a character card, if that character is active, deal 1 damage to your opponent.',
    '44BW1White Lantern Superman™|The Strength to Live|You may not use [Q] energy to purchase this die, this text may not be ignored.|While White Lantern Superman is active, whenever an opposing [DCV] character die is KO\'d, deal 1 damage to your opponent.',
    ];

    var imw_aff = { 0:'0', I:'MSTARK', F:'MSTARKSF', A:'2', S:'F'};
    var imw = [
    '021S4Howard Stark|Father|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|* Howard Stark can\'t be targeted by Global Abilities.',
    '031S4Howard Stark|Expert Businessman|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|At the start of your turn, you may sacrifice this character die. If you do, other character dice you control gain +2A <em>(until end of turn)</em>.',
    '031S4Howard Stark|Brilliant|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|At the start of your turn, you may sacrifice this character die. If you do, spin target character die up one level. It gains Iron Will <em>(until end of turn)</em>.',
    '062I4Hulkbuster Iron Man|Model 36|Hulkbuster Iron Man cannot be blocked by character dice with purchase cost 6 or more.',
    '062I4Hulkbuster Iron Man|Rocket Powered Punches|Suit Up - Iron Man <em>(When purchased, you may KO an Iron Man character die to field this die at level 2.)</em>',
    '072I4Hulkbuster Iron Man|Bustin\' Makes Me Feel Good|When fielded, you may KO target opposing character die with purchase cost 6 or more. If you do, gain 2 life.',
    '043I4Iron Manor|Earth X|Suit Up - Iron Man <em>(When purchased, you may KO an Iron Man character die to field this die at level 2.)</em>|Global: Pay . Once per turn, on your turn, spin down one of your [MSTARK] character dice. You may field an [MSTARK] character die for [1] less.',
    '043I4Iron Manor|Hermetically Sealed|Suit Up - Iron Man <em>(When purchased, you may KO an Iron Man character die to field this die at level 2.)</em>|Iron Manor gains +1A and +1D for each other, different active [MSTARK] character.',
    '053I4Iron Manor|Celestial Slayer|Suit Up - Iron Man|Iron Manor gains +1A and +1D for each other, different active [MSTARK] character.|Global: Pay . Once per turn, on your turn, spin down one of your [MSTARK] character dice. You may field an [MSTARK] character die for [1] less.',
    '032F4Iron Spider|Version 2.0|When fielded, target [MSTARK] or [SF] character die you control gets +1D <em>(until end of turn)</em>.|* Instead, when fielded, each of your [MSTARK] and [SF] character dice get +1D.',
    '032F4Iron Spider|Waldoes|Suit Up - Iron Spider or Spider-Man <em>(When purchased, you may KO an Iron Spider or Spider-Man character die to field this die at level 2.)</em>',
    '042F4Iron Spider|Too Cool For Words|When fielded, deal 2 damage to target character die for each different active [MSTARK] or [SF] character die you control.',
    '031A4Jarvis|Butler|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|When fielded, deal X damage to target character die, where X is the number of character dice you fielded this turn <em>(including Jarvis)</em>.|Global: Pay  . Once per turn, on your turn, spin down one of your [MSTARK] character dice. You may field an [MSTARK] die for [1] less.',
    '041A4Jarvis|Loyal Confidant|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|When fielded, the next character die you field this turn costs [1] less to field, and gets +1A and +1D this turn.',
    '051A4Jarvis|Chief of Staff|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|When fielded, gain X life, where X is the number of character dice you fielded this turn <em>(including Jarvis)</em>.',
    '023I4Rescue|Mark 1616|',
    '033I4Rescue|Resilient|Suit Up - Pepper Potts or Rescue|At the end of your Roll and Reroll Step, your opponent loses 1 life for each Rescue die that rolled an energy face. <em>(Rescue doesn\'t need to be active for this ability to trigger.)</em>',
    '043I4Rescue|Catching a Jet|Suit Up - Pepper Potts or Rescue|At the end of your Roll and Reroll Step, draw 1 die for each Rescue die you rolled that shows an energy face. Field any [MSTARK] character die you drew at level 1. Return all other dice drawn this way to your bag. <em>(Rescue doesn\'t need to be active for this ability to trigger.)</em>',
    '044I4Space Armor Iron Man|Model 5|Suit Up - Iron Man <em>(When purchased, you may KO an Iron Man character die to field this die at level 2.)</em>',
    '054I4Space Armor Iron Man|Deep Space|Suit Up - Iron Man <em>(When purchased, you may KO an Iron Man character die to field this die at level 2.)</em>|* Each time an opposing character die deals damage to Space Armor Iron Man, you gain 1 life.',
    '064I4Space Armor Iron Man|#14-C|If Space Armor Iron Man would be KO\'d by combat damage, you may pay [S]. If you do, spin Space Armor Iron Man up 1 level, and clear all damage from him.|* When fielded, Space Armor Iron Man gains Overcrush',
    '034I4War Machine|Model II|Fast <em>(This character deals damage before non-Fast characters in combat.)</em>',
    '044I4War Machine|"Rhodey"|Fast|When War Machine KOs an opposing character die with combat damage, deal 2 damage to your opponent.|* War Machine gets +1A.',
    '044I4War Machine|JRXL-1000|Fast|Suit Up - Iron Man|* Sidekicks can\'t block War Machine',
    '04003Armor Wars|Basic Action Card|KO target character die with Suit Up. Each player loses 1 life.',
    '03003Cone of Cold|Basic Action Card|Deal 1 damage to target character die, deal 2 damage to a different target character die, and deal 3 damage to another different target character die. You may only use this action if there are at least 3 character dice in the Field Zone.|Global: Pay [F]. Target blocked character die gets +2A.',
    '05003Hypervelocity|Basic Action Card|Continuous: At the end of each player\'s turn, if they didn\'t attack with any character dice, they lose 2 life.|*/** Also, any player may pay 3 life during their Main Step to send this die to the Used Pile.',
    '05003One Against Many|Basic Action Card|Deal target player X damage, where X is the number of character dice in their Field Zone plus 2.',
    '03003Smash!|Basic Action Card|KO target level 1 character die.|** Instead, KO target level 1 or 2 character die.|Global: Pay [F]. Target blocked character die deals no combat damage this turn.',
    '02003Surprise Attack|Basic Action Card|Deal 1 damage to target character die.|*/** Instead, deal 2 damage.',
    '02003Upgrade - Fortification|Basic Action Card|Target character die you control gains Iron Will. Lose 2 life if that character die isn\'t a [S] character die.',
    '02003Upgrade - Proton Cannon|Basic Action Card|Target character die you control gains Overcrush. KO that character die at end of turn if it isn\'t a [F] character die.',
    '02003Upgrade - Smokescreen|Basic Action Card|Target character die you control gets +1A. If it is a level 1 [M] character die, it can\'t be blocked this turn.',
    '02003Upgrade - Unibeam|Basic Action Card|Target character die you control gets +2A. If it is a [B] character die, it also gains Fast.',
    ];
    var hhs = [
    '02403April|No Mere Damsel|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|Turtle Power <em>(While April is active, other [TURTLE] character dice cost 1 less to purchase, to a minimum of 1.)</em>',
    '02403April|On the Scene|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|While April is active, your [TURTLE] characters get +2A and +2D while blocking, or while blocked by, [DCV] character dice <em>(until end of turn)</em>.',
    '02403April|Sixth Sense|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|While April is active, each turn, prevent the first X damage to each April character die from each source, where X is the number of active [TURTLE] characters you control.',
    '02203Casey Jones|Penalty Box|When Casey Jones KOs a Sidekick character die, gain 1 life.|Global: Pay [F]. Target Sidekick character die must block this turn, if able.',
    '02203Casey Jones|Broken Home|Casey Jones can block up to 3 character dice with purchase cost 2 or less.',
    '03203Casey Jones|Goongala! Goongala!|Casey Jones can\'t be blocked by character dice with purchase cost 2 or less.',
    '053T3Donatello|Intellectually Inclined|When Donatello attacks, you may pay [B] to deal 2 damage to target character die or opponent.',
    '053T3Donatello|Technologic|When Donatello attacks, deal 1 damage to target opponent for each other, active [TURTLE] character you control.',
    '053T3Donatello|Notice Me!|Turtle Power <em>(While Donatello is active, other  [TURTLE] character dice cost 1 less to purchase, to a minimum of 1.)</em>',
    '033V3Foot Ninja|Shinobijutsu|Swarm|Ally|When fielded, while Shredder is active, draw a die and add it to your Prep Area.',
    '033V3Foot Ninja|Stick to the Shadows|Ally|When two or more Foot Ninja character dice you control attack at once, deal damage to target opponent equal to the number of attacking Foot Ninja character dice.',
    '033V3Foot Ninja|Glass Jawed|Ally|When Foot Ninja is KO\'d, move a Foot Ninja from your Used Pile to the Field Zone at level 3.',
    '06403Hamato Yoshi|Protective Parent|When Hamato Yoshi is blocked, deal half of the blocking character die\'s A, rounded down <em>(minimum 1)</em>, to target opponent.',
    '06403Hamato Yoshi|Unknowing Teacher|Character dice blocked by Hamato Yoshi deal their A to themselves. <em>(In addition to normal combat damage.)</em>',
    '07403Hamato Yoshi|Shidoshi|When Hamato Yoshi attacks, all opposing character dice must block <em>(they may block normally)</em>.|Global: Pay [2]. Deal 1 damage to target blocking character die.',
    '04203Karai|Dark Lineage|While Karai is active, Sidekicks cannot attack.',
    '04203Karai|Torn Between Two Worlds|When fielded, you may KO target opposing Sidekick.',
    '04203Karai|Uneasy Allegiance|While Karai is active, your Sidekick dice get +1A and +1D.',
    '054V3Leatherhead|Exposed to Mutagen|When fielded, name a [TURTLE] character. That character cannot block this turn.',
    '064V3Leatherhead|Transmat Engineer|When fielded, [TURTLE] characters cannot block this turn.',
    '054V3Leatherhead|I Guarantee!|When fielded, choose a [TURTLE] character, cancelling all previous choices. While Leatherhead is active, that character cannot be purchased or fielded.',
    '052T3Leonardo|Plight of the Eldest|When Leonardo attacks, you may pay [F] to deal 2 damage to target character die or opponent.',
    '052T3Leonardo|Fearless Leader|Turtle Power <em>(While Leonardo is active, other [TURTLE] character dice cost 1 less to purchase, to a minimum of 1.)</em>',
    '052T3Leonardo|Multifolded Steel|While Leonardo is active, whenever a [TURTLE] character die is KO\'d, deal 1 damage to target opponent.',
    '054T3Metalhead|Rogue Robot|Metalhead gets +1A and +1D for each active, non-Metalhead [TURTLE] character die.',
    '064T3Metalhead|Dissociative Identity|When Metalhead attacks, other, non-Metalhead [TURTLE] character dice cannot be blocked.',
    '054T3Metalhead|Upgrading the Arsenal|When fielded, deal damage equal to Metalhead\'s A to target [DCV] character die.',
    '051T3Michelangelo|Insatiable Appetite|When Michelangelo attacks, you may pay [M] to deal 2 damage to target character die or opponent.',
    '051T3Michelangelo|Booyakasha!|Turtle Power <em>(While Michelangelo is active, other [TURTLE] character dice cost 1 less to purchase, to a minimum of 1.)</em>',
    '051T3Michelangelo|Chuck and Chuck II: The Sequel|While Michelangelo is active, whenever a [DCV] character die KOs a [TURTLE] character die, KO that [DCV] character die. It goes to the Used Pile instead of the Prep Area.',
    '054T3Raphael|Nightwatcher|When Raphael attacks, you may pay [S] to deal 2 damage to target character die or opponent.',
    '054T3Raphael|Controlling His Temper|Turtle Power <em>(While Raphael is active, other [TURTLE] character dice cost 1 less to purchase, to a minimum of 1.)</em>',
    '054T3Raphael|Second Son|While Raphael is active, [TURTLE] character dice you control cannot be targeted by opposing action dice or Global Abilities.',
    '03303Renet Tilley|Apprentice Timestress|While Renet Tilley is active, you may reroll one die one extra time during your Roll and Reroll Step.',
    '03303Renet Tilley|79th Dimension of Null Time|While Renet Tilley is active, at the end of your Roll and Reroll Step, you may spin any action die in your Reserve Pool on a non-energy face to any other face.',
    '03303Renet Tilley|Impeccable Timing|When fielded, you may move a die from your Reserve Pool to your Used Pile to roll a different die from your Used Pile and place it in your Reserve Pool.',
    '061V3Shredder|Scarred|When fielded, players must pay 1 life to active a Global Ability <em>(until end of turn)</em>.',
    '061V3Shredder|Dining on Turtle Soup!|When Shredder KOs an opposing non-[DCV] character die, that die\'s controller loses 1 life.',
    '081V3Shredder|False Bushido|When fielded, move all Foot Ninja dice and up to 2 Sidekick dice from your Used Pile to the Field Zone at level 1.',
    '053V3Slash|Specimen 6|When Slash is blocked, deal damage equal to his A to a target opposing character die that is not blocking him. <em>(Before combat damage.)</em>',
    '053V3Slash|Portal from Dimension X|When Slash is KO\'d, deal damage equal to his level to target opponent.',
    '053V3Slash|Never Liked the Name "Spike"|When Slash is KO\'d, deal damage to target opponent equal to the total energy in their Reserve Pool.',
    '071V3Tiger Claw|Lost Humanity|When fielded, deal 3 damage to each opposing character die.',
    '061V3Tiger Claw|Krang Experiment|When fielded, KO target level 1 or level 2 character die.',
    '061V3Tiger Claw|Seeking Vengeance|When Tiger Claw attacks, deal 2 damage to target opponent.',
    '042V3Triceraton|Cretaceous Crusher|',
    '052V3Triceraton|Orders from Captain Zorax|When Triceraton attacks, it gets +3A <em>(until end of turn)</em>.',
    '052V3Triceraton|Loyal to a Fault|Overcrush',
    '04003Haymaker|Basic Action Card|Target character die gets +3A and Overcrush this turn <em>(damage dealt in excess of blockers\' health is dealt to opponent)</em>.|Global: Pay [F]. Target character die gets +1A until end of turn.',
    '05003Ingenious Tactics|Basic Action Card|Prevent all combat damage to each of your attacking character die <em>(until end of turn)</em>.',
    '01003Momentum|Basic Action Card|Roll any number of dice from your Prep Area and place them in your Reserve Pool.|** Also, before selecting which dice to roll, draw a die and place it in your Prep Area.',
    '03003Mutation|Basic Action Card|Swap target character die in the Field Zone with target non-sidekick character die in that player\'s Used Pile. Spin that character die to level 1. This does not trigger "when fielded" effects.|Global: Pay [M]. Spin one of your character die down a level to spin another target character die up a level.',
    '03003Mysterious Shredder Transport|Basic Action Card|Each player must sacrifice one character die.',
    '02003Nefarious Broadcast|Basic Action Card|Cancel any active effects of previously used Global Abilities. Global Abilities cannot be used <em>(until end of turn)</em>.',
    '03003Speedy Delivery|Basic Action Card|Target character die must attack at its next opportunity. Spin that character die up one level <em>(if able)</em>.|Global: Pay [B]. Target character die gets +1A until end of turn.',
    '03003Splinter\'s Teachings|Basic Action Card|Roll target character die from your Used Pile. If it rolls a character face, field it at no cost. Otherwise, place it in your bag.|Global: Pay [S]. Swap the A of target character die you control and target opposing character die.',
    '02003Reclaim|Basic Action Card|Move a die from your Used Pile to your Prep Area.',
    '03003Unstable Canister|Basic Action Card|Deal 2 damage to target character die or player.|** Deal extra damage to a character die equal to the level of your highest level [TURTLE] in the Field Zone.|Global: Pay [B]. Deal 1 damage to target character die.',
    ];
    var dp_aff = { 0:'0', I:'MIH', D:'MDP', T:'CWT', X:'1', V:'4', F:'ASF', G:'G', S:'F' };
    var dp = [
    '132S4Agent Carter|Behind Enemy Lines|While Agent Carter is active, when a Sidekick character die is KO\'d, place it in its owner\'s bag.',
    '15204Agent X|Nijo Minamiyori|Back for More - You may pay 1 life to draw a die and roll it. <em>(Use when rolled from the Prep Area.)</em>',
    '152V4Angel Dust|Chicagoan|When Angel Dust blocks or is blocked, she gets +XA and +XD where X is equal to the combined total level of all character dice she is engaged with.',
    '143G4Angela|Asgardian Assassin|When fielded, deal 2 damage to target non-[B] character die.',
    '141I4Black Bolt|...|When fielded, target character die you control gets +2A. If that character die is [MIH], it gets +3A instead.',
    '153V4Black Tom Cassidy|Trusty Shillelagh|Fast <em>(Deals combat damage before character dice without Fast.)</em>|Black Tom Cassidy gets +1A and +1D for each different, opposing [XMEN] character die.',
    '13104Blind Al|Stay in the Deadhut|When Blind Al is dealt combat damage, deal 1 damage to target opponent.',
    '132D4Bob, Agent of Hydra|Hiding Behind You|While Bob, Agent of Hydra is active, [MDP] character dice get +1A.',
    '162X4Colossus|Rigid Morals|Back for More - Deal 1 damage to all character dice and players. <em>(Use when rolled from the Prep Area.)</em>',
    '152D4Deadpool|My Set. My Rules.|Deadly <em>(At end of turn, KO all character dice that were engaged with this character.)</em>',
    '142D4Dogpool|Earth-20110|When fielded, deal 1 damage to target opposing character die.|* Also, spin target [MDP] character die up one level.',
    '134D4Domino|Neena Thurman|Back for More - You may reroll this die one extra time during your Roll and Reroll Step. <em>(Use when rolled from the Prep Area.)</em>',
    '131T4Elektra|Greek Tragedy|When Elektra is KO\'d, you may pay [F]. If you do, you may reroll Elektra as if she had Regenerate <em>(reroll when KO\'d)</em>.',
    '143V4Evil Deadpool|Spare Parts|When Evil Deadpool is KO\'d by combat damage, KO target opposing level 1 character die or target opposing [MDP] character die.',
    '144X4Fantomex|Misdirection|When fielded, you may spin down target opposing non-[DCV] character die. If you do, the Fantomex character die you fielded gets +1A and +1D.',
    '14404Flying Car|Buckle Up!|Target character die you control gets +3A and +3D and loses all character abilities. <em>(Global Abilities are not character abilities.)</em>',
    '12104Free Chimichangas|Delicious|Impulse - Target character die gets +2D <em>(until end of turn)</em>. <em>(Impulse abilities happen when you purchase the character die with Impulse.)</em>|Target character die gets +2D.',
    '13204Hit-Monkey|No Monkey Business|Fast <em>(Deals combat damage before character dice without Fast.)</em>',
    '134D4Kidpool|Earth-10330|If you have an active [MDP] character die other than Kidpool, Kidpool gets +2A.',
    '133V4Lady Bullseye|Attack on Two Fronts|When fielded, double all damage dealt to target opposing character die until end of turn.',
    '164D4Lady Deadpool|Regenerative Healing Factor-Thingie|If you have more different, active [MDP] characters than an opponent, Lady Deadpool costs 3 less to purchase. <em>(Lady Deadpool does not need to be active to use this ability.)</em>',
    '144I4Lockjaw|Fiercely Loyal|While Lockjaw is active, before your opponent\'s Clear and Draw Step, name a non-Sidekick die. If your opponent draws that die, deal 2 damage to all of that opponent\'s character dice and each of your Lockjaw dice get +2A.',
    '144V4M.O.D.O.K.|Most Powerful Brain Alive|While M.O.D.O.K. is active, except during their Roll and Reroll Step, your opponents may not reroll dice or spin dice to a different face or level, unless they pay [1] per die.',
    '144V4Madame Hydra|Viper|When Madame Hydra deals damages an opponent, move target die from that opponent\'s Prep Area to their bag.',
    '141I4Medusa|Tangled Up|Deadly <em>(At end of turn, KO all character dice that were engaged with this character.)</em>|Medusa can block up to two character dice.',
    '142F4Miguel O\'Hara|Spider-Man 2099|When Miguel O\'Hara KOs a character die with combat damage, send the KO\'d character die to its owner\'s bag.',
    '151V4Mister Sinister|Apocalyptic Transformation|Back for More - You may reroll any number of dice in your Field Zone. <em>(Use when rolled from the Prep Area.)</em>',
    '12204Motorcycle|Vroom!|Target blocked character die you control gains +1A and +1D.|Global: Pay [F]. Remove target blocked character die from the Attack Zone.',
    '131X4Multiple Man|Duplicitous Nature|Underdog - When fielded, move a Sidekick die from your Used Pile to the Field Zone.',
    '133X4Negasonic Teenage Warhead|Foresight|While Negasonic Teenage Warhead is active, when your opponent targets one of your character dice with a Global Ability, spin each of your Negasonic Teenage Warhead character dice in the Field Zone to level 3.',
    '133D4Outlaw|Inez Temple|Back for More - Search your bag for an Outlaw die and roll it. If it rolls an energy face, field it at level 1. Otherwise, add it to your Prep Area. <em>(Use when rolled from the Prep Area.)</em>',
    '12404Sandi Brandenberg|Secretary AND Receptionist|Ally <em>(Sandi Brandenberg counts as a Sidekick in the Field Zone.)</em>',
    '13304Satchel of Unlimited Weaponry|Sword|Pay 1 life. When you use an action die from your Reserve Pool that targets 1 or more character dice, Satchel of Unlimited Weaponry may immediately be used as a copy of that die, with new targets.|*/** Instead, you may pay 0 life.',
    '133X4Scarlet Witch|Scarlet? Why not just red?|When fielded, you may move target [F] character die from an opponent\'s Prep Area to their Bag.',
    '131D4Shiklah|Demon Bride|Shiklah gets +2D for each die in your Prep Area.',
    '121X4Stepford Cuckoos|Mindee|When fielded, move target character die you control to your Prep Area.',
    '123X4Storm|Thunderclap|When fielded, spin target   energy in an opponent\'s Reserve Pool to a [B] face <em>(if able)</em>.',
    '15104Taskmaster|Astounding Mimicry|When fielded, you may use the "when fielded" ability of target character die as if Taskmaster had that ability.',
    '164X4Wolverine|Snikt!|When Wolverine takes damage, you may pay [1] to move a [MDP] die from your Used Pile to your Prep Area.',
    '15304X-23|Created to be a Weapon|Regenerate <em>(reroll when KO\'d)</em>|If X-23 regenerates successfully, draw a die and place it in your Prep Area.',
    '232S4Agent Carter|Combat Trained|While Agent Carter is active, no Sidekick character die may attack if it is the only character die assigned to attack.',
    '25204Agent X|Trained by Taskmaster|When Agent X deals combat damage to an opponent, you may pay 2 life to move Agent X to the Prep Area <em>(rather than the Used Pile)</em>.',
    '25204Angel Dust|Morlock|While your life total is less than your opponent\'s, Angel Dust gets +2A and +2D.',
    '243G4Angela|Aldrif Odinsdottir|When Angela attacks, if the defending player has taken damage this turn, Angela gets +2A.',
    '251I4Black Bolt|Let It All Out!|When fielded, all [MIH] character dice you control gain Fast. <em>(Characters with Fast deal combat damage before character dice without Fast.)</em>',
    '253V4Black Tom Cassidy|Concussive Blast|When fielded, KO target opposing [XMEN] character die.',
    '23104Blind Al|Laxatives in your Food|When fielded, if you have been dealt damage this turn, deal 1 damage to target opponent.',
    '232D4Bob, Agent of Hydra|Hydra Doesn\'t Offer Dental|While Bob, Agent of Hydra, is active, [MDP] character dice gain Fast. <em>(Characters with Fast deal combat damage before character dice without Fast.)</em>',
    '272X4Colossus|Former Juggernaut|When fielded, deal 2 damage to all level 1 character dice.',
    '252D4Deadpool|Mmmmmm Chimichangas...|Deadly <em>(At end of turn, KO all character dice that were engaged with this character.)</em>|When fielded, deal 2 damage to all players.',
    '242D4Dogpool|Woof|Back for More - Target [MDP] character die gets +1A and +1D. <em>(Use when rolled from the Prep Area.)</em>',
    '234D4Domino|Luck Be A Lady|If you have at least one [MDP] character die in your Prep Area, Domino may block up to 2 character dice.',
    '231T4Elektra|Get to the Point|Elektra may not be blocked by non-[MDP] character dice. An opponent may pay [1] to ignore this effect for all Elektra dice until end of turn.',
    '243V4Evil Deadpool|Bang! Bang! Bang!|When fielded, deal 2 damage to target opposing level 1 character die or target opposing [MDP] character die.',
    '244X4Fantomex|E.V.A.|Non-[DCV] character dice cannot block Fantomex unless the defending player moves one die from their Prep Area to their Bag for each Fantomex character die they declare blockers for.',
    '24404Flying Car|Classic Model|Place this die on one of your character cards <em>(it is still in the Field Zone)</em>. When you field that character, all copies of that character get +2A <em>(until end of turn)</em>.',
    '23104Free Chimichangas|Aged to Perfection|Target character die gets +2D and gains Deadly. <em>(At end of turn, KO all character dice that were engaged with this character.)</em>',
    '24204Hit-Monkey|He\'s A Hitman. Who\'s a Monkey.|When blocked, you may pay [F] to assign Hit-Monkey\'s combat damage to the defending player this turn as if it were not blocked <em>(instead of dealing combat damage to blocking character dice)</em>.',
    '244D4Kidpool|No Detention For Me!|Back for More - Draw a die. If it is a [MDP] character die, roll it. Otherwise, return it to your bag. <em>(Use when rolled from the Prep Area.)</em>',
    '243V4Lady Bullseye|Maki Matsumoto|When fielded, spin target opposing character die down 1 level when it takes damage this turn.',
    '254D4Lady Deadpool|Stab with the Pointy End!|While Lady Deadpool is active, when you field a [MDP] character die other than Lady Deadpool, you may pay [B]. If you do, spin that character die to level 3.',
    '234I4Lockjaw|Transport the Royals|When Lockjaw is blocked, you may pay [1]. If you do, remove Lockjaw from the Attack Zone.',
    '254V4M.O.D.O.K.|Twisted Mind|When M.O.D.O.K. attacks, you may spin M.O.D.O.K. to the same level as target opposing character die and spin that opposing die to M.O.D.O.K.\'s original level.',
    '244V4Madame Hydra|Snake in the Grass|When Madame Hydra deals combat damage to an opponent, spin all of that opponent\'s character dice down 1 level.',
    '251I4Medusa|Bad Hair Day|Deadly <em>(At end of turn, KO all character dice that were engaged with this character.)</em>|When Medusa KOs a character die with combat damage, send the KO\'d die to the Used Pile <em>(rather than the Prep Area)</em>.',
    '252F4Miguel O\'Hara|What the Shock?!|When fielded, all players sacrifice one character die <em>(sacrificed characters go to the Used Pile)</em>.',
    '261V4Mister Sinister|Gene Splicer|While Mister Sinister is active, opposing players may not reroll dice during their Roll and Reroll Steps, unless they pay 1 life.',
    '23204Motorcycle|Wheels and Other Stuff|Select target character die you control. If that die is blocked and KO\'d this turn, return it to the Field Zone and clear all damage from it.|** Instead, select 2 target character dice you control.',
    '231X4Multiple Man|Jamie Madrox|Swarm <em>(While this character is active, if you draw this die during your Clear and Draw Step, draw and roll an extra die.)</em>|When fielded, you may move any number of Multiple Man dice from your Used Pile to your bag.',
    '233X4Negasonic Teenage Warhead|Bored in School|Underdog <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> When Negasonic Teenage Warhead attacks, spin her up to level 3 and she gains Fast <em>(This character deals damage before non-Fast characters in combat)</em>.',
    '233D4Outlaw|Texas Ranger|When fielded, you may pay [B] to roll target die in an opponent\'s Prep Area. If it rolls an energy face, place it in your opponent\'s Used Pile. Otherwise, place it in their Prep Area.',
    '23404Sandi Brandenberg|Taking in Strays|Ally <em>(Sandi Brandenberg counts as a Sidekick in the Field Zone.)</em>|While Sandi Brandenberg is active, Deadpool gets +1A and gains Regenerate.',
    '24304Satchel of Unlimited Weaponry|Gun|The next action die you purchase this turn costs 2 less.|** Instead, it costs 3 less.',
    '233X4Scarlet Witch|Lady Liberator|Scarlet Witch costs 1 less to purchase if an opponent has a [F] character or action die in their Prep Area. <em>(Scarlet Witch does not need to be active to use this ability.)</em>',
    '231D4Shiklah|Monster Metropolis|Back for More - Spin target [MDP] character die you control up one level. <em>(Use when rolled from the Prep Area.)</em>',
    '231X4Stepford Cuckoos|Celeste|When fielded, each player moves one character die they control to the Prep Area.',
    '233X4Storm|Weather Delay|While Storm is active, your opponents may not reroll Basic Action Dice.',
    '25104Taskmaster|Watch and Learn|When Taskmaster attacks, you may use the "when attacks" ability of target character die as if Taskmaster had that ability.',
    '254X4Wolverine|Berserker Frenzy|Back for More - Target [MDP] character die gets +3A. <em>(Use when rolled from the Prep Area.)</em>',
    '25304X-23|&nbsp;|Trigger Scent|If an opponent has 2 or more dice in their Prep Area, X-23 costs 1 less to purchase. <em>(X-23 does not need to be active to use this ability.)</em>',
    '322S4Agent Carter|Answered the Call|While Agent Carter is active, Sidekick character cost [1] more to field.',
    '35204Agent X|"Earth-2 Counterpart"|When fielded, you may pay 2 life to draw a die. If that die is a Sidekick, place it in the Used Pile. Otherwise, place it in the Prep Area.',
    '362V4Angel Dust|Christina|When at least one of your Angel Dust character dice blocks, deal 2 damage to all attacking character dice <em>(no matter how many blocking Angel Dust dice you have)</em>.',
    '343G4Angela|Raised as an Angel|At the end of the Roll and Reroll Step, deal 1 damage to target character die or player for each Angela die you rolled that shows an energy face. <em>(Angela does not need to be active to use this ability.)</em>',
    '341I4Black Bolt|King of the Inhumans|When fielded, target character die you control gets +2A. If that character die has Deadly, all opposing character dice must block that die if able.',
    '343V4Black Tom Cassidy|Plant-Form Secondary Mutation|Black Tom Cassidy cannot be blocked by [XMEN] character dice. Black Tom Cassidy can block any number of [XMEN] character dice.',
    '34104Blind Al|Fought Alongside Captain America|If you have taken 4 or more combat damage in a turn, you may immediately purchase one Blind Al die for [3] less. <em>(Blind Al does not need to be active to use this ability.)</em>',
    '332D4Bob, Agent of Hydra|The H Stands for Hopeless|While Bob, Agent of Hydra, is active, [MDP] character dice cannot be targeted by opposing actions.',
    '372X4Colossus|Armored Up|When Colossus attacks, any character dice that would be assigned to block first take 2 damage.',
    '332D4Dogpool|Bark|When a single Dogpool character die is the only blocking character die, that character die gains Deadly. <em>(At end of turn, KO all character dice that were engaged with this character.)</em>',
    '344D4Domino|Guns Blazing!|When Domino is KO\'d by combat damage, you may move a Sidekick die from your Used Pile to your Prep Area.',
    '321T4Elektra|Way of the Stick|While Elektra is active, your character dice with purchase cost of 2 or less cannot be targeted by Global Abilities <em>(either player\'s)</em>.',
    '343V4Evil Deadpool|Reroll! No Sidekicks!|Back for More - KO target opposing Sidekick character die or target opposing [MDP] character die. <em>(Use when rolled from Prep Area.)</em>',
    '354X4Fantomex|Triple-Brained Fantome|When fielded, move target [DCV] character die from your Used Pile to your Prep Area.',
    '34404Flying Car|Fly-By|Target character die you control deals combat damage to the defending player as if not blocked <em>(instead of to blocking characters)</em>. Then, sacrifice it.',
    '33104Free Chimichangas|Best Things in Life|Target character die gets +3D.|*/** Also, that character die may only be blocked by 2 or more character dice.',
    '34204Hit-Monkey|Bullet-Time Slo-Mo|When fielded, deal 2 damage to target opposing player with 3 or more dice in their Prep Area.',
    '344D4Kidpool|Dual "Light Swords"|If you have an active [MDP] character die other than Kidpool, Kidpool gains Deadly while blocking.',
    '343V4Lady Bullseye|Speed, Grace, Precision|When fielded, target opposing character die must block this turn.',
    '334I4Lockjaw|King\'s Best Friend|While Lockjaw is active, before your Clear and Draw Step, name a non-Sidekick die. If you draw that die, gain 1 life and each of your Lockjaw dice gets +1A and +1D.',
    '344V4M.O.D.O.K.|Master of A.I.M.|While M.O.D.O.K. is active, opposing character dice may not be spun to a higher level.',
    '344V4Madame Hydra|In the Name of Hydra|When fielded, deal 3 damage to all players. Any player may move a die from their Prep Area to their bag to prevent the damage done to them.',
    '351I4Medusa|Queen of Attilan|Deadly <em>(At end of turn, KO all character dice that were engaged with this character.)</em>|When Medusa KOs an opposing character die with combat damage, gain 1 life.',
    '342F4Miguel O\'Hara|Lyrate Lifeform Approximation|Fast|Back for More - Deal 1 damage to target opponent. <em>(Use when rolled from the Prep Area.)</em>',
    '351V4Mister Sinister|Messiah Complex|While Mister Sinister is active, once per turn, during your Roll and Reroll Step, you may pay 2 life to reroll your dice an additional time.',
    '34204Motorcycle|Burn Rubber|KO target blocking character die.',
    '333X4Negasonic Teenage Warhead|X-Student|Underdog - Negasonic Teenage Warhead gains Deadly. <em>(At end of turn, KO all character dice that were engaged with this character.)</em>',
    '343D4Outlaw|Quick Draw|During the Attack Step, if you have any dice in your Prep Area, Outlaw gets +2A and +2D.',
    '33404Sandi Brandenberg|On-Again, Off-Again|While Sandi Brandenberg is active, when a [MDP] character die is targeted by an action die or character ability, you may change the target to a Sandi Brandenberg character die.',
    '35304Satchel of Unlimited Weaponry|Chimichanga|Deal 2 damage to target character die or player for each action die in your Field Zone.',
    '343X4Scarlet Witch|No More Mutants|When fielded, deal 1 damage to all players and non-[F] character dice, and 2 damage to all [F] character dice.',
    '341D4Shiklah|Succubus|While Shiklah is active, at the beginning of your turn, move a Sidekick die from your Used Pile to your Prep Area.',
    '331X4Stepford Cuckoos|Phoebe|When Stepford Cuckoos deal combat damage to an opponent, deal 1 damage to that opponent if they have 2 or more dice in their Prep Area.',
    '333X4Storm|Extra Lightning|While Storm is active, when you use an action die, deal 1 damage to target opponent or target character die.',
    '36104Taskmaster|Sincerest Form of Flattery|When fielded, Taskmaster gains the abilities of target character die <em>(until end of turn)</em>. <em>(Abilities include everything in a character\'s text box other than Global Abilities, and also includes abilities granted by other cards.)</em>',
    '364X4Wolverine|C\'mon... Try It, Bub!|When KO\'d, you may pay 2 life to roll target [MDP] character die in your Prep Area. If it rolls a character face, field it for free at the revealed level. Otherwise, return it to your Prep Area.',
    '452D4Deadpool|Why Isn\'t There a Hero Affiliation?|When Deadpool is KO\'d, KO target opposing level 1 character die.',
    '454D4Lady Deadpool|Earth-3010|While Lady Deadpool is active, when you use an action die, you may pay [B]. If you do, you may immediately use the ability of that action die a second time with the same number of bursts.',
    '421X6Multiple Man|Pile On!|Swarm <em>(While this character is active, if you draw this die during your Clear and Draw Step, draw and roll an extra die.)</em>',
    '45304X-23|Blades of Rage|When X-23 attacks, roll all dice in all players\' Prep Areas. For each energy rolled, X-23 gets +2A. <em>(Count energy symbols, not faces that show energy.)</em> Return all rolled dice to their respective Prep Areas.',
    '46B01Captain America with Mjolnir|Worthy|While Captain America with Mjolnir is active, the first time you use a Global Ability each turn, deal 1 damage to target opponent.|While Captain America with Mjolnir is active, the first time you use an action die each turn, deal 1 damage to target opponent.',
    '46B01Charles Xavier, Juggernaut|Brains and Brawn|When Charles Xavier, Juggernaut, attacks, name a die and draw a die from your bag. If it is the named die, add it to your Prep Area and spin this die up 1 level. Otherwise, add it to your Used Pile.',
    '46B01Phoenix Force Magneto|Nowhere Is Safe Anymore|When fielded, reroll X active character dice you control. After you do so, target opponent must reroll X active character dice they control. <em>(Your opponent chooses which dice.)</em>',
    '46B01Wolverine Lord of Vampires|The X-Vampires Will Feed|While Wolverine Lord of Vampires is active, when an opposing character die is KO\'d, he deals 1 damage to target opponent and you gain 1 life.',
    ];

    var drs_aff = { 0: '0', V:'4', M:'MYSTIC' };
    var drs = [
    '074M4Ancient One|Wise Master|While Ancient One is active, your opponent\'s [MYSTIC] character dice get -3A.',
    '074M4Ancient One|The Original Sorcerer Supreme|While Ancient One is active, your opponent cannot target your [MYSTIC] character dice with Global Abilities or character abilities.',
    '074M4Ancient One|Vapors of Valtorr|While Ancient One is active, your [MYSTIC] character dice cost [2] less to purchase <em>(to a minimum of one)</em>.',
    '063M4Clea|Flames of Regency|While Clea is active, once per turn, whenever you could use a Global Ability, you may pay [B] to deal 3 damage to target non-[MYSTIC] character die.',
    '063M4Clea|Faltine Blood|While Clea is active, your other [MYSTIC] character dice cost [1] less to field to a minimum of 1.',
    '073V4Clea|Dark Sorceress|When fielded, KO target opposing level 1 character die or KO target [MYSTIC] character die.',
    '064M4Doctor Strange|Sanctum Santorum|While Doctor Strange is active, pay [1] less to purchase Action Dice <em>(to a minimum of 1)</em>.',
    '074M4Doctor Strange|Wand of Watoomb|While Doctor Strange is active, each time you roll 2 or more action dice gain 2 life.',
    '074M4Doctor Strange|Hoary Hosts of Hoggoth|While Doctor Strange is active, prevent all but 1 damage to you from each opposing action dice.',
    '071V4Dormammu|Dark Lord of Chaos|While Dormammu is active, your opponent pays [1] more to purchase action dice.',
    '071V4Dormammu|The Dread One|While Dormammu is active, your opponents take 2 damage when they use an action die. Any opponent may KO one of their character dice to ignore this ability until end of turn.',
    '061V4Dormammu|Burning Ambition|While Dormammu is active, your opponents with 3 or more active characters may not use action dice. <em>(Characters are active if there is at least one of their dice in the Field Zone, so 3 copies of the same character die would only count as 1 active character.)</em>',
    '03104Eye of Agamotto|The All-Seeing|When used, place this die on a Basic Action Card. While Eye of Agamotto is on a Basic Action Card, that Basic Action costs [1] more for your opponents to purchase. While on a Basic Action Card, Eye of Agamotto can be targeted as if it was in the Field Zone.',
    '04104Eye of Agamotto|Mystical Conduit|When used, place this die on a Basic Action Card. While Eye of Agamotto is on a Basic Action Card, when your opponent uses this Basic Action, Eye of Agamotto deals them 1 damage <em>(for each copy of Eye of Agamotto)</em>. Eye of Agamotto can be targeted as if it was in the Field Zone.|Global: Pay [1]. The first action you buy this turn is put into your bag <em>(instead of the Used Pile)</em>.',
    '03104Eye of Agamotto|Reside Within the Amulet|When used, place this die on a Basic Action Card. While Eye of Agamotto is on a Basic Action Card, when you use that Basic Action, your character dice get +1A. Eye of Agamotto can be targeted as if it was in the Field Zone.|Global: Pay [1]. The first action you buy this turn is put into your bag <em>(instead of the Used Pile)</em>.',
    '022V4Mindless Ones|Dark Dimension|When fielded, Mindless Ones deal you 1 damage.',
    '032V4Mindless Ones|Stare Into Your Soul|Regenerate <em>(Reroll when KO\'d.)</em>',
    '032V4Mindless Ones|Unseeing Gaze|Swarm <em>(While this character is active, if you draw this die during your Clear and Draw Step, draw and roll an extra die.)</em>',
    '033M4Scarlet Witch|Witchy Woman|When fielded, search your bag for an action die and roll it. If you do and roll an energy face, Scarlet Witch deals you 2 damage.',
    '043M4Scarlet Witch|Hex Bolts|While Scarlet Witch is active, when you use an action die, you may pay [1] to add it to your Prep Area.',
    '043M4Scarlet Witch|Chaos Magic|While Scarlet Witch is active, when you use an action die, gain 1 life.',
    '022M4Wong|Expert of Kamar-Taj|Ally <em>(Wong counts as a Sidekick in the Field Zone.)</em>|Fast <em>(Character dice with Fast deal combat damage before normal combat damage, all at once.)</em>',
    '032M4Wong|Dedicated to the Ancient One|Ally <em>(Wong counts as a Sidekick in the Field Zone.)</em>|When fielded, you may pay X energy and sacrifice X Sidekicks to deal X damage to target opponent.',
    '032M4Wong|Faithful Servant|Ally <em>(Wong counts as a Sidekick in the Field Zone.)</em>|While Wong is active, other Sidekick character dice get +1A and +1D.',
    ];

    var gaf_aff = { 0:'0', A:'DCGA', B:'WFB', V:'6', C:'C', G:'WG', I:'8', J:'7', L:'9', M:'MYSTIC', S:'DCSS', T:'WT', W:'DCWL' };
    var gaf = [
    '124V4Amanda Waller™|White Queen|When Amanda Waller attacks, she gets +1A for each of your attacking [DCSS] character dice.',
    '155J4Barry Allen™|Super-Sonic Punch|Synergy - While Barry Allen is active, you may pay [B][F] to give a Barry Allen character die +2A and +4D <em>(until end of turn)</em>. <em>(Synergy abilities can be used while the character is active, any time you could use a Global Ability.)</em>',
    '141B4Batgirl™|Commish\'s Daughter|While Batgirl is active, your opponent may not target your character dice with character abilities.',
    '141V4Black Adam™|No Mercy|While Black Adam is active, when an attacking character die is KO\'d, it goes to the Used Pile.',
    '132J4Black Canary™|Like Mother, Like Daughter|',
    '143V4Captain Cold™|Rogue Leader|While Captain Cold is active, when you use an action die, target opposing Sidekick can\'t attack or block this turn.',
    '12504Captain Cold™\'s Cold Gun|Snowy Schematics|Deal 2 damage to target character die.',
    '151V4Clayface™|Malleable Menace|At the beginning of your Clear and Draw Step, you may replace Clayface\'s A and D with target character die\'s <em>(until end of turn)</em>. <em>(You may do this for each Clayface die separately.)</em>',
    '14804Cosmic Treadmill™|Antique Shop Discovery|Reroll up to 2 target dice in your Reserve Pool. For each [F] or [M] rolled, deal 1 damage to target opponent.',
    '144T4Cyborg™|A New Man|While Cyborg is blocking, character dice he KOs with combat damage are sent to the Used Pile.',
    '143V4Deadshot™|Villains United|Once per turn, when fielded, choose [DCV] or [DCSS]. All dice of that affiliation cost [1] less to purchase <em>(until end of turn)</em>.',
    '169V4Deathstroke™|Guerilla Warfare|While Deathstroke is active, when you field a [F] or [S] character die, Deathstroke gets +1A and +1D <em>(+2A and +2D if the character is a [F] and [S])</em> <em>(until end of turn)</em>.',
    '144A4Diggle™|Green Beret|Diggle costs [1] less to purchase for each of your active Crossover characters.',
    '144J4Doctor Light™|Hard Light|When fielded, KO target opposing level 1 [DCV] character die.',
    '124A4Felicity Smoak™|Gray Hat|When fielded, you may spin target character die up or down 1 level.',
    '143J4Firestorm™|Host of the Matrix|When Firestorm attacks, deal 1 damage to target character die for each other character die in your Field Zone.',
    '152L4Giganta™|Big Ups|At the beginning of your Clear and Draw Step, you may spin Giganta up 1 level. If you do, Giganta can\'t be blocked by Sidekick dice <em>(this turn)</em>.',
    '152L4Gorilla Grodd™|Supplanting Solovar|',
    '15AA4Green Arrow™|Robin Hood|Synergy - While Green Arrow is active, when an opposing action die targets one of your character dice, you may pay [M][S] to choose a new target. <em>(Synergy abilities can be used while the character is active, any time you could use a Global Ability.)</em>',
    '126G4Hal Jordan™|Green Lantern\'s Light|',
    '133V4Huntress™|The Hunt Begins|While Huntress is active, whenever you roll a [Q], you may spin each Huntress die up a level for each [Q] rolled.',
    '147I4Jay Garrick™|Leadfoot|Synergy - While Jay Garrick is active, when your opponent uses a Global Ability, you may pay [B][S] to cancel that ability. <em>(Synergy abilities can be used while the character is active, any time you could use a Global Ability.)</em>',
    '121J4Katana™|Bladerunner|While a Katana die is in your Prep Area, if your opponent rolls one or more [Q] <em>(even if they would reroll that die)</em>, you may pay 1 life and field one Katana die at level 1.',
    '131V4Killer Frost™|Thermodynamic Disaster|Intimidate|Killer Frost can only use Intimidate on non-[DCV] character dice with purchase cost 5 or greater.',
    '162S4King Shark™|Underwater Aggression|Teamwatch - You may sacrifice King Shark to deal 2 damage to all opposing character dice <em>(Sacrificed character dice are moved to the Used Pile)</em>.',
    '164J4Martian Manhunter™|My True Form|While Martian Manhunter is active, ignore "when attacks" and "when fielded" effects on [DCV] character dice.',
    '143V4Merlyn™|The Magnificent|Fast <em>(Character dice with Fast deal combat damage before non-Fast characters.)</em>',
    '143C4Power Ring™|Harold Jordan|When Power Ring attacks, he gets +1A for each opposing non-[DCV] character die in your opponent\'s Field Zone.',
    '152V4Professor Zoom™|Out of Time|Fast <em>(Character dice with Fast deal combat damage before non-Fast characters.)</em>|While Professor Zoom is active, all opposing character dice lose Fast and can\'t gain Fast.',
    '151V4Ra\'s Al Ghul™|The Demon|When fielded, target character die\'s A becomes 1 <em>(until end of turn)</em>.',
    '14A04Rip Hunter™\'s Chalkboard|"Only Zatara™ Can Reach The POINT"|Add all dice in your bag to your Used Pile. For each [M] or [S] character added to your Used Pile in this way, gain 1 life. <em>(If that character die was [M] and [S], gain 2 life instead.)</em>|Global: Pay [S]. The first die you purchase this turn is added to your Prep Area instead of your Used Pile.',
    '142A4Roy Harper™|Don\'t Call Me Speedy|When fielded, target [DCA] character die you control gains Fast <em>(until end of turn)</em>. <em>(Character dice with Fast deal combat damage before non-Fast characters.)</em>',
    '13704S.T.A.R. Labs™|Advanced Research|Target [B] or [S] character die you control deals damage equal to its A to another target character die.|Global: Pay [B][S]. Move a Sidekick die from your Used Pile to your Prep Area and field another Sidekick die from your Used Pile.',
    '131A4Speedy™|Runaway|When Speedy is blocked, you may sacrifice Speedy to deal 2 damage to target blocking character die <em>(Sacrificed character dice are moved to the Used Pile)</em>.',
    '133T4Static™|Virgil Hawkins|While Static is active, whenever your opponent rolls 2 or more dice at once, deal 1 damage to target character die.',
    '164J4Superman™|Man of Tomorrow|Superman gets +1A and +1D for each of your active [DCJL] characters.',
    '142T4The Atom™|Sword of The Atom|While The Atom is active, whenever you could use a Global Ability you may spin down one of your The Atom dice to level 1 to deal 3 damage to target character die.',
    '143V4Weather Wizard™|Dark Clouds|When fielded, deal 2 damage to target non-Crossover character die.',
    '122T4Wonder Girl™|Supergirl™\'s Gal Pal|',
    '138M4Zatanna™|Main Attraction|While Zatanna is active, whenever you field a [F] or [M] character die, you may reroll one of your dice. If that character is [F] and [M], you may instead reroll up to two of your dice <em>(in the Field Zone or in the Reserve Pool)</em>.',
    '224S4Amanda Waller™|The Wall|When Amanda Waller blocks, she gets +1D for each of your blocking [DCSS] character dice.',
    '255J4Barry Allen™|Central City Streak|While Barry Allen is active, all of your other [B] and [F] character dice get +1A <em>(if a character die is [B] and [F] it gets +2A instead)</em>.',
    '241B4Batgirl™|Protecting Innocents|While Batgirl is active, your opponents may not target your [M] character dice with Global Abilities.',
    '251V4Black Adam™|Teth Adam|While Black Adam is active, all [DCV] character dice gain Regenerate.',
    '242J4Black Canary™|Volatile|Impulse - Target Crossover character die gets +2A and +2D <em>(until end of turn)</em>. <em>(Impulse abilities happen when you purchase the character die with Impulse.)</em>',
    '243V4Captain Cold™|Elegant Egomaniac|While Captain Cold is active, when you use an action die, Captain Cold gets +1A and +1D <em>(until end of turn)</em>.',
    '23504Captain Cold™\'s Cold Gun|Beautifully Designed|Continuous: Whenever you could use a Global Ability, you can send this die to the Used Pile to deal 3 damage to target character die.|*/** Also, that character die can\'t attack this turn.',
    '261V4Clayface™|The Clayface of Tragedy|When fielded, target Crossover character die loses its abilities and Clayface gains them. <em>(That die\'s card keeps its Global Abilities, Clayface doesn\'t gain their Global Abilities, and all other copies of that die keep their abilities.)</em>',
    '24804Cosmic Treadmill™|Flash Museum Relic|Reroll up to 2 dice in your Reserve Pool. For each [F] or [M] rolled, your character dice in the Field Zone get +1A <em>(until end of turn)</em>.',
    '244T4Cyborg™|Half-Man, Half-Machine|When Cyborg blocks, spin target [TT] character die you control up one level.',
    '243S4Deadshot™|Pinpoint Accuracy|Teamwatch - You may sacrifice Deadshot to KO target level 1 character die. <em>(Sacrificed character dice are moved to the Used Pile.)</em>',
    '269V4Deathstroke™|High Price|Crosspulse - When you purchase this die, KO all opposing Sidekick dice. <em>(You can only use a Crosspulse ability if you paid this character\'s purchase cost using only their energy types.)</em>',
    '254A4Diggle™|Problem Solver|While Diggle is active, you may spend [S] as [Q].',
    '244J4Doctor Light™|Blinding Bright|While Doctor Light is active, opposing Sidekicks cannot block.',
    '224A4Felicity Smoak™|Hacker-For-Hire|When fielded, you may change one of your Sidekick character dice to its [Q] side.',
    '243J4Firestorm™|The Nuclear Man|When Firestorm attacks, if you have an active character die of each energy type <em>([B]/[F]/[M]/[S])</em> in your Field Zone, double Firestorm\'s A and D.',
    '252L4Giganta™|Tall Glass of Water|At the beginning of your Clear and Draw Step, you may spin each of your Giganta dice up 1 level. Each one that you spin up in this way can\'t be blocked by only one character die <em>(until end of turn)</em>.|Global: Pay [1]. Spin target character die you control down 1 level.',
    '272L4Gorilla Grodd™|Force of Mind|While Gorilla Grodd is active, all of your character dice gain Overcrush. While Gorilla Grodd is active, your other character dice get +1A. <em>(Character dice with Overcrush deal damage in excess of blocker\'s D to opponent.)</em>',
    '26AA4Green Arrow™|Ollie|While Green Arrow is active, when you field a [M] or [S] character die, Green Arrow gets +2D <em>(if the character is a [M] and [S] he gets +4D instead)</em><em>(until end of turn)</em>.',
    '236G4Hal Jordan™|Rebuilding Coast City|If all of your active characters are Crossover characters, each Hal Jordan character die may block up to 2 additional character dice.',
    '243B4Huntress™|Brutal Justice|When fielded, you may reroll any of your Sidekick dice in the Field Zone or Reserve Pool.',
    '247I4Jay Garrick™|The Crimson Comet|Crosspulse - When you purchase a Jay Garrick die, all of your character dice in the Field Zone gain Fast <em>(until end of turn)</em>. <em>(You can only use a Crosspulse ability if you paid this character\'s purchase cost using only their energy types.)</em> <em>(Character dice with Fast deal combat damage before non-Fast characters.)</em>',
    '221A4Katana™|Crisis and Tragedy|While Katana is in your Used Pile, if you roll two [Q], you may field Katana at level 1.',
    '231V4Killer Frost™|Coldsnap|When Killer Frost is KO\'d by a non-[DCV] character die, add the non-[DCV] character die to its owner\'s bag.',
    '262V4King Shark™|Feeding Frenzy|King Shark can only be blocked by at least two character dice, or one character die with Crossover.',
    '264J4Martian Manhunter™|Watchtower|While Martian Manhunter is active, [DCV] character dice cannot block.',
    '243V4Merlyn™|League of His Own|While Merlyn is active, once per turn, during your Main Step, you may pay [2] to give a non-Crossover character die -2A and a Crossover character die +2A <em>(until end of turn)</em>.',
    '243C4Power Ring™|Curse of Volthoom|When fielded, if your opponent has no active [DCV] character dice, Power Ring deals them 1 damage.',
    '252V4Professor Zoom™|Inescapable Fate|While Professor Zoom is attacking, your non-Sidekick character dice are unblockable. Your opponents may pay [1] to ignore this effect until the end of the turn.',
    '251V4Ra\'s Al Ghul™|The Demon\'s Head|When Ra\'s Al Ghul attacks and isn\'t blocked, during your opponent\'s next Roll and Reroll Step, choose one die. That die may not be rerolled.',
    '25A04Rip Hunter™\'s Chalkboard|NEW KRYPTON?|Add all dice in your bag to your Used Pile. Put up to 3 [M] or [S] character dice added to your Used Pile in this way into your Prep Area.',
    '242A4Roy Harper™|Red Arrow|When fielded, you may pay X energy to spin up X target [DCA] characters one level <em>(including this one)</em>.',
    '23704S.T.A.R. Labs™|Guided Development|Continuous: Whenever you could use a Global Ability, you may send this die to the Used Pile to give target [B] or [S] character die Regenerate <em>(until end of turn)</em>. Gain X life if that character die uses Regenerate this turn, where X is its new level.|Global: Pay [B][S]. Move a Sidekick die from your Used Pile to your Prep Area and field another Sidekick die from your Used Pile.',
    '241A4Speedy™|Mia Dearden|Fast <em>(Character dice with Fast deal combat damage before non-Fast characters.)</em>',
    '233T4Static™|The Big Bang|While Static is active, whenever your opponent rolls 2 or more dice at once, spin each of your Static dice up 1 level.',
    '274J4Superman™|Truth and Justice|When you purchase this die, add it to your Prep Area.',
    '242T4The Atom™|Matter Compression|While The Atom is active, whenever you could use a Global Ability you may spin down one of your The Atom dice to level 1 to draw 2 dice, put one into your Used Pile and the other into your Prep Area.',
    '243V4Weather Wizard™|Weather Wand|When Weather Wizard is blocked by a non-Crossover character die, he gets +2A and +2D <em>(until end of turn)</em>.',
    '232T4Wonder Girl™|Ares\'s Champion|If you have an active [TT] character, Wonder Girl costs [1] to purchase. You may only purchase 1 Wonder Girl die this way each turn.',
    '248M4Zatanna™|Hex Appeal|Crosspulse - When you purchase this die, add up to two Sidekicks from your Used Pile to your Prep Area. <em>(You can only use a Crosspulse ability if you paid this character\'s purchase cost using only their energy types.)</em>',
    '334S4Amanda Waller™|Squad Leader|When Amanda Waller is active, when one of your [DCSS] character dice goes to the Used Pile, all of your character dice get +1A <em>(until end of turn)</em>.',
    '331B4Batgirl™|Eidetic Memory|While Batgirl is active, your opponent may not target your Batgirl character dice.',
    '341V4Black Adam™|Ruler of Khandaq|While Black Adam is active, when a character die is KO\'d, if it isn\'t a Sidekick die, return it to its card unless its owner takes 1 damage.',
    '342J4Black Canary™|Sonic Cry|Impulse - Target level 1 character die is unblockable <em>(until end of turn)</em>. <em>(Impulse abilities happen when you purchase the character die with Impulse.)</em>',
    '353V4Captain Cold™|Icy Revenge|While Captain Cold is active, when you use an action die, target opposing level 1 character die can\'t attack or block this turn.',
    '33504Captain Cold™\'s Cold Gun|Frozen "Firearm"|Continuous: Whenever you could use a Global Ability, you can send this die to the Used Pile to deal 3 damage to target character die.|*/** Also, ignore that character die\'s text until end of turn. <em>(That die\'s card keeps its Global Abilities, all other copies of that die keep their abilities.)</em>',
    '361V4Clayface™|The Terror|When fielded, Clayface gains all of the abilities of target Crossover character <em>(excluding Global Abilities)</em>.|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to the [M] face.',
    '35804Cosmic Treadmill™|Time Travel Tech|Reroll up to 2 dice in your Reserve Pool. For each [F] or [M] rolled this way, you may subtract [1] from the cost of each action die you purchase this turn.',
    '354T4Cyborg™|Technis Imperative|Cyborg character dice may block an extra character die. Cyborg takes no more than 2 damage from each non-Crossover character dice he blocks.|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to the [S] face.',
    '343S4Deadshot™|Floyd Lawton|While Deadshot is active, when one of your [DCSS] character dice is KO\'d, draw a die. If that die is a [DCSS] character die, add it to your Prep Area. Otherwise return it to your bag.',
    '359V4Deathstroke™|Lt. Colonel|Synergy - While Deathstroke is active, during your turn, whenever you could use a Global Ability, you may pay [F][S] to search your bag for an action die and roll it. <em>(The rolled die goes to your Reserve Pool.)</em> <em>(Synergy abilities can be used while the character is active, any time you could use a Global Ability.)</em>',
    '344A4Diggle™|Team Player|If Diggle is KO\'d while blocking, you may immediately purchase a Crossover die <em>(paying all costs)</em>.',
    '334J4Doctor Light™|Actual Doctor|While Doctor Light is active, opposing Sidekicks deal you no combat damage.',
    '334A4Felicity Smoak™|Manipulating Technology|While Felicity Smoak is active, you may reroll one extra time during your Roll and Reroll Step.',
    '353J4Firestorm™|Elemental Fury|When Firestorm attacks, deal 1 damage to your opponent for each different energy type <em>([B]/[F]/[M]/[S])</em> of character die in your Field Zone.',
    '352L4Giganta™|Larger Than Life|At the beginning of your Clear and Draw Step, you may spin Giganta up 1 level. If you do, that character die gains Overcrush <em>(until end of turn)</em>. <em>(Character dice with Overcrush deal damage in excess of blocker\'s D to opponent.)</em>|Global: Pay [1]. Spin target character die you control down 1 level.',
    '362L4Gorilla Grodd™|Brains and Brawn|Gorilla Grodd can only be blocked by Crossover character dice.|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to the [F] face.',
    '346G4Hal Jordan™|Punching a Hole in the Sky|While Hal Jordan is active, if all of your active characters are Crossover characters, draw an additional die at the beginning of your Clear and Draw Step.',
    '343B4Huntress™|Sins of the Father|While Huntress is active, the first time you roll dice during your Roll and Reroll Step, if you rolled no [Q], you may draw and roll a die.',
    '347I4Jay Garrick™|Guardian of Keystone City|While Jay Garrick is active, the first time you field a [B] or [S] character die each turn, you may take 1 damage and move a die from your Used Pile to your Prep Area <em>(2 dice if the character is [B] and [S])</em>.',
    '331V4Killer Frost™|On Thin Ice|Killer Frost cannot be blocked by non-[DCV] character dice with purchase cost of 5 or more.',
    '362V4King Shark™|"I\'m a Shark!"|King Shark gets +2A, +2D, and Overcrush while you have at least one active Crossover character. <em>(Character dice with Overcrush deal damage in excess of blocker\'s D to opponent.)</em>',
    '364J4Martian Manhunter™|In Disguise|Intimidate|Martian Manhunter can only use Intimidate on [DCV] character dice, when he does, deal X damage to target opponent where X is that [DCV] character die\'s level.',
    '353V4Merlyn™|League of Assassins|Merlyn can only be blocked by Crossover character dice.|Global: Pay [0]. Once per turn on your turn, spin one of your Sidekick character dice to the [B] face.',
    '343C4Power Ring™|Weak-willed|When fielded, if you have only [DCV] character dice in the Field Zone, Power Ring gets +2A and +2D <em>(until end of turn)</em>.',
    '362V4Professor Zoom™|Dead Ringer|While Professor Zoom is active, your opponents may not attack with non-Sidekick character dice. Your opponents may pay [1] to ignore this effect until the end of the turn.',
    '351V4Ra\'s Al Ghul™|League of Assassins|When fielded, KO target level 3 character die.',
    '32A04Rip Hunter™\'s Chalkboard|WHEN AM I?|Add all dice in your bag to your Used Pile. For each [M] or [S] character added to your Used Pile in this way, give target character die +1A and +1D <em>(if a die added to your Used Pile in this way is [M] and [S] give +2A and +2D instead)</em> <em>(until end of turn)</em>.|Global: Pay [S]. The first die you purchase this turn is added to your Prep Area instead of your Used Pile.',
    '342V4Roy Harper™|Arsenal|When fielded, KO target opposing [TT] character die unless its owner pays [1].',
    '32704S.T.A.R. Labs™|Science and Technology|All of your [B] character dice gain Fast. All of your [S] character dice get +2D <em>(until end of turn)</em>.|*/** Instead, all of your [B] and [S] character dice get +2D and gain Fast <em>(until end of turn)</em>. <em>(Character dice with Fast deal combat damage before non-Fast characters.)</em>|Global: Pay [B][S]. Move a Sidekick die from your Used Pile to your Prep Area and field another Sidekick die from your Used Pile.',
    '331A4Speedy™|Accomplished Archer|While Speedy is attacking, when your opponent deals blockers, Speedy deals each of those character dice 1 damage.',
    '343T4Static™|Taser Punch|While Static is active, whenever your opponent rolls 2 or more dice at once, KO target Sidekick unless your opponent takes 1 damage.',
    '364J4Superman™|Up, Up, and Away!|When you purchase this die, add it to your bag. While Superman is active, your action dice cost [2] less <em>(to a minimum of 1)</em>.',
    '342T4The Atom™|Littlest Big Man|While The Atom is active, whenever you could use a Global Ability you may spin him to level 1 and spin another target character die to level 3.',
    '353V4Weather Wizard™|The Storm is Here|Weather Wizard cannot be blocked if your opponent has no active Crossover characters.',
    '332T4Wonder Girl™|Daughter of Zeus|Teamwatch - You may pay [1] if the [TT] die you fielded is a [S] character die. If you do, gain life equal to its fielding cost.',
    '455J4Barry Allen™|CSI|Crosspulse - When you purchase this die, you may field it at level 1. <em>(You can only use a Crosspulse ability if you paid this character\'s purchase cost using only their energy types.)</em>',
    '46AA4Green Arrow™|Star City Savior|Crosspulse - When you purchase this die, deal 2 damage to all opposing character dice. <em>(You can only use a Crosspulse ability if you paid this character\'s purchase cost using only their energy types.)</em>',
    '431A4Katana™|Bushi|Impulse - When you purchase a Katana die, if you spent at least one [Q], you may immediately field her at level 1 for free. <em>(Impulse abilities happen when you purchase the character die with Impulse.)</em>',
    '438M4Zatanna™|~Inverted Incantations|Synergy - While Zatanna is active, you may pay [F][M] to reroll all opposing Sidekick dice in the Field Zone and Reserve Pool. Zatanna deals 1 damage to target opponent for each of their dice rolled in this way that shows a [F] or [M]. <em>(Synergy abilities can be used while the character is active, any time you could use a Global Ability.)</em>',
    '44BW1White Lantern Batman™|Light in the Darkness|You may not use [Q] energy to purchase this die, this text may not be ignored.|While Batman is active, once per turn, when you roll two [Q] during the Roll and Reroll Step, gain 1 life, draw and roll a die. <em>(If you draw and roll that die after your reroll, you may not reroll it.)</em>',
    '44BW1White Lantern Deadman™|Defender of Life Itself|You may not use [Q] energy to purchase this die, this text may not be ignored.|While Deadman is active, when an opponent uses a Global Ability, Deadman deals them 1 damage.',
    '44BW1White Lantern Sinestro™|Destiny Awaits|You may not use [Q] energy to purchase this die, this text may not be ignored.|While Sinestro is active, when your opponent rolls energy faces with multiple energy, they must immediately spin those dice down to single energy faces if possible.',
    '44BW1White Lantern Wonder Woman™|Life Endures|You may not use [Q] energy to purchase this die, this text may not be ignored.|Impulse - When you purchase Wonder Woman, you may KO target [DCV] character die.',
    ];
    var cw_aff = { 0:'0', T:'CWT', t:'CWTV', V:'4', F:'ASF', A:'2', G:'G', W:'CWW', S:'F' };
    var cw = [
    '024T4Black Widow|Triple Agent|When fielded, deal 1 damage to target opposing character die.',
    '024T4Black Widow|Graduate of the Red Room|When fielded, target opponent must spin down an opposing character die <em>(they choose)</em>.',
    '034T4Black Widow|Widowmaker|When fielded, KO target opposing character die with a fielding cost of 0.',
    '044A4Captain America|Anti-Reg|Resistance - While active, at the end of your turn, if a character die you control was KO\'d this turn, gain 1 life.|While active, at the end of your turn, spin each of your Captain America dice up one level.',
    '044A4Captain America|Freedom Fighter|Resistance - While active, at the end of your turn, if a character die you control was KO\'d this turn, deal 1 damage to target opponent.|While active, at the end of your turn, spin each of your Captain America dice up one level.',
    '022A4Falcon|Talks to Birds|',
    '032A4Falcon|Wingman|When fielded, target Sidekick is unblockable this turn.',
    '042A4Falcon|Dive Bomber|Intimidate <em>(When fielded, remove target opposing character die from the Field Zone until end of turn - place it next to your character cards.)</em>',
    '043A4Iron Man|Pro-Reg|* When fielded, target character die you control gets +2D until end of turn.',
    '053A4Iron Man|Director of S.H.I.E.L.D.|Enlistment - KO target character die blocked by Iron Man unless target opponent KOs another character die they control.|Character dice blocked by Iron Man get -2A.',
    '023G4Rocket Raccoon|Big Flarkin\' Gun|',
    '033G4Rocket Raccoon|Furball|Fast <em>(This character deals damage before non-Fast characters in combat.)</em>|Global: Pay [B]. Deal 1 damage to target blocking character die.',
    '043G4Rocket Raccoon|Bandit|Fast <em>(This character deals damage before non-Fast characters in combat.)</em>|While Rocket Raccoon is attacking, your opponent must block each Rocket Raccoon die <em>(if able)</em>.',
    '041W4Scarlet Spider|Former Villain|Intimidate <em>(When fielded, remove target opposing character die from the Field Zone until end of turn - place it next to your character cards.)</em>',
    '041W4Scarlet Spider|Redemption|While Scarlet Spider is active, when an opposing character die is fielded, spin up each of your Scarlet Spider dice one level. If you spin up at least one Scarlet Spider die, Scarlet Spider deals 1 damage to target opponent.',
    '051W4Scarlet Spider|Kaine|While Scarlet Spider is active, when an opposing character die is fielded, spin up each of your Scarlet Spider dice one level. If you spin up at least one Scarlet Spider die, draw a die and put it into your Prep Area.',
    '052A4She-Hulk|Courtroom Warrior|When declaring blockers, She-Hulk can block up to 2 character dice.',
    '052A4She-Hulk|Sensational|Overcrush|When a She-Hulk die deals combat damage to both an opposing character die and an opponent in the same turn, gain 2 life.',
    '062A4She-Hulk|Buy My Comics!|Intimidate <em>(When fielded, remove target opposing character die from the Field Zone until end of turn - place it next to your character cards.)</em>|She-Hulk cannot be blocked by fewer than two character dice.',
    '021A4Wasp|Janet Van Dyne|',
    '031A4Wasp|Pixie|Fast <em>(This character deals damage before non-Fast characters in combat.)</em>',
    '031A4Wasp|Fashionista|When Wasp is blocked, deal 1 damage to target opposing character die not blocking Wasp.|Global: Pay [M]. Target character die must block this turn.',
    '04003Brother Fights Brother|Basic Action Card|Each player KO\'s a character die they control.|Global: Pay [S] when a character die you control is KO\'d. Gain 1 life.',
    '02003Civil War|Basic Action Card|Deal 2 damage to target opposing character die. The controller of that character die may deal 2 damage to target character die you control.',
    '03003Driven Underground|Basic Action Card|KO target blocking character die.|** Also deal 1 damage to target opponent.|Global: Pay [B]. Deal 1 damage to target character die that has already been damaged this turn.',
    '03003Escape Incarceration|Basic Action Card|Move a die from your Used Pile into your Prep Area.|Resistance - If a character die you control was KO\'d this turn, move another die from your Used Pile to your Prep Area.',
    '04003Field Promotion|Basic Action Card|Spin all of your character dice up 1 level.|*/** Instead spin all of your character dice to level 3.',
    '04003Internal Dispute|Basic Action Card|Target opposing character die deals damage equal to its A to a different target opposing character die. <em>(You can only use this action when an opponent has at least 2 legal target character dice.)</em>',
    '05003Long Live the Resistance!|Basic Action Card|Gain 4 life.|Resistance - If a character die you control was KO\'d this turn, gain 5 life instead.|Global: Pay [M]. Prevent all damage to you from one opposing die\'s "When attacks" ability.',
    '02003Suffering and Satisfaction|Basic Action Card|Choose an affiliation. Target character die with that affiliation gets +2A, and a different target character die with that affiliation gets -2A. You may only use this action if two dice in the Field Zone have the same affiliation.',
    '04003Superhero Registration Act|Basic Action Card|Draw and roll 2 dice.|Enlistment - Instead, draw and roll 3 dice unless your opponent KOs an opposing character die.',
    '05003The Front Line|Basic Action Card|Unblocked attacking character dice gain +3A until end of turn.|Global: Pay [F]. Target opposing character die can\'t block this turn unless your opponent pays 1 life.',
    '122A4Ant-Man|Scott Lang|',
    '131t4Baron Zemo|The Masked Baron|When fielded, if you control an active character die with Resistance, move a die from your Used Pile to your Prep Area.',
    '134T4Black Widow|Mistress of Pain|Black Widow can block any number of character dice with a printed fielding cost of 0.',
    '133t4Bullseye|I Never Miss|When Bullseye attacks, deal 1 damage to each opposing [F] character die.',
    '154A4Captain America|Man on the Run|Resistance - While active, at the end of your turn, if a character die you control was KO\'d this turn, you may KO target level 1 character die.|While active, at the end of your turn, if none of your dice were KO\'d this turn, you may KO target Sidekick die.',
    '173A4Captain Marvel|Captain Carol Danvers|Captain Marvel may only be blocked by [B] character dice and character dice with Resistance.',
    '164S4Deathlok|Death Machine|Overcrush|When a Deathlok character die would be KO\'d, you may instead pay 2 life to spin that die up one level. Clear damage from that Deathlok die.',
    '132A4Falcon|Aviary|Enlistment - While Falcon is active, when your opponent fields a Sidekick, gain 1 life unless your opponent KOs an opposing character die.',
    '152A4Goliath|Bill Foster|Global: Pay [F]. Target character die gets +1A and +1D until end of turn.',
    '152A4Hercules|The Incredible Herc|When Hercules attacks, other attacking character dice get +1A.',
    '142A4Iron Fist|Living Weapon|While Iron Fist is active, when your opponent declares attackers, KO target opposing Sidekick.',
    '153A4Iron Man|Secretary of Defense|Enlistment - When fielded, target opponent may not declare blockers this turn unless they immediately KO a character die they control.|* When fielded, gain 1 life.',
    '13204Jessica Jones|Alias|',
    '124W4Justice|New Warrior|When Justice attacks, if you control 2 or more Sidekick character dice, he gets +2A.',
    '151A4Loki|Black Sheep|When Loki attacks, you may pay [M] to switch Loki\'s A and D until end of turn.',
    '152A4Luke Cage|Bulletproof|While Luke Cage is active, the first time each turn a player takes damage, that player must KO a Sidekick they control.|Global: Pay [F]. Deal 1 damage to each player.',
    '124S4Maria Hill|Deputy Director|When declaring blockers, Maria Hill may block any number of Sidekicks.',
    '121F4Mary Jane|Supermodel|While Mary Jane is active, when you field a character die with Resistance, your Mary Jane character dice get +1D until end of turn.',
    '14104Moon Knight|Split Personality|When fielded, deal 2 damage to each opposing Iron Man character die. While Moon Knight is active, your Captain America character dice get +2A.',
    '143t4Moonstone|Ms. Marvel|While Moonstone is active, you may spin down one of your Moonstone character dice to prevent all damage to you from an opposing "when fielded" or "when attacks" ability.',
    '15404Ms. Marvel|Kamala Khan|',
    '134W4Namorita|Taunting Villains|When Namorita blocks, target non-[S] attacking character die gets -2A until end of turn.',
    '133V4Nitro|Explosive Personality|When Nitro is KO\'d, KO target opposing character die with D less than or equal to Nitro\'s D.',
    '142T4Punisher|Unlikely Ally|Intimidate <em>(When fielded, remove target opposing character die from the Field Zone until end of turn - place it next to your character cards.)</em>',
    '12104Pym Particles|Grow|Target [F] character die you control gets +1A and Overcrush until end of turn.',
    '133t4Radioactive Man|Gamma Rays|When Radioactive Man is KO\'d by combat damage, deal 1 damage to all other character dice.',
    '13404Rescue|Stark\'s Equal|At the end of your Roll and Reroll Step, gain 1 life for each Rescue die you rolled that shows an energy face. <em>(Rescue doesn\'t need to be active for this ability.)</em>',
    '123G4Rocket Raccoon|Not a Raccoon|When Rocket Raccoon attacks, deal 1 damage to each player.',
    '131A4Ronin|Continuing the Name|While blocking, if Ronin would be KO\'d, prevent 2 damage to you from an attacking character die.',
    '151W4Scarlet Spider|Michael Van Patrick|While Scarlet Spider is active, once per turn, when an opposing character die is fielded, you may spin a Scarlet Spider die you control to the level of the fielded character die and deal damage equal to that die\'s level to that die.',
    '162A4She-Hulk|Ain\'t Easy Being Green|Intimidate <em>(When fielded, remove target opposing character die from the Field Zone until end of turn - place it next to your character cards.)</em>|While She-Hulk is active, opposing non-She-Hulk characters lose and cannot gain Intimidate.',
    '124t4Songbird|Sonic Constructs|When Songbird blocks, you may pay [S] to remove Songbird from the Attack Zone.',
    '143W4Speedball|Robbie Baldwin|When Speedball is dealt combat damage, deal damage to each other character die equal to the amount of damage done to Speedball.',
    '143F4Spider-Man|Unmasked|While Spider-Man is active, prevent all damage to you from opposing "when fielded" abilities.',
    '161S4Taskmaster|Photographic Reflexes|While Taskmaster is active, he gains the keyword abilities of each other character in the Field Zone <em>(Keywords are written in bold)</em>.',
    '163A4Thor|Boom!|Intimidate <em>(When fielded, remove target opposing character die from the Field Zone until end of turn - place it next to your character cards.)</em>',
    '141t4Venom|Spidery|While Venom is active, opposing Sidekick character dice cost 1 more energy to field.',
    '12404Vibranium Shield|Symbol of Freedom|Continuous: Any time you could use a Global Ability, you can send this die to the Used Pile, if you do, target blocking character die you control gains +3D.',
    '141A4Wasp|America\'s Newest Superhero|Fast <em>(This character deals damage before non-Fast characters in combat.)</em>|While Wasp is attacking, when a character die blocks, Wasp deals 1 damage to it.',
    '152S4Winter Soldier|Picking up the Mantle|While Winter Soldier is active, when your opponent uses an action die, Winter Soldier gets +1A and +1D until end of turn.',
    '232A4Ant-Man|Voyeur|Fast <em>(This character deals damage before non-Fast characters in combat.)</em>',
    '231t4Baron Zemo|Master of Evil|Resistance - While Baron Zemo is active, if a character die you control was KO\'d this turn, you may pay [M] to give Baron Zemo +1A and +1D until end of turn.',
    '243t4Bullseye|Peanut Projectile|When fielded, deal 2 damage to target opposing character die, and your opponent may deal 2 damage to a non-Bullseye character die you control.',
    '263A4Captain Marvel|Ace Pilot|Enlistment - While Captain Marvel is active, when you attack with at least one character die, all your attacking character dice gain +1A until end of turn unless your opponent KOs a character die they control.',
    '274S4Deathlok|Indestructible|When a Deathlok die would be KO\'d, you may instead KO target Sidekick die <em>(yours or your opponent\'s)</em>. Clear all damage from that Deathlok die.',
    '262A4Goliath|Giant Genius|While Goliath is active, when a player uses a Global Ability, Goliath gains Overcrush until end of turn.|Global: Pay [F]. Target character die gets +1A and +1D until end of turn.',
    '252A4Hercules|Son of Zeus|When Hercules attacks, he cannot be blocked by Sidekicks.',
    '242A4Iron Fist|Fist of K\'un-Lun|When your opponent declares attackers, you may pay 3 life to move an Iron Fist die from your Used Pile to the Field Zone at level 2. <em>(Iron Fist doesn\'t need to be active for you to use this ability.)</em>',
    '24204Jessica Jones|AKA Jewel|When Jessica Jones is blocked, you may remove Jessica Jones from the Attack Zone.',
    '234W4Justice|Marvel Boy|When Justice is blocked by multiple blocking character dice, he deals his full A to each character die blocking him when dealing combat damage.',
    '251A4Loki|Green with Envy|While Loki is active, at the start of your Main Step, you may pay [2M] to capture all opposing Sidekicks in the Field Zone until end of turn.',
    '252A4Luke Cage|Knuckle Up!|While Luke Cage is active, the first time each turn you would take damage, prevent that damage unless your opponent pays 2 life.|Global: Pay [F]. Deal 1 damage to each player.',
    '224S4Maria Hill|On the Hunt|Maria Hill can\'t attack. When fielded, target Sidekick die you control gets +2D until end of turn.',
    '221F4Mary Jane|Watson-Parker|While Mary Jane is active, when you field a character die with Enlistment, Mary Jane deals target opponent 1 damage each time they KO one of their character dice this turn.',
    '24104Moon Knight|Avatar of Khonshu|While Moon Knight is active, your Captain America costs 1 less to purchase and opposing [AV] cost 1 more to purchase and field.',
    '253t4Moonstone|Dark Avenger|When fielded, deal 1 damage to target opponent.',
    '26404Ms. Marvel|Inhuman|While Ms. Marvel is active, at the end of your turn, you may spin up target character die you control one level and spin down target opposing character die one level. <em>(You must do both or neither.)</em>',
    '234W4Namorita|Aquatic Beauty|When Namorita KOs a non-[S] character die with combat damage, place the KO\'d die in the Used Pile.',
    '243V4Nitro|Stamford Incident|When Nitro attacks, each Nitro character die can\'t be blocked by character dice with D less than or equal to Nitro\'s D.',
    '252T4Punisher|War Journal|When fielded, all other non-Sidekick character dice you field for the rest of the turn gain Intimidate. <em>(When you field a character die with Intimidate, you may remove target character die from the Field Zone until end of turn.)</em>',
    '23104Pym Particles|Shrink|Target character die you control gets +1A and Fast until end of turn. <em>(Fast characters deal combat damage first when attacking.)</em>|*/** Also, Ant-Man and Wasp character dice you control cannot be targeted by your opponent\'s actions and abilities until end of turn.',
    '233t4Radioactive Man|Splitting Atoms|When Radioactive Man is KO\'d by combat damage, each player draws a die. Each player fields any Sidekick dice drawn this way on their character faces. Return any other dice drawn this way to the bag.',
    '24404Rescue|To the Rescue|At the end of your Roll and Reroll Step, for each Rescue die you rolled that shows an energy face, target character die you control gets +1A and +1D until end of turn and reroll those Rescue dice <em>(all at once, and only once)</em>. <em>(Rescue doesn\'t need to be active for this ability.)</em>',
    '231A4Ronin|Lone Warrior|While Ronin is active, once per turn, you may KO a Ronin die you control to prevent all damage from one source to your or a character die you control.',
    '234t4Songbird|Screaming Mimi|When Songbird blocks, she takes no damage if another Songbird die is also blocking.',
    '243W4Speedball|Paying Penance|When Speedball takes combat damage, draw and roll a die. If it shows an energy face, place it in your Prep Area. Otherwise, return it to the bag.',
    '253F4Spider-Man|Poster Child|While Spider-Man is active, when your opponent uses a "when fielded" ability, Spider-Man deals them 1 damage.|* Also, you gain 1 life.',
    '251S4Taskmaster|Mimic Anyone|When Taskmaster blocks or is blocked, change Taskmaster\'s A and D to match that of any target character die in the Field Zone until end of turn. <em>(Each Taskmaster die may target a different die.)</em>',
    '263A4Thor|There Must Always Be a Thor|When fielded, characters with Resistance and/or Enlistment can\'t block until end of turn.',
    '251t4Venom|Symbiotic Organism|While Venom is active, opposing Sidekick character dice cost 1 more energy to field.|While Venom is active, when you field a Sidekick, deal 1 damage to target opponent.',
    '23404Vibranium Shield|Deflecting Bullets|Continuous: Resistance - When a character die you control is KO\'d, character dice you control get +2D until end of turn.',
    '252S4Winter Soldier|Secret Keeper|Resistance - While Winter Soldier is active, when a character die you control is KO\'d, Winter Soldier may not be targeted by opposing action dice until end of turn.',
    '332A4Ant-Man|Master Thief|When Ant-Man attacks, he may only be blocked by level 1 character dice.',
    '331t4Baron Zemo|Evil Leadership|Resistance - When a character die you control is KO\'d, Baron Zemo may not be blocked until end of turn.',
    '343t4Bullseye|I\'m Magic|Enlistment - When fielded, KO up to 2 target opposing [F] character dice unless your opponent KOs another character die they control.',
    '373A4Captain Marvel|Kree-Powered|While Captain Marvel is active, you may have a second Attack Step immediately following the first. <em>(You must attack with at least one character die in each Attack Step, and Captain Marvel must remain active at the end of your first Attack Step.)</em>',
    '374S4Deathlok|Time Traveler|When a Deathlok die would be KO\'d, you may instead spin him down a level, gain 2 life, and clear all damage from Deathlok. <em>(If you can\'t spin down Deathlok, you may not use this ability.)</em>',
    '382A4Goliath|Inspired|When your opponent uses a Global Ability, place an Inspiration token on this card. Your Goliath dice cost 1 less energy for each token on this card. When you purchase a Goliath die, remove all Inspiration tokens from this card.|Global: Pay [F]. Target character die gets +1A and +1D until end of turn.',
    '352A4Hercules|Lion of Olympus|When Hercules is KO\'d while attacking, deal 2 damage to each player.',
    '352A4Iron Fist|Pure of Spirit|While Iron Fist is active, when your opponent declares attackers, each Iron Fist die deals damage equal to its A to target opposing character die of your opponent\'s choice.',
    '35204Jessica Jones|Mother and More|Fast <em>(This character deals damage before non-Fast characters in combat.)</em>|When blocked, you may remove Jessica Jones from the Attack Zone <em>(before dealing Fast damage.)</em>',
    '334W4Justice|Telekinetic|When Justice is blocked, only one blocking character die may assign damage to each attacking Justice die <em>(the defending player chooses)</em>.',
    '351A4Loki|Ice in his Veins|While Loki is active, each Loki die may block up to two character dice.',
    '362A4Luke Cage|Bodyguard|While Luke Cage is active, the first time you would take damage each turn, spin a Luke Cage die up one level then redirect the damage to that die.|Global: Pay [F]. Deal 1 damage to each player.',
    '334S4Maria Hill|Tough Decisions|Maria Hill can\'t attack.|Enlistment - When fielded, she may attack this turn with +1A unless your opponent KOs a character die they control.',
    '331F4Mary Jane|Hostage in my Own House|While Mary Jane is active, your character dice with Resistance or Enlistment abilities cost 1 less to field.',
    '35104Moon Knight|Crescent Darts|When fielded, you may pay [2] to field a Captain America die from your Used Pile or Prep Area.',
    '353t4Moonstone|Hypnotic Suggestion|When Moonstone attacks, deal 1 damage to target opponent.',
    '36404Ms. Marvel|Biggest Fan|When Ms. Marvel attacks, spin all opposing character dice down 1 level.',
    '334W4Namorita|New Warriors Founder|When Namorita blocks a non-[S] character die, she captures that die until end of turn unless your opponent spins that character die down 1 level.',
    '343V4Nitro|Living Bomb|When fielded, capture target character die with D less than or equal to Nitro\'s D until end of turn.',
    '352T4Punisher|No Restraint|Intimidate <em>(When fielded, remove target opposing character die from the Field Zone until end of turn - place it next to your character cards.)</em>|While Punisher is active, when an opposing character die is fielded, spin a Punisher die up 1 level <em>(if able)</em>. If you do, spin that opposing character die down 1 level.',
    '33104Pym Particles|Scientific Breakthrough|All of your [F] and [M] character dice get +1A and +1D until end of turn.',
    '333t4Radioactive Man|Geiger Count Rising|Enlistment - When Radioactive Man is KO\'d by combat damage, draw and roll a die unless target opponent KOs an opposing character die.',
    '34404Rescue|Pepper|At the end of your Roll and Reroll Step, draw one die for each Rescue die you rolled that shows an energy face. Field any [S] character dice at level 1. Return any other dice to your bag. <em>(Rescue doesn\'t need to be active for this ability to trigger.)</em>',
    '334t4Songbird|Reformed Villain|When Songbird attacks, if she is attacking with only one other die and it is a non-Songbird [CWTB] die, Songbird cannot be blocked.',
    '353W4Speedball|New Warrior|Fast <em>(This character deals damage before non-Fast characters in combat)</em>.|Speedball takes 2 less damage from non-combat damage.',
    '353F4Spider-Man|Photo Op|While Spider-Man is active, opposing "when fielded" abilities cannot be used unless your opponent pays 1 life.|* Instead, they cannot be used unless your opponent pays 2 life.',
    '361S4Taskmaster|Monkey See|When fielded, you may pay [M] to capture target opposing character die until end of turn. Taskmaster becomes a copy of that die until end of turn <em>(this includes purchase cost, affiliations, name, subtitle, die stats, and text)</em>.',
    '373A4Thor|Strengthened by Mjolnir|When fielded, Thor dice you fielded this turn cannot be KO\'d until end of turn.',
    '34404Vibranium Shield|Rebounding|Continuous: You may send this die to the Used Pile when a blocking character die would be KO\'d to spin that die up to its maximum level instead.',
    '352S4Winter Soldier|Brainwashed|Resistance - When Winter Soldier attacks, deal 3 damage to each player unless target opponent KO\'s an opposing character die.',
    '454A4Captain America|The Price of Freedom|Resistance - When fielded, target Sidekick gets +2A and +2D until the end of turn if a character die you control was KO\'d this turn.|When fielded, if none of your dice were KO\'d this turn, target Sidekick gets +2A until end of turn.',
    '453A4Iron Man|Extremis|Enlistment - While Iron Man is active, opposing Sidekicks cost 1 more energy to field unless your opponent KOs an opposing character die to ignore this effect for the turn.',
    '431A4Ronin|Between Employers|While Ronin is active, once per turn, you may redirect all damage from one source to a Ronin character die.',
    '451t4Venom|Abandoned the Stinger|While Venom is active, you may pay [M] to give your Sidekicks +1A or +1D until end of turn.',
    '473A1Natalia Romanova|Black Widow and Thor of Earth 23223|When Natalia Romanova attacks, deal 4 damage to the defending player.',
    '46201Shannon Carter|Captain America of Earth 81223|While Shannon Carter is active, your Sidekick dice get +2A and +2D.',
    '464A1Steve Rogers|Iron Man of Earth 10208|While active, whenever you would take damage, you may redirect up to 2 of that damage from each source to Steve Rogers.',
    '47101Tony Stark|Sorcerer Supreme of Earth 9810|When Tony Stark is KO\'d, he deals damage equal to his A divided amongst any number of target opposing character dice.',
    '53201Squirrel Girl|Kick Butts, Eat Nuts|While Squirrel Girl is active, at the end of your turn, add a squirrel counter to this card. During your turn, when you may use a Global Ability, you may remove a squirrel counter and place a squirrel token with 1A and 1D into the Field Zone. You may have up to 4 Squirrel tokens in the Field Zone at once.',
    ];

    var tmnt_aff = { 0:'0', T:'T', V:'6' };
    var tmnt = [
    '02403April|Channel 6 Reporter|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|When fielded, give another target Sidekick or [TURTLE] character die +1A until end of turn.',
    '02403April|Part of the Family|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|When fielded, give another target Sidekick or [TURTLE] character die +1D until end of turn.',
    '03403April|Ninja in Training|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|When fielded, draw a die. If it is a Sidekick or [TURTLE] character die, roll it and add it to your Reserve Pool.',
    '043V3Baxter Stockman|Evil Scientist|When fielded, move all Mousers dice from your Used Pile to your Prep Area.',
    '053V3Baxter Stockman|Mutagenic Researcher|While Baxter Stockman is active, all Mousers dice get +2A and a free to field.',
    '053V3Baxter Stockman|Fly Guy|When fielded, you may immediately purchase a Mousers die for [1] and immediately roll it <em>(place it in your Reserve Pool)</em>.',
    '041V3Bebop|Troublesome|While Rocksteady is active Bebop gets +2A and +2D.',
    '051V3Bebop|Mutant Warthog|When fielded, if Rocksteady is active, deal 1 damage to target player.',
    '061V3Bebop|Pighead|While Rocksteady is active, you may reroll you Bebop dice any time it shows an energy face during your Roll and Reroll Step.',
    '02203Casey Jones|Pain 101|If your life total is less than 15 and Casey Jones blocks or is blocked by a Sidekick or [DCV], gain 1 life.',
    '02203Casey Jones|Mutant Hunter|When Casey Jones attacks, you may choose any number of target Sidekicks or [DCV] dice to block Casey Jones character dice in any arrangement you choose.',
    '03203Casey Jones|Lunatic Vigilante|Casey Jones can\'t be blocked by Sidekicks or [DCV] character dice.',
    '041T3Donatello|Does Machines|',
    '051T3Donatello|Donnie|Turtle Power - While Donatello is active, other [TURTLE] character dice cost 1 less to purchase.',
    '051T3Donatello|The Mad Scientist|While Donatello is active, when you field a different [TURTLE] character die, spin that die up one level. If that die is already level 3, instead draw and roll a die <em>(place it in your Reserve Pool)</em>.',
    '023V3Foot Ninja|Shredder\'s Army|Swarm',
    '033V3Foot Ninja|Ninja Syndicate|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|Foot Ninja gets +1A and +1D for each other Sidekick die in the Field Zone.',
    '033V3Foot Ninja|Robotic Ninja Warriors|Ally <em>(This die counts as a Sidekick in the Field Zone.)</em>|While Foot Ninja is active, your other Sidekick dice get +1A when blocking. <em>(Food Ninja doesn\'t give itself +1A.)</em>',
    '032V3Fugitoid|Professor Honeycutt|',
    '042V3Fugitoid|Neutrino Scientist|While Fugitoid is active, other [DCV] and [TURTLE] character dice can\'t attack unless their owner pays [1] to ignore this effect until end of turn.',
    '042V3Fugitoid|High Tech Body|While Fugitoid is active, other [DCV] and [TURTLE] character dice get -1A.',
    '064V3Krang|Ruler of Dimension X|While Krang is active, if one of your other [DCV] character dice attacks and is unblocked, reroll them after damage is dealt. If they land on a character face, place them in your Prep Area instead of your Used Pile.',
    '064V3Krang|Technodrome Commander|Regenerate',
    '074V3Krang|Utrom Warlord|When fielded, move all Sidekick dice from your opponent\'s Used Pile and Prep Area to their bag.',
    '044T3Leonardo|Leads|',
    '054T3Leonardo|Leo|Turtle Power - While Leonardo is active, when a different [TURTLE] die of yours would be KO\'d, instead KO a Leonardo die and gain 2 life.',
    '064T3Leonardo|Big Brother|While Leonardo is active, other [TURTLE] dice cost 1 less to purchase.',
    '042T3Michelangelo|Party Dude|',
    '052T3Michelangelo|Mikey|Turtle Power - While Michelangelo is active, other [TURTLE] character dice cost 1 less to purchase.',
    '062T3Michelangelo|Par-taaaay!|Whenever a different [TURTLE] character die is blocked, spin each Michelangelo character die up one level. For each Michelangelo character die already at level 3, instead KO target blocking character die.',
    '034V3Mousers|Metal Teeth|When fielded, KO another target character die with a "When fielded" ability unless its owner pays 2 life.',
    '024V3Mousers|Spare Parts|Mousers gets +1A and +1D while another player has an active character with a "When fielded" ability.',
    '034V3Mousers|Rat Eradicator|When Mousers blocks or is blocked by a character die with a "When fielded" ability, roll that die. On an energy face, move it to the Prep Area, otherwise leave it on the rolled face.',
    '043T3Raphael|Cool But Rude|',
    '043T3Raphael|Anger Issues|Whenever a different [TURTLE] character die attacks, deal 1 damage to target character die.',
    '053T3Raphael|Raph|Turtle Power - While Raphael is active, other [TURTLE] character dice cost 1 less to purchase.',
    '042V3Rocksteady|Rough and Tumble|While Bebop is active, Rocksteady gets +2A and +2D.',
    '042V3Rocksteady|Armed and Dangerous|While Bebop is active, Rocksteady gains Overcrush and takes no damage from blocking character dice <em>(this includes Sidekicks)</em>.',
    '052V3Rocksteady|Mutant Rhino|When fielded, if Bebop is active, KO target opposing level 1 character.',
    '061V3Shredder|Oroku Saki|While Shredder is active each player loses 1 life at the start of their turn.',
    '071V3Shredder|Old Rival|When Shredder deals combat damage a [TURTLE] character die, your opponent loses 3 life.',
    '081V3Shredder|Foot... Join Me!|When fielded, move all [DCV] dice from your Used Pile to your Prep Area.',
    '05203Splinter@A|Hamato Yoshi|When fielded, your [B] and [F] character dice get +1A until end of turn.',
    '06203Splinter@A|Father|When fielded, draw a die. If it is a [B] or a [F] die you may deal 2 damage to target opposing character die. Return it to your bag.',
    '07203Splinter@A|Radical Rat|When fielded, target opposing character die can\'t block your [B] or [F] character dice.',
    '05403Splinter@B|Ninja Master|When fielded, your [TURTLE] character dice get +2A and +2D until end of turn.',
    '06403Splinter@B|Sensei|When fielded, draw a die. If it is a [M] or a [S] die, roll it and place it in your Reserve Pool. Otherwise put it in your Used Pile.',
    '07403Splinter@B|Master Splinter|When fielded, target opposing character die can\'t block your [M] or [S] character dice and your [TURTLE] character dice gain Overcrush this turn.',
    '04003Cowabunga!|Basic Action Card|If you have exactly one character die in the Field Zone, it gets +4A and Overcrush until end of turn. If you have more than one character die in the Field Zone, instead all you character dice get +1A.',
    '04003Enraged|Basic Action Card|Up to two of your target character dice get +1A and Overcrush until end of turn.',
    '03003Give Me a Break!|Basic Action Card|Target non-[TURTLE] character die can\'t block until end of turn.|Global: Pay [B]. Until end of turn, when a character die is assigned to block, deal it 1 damage.',
    '02003Heroes in a Half-Shell|Basic Action Card|Target character die gets +2A until end of turn. If it is a [TURTLE] character, it also gets +2D.',
    '05003Lethal Blow|Basic Action Card|Move target level 1 character die from the Field Zone to the Prep Area.|* Instead, target any character die in the Field Zone.|** Instead, move any target character die to the bag.',
    '01003Pizza!|Basic Action Card|Gain 1 life. You may not use this Basic Action Die if you have 15 or more life.|Global: Pay [S]. Once during your turn, if you have less than 10 life, gain 1 life.',
    '03003Reckless Abandon|Basic Action Card|Deal 1 damage to each character die <em>(including your own)</em>.|* Instead, deal 1 damage to each player.|** Instead, deal 1 damage to each player and each character die.',
    '04003Special Delivery|Basic Action Card|Draw two dice from your bag and roll them <em>(place them in your Reserve Pool)</em>.',
    '03003Tactical Cover|Basic Action Card|Your character dice get +2D.|*/** Also, target character gets +3D.|Global: Pay [S]. Target character die gets +1D (until end of turn).',
    '02003Turtle Van|Basic Action Card|Continuous: You may send this die to the Used Pile to prevent all damage to target blocking character.',
    ];
    var wkop_2016_dd = [
    '54304b0Strahd|Master of Ravenloft|Experience|Energy Drain|* While Strahd is active, once per turn, when opposing Adventurer takes damage Strahd immediately gains an Experience token.|Strahd doesn\'t count as an Adventurer, this text cannot be ignored.'
    ];
    var wkop_2016_m = [
    '553F4Melinda May|Agent of S.H.I.E.L.D.|While you have another active [MSHIELD] character die, Melinda May has Iron Will.|Teamwatch - Deal 1 damage to target character die or opponent.'
    ];
    var wkop_2016_dc = [
    '552B4Terry McGinnis|Batman Beyond|When you purchase a non-Basic Action die with printed cost less than the number of your active [DCB] characters, add it to your Prep Area.'
    ];
    var dc_wf_aff = {
    0:'0',B:'WFB',S:'WFS',V:'6',C:'C',K:'WKV'
    };
    var dc_wf = [
    '051B4Batman™|Natural Leader|Batman™ costs 1 less to purchase for eaech of your different active [DCB] characters.|Global: Pay [F]. KO target level 1 [DCV] or [DCS] character die unless an opponent pays 2 life.',
    '051B4Batman™|Terror of Crime Alley|Vengeance - When you take damage, spin each of your Batman™ dice up 1 level and deal 1 damage to target opposing Sidekick.|Global: Pay [F]. KO target level 1 [DCV] or [DCS] character die unless an opponent pays 2 life.',
    '061B4Batman™|Crimefighter|Vengeance - When you take damage, deal 4 damage to target [DCV] or [DCS] character die.|Global: Pay [F]. KO target level 1 [DCV] or [DCS] character die unless an opponent pays 2 life.',
    '022B4Catwoman|Antihero|',
    '032B4Catwoman|Former Burglar|Catwoman can\'t be blocked by Sidekicks.',
    '032B4Catwoman|Stealthy|Catwoman can\'t be blocked by an opponent with only one active character die.',
    '032B4Harvey Bullock|Donut Enthusiast|',
    '042B4Harvey Bullock|Mafia Ties|While Harvey Bullock is active, before your Roll and Reroll Step, pick a number. If you roll exactly that many energy before your reroll, Harvey Bullock deals 2 damage to target opponent. <i>(Count energy, not energy faces.)</i>',
    '042B4Harvey Bullock|Major Crimes Unit|While Harvey Bullock is active, before your Roll and Reroll Step, pick a number. If you roll exactly that many energy before your reroll, draw and roll a die <i>(you may reroll that die on your reroll)</i>. <i>(Count energy, not energy faces.)</i>',
    '033S4Krypto|Super Dog|',
    '043S4Krypto|Super Loyal|Fast <i>(Character dice with Fast deal combat damage before character dice without Fast.)</i>',
    '043S4Krypto|Test Pilot|Krypto gets +1A and +1D for each different active [DCS] in the Field Zone <i>(yours and your opponent\'s)</i>.',
    '031B4Oracle|Clock Tower Surveillance|While Oracle is active, your opponents pay [1] more to purchase each die with a purchase cost of 2 or less.',
    '041B4Oracle|Master Investigator|While Oracle is active, your opponents pay [1] more to use each Global Ability.',
    '041B4Oracle|Hacker|While Oracle is active, your opponents pay [1] more to field each character die other than Sidekicks.',
    '053S4Power Girl|High Flying|While you have an active [DCS] character besides Power Girl, and Power Girl is active, Power Girl can\'t be blocked by only one character die.',
    '063S4Power Girl|Electromagnetic Spectrum Vision|While you have an active [DCS] character besides Power Girl, and Power Girl is active, draw an extra die during your Clear and Draw Step.',
    '063S4Power Girl|Solar Energy Absorption|While you have an active [DCS] character besides Power Girl, and Power Girl is active, gain 2 life at the start of your turn.',
    '044S4Steel|John Henry Irons|Iron Will <i>(This character can\'t be KO\'d unless it was previously damaged this turn.)</i>',
    '044S4Steel|Organic Steel Coating|While Steel is active, Steel character dice can\'t be the target of Global Abilities.',
    '054S4Steel|Metal-Zero Armor|While Steel is active, if a Steel character die is the target of a character\'s ability, Steel does damage equal to his A to that character die.',
    '064S4Superman™|Hero of Metropolis|Superman™ costs 1 less to purchase for each of your different active [DCS] characters.|Global: Pay [S]. Prevent 3 damage to target character die unless an opponent pays 1 life.',
    '064S4Superman™|Invulnerable|Iron Will <i>(This character can\'t be KO\'d unless it was previously damaged this turn.)</i>|Global: Pay [S]. Prevent 3 damage to target character die unless an opponent pays 1 life.',
    '074S4Superman™|Super-Strength|Iron Will <i>(This character can\'t be KO\'d unless it was previously damaged this turn.)</i>|Overcrush|Global: Pay [S]. Prevent 3 damage to target character die unless an opponent pays 1 life.',
    '03003Brave Sacrifice|Basic Action Card|Target Sidekick gets +2A and +2D until end of turn. If it does not attack, KO it.|Global: Pay [S]. Spin target Sidekick to level 1.',
    '03003Call to Action|Basic Action Card|Target non-Sidekick character die gets +3A until end of turn.',
    '02003Dark Avenger|Basic Action Card|Deal 1 damage to target player or character die. If you have an active [DCB], character, instead deal 2 damage.|Global: Pay [B]. Once during your turn, deal 1 damage to target player if you have no character dice in the Field Zone.',
    '06003End of Days|Basic Action Card|Each player chooses one of their active character dice and KOs the rest.',
    '04003Kryptonite Threat|Basic Action Card|Target character die can\'t block until end of turn.|*/** Also, draw a die from your bag and add it to your Prep Area.',
    '03003Man of Steel|Basic Action Card|Continuous: Prevent up to 2 damage to target character die and move this die to your Used Pile. If you have an active [DCS] character, also gain 1 life.',
    '02003To the Rescue!|Basic Action Card|You may field <i>(from your Reserve Pool)</i> one character die for free, or field any number of [DCS] character dice for free until end of turn.',
    '04003Too Big To Fly|Basic Action Card|KO target character die with A of 5 or greater.|Global: Pay [F]. Target character die gets +1A until end of turn.',
    '02003Trusted Friend|Basic Action Card|The first [DCB] or [DCS] character die you purchase this turn costs 1 less.|Global: Pay [M]. Target character die gains [DCB] or [DCS] until end of turn.',
    '03003Vigilante Justice|Basic Action Card|When one of your character dice is KO\'d this turn, KO target opposing non-[DCB] character die. <i>(Do this once for each of your character dice KO\'d.)</i>',
    '124B4Alfred Pennyworth|Caretaker of Wayne Manor|Ally|When fielded, give target Batman™ character die or another target Sidekick +2D until end of turn.',
    '152V4Bane|Professional Criminal|When Bane KOs an opposing character die, spin your Bane dice up 1 level.|Global: Pay [F]. Target opposing character die must attack.',
    '14404Batcave|Home Sweet Cave|Continuous: When one of your character dice is KO\'d, you may instead place it under Batcave. During your Main Step, you may send Batcave to the Used Pile and return all dice under it to the Field Zone at level 1.',
    '141B4Batgirl|Solo Act|If you have exactly 1 Batgirl die in the Field Zone <i>(and no other character dice)</i>, Batgirl is unblockable.',
    '141B4Batman™|Speedy Recovery|Vengeance - Whenever you take damage, KO a Batman™ die and return it to the Field Zone at level 2 <i>(no matter how many Batman™ dice you have in the Field Zone)</i>.',
    '164V4Bizarro|Gentle|When fielded, Bizarro deals 2 damage to each character die that has a Global Ability on its card.',
    '151V4Brainiac|Antagonist|While Brainiac is active, when you declare at least one attacker, target opposing character die must block the die of your choice <i>(if able)</i>.',
    '132B4Bruce Wayne|Billionaire|While Bruce Wayne is active, when one of your character dice is KO\'d, you may move a Batman™ die from your bag or Used Pile to the Field Zone at level 1.',
    '132V4Carmine Falcone|Strategist|When fielded, if you have fewer Sidekicks in the Field Zone than target opponent, deal 2 damage to that opponent.',
    '132B4Catwoman|Acrobat|When Catwoman attacks, KO target opposing character die with purchase cost of 3 or less. Your opponent may pay 2 life to prevent each copy of this effect.',
    '144S4Clark Kent|The Glasses Come Off|When a Clark Kent die is KO\'d by combat damage, you may field a Superman™ die from your Used Pile or Prep Area for free at level 2.',
    '142B4Commissioner Gordon|Rallying the GCPD|Vengeance - When you take damage, spin all of your Commissioner Gordon and Batman™ dice in the Field Zone up one level.|Global: Pay [2F]. Deal 1 damage to each player.',
    '141B4Dick Grayson|Rising to the Occasion|When a [DCB] character die is KO\'d, you may purchase this die for 3 energy and add it to your Prep Area. <i>(Even outside your Main Step.)</i>|Global: Pay [M]. Target character die gains [DCB] until end of turn.',
    '143V4Doomsday|Villainous Monster|Doomsday can\'t attack or block unless you have at least 2 different active [DCV] characters.',
    '153V4General Zod|Despot|When you use a non-Basic Action Die, General Zod gets +1A and Fast until end of turn.',
    '141V4Harley Quinn|Leadership Skills|While Harley Quinn is active, non-Harley Quinn [DCV] character dice cost 1 less to field.|* The Joker character dice are free to field.',
    '142B4Harvey Bullock|Intimidating Investigator|While Harvey Bullock is active, before your Roll and Reroll Step, pick a number. If you roll exactly that many energy before your reroll, deal 2 damage to target character die and gain 2 life. <i>(Count energy, not energy faces.)</i>',
    '164S4Kal-L|From Another Earth|During your Main Step, you may pay [S]. If you do, give Kal-L +4D until the end of turn.|Global: Pay [S]. Switch target character die\'s A and D until end of turn.',
    '143S4Krypto|Here Boy!|When you field a Superman™ character die, you may field Krypto from your Used Pile or Prep Area for free at level 1.',
    '12304Kryptonite|Green Death|Ignore the text on target character die\'s character card <i>(for each of its dice and Global Abilities)</i>.|*/** Also, [DCS] character dice can\'t block.',
    '144V4Lex Luthor|Citizen of Metropolis|When fielded, name an energy type <i>(replacing all previous choices)</i>. While Lex Luthor is active, characters of that energy type cost 1 more to purchase and field.',
    '122S4Lois Lane|Superman™\'s Girlfriend|Ally',
    '153V4Mr. Freeze|Deep Freeze|Character dice damaged by Mr. Freeze but not KO\'d are sent Out of Play until the end of your opponent\'s turn. Return them to the Field Zone at the same level.',
    '154V4Mr. Mxyzptlk|Trickster|While Mr. Mxyzptlk is active, at the beginning of your turn, target character die becomes a copy of another target character die. <i>(The copy has all of the names, subtitles, affiliations, abilities, and stats of the original in place of its own card information.)</i>',
    '141B4Nightwing|Dick Grayson|When Nightwing attacks, deal 1 damage to target character die for each of your different active [M] characters.',
    '141B4Oracle|Internet Interference|While Oracle is active, opponents must pay [1] each time they use an Action Die.',
    '131V4Poison Ivy|Home and Garden|KO character dice damaged by Poison Ivy at the end of the Attack Step, even if Poison Ivy is KO\'d.',
    '163S4Power Girl|Heat Vision|While you have an active [DCS] character besides Power Girl, and Power Girl is active, at the start of your Clear and Draw Step, deal 1 damage to all opposing character dice.',
    '132B4Robin|Kid Detective|While Batman™ is active, each Robin die gets +3A and +3D.',
    '152V4Scarecrow|Arkham Antagonist|When fielded, take control of target opposing [DCV]. You must attack with it. Return it to its owner\'s Field Zone at the same level as when you took it at end of turn.',
    '154S4Steel|Super Support|While Steel is active, opponents can\'t use Global Abilities on your cards without paying an extra [1] or 1 life each time.|Global: Pay [S]. Prevent 1 damage to target character die.',
    '164S4Supergirl|Extraterrestrial Endurance|Your opponent must pay 2 life to target Supergirl dice with Action Dice or Global Abilities each time.',
    '164S4Superman™|Determined|Iron Will <i>(This character can\'t be KO\'d unless it was previously damaged this turn.)</i>|When a Superman™ die takes damage, draw a die and add it to your Prep Area.',
    '153C4Superwoman|Lois Lane|You may pay [B][B][B] rather than Superwoman\'s printed purchase cost.|Global: Pay [1]. You may convert any amount of your energy to [B] this turn.',
    '152V4The Joker|Arkham Asylum|When The Joker attacks, draw a die and add it to your Prep Area. If it is a [DCV] die, deal 2 damage to target opponent.',
    '151V4The Penguin|Oswald Cobblepot|While The Penguin is active, when a non-[DCV] character die is fielded, The Penguin deals 1 damage to the player that fielded it.',
    '143V4The Riddler|Minotaur\'s Fury|When fielded, deal X damage to each Sidekick, where X is The Riddler\'s A.',
    '151V4Two-Face|Good Ol\' Harv|When Two-Face attacks, he can only be blocked by two or more character dice.',
    '153C4Ultraman|From the House of Power|When any player uses a Kryptonite Action Die, Ultraman gets +4A and +4D. This ability resolves after Kryptonite\'s effect.',
    '15404Wonder Woman|Protector|While Wonder Woman is active, opposing "When fielded" effects deal no damage to you or your character dice.',
    '224B4Alfred Pennyworth|MI-5|Ally|When KO\'d, you may roll a Sidekick or Batman™ die from your Used Pile. If you roll an energy result, return Alfred to the Field Zone at level 1. Either way, return the rolled die to the Used Pile.',
    '262V4Bane|Venom Enhanced|If Bane KOs an opposing character die, draw 2 dice. Add any drawn [DCV] dice to your Prep Area. Return the rest to your bag.|Global: Pay [F]. Target opposing character die must attack.',
    '24404Batcave|Batman™\'s Lair|Roll all the dice in your Used Pile. Your opponent moves one of the rolled dice to the Used Pile. Field one of the remaining character dice for free. Return the rest to the Used Pile.',
    '231B4Batgirl|Stealth Bat|Batgirl can\'t be blocked by Sidekicks or [DCV] character dice.',
    '264V4Bizarro|Focused|Bizarro can\'t be blocked by characters with Global Abilities on their cards. Bizarro may block any number of character dice with Global Abilities on their cards.',
    '261V4Brainiac|Manipulative Schemer|While Brainiac is active, after your opponent declares blockers, you may swap any number of their blockers.',
    '242B4Bruce Wayne|Matches Malone|While Bruce Wayne is active, when one of your character dice is KO\'d, you may move a Batman™ die from your bag or Used Pile to the Field Zone at level 2 and deal 2 damage to target character die.',
    '242V4Carmine Falcone|The Roman|While Carmine Falcone is active, Sidekicks deal no combat damage.',
    '244S4Clark Kent|Farm Boy|When a Clark Kent die is KO\'d by combat damage, you may pay 4 life to purchase a Superman™ die and put it into your Prep Area.',
    '242B4Commissioner Gordon|Calling in Batman™|Vengeance - When you take damage, search your bag for a Batman™ die and add it to your Prep Area.|Global: Pay [2F]. Deal 1 damage to each player.',
    '251B4Dick Grayson|The Hero We Need|When a [DCB] character die is KO\'d, if Dick Grayson is in your Used Pile of Prep Area you may move the KO\'d die to the bag and move Dick Grayson to the Field Zone at level 1.|Global: Pay [M]. Target character die gains [DCB] until end of turn.',
    '253V4Doomsday|Superman™\'s Killer|When fielded, KO all [DCS] character dice. Place them in the Used Pile instead of the Prep Area.',
    '253V4General Zod|Madman|When you use a non-Basic Action Die, General Zod replaces this ability with target character die\'s card text until end of turn. <i>(Text only includes the text in the text box.)</i>',
    '241V4Harley Quinn|Revving Up|When a Harley Quinn die is KO\'d from combat damage, you may pay [1] to purchase a Harley Quinn die.|* You may purchase a The Joker die instead of a Harley Quinn die.',
    '264S4Kal-L|Trained by Superboy|During your Main Step, you may pay [2S]. If you do, Kal-L dice can only be blocked by [DCS] characters until end of turn.',
    '22304Kryptonite|Green Plague|Spin target character die to level 1.|** Also KO target [DCS] character die.',
    '244V4Lex Luthor|Kansas Native|While Lex Luthor is active, damage from the first character die that damages you each turn is reduced to 1. If multiple character dice would damage you at the same time, choose one to reduce to 1.',
    '232S4Lois Lane|Daily Planet Reporter|Ally|While Lois Lane is active, other [DCS] characters get +1A while attacking.',
    '253V4Mr. Freeze|Sub Zero|When fielded, send target character die Out of Play until end of turn. Return them to the Field Zone at end of turn at the same level.',
    '244V4Mr. Mxyzptlk|Equalizer|When fielded, all character dice in the Field Zone are treated as if they had 1A and 1D <i>(instead of their normal values, regardless of bonuses)</i> until the end of the turn. Fielding costs remain unchanged.',
    '231B4Nightwing|Qualified Combatant|',
    '231V4Poison Ivy|Second Eden\'s Vengeance|When fielded, KO target Sidekick.',
    '242B4Robin|Dynamic|While Batman™ is active, you may purchase Robin dice for [2] less.',
    '252V4Scarecrow|Horror of Gotham|When fielded, take control of all opposing Sidekicks in the Field Zone. Return all Sidekicks to their owners at end of turn.',
    '264S4Supergirl|Invulnerable|Iron Will <i>(This character can\'t be KO\'d unless it was previously damaged this turn.)</i>|Supergirl dice can\'t be targeted by Action Dice.',
    '253C4Superwoman|Amazonian|If you spend at least [B][B][B] to purchase a Superwoman die, immediately roll that die and place it into your Reserve Pool.|Global: Pay [1]. You may convert any amount of your energy to [B] this turn.',
    '242V4The Joker|Oberon Sexton|When The Joker attacks, draw a die. If it is a Basic Action Die, you may use its effect as if you had rolled it <i>(with no bursts)</i> and then add it to your Prep Area. If the drawn die isn\'t a Basic Action Die, add it to your Used Pile.',
    '241V4The Penguin|Bully|While The Penguin is active, when a non-[DCV] character die is fielded, The Penguin deals 1 damage to that character die.',
    '253V4The Riddler|Riddle Me This|While The Riddler is active, before your opponent\'s Clear and Draw Step, name a non-Sidekick die. For each of those dice drawn, The Riddler deals your opponent 1 damage.',
    '251V4Two-Face|Double Deal|When Two-Face is blocked, you may have Two-Face deal his A to your opponent in addition to his blockers.',
    '263C4Ultraman|World Conqueror|While Ultraman is active, when a Kryptonite Action Die is used, KO all opposing [DCS] character dice and Ultraman deals damage equal to the combined levels of those character dice to target opponent.',
    '25404Wonder Woman|Amazonian Defender|While Wonder Woman is active, your opponent\'s Global Abilities deal no damage to you or your character dice.',
    '334B4Alfred Pennyworth|Tough as Nails|Ally|When fielded, give target Batman™ die or target Sidekick +1A and +1D <i>(besides Alfred Pennyworth)</i> while attacking this turn.',
    '362V4Bane|Genius Tactician|When Bane KOs an opposing character die, Bane deals half of that character\'s A to target opponent <i>(rounded down)</i>.|Global: Pay [F]. Target opposing character die must attack.',
    '374V4Bizarro|Me Am #1!|Overcrush|Bizarro gains +2A and +2D for each character card with a Global Ability your opponent has on their team.',
    '351V4Brainiac|Vengeful|When fielded, target opponent rerolls a [DCS] character die in their Field Zone. If it shows an energy face. move it to the Used Pile. Otherwise, return it to the Field Zone on the rolled face.',
    '342B4Bruce Wayne|International Playboy|While Bruce Wayne is active, when one of your character dice is KO\'d, you may place a Batman™ die from your bag or Used Pile in the Field Zone at level 3 and capture target level 1 or 2 character die. Return the captured die at end of turn.',
    '332V4Carmine Falcone|Mob Boss|While Carmine Falcone is active, only 1 [DCB] character die can attack each turn.',
    '344S4Clark Kent|Daily Planet Photographer|When a Clark Kent die is KO\'d by combat damage, you may search your bag or Used Pile for a Superman™ die and place it in the Field Zone at level 2.',
    '352B4Commissioner Gordon|Bat Signal|Vengeance - When you take damage, field a Batman™ die from your Used Pile at level 3 <i>(for free)</i>.|Global: Pay [2F]. Deal 1 damage to each player.',
    '361B4Dick Grayson|Brand New Bat|When a [DCB] character die is KO\'d, Dick Grayson gets +2A, +2D, and deals combat damage to your opponent instead of blockers even if blocked until end of turn.|Global: Pay [M]. Target character die gains [DCB] until end of turn.',
    '363V4Doomsday|Unstoppable Rampage|Iron Will <i>(This character can\'t be KO\'d unless it was previously damaged this turn.)</i>|When Doomsday is dealt damage, target opponent must spin down a non-Sidekick to level 1 or KO a character die.',
    '363V4General Zod|Corrupt|While General Zod is active, when you use a non-Basic Action die, deal 2 damage to target character die. You may pay [1] to put that Action Die into your Prep Area.',
    '331V4Harley Quinn|"Hey Bats!"|While Harley Quinn is active, Batman™ can\'t block your [DCV] dice.|* Also, The Joker is unblockable.',
    '374S4Kal-L|Unmasked Wonder!|When Kal-L blocks, you may pay [S] to have him deal his combat damage to each attacking character instead of just the character he is blocking <i>(this happens when normal combat damage would)</i>.',
    '33304Kryptonite|K-Metal|All character dice get -2A until end of turn.|*/** Also, Superman™\'s A becomes 0 until end of turn.',
    '332S4Lois Lane|Inspirational|Ally|While Lois Lane is active, other [DCS] characters gain Iron Will while at level 1.',
    '353V4Mr. Freeze|Heart of Ice|While Mr. Freeze is active, before your opponent\'s Clear and Draw Step, you may choose a die in their Prep Area. They skip rolling it this turn, and it remains there.',
    '344V4Mr. Mxyzptlk|5th Dimension|While Mr. Mxyzptlk is active, when an opponent uses a Basic Action Die, you may use a copy of that Basic Action Die.',
    '341B4Nightwing|Flying Grayson|When Nightwing attacks, deal 4 damage divided as you choose among up to 4 target opposing character dice.',
    '341V4Poison Ivy|Pretty Poison|When Poison Ivy attacks, deal 1 damage to each opposing character die.',
    '342B4Robin|Daring Defense|While Batman™ is active, each Robin character die can block an additional attacking die.',
    '342V4Scarecrow|Hallucinogenic Vapors|If Scarecrow is KO\'d, take control of target opposing character die until end of turn. Spin this die to an energy face and place it underneath the controlled die. Move it to the Prep Area when you return the controlled die.',
    '364S4Supergirl|Impregnable Defense|Iron Will <i>(This character can\'t be KO\'d unless it was previously damaged this turn.)</i>|Supergirl can block any number of attacking dice with purchase cost of 2 or lower.',
    '353C4Superwoman|Reign of Terror|If you spend at least [B][B][B] to purchase Superwoman, you may place her die in your Prep Area and deal 3 damage to all [DCV] or [DCB] character dice <i>(but not both)</i>.|Global: Pay [1]. You may convert any amount of your energy to [B] this turn.',
    '352V4The Joker|Violent Lunatic|When The Joker attacks, draw a die. If it is a Sidekick die, roll it <i>(otherwise return it to your bag)</i>. Place the Sidekick die in your Used Pile and deal 2 damage to all opposing character dice of the same energy type rolled. <i>(Deal no damage on the Sidekick or Wild face.)</i>',
    '341V4The Penguin|Selfish|When a non-[DCV] character die is fielded, The Penguin gets +1D until end of turn.',
    '343V4The Riddler|My Games Only!|While The Riddler is active, when your opponent uses an Action Die, The Riddler deals your opponent 1 damage.',
    '361V4Two-Face|Double Crosser|While Two-Face is active, when you deal damage with a Global Ability or Action Die you may pay 2 life to double that damage.',
    '35404Wonder Woman|Bracelets of Submission|While Wonder Woman is active, when an opponent\'s Global Ability damages you, Wonder Woman deals that player an equal amount of damage.',
    '43404Batcave|Large, Dark, Wet|Continuous: Once per turn, during your turn, you may purchase a Basic Action Die for 1 less than its printed cost and put it under this die. You can send this die to the Used Pile to add the dice under it to your Prep Area.',
    '441B4Batgirl|Babs|When Batgirl takes damage, deal 4 damage to target opposing characters divided any way you choose.',
    '454V4Lex Luthor|Ex-Con|While Lex Luthor is active, non-combat damage that would reduce you to 0 life or less instead reduces you to 1 life.',
    '463C4Ultraman|Kryptonite-Powered|While Ultraman is active, if a Kryptonite Action Die is used, you may use the effect of every Basic Action Card in play <i>(with no burst)</i> immediately.',
    '462K1Black Lantern Anti-Monitor|Darkest Evil|When fielded, KO all Anti-Monitor dice.|When Black Lantern Anti-Monitor attacks, the defending player loses 2 life and Black Lantern Anti-Monitor gets +2A until end of turn.',
    '453K1Black Lantern Firestorm|Torment of Two Spirits|When fielded, KO all Firestorm dice.|While Black Lantern Firestorm is active, your opponents must pay 2 life to block with a [M] character die <i>(they can then block with any number of [M] character dice)</i>.',
    '443K1Black Lantern Green Arrow|Black Archer|When fielded, KO all Green Arrow dice.|While Black Lantern Green Arrow is active, when an opposing character\'s ability deals you damage, that character\'s controller loses 1 life.',
    '443K1Black Lantern Martian Manhunter|Alien Afterlife|When fielded, KO all Martian Manhunter dice.|If Black Lantern Martian Manhunter blocks and KOs a character, the attacking player loses life equal to that character\'s level.',
    '54404Bat-Mite|5th Dimension|While Bat-Mite is active, Batman™ character dice can\'t attack or block. Bat-Mite cannot be KO\'d by combat damage.',
    ];

    var fus = [
    '041M4g0Bronze Dragon|Minion Dragon|Breath Weapon 1 (pay [1] to deal 1 damage to your opponent and all their characters)',
    '041M4g0Bronze Dragon|Apprentice Dragon|Anti-Breath Weapon - X (When an opponent uses a Breath Weapon, you may pay an amount equal to the opponent\'s Breath Weapon cost to cancel the effect.)|* Pay [1] less to use Anti-Breath Weapon',
    '061M4g0Bronze Dragon|Master Dragon|Breath Weapon 1 (pay [1] to deal 1 damage to your opponent and all their characters)|While Bronze Dragon is active, whenever an opponent uses a Breath Weapon, Bronze Dragon deals an equal amount of damage to that opponent and to each of their character dice.',
    '043M4n0Cockatrice|Minion Monstrosity|When fielded, KO target character die with purchase cost [4] or less.',
    '043M4n0Cockatrice|Apprentice Monstrosity|While Cockatrice is active, whenever an NPC is fielded, roll an unpurchased Spell or Basic Action die. On a [2], KO the NPC. Return the Spell die afterward.',
    '053M4n0Cockatrice|Master Monstrosity|When blocked, reroll target blocker blocking Cockatrice and KO it if it rolls an energy face. (Otherwise, it remains in play, blocking at its rolled level.)',
    '041M4e0Glabrezu|Minion Fiend|While Glabrezu is active, your fiend dice cost [1] less to purchase.',
    '041M4e0Glabrezu|Apprentice Fiend|While Glabrezu is active, your fiend dice cannot be damaged except by combat damage.',
    '051M4e0Glabrezu|Master Fiend|While Glabrezu is active, your opponent cannot target your fiend dice with Action Dice.',
    '043H4g1Gnome Ranger|Minion Harper|Experience|When fielded, deal 2 damage to target character die.|* Instead, deal 4 damage if you have 2 or more Experience tokens on this character card.',
    '043E4g1Gnome Ranger|Apprentice Emerald Enclave|Experience|When fielded, draw a die from your bag and put it into your Prep Area.|* If it is an NPC die, deal 2 damage to target character die.',
    '033L4n1Gnome Ranger|Master Lords\' Alliance|Experience|While Gnome Ranger is active, your other attacking character dice gets +1A until end of turn.',
    '034H4g1Half-Elf Bard|Minion Harper|Experience|When Half-Elf Bard blocks, draw a die and add it to your Prep Area. If it is an Adventurer die (any character with Experience), draw an additional die and add it as well.',
    '044O4g1Half-Elf Bard|Apprentice Order of the Gauntlet|Experience|While Half-Elf Bard is active, your other character dice of equal or lower level to your highest level Half-Elf Bard are not affected by opposing character abilities.',
    '044L4g1Half-Elf Bard|Master Lords\' Alliance|Experience|When Half-Elf Bard attacks, each attacking character die gets +1A and +1D for each of your other different character dice.',
    '022M4e0Hell Hound|Minion Fiend|',
    '032M4e0Hell Hound|Apprentice Fiend|When Hell Hound attacks, deal 1 damage to target character or opponent.',
    '032M4e0Hell Hound|Master Fiend|When Hell Hound attacks, target character die cannot block this turn.',
    '022M4e0Hill Giant|Minion Giant|',
    '032M4e0Hill Giant|Apprentice Giant|Overcrush (deal damage in excess of blocker\'s D to opponent)',
    '032M4e0Hill Giant|Master Giant|When Hill Giant attacks, he can only be blocked by two or more character dice.',
    '044M4e0White Dragon|Minion Dragon|Breath Weapon 1 (pay [1] to deal 1 damage to your opponent and all their characters)|White Dragon gets +1D while blocking.',
    '054M4e0White Dragon|Apprentice Dragon|Breath Weapon 1 (pay [1] to deal 1 damage to your opponent and all their characters)|Level 1 character dice damaged by this Breath Weapon cannot block until end of turn.',
    '054M4e0White Dragon|Master Dragon|Breath Weapon 2 (pay [2] to deal 2 damage to your opponent and all their characters)|Good character dice damaged by this Breath Weapon cannot block until end of turn unless your opponent pays [1].',
    '02003n0Banishment|Basic Action Card|Put target character die from opponent\'s Prep Area into their Used Pile.',
    '02003n0Barkskin|Basic Action Card|Target character die cannot be dealt damage until end of turn.|** Choose 2 target character dice instead.|Global: Pay [S]. Target character die gets +1D until end of turn.',
    '02003n0Blink - Transmutation|Basic Action Card|Use only after blockers are assigned. Each of your blocked character dice deals 1 damage to the defending player in addition to normal damage.|Global: Pay [M]. Remove target attacking character die from the Attack Zone (it stays in the Field Zone).',
    '03003n0Chainmail Armor|Basic Action Card|Equip (attach to a character with [EQ])|Equipped character gets +4D and cannot be affected by opposing "When fielded" effects. This die counts as Gear. This cannot be ignored.',
    '03003n0Cloudkill|Basic Action Card|Deal 1 damage to each opposing character. Character dice damaged by this effect cannot attack or block this turn unless the opponent pays [1] per character die.',
    '05003n0Delayed Blast Fireball|Basic Action Card|Continuous: On your opponent\'s turn, either when an attack is declared or the opponent skips the Attack Step, deal 4 damage to all opposing characters and move this die to the Used Pile.|** Deal 6 damage instead.',
    '04003n0Flaming Sword|Basic Action Card|Equip (attach to a character with [EQ])|Equipped character die gets +2A and +2D. Flaming Sword deals 1 damage to character dice blocking or blocked by the equipped character. This die counts as Gear. This cannot be ignored.',
    '04003n0Mordenkainen\'s Sword|Basic Action Card|Target character die gets +XA and +XD, where X is the number of NPC dice in your opponent\'s Used Pile when you use this Action Die.|Global: Pay [2B]. Deal 1 damage to target character die.',
    '05003n0Power Word Kill|Basic Action Card|KO target character die of Level 2 or less.|** KO target character die (of any level) instead.|Global: Pay [2F]. KO target Level 1 character die that was dealt damage this turn.',
    '02003n0Shocking Grasp|Basic Action Card|Deal 1 damage to target character die. If that character is KO\'d by this damage, you may put this die into your Prep Area.',
    '173M4g0Bahamut|Dragon of Justice|Breath Weapon 3 (pay [3] to deal 3 damage to your opponent and all their characters)|Overcrush|While Bahamut is active, other character dice cannot use Breath Weapons.',
    '172M4e0Balor|Lesser Fiend|Gate Balor: When fielded, you may take another unpurchased Balor die and roll it. If it rolls a character face, put it into your Prep Area. Otherwise, return it to its card.',
    '141M4e0Beholder|Lesser Aberration|When Beholder is fielded, you may use up to 2 different Global Abilities for free.|Global: Pay [1]. Move target Spell die on an Action face in your Reserve Pool to Beholder\'s card. At the beginning of your next Roll and Reroll Step, return it to your Reserve Pool on the same face.',
    '172M4e0Black Dragon|Lesser Dragon|Breath Weapon 2 (pay [2] to deal 2 damage to your opponent and all their characters)|When Black Dragon attacks, your other Evil characters cannot be KO\'d while attacking unless Black Dragon is KO\'d.',
    '124M4g0Blink Dog|Lesser Fey|When Blink Dog is blocked, deal 1 damage to each character die blocking it.',
    '151M4g0Bronze Dragon|Lesser Dragon|Anti-Breath Weapon - X (When an opponent uses a Breath Weapon, you may pay an amount equal to the opponent\'s Breath Weapon cost to cancel the effect.)|When fielded, deal 1 damage to target opponent for each of their active Evil dragon character dice.|* Pay 1 less for Bronze Dragon\'s Anti-Breath Weapon.',
    '142M4e0Bugbear Ambusher|Lesser Humanoid|While Bugbear Ambusher is active, when one or more Bugbear Ambusher dice block, KO target opposing character die with the lowest defense (you break all ties).',
    '152M4n0Clay Golem|Lesser Construct|Fabricate 2-4: You may KO 2 character dice with total purchase cost [4] or more to purchase this die for free.|While Clay Golem is active, you may redirect up to 2 damage from you to this character die each turn.',
    '143M4n0Cockatrice|Lesser Monstrosity|When Cockatrice is fielded, KO target character die with purchase cost [4] or less.',
    '131M4e0Displacer Beast|Lesser Monstrosity|While Displacer Beast is active, if an opponent\'s Global or character ability targets this character, Displacer Beast deals 2 damage to that opponent.',
    '15404g1Drizzt|The Exile|Experience|Drizzt gets +1A and +1D for each different opposing active Evil character.',
    '143E4g1Dwarf Wizard|Lesser Emerald Enclave|Experience|While Dwarf Wizard is active, each time you use an action die, Dwarf Wizard deals 2 damage to target character die.',
    '121H4g1Elf Thief|Lesser Harper|If you have energy in your Reserve Pool, you may field Elf Thief for free.|When Elf Thief is fielded, you may use one energy from your opponent\'s Reserve Pool.',
    '151M4e1Erinyes|Lesser Fiend|Gate Erinyes: When fielded, you may take another unpurchased Erinyes die and roll it. If it rolls a character face, put it into your Prep Area. Otherwise, return it to the card.',
    '144M4n0Flesh Golem|Lesser Construct|Fabricate 2-3: You may KO 2 character dice with total purchase cost [3] or more to purchase this die for free.|While Flesh Golem is active, you may redirect 1 damage from you to this character die each turn.',
    '144M4n0Gelatinous Cube|Lesser Ooze|When Gelatinous Cube is fielded, you may capture target NPC die from an opponent\'s Reserve Pool. If Gelatinous Cube leaves the Field Zone, place the captured die in its owner\'s Used Pile.',
    '131M4n0Ghost|Lesser Undead|When fielded, remove half the Experience tokens, rounded down, from target Adventurer card (any character with Experience).',
    '134M4n0Giant Spider|Lesser Beast|Swarm (While this character is active, if you draw this die during your Clear and Draw Step, draw and roll an extra die.)|Giant Spider can block up to 2 NPCs.',
    '151M4e0Glabrezu|Lesser Fiend|Gate Glabrezu: When fielded, you may take another unpurchased Glabrezu die and roll it. If it rolls a character face, put it into your Prep Area. Otherwise, return it to its card.',
    '133H4g1Gnome Ranger|Lesser Harper|Experience|When fielded, cancel an effect from an action die that affects your character dice.',
    '122M4e1Goblin|Lesser Humanoid|Swarm (While this character is active if you draw this die during your Clear and Draw Step, draw and roll an extra die.)',
    '153M4n0Gorgon|Lesser Monstrosity|When fielded, reroll target opposing character die. If it rolls an energy face, KO the character die.|* Instead, if it rolls an energy face, put the character die in the Used Pile.',
    '142H4g1Half-Orc Barbarian|Lesser Harper|Experience|Cleave (If this character attacks and KO\'s a blocker, deal half damage rounded down to another character your opponent controls.)',
    '144E4g1Half-Elf Bard|Lesser Emerald Enclave|Experience|While Half-Elf Bard is active, when one of your Good characters is KO\'d, you may remove an Experience token from Half-Elf Bard to return that character die to the Field Zone (at its current level).',
    '132M4e0Hell Hound|Lesser Fiend|While Hell Hound is active, your fiend dice cost [1] less to purchase (min. 1) and [1] less to field.',
    '142M4e0Hill Giant|Lesser Giant|Overcrush|When Hill Giant attacks, your other Evil character dice cannot be blocked until end of turn unless Hill Giant is blocked.',
    '132E4g1Human Fighter|Lesser Emerald Enclave|Experience|While Human Fighter is active, [EQ] dice cost [1] less to purchase (min. 1).',
    '133M4e0Intellect Devourer|Lesser Aberration|When Intellect Devourer is fielded, move target die showing energy from the opponent\'s Reserve Pool to the Used Pile.',
    '174M4n0Iron Golem|Lesser Construct|Fabricate 3-5: You may KO 3 character dice with total purchase cost [5] or more to purchase this die for free.|While Iron Golem is active, you may redirect up to 3 damage from you to this character die each turn.',
    '151M4e1Lich|Lesser Undead|Energy Drain: x2 (Energy Drain allows Lich to spin down engaged character dice 1 level, and Lich may do this twice each Attack Step.)|Whenever this character die blocks or is blocked, spin engaged character down 2 levels and spin Lich up 2 levels.',
    '134M4n1Lizardfolk|Lesser Humanoid|Swarm (While this character is active, if you draw this die during your Clear and Draw Step, draw and roll an extra die.)|NPCs can\'t block Lizardfolk.',
    '181M4e0Lolth|The Demon Dark Mother|While Lolth is active, you may spend [1] when you field an Evil character die to deal 1 damage to your opponent.',
    '133M4e0Oni|Lesser Giant|When Oni is fielded, deal 1 damage to target NPC die.',
    '162M4e1Orcus|Demon Lord of Thanatos|While Orcus is active, fiend dice cost [2] less to purchase (min. 1).|Global: Pay [F]. Deal 1 damage to target attacking character die.',
    '14304n0Potion|Lesser Spell|During your opponent\'s next Clear and Draw step, they must name all the dice drawn prior to drawing dice (one for each die they would draw, all at once). Put any incorrectly named dice in the Used Pile.|<em>Potion of Owl\'s Wisdom</em>',
    '13404n0Ring|Lesser Gear|Equip (attach to a character with [EQ])|Equipped character gains +2D and cannot be the target of Global Abilities.|Global: Pay [1]. Once during your turn you may put a NPC die from your Used Pile into your Reserve Pool.|<em>Ring of Protection</em>',
    '121M4n0Rust Monster|Lesser Monstrosity|When fielded, you may put target unattached opposing Gear into opponent\'s Used Pile.',
    '163M4g0Storm Giant|Lesser Giant|When fielded, deal damage to target character or player equal to Storm Giant\'s level.',
    '164M4e0White Dragon|Lesser Dragon|Breath Weapon 2|While White Dragon is active, roll target Good character die damaged by this Breath Weapon. If it rolls an energy face, put it in its owner\'s Used Pile.',
    '143M4e0Wraith|Lesser Undead|Energy Drain|When fielded, remove an Experience token from target Adventurer card.',
    '273M4g0Bahamut|The Platinum Dragon|Breath Weapon 3|When Bahamut is fielded, KO all Evil dragons. Deal 1 damage to target opponent for each dragon die KO\'d this way.',
    '262M4e0Balor|Greater Fiend|Gate Fiend: When fielded, you may take a different unpurchased fiend die and roll it. If it rolls a character face, put it into your Prep Area. Otherwise, return it to the card.',
    '241M4e0Beholder|Greater Aberration|When fielded, you may move up to two action dice from your Used Pile into your Prep Area.|Global: Pay [1]. Move target Spell die on an Action face in your Reserve Pool to Beholder\'s card. At the beginning of your next Roll and Reroll Step, return it to your Reserve Pool on the same face.',
    '272M4e0Black Dragon|Greater Dragon|Breath Weapon 2|When fielded, deal 1 damage to target opponent for each Adventurer die in their Field Zone.',
    '224M4g0Blink Dog|Greater Fey|Blink Dog character dice cannot be the target of Spells or character abilities.',
    '252M4e0Bugbear Ambusher|Greater Humanoid|If a Bugbear Ambusher die is in the Prep Area or Used Pile, when an opponent declares an attack you may pay [2F] to move it to the Field Zone at Level 2. Return it to its original location at the end of the Attack Step.',
    '252M4n0Clay Golem|Greater Construct|Fabricate 2-4: You may KO 2 character dice with total purchase cost [4] or more to purchase this die for free.|While Clay Golem is active, you may redirect 2 damage from other character dice to this character die each turn.',
    '241M4e0Displacer Beast|Greater Monstrosity|When Displacer Beast blocks, you may add target opposing character die to the attack and block that character die with one of your character dice.',
    '25404g1Drizzt|The Hunter|Experience|You may remove two Experience tokens from Drizzt to put a 3A and 3D Guenhwyvar into play until end of turn. When Drizzt attacks, Guenhwyvar cannot be blocked.',
    '233H4g1Dwarf Wizard|Greater Harper|Experience|While active, when you use an Action die, Dwarf Wizard gets +2A and +2D until end of turn.',
    '231E4g1Elf Thief|Greater Emerald Enclave|When fielded, move target energy die that matches the type of one of your active characters from your opponent\'s Reserve Pool to their Used Pile. If you do, you may move a die with the same energy from your Used Pile to your Reserve Pool on the same face.',
    '251M4e1Erinyes|Greater Fiend|When Erinyes attacks, return a different target fiend character die from your Used Pile to your Field Zone at level 1.',
    '244M4n0Flesh Golem|Greater Construct|Fabricate 2-3: You may KO 2 character dice with total purchase cost [3] or more to purchase this die for free.|While active, you may redirect 1 damage from another character die to this character die each turn.',
    '244M4n0Gelatinous Cube|Greater Ooze|When fielded, you may capture any unattached Gear until Gelatinous Cube leaves the Field Zone. When Gelatinous Cube leaves the Field Zone, put the captured die in its owner\'s Used Pile.',
    '231M4n0Ghost|Greater Undead|When fielded, remove an Experience token from target Adventurer card. When Ghost attacks, target Adventurer character die cannot block if it is of equal or lower level than Ghost.',
    '224M4n0Giant Spider|Greater Beast|When Giant Spider attacks, all NPC dice must block Giant Spider if able. If multiple GIant Spider dice attack, the defending player chooses how NPCs block.|Global: Pay [S]. Target character must block this turn.',
    '232M4e1Goblin|Greater Humanoid|Swarm|Goblin gets +1A and +1D if opponent has an active Adventurer character die.',
    '263M4n0Gorgon|Greater Monstrosity|When fielded, roll all humanoid character dice in the Field Zone. Any that roll energy faces are KO\'d.',
    '242Z4n1Half-Orc Barbarian|Greater Zhentarim|Experience|If Half-Orc Barbarian KO\'s a monster character die with combat damage, it gains an extra Experience token at end of turn (in addition to the one it would normally gain).',
    '232L4g1Human Fighter|Greater Lords\' Alliance|Experience|While active, once during your turn, if an opposing Evil Adventurer is KO\'d, add an Experience token to Human Fighter immediately.',
    '243M4e0Intellect Devourer|Greater Aberration|When fielded, move all [Q] energy from opponent\'s Reserve Pool to the Used Pile.',
    '274M4n0Iron Golem|Greater Construct|Fabricate 3-5: You may KO 3 character dice with total purchase cost [5] or more to purchase this die for free.|While active, prevent the first damage to you from each source during each of your opponent\'s turns.',
    '271M4e1Lich|Greater Undead|Energy Drain (Energy Drain allows Lich to spin down engaged character dice 1 level, and Lich may do this twice each Attack Step.)|While Lich is active, when you field an [EVIL] Monster, reroll target opposing [NEUTRAL] or [GOOD] character die. If it rolls an energy face, move it to the Used Pile.',
    '234M4n1Lizardfolk|Greater Humanoid|Swarm|When Lizardfolk damages an opponent, draw a die. If it is a Lizardfolk die, add it to your Prep Area, otherwise add it to your Used Pile.',
    '271M4e0Lolth|Demon Ruler of the Demonweb Pits|While Lolth is active, whenever an opponent attacks with 1 or more character dice, that opponent takes 1 damage.',
    '243M4e0Oni|Greater Giant|When fielded, you may put target Action die from target opponent\'s Field Zone, Prep Area, or Reserve Pool into the Used Pile. Cancel any effect of that die.',
    '262M4e1Orcus|Demon Prince of Undeath|Orcus counts as a fiend. When fielded, search your bag for a different fiend character die and put it into the Field Zone at the same level as this character die.|Global: Pay [F]. Deal 1 damage to target attacker.',
    '24304n0Potion|Greater Spell|Target character die gets +3A and +3D.|** Instead, target character die gets +5A and +5D.|<em>Potion of Heroism</em>',
    '24404n0Ring|Greater Gear|Equip (attach to a character with [EQ])|When equipped character attacks, it deals damage to target character die equal to its level.|** Instead, equipped character may deal damage to target character die equal to its level or 1 damage for each of its Experience tokens.|<em>Ring of The Ram</em>',
    '221M4n0Rust Monster|Greater Monstrosity|When fielded, you may put target attached Gear into its owner\'s Prep Area.',
    '263M4g0Storm Giant|Greater Giant|When fielded, draw 3 dice from your bag. Put any NPC dice drawn in the Used Pile and deal 1 damage to target opposing character for each. Return any non-NPC dice drawn to your bag.',
    '253M4e0Wraith|Greater Undead|Energy Drain|When Wraith damages an Adventurer character die, remove all Experience tokens from that Adventurer die\'s card.',
    '373M4g0Bahamut|Dragon God of Good|Breath Weapon 3|When Bahamut attacks, KO target opposing Evil dragon character die and deal damage to target opponent equal to that die\'s level.',
    '362M4e0Balor|Paragon Fiend|While Balor is active, when you use the Gate ability to add a fiend to your Prep Area, or you field a fiend that has the Gate ability, draw a die from your bag and add it to your Prep Area.',
    '372M4e0Black Dragon|Paragon Dragon|Breath Weapon 3|Adventurer character dice damaged by this Breath Weapon cannot block dragons until end of turn.',
    '334M4g0Blink Dog|Paragon Fey|When Blink Dog is KO\'d by your opponent, roll the KO\'d die. On an energy face, deal 2 damage to that opponent. Put the die in your Prep Area afterward.',
    '362M4n0Clay Golem|Paragon Construct|Fabricate 2-4: You may KO 2 character dice with total purchase cost [4] or more to purchase this die for free.|While active, your other character dice get +2D.',
    '341M4e0Displacer Beast|Paragon Monstrosity|When Displacer Beast attacks, you can swap it with another attacker after all blockers are declared (before damage is dealt).',
    '333Z4g1Dwarf Wizard|Paragon Zhentarim|Experience|When fielded, target a character die. While Dwarf Wizard is active, copies of that character die in the Field Zone have no text. If you field another Dwarf Wizard die, target a new die, cancelling all previous choices.',
    '341E4g1Elf Thief|Paragon Emerald Enclave|When fielded, target opponent loses 2 life whenever they use a Global Ability until end of turn.',
    '341M4e1Erinyes|Paragon Fiend|While Erinyes is active, whenever you field a fiend character die, you may move any number of fiend dice from your Used Pile into your bag.',
    '344M4n0Flesh Golem|Paragon Construct|Fabricate 2-3: You may KO 2 character dice with total purchase cost [3] or more to purchase this die for free.|While active, your other character dice get +1D.',
    '344M4n0Gelatinous Cube|Paragon Ooze|When fielded, draw a die from your opponent\'s bag and capture it. It stays captured until Gelatinous Cube leaves the Field Zone. If Gelatinous Cube leaves the Field Zone, put it in its owner\'s Used Pile.',
    '331M4n0Ghost|Paragon Undead|When fielded, remove 1 Experience token from each active Good Adventurer.',
    '334M4n0Giant Spider|Paragon Beast|Reroll any character die damaged but not KO\'d by Giant Spider at the end of the Attack Step. If it rolls an energy face, KO the character die. Otherwise, it stays on the rolled face and damage is cleared from it.',
    '332M4e1Goblin|Paragon Humanoid|Swarm|If Goblin is KO\'d while attacking, put all Goblins from the Used Pile into the Prep Area.',
    '343M4n0Gorgon|Paragon Monstrosity|When Gorgon damages a character die, KO that character die at end of combat.|* If you KO a character die with Gorgon\'s ability, deal 1 damage to opponent.',
    '342O4g1Half-Orc Barbarian|Paragon Order of the Gauntlet|Experience|If Half-Orc Barbarian is KO\'d while engaged, deal damage equal to its attack to each character die it was engaged with.',
    '332Z4e1Human Fighter|Paragon Zhentarim|Experience|While active, once during your turn, if an opposing Good Adventurer is KO\'d, Human Fighter gains an experience token immediately.',
    '353M4e0Intellect Devourer|Paragon Aberration|When fielded, move all energy from opponent\'s Reserve Pool to the Used Pile if it matches another energy in their Reserve Pool. ([Q] only match [Q].)',
    '364M4n0Iron Golem|Paragon Construct|Fabricate 3-5: You may KO 3 character dice with total purchase cost [5] or more to purchase this die for free.|While active, you may redirect up to 3 damage from other character dice to this character die each turn.',
    '361M4e1Lich|Paragon Undead|Energy Drain|When fielded, remove 2 Experience tokens from each Adventurer card.',
    '334M4n1Lizardfolk|Paragon Humanoid|Lizardfolk gets +2A while it has Gear equipped.|Global: Pay [S]. Target equipped character die gets +2D until end of turn.',
    '371M4e0Lolth|Demon Queen of Spiders|Whenever your opponent fields an Adventurer character die, Lolth deals 2 damage to that opponent.',
    '343M4e0Oni|Paragon Giant|When fielded, you may purchase a Basic Action Die that has not been purchased by any player for [2] less (min. 1).',
    '372M4e1Orcus|Demon Lord of Undeath|Orcus counts as a fiend. When Orcus attacks or blocks, you may take an unpurchased fiend die (besides Orcus) from one of your cards and roll it. If it rolls a character face, add it to the Field Zone. Otherwise, return it to the card.|Global: Pay [F]. Deal 1 damage to target attacker.',
    '32304n0Potion|Paragon Spell|Target character die gains Fast. (Character dice with Fast deal combat damage before normal combat damage, all at once.)|*/** Instead 2 target character dice gain Fast.|<em>Potion of Haste</em>',
    '331M4n0Rust Monster|Paragon Monstrosity|When fielded, opponent must reroll each of their equipped Gear. Put any that roll energy faces into the Used Pile. Return others to their equipped characters.',
    '353M4g0Storm Giant|Paragon Giant|When Storm Giant attacks, deal 2 damage to target opponent if you have any [B] energy in your Reserve Pool. (Ignore [Q] energy.)',
    '343M4e0Wraith|Paragon Undead|Energy Drain|When Wraith uses Energy Drain on an Adventurer character die, also remove an Experience token from that Adventurer\'s card if able.',
    '441M4e0Beholder|Epic Aberration|While Beholder is active, when you KO a character die using an Action die, KO all other copies of that character die in play.|Global: Pay [1]. Move target Spell die on an Action face in your Reserve Pool to Beholder\'s card. At the beginning of your next Roll and Reroll Step, return it to your Reserve Pool on the same face.',
    '442M4e0Bugbear Ambusher|Epic Humanoid|While Bugbear Ambusher is active, when an opposing character die is fielded, you may reroll a Bugbear Ambusher die. If it rolls a character face, deal damage equal to its A to the fielded character die. Otherwise, put that Bugbear Ambusher die in the Used Pile.',
    '45404g1Drizzt|The Legendary Hero|Experience|When fielded, KO all character dice with Swarm.',
    '43404n0Ring|Epic Gear|Equip (attach to a character with [EQ])|Equipped character die gains Regenerate.|Global: Pay [1]. Once during your turn you may put a NPC die from your Used Pile into your Reserve Pool on any face.|<em>Ring of Regeneration</em>',
    '43101n0Deck of Many Things|Epic Magical Object|Name two different dice and draw two dice from your bag. If they are the named dice, you may either roll them or continue to name previously unnamed dice and draw dice until you choose to stop. If you fail to name a die correctly, all drawn dice go to your Used Pile.',
    '44301n0Hammer of Thunderbolts|Epic Magical Object|Deal X damage to target character or player where X is the number of different active [B] characters in your Field Zone.|** You may spend [B] to damage target player and target character instead.',
    '45201e0Talisman of Ultimate Evil|Epic Magical Object|KO X of your character dice. KO X target opposing character dice.',
    '44401n0Robe of the Archmagi|Epic Magical Gear|Equip to a character that doesn\'t have [DDM]. Equipped character die gets +2D. If the equipped die would be put into the Used Pile or Prep Area, instead put this die there and return the character die to play at its original level.',
    '562M1e0Belaphoss|The Mad Demon|When fielded, remove 1 Experience token from all Adventurer cards. When Belaphoss attacks, for each Adventurer character die in your opponent\'s Field Zone, remove an Experience token from an Adventurer card.',
    ];
    var m_op2016_dice = [ 'asm', 'asm', 'asm', 'avx', '', 'cw', 'cw', 'cw', 'cw', 'cw', 'cw' ];
    var m_op2016 = [
    //ASM dice
    '533F4Gwen Stacy|Spider-Ally|When Gwen Stacy attacks you may pay [B]. If you do, target character die can\'t block this turn.',
    '541F2Mary Jane|Spider-Ally|Ally|While Mary Jane is active, opposing [DCV] character dice cost at least [2] to field.',
    //ASM dice
    '532M4Daredevil|Marvel Knight|When Daredevil attacks alone, blocking character dice get -1A.',
    //AvX dice
    '563M4Punisher|Marvel Knight|While Punisher is active, when you take damage from an opposing "When fielded," ability, deal an equal amount of damage to your opponent.',
    //BAC
    '54003Villainous Pact|Basic Action Card|Your opponent chooses one non-Villain character. All other non-[DCV] character dice cannot block this turn.|Global: Pay [M]. Once per turn, during your turn, if you have no dice in your Prep Area, you may draw a die and place it in your Prep Area.',
    //CW dice
    '542T4Ant-Man|Tiny Regret|Teamwatch - Spin target opposing character down 1 level.',
    '551T4Baron Zemo|Citizen V|While Baron Zemo is active, your other [CWTB] dice get +1A.',
    '564A4Ms. Marvel|Amazing Hero|When fielded, if you have an active [AV] character die, you may spin Ms. Marvel up one level.',
    '561A4Loki|Angsty Asgardian|When fielded, if you have an active [AV] character die, this Loki die takes no damge this turn.',
    '522A1Ant-Man|Classic Avenger|While Ant-Man is active, when your opponent targets him with a character ability or Global Ability, you may spin him to level 1. If you do, ignore that ability and your opponent may not target Ant-Man with that ability again this turn.',
    '554A2Captain America|Classic Avenger|When fielded, you may spin up this Captain America die 1 level for each of your other active [AV] characters.',
    ];
    var dd_op2016 = [
    '551M4b0Mummy|Legendary Undead|Energy Drain|If Mummy\'s Energy Drain would try to spin down a level 1 character, KO it instead.',
    '574M1n0Gelatinous Cube|Legendary Ooze|When fielded, capture all opposing character dice that have a 0 fielding cost. If Gelatinous Cube is dealt damage, KO it. This capture ends when Gelatinous Cube leaves the Field Zone.',
    '563M4n0Half-Dragon|Legendary Humanoid|While Half-Dragon is active, your dragons may increase their Breath Weapon by 1.',
    '531M4b1Skeleton|Legendary Undead|Swarm',
    ];
    var dc_op2016_aff = {
    L:'9', J:'7', S:'WFS', 0:'0', V:'6', G:'DCGA',
    };
    var dc_op2016_dice = [ 'jl', 'wol', 'wf', 'jl', 'jl', 'wf', '', 'wf', 'wf', '', 'gaf', 'gaf', 'gaf', 'gaf' ];
    var dc_op2016 = [
    // JL dice (not WF)
    '544L1Lex Luthor|Legion of Doom|Lex Luthor gets +1A and +1D for each of your other different [DCLOD] characters.',
    // WoL dice (not WF)
    '541L2Scarecrow|Legion of Doom|While Scarecrow is active, you can\'t be attacked by characters with A of 2 or less.',
    // WF dice (not WoL)
    '574S4Supergirl|Crisis on Infinite Earths|Iron Will <em>(This character can\'t be KO\'d unless it was previously damaged this turn.)</em>|When fielded, KO target [DCV] die if you have no [DCV] character cards on your team.',
    // JL dice (not WoL)
    '572J1The Flash|Crisis on Infinite Earths|The Flash can\'t be blocked. The Flash may not have his A increased.',
    // JL dice
    '543J4Stargirl|DC Bombshell|Teamwatch - When you field a character who shares an affiliation with Stargirl, spin both of them up 1 level.',
    // WF dice
    '54204Lois Lane|DC Bombshell|Ally|While Lois Lane is active, Superman™ dice you control gain Overcrush.',
    // BAC
    '54003Thrown Car|Basic Action Card|Up to two character dice in your Field Zone get +1A and Overcrush until end of turn.',
    // WF dice
    '574V4Mr. Mxyzptlk|Golden Age of Superman™|While Mr. Mxyzptlk is active, the first time you field a [DCV] character die each turn, draw dice from your bag until you reveal a [DCV] die. Add that die to your Prep Area, return the rest to your bag.',
    // WF dice
    '574S4Bizarro|Golden Age of Superman™|Iron Will|While Bizarro is active, your opponent\'s [S] character dice have their A halved <em>(rounded up)</em>.',
    // BAC
    '53003Focus Power|Basic Action Card|Spin one target character die up or down one level.|*/** Instead, spin two target character dice up or down one level.',
    // GAF dice
    '56AG3Green Arrow™|Archery Advocate|When Green Arrow attacks, you may pay [B] to give him and target [DCA] character die Fast </em>(until end of turn)</em>.',
    // GAF dice
    '552G4Roy Harper™|Adolescent Archer|Fast|When Roy Harper attacks, you may pay [B] to give him +1A and -1D <em>(until end of turn).</em>.',
    // GAF dice
    '555V3Barry Allen™|Fastest Man Alive|Fast|[DCV] character dice with Fast deal no damage to Barry Allen dice.',
    // GAF dice
    '572V3Professor Zoom™|Thief|Fast|If you used Cosmic Treadmill this turn, you may pay [2] less to purchase Professor Zoom.',
    ];
    var asm_aff = {
    0:'0',X:'1',A:'2',V:'4',G:'G',Z:'D',F:'ASF',S:'ASS',M:'MK',T:'CWT',
    };
    var asm = [
    '051V4Carnage|Cletus Kassidy|While Carnage is active, when an opponent uses an action die, Carnage deals them 2 damage.',
    '051V4Carnage|Sinister|Overcrush|Carnage takes no more than 1 damage from action dice.',
    '061V4Carnage|Symbiote|When Carnage deals combat damage to an opponent, you may put his die on an action card.|It costs your opponent double to purchase that action die. Carnage\'s die may be removed by effects that remove action dice.',
    '024G4Drax|Arthur Douglas',
    '034G4Drax|The Destroyer|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> You may field Drax for free.',
    '034G4Drax|Pained|You may pay 1 life to field Drax for free.',
    '043F4Ghost Rider|Alejandra|When Ghost Rider is blocked, gain 1 life.',
    '043F4Ghost Rider|New Rider|When Ghost Rider is blocked, you may sacrifice Ghost Rider to deal 2 damage to target character die or player <em>(sacrificed characters go to the Used Pile)</em>.',
    '053F4Ghost Rider|Penance Stare|When Ghost Rider is blocked, you may sacrifice Ghost Rider to draw and roll a die. If it is a character face, field it for free; otherwise put it into the Used Pile <em>(sacrificed characters go to the Used Pile)</em>.',
    '054V4Kingpin|Empire Builder|When Kingpin takes damage, spin him up 1 level.',
    '054V4Kingpin|Payback|When Kingpin takes damage, he deals target opponent 1 damage.',
    '064V4Kingpin|Wilson Fisk|When Kingpin takes damage, move a Sidekick Die from your Used Pile to your Prep Area.',
    '041F4Silver Sable|Wild Pack|When Silver Sable is blocked, the defending player loses 1 life and you gain 1 life.',
    '041F4Silver Sable|Mercenary|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> Silver Sable is unblockable.',
    '051F4Silver Sable|Outlaw|When Silver Sable attacks, add a die from your bag to your Prep Area. If it is a Sidekick, Silver Sable is unblockable.',
    '033F4Spider-Man|Spectacular|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> Spider-Man gets +1A and +1D.',
    '043F4Spider-Man|Tangled Web|When Spider-Man attacks, he gets +2A until end of turn.|* Instead, all of your [SF] get +2A while attacking.|Global: Pay [B]. Target character die gains the [SF] affiliation this turn.',
    '053F4Spider-Man|"Public Menace!"|When KO\'d, gain 1 life.|* Instead, gain 2 life if you have another [SF] character fielded.|Global: Pay [B]. Target character die gains the [SF] affiliation this turn.  ',
    '032F4Spider-Woman|Secret Avenger|While blocked or blocking, you may pay [F] to give Spider-Woman +1A and +1D until end of turn.',
    '032F4Spider-Woman|Lady Liberator|Underdog -- <em>(You may use this eﬂect when your opponent has more character dice in their Field Zone than you do.)</em> Spider-Woman gets +2A.',
    '042F4Spider-Woman|Agent|When blocked or blocking, both Spider-Woman and the characters she is engaged with are KO\'d at the end of combat.',
    '022F4White Tiger|Hero for Hire',
    '032F4White Tiger|Mystical Amulet|When fielded, you may sacrifice another character to give this die +1A, +1D, and Overcrush until end of turn <em>(sacrificed characters go to the Used Pile)</em>.|Global: Pay [F]. Once during your turn, each player must field a Sidekick Die from their Used Pile if able.',
    '042F4White Tiger|Razor Sharp|When fielded, you may sacrifice another character to give this one +3A until end ofturn <em>(sacrificed characters go to the Used Pile)</em>.|Global: Pay [F]. Once during your turn, each player must field a Sidekick Die from their Used Pile if able.',
    '04003Archnemesis!|Basic Action Card|Target character die you control and target opposing character die deal damage to each other equal to their A.|Global: Pay [S]. Target character has D equal to its A until end of turn.',
    '04003Back for Seconds!|Basic Action Card|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> Field any character from your Used Pile at level 3.',
    '04003Betrayal|Basic Action Card|Deal 1 damage to target opponent for each character die in their Field Zone.|** If Betrayal dealt at least 2 damage, put this die in your Prep Area.',
    '03003Exposed!|Basic Action Card|Target opponent must pay 1 life for each non-[VM] assigned to block this turn.|Global: Pay [2B]. Target opponent must pay 1 life to block with one or more characters. You may only use this once per turn.',
    '05003Great Responsibility|Basic Action Card|Sacrifice a character to KO target opposing character <em>(sacrificed characters are placed in the Used Pile)</em>.',
    '02003Slander|Basic Action Card|Target opposing character loses its ability text until end of turn.|Global: Pay [F]. When a "When fielded" or "When this character attacks" ability damages you, deal 1 damage to target opponent.',
    '03003Spidey\'s Last Stand|Basic Action Card|Sacrifice a character to draw and roll 2 dice <em>(sacrificed characters are placed in the Used Pile)</em>.',
    '02003True Believer|Basic Action Card|Target character gets +2A and +1D until end of turn.|Global: Pay [2M]. Once during your turn, you may remove one of your characters from the Field Zone until end of turn.',
    '03003Web Blast|Basic Action Card|Deal 2 damage to target non-[SF] character die.|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> Instead KO target non-[SF] character die.',
    '03003With Great Power...|Basic Action Card|Spin all of your character dice up 1 level.|** Instead spin all of your character dice to level 3.',
    '152F4Agent Venom|Thunderbolt|When Agent Venom takes damage and isn\'t KO\'d, spin him up 1 level.|Global: Pay [1]. Target character die gets +1D.',
    '124F4Aunt May|Caring Aunt|Ally <em>(Aunt May counts as a Sidekick in the Field Zone)</em>|Aftershock - Spin 1 ofyour non-[VM] characters up 1 level or spin Spider-Man to level 3.',
    '131F4Black Cat|Felicia Hardy|After resolving combat damage, reroll any characters that blocked Black Cat.',
    '124A4Black Widow|Stinger|Aftershock - Deal 1 damage to target character die or player.',
    '152F4Blade|Vampire Hunter|When Blade deals combat damage to an opponent, gain 1 life.',
    '141X4Blink|Clarice|When Blink is blocked, you may pay [1] to remove her from combat.',
    '161V4Carnage|Insane|When you use an action die, Carnage gets +1A and Overcrush until end of turn.',
    '151F4Cloak|Tyrone Johnson|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> Cloak and Dagger get +2A and Overcrush.',
    '131F4Dagger|Tandy Bowen',
    '132F4Daredevil|Master Acrobat|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> Daredevil gets +2D.',
    '164S4Doctor Octopus|Sinister|Doctor Octopus can\'t be blocked by and takes no damage from [SF] characters.',
    '144G4Drax|Infinity Watch|You may field Drax for free. After your Roll and Reroll step, your opponent may pay 1 life to prevent this effect this turn.',
    '153S4Electro|Sinister',
    '143F4Firestar|M-Day Survivor|When fielded, you may pay [B] to deal 3 damage to target [VM] character.',
    '143F4Ghost Rider|Hellfire Manipulator|Aftershock - If Ghost Rider was blocked, she deals 1 damage to target opponent.',
    '15404Gladiator|Servant of the Empress|When Gladiator is blocked, he gets +1A and +1D per affiliation icon on his blockers.',
    '14404Goblin Glider|Goblin Tech|Search your bag for a [VM] character die and put it into your Prep Area.',
    '141V4Green Goblin|Evil Genius|You may pay 1 life to field Green Goblin for free. Any time you can use a Global Ability you may pay 1 life to spin Green Goblin up 1 level.',
    '123F4Gwen Stacy|Public Menace',
    '153V4Hobgoblin|Amoral Billionaire|While Hobgoblin is active, when your opponent uses a Global Ability, you may sacrifice a Sidekick to gain 2 life.',
    '17404Hulk|Planet Hulk|Aftershock - Both players sacrifice all of their Sidekicks.',
    '133F4Iceman|Amazing Friend|If Iceman takes damage during your opponent\'s turn, KO him.',
    '154F4Iron Spidey|Science Nerd',
    '174V4Kingpin|We Do Not Speak His Name|When Kingpin takes damage target player takes 2 damage. Target player can prevent this by sacrificing a character or paying [2] energy.',
    '153S4Kraven the Hunter|Dangerous|When fielded, Kraven deals 2 damage to each opposing [SF] character die.',
    '132V4Lizard|Dr. Curt Connors',
    '152F4Luke Cage|Hero for Hire|The first time Spider-Man would take damage each turn, you may have Luke Cage take that damage instead.',
    '131F4Mary Jane|Jackpot|Ally <em>(Mary Jane counts as a Sidekick in the Field Zone.)</em>|When fielded, target non-[VM] character can\'t be blocked by [VM] dice this turn.',
    '161S4Mysterio|Dr. Ludwig Rinehart|While Mysterio is active, when your opponent draws dice, you may pay [1] to draw a die and put it into your Prep Area.|Global: Pay [M]. Once during your turn, each player may draw a die and place it into their Prep Area.',
    '152V4Rhino|Big Brute|When fielded, deal 1 damage to target Sidekick. If your opponent has any [SF] character dice in the Field Zone, deal 1 damage to a 2nd target Sidekick.',
    '142S4Sandman|Million Little Pieces|Aftershock - You may pay [1] to reroll Sandman. If he lands on a character face, return him to the Field Zone.',
    '131F4Scarlet Spider|Ben',
    '141F4Silver Sable|Hero for Hire|You may sacrifice Silver Sable during your Main Step. If you do, target character die is unblockable this turn.',
    '143F4Spider-Girl|Mayday|Underdog - <em>(You may use this effect when your opponent has more character dice in their Field Zone than you do.)</em> When fielded, deal 3 damage to target opposing character die.',
    '143F4Spider-Man|Great Responsibility|Underdog - While Spider-Man is active, [SF] character dice cost you 1 less to purchase.|* Underdog - If Spider-Man is KO\'d during your opponent\'s turn, you may purchase a character die with the Ally ability for free.',
    '132F4Spider-Woman|Bio-Electric|Regenerate|If Spider-Woman uses Regenerate but rolls an energy face, she deals you 1 damage.',
    '132S4Vulture|Fear from Above|When fielded, deal 1 damage to target character die. If that die leaves the Field Zone this turn, Vulture gets +1A and +1D until end of turn.',
    '14304Web Shooters|A Spider\'s Best Friend|Ignore the text oftarget [F] or [M] character die until end of turn.|*/** Also deal 2 damage to that character die.',
    '132F4White Tiger|New Avenger|When you field a Sidekick, White Tiger gets +1A until end of turn.',
    '174X4Wolverine|Targeted|If another [XMEN] character die leaves the Field Zone, Wolverine gets +2A and +2D until end of turn.',
    '262F4Agent Venom|Eugene|Underdog - Agent Venom deals combat damage before opposing characters.',
    '224F4Aunt May|Independent|Ally <em>(Aunt May counts as a Sidekick in the Field Zone.)</em>|Aftershock - Put a non-[VM] character <em>(not Aunt May)</em> from your Prep Area into the Field Zone at level 1.',
    '241F4Black Cat|Probability Control|When fielded, reroll target opposing character die. If the result is not a character face, place that die in your opponent\'s Used Pile.',
    '234A4Black Widow|Stealthy|Aftershock - KO up to 2 target Sidekicks.',
    '262F4Blade|Daywalker|Underdog - When fielded, Blade deals 2 damage to target opponent and you gain 2 life.',
    '251X4Blink|Dimension Jumper|You may sacrifice Blink to cancel an action or character ability that targets one of your other characters.',
    '251F4Cloak|Secret Defender|Underdog - If Cloak or Dagger is blocked, prevent all damage to them until end of turn.',
    '241F4Dagger|Secret Defender|Underdog - Dagger may not be targeted by your opponent\'s action dice.',
    '242F4Daredevil|Radar Sense|Daredevil may block up to 2 attackers.',
    '274S4Doctor Octopus|8 Dangers|When Doctor Octopus attacks, up to 8 target character dice can\'t block. Your opponent may pay 2 life to prevent this effect <em>(they pay life when this die attacks but before you choose targets)</em>.',
    '263S4Electro|Supercharged|If Electro is KO\'d on an opponent\'s turn, he deals that opponent 1 damage. Move him to your Reserve Pool on a [B] face after your Clear and Draw Step next turn <em>(instead of rolling him as normal)</em>.',
    '243F4Firestar|New Warrior|When fielded, you may sacrifice Firestar to deal 3 damage to all [VM] dice.',
    '25404Gladiator|Kallark|When Gladiator is blocked or blocking he gets +2A per affiliation on the character he is blocking or blocked by.',
    '24404Goblin Glider|High Flying|Search your bag for a [VM] die and field it at level 1. Sacrifice it at end of turn.|** If that die is Green Goblin, don\'t sacrifice it.',
    '231V4Green Goblin|Goblin Grandmaster|You may sacrifice another fielded character to field Green Goblin for free or spin him up 1 level.',
    '233F4Gwen Stacy|Earth-65|Underdog - When fielded, the next [SF] character die you field this turn is free.',
    '243V4Hobgoblin|Evil Legacy|While Hobgoblin is active, when an opponent activates a Global Ability, you may spin Hobgoblin up a level.',
    '27404Hulk|Back from Outer Space|Aftershock - Each player must sacrifice another character <em>(if able)</em>.',
    '243F4Iceman|Chilling|If Iceman takes damage on an opponent\'s turn, both players take 1 damage.',
    '264F4Iron Spidey|Invincible|Iron Spidey takes no combat damage from level 1 characters.',
    '253S4Kraven the Hunter|Sergei Kravenoff|When fielded, you may sacrifice a character die to give Kraven +3A until end of turn.',
    '232V4Lizard|Sewer Dweller|While Lizard is active, when any character die leaves the Field Zone during your turn, target character die can\'t block Lizard this turn.',
    '262F4Luke Cage|Power Man|While Luke Cage is active, when your opponent uses a Global Ability, you may spin a [SF] character die up a level.',
    '231F4Mary Jane|First Aid|Ally <em>(Mary Jane counts as a Sidekick in the Field Zone.)</em>|When fielded, gain 1 life ifyou have any level 2 or higher non-[VM] character dice in the Field Zone.',
    '271S4Mysterio|Quentin Beck|While Mysterio is active, when an opponent draws dice, they KO target Sidekick in their Field Zone.',
    '252V4Rhino|Persistent Vengeance|When fielded, you may KO target Sidekick. Send it to the Used Pile. If your opponent\'s Spider-Man is active, you may do this twice instead.',
    '252S4Sandman|Sandy|Aftershock - You may pay [1] to reroll Sandman. If he lands on an energy face, deal 3 damage to target non-[VM] character.',
    '241F4Scarlet Spider|The Spectacular|Underdog - When fielded, ignore target character\'s text this turn.',
    '243F4Spider-Girl|Webslinger|Underdog - When fielded, gain 1 life and deal 1 damage to target player.',
    '242S4Vulture|Adrian Toomes|When Vulture blocks, deal 1 damage to each attacking character die. When any character die leaves the Field Zone, Vulture gets +4A until end of turn.',
    '24304Web Shooters|Stinging Web|Ignore the text of target [B] or [S] character die until end of turn.|*/** Also that Character die gets -2A.',
    '264X4Wolverine|Regenerative|If another [XMEN] character die leaves the Field Zone, ignore all damage dealt to Wolverine until end of turn.',
    '362F4Agent Venom|Flash Thompson|When Agent Venom takes damage but is not KO\'d, you may field a Sidekick from your Used Pile or Prep Area.|Global: Pay [1]. Target character gets +1D.',
    '334F4Aunt May|Fresh Cookies|Ally <em>(Aunt May counts as a Sidekick in the Field Zone.)</em>|Aftershock - Put a [SF] character <em>(not Aunt May)</em> from your Prep Area into the Field Zone at level 2.',
    '334A4Black Widow|Professional|Aftershock - Draw and roll a die. If the result is an energy face, lose 1 life and return Black Widow to the Field Zone at her former level. Add the rolled die to your Prep Area.',
    '362F4Blade|Vengeful|When Blade attacks, target character gets -2A and Blade gets +2A until end of turn <em>(even if that character only has 1A)</em>.',
    '351X4Blink|Exile|While Blink is active, once per turn, you may spend [2M] whenever you can use a Global Ability to send an action die in the Field Zone to the Used Pile.',
    '351F4Cloak|Darkforce Dimension|When Cloak is targeted by an action die or character ability, you may have it also target Dagger.',
    '351F4Dagger|Light Daggers|Underdog - Dagger may not be targeted by your opponents.',
    '342F4Daredevil|Fearless|Underdog - Characters blocking or blocked by Daredevil get -2A.',
    '374S4Doctor Octopus|Otto|While Doctor Octopus is active, all character dice gain Aftershock - the player who has an active Doctor Octopus may move an action die from their Used Pile to their Prep Area.',
    '363S4Electro|Massive Discharge|If another character you control is KO\'d during the Attack Step, you may spend any number of [B]. For each that you do, deal 1 damage to target opposing character.',
    '353F4Firestar|Amazing Friend|When Firestar takes damage, deal 1 damage to target character or player.',
    '36404Gladiator|Strontian|Gladiator can block up to 2 attackers. When Gladiator is blocked or blocking he gets +2D per affiliation on the character he is blocking or blocked by.',
    '35404Goblin Glider|Borrowed Transportation|Search your bag for a [VM] die and field it at level 1. Each player takes 2 damage and sacrifices a character die at end of turn.',
    '341V4Green Goblin|Goblin Legacy|You may deal 1 damage to each player to field Green Goblin for free.',
    '333F4Gwen Stacy|The Amazing Spider-Gwen|Field Gwen Stacy for free if you have an active [SF] character die.',
    '353V4Hobgoblin|Mad Fashion Designer|Once per turn while Hobgoblin is active, when your opponent pays for a Global Ability, you may pay [2B] to cancel it.',
    '353F4Iceman|Cool Dude|If Iceman takes any damage on an opponent\'s turn, both players must pay [1] or sacrifice a character.',
    '373S4Kraven the Hunter|Proud Hunter|When fielded, target player must sacrifice one of their characters. If it is Spider-Man, they take damage equal to his fielding cost.',
    '342V4Lizard|Scientist|While Lizard is active, when any character die leaves the Field Zone, he gets +2D until end of turn.',
    '362F4Luke Cage|Thick Skin|Underdog - When fielded, search your bag for a Spider-Man die and field it at level 1.',
    '321F4Mary Jane|MJ|Ally <em>(Mary Jane counts as a Sidekick in the Field Zone.)</em>|When fielded, target non-[VM] character you control gains Overcrush this turn. If you targeted Spider-Man, he also gets +1A.',
    '361S4Mysterio|Francis Klum|When an opponent draws dice, you may sacrifice one of your Sidekicks to move a character die from your Used Pile to your Prep Area.',
    '362V4Rhino|Uncommon Thug|When fielded, sacrifice another character die to KO all Sidekicks in play. If your opponent\'s Spider-Man is active, your Sidekicks aren\'t KO\'d.',
    '352S4Sandman|Shifting|Aftershock - You may pay [1] to use Regenerate. If Sandman regenerates successfully, spin him to level 3.',
    '351F4Scarlet Spider|Webslinger|Underdog - When fielded, ignore target character die\'s card text this turn. If that character would be KO\'d this turn, it goes to the Used Pile.',
    '342S4Vulture|Genius Engineer|When a character die leaves the Field Zone, you may pay [4] to purchase a Vulture die and put it into your bag.',
    '35304Web Shooters|Webbing All Over|Ignore the text of target fielded character die until end of turn.|*/** Also that character die can\'t block this turn.',
    '374X4Wolverine|Weapon Plus|When one or more [XMEN] character dice leave the Field Zone, you may sacrifice Wolverine to return those characters to the Field Zone.',
    '451F4Black Cat|Party Hardy|Underdog - When fielded, target opponent must reroll all of their fielded characters.',
    '48404Hulk|Warbound|Aftershock - All players move all dice from their Prep Area to their Used Pile.',
    '464F4Iron Spidey|Armored Arachnid|Iron Spidey takes no combat damage. Any time your opponent can use a Global Ability, they may pay [2] to ignore this.',
    '433F4Spider-Girl|May Parker|Underdog - When fielded, deal 1 damage to target opponent.',
    '434Z1Green Goblin@Z|Rotting Goblin|When fielded, KO all non-[ZO] Green Goblin dice and deal 1 damage to all opponents for each Sidekick in their Field Zone. When Spider-Man would be KO\'d, send him to the Used Pile instead.',
    '463Z1Kingpin@Z|Cerebral Crime Boss|When fielded, KO all non-[ZO] Kingpin dice. While [ZO] Kingpin is active, your Sidekicks can\'t be blocked by Sidekicks and Spider-Man costs [2] extra to field.',
    '472Z1Morbius@Z|Unliving Vampire|When fielded, KO all non-[ZO] Morbius dice. While [ZO] Morbius is active, any [VM] characters with purchase cost 6 or more costs [2] less to purchase and Spider-Man can\'t block.',
    '461Z1Venom@Z|Staggering Symbiote|When fielded, KO all non-[ZO] Venom dice. When [ZO] Venom attacks, you may pay [1] to force target character to block. Spider-Man must block [ZO] Venom if able.',
    ];
    var aou_op = [
    '59241Ultron|Nanite Virus|When fielded, you may KO an opposing non-[VM] character. If you do, you may purchase an Ultron Drone for free.',
    '57304Nova|Nova Prime|If more than 3 of your characters take damage during an opponent\'s turn, Nova takes no damage this turn.',
    '5A144Thanos|Gauntlet Wielder|If this is the first die assigned to attack this turn, you may immediately use each of the Basic Action Dice abilities, without bursts, as if you had rolled those dice.',
    '52204Iron Fist|The Immortal|While Iron Fist is active, reduce damage from opposing character\'s abilities by 1. When Iron Fist is KO\'d, you may move a [F] die with purchase cost 5 or more from your Used Pile to your Prep Area.',
    ];
    var wol_aff = {
    0:'0',1:'WT',2:'WB',3:'WG',4:'WI',5:'WR',6:'WP',7:'WY',8:'WVO',9:'WKV',A:'WVY',B:'WPV',C:'WVR',D:'WGC',E:'WYC',F:'WC'
    };
    var wol_op = [
    '53412Robin|Teen Titans Team Leader|While Robin is active, if you have a Teen Titans die on an energy face in your Reserve Pool during your Main Step, you may spin down a Teen Titans die to spin up a Teen Titans die.|Global: Pay [S]. Once per turn, if you have purchased a character die this turn you may draw a die from you bag and add it to your Prep Area.',
    '54314Starfire|Powerful Friend|When fielded, KO target [DCV] if you have at least 3 active [WT]. That [DCV] can\'t use Regenerate.',
    '53304Batmobile|From Wayne Enterprises|You may purchase or field a die with Batman™ in its card name or subtitle for 2 less than normal.|** Batman or Robin instead. (Purchase costs may not be reduced below 1)|Global: Pay [S]. Your Batman dice get +1D this turn.',
    ];
    var wol = [
    '062A4Anti-Monitor|Enemy of the Multiverse|When Anti-Monitor attacks, KO all Sidekicks, including yours.',
    '062A4Anti-Monitor|Symbol of Fear|When Anti-Monitor attacks, all opposing [WLG] and [WLB] character dice must block him <em>(if able)</em>.',
    '072A4Anti-Monitor|Universal Destruction|When Anti-Monitor is fielded, you may KO a [WLG] or [WLB] character die. If you do, move a [DCV] die from your Used Pile to your Prep Area.',
    '04174Batman™|Bruce Wayne of Earth|If you used a Basic Action Die this turn, Batman cannot be blocked.|Global: Use [1]. The first time you play a Basic Action this turn, draw one die and add it to your Prep Area.',
    '04174Batman™|Cowardly and Superstitious Lot|While Batman is active, he deals 1 damage to your opponent when any player uses a Basic Action Die.|Global: Use [1]. The first time you play a Basic Action this turn, draw one die and add it to your Prep Area.',
    '04174Batman™|Instill Great Fear|When Batman attacks, you may move a Basic Action Die from your Used Pile to your Prep Area.|Global: Use [1]. The first time you play a Basic Action this turn, draw one die and add it to your Prep Area.',
    '02254Guy Gardner|Blinding Rage|Guy Gardner must attack each turn <em>(if able)</em> and gets +1A for each other attacking die.',
    '02254Guy Gardner|Seeing Red|',
    '03254Guy Gardner|Warrior\'s Spirit|When Guy Gardner is blocked, draw one die and place it in your Prep Area.',
    '05134Hal Jordan|Green Lantern|At the beginning of your turn, choose a [WL] color. Hal Jordan gains that [WL] color until the beginning of your next turn.|Global: Pay [B]. Once per turn, you may spin a [DCV] up or down one level.',
    '06134Hal Jordan|Highball|While Hal Jordan is active, if you have three or more [B] in your Reserve Pool at the end of your Roll and Reroll Step, deal 1 damage to target [DCV] die for each [B] you rolled.',
    '05134Hal Jordan|Test Pilot|Hal Jordan gets +1A for each other active [WLG] and [WLB] character in the Field Zone <em>(yours or your opponents)</em>.',
    '04444John Stewart|Architect|While John Stewart is active, whenever your opponent fields a [DCV] character die, gain 1 life for each [DCV] die they have fielded.',
    '04444John Stewart|Indigo Tribe|John Stewart gets +1A and +1D for each of your opponent\'s fielded [DCV] character dice.',
    '05444John Stewart|Compassionate|When fielded, draw two dice. Place any [WL] dice into your Prep Area and all other dice into your Used Pile.',
    '03324Kyle Rayner|Artist|Kyle Rayner gets +2A and +2D if there is an active [WLG]. If there are 3 more active [WLG], he gets +5A and +5D instead. <em>(Count yours and your opponents.)</em>',
    '03324Kyle Rayner|Dreamer|When fielded, choose a [WL] color. Characters who have that affiliation cannot block this turn.',
    '04324Kyle Rayner|Look To The Stars|When fielded, deal damage to target character equal to this character\'s level. Deal an extra damage if a [WLG] is active <em>(yours or your opponent\'s)</em>.',
    '03484Lex Luthor|Greed|While Lex Luthor is active, if you have more life than your opponent at the beginning of your turn, you may draw an additional die.',
    '03484Lex Luthor|Legitimate Businessman|When fielded, gain 2 life if you have the highest purchase cost die fielded.',
    '02484Lex Luthor|Xenophobe|',
    '044A4Sinestro|Corps Namesake|Sinestro cannot be blocked unless the defending player pays [1] per blocking character die.',
    '054A4Sinestro|Greatest Lantern of them All|If Sinestro is KO\'d, your opponent must KO one of their characters with a [WL] <em>(if able)</em>.',
    '054A4Sinestro|Thaal Sinestro of Korugar|While Sinestro is active, at the beginning of your turn, if no [WL] characters except [WLY] characters are active, Sinestro deals target opponent 2 damage.',
    '03003Big Entrance|Basic Action Card|When purchased, you may add this die to your dice bag. When used, dice purchased this turn cost 1 less than their printed cost <em>(minimum 1)</em>, and may be put directly into your dice bag instead of your Used Pile. <em>(No matter how many Big Entrance Dice are used.)</em>',
    '04003Enormous Destruction|Basic Action Card|Choose a purchase cost. Reroll all fielded character dice with that purchase cost. Move all rolled energy faces to their owner\'s Prep Area.',
    '03003Heroic Defense|Basic Action Card|Your characters get +1A and +1D. For each of your character dice KO\'d this turn, gain life equal to that die\'s level.',
    '03003Lethal Force|Basic Action Card|Deal 1 damage to target character die for each of your active characters.|*/** Also deal 1 damage to target opponent.|Global: Pay [2B]. Deal target character 1 damage.',
    '04003Monument to Evil|Basic Action Card|Deal 2 damage to target opponent.|** Instead, deal 1 damage to target opponent for each of your active [DCV] characters.|Global: Pay [M][F]. Target character gains the Villain affiliation until the end of the turn.',
    '04003Relaxing|Basic Action Card|Draw a die from your bag. Name a die. Draw a second die. If the second die was the die you named, keep it and draw a third die. Otherwise, move the second die to your Used Pile.|** Keep the second drawn die if named incorrectly.',
    '03003Stealth Ops|Basic Action Card|Target character die is considered to be level 1 and is unblockable this turn.|Global: Pay [2M]. Spin target character die down 1 level.',
    '03003Vicious Struggle|Basic Action Card|Until your next turn, deal your opponent 1 damage for each damage you take that doesn\'t come from Vicious Struggle.',
    '02003Fighting|Basic Action Card|For each of your character dice KO\'d during the Attack Step this turn, your opponent must KO one of their character dice.',
    '04003You\'ve Been Chosen|Basic Action Card|Play only during your Main Step. Choose an energy type. All characters of that type must attack during their next Attack Step, and deal no combat damage. If these characters are unblocked, return them to the Field Zone instead of the Used Pile.',
    '162A4Anti-Monitor|Warp Reality|When Anti-Monitor attacks, deal 1 damage to target opponent for each Sidekick they control. Anti-Monitor can\'t be blocked by Sidekicks.',
    '14244Atom|Dr. Ray Palmer|At the beginning and end of your turn, you may spin up or down Atom. Atom cannot be dealt combat damage by higher level character dice.',
    '163C4Atrocitus|Atros of Ryut|When Atrocitus attacks, KO a target [S] character.',
    '16174Batman™|Fear as a Weapon|If you roll a [2] face during your Roll and Reroll Step, Batman gets +2A and +2D for each.|Global: Use [1]. The first time you play a Basic Action this turn, draw one die and add it to your Prep Area.',
    '13214Beast Boy|Gar|While you have [F] in your Reserve Pool, Beast Boy gets +2A and +2D <em>(excluding [Q])</em>.',
    '133C4Bleez|Victim|',
    '12164Carol Ferris|Star Sapphire|When fielded, capture a [WLG]. Return it at end of turn.',
    '12254Dex-Starr|Dexter of Earth|',
    '133B4Fatality|Yrra Cynril|When fielded, deal 1 damage to target character for each different color [WL] in play.',
    '15224The Flash|Barry Allen of Earth|When fielded, if you have a [WLG] active, The Flash can\'t be blocked by less than three character dice this turn.',
    '13254Guy Gardner|Heated|Guy Gardner also counts as [WLG]. Guy Gardner gets +5A and +5D when engaged with a [WLK] character die.',
    '14134Hal Jordan|Fearless|When fielded, deal damage equal to Hal Jordan\'s attack to target [DCV] die.',
    '14444Indigo-1|Iroque|While Munk is active, Indigo-1 gets +2A and +2D.',
    '13334Jade|Jennifer-Lynn Hayden|When Jade is KO\'d, draw a die and add it to your Prep Area.',
    '15444John Stewart|Marine|When fielded, KO a [WLK] of equal or lower level.',
    '15234Kilowog|Drill Instructor|Kilowog gets +1A for each opposing [M] character die in the Field Zone.',
    '14324Kyle Rayner|Hopeful Will|While Kyle Rayner is active, your [WL] characters cost 1 less to purchase for each active [WL] of the same color <em>(to a minimum of 1)</em>.',
    '141D4Lantern Battery|Speak The Oath|Continuous: For each energy in your Reserve Pool, prevent 1 damage from each character with that energy type each turn. <em>(For example, with two [M] in your Reserve Pool, three unblocked [M] character dice with 2 A would deal 0 damage.)</em>',
    '133D4Lantern Ring|Not Just Jewelry|Continuous: While Lantern Ring is active, all of your [WLG] and [WLB] character dice get +1A and +1D.',
    '17184Larfleeze|Avarice|When Larfleeze would attack, you may change a Sidekick\'s A and D to match Larfleeze\'s. If you do, Larfleeze can\'t attack this turn.',
    '14484Lex Luthor|Egomaniac|When fielded, draw a die for each of your active [DCV] characters. Roll one and put the others in your bag or Used Pile.',
    '121A4Lyssa Drak|Keeper of the Book of Parallax|While Lyssa Drak is active, at the start of your Attack Step, name a character. If at least one of those character dice blocks, you may move two dice from your opponent\'s Used Pile to their bag.',
    '13154Mera|Queen of Atlantis|If there are three or more different color [WL] characters in play, reduce all damage done to Mera by 2.|Global: Pay [M]. If a character would deal you 5 or more combat damage, it instead deals you 2 combat damage.',
    '12364Miri Riam|Beacon In The Dark|When fielded, move a character die from your Used Pile with purchase cost less than or equal to the number of different [WL] colors you control to the Field Zone at level 1.',
    '16434Mogo|Living Planet|When fielded, move all [WLG] and [WLB] dice from your Used Pile to your Prep Area.',
    '142A4Mongul|Usurper of the Corps|',
    '12444Munk|Empath|While Indigo-1 is active, Munk gets +2A and +2D.',
    '161A4Parallax|Source of Terror|While Parallax is active, if you roll at least three [M] symbols <em>(excluding [Q])</em>, draw and roll two dice at the end of the Roll and Reroll Step.|Global: Use [1]. Reroll any number of your dice before your Attack Step.',
    '154A4Ranx|Sentient City|Ranx may block up to two attackers.',
    '13114Raven|Rachel Roth|While Raven is active, if another [WT] character die is KO\'d, you may reroll that die. If it is a character face, return it to play. <em>(This doesn\'t count as fielding that die)</em>.',
    '12224Saint Walker|Bro\'Dee Walker of Astonia|Saint Walker can\'t attack or block unless a [WLG] is active.',
    '131A4Scarecrow|Dr. Jonathan Crane|When fielded, choose a [WL] color, replacing all previous choices. Characters with that [WL] cost 1 more to field while Scarecrow is active. <em>(Doesn\'t replace your opponents choices.)</em>',
    '164A4Sinestro|Fears Made Into Light|While Sinestro is active, when [WLY] attack or block, they get +2A and +2D until end of turn.',
    '163C4Spectre|Divine Retribution|When fielded, each player chooses and KO\'s one of their character dice.|Global: Pay [B]. Deal 1 damage to target Sidekick.',
    '14314Starfire|Princess of Tamaran|When fielded, deal 1 damage to target opponent for each of your active [WT].',
    '164A4Superboy Prime|Clark Kent of Earth Prime|When Superboy Prime attacks, KO target [B] character die.',
    '16454Supergirl|Angry Alien|Overcrush',
    '13224Warth|Peace Be With You|Warth cannot attack or block unless Saint Walker is active.',
    '12414Wonder Girl|Cassie Sandsmark|While Wonder Girl is active, when a [WT] character die is targeted, you may choose an opponent\'s character die as the new target for that effect.',
    '14464Wonder Woman|Loved By the Gods|While Wonder Woman is active, if you roll three or more [S], <em>(excluding [Q])</em>, your Sidekicks are unblockable this turn.',
    '24244Atom|Great Compassion|At the beginning and end of your turn, you may level up or down Atom. Atom cannot be affected by abilities of higher level characters.',
    '263C4Atrocitus|Raging Vengence|While Atrocitus is active, when [S] characters are KO\'d, they go to the Used Pile.',
    '23214Beast Boy|Changeling|While you have [M] in your Reserve Pool, Beast Boy cannot be blocked by character dice of higher level <em>(excluding [Q])</em>.',
    '243C4Bleez|Winged Fury|When purchased, if you have a [B] in your Reserve Pool, put this die in your bag instead of the Used Pile <em>(excluding [Q])</em>.',
    '22164Carol Ferris|Link Between Hearts|Carol Ferris cannot be damaged by [WLG] or [WLB] characters in combat.',
    '23254Dex-Starr|Rage Kitty|Dex-Starr gets +1A when attacking for each [WL] color in play besides [WLR].',
    '233B4Fatality|Bounty Hunter|When fielded, deal 3 damage to target player if you have three or more [B] symbols in your Reserve Pool <em>(excluding [Q])</em>.',
    '23224The Flash|A Promise of Hope|The Flash cannot attack or block unless you have an active [WLG].',
    '24444Indigo-1|Merciful Leader|Indigo-1 cannot be damaged by [WLY] characters.',
    '24334Jade|Daughter of the Golden Age|While Jade is active, whenever a [WLG] character attacks, draw a die and add it to your Prep Area. <em>(One for each character, not each die.)</em>',
    '25234Kilowog|Brute Force|While Kilowog is active, [F] characters cannot be blocked by [M] characters.',
    '251E4Lantern Battery|Recharge|Continuous: If there are three or more [WL] colors active, you may pay [F] to send this die to the Used Pile and put a fielded [WL] character die in the Used Pile.|** only two colors are needed.',
    '233E4Lantern Ring|Power Ring|Continuous: While Lantern Ring is active, all [WLY], [WLR], and [WLK] lantern characters get +1A and +1D.',
    '26184Larfleeze|One-of-a-Kind|When Larfleeze attacks, you may swap one of your Sidekicks in the Field Zone with a character in your Used Pile <em>(field it at level 2)</em>.',
    '231A4Lyssa Drak|Future Sight|While Lyssa Drak is active, at the beginning of your opponent\'s turn, name a character. Your opponent must pay 2 life to field that character die.',
    '23154Mera|Mournful Rage|When Mera is active and you field a [WL] character, if that [WL] color isn\'t already in play, gain 1 life.|Global: Pay [M]. If a character would deal you 5 or more combat damage, it instead deals you 2 combat damage.',
    '24364Miri Riam|Unextinguished Devotion|When fielded, deal 1 damage to target character for each [WL] color you control.',
    '26434Mogo|Planet-Sized Will|When fielded, you may purchase a [WL] for half cost <em>(round down)</em>.',
    '252A4Mongul|Black Mercy|When Mongul attacks, spin down target opposing character die.',
    '23444Munk|Compassionate Protector|This character takes no damage during the Attack Step if Indigo-1 is active.',
    '271A4Parallax|Shattered Will|When fielded, you may take control of an opposing [WL] character die until end of turn. That character die must attack this turn. Return it to your opponent\'s Field Zone at end of turn.',
    '254A4Ranx|Malevolent Metropolis|Ranx may block any number of [B] attackers.',
    '24114Raven|Trigon\'s Heir|When another character is KO\'d, you may KO Raven. If you do, return the other character die to play. <em>(This doesn\'t count as fielding that die)</em>.',
    '23224Saint Walker|Hopeful Hero|Saint Walker can\'t attack or block unless a [WLG] is active. Saint Walker gets +4A when engaged with at least one [DCV].',
    '241A4Scarecrow|Fear Gas|When fielded, choose a [WL] color. While Scarecrow is active, when a die of that color is put into a player\'s Used Pile, Scarecrow deals 1 damage to that player.',
    '263C4Spectre|Blinded By Sin|While Spectre is active, all character dice except Spectre must attack each turn.',
    '25314Starfire|Outlaw|While Starfire is active, whenever another [WT] is fielded, deal damage to target opponent equal to that die\'s fielding cost.',
    '264A4Superboy Prime|Shattered Reality|While Superboy Prime is active, when [B] characters are KO\'d, they go to the Used Pile.',
    '26454Supergirl|Enraged|While Supergirl is active, your Sidekicks get +1A and +2D.',
    '23224Warth|Brother|At the end of each turn, if you have no other active [WL] dice, KO Warth and draw an extra die to your Prep Area.',
    '23414Wonder Girl|Silent Armor|While Wonder Girl is active, prevent the first damage from each source to your level 1 characters.|* Prevent the first 2 damage from each source instead.',
    '25464Wonder Woman|Aphrodite\'s Emissary|When Wonder Woman is KO\'d, pay any number of [S]. Deal 1 damage to target player for each [S] you paid.',
    '34244Atom|Professor of Physics|At the beginning and end of your turn, you may level up or down Atom. When blocking or blocked by a character of higher level, you may spin Atom up to level 3 or remove him from combat.',
    '373C4Atrocitus|Bloody Leader|When fielded, KO up to two target [S] characters or KO all [WC] in play <em>(yours and your opponents)</em>.',
    '34214Beast Boy|Animal Magnetism|When Beast Boy attacks or blocks, roll all Sidekick dice in your Used Pile. For each [Q] or [F] rolled, Beast Boy gets +1A and +1D. <em>(Those dice stay in the Used Pile.)</em>',
    '343C4Bleez|Controlled Rage|When fielded, cancel an action die and move it to the Used Pile.',
    '32164Carol Ferris|True Love|If Carol Ferris is KO\'d, and you have a [WLG] character in play, return her to the Field Zone at end of turn. <em>(At the same level she was KO\'d.)</em>',
    '33254Dex-Starr|"I good kitty."|Dex-Starr gets +1A the turn he is fielded. When Dex-Starr attacks, [WLR] get +1A until end of turn.',
    '343B4Fatality|Forgiving Heart|When Fatality is engaged with a character of higher level, double her A and D.',
    '34224The Flash|Believe In The Impossible|If you have an active [WLG], when The Flash attacks, target opposing character die cannot block this turn.',
    '34444Indigo-1|"Nok!"|When Indigo-1 blocks, you may move an [WLI] character from your Used Pile or Prep Area to play at level 1.',
    '34334Jade|Empowered by the Starheart|While Jade is active, the first time each turn a [B] character is damaged, draw a die and add it to your Prep Area.',
    '36234Kilowog|Poozer|While Kilowog is active, [M] characters cannot attack the turn they are fielded.',
    '343D4Lantern Ring|Limited Only By Imagination|Continuous: While active, when your characters attack, they deal 1 damage to target player for each energy symbol in your Reserve Pool that matches their type.',
    '36184Larfleeze|MINE!|When fielded, you may KO a [WC] or action and send it to the Used Pile.',
    '331A4Lyssa Drak|Fear of the Unknown|When Lyssa Drak attacks, you may draw a die from your opponent\'s bag and swap it with a die from the Used Pile or return it to the bag.',
    '34154Mera|Furious Fatale|While Mera is active, your [WL] characters cost 1 less to buy if you have three or more active [WL] colors.',
    '33364Miri Riam|Capable of Great Love|While Miri Riam is active, at the beginning of your turn, if you control more [WL] colors than your opponent, spin a character die up or down.',
    '37434Mogo|Doesn\'t Socialize|When fielded, KO all [WLK] characters.|* Put one of the KO\'d characters into the Used Pile.',
    '352A4Mongul|Ruler of Warworld|Mongul cannot be blocked by level 1 characters.',
    '33444Munk|New Guardian|When fielded, you may move another [WLI] character from your Used Pile to your Prep Area.',
    '364A4Ranx|Blot Out the Stars|While Ranx is active, when you attack, you may swap an opposing blocking character with an opposing character that did not block before damage is dealt.',
    '34114Raven|Azarath, Metrion, Zinthos!|While Raven is active, your [M] and [WT] characters cannot be targeted by your opponents.',
    '35224Saint Walker|"All Will Be Well."|Saint Walker gets +2A and +2D if a [WLG] is active and an additional +1A and +1D if another [WL] is active. <em>(He doesn\'t count himself)</em>.',
    '341A4Scarecrow|Hallucinogenic Phobias|When Scarecrow is fielded, choose an opposing non-[DCV] character die and roll it. If it is not a character face, KO it and any copies of the same die.',
    '363C4Spectre|Celestial Frenzy|While Spectre is active, [WLR] and [WLK] characters cost 2 less to purchase <em>(to a minimum of 1)</em>.',
    '374A4Superboy Prime|Troublesome|When fielded, KO up to two target [B] characters.',
    '37454Supergirl|Last Daughter of Krypton|When Supergirl attacks, all opposing characters must block <em>(if able)</em>.',
    '34224Warth|Hope Burns Bright|When fielded, you may use the "when fielded" effect of one of your active characters.',
    '33414Wonder Girl|Barbed Lasso|While Wonder Girl is active, the first time each turn a Sidekick is KO\'d by an opponent, deal 1 damage to your opponent.|* Deal 2 damage instead.',
    '441F4Lantern Battery|Power Source|Continuous: While active, your opponent must pay 1 life per character to block. <em>(No matter how many Lantern Battery Dice you have in the Field Zone.)</em>',
    '461A4Parallax|Fear|While Parallax is active, once per turn, if you have at least one of each type of energy in your Reserve Pool <em>(excluding [Q])</em>, you may purchase an action die for [1] and add it to your Prep Area.|Global: Use [1]. Reroll any number of your dice before your Attack Step.',
    '44314Starfire|Koriand\'r|When Starfire attacks, deal 1 damage to the defending player for each other active [WT].',
    '45464Wonder Woman|Princess Diana of Earth|While Wonder Woman is active, you may redirect X damage from each source from you to her, where X is the number of [S] in your Reserve Pool <em>(ignoring [Q])</em>.',
    '47391Black Lantern Aquaman|From the Depths|When fielded, KO all Aquaman Dice. At the beginning of each turn, the active player must move a non-[WLK] character die from the Used Pile back to its card.',
    '47191Black Lantern Batman™|Blackest Knight|When fielded, KO all Batman Dice. Whenever a player purchases a non-[WLK] die, that player loses 1 life.|Global: Once per turn, after your reroll, if you have at least one of each energy type in your Reserve Pool, gain [1] energy.',
    '47291Black Lantern Superman™|Krypton\'s Fall|When fielded, KO all Superman Dice. At the beginning of each turn, each player loses life equal to the highest level of a die they control.|Global: Once per turn, after your reroll, if you have at least one of each energy type in your Reserve Pool, gain [1] energy.',
    '47491Black Lantern Wonder Woman|Undead Warrior|When fielded, KO all Wonder Woman Dice. At the beginning of each player\'s turn, that player chooses a fielded non-[WLK] character and moves it to the Used Pile. If they cannot, they lose 2 life.',
    ];
    var aou = [
    '02124Black Widow|Natasha|Black Widow can\'t be blocked unless your opponent spins down one of their character dice.',
    '02124Black Widow|Spy|Teamwatch - When you field a character who shares an affiliation with Black Widow, Black Widow can\'t be blocked by only one character this turn.',
    '03124Black Widow|Cold Warrior|Black Widow can only be blocked by Sidekicks.',
    '04224Captain America|Super Soldier|While active, prevent all but 1 damage to you from any action or character abilities.',
    '04224Captain America|The First Avenger|While active, whenever you take non-combat damage, spin this character up one level.|* Also gain 1 life.',
    '05224Captain America|Man Out of Time|While active, each time you take non-combat damage, deal 1 damage to opponent.',
    '02124Hawkeye|Formerly Ronin|When fielded, opponent gains 2 life.',
    '03124Hawkeye|Clint|Teamwatch - When you field a character who shares an affiliation with Hawkeye, deal 1 damage to an opposing character.',
    '03124Hawkeye|Trick Shot|When this character attacks, choose an enemy character who must either block Hawkeye or take 2 damage (opponent\'s choice).',
    '05424Hulk|Smash!|Hulk can only attack alone.',
    '06424Hulk|Bruce Banner|Teamwatch - When you field a character who shares an affiliation with Hulk, Hulk gains Overcrush until end of turn.',
    '07424Hulk|Big Green Bruiser|Overcrush.|If Hulk attacks and is not blocked, spin him down one level instead of moving him to the used pile (if able).',
    '03324Iron Man|Big Man|',
    '04324Iron Man|Genius|Teamwatch - When you field a character who shares an affiliation with Iron Man, Iron Man gets +1A until end of turn.',
    '04324Iron Man|Invincible|When Iron Man attacks, you may pay a [B] to give him +2A until end of turn.|* He gains +3A instead.',
    '05424Thor|Not Who You Expected?|',
    '06424Thor|Goddess of Thunder|Every time Thor takes damage, reduce that damage by 1.',
    '06424Thor|Worthy|Thor can\'t be targeted by opposing Action dice that would target one character.',
    '05244Ultron|Bringing Order|When fielded, capture an opposing character die with a fielding cost 0 (return it at end of turn).',
    '05244Ultron|Peacekeeper Gone Wrong|When Ultron is blocked, capture all blocking characters (return them at end of turn).|Global: Pay [2F] to force an opposing character to block a character of your choice this turn.',
    '06244Ultron|Creation|When fielded, capture a target non-Villain character die (return it at end of turn).',
    '03344Vision|Phasing|Gets +2A when blocked by a non-Villain character die.',
    '04344Vision|Ultron\'s Spy|When fielded, deal 2 damage to a non-Villain character die. If that would KO the character, put it in its Used Pile.',
    '04344Vision|Negotiator|Teamwatch - When you field a character who shares an affiliation with Vision, deal 1 damage to a non-Villain character die.',
    '05003Assemble!|Basic Action Card|Search your bag for a character die and field it at level 1, ignoring the fielding cost.|Teamwork - Repeat this effect for another affiliated character.',
    '04003Call Them Out!|Basic Action Card|Target opposing character must block a character of your choice this turn.',
    '04003Coordinated Strike|Basic Action Card|Deal 3 damage to target character.|Teamwork - repeat this effect if you have at least 2 active characters with the same team affiliation.',
    '03003Enslavement|Basic Action Card|KO up to 2 target Sidekicks.|*/** - Deal 1 damage to your opponent for each Sidekick Knocked Out by this card.',
    '02003Hulk Out|Basic Action Card|One target character gains Overcrush until end of turn.|*/** That character also gets +1A',
    '03003Infiltrate|Basic Action Card|Target character gets +3D and gains one Team affiliation of your choice until end of turn.',
    '04003Nasty Plot|Basic Action Card|Draw 2 dice and put them into your Prep Area.',
    '03003Ready to Rocket!|Basic Action Card|Target character gets +2A until end of turn.|Teamwork - a 2nd target character gets +2A until end of turn if it is affiliated with the first target.',
    '02003Surprise Attack|Basic Action Card|Deal 1 damage to one target character.|*/** - Deal 2 damage instead.',
    '04003The Oppression Begins|Basic Action Card|KO all characters with a fielding cost of 0.|*/** - Those characters go to the used pile instead of the prep area.',
    '13344Baron Zemo|Helmut J. Zemo|While Baron Zemo is active, you may pay [1] to reroll any number of Action Dice during your Roll and Reroll Step.',
    '12214Beast|Dr. Hank McCoy|When Beast attacks, he gets +1D (until end of turn).',
    '13124Black Widow|Oktober|When fielded, choose a character die. That die can\'t block this turn.',
    '14444Bucky|James Buchanan Barnes|* Bucky gets +2A|** Bucky can\'t be blocked by Sidekicks.',
    '16224Captain America|Symbol of Freedom|While Captain America is active, whenever you take non-combat damage, draw 2 dice. Put one of those dice into the Prep Area and return the other to the bag.',
    '15424Captain Marvel|Maj. Carol Danvers|When Captain Marvel deals combat damage, draw a die and put it in your Prep Area.',
    '16224Captain Universe|Tamara Devoux|When fielded, draw and roll a die. If you rolled a character face on an [AV] die, this Captain Universe die gets +2A this turn. Place dice rolled from this effect into your Prep Area.',
    '13204Daredevil|Matthew Murdock, Attorney-at-Law|Daredevil can\'t be blocked by [M] characters.',
    '16144Enchantress|Amora|When fielded, deal 1 damage to your opponent for each of their [AV] character dice in the field.',
    '132G4Gamora|Assassin|Gamora KOs each enemy die she deals combat damage to.',
    '13124Giant Man|Dr. Henry Pym|',
    '144G4Groot|Reincarnated|* If Groot would be KO\'d, instead return him to the Field Zone at level 1.',
    '13124Hawkeye|What Kind of Arrow?|When fielded, your opponent chooses one of their characters. Hawkeye deals 3 damage to that character, and if they aren\'t KO\'d you take 2 damage.',
    '17424Hulk|Gamma Powered|Overcrush|If level 2 or level 3 Hulk attacks and deals damage, return him to the field as level 1.',
    '15424Hyperion|Eternal|Teamwatch - when you field a character who shares an affiliation with Hyperion, deal 2 damage to a Villain.',
    '14324Iron Man|Tinhead|Iron Man gets +1A for each opposing active Villain.|Global: Pay [B] to make 1 character a [VM] until end of turn.',
    '15344Jocasta|Titanium Body|The first time Jocasta is damaged each turn, you may pay [2B] to buy an Action die with cost 3 or lower.',
    '14144Kang|The Conqueror|While Kang is active, you gain an additional reroll during your Roll and Reroll Step.',
    '15344Loki|Loki Laufeyson|While Loki is active, once per turn you may pay [B] to deal 1 damage to a character. That character loses all of its abilities until end of turn. You may use this ability whenever you could use a Global Ability.',
    '14104Loki\'s Scepter|Magic|Place this die into your Field Zone. You may move it to your Used Pile to deal 3 damage to a character that was fielded this turn whenever you may use a Global Ability. Send this die to the Used Pile at the end of your opponent\'s turn.|*/** Deal 4 damage instead.',
    '124F4Maria Hill|Avengers Liaison|When this character and a [S] character go to your Used Pile at the same time, put both into your Prep Area instead.',
    '141J4Moondragon|Heather Douglas|Teamwatch - when you field a character who shares an affiliation with Moondragon, she gets +2D this turn.',
    '131I4Nick Fury|Sgt. Fury|When Nick Fury is blocking, he gets +1A and +1D until end of turn for each other active [AV] character you control.',
    '16404Odin|The All-Father|While Odin is active, all of your other fielded character dice get +2D.|* Thor gets +2A as well.',
    '12304Pepper Potts|Personal Secretary of Tony Stark|Pepper Potts can\'t attack. While Pepper Potts is active, all of your blocking character dice get +2D until end of turn (Iron Man gets +3D instead).',
    '124F4Phil Coulson|Inspirational Leader|While Phil Coulson is active, your Sidekicks and S.H.I.E.L.D. Agent characters get +1A.',
    '14244Red Skull|Johann Schmidt|If Red Skull is KO\'d, your opponent chooses: either Red Skull deals 2 damage to your opponent or you gain 2 life.',
    '133G4Rocket Raccoon|"Blam! Murdered you!"|When Rocket Raccoon attacks with at least one other character, he gets +2A.',
    '123F4S.H.I.E.L.D. Agent|Level 6 Access|* When fielded, give another S.H.I.E.L.D. Agent +1A and +1D until end of turn.',
    '14304S.H.I.E.L.D. Helicarrier|Iliad|Target character you control gets +2A +2D and the [AV] icon this turn.|** Give that character an additional +1A and +1D.',
    '13224Spider-Woman|Jessica Drew|Spider-Woman can\'t be blocked by characters with a printed fielding cost of 0.',
    '141J4Starhawk|Stakar Ogord|Teamwatch - when you field a character who shares an affiliation with Starhawk, he gets +1A and +1D this turn.',
    '142G4Star-Lord|Peter Jason Quill|Teamwatch - when you field a character who shares an affiliation with Star-Lord, all of your [GG] characters get +1D this turn.',
    '17144Thanos|Courting Death|Thanos costs 2 fewer to buy while you are at less than 11 life.',
    '17424Thor|Thunderer|Prevent all non-combat damage to Thor.',
    '16244Ultron|New World Order|While Ultron is active, the first time you capture an opposing character each turn, Ultron deals 3 damage to an opponent.',
    '12244Ultron Drone|01000100 01101001 01100101|Capture any enemy character blocking Ultron Drone (return it at the end of the turn).|Global: Pay [2F] to force an opposing character die to block a character of your choice this turn.',
    '14344Vision|Punisher|If your opponent has a non-Villain character die active, Vision gets +4D.',
    '13324Wasp|The Winsome Wasp|Your opponent can\'t target Wasp with Global Abilities.|Global: Pay [2] to deal 1 damage to a character.',
    '13444Wonder Man|Simon Williams|When you have less than 11 life, Wonder Man loses Villain, gains Avenger and +1A and +1D.',
    '24344Baron Zemo|Master of Evil|Each time you use an action die, Baron Zemo gets +2A.',
    '22214Beast|Bouncing Blue Beast|If Beast is KO\'d while attacking, gain 2 life.',
    '25404Bucky|Cap\'s Sidekick|* If unblocked, double Bucky\'s Attack.',
    '25424Captain Marvel|Human / Kree Hybrid|When Captain Marvel deals combat damage, spin all of your character dice up one level.',
    '27224Captain Universe|Uni-Power|When fielded, draw and roll a die. If you rolled a character face on an [AV] die, gain 1 life and repeat this effect once. Place dice rolled from this effect into your Prep Area.',
    '23204Daredevil|Man Without Fear|When an opponent has an active [M] character, Daredevil gains +2A and +2D.',
    '26144Enchantress|Manipulator|When fielded, your opponent chooses one of their [AV] dice. Capture that character. Your opponent takes damage equal to its printed fielding cost.',
    '242G4Gamora|Raised by Thanos|Teamwatch - when you field a character who shares an affiliation with Gamora, choose an opposing die. It must block one of your Gamora dice if able (you choose which, before opponent declares blockers).|Global: Pay [F]. KO a blocked or blocking die, after damage is dealt.',
    '24124Giant Man|Original Avenger|Once each turn, when one of your other characters is KO\'d, spin this character up one level (if able).',
    '244G4Groot|Protector|While Groot is active, each time an affiliated character takes damage, reduce that damage by 1.',
    '25424Hyperion|Avenger|While Hyperion is active, [VM] characters can\'t use their “when fielded” effects.',
    '25344Jocasta|Wife of Ultron|The first time Jocasta is damaged each turn, draw a die and put it into your Prep Area.',
    '25144Kang|Rama-Tut|When Kang is blocked, you may remove him from the Attack Zone.',
    '25344Loki|Trickster God|When fielded, roll an enemy character. Deal damage to any target equal to the number of energy symbols or field cost rolled.',
    '24104Loki\'s Scepter|Mind Control| KO the enemy character with the lowest fielding cost (your opponent breaks ties).|* You choose if tied.|** Return this die to the Prep Area if your Loki is active.',
    '224F4Maria Hill|Trained Agent|The first time you draw Maria Hill in a turn, you may roll a different [S] character from your Used Pile and place it in your Reserve Pool.',
    '251J4Moondragon|Dragon of the Moon|If Moondragon is KO\'d in combat, you may roll an [AV] or [GG] die from your Used Pile. If it is a character face, you may field it (paying its cost). Otherwise, return it to the used pile.',
    '231I4Nick Fury|Life Model Decoy|When you have 3 or more active [AV] characters, Nick Fury can\'t be blocked.',
    '27404Odin|Gungnir|Odin can\'t be blocked by characters with lower D than him.|* Neither can Thor.',
    '22304Pepper Potts|CEO of Stark Industries|Pepper Potts can\'t attack. When fielded, spin down up to two target enemy characters by one level. If your Iron Man is active, deal them 1 damage as well.',
    '234F4Phil Coulson|Man with the Plan|When Phil Coulson attacks, you may spend [1] to field a Sidekick or S.H.I.E.L.D. Agent from your Used Pile.',
    '24244Red Skull|Embodiment of Evil|If Red Skull is KO\'d, your opponent chooses: either they draw one fewer die during their next Clear and Draw Step or you draw 2 dice from your bag to your Prep Area.',
    '233G4Rocket Raccoon|Weapons Expert|When Rocket Raccoon blocks and you declare at least one other blocker, he gets +3D.',
    '223F4S.H.I.E.L.D. Agent|You\'re Not Cleared For That|* The first [AV] character you field each turn may be fielded for free.',
    '24304S.H.I.E.L.D. Helicarrier|Argonaut|Target character you control gets +3A and the [AV] icon if they attack this turn.|*/** That character can\'t be blocked by Villains.',
    '23224Spider-Woman|Playing Both Sides|When fielded, deal 2 damage to one opposing character with a printed fielding cost of 0.',
    '241J4Starhawk|The One Who Knows|While you have another [AV] and another [GG] character active, Starhawk gets +3A.',
    '242G4Star-Lord|Reluctant Prince|While Star-Lord is active, all of your attacking [GG] characters get +1A and +1D.',
    '28144Thanos|The Mad Titan|Thanos cannot be blocked.',
    '23244Ultron Drone|1 of a Million|Capture each enemy character blocking Ultron Drone, and deal damage to the defending player equal to its fielding cost (return it at the end of the turn).|Global: Pay [2F]. Choose an opposing character die to block a character die of your choice this turn.',
    '23324Wasp|Bio-Electric Blasts|Each time you use a Global Ability, Wasp gets +1A and +1D until end of turn. You may only use this ability once per turn for each Global Ability.|Global: Pay [2] to deal 1 damage to a character die.',
    '24444Wonder Man|Ionic Energy|When you have less than 11 life, Wonder Man loses Villain and gains Avengers. Characters KO\'d in combat with Wonder Man are placed in the Used Pile instead of the Prep Area.',
    '34344Baron Zemo|Thunderbolt|Each time you use an action die, you may pay [1] to put it into your Prep Area instead of your Used Pile.',
    '32214Beast|Not Your Average Pretty Face|When Beast attacks, draw and roll a die. If you rolled energy, place it in your Used Pile. Otherwise place it in your Prep Area.',
    '35444Bucky|Soldier|* KO any character dealt combat damage by Bucky.',
    '36424Captain Marvel|Inspiration|When Captain Marvel deals combat damage, gain 2 life.',
    '33204Daredevil|Guardian of Hell\'s Kitchen|When fielded, KO an enemy [M] character die.',
    '37144Enchantress|Hypnotic|When fielded, capture all [AV] character dice (return them at end of turn).',
    '342G4Gamora|Deadliest Woman In The Universe|When Gamora attacks, choose a character to block Gamora unless your opponent pays 3 life.',
    '34124Giant Man|Pym Particles|When Giant Man attacks, you may reroll him. You may return him to his original face.',
    '36424Hyperion|Atomic Vision|Once per turn, when Hyperion is blocked by a [VM] double his attack.',
    '36144Kang|Time-Ship|While Kang is active, your opponent must pay 2 life to reroll during their Roll and Reroll step.',
    '36344Loki|Agent of Asgard|When Loki attacks, you may pay [2B] to deal 2 damage to each opposing character.',
    '34104Loki\'s Scepter|Piercing|Place this die into your Field Zone. You may move it to your Used Pile to KO an enemy character that did combat damage to you and prevent the damage from that character. Send this die to the Used Pile at the end of your opponent\'s turn.|*/** Return this die to the Prep Area if your Loki is active.',
    '334F4Maria Hill|Director of S.H.I.E.L.D.|While Maria Hill is active, you may add [S] characters from your Field Zone to your roll at the beginning of your turn.',
    '351J4Moondragon|Daughter of the Destroyer|Teamwatch - when you field a character who shares an affiliation with Moondragon, reroll Moondragon. You may then return her to her previous face.',
    '341I4Nick Fury|Schemes Upon Schemes|When you have 3 or more active [AV] characters, Nick Fury can\'t be KO\'d (if he would be KO\'d from damage, that damage remains until end of turn).',
    '37404Odin|Asgardian Monarch|When fielded, KO one opposing character with lower Defense than Odin.|* You may also field Thor from your Used Pile at level 1 for free.',
    '32304Pepper Potts|Stark International|Pepper Potts can\'t attack. When Pepper Potts is KO\'d, search your bag for an Iron Man die and field it at level 1.',
    '334F4Phil Coulson|Expert Recruiter|When fielded, you may KO an enemy Sidekick. If you do, you may buy a S.H.I.E.L.D. Agent for free.',
    '35244Red Skull|"Hail Hydra!"|Teamwatch - when you field a character who shares an affiliation with Red Skull, spin down all of his characters one level or spin up all of your character dice one level (your opponent chooses).',
    '343G4Rocket Raccoon|Smartest Mammal In The D\'ast Galaxy|When Rocket Raccoon is attacking or blocking with at least one other character, he can\'t be KO\'d this turn.',
    '323F4S.H.I.E.L.D. Agent|Need to Know Basis|* During your Roll and Reroll step, you may reroll any number of S.H.I.E.L.D. Agents or [AV] character dice.',
    '34304S.H.I.E.L.D. Helicarrier|Odyssey|Place this die into your Field Zone. You may move it to your Used Pile to give +5D to one of your blocking characters after blockers are declared. Send this die to the Used Pile at the end of your opponent\'s turn.|* Also give that blocker the [AV] icon|** Send this die to the Prep Area instead of the Used Pile if your Nick Fury is active',
    '34224Spider-Woman|Pheromones|Teamwatch - when you field a character who shares an affiliation with Spider-Woman, you may KO her to KO all opposing fielded characters with a fielding cost of 0. Gain 1 life for each character KO\'d this way.',
    '341J4Starhawk|Precognitive|Teamwatch - when you field a character who shares an affiliation with Starhawk, that character and Starhawk both get +2A this turn.',
    '342G4Star-Lord|Element Gun|While Star-Lord is active, your [GG] characters cost 1 less to buy.',
    '33244Ultron Drone|Swarm of Destruction|If this character is KO\'d, one of your other fielded characters may capture an opposing character (return it at end of turn).|Global: Pay [2F]. Choose an opposing character die to block a character die of your choice this turn.',
    '33324Wasp|Founding Avenger|While Wasp is active, when your opponent uses a Global Ability, she deals them 1 damage.|Global: Once per turn, you may pay [2] to deal 1 damage to a character or player.',
    '34444Wonder Man|Movie Star|When you have less than 11 life, Wonder Man loses Villain and gains Avengers and can\'t be blocked.',
    '46224Captain Universe|Enigma Force|When fielded, draw and roll a die. If you rolled a character face on an [AV] die, you may field it immediately (paying all costs). Otherwise, place it in your Prep Area.',
    '454G4Groot|We Are Groot|While Groot is active, all your other fielded characters get +3D.',
    '44344Jocasta|Patterned After Janet|The first time each turn Jocasta would be dealt damage, instead deal that damage to your opponent.',
    '4A144Thanos|Infinite|Overcrush|Whenever one of your Villains deals combat damage to an opponent, put an Infinity Counter on Thanos. Thanos dice cost 2 less to purchase for each Infinity Counter on Thanos.',
    '464D1Magneto@Z|Magnetic Monster|Zombie - When fielded, KO all non-[ZO] Magnetos in the field.|While active, enemy characters with Purchase Cost 3 or lower lose their abilities. Professor X can\'t be fielded.',
    '451D1Red Skull@Z|Undying Evil|Zombie - When fielded, KO all non-[ZO] Red Skull in the field.|While active, opponent can\'t attack with more than 1 Sidekick per turn. Captain America can\'t attack either.',
    '453D1Gladiator@Z|Intergalactic Terror|Zombie - When fielded, KO all non-[ZO] Gladiator in the field.|While active, Gladiator gets +2A and +2D for each of your other active [M] characters. Also, all active Phoenix dice lose their abilities.',
    '442D1Electro@Z|Cooked Meat|Zombie - When fielded, KO all non-[ZO] Electro in the field.|When fielded, deal 2 damage to each player. If an opponent has an active Spider-Man you take no damage from this effect.',
    ]
    var dctw = [
    '53003Pandora\'s Box|Trinity War|When your characters are blocking or are blocked by Villains those dice get +1A and +1D until end of turn.|Global: Pay [S]. Target character gains the Villain affiliation.',
    '55404Superman™|Trinity War|When Superman would be KO\'d, instead put him into your Used Pile.',
    '54003House of Mystery|Trinity War|Put all dice in the Field Zone that are the same as another die in the Field Zone into their owner\'s Used Pile.',
    '52404Constantine|Trinity War|Once per turn, when fielded, gain 1 life.',
    '53474Wonder Woman|Trinity War|While Wonder Woman is active, when one of your characters is KO\'d you may spin another character up 1 level.',
    '57171Shazam!|Trinity War|When Shazam! is purchased, add him to your Prep Area.',
    '54374Martian Manhunter|Trinity War|[F] characters deal no damage to Martian Manhunter.',
    '56374Firestorm|Trinity War|While Firestorm is active, your opponent may not field Justice League characters. Your opponent may pay 2 life to ignore this effect.',
    '53003The Outsider|Trinity War|Draw a die from your bag. If it is a Villain die, field it on its level 2 side without paying its fielding cost. Otherwise, put the die into you Used Pile and if it was a Sidekick die, put this die in your Prep Area.|Global [F]: Target Villain gets +2 attack. You may not target the same Villain more than once per turn.',
    '55174Batman™|Trinity War|When fielded, you may purchase a Robin die for 1 less (to a minimum of 1).',
    '542C1Atomica|Trinity War|While Atomica is active, once per turn during your Main Step, you may swap her with a Villain die in your Reserve Pool.',
    ];
    var dcjl = [
    '05174Batman™|Bruce Wayne|When fielded, you may purchase a basic action die for 1 (This may not reduce a die\'s cost below 1).',
    '04174Batman™|The Dark Knight|Batman must attack if any Villains are active.',
    '05174Batman™|World\'s Greatest Detective|While Batman is active, whenever you field a different Justice League character, gain 1 life.|Retaliation - If an affiliated character is KO\'d, deal 1 damage to an opposing player.',
    '04264Darkseid|God of Apokolips|Darkseid gets +4A and +4D when blocking or blocked by characters with the Justice League affiliation until end of turn.',
    '05264Darkseid|In Search of Anti-Life|When Darkseid attacks, he deals damage equal to his level to target character or player.',
    '06264Darkseid|Immortal|If Darkseid is KO\'d, he deals damage equal to his A to up to two target characters. For each character he KOs this way, deal 1 damage to the characters controller.',
    '04264Deathstroke|Slade Wilson|Regenerate - Reroll when knocked out.',
    '05264Deathstroke|The Terminator|If Deathstroke is KO\'d, draw a die. If it is a Villain, add it to your Prep Area and return Deathstroke to the field at the same level (this doesn\'t count as fielding Deathstroke). Otherwise, return the die to your bag.',
    '05264Deathstroke|Villain for Hire|* If Deathstroke is KO\'d during attacking or blocking, return him to the Field Zone at level 1.',
    '04384Green Arrow|Oliver Queen|When fielded, Green Arrow deals 2 damage to each of up to two target characters.',
    '04384Green Arrow|The Battling Bowman|When fielded, spin an opposing character down 1 level (if possible).',
    '05384Green Arrow|The Emerald Archer|When Green Arrow attacks, deal 1 damage to your opponent for each opposing character with the Villain affiliation in play.',
    '04374Martian Manhunter|J\'onn J\'onnz|Martian Manhunter gets +2A when blocked until end of turn.',
    '04374Martian Manhunter|Founding Member|Martian Manhunter gets +3A and +3D until end of turn when engaged with [S] characters.',
    '05374Martian Manhunter|John Jones|When Martian Manhunter attacks, deal 1 damage to target character. If that character is KO\'d, another opposing character must block Martian Manhunter this turn if able.',
    '07474Superman™|Man of Steel|When fielded, you may pay 2 to purchase a different character with the Justice League affiliation and put the die directly into your bag.',
    '06474Superman™|Last Son of Krypton|Superman cannot be damaged during the Attack Step.',
    '06474Superman™|Kal-El|Retaliation - If an affiliated character is KO\'d, deal 1 damage to an opposing player.',
    '04474Wonder Woman|Daughter of Zeus|While Wonder Woman is active, your opponent\'s effects on their Villains that activate \'when fielded\' deal no damage to you.',
    '04474Wonder Woman|Warrior Princess|While Wonder Woman is active, once per turn, you may choose an opposing Villain and force it to block target attacking character.',
    '04474Wonder Woman|Champion of Themyscira|While Wonder Woman is active, other characters with the Justice League affiliation cost 1 less to field.',
    '03174Zatanna|~Zatanna Zatara|When fielded, draw a die from your bag and add it to your Prep Area.',
    '03174Zatanna|Actual Magician|When Zatanna is KO\'d, draw a die from your bag and add it to your Prep Area.',
    '03174Zatanna|Stage Magician|When Zatanna blocks, draw a die from your bag. If it is a Sidekick, put it in your Prep Area and Zatanna takes no damage this turn. Otherwise, return that die to your bag.',
    '04003Anger Issues|Basic Action Card|Target character gets +3A and Overcrush this turn (damage dealt in excess of blockers\' health is dealt to opponent).|Global: Pay [F]. Target character gets +1A until end of turn.',
    '02003Casualties|Basic Action Card|KO target Sidekick.|** KO an additional target Sidekick if able.|Global: Pay [F] or [B] . Gain 1 life whenever an opposing Sidekick is KO\'d this turn.',
    '04003Fist of Fury|Basic Action Card|Deal 1 damage to target player.|* Deal 2 damage to target player.|** Deal 3 damage instead if that player has a Villain in play.',
    '04003Phantom Zone|Basic Action Card|Take any character in the field and place it on this card, and move any dice you\'ve placed onto this card on a previous turn into its owner\'s Prep Area. If this effect is cancelled, or that die\'s owner takes damage, return that die to its owner\'s Prep Area.',
    '04003Pick Your Battles|Basic Action Card|Each of your characters can only be blocked by opposing characters of the same energy type and your Sidekicks can only be blocked by Sidekicks.',
    '04003Righteous Charge|Basic Action Card|Your attacking characters take a maximum of 2 damage from each blocker.|** Instead they take a maximum of 1 damage from each blocker.',
    '03003Save Civilians|Basic Action Card|Whenever you field a Sidekick this turn, reduce the fielding cost of another die by 1, draw a die from your bag, and put it in your Prep Area.',
    '05003Shockwave|Basic Action Card|KO all level 1 characters.|*/** Also deal 3 damage to an opposing player.|Global: Pay 1. Target level 1 character is unaffected by action dice this turn.',
    '04003Villainous Pact|Basic Action Card|Your opponent chooses one non-Villain character. All other non-Villains cannot block this turn.|Global: Pay [M]. Once per turn, during your turn, if you have no dice in your Prep Area, you may draw a die and place it in your Prep Area.',
    '03003Vulnerability|Basic Action Card|Choose an opposing character. If you damage that character this turn, KO it, draw a die from your bag, and place it in your Prep Area.',
    '13474Aquaman|Arthur Curry|While Aquaman is active, Justice League characters cost 1 less to buy (to a minimum of 1).',
    '13204The Atom|Ray Palmer|The Atom takes no damage from higher level characters.',
    '14204Batarang|Tool of the Bat|KO a level 1 character.|* Instead, KO a level 1 or level 2 character.|** Instead, KO a level 1 or level 2 character and place this die in your Prep Area after using it.',
    '15174Batman™|The Caped Crusader|Whenever Batman damages a Villain, gain 1 life.|Global: Once per turn pay [F] or [B]. The first time you play a basic action die this turn, gain 1 life.',
    '12294Black Manta|David|If Black Manta is damaged during the Attack Step and not KO\'d, deal 1 damage to an opposing player.',
    '14304Blue Beetle|Jaime Reyes|While Blue Beetle is active, whenever a Villain is fielded, Blue Beetle deals 1 damage to an opposing player.',
    '13104Booster Gold|Michael Jon Carter|Booster Gold cannot attack if a Villain is active.',
    '15194Brainiac|Terror of Kandor|While Brainiac is active, during your opponent\'s Clear and Draw Step, you may make your opponent put one die from their draw back into the bag and redraw before they roll.',
    '14394Captain Cold|Leonard Snart|When Captain Cold attacks, you may pay [B] to prevent a target character from blocking this turn.',
    '14204Catwoman|Selina Kyle|When fielded, draw a die from your bag and add it to your prep area.',
    '13394Cheetah|Cursed Archaeologist|When Cheetah attacks, she deals 1 damage to the defending player.',
    '12404Constantine|Antihero|While Constantine is active, once per turn at the end of your opponent\'s Roll and Reroll Step, you may make that opponent reroll an action die.',
    '15274Cyborg|Vic Stone|When Cyborg attacks, KO an opposing character that is the same level as Cyborg.',
    '15264Darkseid|Omega Beams|While Darkseid is active, whenever you KO an opposing non-Sidekick, non-Villain character, deal 1 damage to an opposing player.',
    '16404Deadman|Boston Brand|When fielded, capture an opposing character. This capture lasts until Deadman leaves play.',
    '15264Deathstroke|Weapons Master|When Deathstroke is fielded, deal 1 damage to opposing player for each Villain you control.',
    '15374Firestorm|Jason and Ronnie|While active, when you field a [B] character (including Firestorm), deal 2 damage to target character or player.',
    '14274The Flash|Barry Allen|If your opponent has less than 3 fielded characters, The Flash is unblockable while attacking alone.',
    '14384Green Arrow|Former Mayor|When Green Arrow is fielded, deal damage equal to twice Green Arrow\'s level to target character.',
    '15174Green Lantern|Hal Jordan|When Green Lantern attacks, deal 2 damage to the defending player if you used an action this turn.',
    '13164Harley Quinn|Dr. Harleen Quinzel|While Harley Quinn is active, The Joker costs 2 less to buy and 1 less to field.',
    '14384Hawkman|Thanagarian|Hawkman cannot be blocked by [F] or [S] characters.',
    '15464The Joker|Unpredictable|When fielded, the Joker cannot be blocked by non-Villains this turn.',
    '12404Katana|Tatsu Yamashiro|',
    '14104Lantern Power Ring|Energy Projection|Deal 1 damage to your opponent for each opposing Villain in play.|** Also deal an equal amount of damage to each Villain.|Global: Pay [M]. Target opposing character gains the Villain affiliation until end of turn.',
    '14494Lex Luthor|Power Suit|While Lex Luthor is active, your opponent must pay 2 to use basic action dice.',
    '15374Martian Manhunter|Green Martian|Overcrush',
    '13384Red Tornado|Rannian|',
    '13404Robin|Boy Wonder|While Batman is active, each of your Robin dice gets +3A and +3D.',
    '17174Shazam!|Billy Batson|While Shazam! is active, whenever your opponent fields a character, spin that character down 1 level.',
    '15294Sinestro|Instills Fear|While Sinestro is active, all other Villains cost 1 less to field.|Global: Once per turn pay [F]. Target Villain gets +1A until end of turn.',
    '14494Solomon Grundy|Born on a Monday|When Solomon Grundy is blocking he takes no damage from characters with a lower level.',
    '14384Stargirl|Courtney Whitmore|While Stargirl is active, your Sidekicks get +1A and +1D.',
    '16474Superman™|Not a Bird or a Plane|Superman cannot be targeted by opposing action dice or abilities.',
    '14104Swamp Thing|Dr. Alec Holland|Sidekicks cannot block Swamp Thing.',
    '14304Vibe|Francisco Ramon|When Vibe is KO\'d, deal 1 damage to all characters and players.',
    '14104Vixen|Mari McCabe|',
    '14474Wonder Woman|Princess Diana|If you have 2 or more Justice League characters in play, your Sidekicks take no damage from attacking or blocking characters.',
    '14174Zatanna|~Backwards Magic|While Zatanna is active, you may reroll your Sidekick dice once per turn (during the Roll and Reroll Step).',
    '23474Aquaman|King of Atlantis|While Aquaman is active, other Justice League characters get +1A and +1D.',
    '23204The Atom|Subatomic Superhero|When blocked by a [F] or [S] character, you may remove The Atom from the Attack Zone to the field.',
    '24204Batarang|Instrument of Distraction|Deal 1 damage to a character or opponent.|*/** Also put this die into your prep area instead of the Used Pile if your Batman is active.',
    '24284Black Canary|Crime-Fighter|When fielded, no Sidekicks can block this turn.',
    '23294Black Manta|Deep Sea Deviant|Retaliation - If one of your Villains is KO\'d, deal 1 damage to your opponent for each of your active Villains.',
    '24304Blue Beetle|Magically Infused|Whenever one of your Sidekicks is KO\'d Blue Beetle gets +2A until end of turn.',
    '24104Booster Gold|Glory-Seeking Showboat|While Booster Gold is active, you may choose to add him to your roll at the start of any turn.',
    '25194Brainiac|Collector of Worlds|While Brainiac is active, if your opponent attacks with at least one character, you may choose to have an additional opposing character also attack.',
    '24394Captain Cold|Leonard Wynters|While Captain Cold is active, your opponent must pay 1 to declare an attack.',
    '23394Cheetah|Powered by Urkartaga|When Cheetah attacks, KO an opposing Sidekick.',
    '22404Constantine|Con Artist|While Constantine is active, you may name a character before you draw. If you draw and roll that character this turn, you may field it for free.',
    '24274Cyborg|Exceptionally Gifted|When Cyborg attacks alone, he gets +2A and +2D until end of turn.|Retaliation - If an affiliated character is KO\'d, deal 1 damage to an opposing player.',
    '25404Deadman|Possessive Talents|When fielded, choose a character. That character cannot attack or block until Deadman is no longer active.',
    '24374Firestorm|Atom Rearranger|When Firestorm attacks, deal 1 damage to target character or player.',
    '24274The Flash|Speedster|If you played a basic action this turn, The Flash is unblockable while attacking alone.',
    '26174Green Lantern|Willpower|When Green Lantern attacks, other attackers get +2A and +2D until end of turn.',
    '24164Harley Quinn|Femme Fatale|When Harley Quinn attacks, all other attackers not named Harley Quinn must be blocked before your opponent may declare a blocker for Harley Quinn.',
    '23384Hawkman|World\'s Fiercest Attacker|When blocked, Hawkman deals 1 damage to an opposing player.',
    '25464The Joker|Clown Prince of Crime|When fielded, choose an opponent\'s character card, cancelling all previous choices. Your opponent cannot field that character while The Joker is active.',
    '23404Katana|Outsider|Katana gets +1A for each Villain die in the field.',
    '24104Lantern Power Ring|Energy Constructs|KO a level 1 or 2 Villain.|** Also put the KO\'d Villain in the Used Pile instead of the Prep Area.',
    '24494Lex Luthor|Former President|Whenever you use a basic action die, roll it. If it is an action face, add it to your Prep Area.',
    '24384Red Tornado|Lab Creation|While Red Tornado is active, once per turn, if you draw 3 or more Sidekicks during your Clear and Draw Step, you may put all the Sidekicks into your Used Pile and draw 4 new dice.',
    '24404Robin|Circus Star|Robin is unblockable while your Batman is active.',
    '26174Shazam!|Wisdom of Solomon|While Shazam! is active, whenever you field a non-Villain character, spin it up one level.',
    '25294Sinestro|Order Through Fear|While Sinestro is active, your Villains get +1A and +1D if there are no opposing Villains active.|Global: Once per turn pay [F]. Target Villain gets +1 attack.',
    '25494Solomon Grundy|Died on a Saturday|KO any character of a lower level engaged with Solomon Grundy after damage is dealt.',
    '24384Stargirl|Yankee Poodle Fangirl|Whenever exactly 1 damage would be dealt to a Sidekick, you may redirect it to Stargirl.',
    '25104Swamp Thing|Plant Elemental|Characters who block Swamp Thing are KO\'d at the end of the Attack Step.',
    '24304Vibe|Paco|While Vibe is active, whenever you roll [2B] and do not reroll, deal 1 damage to all characters and opposing players.',
    '23104Vixen|Healing Factor|When Vixen blocks a Villain, she gets +2D until end of turn.',
    '34204The Atom|Science Advisor|Atom cannot be blocked when he is level 1. If you attack with 3 or more characters, he cannot be blocked at level 1 or 2.',
    '33474Aquaman|Orin|When Aquaman blocks, you may move a different Justice League character from the Used Pile to your Prep Area.|Retaliation - If an affiliated character is KO\'d, deal 1 damage to an opposing player.',
    '35204Batarang|From Wayne Enterprises|Deal 1 damage to a Villain, then 2 damage to another Villain and continue selecting Villains, increasing the damage by 1 until all Villains have been selected.',
    '34284Black Canary|Canary Cry|When fielded, you may roll an opposing character. If it is a character face, return it to the field. If it is an energy face, add it to your opponent\'s Prep Area.',
    '33294Black Manta|Artificial Gills|Black Manta gets +1A and +1D for each other active Villain.',
    '33304Blue Beetle|High School Hero|Blue Beetle may block up to 2 Villains.',
    '34104Booster Gold|High Publicity Hijinks|While Booster Gold is active, you may move Booster Gold to your Prep Area to reduce the cost of a non-Villain character by 1 (to a minimum of 1).',
    '35194Brainiac|Twelfth-Level Intelligence|While Brainiac is active, after blockers are declared, you may switch two opposing blockers.',
    '35394Captain Cold|Master of Absolute Zero|When fielded, deal 1 damage to all Sidekicks.',
    '34264Catwoman|Femme Fatale|When fielded, you may choose to roll this die. If it is a character face, KO target opposing character and leave Catwoman in play on the rolled face. If you roll an energy face, add Catwoman to your Prep Area.',
    '33394Cheetah|Dr. Barbara Ann Minerva|When assigning damage in an Attack Step, Cheetah assigns and resolves her damage before opposing characters.',
    '34274Cyborg|Mentor|When Cyborg attacks, deal 1 damage to an opposing player if you have fewer fielded characters than the opponent.',
    '35404Deadman|Embracing Life|When Deadman is KO\'d, you may roll another character die that was KO\'d this turn. If you roll a character face, field it for free.',
    '34374Firestorm|Matter Master|When Firestorm is dealt damage, deal an equal amount of damage to target character.',
    '36174Green Lantern|Brightest Day|When Green Lantern attacks, deal 1 damage to the defending player for each different Justice League character that attacks.|Retaliation - If an affiliated character is KO\'d, deal 1 damage to an opposing player.',
    '34164Harley Quinn|Psychopathic Psychiatrist|When fielded, each player KOs a Sidekick they control.|* While Harley Quinn is active, the first time one of your Sidekicks is KO\'d during your turn, target opponent loses 1 life.',
    '34384Hawkman|Carter Hall|Whenever Hawkman is blocked, add a die from your bag to your Prep Area.',
    '35464The Joker|Red Hood|While The Joker is active, if you damage an opposing character, deal an equal amount of damage to each character that shares an affiliation with the damaged character.',
    '33404Katana|Soultaker Sword|Katana may block any number of Sidekicks.',
    '35104Lantern Power Ring|Flight|For each character you have in excess of your opponent, add one die to your Prep Area from your bag.',
    '35494Lex Luthor|Billionaire Industrialist|When fielded, choose an opponent\'s character card, cancelling all previous choices. Your opponent cannot purchase that die while Lex Luthor is active.',
    '34384Red Tornado|Android|Once during your turn, you may spin down Red Tornado 1 level. If you do, the next time you use an action die add it to your Prep Area instead of putting it into your Used Pile.',
    '34404Robin|Acrobatic Adolescent|When Robin is KO\'d, move it to the field at level 3 if Batman™ is in play.',
    '36174Shazam!|Strength of Hercules|Whenever Shazam damages an opponent or KOs a character while attacking, spin all of your other characters up one level if able.',
    '35294Sinestro|Sinestro Corps Leader|Your Villains cannot be the target of opposing global abilities.',
    '35494Solomon Grundy|Buried on a Sunday|When Solomon Grundy is KO\'d other than by damage from an attacker or blocker, KO an opposing character.',
    '34384Stargirl|Star-Spangled Kid|When Stargirl damages a Villain, you may take a Sidekick from your Used Pile and field it.',
    '35104Swamp Thing|Part of The Green|If this character damages an opponent, KO an opposing character.',
    '34304Vibe|Formerly Hardline|While Vibe is active, whenever an opposing character spins up or down, Vibe deals 2 damage to that character.',
    '33104Vixen|Animal Mimicry|You may spend [M] to prevent all damage to Vixen from one source.',
    '43284Black Canary|Dinah Laurel Lance|When Black Canary attacks, you may pay [B] to prevent a target character from blocking this turn.',
    '44204Catwoman|Nine Lives|When fielded, name a character die. Draw a die from your opponent\'s bag, if it is the named die, you may field it this turn and attack with it. If you do, put it into your opponent\'s Used Pile at end of turn. Return any unnamed dice to your opponent\'s bag.',
    '42404Constantine|Hellblazer|While Constantine is active, before your opponent\'s Clear and Draw Step, you may name a character. If that character is fielded this turn, ignore its text until end of turn and it cannot attack this turn.',
    '44274The Flash|Connected to the Speed Force|When attacking alone, if you have no other characters fielded, Flash is unblockable.',
    ];
    var ygo = [
    '06302Blue-Eyes White Dragon|Blue Titan|* When this monster attacks, your opponent knocks out one of his or her monsters.|** When this monster attacks, your opponent loses life equal to the level of his or her highest-level monster.',
    '04302Celtic Guardian|Elven Warden|When this monster attacks alone, it gets +2D.|* Gets +1D for each other Bolt monster in the field <em>(both players\')</em>.',
    '06102Dark Magician|Friend to the Pharaoh|When summoned, you may pay 2 life to draw and roll 2 dice.',
    '03202Harpie Lady|Furious Fowl|If one or more sidekicks attack <em>(either players\')</em>, this monster gets +1A and +1D.|* When this monster attacks, up to 3 sidekicks get +1A.',
    '03402Kuriboh|Cute Furball|* During your attack step, if this monster is assigned enough damage to knock it out, your non-Kuriboh monsters do not get knocked out this turn.',
    '04202La Jinn the Mystical Genie of the Lamp|Mighty Genie|When summoned, knock out up to two opposing sidekicks.|* When this monster knocks out another monster, your opponent loses 1 life.',
    '06302Red-Eyes B. Dragon|Plated Body|While active, Bolt monsters cost 2 energy less for you to buy.|* When summoned, move one die from your opponent\'s prep area into the used pile.',
    '041A2Time Wizard|Time Roulette|When summoned, name a die and draw a die from your bag. If it matches, add it to your prep area. Otherwise, return it to your bag.|* When this monster gets knocked out, you may knock out a [F] monster with cost 4 or less.',
    '133A4Baby Dragon|Juvenile Reptile|',
    '15204Black Luster Soldier|Ultimate Soldier|If you attack with only [F] monsters, this monster gets +1A.|Ritual: You may move a monster from your reserve pool to your used pile to pay this monster\'s summoning cost.',
    '14204Blade Knight|Lone Wolf|When this monster attacks alone, spin an opposing monster down to level 1.',
    '16302Blue-Eyes White Dragon|Terrifying Behemoth|When this monster attacks, it gets +1A for each other attacking monster.|* When summoned, deal 3 damage to one target monster.',
    '14204Breaker the Magical Warrior|Mana Break|When summoned, you may move an action die from the field to its used pile.',
    '15304Buster Blader|Dragon Butcher|This monster cannot be blocked by monsters with "Dragon" in their title.',
    '14304Celtic Guardian|Lightning Fast|If none of your other monsters block, this monster gets +4D.',
    '14304Curse of Dragon|Bony Body|When this monster damages an opponent, return it to your bag instead of the used pile.',
    '16102Dark Magician|Master Spellcaster|While active, at the beginning of each turn, lose one life and draw one extra die.',
    '15104Dark Magician Girl|Arcane Companion|At the start of the attack step, this monster gets +2A if you have any monsters in your used pile.',
    '15204Doomcaliber Knight|Skeletal Warrior|When an opponent uses an action die, you must cancel the effect and knock out this monster.',
    '15304Flame Swordsman|Master Swordsman|When summoned, this monster gets +2A until the end of the turn.',
    '16304Gaia the Fierce Knight|Charging Stallion|If this monster damages an opponent, it deals an equal amount of damage to one target monster.',
    '13204Goblin Attack Force|Charge!|This monster must attack <em>(if legal)</em>. If a level 2 or higher monster damages you, knock this monster out.',
    '13204Harpie Lady|Cyber Slash|When summoned, you may spin a sidekick die in your ready area to its monster side.',
    '15204Harpie Lady Sisters|Triple Scratch Attack|This monster cannot be blocked unless it is blocked by two or more monsters.',
    '12204Injection Fairy Lily|Rocket Attack|',
    '15404Jinzo|Cyber Energy Shock|When summoned, move all action dice <em>(of both players)</em> in the field or reserve pool to the used pile.',
    '12404Kuriboh|Yugi\'s Protector|When this monster gets knocked out, knock out an opposing sidekick.',
    '14204La Jinn the Mystical Genie of the Lamp|Loyal to his Master|Whenever you summon a [F] monster, you may spin <em>(all copies of)</em> this monster up one level.',
    '13404Lord of D.|Dragon Commander|',
    '12204Man-Eater Bug|Insectoid|',
    '12404Marshmallon|Fluffy Fairy|',
    '11104Morphing Jar|Canopic Jar|',
    '14404Mystical Elf|Mystical Healing|When summoned, gain 1 life.',
    '16302Red-Eyes B. Dragon|Inferno Fire Blast|When this monster attacks, knock out all sidekicks <em>(of both players)</em>. This monster gets +2A for each sidekick knocked out this way.',
    '14103Ring of Magnetism|Sidekick Attraction|Play on a monster. All opposing sidekicks must attack while that monster is active.',
    '13104Saggi the Dark Clown|Sinister Jester|',
    '12404Sangan|Clawed Fiend|',
    '16304Summoned Skull|Intense Lightning|While this monster is active, whenever an opponent summons a level 3 monster, deal 2 damage to that opponent.',
    '151A4Time Wizard|Turning Back Time|When summoned, you may move up to two sidekicks you rolled this turn <em>(but not one that paid to summon this)</em> from your used pile into your prep area.',
    '13103Trap Hole|Deep|Knock out a level 1 monster with cost 5 or less.',
    '243A4Baby Dragon|Soft Scales|When this monster attacks, you may pay [B] to give it +2A.',
    '25204Black Luster Soldier|Chaos Blade|When this monster attacks, your other [F] monsters get +1A and +1D.|Ritual: You may move a monster from your reserve pool to your used pile to pay this monster\'s summoning cost.',
    '23204Blade Knight|Solo Act|When this monster attacks alone, any damage it deals in excess of the defense of its blockers is dealt to your opponent.',
    '23204Breaker the Magical Warrior|Mystical Magus|When summoned, if your opponent has more monsters in the field than you do, draw and roll one die.',
    '25304Buster Blader|Dragon Slayer|When this monster attacks or blocks, it gets +2A and +2D for each level 3 monster your opponent has in the field.',
    '25304Curse of Dragon|Dragon Flame|While active, the first time you summon a monster each turn, this monster gets +2A and +2D.',
    '25104Dark Magician Girl|Powerful Sorceress|At the start of the attack step, this monster gets +1A for each monster in your used pile.',
    '25204Doomcaliber Knight|Fiendish Fighter|While this monster is active, it cannot be the target of action dice or abilities.|Global: Pay [F] when you attack. Your monsters cannot be the target of action dice or card abilities.',
    '25304Flame Swordsman|Flaming Sword of Battle|At the start of the attack step, if your opponent has more monsters in the field than you do, this monster gets +2A and +2D.',
    '25304Gaia the Fierce Knight|Spiral Shaver|If this monster is blocked and not knocked out, it also deals half its damage <em>(rounded down)</em> to your opponent.',
    '24204Goblin Attack Force|Goblin Squad|This monster cannot block. If you are damaged, knock this monster out.|Global: Pay [F]. Target monster must block this turn <em>(if legal)</em>.',
    '25204Harpie Lady Sisters|Triangle Ecstasy Spark|If this monster is blocked by only one monster, it deals 2 damage to your opponent.',
    '23204Injection Fairy Lily|Forced Injection|When you assign this monster to attack, you may take 2 damage to give it +3A.',
    '25404Jinzo|Mechanical Master|When summoned, discard one action die from either player\'s field or from your ready area.',
    '24404Lord of D.|Dragon Protector|While this monster is active, it cannot be the target of opposing action dice or abilities.|* Your monsters with "Dragon" in the name cannot be the target of opposing action dice or abilities.',
    '24204Man-Eater Bug|Insatiable Appetite|When this monster is knocked out in combat, knock out one monster engaged with it.',
    '23404Marshmallon|Malleable Monster|If this monster is knocked out while blocking, you may pay 1 life to return it to the field <em>(at the same level)</em>.',
    '25401Millennium Puzzle|The Eternal Dungeon|When rolled, move this to your field. It does not go to your used pile until used. You may discard this die to send one opposing monster to its used pile.',
    '26201Millennium Rod|Scepter of Supremacy|When rolled, move this to your field. It does not go to your used pile until used. You may discard this die to take control of one opposing monster until the end of the turn. You may attack or block with that monster.',
    '22104Morphing Jar|All-Seeing Eye|When summoned, your opponent rolls a die from his prep area. If it rolls a monster face, return it to the prep area. Otherwise, put it in his used pile.',
    '25404Mystical Elf|Everlasting Support|When this monster is knocked out, gain 2 life and move a die from your used pile to your prep area <em>(excluding this one)</em>.|Global: Pay [S]. Target monster gets +1D.',
    '272B1Obelisk the Tormentor|Fist of Fate|If this monster is blocked but is not knocked out, it deals damage equal to its attack to your opponent <em>(in addition to the damage it has already dealt to its blockers)</em>.',
    '23103Ring of Magnetism|Action Attraction|Play on a monster. Your opponent\'s action dice and abilities can only target that monster.',
    '24104Saggi the Dark Clown|Dark Light|Cannot be blocked by sidekicks. If this monster damages the opponent, knock out an opposing sidekick.',
    '23404Sangan|Zealous Supporter|When this monster gets knocked out, you may return a monster <em>(other than this one)</em> from your used pile to your prep area.',
    '283B1Slifer the Sky Dragon|Growing Ever Stronger|When summoned, you may pay 1 life to spin a die up one level.',
    '25304Summoned Skull|Lightning Storm|When summoned and for the rest of the turn, whenever a [B] monster is summoned <em>(by either player)</em>, deal 2 damage to a target monster.',
    '26301Thousand Dragon|Inferno Flame Breath|When summoned, put two dice from your bag to your prep area.|Fusion: Before your attack, if you move two different [TDF] from the field to your prep area, you may move this die from this card to your prep area.',
    '24103Trap Hole|Shallow|Knock out all sidekicks <em>(both players\')</em>.',
    '273B1The Winged Dragon of Ra|Solar Deity|When summoned, choose an opposing monster and roll it. If it does not roll a monster face, move it to the prep area.',
    '343A4Baby Dragon|Cute but Dangerous|When this monster attacks, it gains +1A for each other [B] monster you control.',
    '36204Black Luster Soldier|Fearsome Fighter|When summoned, your opponent\'s sidekicks deal no damage in battle this turn.|Ritual: You may move a monster from your reserve pool to your used pile to pay this monster\'s summoning cost.',
    '34204Blade Knight|Last Man Standing|When this monster attacks alone, only 1 monster of equal or lower level may block it <em>(monsters of higher level cannot block it)</em>.',
    '37304Blue-Eyes White Dragon|Monstrous Dragon|Once per turn, you may knock out one of your monsters to give this monster +3A.|Global: Pay [B] and knock out one of your monsters to reduce the cost of the next die you buy by 2 energy.',
    '34204Breaker the Magical Warrior|Counterspell|When summoned, draw a die from your bag. If it is a [F] monster, add it to your prep area. Otherwise, place it in your bag or your used pile.',
    '36304Buster Blader|Dragon Executioner|At the start of the attack step, this monster gets +1A and +1D for each non-sidekick monster in your opponent\'s used pile or prep area.',
    '34304Celtic Guardian|Silverblade Slash|When assigning damage in an attack step, this monster assigns and resolves his damage before opposing monsters do.',
    '35304Curse of Dragon|Skeletal Structure|Even if this is not active, whenever you summon a die with "Dragon" in its title, you may roll <em>(all copies of)</em> this die from your used pile. If you roll a monster face, summon it for free. Otherwise, return it to your used pile.',
    '36102Dark Magician|Dark Magic Attack|While active, whenever you draw an extra die <em>(beyond the ones you draw at the start of your turn)</em>, draw 2 dice instead and lose 1 life.',
    '35104Dark Magician Girl|Dark Burning Attack|If this monster does not block, when you assign combat damage, this monster may deal its attack value in damage to an attacking monster.',
    '35204Doomcaliber Knight|Dark Cavalry|If an opponent uses a global ability, you must spin this monster down one level to cancel the ability and prevent that ability from being used again this turn. <em>(You cannot spin down a level 1 monster, so it does not cancel.)</em>',
    '36304Flame Swordsman|Salamandra Flamestrike|When summoned, your attacking monsters get +1A and +1D until the end of the turn.',
    '36304Gaia the Fierce Knight|Dextrous Jouster|While this monster is active, whenever an opponent summons a level 3 monster, deal 2 damage to that opponent.',
    '34204Goblin Attack Force|Unruly Throng|This monster must attack <em>(if legal)</em>. If you are damaged, knock this monster out.|Global: Pay [F]. Target monster must block this turn <em>(if legal)</em>.',
    '33204Harpie Lady|Flurry of Feathers|When summoned, until the end of the turn, you may place dice you buy into your bag.',
    '36204Harpie Lady Sisters|Trio of Terror|When this monster is attacking, after blockers are assigned, it deals 1 damage to your opponent for each opposing monster that does not block.',
    '34204Injection Fairy Lily|Fairy Nurse|When you attack, you may move one of your monsters in the field to the used pile to make this monster unblockable.',
    '36404Jinzo|Trap Destroyer|While this monster is active, your opponent must pay 2 life to use an action die or global ability.',
    '33404Kuriboh|Explosive Body|When this monster is knocked out in battle, deal damage equal to its defense to an opposing monster.',
    '34204La Jinn the Mystical Genie of the Lamp|The Power of the Lamp|When one of your monsters is knocked out, you may spin <em>(all copies of)</em> this monster up one level.',
    '35404Lord of D.|Dragonkin|While this monster is active, damage to your [S] monsters from [F] or [B] monsters is reduced by 2.|Global: Pay [S]. Target "Dragon" gets +1A and +1D.',
    '34204Man-Eater Bug|Gaping Maw|When this monster is knocked out in combat, knock out an opposing monster of equal or lower level.',
    '33404Marshmallon|Bites Back|If this monster is knocked out while blocking, your opponent takes 1 damage at the end of combat and this monster goes to your used pile.',
    '33104Morphing Jar|Field Reset|When summoned, choose one die in each player\'s prep area. Put those dice in the used pile and replace them with random dice drawn from that player\'s bag.',
    '34404Mystical Elf|Protector|When this monster blocks, reduce damage to your monsters by 1 from each source.|Global: Pay [S]. Target monster gets +1D.',
    '382B1Obelisk the Tormentor|Fist of Fury|While this monster is active, your opponent cannot reroll dice. Your opponent can pay 2 life to cancel this effect for the turn.',
    '37302Red-Eyes B. Dragon|Claws of Steel|When summoned, level 1 monsters cannot block this turn.|* When summoned, knock out up to two level 1 monsters.',
    '34103Ring of Magnetism|Monster Attraction|Play on a monster. Your opponent can only block monsters affected by this die until each such monster with this die has been assigned two blockers.',
    '34104Saggi the Dark Clown|Dark Slayer|Instead of attacking, this monster may deal 2 damage to an opponent\'s monster.',
    '34404Sangan|Sacrificial Fiend|When this monster gets knocked out, you may pull two dice from your bag. If both are monsters, put them into your prep area; otherwise return them to your bag.',
    '373B1Slifer the Sky Dragon|Lightning Blast|Global: Pay [B] to deal 1 damage to target monster.',
    '36304Summoned Skull|Lightning Strike|When summoned, whenever you summon a [B] monster for the rest of the turn, deal 1 damage to a target player.|Global: Pay [B] when target monster you control damages an opponent to put it into your bag instead of the used pile.',
    '36301Thousand Dragon|Noxious Nostril Gust|Fusion: Before your attack, if you move two different [TDF] from the field to your prep area, you may move this die from this card to your prep area.|Global: Pay [B]. The next action die you buy this turn costs 2 less energy.',
    '341A4Time Wizard|Time Magic|When summoned, draw a die from your bag and roll it. If it rolls a monster face, your opponent chooses and knocks out one of his monsters. Otherwise, knock out one of your sidekicks. Return the rolled die to your bag.',
    '35103Trap Hole|Wide|Determine the lowest attack value of a non-sidekick monster. Knock out all monsters <em>(both players\', including sidekicks)</em> with that attack value.',
    '383B1The Winged Dragon of Ra|The Most Powerful Egyptian God|When summoned, reroll all opposing [S] monsters. Move each die that does not roll a monster face to the prep area.',
    '482B1Obelisk the Tormentor|Intimidator|While this monster is active, your opponent must pay 1 life to summon a monster.',
    '483B1Slifer the Sky Dragon|Thunderforce Attack|When summoned, knock out all opposing sidekicks. While this monster is active, sidekicks cost 3 extra energy to summon.|Global: Pay [B] and move a sidekick die from your prep area to the used pile to deal 1 damage to target player.',
    '46301Thousand Dragon|Noxious Vapor Gust|When summoned, opposing monsters knocked out in combat this turn go to the used pile.|Fusion: Before your attack, if you move two different [TDF] from the field to your prep area, you may move this die from this card to your prep area.',
    '483B1The Winged Dragon of Ra|Blaze Cannon|When this monster attacks, spin down all monsters except Egyptian Gods one level.',
    '04003Change of Heart|Basic Action Card|At the start of your attack step, take control of an opponent\'s monster with a level lower then one of your monsters. Attack with it.|* Instead, you may take control of a monster of equal level.',
    '03003Crush Card Virus|Basic Action Card|Knock out one of your monsters in the field to knock out an opponent\'s monster up to 1 level higher than yours.',
    '03003Horn of the Unicorn|Basic Action Card|Two of your monsters get +1A and +1D.|*/** Damage those monsters deal in excess of the total defense of their blockers is dealt to your opponent.|Global: Pay [B]. Target monster gets +1A.',
    '04003Mirror Force|Basic Action Card|Knock out a level 1 monster.|** Knock out a level 1 or 2 monster instead.|Global: Pay [F]. Target blocked monster deals no damage.',
    '04003Mirror Wall|Basic Action Card|Place this die on an opposing monster. That monster has half of its normal attack and defense, rounded down. Return this die to your used pile when the monster is knocked out.',
    '03003Monster Reborn|Basic Action Card|Roll a monster from your used pile. If it rolls a monster face, summon it at no cost. Otherwise, place the die in your bag.',
    '03003Mystic Box|Basic Action Card|Choose an opposing monster. Your opponent draws a die. If it is a monster, replace the chosen monster with that die at its lowest level. Otherwise, return the die to the bag.|Global: Pay [S]. Swap the attack value of one of your monsters with that of one opposing monster.',
    '04003Spellbinding Circle|Basic Action Card|Place this die on an opposing monster. That monster cannot attack. Return this die to your used pile when the affected monster is knocked out.',
    '04003Swords of Revealing Light|Basic Action Card|Choose one monster. That monster can\'t attack until the start of your next turn.|Global: Pay [M]. Target monster cannot block this turn.',
    '03003Waboku|Basic Action Card|Place this die touching one of your monsters. That monster cannot be knocked out while blocking. Place this die in your used pile at the end of your opponent\'s turn.',
    ];
    var uxmop2 = [
    '54324Hawkeye|Avengers Disassembled|Once per turn, during your Main Step, you may knock out a Hawkeye die you control. If you do, you may deal damage equal to his attack divided any way you choose to your opponent\'s characters.',
    '56344Scarlet Witch|Avengers Disassembled|While Scarlet Which is active, all [AV] characters get -2A and -3D.',
    '55224She-Hulk|Avengers Disassembled|She-Hulk may only attack if your opponent has a character active.',
    ];
    var uxmop = [
    '57114Magneto|Heir to the Dream|While active, if your opponent has no active Villain characters, draw an additional die during the clear and draw step.',
    '57343Apocalypse|Earth-295|When fielded, reroll all other non-Apocalypse characters.|Your opponent takes 2 damage for each of his or her dice that rolled energy.',
    '54144Beast|Nefarious Geneticist|When Beast blocks, you may purchase a die with a cost 2 or lower for free.|* You may purchase a die with a cost three or lower instead.',
    '56444Sentinel|Omega|Sentinel takes 2 less damage from characters with the X-Men affiliation that it is engaged with.',
    '54114Kitty Pryde|On a Mission|You may spin down a friendly character with the X-Men affiliation to give Kitty Pryde +2A and +2D until the end of your turn <em>(you may use this ability any time you could use a Global Ability)</em>.',
    '56214Wolverine|Wanted|Wolverine may attack a character with the Villain affiliation in the field instead of your opponent <em>(he may be blocked normally)</em>.',
    '55314Marvel Girl|Humanity|When you are attacked, you may spin up Marvel Girl one level. If you do, gain 2 life.',
    '55444Emma Frost|White Queen|When fielded, you may pay [S] to replace an opposing [F] character with a Sidekick from the opponent\'s used pile.',
    '57344Phoenix|Dark Phoenix|When fielded, KO a target character with the X-Men affiliation. If that character is named Wolverine or Cyclops, deal 2 damage to its owner.',
    ];
    var uxm = [
    '03414Angel|Air Transport|When fielded, you may field a Sidekick die from your used pile <em>(spin it to its character side)</em>.',
    '03414Angel|Inspiring|When Angel attacks, your Sidekicks get +1A and +1D <em>(no matter how many Angel dice attack)</em>.',
    '03414Angel|Superhero|Heroic: When fielded, Angel may pair up with a different Heroic character until the start of your next turn.|Once per turn while Angel is paired up, you may pay [S] to give Angel and his partner each +2D.',
    '06314Cyclops|Optic Blast|When fielded, Cyclops deals 3 damage to an opposing character. Your opponent may pay 3 life to prevent this.',
    '06314Cyclops|Overlook|When fielded, Cyclops deals 1 damage to your opponent and each opposing character.',
    '05314Cyclops|Superhero|Heroic: When fielded, Cyclops may pair up with a different Heroic character until the start of your next turn.|While Cyclops is paired up, he and his partner each deal 1 damage to the opponent when assigned to attack.',
    '04314Iceman|Cryokinetic|',
    '05314Iceman|Robert Louis Drake|You may pay [B] to give Iceman +1A and +1D.',
    '05314Iceman|Too Cool for Words|Once per turn, you may pay [B] to double Iceman\'s attack.|Global: Pay [B] to spin any number of your Sidekick dice to their [B] side <em>(if active, move them to your reserve pool)</em>.',
    '06444Juggernaut|Cain Marko|When Juggernaut takes damage, you may move any or all of your Sidekicks to your used pile. Prevent up to 3 damage to Juggernaut per Sidekick moved.',
    '07444Juggernaut|Unstoppable|Once per turn, you may move one of your Sidekicks to your used pile to give Juggernaut +4A and +4D.',
    '06444Juggernaut|Archvillain|When fielded, if your opponent has no Villains in the field, you may move one of your Sidekicks to your used pile to deal 1 damage to your opponent and gain 1 life.',
    '02114Kitty Pryde|Ariel|',
    '03114Kitty Pryde|Sprite|Kitty Pryde cannot be blocked by Sidekicks.',
    '04114Kitty Pryde|Shadowcat|Kitty Pryde cannot be blocked on the turn she is fielded.|Global: Pay [M]. Target character cannot attack this turn unless its owner pays 1 life.',
    '06144Magneto|Field Control|When fielded, you may pay [M][M] to move a character from the field or reserve pool to its owner\'s prep area.',
    '05144Magneto|Will to Live|If Magneto leaves the field, he goes to your prep area instead of the used pile or dice bag.',
    '06144Magneto|Archvillain|If your opponent has no Villains in the field, Magneto gains +3A and +3D.',
    '03314Quicksilver|Pietro Maximoff|When fielded, Quicksilver deals 1 damage to one opposing character.',
    '04314Quicksilver|Thanks to Isotope E|When fielded, Quicksilver deals 1 damage to each opposing Sidekick.',
    '04314Quicksilver|Former Villain|When Quicksilver is blocked, he deals 1 damage to each opposing character <em>(this extra damage resolves before normal combat damage is assigned)</em>.',
    '05214Wolverine|The Best There Is|Wolverine deals double damage to characters that block him.',
    '06214Wolverine|Not Very Nice|When Wolverine is blocked, you may pay [F][F] to have him deal damage equal to his attack to one character blocking him <em>(this extra damage resolves before normal combat damage is assigned)</em>.',
    '06214Wolverine|Superhero|Heroic: When fielded, Wolverine may pair up with a different Heroic character until the start of your next turn.|While Wolverine is paired up, he and his partner can only be blocked by two or more characters <em>(each)</em>.',
    '03003Ambush|Basic Action Card|One of your characters gets +1A for each character your opponent has in the field.',
    '03003Enrage|Basic Action Card|Choose a character. That character must attack at its next opportunity. Spin that character up one level <em>(if able)</em>.|Global: Pay [B]. Give one character +1A.',
    '03003Feedback|Basic Action Card|Deal 1 damage to your opponent for each of his characters that is knocked out for the rest of this turn.',
    '04003Imprisoned|Basic Action Card|This die captures any number of opposing characters with a total fielding cost of 2 or less. This effect lasts until canceled or you damage your opponent <em>(return the captured die to the field)</em>.',
    '04003Possession|Basic Action Card|At the start of your attack step, take control of an opposing character with a level lower than one of your characters. Attack with it.|** Instead, take control of an opposing character with an equal or lower level.',
    '03003Reckless Melee|Basic Action Card|Deal 1 damage to each character <em>(including yours)</em>.|* Instead, deal 1 damage to each player.|** Instead, deal 1 damage to each player and 1 damage to each character.',
    '04003Relentless|Basic Action Card|Spin this die to a generic energy side. Reroll a character or Sidekick die from your reserve pool.|Global: Pay [M]. Target character cannot block.',
    '04003Selective Shield|Basic Action Card|Choose an energy type. Characters of that type cannot attack until your next turn.|** Also choose one character of that type. That character cannot block until your next turn.|Global: Pay [F]. Target blocked character deals no damage.',
    '03003Take That, Villain!|Basic Action Card|Deal 3 damage to a Villain.|** Deal an extra 1 damage to that Villain.',
    '03003Transfer Power|Basic Action Card|Roll a character die from your used pile. If it rolls a character face, field it at no cost. Otherwise, place it in your bag.|Global: Pay [S]. Swap the attack value of one of your characters with that of one opposing character.',
    '12224Ant-Man|Biophysicist|',
    '16344Apocalypse|Awakened|Apocalypse gets +5D on the turn he is fielded.',
    '15414Bishop|Omega Squad|Bishop cannot be damaged by [B] characters.',
    '14224Black Panther|Wakanda Chief|Black Panther can only attack if your opponent has a character in the field.',
    '14304Cable|Man of Action|When Cable is blocked, deal 1 damage to an enemy character.|Global: Pay [B][B]. Deal 1 damage to target enemy character. That character must block this turn <em>(if able)</em>.',
    '15424Captain America|Special Ops|When fielded, move an opposing Villain to the prep area.',
    '15444Emma Frost|Archvillain|If your opponent has no Villain characters active, prevent all damage to Emma Frost from [F] characters.',
    '12224Falcon|Samuel Wilson|',
    '15424Iron Man|Upright|Iron Man takes 1 less damage from Villains.|* Iron Man takes 2 less damage instead.|Global: Pay [S]. Target character gains the Villain affiliation.',
    '14104Magik|Illyana Rasputina|When Magik is knocked out, reroll her die. If you roll a character face, return Magik to the field.',
    '16314Marvel Girl|Telekinetic|When fielded, spin each opposing character down one level <em>(if able)</em>.',
    '16344Mister Sinister|Archvillain|While Mr. Sinister is active, if your opponent has no Villain characters fielded, each of your characters gains +2D.',
    '13144Mystique|Ageless|Mystique gets +1A and +1D for each die in your prep area.',
    '15414Namor|The Sub-Mariner|If you have at least two other characters fielded, Namor cannot be blocked.',
    '16114Professor X|Recruiting Young Mutants|When fielded, search your bag for up to 2 Sidekick dice and roll them.|Global: Pay [M]. Move up to 2 Sidekick dice from your used pile to your prep area.',
    '14114Psylocke|Betsy Braddock|When fielded, move one opposing character with cost 2 or less, including Sidekicks, to the used pile.',
    '14344Pyro|Saint-John Allerdyce|When Pyro is blocked, he deals 1 damage to your opponent.',
    '16204Red Hulk|Thunderbolt Ross|* If Red Hulk is damaged in an attack phase but not knocked out, spin him up one level at the end of the turn.',
    '14244Sabretooth|Something to Prove|At the beginning of your turn, spin each of your fielded Sabretooth dice up one level.',
    '13344Scarlet Witch|Wanda Maximoff|When fielded, Scarlet Witch deals 1 damage to each opposing X-Men character for each other Villain you have in the field.',
    '16444Sentinel|Mutant Hunter|When Sentinel attacks, you can force one X-Men character to block it <em>(if able)</em>.',
    '15224She-Hulk|Jennifer Walters|If She-Hulk is blocked, spin her up one level <em>(this happens before damage is assigned)</em>.',
    '15204Spider-Man|Hero for Hire|When Spider-Man attacks, choose one opposing character. That character cannot block.',
    '12114Storm|Weather Witch|Storm takes no damage from action dice.|Global: Pay [M]. Change the target of an action die that targets a character die to the character die of your choice.',
    '15244Toad|Tongue Lashing|While Toad is active, each opposing non-Sidekick character must attack <em>(if legal)</em>.|* Opposing characters take 2 damage when they attack.',
    '14124Vision|Density Control|When Vision blocks, you may spin him up one level.',
    '14204X-23|Scent of Murder|X-23 cannot block.',
    '15101Cerebro|Cybernetic Intelligence|Place Cerebro on an X-Men die\'s card. It remains there until you or a card effect removes it <em>(it is still in the field)</em>. When you field a die from that card, knock out one opposing die.',
    '23414Angel|Flying High|When Angel attacks, all other [S] characters must be blocked before Angel dice can be blocked.',
    '23224Ant-Man|Pym Particles|Ant-Man gets +2D while attacking.|Global: Pay [F]. Switch the A and D values of one of your characters.',
    '26342Apocalypse|Archvillain|While your opponent has no Villain characters fielded, prevent all damage to Apocalypse.',
    '24404Bishop|Branded a Mutant|Bishop gets +2A when engaged with a [B] character.',
    '25204Black Panther|T\'Challa|Black Panther gets +2A when attacking alone.',
    '25304Cable|Techno-Organic|When Cable is blocked, deal 2 damage to each enemy character.|Global: Pay [B][B]. Deal 1 damage to target enemy character. That character must block this turn <em>(if able)</em>.',
    '24424Captain America|"Follow Me!"|When fielded, the next character you field this turn can be fielded for free.',
    '25314Cyclops|Field Leader|While Cyclops is active, whenever one of your [B] characters deals damage, increase that damage by one <em>(no matter how many Cyclops dice you have fielded)</em>.',
    '23204Falcon|Recon|When Falcon attacks, your Sidekicks can\'t be blocked.',
    '24314Iceman|Mister Friese|The first time each turn you field another character, Iceman gains +3A <em>(no matter how many Iceman dice you have fielded)</em>.',
    '25444Juggernaut|Kuurth|If your opponent has no Villains in the field, each Juggernaut die can block one additional opposing die <em>(no matter how many Juggernaut dice you have fielded)</em>.',
    '25114Kitty Pryde|Just a Phase|When Kitty Pryde is blocked, you may pay [M] to move one character blocking her out of the attack zone <em>(it remains in the field; Kitty Pryde remains blocked)</em>.',
    '24114Magik|Lightchylde|When Magik blocks, draw a die from your bag. If it is not a Sidekick, remove Magik and the attacker from the attack zone <em>(they remain in the field)</em>. Return the drawn die to your bag.',
    '27144Magneto|Hellfire Club|While Magneto is active, if your opponent has no Villains in the field, he takes 2 damage each time he draws one or more dice from his bag.',
    '25314Marvel Girl|Superhero|Heroic: When fielded, Marvel Girl may pair up with a different Heroic character until the start of your next turn.|While Marvel Girl is paired up, when she or her partner attacks, you may spin down one non-Heroic character and gain 1 life.',
    '25344Mister Sinister|Nasty Boy|While Mr. Sinister is active, whenever a Villain is knocked out <em>(either player\'s)</em>, deal 1 damage to your opponent.|Global: Pay [B][B]. Each player chooses one of his characters to take 3 damage.',
    '23144Mystique|Raven Darkholme|Mystique gets +1A and +1D for each other Villain in the field <em>(both players\')</em>.',
    '24424Namor|Atlantean|When Namor blocks, you may cancel one active action effect. Move that action die to its owner\'s used pile if necessary.',
    '26114Professor X|Founder|Heroic: When fielded, Professor X may pair up with a different Heroic character until the start of your next turn.|While Professor X is paired up, gain 1 life when either he and/or his partner attack.',
    '23104Psylocke|Ninjutsu|When fielded, choose one opposing Sidekick or character with a purchase cost of 2 or less. If it is at level one, knock it out. Otherwise, spin it down one level.',
    '24344Pyro|Pyrokinetic|When Pyro attacks, pay up to [B][B]. Deal 1 damage to your opponent for each [B] spent.|Global: Pay [B]. Draw and roll 2 dice from your bag. Keep any [B] results rolled. Return the rest to your bag.',
    '24344Quicksilver|Villainous|When Quicksilver is fielded or knocked out, deal 2 damage to each X-Men character in play <em>(including yours)</em>.',
    '27204Red Hulk|a.k.a. Rulk|While Red Hulk is active, when an opposing Sidekick is knocked out, your opponent loses 1 life <em>(no matter how many Red Hulk dice you have fielded)</em>.|* If Red Hulk knocks out a Sidekick, your opponent loses 2 additional life.',
    '24244Sabretooth|Survivor|When Sabretooth takes enough damage to knock him out while he is at level 2 or 3, spin him down one level and reduce the damage he has taken to zero.',
    '27442Sentinel|Archvillain|When fielded, if your opponent has no Villains fielded, knock out all opposing X-Men characters. Your opponent takes 1 damage for each character knocked out in this way.|Global: Pay [S]. One X-Men character must block this turn <em>(if able)</em>.',
    '25204She-Hulk|Lady Liberator|She-Hulk can only be blocked by two or more characters.',
    '23114Storm|Superhero|Heroic: When fielded, Storm may pair up with a different Heroic character until the start of your next turn.|While Storm is paired up, she and her partner can\'t be targeted by action dice.',
    '24244Toad|Sniveling Servant|While Toad is active, when your opponent commits a character to attack, choose one opposing character who must also attack. If Toad blocks that character, cut its attack value in half <em>(round down)</em>.',
    '24124Vision|Android|Vision takes no damage from [M] characters.',
    '25204Wolverine|Antihero|Heroic: When fielded, Wolverine may pair up with a different Heroic character until the start of your next turn.|While Wolverine is paired up, prevent all damage to him and his partner from [F] and [S] dice.',
    '26204X-23|Assassin|When X-23 attacks, choose a [F] or [B] character. That character must block her <em>(if able)</em>.',
    '23103Cerebro|Supercomputer|Place Cerebro on a character card. It remains there until you or a card effect removes it <em>(it is still in the field)</em>. Your opponent\'s dice from that card cost a minimum of 2 energy to field. This cost can\'t be reduced.',
    '33224Ant-Man|The Insect World|When fielded, you may pay 1 life to spin Ant-Man up one level.|Global: Pay [F]. Switch the A and D values of one of your characters.',
    '36344Apocalypse|Time of Testing|* After Apocalypse is knocked out, return him to the field and spin him down one level.',
    '35404Bishop|XSE|For each 2 damage dealt to Bishop in combat, deal 1 damage to an opposing character.',
    '35224Black Panther|Diversion|If Black Panther does not attack, you may choose an opposing non-[F] character. That character cannot block.',
    '35314Cable|Time Traveler|When Cable is blocked, you may pay [B][B] to have him damage your opponent <em>(instead of his blockers)</em> as though he were not blocked.|Global: Pay [B][B]. Deal 1 damage to target enemy character. That character must block this turn <em>(if able)</em>.',
    '35424Captain America|Superhero|Heroic: When fielded, Captain America may pair up with a different Heroic character until the start of your next turn.|While Captain America is paired up, he and his partner each gain +4A and +4D.',
    '34414Emma Frost|Graceful|While Emma Frost is active, opposing [F] characters get -1A <em>(no matter how many Emma Frost dice you have fielded)</em>.',
    '33204Falcon|Air Strike|When fielded, you may move one of your Sidekicks to your used pile to deal 2 damage to an opposing character.',
    '35424Iron Man|Superhero|Heroic: When fielded, Iron Man may pair up with a different Heroic character until the start of your next turn.|While Iron Man is paired up, prevent the first 2 damage dealt to Iron Man and his partner.',
    '35104Magik|Redflag #133|After Magik damages an opponent, reroll her die until you roll a [M] face. Deal 1 damage to your opponent for each character face you rolled before rolling a [M]. Place Magik in your used pile.',
    '35314Marvel Girl|Telepath|When fielded, you may pay [B] to spin one character down a level and spin Marvel Girl up one level <em>(you must do both)</em>.',
    '35344Mister Sinister|Nathaniel Essex|If Mr. Sinister and one of your Sidekicks are knocked out in the same turn, return Mr. Sinister to the field <em>(at his same level)</em>.|Global: Pay [B][B]. Each player chooses one of his characters to take 3 damage.',
    '34144Mystique|Alias: You|When Mystique attacks, she gains the attack value and all assigning and attacking abilities of one opposing character.',
    '34404Namor|Imperius Rex|If Namor is the only character in your field at the end of any turn, field up to two Sidekick dice from your used pile or prep area <em>(spin them to their character face)</em>.',
    '35114Professor X|Trainer|While Professor X is active, your Sidekicks get +1A and +1D <em>(no matter how many Professor X dice you have fielded)</em>.|Global: Pay [M]. Move up to 2 Sidekick dice from your used pile to your prep area.',
    '32104Psylocke|Kwannon the Assassin|When fielded, you may pay [M][M] to knock out one character.',
    '35344Pyro|Uncontrolled|When Pyro attacks, roll all the dice in your used pile. Deal 1 damage to your opponent for each [B] rolled. Return the dice to your used pile.|Global: Pay [B][B]. Draw and roll 2 dice from your bag. Keep any [B] results rolled. Return the rest to your bag.',
    '37224Red Hulk|Superhero|Heroic: When fielded, Red Hulk may pair up with a different Heroic character until the start of your next turn.|While Red Hulk is paired up, he and his partner each gain +3A.',
    '35244Sabretooth|Superpowered|Heroic: When fielded, Sabretooth may pair up with a different Heroic character until the start of your next turn.|While Sabretooth is paired up, spin him and his partner to level 3 at the end of your turn.',
    '33324Scarlet Witch|Unity Squad|On the turn after Scarlet Witch is fielded, you may make your opponent reroll one die from his initial roll <em>(before he rerolls dice)</em>.',
    '36444Sentinel|Robot|Sentinel gets +1A and +1D for each X-Men character your opponent has in the field.|Global: Pay [S]. One X-Men character must block this turn <em>(if able)</em>.',
    '36204She-Hulk|Superhero|Heroic: When fielded, She-Hulk may pair up with a different Heroic character until the start of your next turn.|While She-Hulk is paired up, gain 2 life each time she and/or her partner is blocked.',
    '34204Spider-Man|Spider Sense|Spider-Man takes half damage <em>(rounded down)</em> from [F] characters.',
    '33114Storm|Lady Liberator|Each turn, you may redirect the first 2 damage dealt to Storm by action dice to your opponent.|Global: Pay [M]. Change the target of an action die that targets a character die to the character die of your choice.',
    '34244Toad|Mortimer Toynbee|While Toad is active, when your opponent ends his main step, choose one opposing character who must attack this turn.|* That character takes 2 damage.',
    '35124Vision|Victor Shade|If an attacking [M] or [F] character deals damage to Vision, Vision deals an equal amount of damage to that attacker <em>(in addition to his normal blocking damage)</em>.',
    '35204X-23|Killing Machine|X-23 must attack if your opponent has a character of cost 5 or higher fielded.|X-23 gets +1D when attacking.',
    '34102Cerebro|Mutant Hunter|Place Cerebro on a die\'s card. It remains there until you or a card effect removes it <em>(it is still in the field)</em>. At the start of your turn, you may move Cerebro to your used pile to search your bag for a die from that card and roll it.',
    '45444Emma Frost|Hellfire Club|Whenever Emma Frost is damaged by a [F] character, redirect the first 1 damage from her to your opponent.',
    '46424Iron Man|Industrialist|Cancel all damage that Villains deal to Iron Man.|* Double Iron Man\'s attack value while he is engaged with a Villain.|Global: Pay [S]. Target character gains the Villain affiliation.',
    '44314Scarlet Witch|Controls Probability|While Scarlet Witch is active, you may reroll any or all of your dice one additional time during the roll and reroll step.',
    '45204Spider-Man|Superhero|Heroic: When fielded, Spider-Man may pair up with a different Heroic character until the start of your next turn.|While Spider-Man is paired up, when he and/or his partner are knocked out, each may deal its attack in damage to a [B] or [M] character.',
    ];
    var avxop = [
    '53003Teamwork|Basic Action Card|Each of your fielded characters gains +1A and +1D for each other of your fielded characters that shares a team affiliation with it.',
    '53003Rally!|Basic Action Card|Move up to 2 Sidekicks from your used pile to the field.|** Move 3 Sidekicks instead.',
    '53003Deflection|Basic Action Card|Choose an energy type. Characters of that type get +1D.|** Those characters get +3D instead.|Global: Pay [S]. Prevent 1 damage to a character.',
    '54003Teleport|Basic Action Card|Swap your fielded character with a character die of the same energy type from your used pile or prep area. Spin it to the same level.|*/** Spin the new character up a level.',
    '54003Collateral Damage|Basic Action Card|Deal one damage to your opponent for each opposing character you knock out this turn.',
    '53003Takedown|Basic Action Card|Deal 2 damage to a non-[S] character. If it is a Villain, deal 4 damage instead.|Global: Pay [M]. Target character is gains the Villain affiliation until the end of the turn.',
    '57324Thor|The Mighty|When fielded, you may knock out an opposing [F] character and gain life equal to its level.',
    '56224Spider-Man|The Amazing|When Spider-Man attacks, you may pay [F][F][F] to make your opponent lose half his life, rounded down <em>(before damage is dealt)</em>.',
    '57202Wolverine|Walking His Own Path|When Wolverine attacks alone, double your life. This effect cannot raise your life to a value higher than 10.',
    '58252Colossus|Phoenix Force|While Colossus is active, knock out the non-Sidekick character with the lowest cost at the end of your turn <em>(you break ties)</em>.|Global: Pay [F][F]. Double the attack and defense of one of your fielded Phoenix Force dice this turn. Limit once per turn.',
    '57422Iron Man|Phoenix Buster|Each time Iron Man takes damage, you may move 1 Sidekick from your used pile to your prep area.',
    '58352Cyclops|Phoenix Force|When Cyclops is blocked, your opponent must immediately knock out one of his other characters if able.|Global: Pay [F][F] on your turn. Move a Phoenix Force die from your used pile to the field at its lowest level.',
    '5A351Phoenix Force|Force of Nature|While Phoenix Force is active, each of your opponent\'s characters deals no more than 1 damage to you while attacking.',
    ];
    var avx = [
    '02114Beast|Big Boy Blue|Beast gets +1A and +1D <em>(until the end of the turn)</em> when he blocks.|* He gets +2A and +2D instead.',
    '02114Beast|Genetic Expert|If Beast is knocked out while blocking, you gain 1 life.|* Your opponent also takes 2 damage.',
    '02114Beast|Mutate #666|When Beast blocks, draw one die and place it in your prep area.|* Instead draw 2 dice; place one in your prep area and the other in your used pile.',
    '04424Captain America|American Hero|When fielded, you may roll a Sidekick die from your used pile <em>(you cannot select a die that paid to field this one; place the die in your reserve pool)</em>.',
    '04424Captain America|Natural Leader|While Captain America is active, your Sidekick characters get +1A and +1D <em>(no matter how many Captain America dice you have fielded)</em>.',
    '05424Captain America|Star-Spangled Avenger|When fielded, knock out each of your opponent\'s Sidekick characters. Gain 1 life for each Sidekick knocked out this way.',
    '07224Hulk|Anger Issues|While Hulk is active, when either you or Hulk takes damage, Hulk gets +2A and +2D <em>(until the end of the turn)</em>.|* Hulk gets +3A and +3D instead.',
    '06224Hulk|Annihilator|While Hulk is active, when either you or Hulk takes damage, move all Hulk dice from your used pile to your prep area.',
    '06224Hulk|Jade Giant|While Hulk is active, when either you or Hulk takes damage, knock out one of your opponent\'s level 1 characters.|* Instead knock out one opposing character of any level.',
    '04334Human Torch|"Flame On!"|While Human Torch is active, he deals 1 damage to a character or player each time you field a character <em>(not 1 damage per die)</em>.|Global: Pay [B] when you deal damage with an action die or global ability to deal one extra damage to one target.',
    '03334Human Torch|Matchstick|While Human Torch is active, each time you field a character, you may roll one Human Torch from your used pile <em>(not one that paid to field that die)</em>. If you roll a character side, place it in your reserve pool; otherwise place it in your used pile.',
    '02334Human Torch|Playing with Fire|The first time you field a character each turn, each Human Torch already in the field gets +1A and +1D <em>(until the end of the turn)</em>.',
    '04424Iron Man|Inventor|Each time Iron Man takes damage, reduce the damage he takes by 1.|* Reduce the damage by 2 instead.|Global: Pay [S] to redirect 1 damage from you to one of your characters.',
    '05424Iron Man|Philanthropist|Each time Iron Man takes damage, you gain 1 life.|* Gain 2 life instead.',
    '04424Iron Man|Playboy|Each time Iron Man takes damage in the attack step, he deals 3 damage to one opposing character that is attacking or blocking.',
    '04204Spider-Man|"Tiger"|You may pay [F] to prevent Spider-Man from being affected by an ability or game effect <em>(other than damage from a character engaged with him)</em>.',
    '04204Spider-Man|Webhead|When Spider-Man assigns to attack, you may pay [F] to give him +4D <em>(you can only do this once per turn per die)</em>.',
    '05204Spider-Man|Webslinger|When Spider-Man assigns to attack, you may pay [F] to force every opposing character to block him if able.',
    '03114Storm|African Priestess|When fielded, reroll a target opposing character. If the result is not a character, place that die in your opponent\'s used pile.',
    '04114Storm|Goddess of the Plains|When Storm attacks, reroll each of your opponent\'s characters. Place any die that does not result in a character in your opponent\'s prep area.',
    '02114Storm|\'Ro|After blockers are assigned, reroll all characters engaged with Storm. Place each such die that does not show a character in your opponent\'s prep area.',
    '06324Thor|Legendary Warrior|When Thor damages your opponent, knock out an opposing [F] character.',
    '06324Thor|Lord of Asgard|Thor can\'t be blocked by [F] characters.',
    '06324Thor|Odinson|When fielded, capture all opposing [F] characters <em>(return them at the end of the turn)</em>.',
    '04003Distraction|Basic Action Card|Your opponent targets two of his or her characters. Those characters cannot block <em>(this turn)</em>.|Global: Pay [M] to remove one attacker from the attack zone to the field.',
    '03003Focus Power|Basic Action Card|Spin one target character up or down one level.|*/** Spin another target character up or down one level.',
    '03003Force Beam|Basic Action Card|Deal 1 damage to each character <em>(including yours)</em>.|* Instead, deal 2 damage to each character.|** Instead, deal 1 damage to each player and 2 damage to each character.',
    '04003Gearing Up|Basic Action Card|Draw two dice from your bag and roll them <em>(place them in your reserve pool)</em>.',
    '03003Inner Rage|Basic Action Card|Two of your target characters get +1A and +1D <em>(until the end of the turn)</em>.|*/** Those characters get an additional +1A and +1D.',
    '02003Invulnerability|Basic Action Card|Your attacking characters that are knocked out <em>(this turn)</em> return to the field.|Global: Pay [B]. One target character gets +1A <em>(until the end of the turn)</em>.',
    '03003Power Bolt|Basic Action Card|Deal 2 damage to one target character or player.',
    '03003Smash!|Basic Action Card|Knock out a target level 1 character.|** Knock out a level 1 or level 2 character instead.|Global: Pay [F]. Target blocked character deals no damage.',
    '03003Take Cover|Basic Action Card|Your characters get +2D.|*/** One character gets an extra +3D.|Global: Pay [S] to give one target character +1D <em>(until the end of the turn)</em>.',
    '04003Thrown Car|Basic Action Card|Two of your target characters get +1A. While attacking, damage that those two characters deal in excess of the total defense of blocking characters is dealt to your opponent.',
    '13404Angel|High Ground|Angel cannot be blocked by a character with a lower level.',
    '12224Black Widow|Natural|At the end of the attack step, spin each character engaged with Black Widow down 1 level <em>(this happens before damage clears)</em>.',
    '16214Colossus|Unstoppable|At the end of your turn, spin each of your Colossus in the field up one level.',
    '15314Cyclops|Slim|When Cyclops is blocked by more than one character, he deals damage equal to his full attack to each character blocking him <em>(instead of having to split it)</em>.',
    '14204Deadpool|Assassin|When Deadpool attacks, you may assign an opposing character to block him.',
    '15444Doctor Doom|Reed Richards\' Rival|While Doctor Doom is active, each non-Villain character gets -1A and -1D <em>(no matter how many Doctor Doom dice you have fielded)</em>.',
    '16444Doctor Octopus|Megalomaniac|When Doctor Octopus assigns to attack, target an opposing character. That character cannot block <em>(this turn)</em>.',
    '17104Doctor Strange|Sorcerer Supreme|While Doctor Strange is active, you may purchase one action die for free during your main step <em>(not one action die per Doctor Strange die)</em>.',
    '13114Gambit|Ace in the Hole|When fielded, you may draw and roll one die <em>(place it in your reserve pool)</em>.|* Instead draw 2 dice, roll one of them and return the other to your bag.',
    '12304Ghost Rider|Johnny Blaze|<em>(No special effects; just a low-cost die with good numbers.)</em>',
    '13344Green Goblin|Goblin-Lord|While Green Goblin is active, your Sidekick characters get +1A and +1D <em>(no matter how many Green Goblin dice you have fielded)</em>.',
    '14323Hawkeye|Longbow|When fielded, Hawkeye deals his attack value in damage to a target opposing character.',
    '16144Loki|Trickster|When fielded, capture an opposing die of equal or lower level <em>(return it to your opponent\'s field at the end of the turn)</em>.',
    '15144Magneto|Former Comrade|Magneto gets +2A and +2D when engaged with an X-Men character.',
    '13134Mr. Fantastic|Brilliant Scientist|Mr. Fantastic gets +2A and +2D while blocking.|Global: Pay [M]. Target character must attack this turn.',
    '14144Mystique|Unknown|When Mystique is engaged, she copies the die stats and card abilities of one character that she is engaged with.|* She also gains an extra +1A and +1D.',
    '12404Nick Fury|Mr. Anger|While Nick Fury is active, you may field Avengers characters for free.',
    '15204Nightcrawler|Fuzzy Elf|Nightcrawler cannot be blocked by non-[M] characters.',
    '15304Nova|Quasar|Each time Nova takes damage, you may draw one die and put it in your prep area.',
    '16313Phoenix|Ms. Psyche|When Phoenix is engaged, she gains +2A and +2D.|Global: Pay [B]. Target character must attack.',
    '16113Professor X|Principal|While Professor X is active, your opponent cannot reroll dice during the roll and reroll step. He or she can pay 2 life to prevent this effect for this turn.',
    '14304Punisher|McRook|When Punisher assigns to attack, knock out one target opposing character. Your opponent may prevent this effect by paying 2 life.',
    '14114Rogue|Anna Raven|When fielded, you may capture an opposing die in the used pile <em>(return it at the end of the turn)</em>. Spin it to level 1. Rogue copies that die\'s stats.',
    '16404Silver Surfer|Silverado|At the start of the attack step, if your opponent has more life than you, Silver Surfer gets +2A and +2D.|Global: Once during your turn, pay [S] and take 2 damage to draw one die and place it in your prep area.',
    '16234Thing|Ever-Lovin\' Blue-Eyed|At the start of the attack step, if your opponent has more fielded characters than you, Thing can\'t be blocked and takes no damage while blocking.',
    '16244Venom|Eddie Brock|Non-[F] characters can\'t block Venom.|Global: Pay [F] to spin an opponent\'s [F] character down 1 level.',
    '15404War Machine|Combat Comrade|War Machine gets +2A and +2D if you have Iron Man in the field.|Global: When one of your [S] characters damages your opponent in the attack step, pay [S] to gain 1 life.',
    '15213Wolverine|Wildboy|When Wolverine attacks alone, you may spin one opponent\'s character down one level.',
    '16303Mjolnir|Fist of the Righteous|Deal 6 damage to each villain.|** Deal 8 damage to each villain instead.|Global: Pay [B][B] to deal 1 damage to a target character.',
    '14404Vibranium Shield|One of a Kind|At the start of your attack step, choose an energy type. This turn, characters of that type take no damage.|Global: Pay [S] to prevent 1 damage to a character or player.',
    '23404Angel|Avenging Angel|If Angel is blocked but is not knocked out, he deals 2 damage to the opposing player.',
    '23115Beast|Kreature|When Beast blocks, spin the blocked character down 1 level. If it is already level 1, knock it out.|* If the blocked character is knocked out by this, gain 2 life.',
    '26425Captain America|Sentinel of Liberty|While Captain America is active, your Sidekick characters get +2A, and your opponent\'s Sidekick characters cost 1 extra energy to field.',
    '27214Colossus|Russian Bear|* If Colossus damaged your opponent, return Colossus to the prep area instead of the used pile.',
    '27312Cyclops|If Looks Could Kill|When Cyclops is assigned to attack, before blockers are assigned, he deals his attack in damage to each opposing character.',
    '25204Deadpool|Jack|When Deadpool attacks, you may assign an opposing character to block him. At the end of the turn, knock out that character.',
    '26444Doctor Doom|Nemesis|Doctor Doom can only be blocked by Villain and Sidekick characters.|Global: If you have a Villain fielded, pay [S] to give a target character -1A and -1D <em>(knock out those with zero defense)</em>.',
    '26444Doctor Octopus|Fully Armed|When blocked, any damage that Doctor Octopus does in excess of his blocking characters\' total defense is dealt to your opponent.',
    '26104Doctor Strange|Master of the Mystic Arts|While Doctor Strange is active, each time you use an action he deals 2 damage to a character or opponent <em>(no matter how many dice are fielded)</em>.',
    '25114Gambit|Le Diable Blanc|When fielded, draw and roll 2 dice. Field characters rolled on those dice for free; place the rest in your used pile.|* Instead draw 3 dice, choose two to roll and return the other to your bag.',
    '24304Ghost Rider|Spirit of Vengeance|If Ghost Rider is knocked out while engaged, draw one die from your bag and place it in your prep area.',
    '23324Hawkeye|Br\'er Hawkeye|Spin characters damaged by Hawkeye to level 1.',
    '26225Hulk|Green Goliath|While Hulk is active, whenever either you or Hulk takes damage, Hulk deals 2 damage to each opposing character <em>(no matter how many Hulks are fielded)</em>.|* He deals 3 damage instead.',
    '24335Human Torch|Johnny Storm|While Human Torch is active, each time you field a character, Human Torch deals 1 damage to your opponent and one to a target character <em>(not 1 damage per Human Torch die)</em>.',
    '26425Iron Man|Billionaire|Iron Man takes no damage from non-[S] characters.',
    '27143Loki|Illusionist|When fielded, take control of an opposing character. At the end of the turn, knock out that character <em>(place it in your opponent\'s prep area)</em>; it deals damage equal to its attack to your opponent.',
    '26144Magneto|Holocaust Survivor|While Magneto is active, you may pay 2 energy to spin a Villain up one level.|Global: Pay [M] to reroll a Villain die.',
    '26144Mystique|Shapeshifter|When fielded, choose an opponent\'s character card. Mystique copies that card <em>(except purchase cost and the die faces)</em> until the next Mystique is fielded.|* She also copies the die faces <em>(matching level for level).</em>',
    '22404Nick Fury|WWII Veteran|While Nick Fury is active, your Avengers characters get +1A and +1D.',
    '24204Nightcrawler|Abandoned|At the end of the attack step, knock out one character that blocked Nightcrawler.',
    '26303Nova|Bucket Head|The first time Nova takes damage each turn, you may redirect that damage to one target character.',
    '27313Phoenix|Redd|When Phoenix is engaged, you may spend [B][B] to deal 4 damage to target character or opponent.|Global: Pay [B]. Target character must attack.',
    '25114Professor X|Powerful Telepath|While Professor X is active, your opponent cannot use actions or global abilities. He or she can pay 2 life to prevent this effect for the rest of the turn.',
    '25303Punisher|Vigilante|When Punisher assigns to attack, search your bag for a Punisher die and put it into your prep area. Your opponent can prevent this by paying 3 life.',
    '25114Rogue|Anna Marie|When fielded, capture an opposing action die from the used pile or reserve pool. When Rogue attacks, you may use that action for free <em>(with no bursts)</em>. Return it to the used pile after the attack step.',
    '26404Silver Surfer|Sentinel|While Silver Surfer is active, if your opponent has more life than you, draw one extra die each Clear and Draw Step.|Global: Once during your turn, pay [S] and take 2 damage to draw a die and place it in your prep area.',
    '24205Spider-Man|Wall-Crawler|If Spider-Man attacks and is not blocked, you may pay [F][F] to change your opponent\'s life to 10 <em>(before damage is dealt)</em>.',
    '25115Storm|Wind-Rider|When fielded, reroll up to 2 opposing characters. Each die that does not roll a character goes to your opponent\'s used pile. Storm deals 2 damage to your opponent for each die moved.',
    '25234Thing|Grim Ben|At the start of the attack step, if your opponent has more fielded characters than you, Thing gets +3A and +3D <em>(until the end of the turn)</em>.',
    '26325Thor|God of Thunder|At the start of each attack step, Thor gets +4A and +4D for each opposing [F] character in the field <em>(until the end of the turn)</em>.',
    '25244Venom|Mac Gargan|If Venom blocks and knocks out a non-[F] character, he deals 2 damage to your opponent and you gain 1 life.|Global: Pay [F] to spin an opponent\'s [F] character down 1 level.',
    '25404War Machine|Parnell Jacobs|War Machine can\'t be blocked if you have Iron Man fielded.|Global: When one of your [S] characters damages your opponent in the attack step, pay [S] to gain 1 life.',
    '26303Mjolnir|Forged by Odin|Deal 5 damage to target character.|* Deal an extra 1 damage.|** Deal an extra 3 damage.|Global: Pay [B][B] to deal 1 damage to a target character.',
    '26404Vibranium Shield|Irreplaceable|Place this die touching an opposing character. Opposing characters that match the character\'s type cannot attack or block until the end of your opponent\'s next turn. Then place this die in the used pile.|Global: Pay [S] to prevent 1 damage to a character or player.',
    '32404Angel|Soaring|If you used an action this turn, Angel cannot be blocked.',
    '32224Black Widow|Killer Instinct|When fielded, spin one target opponent\'s character down to level 1.',
    '37214Colossus|Piotr Rasputin|While Colossus is active, at the end of your turn, each of your characters of level 2 or higher deals 2 damage to your opponent <em>(not 2 damage per Colossus die)</em>.',
    '37314Cyclops|Scott Summers|If Cyclops is blocked, you may have him deal damage to your opponent instead of his blocker(s). If you do so, he goes to your used pile during cleanup.',
    '35204Deadpool|Chiyonosake|When Deadpool attacks, you may assign an opposing character to block him. If he knocks out that character, he deals 2 damage to each opposing character.',
    '36444Doctor Doom|Victor|When fielded, each player must knock out all but one of his or her non-Villain characters <em>(place those knocked out dice in that player\'s prep area)</em>.',
    '36444Doctor Octopus|Mad Scientist|When Doctor Octopus is blocked by more than one character, he deals his full attack value in damage to each character blocking him <em>(instead of having to split it)</em>.',
    '37104Doctor Strange|Probably a Charlatan|When fielded, search your bag for an action die and roll it <em>(place it into your reserve pool)</em>.',
    '35114Gambit|Cardsharp|When fielded, you may draw and roll one die. If you roll a character side, that character deals damage equal to its attack to your opponent and goes to your used pile <em>(otherwise, the die goes to your reserve pool)</em>.',
    '34304Ghost Rider|Brimstone Biker|When fielded, select a die from your used pile and place it into your prep area <em>(you cannot select a die that paid to field this die)</em>.',
    '34344Green Goblin|Norman Osborn|When fielded, you may roll up to 2 Sidekick dice from your used pile <em>(you cannot roll dice that paid to field this die; place rolled dice in your reserve pool)</em>.|Global: Pay [B] and knock out one of your Sidekick characters to deal 2 damage to a target character.',
    '33324Hawkeye|Robin Hood|When assigning damage in an attack step, Hawkeye assigns and resolves his damage before opposing characters.',
    '35144Loki|Gem-Keeper|When fielded, choose an opponent\'s character card, canceling all previous choices. Your opponent cannot field that character while Loki is active. This effect lasts until you field another Loki.',
    '36144Magneto|Sonderkommando|While Magneto is active, your other Villain characters get +2A and +2D <em>(no matter how many Magneto dice you have fielded)</em>.|Global: Pay [M] to reroll a Villain die.',
    '35133Mr. Fantastic|The Invincible Man|While blocking, you may redirect up to 2 damage from Mr. Fantastic to the character he blocks.|Global: Pay [M]. Target character must attack this turn.',
    '35144Mystique|Could Be Anyone|At beginning of your turn, choose an opposing fielded character. Each of your Mystique dice copies the stats on that character\'s die until your next turn.|* She also gains an extra +1A and +1D.',
    '34402Nick Fury|Patch|While Nick Fury is active, your unblocked Avengers characters deal damage to your opponent twice.',
    '34204Nightcrawler|Circus Freak|After assigning blockers, knock out one character blocking Nightcrawler <em>(before assigning damage)</em>.',
    '35304Nova|The Human Rocket|Whenever Nova takes damage in an attack step, he deals 2 damage to your opponent.',
    '37313Phoenix|Jeannie|At the end of the attack step, each character still engaged with Phoenix deals damage equal to its attack to your opponent. Knock out those characters.|Global: Pay [B]. Target character must attack.',
    '36114Professor X|Charles Francis Xavier|While Professor X is active, your opponent cannot field characters. He or she can pay 2 life to prevent this effect for the rest of this turn.',
    '36304Punisher|Big Nothing|When Punisher assigns to attack, he deals 2 damage to each opposing character. Your opponent can prevent this effect by paying 4 life.',
    '36114Rogue|Can\'t Touch This|When fielded, capture an opposing fielded character <em>(until the end of the turn)</em>. Rogue copies that character\'s stats and abilities.',
    '37404Silver Surfer|Sky-Rider|At the start of the attack step, if your opponent has more life than you, double Silver Surfer\'s attack and defense.|Global: Once during your turn, pay [S] and take 2 damage to draw a die and place it in your prep area.',
    '37234Thing|Idol of Millions|When fielded, if your opponent has more fielded characters than you, draw and roll 3 dice <em>(place them in your reserve pool)</em>.',
    '36244Venom|Angelo Fortunato|While Venom is active, your opponent\'s non-[F] characters get -2A and -2D.|* Your [F] characters get +1A and +1D.|Global: Pay [F] to spin an opponent\'s [F] character down 1 level.',
    '35404War Machine|James Rhodes|When fielded, if you have Iron Man fielded, knock out an opponent\'s character.|Global: When one of your [S] characters damages your opponent in the attack step, pay [S] to gain 1 life.',
    '34214Wolverine|Formerly Weapon Ten|When Wolverine attacks alone, he gains +4A and +4D.',
    '35303Mjolnir|Thor\'s Hammer|Deal 4 damage to all characters other than Thor <em>(yours and your opponent\'s)</em>.|* Deal 5 damage instead.|Global: Pay [B][B] to deal 1 damage to a target character.',
    '35404Vibranium Shield|Cap\'s Protection|Place this die touching your target character. It does not go to your used pile. You may place this die in the used pile at any time to prevent all damage to the character for the rest of the turn.|Global: Pay [S] to prevent 1 damage to a character or player.',
    '42224Black Widow|Tsarina|When Black Widow attacks, she deals 2 damage to your opponent. Your opponent can prevent this by spinning one of his or her characters down one level.',
    '43344Green Goblin|"Gobby"|When fielded, Green Goblin deals 1 damage to your opponent for each Sidekick in the field <em>(count your Sidekicks only)</em>.',
    '44134Mr. Fantastic|Elastic|You may spin Mr. Fantastic down 1 level to allow him to block an additional character <em>(or 2 levels to block two additional characters)</em>.',
    '46213Wolverine|Canucklehead|When Wolverine attacks alone, he cannot be blocked.',
    ];
    var bff = [
    '061M4b0Beholder|Minion Aberration|Whenever you purchase or use a basic action die, deal 1 to target opponent or creature.|Global: Pay 1 energy. Move a die showing an action face from your reserve to your prep area. Do not roll it next turn.',
    '061M4b0Beholder|Apprentice Aberration|When fielded, move up to 2 of your fielded NPCs to the used pile. For each one moved, you may purchase a basic action die at no cost.|Global: Pay 1 energy. Move a die showing an action face from your reserve to your prep area. Do not roll it next turn.',
    '071M4b0Beholder|Master Aberration|If this is the first die assigned to attack this turn, you may immediately use each of the basic action dice abilities, without bursts, once, as if you had rolled those dice.|Global: Pay 1 energy. Move a die showing an action face from your reserve to your prep area. Do not roll it next turn.',
    '053M4b0Blue Dragon|Minion Dragon|Breath Weapon 2 <em>(pay 2 to deal 2 damage to your opponent and all his creatures)</em>',
    '043M4b0Blue Dragon|Apprentice Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|While active, whenever you use an action die\'s ability, choose an opposing character. That character can\'t block this turn.',
    '063M4b0Blue Dragon|Master Dragon|Breath Weapon 3 <em>(pay 3 to deal 3 damage to your opponent and all his creatures)</em>',
    '034M4n0Gelatinous Cube|Minion Ooze|When fielded, capture an opposing NPC. This capture lasts until you field another Gelatinous Cube.',
    '034M4n0Gelatinous Cube|Apprentice Ooze|Whenever a character is knocked out during the attack step, you may pay [S] to have Gelatinous Cube capture it. This capture lasts until it is used again.',
    '034M4n0Gelatinous Cube|Master Ooze|Whenever a character is knocked out during the attack step, you may pay [S] to have Gelatinous Cube capture it. This capture lasts until it is used again.|Gelatinous Cube may block any number of NPCs.',
    '042M4b0Green Dragon|Minion Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>',
    '052M4b0Green Dragon|Apprentice Dragon|Breath Weapon 2 <em>(pay 2 to deal 2 damage to your opponent and all his creatures)</em>',
    '062M4b0Green Dragon|Master Dragon|Breath Weapon 2 <em>(pay 2 to deal 2 damage to your opponent and all his creatures)</em>|Spin each character damaged by this breath weapon down 1 level.',
    '021H4g1Halfling Thief|Minion Harper|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|* When fielded, draw a die. If it is an NPC, place it in your used pile. If not, roll it.',
    '031E4n1Halfling Thief|Apprentice Emerald Enclave|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When fielded, your opponent draws 2 dice <em>(this triggers no effects)</em>. You choose whether to place each die either back in the bag or in the used pile.',
    '041Z4b1Halfling Thief|Master Zhentarim|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When assigned to attack your opponent moves a die from his prep area to his used pile <em>(if able)</em>.|* When assigned to attack, you may knock out an opposing adventurer before your opponent moves the die.',
    '034O4g1Human Paladin|Minion Order of the Gauntlet|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When fielded, your Paladins and NPCs take no damage for the rest of the turn.',
    '034H4g1Human Paladin|Apprentice Harper|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|Global: Pay [S] Reduce the damage you take from a character\'s ability to 1.',
    '044L4g1Human Paladin|Master Lords Alliance|Experience <em>(once per turn, gain a +1A / +1D token when you knock Out a monster)</em>|While active, you take no damage from your opponent\'s "when fielded" effects <em>(your characters are not protected)</em>.',
    '042M4b1Troll|Minion Humanoid|Regenerate <em>(reroll when knocked out)</em>',
    '052M4b1Troll|Apprentice Humanoid|Regenerate <em>(reroll when knocked out)</em>|The first time each turn a Troll regenerates, gain 2 life.',
    '052M4b1Troll|Master Humanoid|Regenerate <em>(reroll when knocked out)</em>|When Troll regenerates, knock out an opposing engaged creature and deal 1 damage to your opponent.',
    '031M4b1Vampire|Minion Undead|Energy Drain <em>(spin down engaged foes)</em>|The first time each turn an attacking Vampire damages a character, gain 1 life.',
    '041M4b1Vampire|Apprentice Undead|Energy Drain <em>(spin down engaged foes)</em>|The first time each turn an attacking Vampire damages a character, gain 2 life, then draw a die and place it in your prep area.',
    '041M4b1Vampire|Master Undead|Energy Drain <em>(spin down engaged foes)</em>|The first time each turn an attacking Vampire knocks out an adventurer, you gain 1 life and your opponent loses 1 life.',
    '171M4b0Beholder|Lesser Aberration|When fielded, move all action dice from your used pile to your prep area, including those used this turn.|Global: Pay 1 energy. Move a die showing an action face from your reserve to your prep area. Do not roll it next turn.',
    '143M4b0Blue Dragon|Lesser Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|While active, whenever you use an action die\'s ability, deal 1 damage to all characters <em>(both players\')</em>',
    '133M4n0Carrion Crawler|Lesser Aberration|When fielded, knock out an opposing NPC.|Global: Pay [B] Deal 1 damage to an NPC.',
    '144M4g0Copper Dragon|Lesser Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|When fielded, put a gear equipped to an opposing character into his prep area.',
    '171M4b0Dracolich|Lesser Undead Dragon|Breath Weapon 2 <em>(pay 2 to deal 2 damage to your opponent and all his creatures)</em>|When assigned to attack, draw 2 dice from your bag. Spin action dice drawn to an action face with no bursts and place them in your reserve. Return character dice to the bag.',
    '133M4b1Drow Assassin|Lesser Humanoid',
    '134O4g1Dwarf Cleric|Lesser Order of the Gauntlet|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When fielded, knock out an undead monster of equal or lower level.',
    '133H4n1Elf Wizard|Lesser Harper|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When fielded, action dice cost 1 less to purchase. When assigned to attack, move an action die from your used pile to your prep area.',
    '163M4b1Frost Giant|Lesser Elemental|Frost Giant can only be blocked by two or more characters.',
    '144M4n0Gelatinous Cube|Lesser Ooze|Whenever a character is knocked out during the attack step, you may pay [S] to have Gelatinous Cube capture it. This capture lasts until it is used again.|When Gelatinous Cube attacks, you may assign one opposing character to block it.',
    '152M4b0Green Dragon|Lesser Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|Characters damaged by this Breath Weapon cannot block. Your opponent may prevent this by paying 1 life.',
    '143M4n0Half-Dragon|Lesser Humanoid|While active, dragons cost you 1 less to purchase, to a minimum of 1.|While active, your dragons get +1A and +1D when attacking.',
    '132E4g1Half-Orc Fighter|Lesser Emerald Alliance|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|Gets +1A and +1D while it has a gear equipped.',
    '131L4g1Halfling Thief|Lesser Lords Alliance|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When one or more Halfling Thief dice are assigned to attack, you may move up to 2 of your opponent\'s dice from his used area to his bag.',
    '144E4g1Human Paladin|Lesser Emerald Enclave|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|While active, your characters in the field cannot be affected by global abilities used by your opponent.|Global: Pay [S]. Reduce the damage you take from a character\'s ability to 1.',
    '154M4n0Invisible Stalker|Lesser Elemental|If one Invisible Stalker die attacks alone, it cannot be blocked.',
    '112M4b1Kobold|Lesser Humanoid|* When fielded, spin each of your other fielded Kobolds up 1 level.',
    '143M4b0Manticore|Lesser Beast|When assigned to attack, deal 1 damage to your opponent.',
    '151M4b0Mind Flayer|Lesser Humanoid|When fielded, if there is an opposing NPC in the field, you may knock it out and spin Mind Flayer up one level.',
    '152M4b1Minotaur|Lesser Humanoid|When fielded, Minotaur gets +1A and +1D for each opposing NPC <em>(until the end of the turn)</em>.|When fielded, opposing NPCs cannot block this turn.',
    '151M4b0Mummy|Lesser Undead|Energy Drain <em>(spin down engaged foes)</em>|While active [M] characters cost you 1 less to purchase, to a minimum of 1.',
    '122M4n1Orc|Lesser Humanoid',
    '152M4n0Owlbear|Lesser Beast|While active, all adventurers <em>(both players\')</em> get -2A and -2D <em>(knock out any adventurers that end up with 0D or less)</em>.',
    '143M4b1Pit Fiend|Lesser Fiend|After you field your first Pit Fiend each turn, your fiends cost 2 less to purchase, to a minimum 1 <em>(for the rest of the turn)</em>.',
    '162M4n0Purple Worm|Lesser Beast|Overcrush <em>(deal excess damage to opponent)</em>',
    '173M4b0Red Dragon|Lesser Dragon|Breath Weapon 2 <em>(pay 2 to deal 2 damage to your opponent and all his creatures)</em>|Field Red Dragon for free if your opponent has 2 or more non-NPC characters in the field.|Global: Once per turn, pay [B]. When you purchase your next action die this turn, it costs 2 less <em>(minimum 1)</em> and you deal 1 damage to your opponent.',
    '121M4b1Skeleton|Lesser Undead',
    '122M4n0Stirge|Lesser Beast|Cannot be blocked by characters with a purchase cost of 3 or higher.',
    '174M4n0Tarrasque|Lesser Aberration|Regenerate <em>(reroll when knocked out)</em>|When Tarrasque regenerates, deal 4 damage to all other characters <em>(both players\')</em>.',
    '154M4g0Treant|Lesser Beast|While active, evil characters cost 1 more to field.|Global: Pay [S]. Prevent the next 2 damage that you <em>(the player)</em> take from an ability or action die this turn.',
    '152M4b1Troll|Lesser Humanoid|Regenerate <em>(reroll when knocked out)</em>|At the beginning of your turn, spin this character up one level.',
    '164M4b0Umber Hulk|Lesser Beast|When fielded, choose an energy type. Your opponent cannot field characters of that type next turn.',
    '131M4g0Unicorn|Lesser Beast|While active, gain 1 life the first time each turn you field a good character.',
    '151M4b1Vampire|Lesser Undead|Energy Drain <em>(spin down engaged foes)</em>|When assigned to attack, you may choose to force 1 monster or all adventurers to block a Vampire <em>(if able)</em>.',
    '141M4b1Wererat|Lesser Lycanthrope|While active, the first time during a turn that you draw a character that has the Swarm ability, draw one additional die.',
    '124M4n1Zombie|Lesser Undead|After a Zombie is knocked out in an attack step, roll that die. If you roll a character face, return it to the field; otherwise place it in your prep area.',
    '12004n0Magic Helmet|Lesser Gear|Equip <em>(attach to a character with [EQ])</em>|Equipped character can only be blocked by two or more characters.',
    '13004n0Magic Sword|Lesser Gear|Equip <em>(attach to a character with [EQ])</em>|This equipped character gets +1A and +1D.',
    '16004n0Limited Wish|Lesser Spell|Choose any unpurchased die <em>(yours or from the basic actions cards)</em> and roll it.|If you roll a non-energy face, place the die in your used pile.',
    '14004n0Prismatic Spray|Lesser Spell|All of your opponent\'s characters lose all their card text until the end of the turn.',
    '243M4n0Carrion Crawler|Greater Aberration|When assigned to attack, knock out an opposing NPC.|Global: Pay [B]. Deal 1 damage to an NPC.',
    '254M4g0Copper Dragon|Greater Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|If active at the end of the turn, reroll all gear equipped to opposing characters that took damage this turn. If the result is an energy face, put it in the used pile.',
    '271M4b0Dracolich|Greater Undead Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|When fielded, you may purchase a basic action die at no cost and roll it. You may use it if it shows an action face. Otherwise, put it into your bag.',
    '243M4b1Drow Assassin|Greater Humanoid|Cannot be blocked by adventurers.|If Drow Assassin damages an opponent, you may knock out an adventurer.',
    '234E4g1Dwarf Cleric|Greater Emerald Enclave|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|This character takes no damage from undead monsters.',
    '233O4g1Elf Wizard|Greater Order of the Gauntlet|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When fielded, action dice cost 1 less to purchase.|When assigned to block, move an action die from your used pile to your prep area.',
    '263M4b1Frost Giant|Greater Elemental|When Frost Giant is blocked, choose a character that is not engaged with it. That character cannot attack during your opponent\'s next turn.',
    '243M4n0Half-Dragon|Greater Humanoid|While active, dragons cost you 1 less to purchase, to a minimum of 1.|While active, when you field a Dragon, deal 1 damage to your opponent.',
    '232L4n1Half-Orc Fighter|Greater Lords Alliance|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|While active, gear dice cost you 2 less to purchase, to a minimum of 1.',
    '244M4n0Invisible Stalker|Greater Elemental|While active, you may move this character to the used pile to prevent all damage from a character that damages you either with an ability or during the attack step.',
    '212M4b1Kobold|Greater Humanoid|Swarm <em>(extra draw during Clear & Draw step)</em>|Must attack if your opponent controls any adventurers.|At least one adventurer must block this Kobold <em>(if able)</em>.',
    '243M4b0Manticore|Greater Beast|While active, deal 1 damage to each opposing character immediately after it is fielded.',
    '261M4b0Mind Flayer|Greater Humanoid|When fielded, choose an energy type, canceling all previous choices. Creatures of that energy type cost your opponent 2 more to field while Mind Player is active. This effect lasts until you field another Mind Flayer.',
    '252M4b1Minotaur|Greater Humanoid|When assigned to attack, choose up to 2 opposing NPCs. Those NPCs cannot block.',
    '251M4b0Mummy|Greater Undead|Energy Drain <em>(spin down engaged foes)</em>|If one or more of your Mummies damages your opponent, gain life equal to the level of your highest level Mummy.',
    '232M4n1Orc|Greater Humanoid|Swarm <em>(extra draw during Clear & Draw step)</em>',
    '252M4n0Owlbear|Greater Beast|When fielded, knock out an adventurer.',
    '243M4b1Pit Fiend|Greater Fiend|When fielded, your fiends cost 2 less to field <em>(minimum 0)</em> for the rest of the turn.',
    '272M4n0Purple Worm|Greater Beast|Overcrush <em>(deal excess damage to opponent)</em>|When assigned to attack, knock out a character <em>(either player\'s)</em>, then deal damage to your opponent equal to that character\'s level.',
    '273M4b0Red Dragon|Greater Dragon|Breath Weapon 2 <em>(pay 2 to deal 2 damage to your opponent and all his creatures)</em>|You may pay 2 life instead of energy to pay this Breath Weapon cost.|Global: Once per turn, pay [B] When you purchase your next action die this turn, it costs 2 less <em>(minimum 1)</em> and you deal 1 damage to your opponent.',
    '231M4b1Skeleton|Greater Undead|Adventurers deal 2 less damage to this character.',
    '232M4n0Stirge|Greater Beast|Stirge can only be blocked by adventurers.',
    '284M4n0Tarrasque|Greater Aberration|Regenerate <em>(reroll when knocked out)</em>|When Tarrasque regenerates, knock out all adventurers <em>(both players\')</em>. Deal 1 damage to your opponent for each adventurer knocked out this way.|Global: Pay [S]. Choose an attacking character. It goes to the used pile if knocked out this turn.',
    '254M4g0Treant|Greater Beast|While active, evil characters cost 1 more to purchase.|Global: Pay [S]. Prevent the next 2 damage that you <em>(the player)</em> take from an ability or action die this turn.',
    '254M4b0Umber Hulk|Greater Beast|While active, your opponent cannot field NPCs.',
    '231M4g0Unicorn|Greater Beast|When fielded, if an opposing evil character is in the field, you may field good characters for free <em>(until the end of the turn)</em>.',
    '241M4b1Wererat|Greater Lycanthrope|While active, your evil characters with a purchase cost of 3 or less get +1A and +1D.',
    '224M4n1Zombie|Greater Undead|During the attack step, you may pay [S] to prevent all damage to a Zombie.',
    '22004n0Magic Helmet|Greater Gear|Equip <em>(attach to a character with [EQ])</em>|This equipped character cannot be affected by your opponent\'s action dice or character abilities.',
    '23004n0Magic Sword|Greater Gear|Equip <em>(attach to a character with [EQ])</em>|This equipped character gets +2A.',
    '24004n0Limited Wish|Greater Spell|Name a non-NPC die. Your opponent pulls a die from his bag. If it is the named die, return it to its card <em>(as if it had not been purchased)</em>. Otherwise, place it in the bag or its used pile.',
    '25004n0Prismatic Spray|Greater Spell|All characters are treated as if they had 1A and 1D <em>(instead of their normal values, regardless of bonuses)</em> until the end of the turn. Fielding costs remain unchanged.',
    '343M4n0Carrion Crawler|Paragon Aberration|When assigned to attack, roll all opposing NPCs. Move those showing energy faces to the prep area.',
    '364M4g0Copper Dragon|Paragon Dragon|Breath Weapon 2 <em>(pay 2 to deal 2 damage to your opponent and all his creatures)</em>|If active at the end of the turn, roll all gear equipped to opposing characters that took damage. If the result is an energy face, put the gear in the used pile.|Knock out attackers blocked by this character at the end of the attack step.',
    '371M4b0Dracolich|Paragon Undead Dragon|Breath Weapon 3 <em>(pay 3 to deal 3 damage to your opponent and all his creatures)</em>|While active, your opponent takes one damage each time either player rolls <em>(but not rerolls)</em> an action die.',
    '343M4b1Drow Assassin|Paragon Humanoid|At the end of the attack step, knock out all adventurers engaged with this character.',
    '344L4n1Dwarf Cleric|Paragon Lords Alliance|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When assigned to attack, reroll all opposing undead characters. Move any dice showing energy faces to the used pile.',
    '333Z4b1Elf Wizard|Paragon Zhentarim|Experience <em>(grows by knocking out monsters)</em>|When fielded, action dice cost 1 less to purchase.|When assigned to attack, roll up to two action dice from your opponent\'s used pile and use any actions rolled. Return the dice afterward.',
    '363M4b1Frost Giant|Paragon Elemental|When Frost Giant attacks, after blockers are assigned, remove one blocker from the attack zone <em>(it remains in the field)</em>.',
    '353M4n0Half-Dragon|Paragon Humanoid|While active, dragons cost you 2 less to purchase, to a minimum of 1.|While active, when you field a Dragon, you may purchase an action die for 3 less cost <em>(minimum 0)</em>.',
    '332Z4b1Half-Orc Fighter|Paragon Zhentarim|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When you field this character, you may immediately use the Equip ability to equip a gear die to it.|While it has a gear is equipped. Half-Orc: gets +3A when engaged with a good character.',
    '344M4n0Invisible Stalker|Paragon Elemental|Invisible Stalker must block if able.|When fielded, at least one character must attack on your opponent\'s next turn <em>(if able)</em>.',
    '322M4b1Kobold|Paragon Humanoid|Swarm <em>(extra draw during Clear & Draw step)</em>|Gets +1A and +1D if your opponent has any good characters in the field.',
    '353M4b0Manticore|Paragon Beast|While active, whenever you roll [B][B] on a die and do not reroll the result, deal 2 damage to a character or player.',
    '352M4b1Minotaur|Paragon Humanoid|When assigned to attack, Minotaur captures one opposing die of a lower level. This die remains captured until the capturing die leaves the field or uses the ability again.',
    '351M4b0Mummy|Paragon Undead|Energy Drain <em>(spin down engaged foes)</em>|When fielded, spin all adventurers <em>(both players\')</em> down 1 level and remove one Experience counter from each adventurer card <em>(if able)</em>.',
    '332M4n1Orc|Paragon Humanoid|Gets +1A and +1D for each other Orc in the field <em>(both players\')</em>.',
    '342M4n0Owlbear|Paragon Beast|When an Owlbear attacks, all opposing Adventurers must block an Owlbear <em>(if able)</em>.',
    '353M4b1Pit Fiend|Paragon Fiend|When you field your first Pit Fiend each turn, you may move 1 NPC die from your reserve pool to your used pile to draw 3 dice. Roll any evil character dice drawn this way. Place the other dice in your used pile.',
    '372M4n0Purple Worm|Paragon Beast|When fielded, knock out all fielded characters <em>(both players\')</em> that have a purchase cost of 4 or less.',
    '331M4b1Skeleton|Paragon Undead|When fielded, if an opposing adventurer is in the field, you may purchase a Skeleton die at a cost of 1.',
    '354M4g0Treant|Paragon Beast|While active, good characters that are blocking ignore damage from evil characters.|Global: Pay [S]. Prevent the next 2 damage that you <em>(the player)</em> take from an abiiity or action die this turn.',
    '354M4b0Umber Hulk|Paragon Beast|When fielded, reroll all opposing level 1 and 2 characters. Move each die that shows an energy face to your opponent\'s used pile.',
    '341M4g0Unicorn|Paragon Beast|While active, your other good characters get +2A and +2D.',
    '341M4b1Wererat|Paragon Lycanthrope|While active, your evil characters with a purchase cost of 3 or less cost 1 less to field <em>(minimum 0)</em>.',
    '334M4n1Zombie|Paragon Undead|After a Zombie is knocked out in the attack step, roll that die. If you roll a character face, knock out all opposing characters that were engaged with it. Place the Zombie in your prep area.',
    '33004n0Magic Helmet|Paragon Gear|Equip <em>(attach to a character with [EQ])</em>|This equipped character takes no damage during the attack step.',
    '34004n0Magic Sword|Paragon Gear|Equip <em>(attach to a character with [EQ])</em>|Characters damaged by this equipped character are knocked out at the end of the attack step.',
    '35004n0Limited Wish|Paragon Spell|Search your bag for a character die and field it on its level 1 side.|** Also move a Tarrasque from the field to the prep area.',
    '35004n0Prismatic Spray|Paragon Spell|Swap two of your non-NPC characters with 2 opposing characters until the end of the turn <em>(each player plays them as if they own them)</em>. If the opposing characters are unblocked during your attack, they do not go to the used pile <em>(they stay in the field)</em>.',
    '451M4b0Mind Flayer|Epic Humanoid|When fielded, capture an opposing non-[M] character. This capture lasts until Mind Flayer leaves the field.',
    '473M4b0Red Dragon|Epic Dragon|Breath Weapon 3 <em>(pay 3 to deal 3 damage to your opponent and all his creatures)</em>|While active, once per turn when you use an action die effect, you may use a second copy of its effect.|Global: Once per turn pay [B]. When you purchase your next action die this turn, it costs 2 less <em>(minimum 1)</em> and you deal 1 damage to your opponent.',
    '432M4n0Stirge|Epic Beast|Swarm <em>(extra draw during Clear & Draw step)</em>|If Stirge attacks alone, it cannot be blocked.',
    '474M4n0Tarrasque|Epic Aberration|Regenerate <em>(reroll when knocked out)</em>|When Tarrasque regenerates, knock out all of your opponent\'s characters of equal or lower level.',
    '03003n0Blessing|Basic Action Card|Each of your characters gets +1A and +1D.|** Two of your characters get an additional +1A and +1D.',
    '04003n0Charm|Basic Action Card|Draw 3 dice. Roll any NPCs you drew. Place the other dice in your used pile.|** You may instead choose to roll one of the dice and place the other two in your used pile.',
    '03003n0Cone of Cold|Basic Action Card|Deal 1 damage to one character, 2 damage to second character, and 3 damage to a third character. You may only use this action if there are at least three characters in the field.|Global: Pay [F]. One blocked attacker gets +2A.',
    '04003n0Dimension Door|Basic Action Card|One target character you control cannot be blocked this turn.',
    '05003n0Finger of Death|Basic Action Card|Move a level 1 character from the field to its prep area.|* Instead, move a character of any level.|** Instead, move a character of any level to its bag.',
    '04003n0Fireball|Basic Action Card|Deal two damage to each player and each character.|You may also spend [B] to deal 1 damage to a target character <em>(you may do this multiple times)</em>.|** Deal 1 additional damage to each player and each character.',
    '03003n0Magic Missile|Basic Action Card|Deal 2 damage to target character or player.|** Deal extra damage to a character equal to the level of your highest level adventurer in the field.|Global: Pay [B]. Deal 1 damage to a character.',
    '03003n0Polymorph|Basic Action Card|Swap a fielded character with a non-NPC character from that player\'s used pile. Spin the character to level 1. This does not trigger "when fielded" effects.|Global: Pay [M]. Spin one of your characters down a level to spin another character up a level.',
    '04003n0Resurrection|Basic Action Card|Roll a die from your used pile <em>(place it into your reserve)</em>.|Global: Once during your turn, pay [S] to draw a die from your bag and place it in your prep area.',
    '02003n0Stinking Cloud|Basic Action Card|Deal 1 damage to all characters <em>(both players\')</em>.|Level 1 characters can\'t attack or block this turn.',
    ];
    var bff_promo = [
    '55201g1Minsc and Boo|"Go for the eyes, Boo!"|While active, Minsc and Boo get an experience token (+1A and +1D) at the end of your turn. If Minsc and Boo go to the used pile, remove all of the experience tokens.|Once per turn, you may remove a token from Minsc and Boo to force an opposing character to block.',
    ];
    var bff_op = [
    '543M3b1Drow Assassin|Minion Humanoid|Once per turn you may send one of your Drow Assassin dice to the Used Pile to deal 2 damage to one of your opponent\' characters.',
    '543H4n1Elf Wizard|Legendary Harper|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|When Elf Wizard attacks you may purchase an action die for 2 energy less than normal <em>(to a minimum of 1)<em>.',
    '544O2g1Dwarf Cleric|Legendary Order of the Gauntlet|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|Once per turn, while Dwarf Cleric is active, after you declare blockers, you may choose one of your blockers. Prevent all damage dealt to that blocker this turn.',
    '531L3g1Halfling Thief|Minion Lords Alliance|Experience <em>(once per turn, gain a +1A / +1D token when you knock out a monster)</em>|* Your opponent may not deal damange to this character during the Main Step.',
    '564M4g0Treant|Legendary Beast|Treant costs 1 less for each active [GOOD] character you control that is not a Treant.|Global: Pay [S]. Prevent the next 2 damage that you take from an ability or action die this turn.',
    '554M3g0Copper Dragon|Legendary Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|When you KO an opposing character with Copper Dragon\'s Breath Weapon you may move an NPC die from your Used Pile to your Prep Area.',
    '534M3n1Zombie|Minion Undead|If a Zombie is knocked out during combat, and it knocked out the character it was engaged with, return Zombie to the field on its level 1 face.',
    '552M4n0Owlbear|Legendary Beast|Global: Pay [F]. Once Per Turn, target character gets +1A.',
    '552M3b0Green Dragon|Legendary Dragon|Breath Weapon 1 <em>(pay 1 to deal 1 damage to your opponent and all his creatures)</em>|Once per turn during your Main Step you may KO one of your NPCs to give Green Dragon +2A and +2D until end of turn.',
    ];
    var dice = {
    "Angel":"022 133 134",
    "Ant-Man":"021 031 152",
    "Apocalypse":"135 256*267*",
    "Beast":"012*023 124",
    "Bishop":"125 136 256",
    "Black Panther":"042 152 182",
    "Black Widow":"021 022 133",
    "Cable":"132 233 255",
    "Captain America":"133 254 255",
    "Colossus":"144 165*287*",
    "Cyclops":"142 153 164",
    "Deadpool":"024 025 137",
    "Doctor Doom":"136 247 358",
    "Doctor Octopus":"144 248 388",
    "Doctor Strange":"146 258 389",
    "Emma Frost":"135 146 257",
    "Falcon":"022 133 143",
    "Gambit":"111*122*244",
    "Ghost Rider":"123 234 355",
    "Green Goblin":"022 133 155",
    "Hawkeye":"031 041 142",
    "Hulk":"165*277*388",
    "Human Torch":"022 133 244",
    "Iceman":"124 136 146",
    "Iron Man":"135 146 257*",
    "Juggernaut":"163 274 376",
    "Kitty Pryde":"022 032 133",
    "Loki":"115 117 228",
    "Magik":"014 016 127",
    "Magneto":"144 257 368",
    "Marvel Girl":"133 255 366",
    "Mister Sinister":"141 252 263",
    "Mr. Fantastic":"115 226 227",
    "Mystique":"111 011 211*",
    "Namor":"033 144 255",
    "Nick Fury":"013 124 125",
    "Nightcrawler":"124 136 256",
    "Nova":"144 256 277",
    "Phoenix":"155 277 388",
    "Phoenix Force":"155 277 388",
    "Professor X":"115 217 319",
    "Psylocke":"012 022 133",
    "Punisher":"141 152 263",
    "Pyro":"031 142 152",
    "Quicksilver":"031 132 143",
    "Red Hulk":"166*277*388",
    "Rogue":"123 245 256",
    "Sabretooth":"133 144 254",
    "Scarlet Witch":"013 033 153",
    "Sentinel":"155 266 388",
    "She-Hulk":"154 266 377",
    "Silver Surfer":"155 275 387",
    "Spider-Man":"033 144 155",
    "Storm":"021 122 132",
    "Thing":"133 255 386",
    "Thor":"156 268 388",
    "Toad":"121*232*244",
    "Venom":"144 155*266*",
    "Vision":"014 126 247",
    "War Machine":"134 145 256",
    "Wolverine":"152*263*384",
    "X-23":"152 262 273",
    "Beholder":"043 054 165",
    "Blue Dragon":"133 144 266",
    "Carrion Crawler":"021 032 152",
    "Copper Dragon":"125 137 248",
    "Dracolich":"137 258 389",
    "Drow Assassin":"032 142 144",
    "Dwarf Cleric":"013 014 125",
    "Elf Wizard":"002 013 124",
    "Frost Giant":"152 264 385",
    "Gelatinous Cube":"013 124 235",
    "Green Dragon":"134 145 266",
    "Half-Dragon":"022 133 253",
    "Half-Orc Fighter":"021 022 133",
    "Halfling Thief":"111*122*133",
    "Human Paladin":"012 123 124",
    "Invisible Stalker":"133 144 154",
    "Kobold":"011*011 012",
    "Manticore":"114 125 245",
    "Mind Flayer":"115 226 337",
    "Minotaur":"152 263 374",
    "Mummy":"024 034 146",
    "Orc":"022 132 133",
    "Owlbear":"124 145 256",
    "Pit Fiend":"133 144 155",
    "Purple Worm":"153 165 287",
    "Red Dragon":"155 277 388",
    "Skeleton":"021 132 133",
    "Stirge":"011 021 131",
    "Tarrasque":"163 274 397",
    "Treant":"136 247 358",
    "Troll":"133 143 255",
    "Umber Hulk":"153 264 375",
    "Unicorn":"022 033 144",
    "Vampire":"114 124 226",
    "Wererat":"031 141 143",
    "Zombie":"012 022 133",
    "Minsc and Boo":"033 144 166",
    "Baby Dragon":"031 132 143",
    "Black Luster Soldier":"255 266 377",
    "Blade Knight":"132 143 254",
    "Blue-Eyes White Dragon":"165*276*3872",
    "Breaker the Magical Warrior":"031 032 144",
    "Buster Blader":"144 257 368",
    "Celtic Guardian":"022*034 135",
    "Curse of Dragon":"144 154 265",
    "Dark Magician":"156 266*377*",
    "Dark Magician Girl":"035 046 157",
    "Doomcaliber Knight":"144 155 266",
    "Flame Swordsman":"133 244 366",
    "Gaia the Fierce Knight":"045 165 276",
    "Goblin Attack Force":"041 161 271",
    "Harpie Lady":"123 133*234",
    "Harpie Lady Sisters":"144 255 376",
    "Injection Fairy Lily":"013 033 144",
    "Jinzo":"144 155 275",
    "Kuriboh":"012*023 124",
    "La Jinn the Mystical Genie of the Lamp":"133*254*255",
    "Lord of D.":"133*144 155",
    "Man-Eater Bug":"123 233 254",
    "Marshmallon":"012 023 124",
    "Morphing Jar":"021 022 143",
    "Mystical Elf":"024 025 137",
    "Obelisk the Tormentor":"166 277 399",
    "Red-Eyes B. Dragon":"155 266 377*",
    "Saggi the Dark Clown":"024 025 137",
    "Sangan":"021 122 132",
    "Slifer the Sky Dragon":"175 286 3A8",
    "Summoned Skull":"142 153 264",
    "The Winged Dragon of Ra":"157 268 38A",
    "Thousand Dragon":"044 065 176",
    "Time Wizard":"022 033 134*",
    "Aquaman":"023 034 145",
    "The Atom":"011 133 255",
    "Batman":"134 255 366",
    "Black Canary":"022 032 144",
    "Black Manta":"113 124 135",
    "Blue Beetle":"131 141 144",
    "Booster Gold":"133 144 254",
    "Brainiac":"124 235 347",
    "Captain Cold":"133 244 365",
    "Catwoman":"021 122 233",
    "Cheetah":"022 133 134",
    "Constantine":"022 123 133",
    "Cyborg":"142 153 264",
    "Darkseid":"143 254 365",
    "Deadman":"124 225 236",
    "Deathstroke":"133 244*266*",
    "Firestorm":"135 146 256",
    "The Flash":"133 244 255",
    "Green Arrow":"141 152 253",
    "Green Lantern":"142 153 165",
    "Harley Quinn":"013*133 253",
    "Hawkman":"022 133 134",
    "The Joker":"114 125 236",
    "Katana":"131 133 143",
    "Lex Luthor":"014 115 126",
    "Martian Manhunter":"152 262 274",
    "Red Tornado":"135 246 356",
    "Robin":"022 133 243",
    "Shazam!":"155 265 377",
    "Sinestro":"124 236 358",
    "Solomon Grundy":"133 144 255",
    "Stargirl":"023 234 255",
    "Superman":"155 277 388",
    "Swamp Thing":"125 136 247",
    "Vibe":"133 255 377",
    "Vixen":"022 023 133",
    "Wonder Woman":"023 133 144",
    "Zatanna":"011 022 133",
    "Atomica":"011 133 255",

    "Baron Zemo":"124 234 245",
    "AoU@Beast":"021 122 132",
    "AoU@Black Widow":"012 022 123",
    "Bucky":"132*133 243**",
    "AoU@Captain America":"153*154 255*",
    "Captain Marvel":"143 256 367",
    "Captain Universe":"155 266 377",
    "Daredevil":"022 132 133",
    "Enchantress":"153 163 266",
    "Gamora":"133*243 245",
    "Giant Man":"011 144 277",
    "Groot":"012 126*237*",
    "AoU@Hawkeye":"031 032 134",
    "AoU@Hulk":"146 267 388",
    "Hyperion":"144 255 266",
    "AoU@Iron Man":"143*144 264",
    "Jocasta":"114 124 236",
    "Kang":"142 152 255",
    "AoU@Loki":"125 236 247",
    "Maria Hill":"012 022 124",
    "Moondragon":"124 134 246",
    "AoU@Nick Fury":"012 123 225",
    "Odin":"136*147 358*",
    "Pepper Potts":"011 013 022",
    "Phil Coulson":"121 122 123",
    "Red Skull":"134 245 355",
    "Rocket Raccoon":"021 132 142",
    "S.H.I.E.L.D. Agent":"012*022*124",
    "Spider-Woman":"124 125 235",
    "Starhawk":"133 244 255",
    "Star-Lord":"132 253 254",
    "Thanos":"157 278 399",
    "AoU@Thor":"145 256 368",
    "Ultron":"154 266 377",
    "Ultron Drone":"013 124 244",
    "AoU@Vision":"123 134 245",
    "Wasp":"122 123 234",
    "Wonder Man":"123 244 245",
    "Magneto@Z":"143 256 368",
    "Electro@Z":"014 125 236",
    "Gladiator@Z":"134 255 376",
    "Red Skull@Z":"135 255 366",

    "Anti-Monitor":"155 266 277",
    "Atom":"011 133 255",
    "Atrocitus":"043 154 266",
    "Beast Boy":"022 133 144",
    "Bleez":"022 133 244",
    "Carol Ferris":"012 023 124",
    "Dex-Starr":"022 132 242",
    "Fatality":"013 133 134",
    "Guy Gardner":"022 032 144",
    "Hal Jordan":"142 153 165",
    "Indigo-1":"124 135 145",
    "Jade":"021 022 144",
    "John Stewart":"132 143 245",
    "Kilowog":"133 145 266",
    "Kyle Rayner":"022 134 244",
    "Larfleeze":"155 266 288",
    "WoL@Lex Luthor":"022 133 234",
    "Lyssa Drak":"021 132 133",
    "Mera":"121 132 244",
    "Miri Riam":"012 022 133",
    "Mogo":"155 266*389",
    "Mongul":"142 254 365",
    "Munk":"122 132 133",
    "Parallax":"144 166 388",
    "Ranx":"125 136 248",
    "Raven":"013 124 135",
    "Saint Walker":"114 134 154",
    "Scarecrow":"113 124 135",
    "WoL@Sinestro":"143 153 264",
    "Spectre":"145 156 266",
    "Starfire":"133 244 255",
    "Superboy Prime":"155 277 388",
    "Supergirl":"154 276 387",
    "Warth":"121 132 154",
    "Wonder Girl":"123 133 243*",
    "Black Lantern Aquaman": "155 166 177",
    "Black Lantern Batman": "055 176 397",
    "Black Lantern Superman": "166 288 399",
    "Black Lantern Wonder Woman": "166 177 288",

    "Agent Venom":"144 155*266*",
    "Aunt May":"002 012 112",
    "Black Cat":"022 142 254",
    "ASM@Black Widow":"021 132 133",
    "Blade":"143 144 255",
    "Blink":"013 123 135",
    "Carnage":"135 255 376",
    "Cloak":"014 016 136",
    "Dagger":"013 133 253",
    "Drax":"124 235 346",
    "Electro":"042 154 264",
    "Firestar":"132 244 354",
    "Gladiator":"133 244 357",
    "ASM@Green Goblin":"012 244 355",
    "Gwen Stacy":"113 223 234",
    "Hobgoblin":"133 244 356",
    "ASM@Hulk":"157 268 379",
    "ASM@Iceman":"124 136 146",
    "Iron Spidey":"236 246 349",
    "Kingpin":"135 246 357",
    "Kraven the Hunter":"152 255 257",
    "Lizard":"121 251 363",
    "Luke Cage":"134 155 266",
    "Mary Jane":"011 113 123",
    "Mysterio":"263 265 377",
    "Rhino":"143 255 376",
    "Sandman":"021 132 133",
    "Scarlet Spider":"133 143 263",
    "Silver Sable":"031 142 144",
    "Spider-Girl":"141 252 254",
    "ASM@Spider-Man":"133*143 254",
    "Vulture":"022 133 143",
    "White Tiger":"013 124 245",
    "ASM@Wolverine":"143 264 274",
    "Green Goblin@Z":"021 132 255",
    "Kingpin@Z":"147 149 279",
    "Morbius@Z":"273 274 278",
    "Venom@Z":"154 155 276",

    "Iron Fist":"023 124 235*",

    "Bahamut":"155 277 388",
    "Balor":"155 166 277",
    "Black Dragon":"155 166 288",
    "Blink Dog":"011 022 132",
    "Bronze Dragon":"134 146 256*",
    "Bugbear Ambusher":"131 142 253",
    "Clay Golem":"135 246 357",
    "Cockatrice":"013 124 235",
    "Displacer Beast":"014 025 136",
    "Drizzt":"143 155 166",
    "Dwarf Wizard":"002 013 124",
    "Elf Thief":"111 122 133",
    "Erinyes":"124 244 264",
    "Flesh Golem":"124 235 246",
    "Ghost":"022 133 135",
    "Giant Spider":"012 023 124",
    "Glabrezu":"133 244 256",
    "Gnome Ranger":"031*142 253",
    "Goblin":"021 022 133",
    "Gorgon":"033 144 155*",
    "Half-Elf Bard":"013 023 135",
    "Half-Orc Barbarian":"022 133 243",
    "Hell Hound":"022 132 133",
    "Hill Giant":"132 243 354",
    "Human Fighter":"021 022 133",
    "Intellect Devourer":"011 022 152",
    "Iron Golem":"146 257 368",
    "Lich":"026 137 248",
    "Lizardfolk":"022 132 133",
    "Lolth":"165 277 389",
    "Oni":"133 144 254",
    "Orcus":"156 268 388",
    "Rust Monster":"011 021 022",
    "Storm Giant":"154 264 274",
    "White Dragon":"124 144 265",
    "Wraith":"023 034 144",
    "Belaphoss":"155 166 277",

    "Alfred Pennyworth":"011 012 022",
    "Bane":"144 155 277",
    "Batgirl":"031 132 143",
    "WF@Batman":"143 254 265",
    "Bizarro":"155 276 287",
    "Bruce Wayne":"032 143 254",
    "Carmine Falcone":"013 124 144",
    "Clark Kent":"135 145 146",
    "Commissioner Gordon":"012 024 144",
    "Dick Grayson":"134 255 366",
    "Doomsday":"043 155 277",
    "General Zod":"155 266 377",
    "Harvey Bullock":"021 131 242",
    "Kal-L":"155 277 388",
    "Krypto":"022 133 144",
    "Lois Lane":"011 012 022",
    "Mr. Freeze":"142 153 164",
    "Mr. Mxyzptlk":"012 122 133",
    "Nightwing":"121 142 253",
    "Oracle":"013 014 025",
    "Poison Ivy":"012 024 136",
    "Power Girl":"144 155 266",
    "WF@Robin":"031 142 252",
    "WF@Scarecrow":"122 133 135",
    "Steel":"132 143 154",
    "WF@Supergirl":"146 167 278",
    "WF@Superman":"146 267 278",
    "Superwoman":"142 253 374",
    "WF@The Joker":"123 134 245",
    "The Penguin":"013 024 135",
    "The Riddler":"015 126 136",
    "Two-Face":"022 144 266",
    "Ultraman":"144 155 266",
    "WF@Wonder Woman":"034 144 156",
    "Black Lantern Anti-Monitor":"155 166 277",
    "Black Lantern Firestorm":"135 146 256",
    "Black Lantern Green Arrow":"141 152 253",
    "Black Lantern Martian Manhunter":"152 262 364",
    "Bat-Mite":"011 012 013",

    "Melinda May":"123 134 244",
    "Terry McGinnis":"243 254 265",

    "April":"011 013 015",
    "Baxter Stockman":"023 034 145",
    "Bebop":"024 136 247",
    "Casey Jones":"022 133 243",
    "Donatello":"142 144 255",
    "Foot Ninja":"011 021 122",
    "Fugitoid":"131 142 153",
    "Krang":"137 148 259",
    "Leonardo":"024 135 146",
    "Mousers":"022 132 133",
    "Michelangelo":"142 154 264",
    "Raphael":"033 144 255",
    "Rocksteady":"033 153 264",
    "Shredder":"144 166 288",
    "Splinter@A":"154 265 277",
    "Splinter@B":"145 147 268",

    "CW@Ant-Man":"012 022 143",
    "CW@Baron Zemo":"022 133 246",
    "CW@Black Widow":"021 132 133",// reused asm
    "Bullseye":"031 041 151",
    "CW@Captain America":"124 245 255",
    "CW@Captain Marvel":"044 155 266",
    "Deathlok":"155 266 388",
    "CW@Falcon":"131 142 253",
    "Goliath":"255 266 377",
    "Hercules":"144 155 257",
    "CW@Iron Fist":"042 152 263",
    "CW@Iron Man":"144*255 366",
    "Jessica Jones":"032 144 254",
    "Justice":"023 133 244",
    "CW@Loki":"124 126 228",
    "CW@Maria Hill":"021 022 133",
    "Moon Knight":"142 153 255",
    "Moonstone":"132 243 254",
    "Ms. Marvel":"035 146 166",
    "Namorita":"013 024 126",
    "Nitro":"013 124 245",
    "CW@Punisher":"141 152 262",
    "Radioactive Man":"021 132 144",
    "Rescue":"123 125 236",
    "CW@Rocket Raccoon":"011 031 141",
    "Ronin":"012 024 135",
    "CW@She-Hulk":"144 155 267",
    "Songbird":"012 023 134",
    "Speedball":"022 133 145",
    "CW@Spider-Man":"133 143 254",//reused asm
    "Taskmaster":"154 165 266",
    "CW@Thor":"153 164 276",
    "CW@Venom":"033 144 155",
    "CW@Wasp":"122 132 243",
    "Winter Soldier":"153 164 265",
    "Natalia Romanova":"044 155 266",
    "Shannon Carter":"133 144 255",
    "Steve Rogers":"124 135 247",
    "Tony Stark":"155 266 278",
    "Squirrel Girl":"022 132 133",

    "Strahd":"122 133 243*",

    'Amanda Waller':'012 022 123',
    'Barry Allen':'133 144 274',
    'Black Adam':'114 125 136',
    'Clayface':'032 153 175',
    'GAF@Cyborg':'124 135 246',
    'Deadshot':'031 141 252',
    'GAF@Deathstroke':'144 255 377',
    'Diggle':'023 135 137',
    'Doctor Light':'122 133 153',
    'Felicity Smoak':'011 012 013',
    'Giganta':'022 155 166',
    'Gorilla Grodd':'144 166 277',
    'GAF@Green Arrow':'151 162 273',
    'GAF@Hal Jordan':'132 143 255',
    'Huntress':'022 133 143',
    'Jay Garrick':'015 126 247',
    'GAF@Katana':'021 022 132',
    'Killer Frost':'012 024 134',
    'King Shark':'155 176 288',
    'GAF@Martian Manhunter':'134 146 268',
    'Merlyn':'132 142 253',
    'Power Ring':'133 244 255',
    'Professor Zoom':'132 143 155',
    "Ra's Al Ghul":'144 155 266',
    'Roy Harper':'042 153 155',
    'Speedy':'031 141 251',
    'Static':'021 032 143',
    'GAF@Superman':'146 267 278',
    'GAF@The Atom':'011 144 155',
    'Weather Wizard':'122 133 145',
    'GAF@Wonder Girl':'022 132 133',
    //'Zatanna':'011 022 133', new die, same stats
    'White Lantern Batman':'144 154 265',
    'White Lantern Deadman':'022 023 136',
    'White Lantern Sinestro':'023 133 155',
    'White Lantern Wonder Woman':'034 145 156',

    "DRS@Doctor Strange": "155 267 289",
    "Wong": "022 133 143",
    "Clea": "164 266 377",
    "Mindless Ones": "031 041 142", // ???
    "Dormammu": "155 276 288",
    "Ancient One": "166 177 288",

    'Agent Carter':'013 024 134',
    'Agent X':'152 154 265',
    'Angela':'023 143 144',
    'Angel Dust':'122 144 377',
    'Black Bolt':'032 133 254',
    'Black Tom Cassidy':'131 141 152',
    'Blind Al':'012 014 125',
    'Bob, Agent of Hydra':'021 022 132',
    'DP@Colossus':'155 166 277',
    'DP@Deadpool':'024 144 255',
    'Dogpool':'042 144*254',
    'Domino':'022 132 152',
    'Elektra':'021 022 133',
    'Evil Deadpool':'042 144 255',
    'Fantomex':'133 144 255',
    'Hit-Monkey':'122 133 243',
    'Kidpool':'014 134 144',
    'Lady Bullseye':'031 041 151',//reused CW Bullseye
    'Lady Deadpool':'033 144 255',
    'Lockjaw':'013 024 134',
    'Madame Hydra':'021 132 142',
    'Medusa':'124 135 246',
    'Miguel O\'Hara':'143 153 255',
    'DP@Mister Sinister':'132 243 263',
    'M.O.D.O.K.':'014 116 128',
    'Multiple Man':'111 122 244',
    'Negasonic Teenage Warhead':'012 133 163',
    'Outlaw':'021 122 123',
    'Sandi Brandenberg':'011 012 122',
    'DP@Scarlet Witch':'013 033 155',
    'Shiklah':'012 013 124',
    'Stepford Cuckoos':'012 013 124',
    'DP@Storm':'021 031 133',
    //'DP@Taskmaster':'154 165 266', //reused CW
    'DP@Wolverine':'143 264 274', //reused ASM
    'DP@X-23':'142 253 374',
    'Captain America with Mjolnir':'145 256 277',
    'Charles Xavier, Juggernaut':'124 154 274',
    'Phoenix Force Magneto':'166 277 399',
    'Wolverine Lord of Vampires':'144 266 388',

    "HHS@April":"011 122 124",
    //Casey Jones 022 133 243 //Reused
    "HHS@Donatello":"033 144 255",
    //Foot Ninja 011 021 122 //Reused
    "Hamato Yoshi":"127 128 139",
    "Karai":"131 142 143",
    "Leatherhead":"035 146 157",
    "HHS@Leonardo":"142 154 264",
    "Metalhead":"134 145 256",
    "HHS@Michelangelo":"142 144 255",
    "HHS@Raphael":"024 135 146",
    "Renet Tilley":"022 132 133",
    //Shredder 144 166 288 //Reused
    "Slash":"034 154 265",
    "Tiger Claw":"152 263 273",
    "Triceraton":"133 144 255",

    "Howard Stark":"012 122 123*",
    "Jarvis":"011 012 013",
    "IMW@Rescue":"031 133 143",
    "Iron Spider":"141 142 253*",// Note AMS has Iron Spidey
    "IMW@War Machine":"024*134 245",
    "Space Armor Iron Man":"135*137*247",
    "Hulkbuster Iron Man":"155 266 377",
    "Iron Manor":"144 264 266",

    "Ace the Bat Hound":"021 022 132",
    "BAT@Batgirl":"021 022 133",
    "BAT@Batman":"144 255 375",
    "Batwoman":"032 143 254",
    "Big Barda":"133 144 266",
    "BAT@Catwoman":"012 022 233",
    "Conner Kent":"012 133 255",
    "BAT@Darkseid":"044 155 377",
    "Dove":"011 015 128",
    "Firefly":"122 132 244",
    "BAT@Harley Quinn":"022 133 144",
    "Hawk":"122 152 274",
    "Hawkgirl":"022 133 144",
    "BAT@Huntress":"022 133 143",
    "Hush":"012 022 142",
    "Jervis Tetch":"011 021 122",
    "Killer Croc":"144 255 277",
    "Mister Miracle":"011 022 132",
    "BAT@Nightwing":"131 142 252",
    "Orion":"155 166 288",
    "Owlman":"133 143 154",
    "Parademon":"021 022 132",
    "Red Hood":"122 133 255",
    "Rip Hunter":"013 024 135",
    "BAT@Robin":"022 032 243",
    "Talia al Ghul":"142 253 255",
    "BAT@The Penguin":"022 024 144",
    "The Question":"013 014 124",
    "Thomas Wayne":"012 133 255",
    "White Lantern Aquaman":"032 153 165",
    "White Lantern Dove":"022 033 14A",
    "White Lantern Hal Jordan":"145 157 278",
    "White Lantern Superman":"144 166 288",

    //"Clea":"164 266 377", reused
    //"Doctor Strange":"155 267 289", reused
    "Hellcat":"123 133 144",
    "Def@Hulk":"146 267 388", // reused AoU
    "Def@Iron Fist":"033 144 264",
    "Def@Jessica Jones":"142 162 263",
    "Def@Loki":"125 236 247", // reused AoU
    "Def@Luke Cage":"125 136 266",

    "Artemis":"042 144 166",
    "SWW@Cheetah":"142 144 155",
    //"Giganta":"022 155 166", reused
    "Jimmy Olsen":"012 013 123",
    "Steve Trevor":"021 031 141",
    "SWW@Supergirl":"146 267 278", // looks like reused WF except lv2 cost (WF card typo?)
    "SWW@Superman":"146 267 278", // reused WF
    "SWW@Wonder Woman":"033 135 257",

    "SMC@Black Cat":"014 125 136",
    "SMC@Captain America":"124 245 255", // reused CW
    "SMC@Carnage":"044 155 166",
    "Doppelganger":"024 135 146",
    //"Iron Fist":"023 124 235*", // reused
    "Shriek":"022 123 133",
    //"Spider-Man":"033 144 155", reused
    "SMC@Venom":"033 144 155", // reused CW

    'Adam Warlock':'135 155 266',
    'GotG@Agent Venom':'033 144 155', // reused CW Venom
    //'Angela':'023 143 144', reused
    'Beta Ray Bill':'146 157 278',
    'GotG@Black Widow':'031 032 133',
    'GotG@Captain America':'124 245 255', // reused CW
    //'Captain Marvel':'143 256 367', reused AoU
    'Cosmo Space Dog':'012 013 133',
    'Daisy Johnson':'011 122 123',
    'GotG@Drax':'124 235 246', // reduced lv3 field cost
    'Dum Dum Dugan':'022 132 133',
    //'Gamora':'133*243 245', reused
    'GotG@Ghost Rider':'023 134 255',
    //'Groot':'012 126*237*', reused
    'GotG@Hulk':'166 177 188',
    'Ironheart':'144*255 366', // reused CW Iron Man
    'Madame Masque':'032 133 144',
    'Madame Web':'033 144 255',
    'Mantis':'013 024 134',
    'GotG@Moondragon':'022 144 166',
    'Nebula':'014 125 136',
    'Norman Osborn':'121 132 143',
    'Nova Prime':'133 144 255',
    'Quasar':'033 143 253',
    'Ricochet':'021 132 243',
    //'Rocket Raccoon':'021 132 142', reused
    'Ronan the Accuser':'155 167 288',
    'GotG@Squirrel Girl':'033 143 144',
    'GotG@Star-Lord':'124 235 255',
    'Stick':'033 153 263',
    'S.W.O.R.D. Agent':'021 022 132',
    //'Thanos':'157 278 399', reused
    'The Collector':'015 117 128',
    'The Kyln':'',
    'The Spot':'021 122 123',
    'Yellowjacket':'122 133 154',
    'Yondu':'031 152 262',
    'Captain Britain Iron Man':'042 253 373',
    'Groot Thor':'144 146 259',
    'King Black Bolt':'032 144 165',
    'Punisher Sorcerer Supreme':'044 155 277',

    //XFC
    //'Angel':'022 133 134',
    'Avalanche':'032 143 144',
    'Banshee':'121 232 252',
    'XFC@Beast':'021 122 132',
    'Bishop':'125 136 256',
    'Blink':'013 123 135',
    'Blob':'015 116 218',
    'Boom Boom':'112 122 242',
    'Colossus':'144 165 287',
    'Cyclops':'142 153 164',
    'Doop':'011 132 266',
    //'Emma Frost':'135 146 257',
    'Havok':'114 134 154',
    //'Iceman':'124 136 146',
    'Jean Grey':'133 255 366',
    'Jubilee':'021 133 243',
    //'Juggernaut':'163 274 376',
    //'Kitty Pryde':'022 032 133',
    //'Magneto':'144 257 368',
    'Mimic':'011 111 112',
    'Morph':'022 122*123*',
    'Nocturne':'031 142 143',
    'Onslaught':'244 246 268',
    'Polaris':'122 234 255',
    'XFC@Professor X':'115 217 317',
    //'Pyro':'031 142 152',
    //'Quicksilver':'031 132 143',
    //'Sabretooth':'133 144 254',
    'Sasquatch':'033 144 166',
    //'Scarlet Witch':'013 033 153',
    'Sebastian Shaw':'012 133 366',
    //'Sentinel':'155 266 388',
    'XFC@Storm':'021 031 133',
    'Sunfire':'011 133 264',
    'Thunderbird':'142 253 255',
    'XFC@Wolverine':'152*263*384',
    'Blink In-Betweener':'033 144 254',
    'Comic X-23':'133*145 256',
    'Czar Colossus':'144 166 288',
    'Phoenix Storm':'033 145 266',

    //TOA
    'Aasimar Paladin':'013 124 125',
    'Acererak':'126 138 269',
    'Allosaurus':'034 144 155',
    'Amber Golem':'145 155 267',
    'Artus Cimber':'033 144 166',
    'Basilisk':'123 234 246',
    'Batiri Battle Stack':'011 021 122',
    'Birdsong':'013 023 135',
    'Captain Elok Jaharwon':'025 135 146',
    'Captain Laskilar':'025 135 146',
    'Chwinga':'001 111 112',
    'toa@Doppelganger':'011 122 133',
    'Dragonborn Sorcerer':'013 124 126',
    'Elf Druid':'022 123 234',
    'Fenthaza':'114 125 245',
    'Gold Dragon':'144 266 378',
    'Goliath Fighter':'021 022 133',
    'Human Outlander':'031*142 253',
    'Pseudodragon':'011 122 123',
    'Queen Grabstab':'025 136 138',
    'Ras Nsi':'142 153 164',
    'Silver Dragon':'133 144 256',
    'Skeleton Key':'021 132 133',
    'Stone Golem':'145 155 267',
    'Tabaxi Rogue':'111*122*133',
    'Tomb Dwarf':'133 144 154',
    'Tomb Guardian':'124 235 246',
    'Triceratops':'131 142 263',
    'Tyrannosaurus Zombie':'155 166 277',
    'Valindra Shadowmantle':'026 137 248',
    'Xandala Cimber':'013 124 126',
    'Yuan-ti Abomination':'133 144 266',
    'Yuan-ti Pureblood':'021 131 133',

    //THOR
    'Absorbing Man':'032 133 144',
    'Balder':'144 145 246',
    'Blackheart':'142 152 254',
    'Chipmunk Hunk':'132* 133 243*',
    'Crystal':'022 132 133',
    'Destroyer':'133 134 254',
    'Fandral':'153 164 265',
    'Heimdall':'266 277 388',
    'Hela':'155 166 277',
    'Hogun':'144 155 256',
    'THOR@Hulk':'154 266 377',
    'THOR@Iron Man':'143* 144 264',
    'Jane Foster':'012 022 023',
    'Karnak':'013 033 143',
    'Kate Bishop':'031 032 134',
    'THOR@Loki':'125 236 247',
    'Malekith':'114 125 136',
    'Mr. Fixit':'165* 277* 388',
    //'Nick Fury':'013 124 125',
    //'Odin':'136* 147 358*',
    //'Pepper Potts':'011 013 022',
    'THOR@Punisher':'141 152 263',
    'Ragnarok':'153 164 276',
    'SP//dr':'133* 143 254',
    'Samantha Wilson':'133 254 255',
    'Sif':'134 145 256',
    'Surtur':'166 277 288',
    'Thor (M)':'156 268 388',
    'Thor (F)':'145 256 368',
    'Thorbuster Iron Man':'153 164 277',
    'US Agent':'153 164 265',
    'Volstagg':'136 146 258',
    'Wrecker':'133 143 145',
    'Earth X Captain America':'133 145 155',
    'Earth X Machine Man':'022 123 134',
    'Earth X The Skull':'011 013 124',
    'Earth X Thor':'144 255 266',




    };
    var gender = {
    "Black Widow":1,
    "Emma Frost":1,
    "Kitty Pryde":1,
    "Magik":1,
    "Marvel Girl":1,
    "Mystique":1,
    "Phoenix":1,
    "Phoenix Force":2,
    "Psylocke":1,
    "Rogue":1,
    "Scarlet Witch":1,
    "Sentinel":2,
    "She-Hulk":1,
    "Storm":1,
    "X-23":1,

    "Beholder":2,
    "Blue Dragon":2,
    "Carrion Crawler":2,
    "Copper Dragon":2,
    "Dracolich":2,
    "Drow Assassin":1,
    "Elf Wizard":1,
    "Gelatinous Cube":2,
    "Green Dragon":2,
    "Halfling Thief":1,
    "Invisible Stalker":2,
    "Manticore":2,
    "Mummy":2,
    "Owlbear":2,
    "Purple Worm":2,
    "Red Dragon":2,
    "Stirge":2,
    "Tarrasque":2,
    "Treant":2,
    "Umber Hulk":2,
    "Unicorn":2,
    "Vampire":1,

    "Baby Dragon":2,
    "Blue-Eyes White Dragon":2,
    "Curse of Dragon":2,
    "Dark Magician Girl":1,
    "Harpie Lady":1,
    "Harpie Lady Sisters":1,
    "Injection Fairy Lily":1,
    "Kuriboh":2,
    "Man-Eater Bug":2,
    "Marshmallon":2,
    "Morphing Jar":2,
    "Mystical Elf":1,
    "Red-Eyes B. Dragon":2,
    "Sangan":2,
    "Slifer the Sky Dragon":2,
    "The Winged Dragon of Ra":2,
    "Thousand Dragon":2,
    "Time Wizard":2,

    "Black Canary":1,
    "Catwoman":1,
    "Cheetah":1,
    "Harley Quinn":1,
    "Katana":1,
    "Stargirl":1,
    "Vixen":1,
    "Wonder Woman":1,
    "Zatanna":1,
    "Atomica":1,

    "Captain Marvel":1,
    "Captain Universe":1,
    "Enchantress":1,
    "Gamora":1,
    "Groot":2,
    "Jocasta":1,
    "Maria Hill":1,
    "Moondragon":1,
    "Pepper Potts":1,
    "Spider-Woman":1,
    "AoU@Thor":1,
    "Ultron Drone":2,
    "Wasp":1,

    "Bleez":1,
    "Carol Ferris":1,
    "Fatality":1,
    "Indigo-1":1,
    "Jade":1,
    "Lyssa Drak":1,
    "Mera":1,
    "Miri Riam":1,
    "Mogo":2,
    "Ranx":2,
    "Raven":1,
    "Starfire":1,
    "Supergirl":1,
    "Wonder Girl":1,
    "Black Lantern Wonder Woman":1,

    "Aunt May":1,
    "Black Cat":1,
    "Blink":1,
    "Dagger":1,
    "Firestar":1,
    "Gwen Stacy":1,
    "Mary Jane":1,
    "Silver Sable":1,
    "Spider-Girl":1,
    "White Tiger":1,
    "ASM@Ghost Rider":1,

    "Bahamut":2,
    "Black Dragon":2,
    "Blink Dog":2,
    "Bronze Dragon":2,
    "Bugbear Ambusher":2,
    "Cockatrice":2,
    "Displacer Beast":2,
    "Erinyes":1,
    "Glazbrezu":2,
    "Ghost":1,
    "Giant Spider":2,
    "Gnome Ranger":1,
    "Gorgon":2,
    "Half-Orc Barbarian":1,
    "Hell Hound":2,
    "Intellect Devourer":2,
    "Lizardfolk":2,
    "Lolth":1,
    "Rust Monster":2,
    "White Dragon":2,

    "Superwoman": 1,
    "Poison Ivy": 1,
    "Power Girl": 1,
    "Oracle": 1,
    "Lois Lane": 1,
    "Batgirl": 1,

    "Melinda May":1,

    "April":1,

    "Jessica Jones":1,
    "Moonstone":1,
    "Ms. Marvel":1,
    "Namorita":1,
    "Rescue":1,
    "Ronin":1,
    "Songbird":1,
    "CW@Thor":1,
    "Natalia Romanova":1,
    "Shannon Carter":1,
    "Squirrel Girl":1,

    "Amanda Waller":1,
    "Doctor Light":1,
    "Felicity Smoak":1,
    "Killer Frost":1,
    "Giganta":1,
    "Huntress":1,
    "Speedy":1,
    "White Lantern Wonder Woman":1,

    "Clea":1,

    'Agent Carter':1,
    'Angela':1,
    'Angel Dust':1,
    'Blind Al':1,
    'Domino':1,
    'Elektra':1,
    'Lady Bullseye':1,
    'Lady Deadpool':1,
    'Madame Hydra':1,
    'Medusa':1,
    'Negasonic Teenage Warhead':1,
    'Outlaw':1,
    'Sandi Brandenberg':1,
    'Shiklah':1,
    'Stepford Cuckoos':1,

    'Renet Tilley':1,
    'Karai':1,

    "Batwoman":1,
    "Big Barda":1,
    "Dove":1,
    "Hawkgirl":1,
    "Talia al Ghul":1,

    "Hellcat":1,

    "Artemis":1,

    "Shriek":1,

    'Daisy Johnson':1,
    'Ironheart':1,
    'Madame Masque':1,
    'Madame Web':1,
    'Mantis':1,
    'Nebula':1,
    'Quasar':1,
    
    'Boom Boom':1,
    'Jean Grey':1,
    'Jubilee':1,
    'Nocturn':1,
    'Polaris':1,
    'Sasquatch':1,
    'Blink In-Betweener':1,
    'Cosmic X-23':1,
    'Phoenix Storm':1,
    
    
    'Allosaurus':2,
    'Basilisk':2,
    'Batiri Battle Stack':2,
    'Chwinga':2,
    'Elf Druid':1,
    'Fenthaza':1,
    'Gold Dragon':2,
    'Human Outlander':1,
    'Pseudodragon':2,
    'Queen Grabstag':1,
    'Red Dragon':2,
    'Silver Dragon':2,
    'Tabaxi Rogue':2,
    'Triceratops':2,
    'Tyrannosaurus Zombie':2,
    'Valindra Shadowmantle':1,
    'Xandala Cimber':1,
    'Yuan-ti Abomination':2,
    'Yuan-ti Pureblood':1,
    'TOA@Zombie':2,
    
    'Clay Golem':2,
    'Stone Golem':2,
    'Flesh Golem':2,
    'Iron Golem':2,
    'Amber Golem':2,
    'Tomb Guardian':2,
    
    
    'Crystal':1,
    'Hela':1,
    'THOR@Hulk':1,
    'Jane Foster':1,
    'Kate Bishop':1,
    'THOR@Punisher':1,
    'Samantha Wilson':1,
    'Sif':1,
    'Thor (F)':1,
    'Earth X Thor':1,
    
    };


  </script>
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
    table.s tr td:hover { background: #d9b310 !important; cursor: pointer; }
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
    .cardimage td.edit { width: 30px; }
    hr { color: white; }
    @font-face { font-family: "Doop"; src: url(roswreck.ttf); }
    .doop { font-family: "Doop", Arial; }
	.bac { background: #BBBBBB}
  </style>
</head>
<body style="margin:0; padding:0; background-color:#ebebebe;">
 <!--Navbar-->
  <div w3-include-html="topbar.php"></div>

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
  <span style="float:right;cursor:pointer; margin: 0 4px;background-color:#0b3c5d; color:white"><a style="text-decoration:none;color:white" href="mailto:thedicecoalition@gmail.com">Contact</a></span>
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
  <td id="teamsort1">&nbsp<div class="tt">Sort by Card #</div></td>
  <td id="teamsort2">&nbsp<div class="tt">Sort by Card Name</div></td>
  <td id="teamsort3">&nbsp<div class="tt">Sort by Cost</div></td>
  <td id="teamsort4">&nbsp<div class="tt">Sort by Energy Type</div></td>
  <td id="teamsort5">&nbsp<div class="tt">Sort by Affiliation</div></td>
  <td id="teamsort6">&nbsp<div class="tt">Sort by Max dice</div></td>
  <td id="teamsort7">&nbsp<div class="tt">Sort by Rarity</div></td>
  <td class="extra" id="teamsort8">&nbsp<div class="tt">Sort by D&amp;D Alignment</div></td>
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
      <span class="button" onclick="print_team_sheet()">Print Tournament Team Sheet</span>
      <span style="display:none">
      <span>TRP forum codes - <span id="trpcodes"></span></span>
      <br><span class="button button_file">Import DiceMastersDB Teams<input type="file" id="import_dmdb_teams" onchange="import_dmdb_teams_changed()"/></span>
      </span>
    </span>
  </span>
  <span class="show_empty hide"><span class="show_mode1 show_mode2 hide">Click on '+' in the result table to add cards to the team.<br></span></span>
  <span class="show_mode1 hide">
    <br><span class="button show_addrandom hide" onclick="add_random()">+ Random</span>
    <span class="button show_addrandombac hide" onclick="add_random_bac()">+ Random Basic Action</span>
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
  <input type="checkbox" id="set0" checked>AvX
  <input type="checkbox" id="set1" checked>UXM
  <input type="checkbox" id="set5" checked>AoU
  <input type="checkbox" id="set7" checked>ASM
  <input type="checkbox" id="set11" checked>CW
  <input type="checkbox" id="set13" checked>DrS
  <input type="checkbox" id="set14" checked>DP
  <input type="checkbox" id="set16" checked>IMW
  <input type="checkbox" id="set18" checked>Def
  <input type="checkbox" id="set20" checked>SMC
  <input type="checkbox" id="set21" checked>GotG
  <input type="checkbox" id="set22" checked>XFC
  <input type="checkbox" id="set24" checked>Thor
  <input type="checkbox" id="set4" checked>JL
  <input type="checkbox" id="set6" checked>WoL
  <input type="checkbox" id="set9" checked>WF
  <input type="checkbox" id="set12" checked>GAF
  <input type="checkbox" id="set17" checked>BAT
  <input type="checkbox" id="set19" checked>SWW
  <input type="checkbox" id="set2" checked>BFF
  <input type="checkbox" id="set8" checked>FUS
  <input type="checkbox" id="set23" checked>TOA
  <input type="checkbox" id="set10" checked>TMNT
  <input type="checkbox" id="set15" checked>HHS
  <input type="checkbox" id="set3" checked>YGO
  <button id="setall" type="button">All</button>
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
    <option value="10" selected>10</option>
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
  </span><span class="search_category">
  <select id="incollection">
   <option value="">Collection status</option>
   <option value="C">In collection</option>
   <option value="N">Not in Collection</option>
   <option value="W">Want in Trade</option>
   <option value="H">Have for Trade</option>
  </select></span>
  <span class="search_category">
  <select id="informat">
   <option value="">No Format</option>
   <option value="G">Golden Era</option>
   <option value="M">Modern Era</option>
   <option value="P">PDC Prime</option>
  </select>
  </span>
  </div>
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
  <img id="cardpreview" class="cardpreview show_cardpreview hide" src="http://dm.frankenstein.com/48.jpg">
  <script>
  //navbar
  "use strict";
  w3.includeHTML();

  function E(t) { return document.getElementById(t); }
  function C(t) { return document.getElementsByClassName(t); }

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
  function load_team(nr) {
      if (!("cards" in saved_teams[nr])) return;
      if (!("dice" in saved_teams[nr])) return;
      team_name = saved_teams[nr].name || "Unnamed";
      team = saved_teams[nr].cards.map(function(e){return trs_all[e]});
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
        if (cur.type == 2 && num_bac >= 2) show = false;
        if (cur.type != 2 && num >= 8) show = false;
      }
      pluses[i].style.display = show ? "block" : "none";
    }
    for (var i = 0; i < minuses.length; i++) {
      var cur = trs_all[minuses[i].id.substring(3)];
      minuses[i].style.display = team_num[cur.nr] ? "block" : "none";
    }
    pool_oth = num >= 8 ? [] : rows.filter(function(x){return x.type!=2 && !team_num[x.nr] && !has_name[x.mainname.replace('™', '')];});
    pool_bac = num_bac >= 2 ? [] : rows.filter(function(x){return x.type==2 && !team_num[x.nr];});
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
  function clearteam() {
    if(team.length && !confirm('Clear the current team?')) return false;
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
      return gendice1(0,s)+gendice1(0,s.substring(4))+gendice1(0,s.substring(8))+gendice1('1 hide',totals);
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
  var is_dnd = trs_name === 'bff' || trs_name === 'fus' || trs_name === 'toa';
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
  var type = thisdie ? 0 : p[1] === 'Basic Action Card' || setname == 'JLop' ? 2 : 1;
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
  if (!is_dnd) pj = pj.replace("Overcrush", "<strong>Overcrush</strong>");
  pj = pj.replace("Ally", "<strong>Ally</strong>");
  pj = pj.replace("Immortal", "<strong>Immortal</strong>");
  pj = pj.replace("Underdog", "<strong>Underdog</strong>");
  if (!is_dnd) pj = pj.replace("Regenerate", "<strong>Regenerate</strong>");
  pj = pj.replace("Aftershock", "<strong>Aftershock</strong>");
  pj = pj.replace("Iron Will", "<strong>Iron Will</strong>");
  pj = pj.replace("Fast ", "<strong>Fast</strong> ");
  pj = pj.replace("Resistance", "<strong>Resistance</strong>");
  pj = pj.replace("Enlistment", "<strong>Enlistment</strong>");
  pj = pj.replace("Intimidate", "<strong>Intimidate</strong>");
  pj = pj.replace("Crossover", "<strong>Crossover</strong>");
  pj = pj.replace("Deadly", "<strong>Deadly</strong>");
  pj = pj.replace("Suit Up", "<strong>Suit Up</strong>");
  pj = pj.replace("Boomerang", "<strong>Boomerang</strong>");
  pj = pj.replace("Call Out", "<strong>Call Out</strong>");
  pj = pj.replace("Infiltrate", "<strong>Infiltrate</strong>");
  pj = pj.replace("Awaken", "<strong>Awaken</strong>");
  pj = pj.replace("Attune", "<strong>Attune</strong>");
  pj = pj.replace("Trap", "<strong>Trap</strong>");
  pj = pj.replace("Trigger", "<strong>Trigger</strong>");
  pj = pj.replace("Effect", "<strong>Effect</strong>");
  if (pj.substring(0,7) == 'Heroic:' || pj.substring(0,7) == 'Fusion:') {
      pj = '<strong>'+pj.substring(0,7)+'</strong>'+pj.substring(7);
  } else if (pj.substring(0,7) == 'Global:' || pj.substring(0,7) == 'Ritual:') {
      pj = '<strong>'+pj.substring(0,7)+'</strong>'+pj.substring(7);
      pc = ' class="global"';
  } else if (pj.substring(0,6) == 'Global') {
      pj = '<strong>Global</strong>'+pj.substring(6);
      pc = ' class="global"';
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
  } else if (pj.substring(0,9) == 'Impulse -') {
      pj = '<strong>Impulse</strong> -'+pj.substring(9);
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
      formats:7^(format_bans[setname]||0)^(format_bans[(i+1)+setname]||0),
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
  P: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "WoL",
       "WoLop", "M2015", "ASM", "FUS" ],
  M: [ "AvX", "AvXop", "UXM", "UXMop", "UXMop2", "BFF", "BFFpr", "YGO", "JL", "JLop", "BFFop", "AoU", "15FUS" ],
  G: [ "31UXM", "119YGO" ],
  });
  function convert_to_map(bans) {
    var map = {};
    for (var i in bans) {
      var bit = 1 << "GMP".indexOf(i);
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
  init(11,aou,'AoU','aou');
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
    t += '<div class="cardimagebox">';
    t += '<div class="im_costbg"></div>';
    t += '<div class="im_cost">'+a.cost+'</div>';
    if (a.energyimg != '0') t += '<div class="im_energy"><img src="e'+a.energyimg+'.png"></div>';
    if (a.affiliationimg != '0') t += '<div class="im_aff"><img src="a'+a.affiliationimg+'.png"></div>';
    t += '<div class="im_title"><span class="im_main">'+a.mainname+'</span><br><span class="im_sub">'+a.subname+'</span></div>';
    t += '<div class="im_text">'+a.text+'</div>';
    t += '<div class="im_rarity r'+a.rarity+'"></div>';
    if (trpcode(a.nr)) t += '<img class="ci_img" draggable="false" src="' + trpaddress(a.nr) + '">';
    t += '</div>';
    t += '<td></tr></table>';
    return t;
  }
  function display_team() {
    var bac = team.filter(function(a){return a.type == 2});
	var cString = "class='bac' ";
	for(var i = 0; i < bac.length; i++){	
		var html = bac[i].html;
		var newHtml = [html.slice(0, 4), cString, html.slice(4)].join('');
		bac[i].html = newHtml;
	}
    var oth = team.filter(function(a){return a.type != 2});
    var bactxt = bac.map(function(a){return a.html}).join('');
    var othtxt = oth.map(function(a){return a.html}).join('');
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
    team_serial = oth.concat(bac).map(function(a){return team_num[a.nr] + 'x' + num2cardname(a.nr)}).join(';');
    team_coloncode = oth.concat(bac).map(function(a){return ':'+trpcode(a.nr)+':'}).join(' ');
    E('team').innerHTML = all;
    E('teampic').innerHTML = allpic;
    if (mode == 1) {
      var team_rows = E('team').getElementsByTagName('TR');
      for (var i = 0; i < team_rows.length; i++) make_draggable(team_rows[i]);
      team_rows = E('teampic').getElementsByTagName('TABLE');
      for (var i = 0; i < team_rows.length; i++) make_draggable(team_rows[i]);
    }
    E('teamstatus').innerHTML = 'Cards: '+num_cards+', Dice: ' + num_dice + ', Basic Actions: ' + num_bac + '.';
    hideelem('nonempty');
    hideelem('empty');
    if (team.length > 0) showelem('nonempty');
    else showelem('empty');
    maketeamlink();
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
  var lastfilter = {};
  var lastsearch = "";
  function filter() {
      var set = {};
      set.n = E('filt0').value;
      set.name = E('filt1').value.toLowerCase();
      set.text = E('filt2').value.toLowerCase();
      set.type = set.energy = set.rarity = set.gender = set.set = 0;
      set.set = getcheckboxval('set',set_names.length);
      set.type = getcheckboxval('type',3);
      set.energy = getcheckboxval('energy',5);
      set.rarity = getcheckboxval('rarity',6);
      set.cost_max = E('cost_max').selectedIndex;
      set.cost_min = E('cost_min').selectedIndex;
      set.gender = getcheckboxval('gender',3);
      set.incollection = E('incollection').value;
      set.informat = E('informat').value ? 1 << "GMP".indexOf(E('informat').value) : 0;
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
      if (v.indexOf("&") >= 0 || v.indexOf("|") >=0 || v.indexOf("~") >=0) {
    return new RegExp(v.split(/ *\| */).map(function(a){return '^'+a.split(/ *\& */).map(function(a){
        var aa = a.replace(/^~ */,'');
        return (a === aa ? "(?=.*" : "(?!.*")+aa.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&')+")";
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
      var sets = set.set === undefined ? -1 : set.set;
      var rows = [];
      k6 = 1 << set.cost_max + 1;
      k6 -= 1 << set.cost_min;
      if (!sets) sets = -1;
      if (k6 < 0) k6 = 0;
      for (var i = 0; i < set_names.length; i++) {
    if (sets & (1 << i)) rows.extend(trs_by_set[i]);
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
      setselectbox('informat', set.format === undefined ? undefined : "GMP".indexOf(set.format) + 1, 0);
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
      var cards = set.cards.split(';');
      if (!clearteam()) return;
      if (set.name) team_name = set.name;
      team = cards.map(function(a){var m = /x/.exec(a);var c = cardname2num(a.substring(m.index+1)); team_num[c] = parseInt(a); return trs_all[c];});
      team_search = [];
      team_update();
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
  function visualize_team_link() {
      var f = function(x){
    return addtosearchlink(type, trpcode(x.nr));
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
    E('affiliationbox'+i).style.display = s & m ? 'inline' : 'none';
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
      if (nr === lastcardpreview || !nr || !trpaddress(nr))
          return hidecardpreview();
      var prevnr = tr.previousElementSibling && tr.previousElementSibling.childNodes[5] ? parseInt(tr.previousElementSibling.childNodes[5].id.substring(4)) : 0;
      var nextnr = tr.nextElementSibling && tr.nextElementSibling.childNodes[5] ? parseInt(tr.nextElementSibling.childNodes[5].id.substring(4)) : 0;
      var rect = tr.childNodes[7] ? tr.childNodes[7].getBoundingClientRect() : undefined;
      showelem('cardpreview');
      lastcardpreview = nr;
      lastcardpreviewtr = tr;
      if (rect && window.innerHeight > 800 && window.innerWidth > 500) {
          cardpreview.style.top = (rect.bottom + window.pageYOffset)+'px';
          cardpreview.style.left = (rect.left + window.pageXOffset)+'px';
          cardpreview.style.height = '521px';
          cardpreview.style.width = '368px';
          cardpreview.style.position = 'absolute';
      } else {
          var w = window.innerWidth - 4;
          var h = window.innerHeight - 4;
          if (h / w > 521 / 368) {
              h = w / 368 * 521;
          } else {
              w = h / 521 * 368;
          }
          cardpreview.style.height = h + 'px';
          cardpreview.style.width = w + 'px';
          cardpreview.style.top = ((window.innerHeight - 4 - h) / 2) + 'px';
          cardpreview.style.left = ((window.innerWidth - 4 - w) / 2) + 'px';
          cardpreview.style.position = 'fixed';
          if (rect) window.scrollTo(0,rect.top + window.pageYOffset);
      }
      cardpreview.src = '';
      cardpreview.src = trpaddress(nr);
      if (nextnr) preloadpreview0.src = trpaddress(nextnr);
      if (prevnr) preloadpreview1.src = trpaddress(prevnr);
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
