<!doctype html>
<html>
<head>
    <title>Database Management</title>
</head>
<body>
<?php
/* This script process the form sent by double_player_compare.php
 * The variables being passed are:
 * player1_name player1_season player2_name player2_season
 */
    //connect to database
    $host = "localhost";
    $username  = "foo";
    $password = "nba";
    $database = "foo";
    $link = mysqli_connect($host,$username,$password,$database);

    //All variables should be passed by GET
    $form_keys = array(
        "player1_name","player1_season","player2_name","player2_season"
    );
    $get = array();
    //perform data validation
    foreach($form_keys as $k){
        if(isset($_GET[$k])){
            $clear_val = filter_var($_GET[$k]);//remove all illegal char
            $get[$k] = $clear_val;
        }
    }
    //formulate query
    $query_head = "
        SELECT
                AVG(player_game_table.orb) AS orb,
                AVG(player_game_table.drb) AS drb,
                AVG(player_game_table.ast) AS ast,
                AVG(player_game_table.stl) As stl,
                AVG(player_game_table.blk) As blk,
                AVG(player_game_table.pts) As pts
        FROM
                player_game_table
                INNER JOIN player_table ON player_game_table.player_id = player_table.player_id
                INNER JOIN game_table   ON player_game_table.game_id = game_table.game_id
                INNER JOIN season_table ON season_table.season_id = game_table.season_id
        ";
    $query1_condition = "WHERE  player_table.player_name LIKE '".$get["player1_name"]."'"." AND season_table.season_name = '".$get["player1_season"]."'";
    $query2_condition = "WHERE  player_table.player_name LIKE '".$get["player2_name"]."'"." AND season_table.season_name = '".$get["player2_season"]."'";
    $query1 = $query_head.$query1_condition;
    $query2 = $query_head.$query2_condition;



    //perform query
    $result1 = mysqli_query($link, $query1);
    $result2 = mysqli_query($link, $query2);

    //check results
    if(!$result1){
        $msg = "invalid query: \n";
        $msg .= "Query performed: ". $query1;
        die ($msg);
    }
    if(!$result2){
        $msg = "invalid query: \n";
        $msg .= "Query performed: ". $query2;
        die ($msg);
    }
     // if result is empty
    if (mysqli_num_rows($result1) == 0) {
        print "Cannot find player '" . $get["player1_name"] . "'.";
        exit;
    }
    if (mysqli_num_rows($result2) == 0) {
            print "Cannot find player '" . $get["player2_name"] . "'.";
            exit;
    }

    $array1  = mysqli_fetch_array($result1);
    $array2 = mysqli_fetch_array($result2);
    $player1 = array(
    "orb" => $array1['orb'],
    "drb" => $array1['drb'],
    "ast" => $array1['ast'],
    "stl" => $array1['stl'],
    "blk" => $array1['blk'],
    "pts" => $array1['pts']/5,
    );
    $player2 = array(
    "orb" => $array2['orb'],
    "drb" => $array2['drb'],
    "ast" => $array2['ast'],
    "stl" => $array2['stl'],
    "blk" => $array2['blk'],
    "pts" => $array2['pts']/5,
    );
    mysqli_close($link);

    //print_r($player1);
    //print_r($player2);

?>

<canvas id="myChart" width="400" height="400" ></canvas>
<script src="Chart.js"></script>
<script>
var ctx=document.getElementById("myChart").getContext("2d");
var preplayer1 =  <?php echo json_encode($player1); ?> ;
var player1 = [preplayer1["orb"],preplayer1["drb"],preplayer1["ast"],preplayer1["stl"],preplayer1["blk"],preplayer1["pts"]];
var preplayer2 = <?php echo json_encode($player2); ?> ;
var player2 = [preplayer2["orb"],preplayer2["drb"],preplayer2["ast"],preplayer2["stl"],preplayer2["blk"],preplayer2["pts"]];
var options = {
      //Boolean - Whether to show lines for each scale point
      scaleShowLine : true,

      //Boolean - Whether we show the angle lines out of the radar
      angleShowLineOut : true,

      //Boolean - Whether to show labels on the scale
      scaleShowLabels : false,

    // Boolean - If we want to override with a hard coded scale
    scaleOverride: true,

    // ** Required if scaleOverride is true **
    // Number - The number of steps in a hard coded scale
    scaleSteps: 4,
    // Number - The value jump in the hard coded scale
    scaleStepWidth: 2,
    // Number - The scale starting value
    scaleStartValue: 0,




      // Boolean - Whether the scale should begin at zero
      scaleBeginAtZero : true,

      //String - Colour of the angle line
      angleLineColor : "rgba(0,0,0,.1)",

      //Number - Pixel width of the angle line
      angleLineWidth : 1,

      //String - Point label font declaration
      pointLabelFontFamily : "'Arial'",

      //String - Point label font weight
      pointLabelFontStyle : "normal",

      //Number - Point label font size in pixels
      pointLabelFontSize : 10,

      //String - Point label font colour
      pointLabelFontColor : "#666",

      //Boolean - Whether to show a dot for each point
      pointDot : true,

      //Number - Radius of each point dot in pixels
      pointDotRadius : 3,

      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth : 1,

      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 50,

      //Boolean - Whether to show a stroke for datasets
      datasetStroke : true,

      //Number - Pixel width of dataset stroke
      datasetStrokeWidth : 2,

      //Boolean - Whether to fill the dataset with a colour
      datasetFill : true,

      //String - A legend template
      legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    };

var data = {
    labels: ["orb", "drb", "ast", "stl", "blk", "pts/5"],
    datasets: [
        {
            label: "player1",
            //fillColor: "rgba(220,220,220,0.2)",
            //strokeColor: "rgba(220,220,220,1)",
            //pointColor: "rgba(220,220,220,1)",
            fillColor: "rgba(0,0,204,0.2)",
            strokeColor: "rgba(0,0,204,1)",
            pointColor: "rgba(0,0,204,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: player1
        },
        {
            label: "player2",
            //fillColor: "rgba(151,187,205,0.2)",
            //strokeColor: "rgba(151,187,205,1)",
            //pointColor: "rgba(151,187,205,1)",
            fillColor: "rgba(255, 102, 0,0.2)",
            strokeColor: "rgba(255, 102, 0,1)",
            pointColor: "rgba(255, 102, 0,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: player2
        }
    ]
};
var myRadarChart = new Chart(ctx).Radar(data, options);
myRadarChart.generateLegend();

</script>
<?php
$player1name = $_GET['player1_name'];
$player2name = $_GET['player2_name'];

echo '
  <div>'.$player1name."&nbspin season&nbsp".$_GET['player1_season'].'
    <div style="background-color:rgba(0,0,204,1);padding:10px; width: 30px;">
    </div>
  </div>

  <div>
    <div>'.$player2name."&nbspin season&nbsp".$_GET['player2_season'].'<div style="background-color:rgba(255, 102, 0,1);padding:10px; width: 30px;">
    </div>
  </div>
';
?>
</body>	
</html>
