<!--
File: single_player_avg.php
Author: Wuxi Li
Date: Apr. 22, 2015
Decription: Interface to submit NBA Single-Player-Season-Average Seraching
-->

<?php include ("single_player_avg_header.php") ?>

<form action="single_player_avg_result.php" method="GET">
	<p>
	  Search Player  <input type="text" id="player_searchbox" placeholder="Player Name" name="player_name">
	<input type="submit" value="submit">
	</p>
	<div id="tabs" class="tabs">
	<ul>
		<?php // create tabs
			$letters = range ('A', 'Z'); // get array (A, B, C, ..., X, Y, Z)
			foreach ($letters as $l) { // create a tab for each letter
				print "<li><a href='#tab-$l'>$l</a></li>";
			}
			foreach ($letters as $l) { // add all players that last name start with letter $l
			}
		?>
	</ul>
	<?php // add player to each tab
		$letters = range ('A', 'Z'); // get array (A, B, C, ..., X, Y, Z)
		foreach ($letters as $l) { // add all players that last name start with letter $l

			// connect to database
			$host = "localhost";
			$username = "foo";
			$password = "nba";
			$database = "foo";
			$link = mysqli_connect($host, $username, $password, $database);

			// search all players that last name start with letter $l
			// REGEXP comments:
			//     [[:space:]] (blank chars)
			//     [a-zA-Z] (letters)
			//     * (match 0 or more times)
			//     $ (end of string)
			$regexp = '[[:space:]]' . $l . '[a-zA-Z]*$';
			$query = "SELECT player_name FROM player_table WHERE player_name REGEXP '" . $regexp . "' ORDER BY player_name";

			// perfrom query
			$result = mysqli_query($link, $query);

			// check result
			if (! $result) {
				$msg = "Invalid query: " . mysql_error . "\n";
				$msg .= "Query performed: ". $query;
				die ($msg);
			}

			// create a entry for each player
			print "<div id='tab-$l'>";
			while($row = mysqli_fetch_array($result)) {
				$player_name = $row['player_name'];
				print "<a href='./single_player_avg_result.php?player_name=$player_name'>$player_name</a><br />";
			}
			print "</div>";

			// close connection
			mysqli_close ($link);
		}
	?>
	</div>
</form>
