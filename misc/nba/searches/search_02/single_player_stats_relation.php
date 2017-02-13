<!--
File: single_player_stats_relation.php
Author: Wuxi Li
Date: Apr. 24, 2015
Decription: Performs search about data relations between different stats of a single-player in specific seasons
-->

<?php include ("single_player_stats_relation_header.php") ?>

<div style="width: 300px; float: left;">
<form action="single_player_scatter_plot.php" method="GET" style="width: 300px">
	<?php
		$player_name = "";
		if (isset($_GET['player_name'])) { // keep value unchanged after form submission
			$player_name = filter_var ($_GET['player_name']);
		}
		print "<p>Search Player  <input type='text' id='player_searchbox' placeholder='Player Name' name='player_name' value='$player_name'></p>";

		$name_mapping = array (
			"pts" => "Points",
			"trb" => "Rebounds",
			"ast" => "Assists",
			"stl" => "Steals",
			"blk" => "Blocks",
			"tov" => "Turnovers",
			"mp" => "Minutes Played",
			"fg" => "FG Made",
			"fga" => "FG Attempted",
			"fg_pct" => "FG %",
			"fg3" => "3Pt-FG Made",
			"fg3a" => "3Pt-FG Attempted",
			"fg3_pct" => "3Pt-FG %",
			"ft" => "FT Made",
			"fta" => "FT Attempted",
			"ft_pct" => "FT %"
		);
		print "<p>X Axis: ";
		print "<select name='x_axis'>";
		foreach ($name_mapping as $k => $v) {
			if ($_GET['x_axis'] == $k) { // keep values selected after form submission
				print "<option selected='true' value='$k'>$v</option>";
			} else {
				print "<option value='$k'>$v</option>";
			}
		}
		print "</select>";
		print "</p>";

		print "<p>Y Axis: ";
		print "<select name='y_axis'>";
		foreach ($name_mapping as $k => $v) {
			if ($_GET['y_axis'] == $k) { // keep values selected after form submission
				print "<option selected='true' value='$k'>$v</option>";
			} else {
				print "<option value='$k'>$v</option>";
			}
		}
		print "</select>";
		print "</p>";

		/***************** Create Dropdown box for 'seasons' *******************/
		// connect to database
		$host = "localhost";
		$username = "foo";
		$password = "nba";
		$database = "foo";
		$link = mysqli_connect($host, $username, $password, $database);

		$query = "SELECT * FROM season_table ORDER BY season_id";

		// perform query
		$result = mysqli_query($link, $query);

		// check result
		if (! $result) {
			$msg = "Invalid query: " . mysql_error . "\n";
			$msg .= "Query performed: ". $query;
			die ($msg);
		}

		// use results
		$all_seasons = array();
		print "<p>From Season:<br />";
		print "<select name='from_season'>";
		while ($row = mysqli_fetch_array($result)) { // print out all season option for a dropdown box
			$season = $row['season_name'] . ',' . $row['season_id']; // concat season_name and season_id with a comma, pass them together through from
			if ($_GET['from_season'] == $season) { // keep values selected after form submission
				printf ("<option selected='true' value='%s'>%s</option>", $season, $row['season_name']);
			} else {
				printf ("<option value='%s'>%s</option>", $season, $row['season_name']);
			}
		}
		print "</p></select>";

		// perform query again for to_season
		$result = mysqli_query($link, $query);
		print "<p>To Season:<br />";
		print "<select name='to_season'>";
		while ($row = mysqli_fetch_array($result)) { // print out all season option for a dropdown box
			$season = $row['season_name'] . ',' . $row['season_id']; // concat season_name and season_id with a comma, pass them together through from
			if ($_GET['to_season'] == $season) { // keep values selected after form submission
				printf ("<option selected='true' value='%s'>%s</option>", $season, $row['season_name']);
			} else {
				printf ("<option value='%s'>%s</option>", $season, $row['season_name']);
			}
		}
		print "</select></p>";

		// close connection
		mysqli_close ($link);
		/***************** End of Dropdown box for 'seasons' *******************/

		$mode = "";
		if (isset($_GET['player_name'])) { // keep value unchanged after form submission
			$mode = filter_var ($_GET['mode']);
		}
		if ($mode == "won_lost") { // keep values selected after form submission
			print "<input type='radio' name='mode' value='won_lost' checked='checked'>Won & Lost</input><br /><p></p>";
			print "<input type='radio' name='mode' value='home_away'>Home & Away</input><br /><p></p>";
		} else if ($mode == "home_away") { // keep values selected after form submission
			print "<input type='radio' name='mode' value='won_lost'>Won & Lost</input><br />";
			print "<input type='radio' name='mode' value='home_away' checked='checked'>Home & Away</input><br /><p></p>";
		} else { // default is won_lost
			print "<input type='radio' name='mode' value='won_lost' checked='checked'>Won & Lost</input><br /><p></p>";
			print "<input type='radio' name='mode' value='home_away'>Home & Away</input><br /><p></p>";
		}
	?>
	<input type="submit" value="submit">
</form>
</div>

<?php
	// connect to database
	$host = "localhost";
	$username = "foo";
	$password = "nba";
	$database = "foo";
	$link = mysqli_connect($host, $username, $password, $database);

	// all variables should be passed by GET
	$form_keys = array (
		"player_name",
		"x_axis",
		"y_axis",
		"from_season",
		"to_season",
		"mode"
	);

	$get = array();

	//perform data validation
	$all_defined = 1;
	foreach ($form_keys as $k) {
		if (isset ($_GET[$k])) {
			$clear_val = filter_var ($_GET[$k]); // remove all illegal char
			$get[$k] = $clear_val;
		} else {
			$get[$k] = "";
			$all_defined = 0;
		}
	}

	if ($all_defined) {
		// get season_name and season_id
		list($from_season_name, $from_season_id) = preg_split('/,/', $get['from_season']);
		list($to_season_name, $to_season_id) = preg_split('/,/', $get['to_season']);

		$query = "
			SELECT
				player_table.player_name,
				player_game_table." . $get['x_axis'] . " AS " . $get['x_axis'] . ", 
				player_game_table." . $get['y_axis'] . " AS " . $get['y_axis'] . ",
				player_game_table.in_home_team AS in_home_team,
				game_table.home_team_win AS home_team_win
			FROM
				player_game_table
				INNER JOIN player_table ON player_game_table.player_id = player_table.player_id
				INNER JOIN game_table   ON player_game_table.game_id = game_table.game_id
				INNER JOIN season_table ON season_table.season_id = game_table.season_id
			WHERE
				player_table.player_name LIKE '" . $get['player_name'] . "' AND
				season_table.season_id >= " . $from_season_id . " AND
				season_table.season_id <= " . $to_season_id . "
			ORDER BY " .
				$get['x_axis']
		;

		// perform query
		$result = mysqli_query($link, $query);

		// check result
		if (! $result) {
			$msg = "Invalid query: " . mysql_error . "\n";
			$msg .= "Query performed: ". $query;
			die ($msg);
		}

		$series1 = array();
		$series2 = array();
		$series1_name = "";
		$series2_name = "";
		while ($row = mysqli_fetch_array($result)) {
			if ($get['mode'] == "won_lost") {
				if ($row['in_home_team'] == $row['home_team_win']) { // series1 won, series2 lost
					$series1[] = "[" . $row[$get['x_axis']] . ", " . $row[$get['y_axis']] . "]";
				} else {
					$series2[] = "[" . $row[$get['x_axis']] . ", " . $row[$get['y_axis']] . "]";
				}
				$series1_name = "Won";
				$series2_name = "Lost";
			} else if ($get['mode'] == "home_away") { //series1 home, series2 away 
				if ($row['in_home_team']) {
					$series1[] = "[" . $row[$get['x_axis']] . ", " . $row[$get['y_axis']] . "]";
				} else {
					$series2[] = "[" . $row[$get['x_axis']] . ", " . $row[$get['y_axis']] . "]";
				}
				$series1_name = "Home";
				$series2_name = "Away";
			}
		}

		// close connection
		mysqli_close ($link);
	}

	// get pretty name used in scatter chart
	$name_mapping = array (
		"pts" => "Points",
		"trb" => "Rebounds",
		"ast" => "Assists",
		"stl" => "Steals",
		"blk" => "Blocks",
		"tov" => "Turnovers",
		"mp" => "Minutes Played",
		"fg" => "FG Made",
		"fga" => "FG Attempted",
		"fg_pct" => "FG %",
		"fg3" => "3Pt-FG Made",
		"fg3a" => "3Pt-FG Attempted",
		"fg3_pct" => "3Pt-FG %",
		"ft" => "FT Made",
		"fta" => "FT Attempted",
		"ft_pct" => "FT %",
		"" => ""
	);
	$x_axis = $name_mapping[$get['x_axis']];
	$y_axis = $name_mapping[$get['y_axis']];
?>


<script>
$(function () {
    $('#scatter_plot').highcharts({
        chart: {
            type: 'scatter',
            zoomType: 'xy'
        },
        title: {
            text: <?php printf ("'%s %s vs %s'", $get['player_name'], $x_axis, $y_axis) ?>
        },
        subtitle: {
            text: <?php printf ("'%s season to %s season'", $from_season_name, $to_season_name) ?>
        },
        xAxis: {
            title: {
                enabled: true,
                text: <?php print "'" . $x_axis . "'" ?>
            },
            startOnTick: true,
            endOnTick: true,
            showLastLabel: true
        },
        yAxis: {
            title: {
                text: <?php print "'" . $y_axis . "'" ?>
            }
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 100,
            y: 70,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
            borderWidth: 1
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 8,
                    states: {
                        hover: {
                            enabled: true,
                            lineColor: 'rgb(100,100,100)'
                        }
                    }
                },
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: <?php printf ("'%s: {point.x}, %s: {point.y}'", $x_axis, $y_axis) ?>
                }
            }
        },
        series: [{
            name: <?php print "'$series1_name'" ?>,
            //color: 'rgba(223, 83, 83, 0.8)',
            color: 'rgba(222, 125, 44, 0.6)',
            data: [<?php print join($series1, ',') ?>]
        }, {
            name: <?php print "'$series2_name'" ?>,
            //color: 'rgba(119, 152, 191, 0.8)',
            color: 'rgba(20, 68, 106, 0.6)',
            data: [<?php print join($series2, ',') ?>]
        }]
    });
});
</script>

<!--
<div id="scatter_plot" style="min-width: 310px; height: 400px; max-width: 800px; margin: 0 auto"></div>
-->
<div id="scatter_plot" style="width: 630px; height:600px; float: left" ></div>

</body>
</html>
