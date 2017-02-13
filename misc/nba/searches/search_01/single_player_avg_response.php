<!--
File: single_player_avg_response.php
Author: Wuxi Li
Date: Apr. 18, 2015
Decription: Handle Form snet by single_player_avg.php, perform mysql query and display results
-->

<head>
<title>Single Player Average Stats</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<script>
	$(document).ready(function(){
	    $('#sort_table').dataTable({
			"dom":' <"serach"f><"top"l>rt<"bottom"ip><"clear">'
		});
	});
	</script>
</head>
<body>
<?php
/* This script process the form sent by single_player_avg.php
 * The variables being passed are:
 *     player_name
 */	
	// connect to database
	$host = "localhost";
	$username = "foo";
	$password = "nba";
	$database = "foo";
	$link = mysqli_connect($host, $username, $password, $database);
	
	// all variables should be passed by GET
	$form_keys = array (
		"player_name"
	);

	$get = array();

	//perform data validation
	foreach ($form_keys as $k) {
		if (isset ($_GET[$k])) {
			$clear_val = filter_var ($_GET[$k]); // remove all illegal char
			$get[$k] = $clear_val;
		}
	}

	// formulate query
	$query_head = "
		SELECT
			player_table.player_name,
			season_table.season_name,
			COUNT(player_game_table.mp) AS gp,
			AVG(player_game_table.mp) AS mp,
			AVG(player_game_table.fg) AS fg,
			AVG(player_game_table.fga) AS fga,
			AVG(player_game_table.fg)/AVG(player_game_table.fga) AS fg_pct,
			AVG(player_game_table.fg3) AS fg3,
			AVG(player_game_table.fg3a) AS fg3a,
			AVG(player_game_table.fg3)/AVG(player_game_table.fg3a) AS fg3_pct,
			AVG(player_game_table.ft) AS ft,
			AVG(player_game_table.fta) AS fta,
			AVG(player_game_table.ft)/AVG(player_game_table.fta) AS ft_pct,
			AVG(player_game_table.orb) AS orb,
			AVG(player_game_table.drb) AS drb,
			AVG(player_game_table.trb) AS trb,
			AVG(player_game_table.ast) AS ast,
			AVG(player_game_table.pf) AS pf,
			AVG(player_game_table.stl) AS stl,
			AVG(player_game_table.blk) AS blk,
			AVG(player_game_table.tov) AS tov,
			AVG(player_game_table.pts) AS pts
		FROM
			player_game_table
			INNER JOIN player_table ON player_game_table.player_id = player_table.player_id
			INNER JOIN game_table   ON player_game_table.game_id = game_table.game_id
			INNER JOIN season_table ON season_table.season_id = game_table.season_id
	";
	$query_tail = "
		GROUP BY
		season_table.season_id
		ORDER BY
		season_table.season_id;
	";
	$query_condition = "WHERE player_table.player_name LIKE '". $get["player_name"] . "'";
	$query = $query_head . $query_condition . $query_tail;

	// perfrom query
	$result = mysqli_query ($link, $query);

	// check result
	if (! $result) {
		$msg = "Invalid query: " . mysql_error . "\n";
		$msg .= "Query performed: ". $query;
		die ($msg);
	}

	// if result is empty
	if (mysqli_num_rows($result) == 0) {
		print "Cannot find player '" . $get["player_name"] . "'.";
		exit;
	}

	// formulate results variables
	$result_keys = array (
		'player_name', 'season_name', 'gp',
		'fg', 'fga', 'fg_pct', 'fg3', 'fg3a', 'fg3_pct',
		'ft', 'fta', 'ft_pct', 'orb', 'drb', 'trb',
		'ast', 'pf', 'stl', 'blk', 'tov', 'pts'
	);
	$result_digit_precusuib = array (
		'player_name', 'season_name', 'gp',
		'fg', 'fga', 'fg_pct', 'fg3', 'fg3a', 'fg3_pct',
		'ft', 'fta', 'ft_pct', 'orb', 'drb', 'trb',
		'ast', 'pf', 'stl', 'blk', 'tov', 'pts'
	);

	print "<div class='table-responsive' align='center'>";
	print "<table id='sort_table' class='table table-striped' style='font-size:80%; width:auto;'>";
	print "<thead>";
	print "<tr>";
	foreach ($result_keys as $k) { // print head line
		print "<th>$k</th>";
	}
	print "</tr>";
	print "</thead>";

	// use result
	print "<tbody>";
	while ($row = mysqli_fetch_array($result)) {  // output every entries
		print "<tr>";
		foreach ($result_keys as $k) {  // output every columns
			$data = $row[$k];
			if (is_numeric($data)) {
				if (preg_match('/_pct$/', $k)) {
					printf ("<td align='center'>%.3f</td>", $data); // 3 digit precision for shooting percentage
				} else if ($k == 'gp') {
					printf ("<td align='center'>%d</td>", $data); // int for game played
				} else {
					printf ("<td align='center'>%.1f</td>", $data); // 1 digit precision for other stats
				}
			}
			else // not a stats field
			{
				printf ("<td align='center'>%s</td>", $data); // 1 digit precision for other stats
			}
		}
		print "</tr>";
	}
	print "</tbody>";
	print "</table>";
	print "</div>";

	// close connection
	mysqli_close ($link);
?>

</body>

