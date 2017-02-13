<!--
File: single_player_avg_header.php
Author: Wuxi Li
Date: Apr. 22, 2015
Decription: Defined all Javascript Function and CSS will be used in single_player_avg.php
            Will be included at the beginning of single_game_avg.php
-->

<style type="text/css">
.ui-tabs .ui-tabs-nav li {
	width:3.32%;
}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
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


$(function() {
	$('#player_searchbox1').autocomplete({
		source:'suggest_player_name.php', 
		minLength:2,
		select: function (event, ui) {
			//event.preventDefault();
			var player_name = ui.item.val;
			$("#player_searchbox1").val(player_name);  
		},
		html: true, 
		// if other layers overlap the autocomplete list
		open: function(event, ui) {
			$(".ui-autocomplete").css("z-index", 1000);
		}
	});
});


// Tabs
$(function() {
	$( "#tabs" ).tabs();
});
</script>
