<!--
File: single_game_performance_response.php
Author: Wuxi Li
Date: Apr. 18, 2015
Decription: Handle Form snet by single_game_performance.php, perform mysql query and display results
-->

<html>
<head>
<title>Single Game Performance</title>
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
/* This script process the form sent by single_game_performance.php
 * The variables being passed are:
 *     pts_low, pts_high, trb_low, trb_high, ast_low, ast_high,
 *     stl_low, stl_high, blk_low, blk_high, fg_low,  fg_high,
 *     fga_low, fga_high, fg_pct_low, fg_pct_high, ft_low, ft_high,
 *     fta_low, fta_high, ft_pct_low, ft_pct_high, fg3_low, fg3_high,
 *     fg3a_low, fg3a_high, fg3_pct_low, fg3_pct_high, mp_low, mp_high,
 *     orb_low, orb_high, drb_low, drb_high, pf_low, pf_high, tov_low, tov_high
 */	

	// connect to database
	$host = "localhost";
	$username = "foo";
	$password = "nba";
	$database = "foo";
	$link = mysqli_connect($host, $username, $password, $database);
	
	// all variables should be passed by GET
	$form_keys = array (
		'pts_low', 'pts_high', 'trb_low', 'trb_high', 'ast_low', 'ast_high',
		'stl_low', 'stl_high', 'blk_low', 'blk_high', 'fg_low',  'fg_high',
		'fga_low', 'fga_high', 'fg_pct_low', 'fg_pct_high', 'ft_low', 'ft_high',
		'fta_low', 'fta_high', 'ft_pct_low', 'ft_pct_high', 'fg3_low', 'fg3_high',
		'fg3a_low', 'fg3a_high', 'fg3_pct_low', 'fg3_pct_high', 'mp_low', 'mp_high',
		'orb_low', 'orb_high', 'drb_low', 'drb_high', 'pf_low', 'pf_high', 'tov_low', 'tov_high'
	);

	$get = array();

	//perform data validation, and some post processing
	foreach ($form_keys as $k) {
		if (isset ($_GET[$k])) {
			$clear_val = filter_var ($_GET[$k]); // remove all illegal char
			if (preg_match('/^(fg|ft|fg3)_pct_(low|high)$/', $k)) {
				 // transfer [0-100] to [0-1] for shooting percentage
				$clear_val /= 100;
			}
			$get[$k] = $clear_val;
		}
	}

	// formulate query
	$query_head = "
		SELECT
			player_table.player_name,
			game_table.year,
			game_table.month,
			game_table.day,
			player_game_table.mp,
			player_game_table.fg,
			player_game_table.fga,
			player_game_table.fg_pct,
			player_game_table.fg3,
			player_game_table.fg3a,
			player_game_table.fg3_pct,
			player_game_table.ft,
			player_game_table.fta,
			player_game_table.ft_pct,
			player_game_table.orb,
			player_game_table.drb,
			player_game_table.trb,
			player_game_table.ast,
			player_game_table.pf,
			player_game_table.stl,
			player_game_table.blk,
			player_game_table.tov,
			player_game_table.pts
		FROM
			player_game_table
			INNER JOIN player_table ON player_game_table.player_id = player_table.player_id
			INNER JOIN game_table   ON player_game_table.game_id = game_table.game_id
	";
	$query_tail = "
		ORDER BY
		player_game_table.pts DESC
	";
	$query_condition = "WHERE";
	$concat = " ";
	foreach ($get as $k => $v) { // loop through all condition, and add them after the mysql WHERE clause
		$operator = "";
		if (preg_match('/low$/', $k)) { $operator = ">="; }
		else /* match /high$/ */ { $operator = "<="; }
		$table_col = preg_replace ('/_low|_high/', '', $k); // remove _low or _high to get column name in table
		$query_condition = $query_condition . $concat . "player_game_table." . $table_col . " $operator " . $v;
		$concat = " AND "; // concatenate conditions with AND
	}
	$query = $query_head . $query_condition . $query_tail;

	// perfrom query
	$result = mysqli_query ($link, $query);

	// check result
	if (! $result) {
		$msg = "Invalid query: " . mysql_error . "\n";
		$msg .= "Query performed: ". $query;
		die ($msg);
	}

	// formulate results variables
	$result_keys = array (
		'player_name', 'date',
		'mp', 'fg', 'fga', 'fg_pct', 'fg3', 'fg3a', 'fg3_pct',
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
			if ($k == 'date') { 
				$data = $row['year'] . '-' . $row['month'] . '-' . $row['day']; // concat year, month, and day
			} else {
				$data = $row[$k];
			}
			if (preg_match('/_pct$/', $k)) {
				printf ("<td align='center'>%.3f</td>", $data); // 3 digit precision for shooting percentage
			}
			else
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
</html>
