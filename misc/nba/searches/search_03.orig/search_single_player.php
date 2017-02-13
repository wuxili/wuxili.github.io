<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!--
••••••••••••••••••••••••

Powered by Type & Grids™
www.typeandgrids.com

••••••••••••••••••••••••
-->

    <title>Single Player</title>
    <meta name="description" content="Single player search page">
    <meta name="author" content="foo">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================================================================= -->
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/themes/type_05.css">
    <link rel="stylesheet" href="../../css/themes/color_06.css">
    <style type="text/css">
	.textbox { border:0; color:#f6931f; font-weight:bold; font-size:14px; background-color:#eee;}
	#slider_pts { float:left; clear:left; width:180px; margin:15px; }
	#slider_pts .ui-slider-range { background:#ffff00; }
	#slider_pts .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_trb { float:left; clear:left; width:180px; margin:15px; }
	#slider_trb .ui-slider-range { background:#ffff00; }
	#slider_trb .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_ast { float:left; clear:left; width:180px; margin:15px; }
	#slider_ast .ui-slider-range { background:#ffff00; }
	#slider_ast .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_stl { float:left; clear:left; width:180px; margin:15px; }
	#slider_stl .ui-slider-range { background:#ffff00; }
	#slider_stl .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_blk { float:left; clear:left; width:180px; margin:15px; }
	#slider_blk .ui-slider-range { background:#ffff00; }
	#slider_blk .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_mp { float:left; clear:left; width:180px; margin:15px; }
	#slider_mp .ui-slider-range { background:#ffff00; }
	#slider_mp .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_pf { float:left; clear:left; width:180px; margin:15px; }
	#slider_pf .ui-slider-range { background:#ffff00; }
	#slider_pf .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_tov { float:left; clear:left; width:180px; margin:15px; }
	#slider_tov .ui-slider-range { background:#ffff00; }
	#slider_tov .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_orb { float:left; clear:left; width:180px; margin:15px; }
	#slider_orb .ui-slider-range { background:#ffff00; }
	#slider_orb .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_drb { float:left; clear:left; width:180px; margin:15px; }
	#slider_drb .ui-slider-range { background:#ffff00; }
	#slider_drb .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_fg { float:left; clear:left; width:130px; margin:15px; }
	#slider_fg .ui-slider-range { background:#ffff00; }
	#slider_fg .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_fga { float:left; clear:left; width:130px; margin:15px; }
	#slider_fga .ui-slider-range { background:#ffff00; }
	#slider_fga .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_fg_pct { float:left; clear:left; width:130px; margin:15px; }
	#slider_fg_pct .ui-slider-range { background:#ffff00; }
	#slider_fg_pct .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_fg3 { float:left; clear:left; width:130px; margin:15px; }
	#slider_fg3 .ui-slider-range { background:#ffff00; }
	#slider_fg3 .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_fg3a { float:left; clear:left; width:130px; margin:15px; }
	#slider_fg3a .ui-slider-range { background:#ffff00; }
	#slider_fg3a .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_fg3_pct { float:left; clear:left; width:130px; margin:15px; }
	#slider_fg3_pct .ui-slider-range { background:#ffff00; }
	#slider_fg3_pct .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_ft { float:left; clear:left; width:130px; margin:15px; }
	#slider_ft .ui-slider-range { background:#ffff00; }
	#slider_ft .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_fta { float:left; clear:left; width:130px; margin:15px; }
	#slider_fta .ui-slider-range { background:#ffff00; }
	#slider_fta .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	#slider_ft_pct { float:left; clear:left; width:130px; margin:15px; }
	#slider_ft_pct .ui-slider-range { background:#ffff00; }
	#slider_ft_pct .ui-state-default, .ui-widget-content .ui-state-default { background:none; }
	</style>
    

    <!-- Favicons
============================================================================================= -->
    <link rel="shortcut icon" href="../../images/favicons/basketball.ico">
    <link rel="apple-touch-icon" href="../../images/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../images/favicons/apple-touch-icon-114x114.png">

    <!-- JS
================================================================================================= -->
    <script src="../../js/libs/modernizr.min.js"></script>
    <script src="../../js/libs/jquery-1.8.3.min.js"></script>
    <script src="../../js/libs/jquery.easing.1.3.min.js"></script>
    <script src="../../js/libs/jquery.fitvids.js"></script>
    <script src="../../js/script.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">

    
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
    
</head>

<body>

    <!-- Write preloader to page - this allows the site to load for users with JS disabled -->
    <script type="text/javascript">
        document.write("<div id='sitePreloader'><div id='preloaderImage'><img src='../../images/site_preloader.gif' alt='Preloader' /></div></div>");
    </script>

    <div class="container">

        <!-- Header begins ========================================================================== -->
        <header class="sixteen columns">
            <div id="logoDetailView">
                <h1>Single Player Search</h1>
                <h2>Single player stats</h2>
            </div>
            <nav>
                <ul>
                    <li><a href="../../index.html">&laquo; Back</a>
                    </li>
                </ul>
            </nav>
            <hr />
        </header>
        <!-- Header ends ============================================================================ -->

        <div id="detailView" class="sixteen columns">
            
<form action="single_game_performance_response.php" method="GET">
	<h4>Typical Filter</h4>
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
				[  <input type="text" id="pts_low" name="pts_low" size="1"  align="left" readonly class="textbox"></input>
				   <input type="text" id="pts_high" name="pts_high" size="1" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_pts"></div></td>
			</tr>
			<tr>
				<td>Rebounds</td>
				<td>
				[ <input type="text" id="trb_low" name="trb_low" size="1" align="left" readonly class="textbox"></input>
				  <input type="text" id="trb_high" name="trb_high" size="1" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_trb"></div></td>
			</tr>
			<tr>
				<td>Assists</td>
				<td>
				[  <input type="text" id="ast_low" name="ast_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="ast_high" name="ast_high" size="1" align="right" readonly class="textbox"></input>  ]
				</td>
				<td><div id="slider_ast"></div></td>
			</tr>
			<tr>
				<td>Steals</td>
				<td>
				[  <input type="text" id="stl_low" name="stl_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="stl_high" name="stl_high" size="1" align="right" readonly class="textbox"></input>  ]
				</td>
				<td><div id="slider_stl"></div></td>
			</tr>
			<tr>
				<td>Blocks</td>
				<td>
				[  <input type="text" id="blk_low" name="blk_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="blk_high" name="blk_high" size="1" align="right" readonly class="textbox"></input>  ]
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
				[  <input type="text" id="mp_low" name="mp_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="mp_high" name="mp_high" size="1" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_mp"></div></td>
			</tr>
			<tr>
				<td>Personnal Fouls</td>
				<td>
				[  <input type="text" id="pf_low" name="pf_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="pf_high" name="pf_high" size="1" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_pf"></div></td>
			</tr>
			<tr>
				<td>Turnovers</td>
				<td>
				[  <input type="text" id="tov_low" name="tov_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="tov_high" name="tov_high" size="1" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_tov"></div></td>
			</tr>
			<tr>
				<td>Offensive Rebounds</td>
				<td>
				[  <input type="text" id="orb_low" name="orb_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="orb_high" name="orb_high" size="1" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_orb"></div></td>
			</tr>
			<tr>
				<td>Defensive Rebounds</td>
				<td>
				[  <input type="text" id="drb_low" name="drb_low" size="1" align="left" readonly class="textbox"></input>
				   <input type="text" id="drb_high" name="drb_high" size="1" align="right" readonly class="textbox"></input> ]
				</td>
				<td><div id="slider_drb"></div></td>
			</tr>
			</table>
		</td> <!-- end of table 2 -->
	</tr> 
	</table> <!-- end of the wrapper table -->

	<h4>Shooting Filter</h4>
	<table>
		<tr>
			<td></td><td></td><td>&nbsp;&nbsp;&nbsp;Field Goal</td><td></td><td>&nbsp;&nbsp;&nbsp;3-Pt Field Goal</td><td></td><td>&nbsp;&nbsp;&nbsp;Free Throw</td>
		</tr>
		<tr>
			<td>Made</td>
			<td>
			[  <input type="text" id="fg_low" name="fg_low" size="1" align="left" readonly class="textbox"></input>
			   <input type="text" id="fg_high" name="fg_high" size="2" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fg"></div></td>
			<td>
			[  <input type="text" id="fg3_low" name="fg3_low" size="1" align="left" readonly class="textbox"></input>
			   <input type="text" id="fg3_high" name="fg3_high" size="1" align="right" readonly class="textbox"></input> ]
			</td>
			<td><div id="slider_fg3"></div></td>
			<td>
			[  <input type="text" id="ft_low" name="ft_low" size="1" align="left" readonly class="textbox"></input>
			   <input type="text" id="ft_high" name="ft_high" size="1" align="right" readonly class="textbox"></input> ]
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
            
            

            <hr />

            <div id="detailViewBack">
                <a href="../../index.html">&laquo; Back</a>
            </div>

        </div>

        <!-- Footer begins ========================================================================== -->
        <footer class="sixteen columns">
            <hr />
            <ul id="footerLinks">
                <li>&copy; 2015 foo. All rights reserved.</li>
                <li><a href="mailto:hello@ivandesignostrom.com">hello@ivandesignostrom.com</a>
                </li>
                <li><a href="http://www.twitter.com" target="_blank">Twitter</a>
                </li>
                <!--Notice: The "Powered by Type & Grids" link in the footer is required in the Free version. Upgrade to the Pro version if you would like to remove it.-->
                <li><a href="http://www.typeandgrids.com" target="_blank">Powered by Type &amp; Grids</a>
                </li>
            </ul>
        </footer>
        <!-- Footer ends ============================================================================ -->

    </div>
    <!-- container -->
</body>

</html>
