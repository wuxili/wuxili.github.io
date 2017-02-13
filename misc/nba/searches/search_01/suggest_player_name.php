<?php
/*
File: suggest_player_name.php
Author: Wuxi Li
Date: Apr. 22, 2015
Decription: Return possible player_name based on the player_name in database
			Will be called by player_search_box which is a jQuery.autocomplete
*/
	// connect to database
	$host = "localhost";
	$username = "foo";
	$password = "nba";
	$database = "foo";
	$link = mysqli_connect($host, $username, $password, $database);

	// retrieve the search term that player_search_box sends
	$term = filter_var ($_GET['term']); 
	$query = "SELECT * FROM player_table WHERE player_name LIKE '%$term%'";

	// perfrom query
	$result = mysqli_query($link, $query);

	// check result
	if (! $result) {
		$msg = "Invalid query: " . mysql_error . "\n";
		$msg .= "Query performed: ". $query;
		die ($msg);
	}

	// use result
	$a_json = array();
	$a_json_row = array();
	while($row = mysqli_fetch_array($result)) {
		$player_name = $row['player_name'];
		$player_id = $row['player_id'];
		$a_json_row["id"] = $player_id;
		$a_json_row["value"] = $player_name;
		$a_json_row["label"] = $player_name;
		array_push($a_json, $a_json_row);
	}

	// jQuery wants JSON data
	print json_encode($a_json);
	flush();

	// close connection
	mysqli_close ($link);
?>
