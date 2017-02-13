<html>
<title> search</title>
<body>

<?php include ("single_player_avg_header.php") ?>
<form action = "search_two_player_response.php" method = "GET">
<p>Favorite Player1: <input type="text" id ="player_searchbox" placeholder="Player Name" 
name="player1_name"></p>
<?php
		print "<p>Interested Season: ";
		print "<select name='player1_season'>";
		// connect to database
		$host = "localhost";
		$username = "foo";
		$password = "nba";
		$database = "foo";
		$link = mysqli_connect($host, $username, $password, $database);

		$query = "SELECT season_name FROM season_table ORDER BY season_name";

		// perfrom query
		$result = mysqli_query($link, $query);

		// check result
		if (! $result) {
			$msg = "Invalid query: " . mysql_error . "\n";
			$msg .= "Query performed: ". $query;
			die ($msg);
		}

		// use results
		while ($row = mysqli_fetch_array($result)) { // print out all season option for a dropdown box
			if ($_GET['season_name'] == $row['season_name']) { // keep values selected after form submission
				printf ("<option selected='true' value='%s'>%s</option>", $row['season_name'], $row['season_name']);
			} else {
				printf ("<option value='%s'>%s</option>", $row['season_name'], $row['season_name']);
			}
		}

		// close connection
		mysqli_close ($link);
		print "</select></p> ";
		?>
		<p> VS </p>

<p>Favorite Player2: <input type="text" id ="player_searchbox1" placeholder="Player Name" 
name="player2_name"></p>
<?php
		print "<p>Interested Season: ";
		print "<select name='player2_season'>";
		// connect to database
		$host = "localhost";
		$username = "foo";
		$password = "nba";
		$database = "foo";
		$link = mysqli_connect($host, $username, $password, $database);

		$query = "SELECT season_name FROM season_table ORDER BY season_name";

		// perfrom query
		$result = mysqli_query($link, $query);

		// check result
		if (! $result) {
			$msg = "Invalid query: " . mysql_error . "\n";
			$msg .= "Query performed: ". $query;
			die ($msg);
		}

		// use results
		while ($row = mysqli_fetch_array($result)) { // print out all season option for a dropdown box
			if ($_GET['season_name'] == $row['season_name']) { // keep values selected after form submission
				printf ("<option selected='true' value='%s'>%s</option>", $row['season_name'], $row['season_name']);
			} else {
				printf ("<option value='%s'>%s</option>", $row['season_name'], $row['season_name']);
			}
		}

		// close connection
		mysqli_close ($link);
		print "</select></p> ";
		?>
<input type="submit" value="submit">

</form>
</body>
</html>
