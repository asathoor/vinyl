<?php
/**
 * Plugin Name: Vinyl til salg
 * Plugin URI: http://petj.mmd.eal.dk/
 * Description: Min pladesamling til salg efter oprydning
 * Version: 1.0
 * Author: Per Thykjaer Jensen
 * Author URI: http://www.multimusen.dk
 * License: GPLv3
**/

function visVinyl(){

	global $wpdb; // you have to globalize wpdb before use

	$sql = "SELECT `Who`, `Title`, `Note`, `Price` FROM `Vinyl_til_salg` ORDER BY `Who`, `Title`";

	$visVinyl = $wpdb->get_results($sql);

	echo "<div class='wrap'>
		<p>
			After cleaning the old attic we have some records for sale:
		</p>
		<table class='widefat'>
			<tr>
				<th> Artist </th>
				<th> Record </th>
				<th> Note </th>
				<th> Price </th>
			</tr>";

    foreach($visVinyl as $row){
	echo "<tr>";
        echo "<td>" . $row->Who . "</td>";
	echo "<td>" . $row->Title . "</td>";
	echo "<td>" . $row->Note . "</td>";
	echo "<td>" . $row->Price . "</td>";
	echo "</tr>";
    }

	echo "</table>
		</div>";
}

add_shortcode( 'vinyl', 'visVinyl' ); // register the shortcode in WP
?>