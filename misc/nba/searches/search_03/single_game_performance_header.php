<!--
File: single_game_performance_header.php
Author: Wuxi Li
Date: Apr. 18, 2015
Decription: Defined all Javascript Function and CSS will be used in single_game_performance.php
            Will be included at the beginning of single_game_performance.php
-->


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

<style type="text/css">
.textbox { border:0; color:#000000; font-size:14px; background-color: #eee; text-align:center; vertical-align:middle; font-weight: bold;}
#table_cus .th { vertical-align: middle; text-align: center; }
           .td { vertical-align: middle; text-align: center; }
#slider_pts { float:left; clear:left; width:250px; margin:15px; }
#slider_pts .ui-slider-range { background:#ffff00; }
#slider_pts .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_trb { float:left; clear:left; width:250px; margin:15px; }
#slider_trb .ui-slider-range { background:#ffff00; }
#slider_trb .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_ast { float:left; clear:left; width:250px; margin:15px; }
#slider_ast .ui-slider-range { background:#ffff00; }
#slider_ast .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_stl { float:left; clear:left; width:250px; margin:15px; }
#slider_stl .ui-slider-range { background:#ffff00; }
#slider_stl .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_blk { float:left; clear:left; width:250px; margin:15px; }
#slider_blk .ui-slider-range { background:#ffff00; }
#slider_blk .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_mp { float:left; clear:left; width:250px; margin:15px; }
#slider_mp .ui-slider-range { background:#ffff00; }
#slider_mp .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_pf { float:left; clear:left; width:250px; margin:15px; }
#slider_pf .ui-slider-range { background:#ffff00; }
#slider_pf .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_tov { float:left; clear:left; width:250px; margin:15px; }
#slider_tov .ui-slider-range { background:#ffff00; }
#slider_tov .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_orb { float:left; clear:left; width:250px; margin:15px; }
#slider_orb .ui-slider-range { background:#ffff00; }
#slider_orb .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_drb { float:left; clear:left; width:250px; margin:15px; }
#slider_drb .ui-slider-range { background:#ffff00; }
#slider_drb .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_fg { float:left; clear:left; width:120px; margin:15px; }
#slider_fg .ui-slider-range { background:#ffff00; }
#slider_fg .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_fga { float:left; clear:left; width:120px; margin:15px; }
#slider_fga .ui-slider-range { background:#ffff00; }
#slider_fga .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_fg_pct { float:left; clear:left; width:120px; margin:15px; }
#slider_fg_pct .ui-slider-range { background:#ffff00; }
#slider_fg_pct .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_fg3 { float:left; clear:left; width:120px; margin:15px; }
#slider_fg3 .ui-slider-range { background:#ffff00; }
#slider_fg3 .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_fg3a { float:left; clear:left; width:120px; margin:15px; }
#slider_fg3a .ui-slider-range { background:#ffff00; }
#slider_fg3a .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_fg3_pct { float:left; clear:left; width:120px; margin:15px; }
#slider_fg3_pct .ui-slider-range { background:#ffff00; }
#slider_fg3_pct .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_ft { float:left; clear:left; width:120px; margin:15px; }
#slider_ft .ui-slider-range { background:#ffff00; }
#slider_ft .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_fta { float:left; clear:left; width:120px; margin:15px; }
#slider_fta .ui-slider-range { background:#ffff00; }
#slider_fta .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
#slider_ft_pct { float:left; clear:left; width:120px; margin:15px; }
#slider_ft_pct .ui-slider-range { background:#ffff00; }
#slider_ft_pct .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
</style>

<script>
	// return sliders' color based on the AVG(val1, val2)
	// color mapping [0, max] => [green, red]
	// val1 < val2, both val1 and val2 are in [0, max]
	function getColor( val1, val2, max ) {
		var color = "";
		if ( val1 + val2 < max ) {
			myGreen = 255;
			myRed = parseInt( ( ( val1 + val2 ) * 255 ) / max );
		}
		else {
			myGreen = parseInt( ( 2*max - val1 - val2 ) * 255 / max );
			myRed = 255;
		}
		color = "rgb(" + myRed + "," + myGreen + ", 0)"; 
		return( color ); 
	}

	// update slider color, should be called by 'change:' and 'slide:'
	function updateSlider(slider, max) {
		var value0 = $( slider ).slider( "values", 0 );
		var value1 = $( slider ).slider( "values", 1 );
		myColor = getColor( value0, value1, max);
		$( slider + " .ui-slider-range" ).css( "background-color", myColor );
	}

	// points slider
	$(function() {
		$( "#slider_pts" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 81,
			values: [ 0, 81 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#pts_low" ).val( ui.values[ 0 ] );
				$( "#pts_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_pts", 81);
			},
			change: function( event, ui ) {
				$( "#pts_low" ).val( $( "#slider_pts" ).slider( "values", 0 )),
				$( "#pts_high" ).val( $( "#slider_pts" ).slider( "values", 1 ));
				updateSlider("#slider_pts", 81);
			},
		});
		$( "#pts_low" ).val( $( "#slider_pts" ).slider( "values", 0 )),
		$( "#pts_high" ).val( $( "#slider_pts" ).slider( "values", 1 ));
	});

	// rebounds slider
	$(function() {
		$( "#slider_trb" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 35,
			values: [ 0, 35 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#trb_low" ).val( ui.values[ 0 ] );
				$( "#trb_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_trb", 35);
			},
			change: function( event, ui ) {
				$( "#trb_low" ).val( $( "#slider_trb" ).slider( "values", 0 )),
				$( "#trb_high" ).val( $( "#slider_trb" ).slider( "values", 1 ));
				updateSlider("#slider_trb", 35);
			},
		});
		$( "#trb_low" ).val( $( "#slider_trb" ).slider( "values", 0 )),
		$( "#trb_high" ).val( $( "#slider_trb" ).slider( "values", 1 ));
	});

	// assists slider
	$(function() {
		$( "#slider_ast" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 30,
			values: [ 0, 30 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#ast_low" ).val( ui.values[ 0 ] );
				$( "#ast_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_ast", 30);
			},
			change: function( event, ui ) {
				$( "#ast_low" ).val( $( "#slider_ast" ).slider( "values", 0 )),
				$( "#ast_high" ).val( $( "#slider_ast" ).slider( "values", 1 ));
				updateSlider("#slider_ast", 30);
			},
		});
		$( "#ast_low" ).val( $( "#slider_ast" ).slider( "values", 0 )),
		$( "#ast_high" ).val( $( "#slider_ast" ).slider( "values", 1 ));
	});

	// steals slider
	$(function() {
		$( "#slider_stl" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 11,
			values: [ 0, 11 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#stl_low" ).val( ui.values[ 0 ] );
				$( "#stl_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_stl", 11);
			},
			change: function( event, ui ) {
				$( "#stl_low" ).val( $( "#slider_stl" ).slider( "values", 0 )),
				$( "#stl_high" ).val( $( "#slider_stl" ).slider( "values", 1 ));
				updateSlider("#slider_stl", 11);
			},
		});
		$( "#stl_low" ).val( $( "#slider_stl" ).slider( "values", 0 )),
		$( "#stl_high" ).val( $( "#slider_stl" ).slider( "values", 1 ));
	});

	// blocks slider
	$(function() {
		$( "#slider_blk" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 15,
			values: [ 0, 15 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#blk_low" ).val( ui.values[ 0 ] );
				$( "#blk_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_blk", 15);
			},
			change: function( event, ui ) {
				$( "#blk_low" ).val( $( "#slider_blk" ).slider( "values", 0 )),
				$( "#blk_high" ).val( $( "#slider_blk" ).slider( "values", 1 ));
				updateSlider("#slider_blk", 15);
			},
		});
		$( "#blk_low" ).val( $( "#slider_blk" ).slider( "values", 0 )),
		$( "#blk_high" ).val( $( "#slider_blk" ).slider( "values", 1 ));
	});

	// minutes played slider
	$(function() {
		$( "#slider_mp" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 69,
			values: [ 0, 69 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#mp_low" ).val( ui.values[ 0 ] );
				$( "#mp_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_mp", 69);
			},
			change: function( event, ui ) {
				$( "#mp_low" ).val( $( "#slider_mp" ).slider( "values", 0 )),
				$( "#mp_high" ).val( $( "#slider_mp" ).slider( "values", 1 ));
				updateSlider("#slider_mp", 69);
			},
		});
		$( "#mp_low" ).val( $( "#slider_mp" ).slider( "values", 0 )),
		$( "#mp_high" ).val( $( "#slider_mp" ).slider( "values", 1 ));
	});

	// personal fouls slider
	$(function() {
		$( "#slider_pf" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 7,
			values: [ 0, 7 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#pf_low" ).val( ui.values[ 0 ] );
				$( "#pf_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_pf", 7);
			},
			change: function( event, ui ) {
				$( "#pf_low" ).val( $( "#slider_pf" ).slider( "values", 0 )),
				$( "#pf_high" ).val( $( "#slider_pf" ).slider( "values", 1 ));
				updateSlider("#slider_pf", 7);
			},
		});
		$( "#pf_low" ).val( $( "#slider_pf" ).slider( "values", 0 )),
		$( "#pf_high" ).val( $( "#slider_pf" ).slider( "values", 1 ));
	});

	// turnovers slider
	$(function() {
		$( "#slider_tov" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 14,
			values: [ 0, 14 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#tov_low" ).val( ui.values[ 0 ] );
				$( "#tov_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_tov", 14);
			},
			change: function( event, ui ) {
				$( "#tov_low" ).val( $( "#slider_tov" ).slider( "values", 0 )),
				$( "#tov_high" ).val( $( "#slider_tov" ).slider( "values", 1 ));
				updateSlider("#slider_tov", 14);
			},
		});
		$( "#tov_low" ).val( $( "#slider_tov" ).slider( "values", 0 )),
		$( "#tov_high" ).val( $( "#slider_tov" ).slider( "values", 1 ));
	});

	// offensive rebounds slider
	$(function() {
		$( "#slider_orb" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 18,
			values: [ 0, 18 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#orb_low" ).val( ui.values[ 0 ] );
				$( "#orb_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_orb", 18);
			},
			change: function( event, ui ) {
				$( "#orb_low" ).val( $( "#slider_orb" ).slider( "values", 0 )),
				$( "#orb_high" ).val( $( "#slider_orb" ).slider( "values", 1 ));
				updateSlider("#slider_orb", 18);
			},
		});
		$( "#orb_low" ).val( $( "#slider_orb" ).slider( "values", 0 )),
		$( "#orb_high" ).val( $( "#slider_orb" ).slider( "values", 1 ));
	});

	// defensive rebounds slider
	$(function() {
		$( "#slider_drb" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 26,
			values: [ 0, 26 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#drb_low" ).val( ui.values[ 0 ] );
				$( "#drb_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_drb", 26);
			},
			change: function( event, ui ) {
				$( "#drb_low" ).val( $( "#slider_drb" ).slider( "values", 0 )),
				$( "#drb_high" ).val( $( "#slider_drb" ).slider( "values", 1 ));
				updateSlider("#slider_drb", 26);
			},
		});
		$( "#drb_low" ).val( $( "#slider_drb" ).slider( "values", 0 )),
		$( "#drb_high" ).val( $( "#slider_drb" ).slider( "values", 1 ));
	});

	// Field Goals
	$(function() {
		$( "#slider_fg" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 28,
			values: [ 0, 28 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#fg_low" ).val( ui.values[ 0 ] );
				$( "#fg_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_fg", 28);
			},
			change: function( event, ui ) {
				$( "#fg_low" ).val( $( "#slider_fg" ).slider( "values", 0 )),
				$( "#fg_high" ).val( $( "#slider_fg" ).slider( "values", 1 ));
				updateSlider("#slider_fg", 28);
			},
		});
		$( "#fg_low" ).val( $( "#slider_fg" ).slider( "values", 0 )),
		$( "#fg_high" ).val( $( "#slider_fg" ).slider( "values", 1 ));
	});

	// Field Goals Attempts
	$(function() {
		$( "#slider_fga" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 49,
			values: [ 0, 49 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#fga_low" ).val( ui.values[ 0 ] );
				$( "#fga_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_fga", 49);
			},
			change: function( event, ui ) {
				$( "#fga_low" ).val( $( "#slider_fga" ).slider( "values", 0 )),
				$( "#fga_high" ).val( $( "#slider_fga" ).slider( "values", 1 ));
				updateSlider("#slider_fga", 49);
			},
		});
		$( "#fga_low" ).val( $( "#slider_fga" ).slider( "values", 0 )),
		$( "#fga_high" ).val( $( "#slider_fga" ).slider( "values", 1 ));
	});

	// Field Goals Percentage
	$(function() {
		$( "#slider_fg_pct" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 100,
			values: [ 0, 100 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#fg_pct_low" ).val( ui.values[ 0 ] );
				$( "#fg_pct_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_fg_pct", 100);
			},
			change: function( event, ui ) {
				$( "#fg_pct_low" ).val( $( "#slider_fg_pct" ).slider( "values", 0 )),
				$( "#fg_pct_high" ).val( $( "#slider_fg_pct" ).slider( "values", 1 ));
				updateSlider("#slider_fg_pct", 100);
			},
		});
		$( "#fg_pct_low" ).val( $( "#slider_fg_pct" ).slider( "values", 0 )),
		$( "#fg_pct_high" ).val( $( "#slider_fg_pct" ).slider( "values", 1 ));
	});

	// 3-points Field Goals
	$(function() {
		$( "#slider_fg3" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 12,
			values: [ 0, 12 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#fg3_low" ).val( ui.values[ 0 ] );
				$( "#fg3_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_fg3", 12);
			},
			change: function( event, ui ) {
				$( "#fg3_low" ).val( $( "#slider_fg3" ).slider( "values", 0 )),
				$( "#fg3_high" ).val( $( "#slider_fg3" ).slider( "values", 1 ));
				updateSlider("#slider_fg3", 12);
			},
		});
		$( "#fg3_low" ).val( $( "#slider_fg3" ).slider( "values", 0 )),
		$( "#fg3_high" ).val( $( "#slider_fg3" ).slider( "values", 1 ));
	});

	// 3-points Field Goals Attempts
	$(function() {
		$( "#slider_fg3a" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 22,
			values: [ 0, 22 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#fg3a_low" ).val( ui.values[ 0 ] );
				$( "#fg3a_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_fg3a", 22);
			},
			change: function( event, ui ) {
				$( "#fg3a_low" ).val( $( "#slider_fg3a" ).slider( "values", 0 )),
				$( "#fg3a_high" ).val( $( "#slider_fg3a" ).slider( "values", 1 ));
				updateSlider("#slider_fg3a", 22);
			},
		});
		$( "#fg3a_low" ).val( $( "#slider_fg3a" ).slider( "values", 0 )),
		$( "#fg3a_high" ).val( $( "#slider_fg3a" ).slider( "values", 1 ));
	});

	// 3-points Field Goals Percentage
	$(function() {
		$( "#slider_fg3_pct" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 100,
			values: [ 0, 100 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#fg3_pct_low" ).val( ui.values[ 0 ] );
				$( "#fg3_pct_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_fg3_pct", 100);
			},
			change: function( event, ui ) {
				$( "#fg3_pct_low" ).val( $( "#slider_fg3_pct" ).slider( "values", 0 )),
				$( "#fg3_pct_high" ).val( $( "#slider_fg3_pct" ).slider( "values", 1 ));
				updateSlider("#slider_fg3_pct", 100);
			},
		});
		$( "#fg3_pct_low" ).val( $( "#slider_fg3_pct" ).slider( "values", 0 )),
		$( "#fg3_pct_high" ).val( $( "#slider_fg3_pct" ).slider( "values", 1 ));
	});

	// Free Throws
	$(function() {
		$( "#slider_ft" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 26,
			values: [ 0, 26 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#ft_low" ).val( ui.values[ 0 ] );
				$( "#ft_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_ft", 26);
			},
			change: function( event, ui ) {
				$( "#ft_low" ).val( $( "#slider_ft" ).slider( "values", 0 )),
				$( "#ft_high" ).val( $( "#slider_ft" ).slider( "values", 1 ));
				updateSlider("#slider_ft", 26);
			},
		});
		$( "#ft_low" ).val( $( "#slider_ft" ).slider( "values", 0 )),
		$( "#ft_high" ).val( $( "#slider_ft" ).slider( "values", 1 ));
	});

	// Free Throw Attempts
	$(function() {
		$( "#slider_fta" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 39,
			values: [ 0, 39 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#fta_low" ).val( ui.values[ 0 ] );
				$( "#fta_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_fta", 39);
			},
			change: function( event, ui ) {
				$( "#fta_low" ).val( $( "#slider_fta" ).slider( "values", 0 )),
				$( "#fta_high" ).val( $( "#slider_fta" ).slider( "values", 1 ));
				updateSlider("#slider_fta", 39);
			},
		});
		$( "#fta_low" ).val( $( "#slider_fta" ).slider( "values", 0 )),
		$( "#fta_high" ).val( $( "#slider_fta" ).slider( "values", 1 ));
	});

	// Free Throw Percentage
	$(function() {
		$( "#slider_ft_pct" ).slider({
			orientation: "horizontal",
			range: true,
			min: 0,
			max: 100,
			values: [ 0, 100 ],
			animate: true,
			slide: function( event, ui ) {
				$( "#ft_pct_low" ).val( ui.values[ 0 ] );
				$( "#ft_pct_high" ).val( ui.values[ 1 ] );
				updateSlider("#slider_ft_pct", 100);
			},
			change: function( event, ui ) {
				$( "#ft_pct_low" ).val( $( "#slider_ft_pct" ).slider( "values", 0 )),
				$( "#ft_pct_high" ).val( $( "#slider_ft_pct" ).slider( "values", 1 ));
				updateSlider("#slider_ft_pct", 100);
			},
		});
		$( "#ft_pct_low" ).val( $( "#slider_ft_pct" ).slider( "values", 0 )),
		$( "#ft_pct_high" ).val( $( "#slider_ft_pct" ).slider( "values", 1 ));
	});
</script>
