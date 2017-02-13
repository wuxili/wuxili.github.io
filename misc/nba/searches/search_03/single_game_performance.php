<!--
File: single_game_performance.php
Author: Wuxi Li
Date: Apr. 18, 2015
Decription: Interface to submit NBA Single-Game-Performance Seraching
-->

<?php include ( "single_game_performance_header.php") ?>
<form action="single_game_performance_result.php" method="GET">
    <h3>Typical Filter</h3>
    <!-- wrapper table (table of two tables) 
		------------------------
		|           |          |
		|  table 1  |  table2  |
		|           |          |
		------------------------
	-->
    <table>
        <!-- start of the wrapper table -->
        <tr>
            <td>
                <!-- start of table 1 -->
                <table>
                    <tr>
                        <th>Points</th>
                        <th>
                            [
                            <input type="text" id="pts_low" name="pts_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="pts_high" name="pts_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_pts"></div>
                        </th>
                    </tr>

                    <tr>
                        <th>Rebounds</th>
                        <th>
                            [
                            <input type="text" id="trb_low" name="trb_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="trb_high" name="trb_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_trb"></div>
                        </th>
                    </tr>

                    <tr>
                        <th>Assists</th>
                        <th>
                            [
                            <input type="text" id="ast_low" name="ast_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="ast_high" name="ast_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_ast"></div>
                        </th>
                    </tr>


                    <tr>
                        <th>Steals</th>
                        <th>
                            [
                            <input type="text" id="stl_low" name="stl_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="stl_high" name="stl_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_stl"></div>
                        </th>
                    </tr>

                    <tr>
                        <th>Blocks</th>
                        <th>
                            [
                            <input type="text" id="blk_low" name="blk_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="blk_high" name="blk_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_blk"></div>
                        </th>
                    </tr>

                </table>
            </td>
            <!-- end of table 1 -->

            <td>
                <!-- start of table 2 -->
                <table>
                    <tr>
                        <th>Minutes Played</th>
                        <th>
                            [
                            <input type="text" id="mp_low" name="mp_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="mp_high" name="mp_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_mp"></div>
                        </th>
                    </tr>

                    <tr>
                        <th>Personnal Fouls</th>
                        <th>
                            [
                            <input type="text" id="pf_low" name="pf_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="pf_high" name="pf_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_pf"></div>
                        </th>
                    </tr>

                    <tr>
                        <th>Turnovers</th>
                        <th>
                            [
                            <input type="text" id="tov_low" name="tov_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="tov_high" name="tov_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_tov"></div>
                        </th>
                    </tr>

                    <tr>
                        <th>Offensive Rebounds</th>
                        <th>
                            [
                            <input type="text" id="orb_low" name="orb_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="orb_high" name="orb_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_orb"></div>
                        </th>
                    </tr>

                    <tr>
                        <th>Defensive Rebounds</th>
                        <th>
                            [
                            <input type="text" id="drb_low" name="drb_low" size="1" align="left" readonly class="textbox"></input>~
                            <input type="text" id="drb_high" name="drb_high" size="1" align="right" readonly class="textbox"></input> ]
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div id="slider_drb"></div>
                        </th>
                    </tr>
                </table>
            </td>
            <!-- end of table 2 -->
        </tr>
    </table>
    <!-- end of the wrapper table -->

    <h3>Shooting Filter</h3>
    <table id="table_cus">
        <tr>
            <th></th>
            <th></th>
            <th>Field Goal</th>
            <th></th>
            <th>3-Pt Field Goal</th>
            <th></th>
            <th>Free Throw</th>
        </tr>
        <tr>
            <th>Made</th>
            <th>
                [
                <input type="text" id="fg_low" name="fg_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="fg_high" name="fg_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_fg"></div>
            </th>
            <th>
                [
                <input type="text" id="fg3_low" name="fg3_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="fg3_high" name="fg3_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_fg3"></div>
            </th>
            <th>
                [
                <input type="text" id="ft_low" name="ft_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="ft_high" name="ft_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_ft"></div>
            </th>
        </tr>
        <tr>
            <th>Attempted</th>
            <th>
                [
                <input type="text" id="fga_low" name="fga_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="fga_high" name="fga_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_fga"></div>
            </th>
            <th>
                [
                <input type="text" id="fg3a_low" name="fg3a_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="fg3a_high" name="fg3a_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_fg3a"></div>
            </th>
            <th>
                [
                <input type="text" id="fta_low" name="fta_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="fta_high" name="fta_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_fta"></div>
            </th>
        </tr>
        <tr>
            <th>Percentage %</th>
            <th>
                [
                <input type="text" id="fg_pct_low" name="fg_pct_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="fg_pct_high" name="fg_pct_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_fg_pct"></div>
            </th>
            <th>
                [
                <input type="text" id="fg3_pct_low" name="fg3_pct_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="fg3_pct_high" name="fg3_pct_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_fg3_pct"></div>
            </th>
            <th>
                [
                <input type="text" id="ft_pct_low" name="ft_pct_low" size="1" align="left" readonly class="textbox"></input>~
                <input type="text" id="ft_pct_high" name="ft_pct_high" size="1" align="right" readonly class="textbox"></input> ]
            </th>
            <th>
                <div id="slider_ft_pct"></div>
        </tr>
        </tr>
    </table>

    <input type="submit" value="Search">
</form>