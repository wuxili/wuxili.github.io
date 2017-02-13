<!--
File: single_game_performance.php
Author: Wuxi Li
Date: Apr. 18, 2015
Decription: Interface to submit NBA Single-Game-Performance Seraching
-->

<?php include ("single_game_performance_header.php") ?>
<h1>Single Game Performance Serach</h1>
<form action="single_game_performance_response.php" method="GET">
	<h2>Typical Filter</h2>
 	<!-- wrapper table (table of two tables) 
		------------------------
		|           |          |
		|  table 1  |  table2  |
		|           |          |
		------------------------
	-->
	<table border="0"> <!-- start of the wrapper table -->
	<tr>
		<td> <!-- start of table 1 -->
			<table border="0">
			<tr>
				<td>Points</td>
				<td>
				[  <input type="text" id="pts_low" name="pts_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="pts_high" name="pts_high" size="3" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_pts"></div></td>
			</tr>
			<tr>
				<td>Rebounds</td>
				<td>
				[ <input type="text" id="trb_low" name="trb_low" size="3" align="left" readonly class="textbox"></input>
				  <input type="text" id="trb_high" name="trb_high" size="3" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_trb"></div></td>
			</tr>
			<tr>
				<td>Assists</td>
				<td>
				[  <input type="text" id="ast_low" name="ast_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="ast_high" name="ast_high" size="3" align="right" readonly class="textbox"></input>  ]
				</td>
				<td><div id="slider_ast"></div></td>
			</tr>
			<tr>
				<td>Steals</td>
				<td>
				[  <input type="text" id="stl_low" name="stl_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="stl_high" name="stl_high" size="3" align="right" readonly class="textbox"></input>  ]
				</td>
				<td><div id="slider_stl"></div></td>
			</tr>
			<tr>
				<td>Blocks</td>
				<td>
				[  <input type="text" id="blk_low" name="blk_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="blk_high" name="blk_high" size="3" align="right" readonly class="textbox"></input>  ]
				</td>
				<td><div id="slider_blk"></div></td>
			</tr>
			</table>
		</td> <!-- end of table 1 -->

		<td> <!-- start of table 2 -->
			<table border="0">
			<tr>
				<td>Minutes Played</td>
				<td>
				[  <input type="text" id="mp_low" name="mp_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="mp_high" name="mp_high" size="3" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_mp"></div></td>
			</tr>
			<tr>
				<td>Personnal Fouls</td>
				<td>
				[  <input type="text" id="pf_low" name="pf_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="pf_high" name="pf_high" size="3" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_pf"></div></td>
			</tr>
			<tr>
				<td>Turnovers</td>
				<td>
				[  <input type="text" id="tov_low" name="tov_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="tov_high" name="tov_high" size="3" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_tov"></div></td>
			</tr>
			<tr>
				<td>Offensive Rebounds</td>
				<td>
				[  <input type="text" id="orb_low" name="orb_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="orb_high" name="orb_high" size="3" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_orb"></div></td>
			</tr>
			<tr>
				<td>Defensive Rebounds</td>
				<td>
				[  <input type="text" id="drb_low" name="drb_low" size="3" align="left" readonly class="textbox"></input>
				   <input type="text" id="drb_high" name="drb_high" size="3" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_drb"></div></td>
			</tr>
			</table>
		</td> <!-- end of table 2 -->
	</tr> 
	</table> <!-- end of the wrapper table -->

	<h2>Shooting Filter</h2>
	<table>
		<tr>
			<td></td><td></td><td>Field Goal</td><td></td><td>3-Pt Field Goal</td><td></td><td>Free Throw</td>
		</tr>
		<tr>
			<td>Made</td>
			<td>
			[  <input type="text" id="fg_low" name="fg_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="fg_high" name="fg_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fg"></div></td>
			<td>
			[  <input type="text" id="fg3_low" name="fg3_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="fg3_high" name="fg3_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fg3"></div></td>
			<td>
			[  <input type="text" id="ft_low" name="ft_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="ft_high" name="ft_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_ft"></div></td>
		</tr>
		<tr>
			<td>Attempted</td>
			<td>
			[  <input type="text" id="fga_low" name="fga_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="fga_high" name="fga_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fga"></div></td>
			<td>
			[  <input type="text" id="fg3a_low" name="fg3a_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="fg3a_high" name="fg3a_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fg3a"></div></td>
			<td>
			[  <input type="text" id="fta_low" name="fta_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="fta_high" name="fta_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fta"></div></td>
		</tr>
		<tr>
			<td>Percentage %</td>
			<td>
			[  <input type="text" id="fg_pct_low" name="fg_pct_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="fg_pct_high" name="fg_pct_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fg_pct"></div></td>
			<td>
			[  <input type="text" id="fg3_pct_low" name="fg3_pct_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="fg3_pct_high" name="fg3_pct_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fg3_pct"></div></td>
			<td>
			[  <input type="text" id="ft_pct_low" name="ft_pct_low" size="3" align="left" readonly class="textbox"></input>
			   <input type="text" id="ft_pct_high" name="ft_pct_high" size="3" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_ft_pct"></div></td>
		</tr>
	</table>

	<input type="submit" value="submit">
</form>
<?php include ("single_game_performance_footer.php") ?>
