<?php

include_once '__parse_query.php';




// visits
$query = "SELECT
	COUNT(v.id) AS num, SUM(v.duration) AS duration
	FROM visit v
	WHERE 1 = 1";


// CONSTRUCT WHERE CLAUSE
include '__build_query.php';

$visits = $db->rawQuery($query, null);



// trips
$query = "SELECT
	COUNT(t.id) AS num, SUM(t.duration) AS duration, SUM(t.distance) AS distance
	FROM trip t
	WHERE 1 = 1";


// CONSTRUCT WHERE CLAUSE
include '__build_query.php';

$trips = $db->rawQuery($query, null);


echo json_encode(array("visits" => $visits, "trips" =>  $trips));






?>
