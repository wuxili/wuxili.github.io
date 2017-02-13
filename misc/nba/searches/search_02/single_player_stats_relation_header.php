<!--
File: single_player_stats_relation_header.php
Author: Wuxi Li
Date: Apr. 24, 2015
Decription: Defined all Javascript Function and CSS will be used in single_player_stats_relation.php
            Will be included at the beginning of single_player_stats_relation.php
-->

<html>
<head>
<title>Player Performance Scatter Plot</title>
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
// player searchbox, auto list all possible player_name
$(function() {
	$('#player_searchbox').autocomplete({
		source:'suggest_player_name.php', 
		minLength:2,
		select: function (event, ui) {
			//event.preventDefault();
			var player_name = ui.item.val;
			$("#player_searchbox").val(player_name);  
		},
		html: true, 
		// if other layers overlap the autocomplete list
		open: function(event, ui) {
			$(".ui-autocomplete").css("z-index", 1000);
		}
	});
});
</script>
</head>
<body>
