<html>
<title> search</title>
<body>

<?php include ("single_player_avg_header.php") ?>
<form action = "test.php" method = "GET">
Search Player <input type="text" id ="player_searchbox" placeholder="Player Name" 
name="player_name">
<?php
		print "<p>Season: ";
		print "<select name='season_name'>";
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
		print "</select> </p>";
		?>
</form>
</body>
</html>
