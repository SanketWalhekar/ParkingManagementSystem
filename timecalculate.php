<?php
$entryDateTime = "2023-07-15 10:30";
$exitDateTime = "2023-07-16 14:45";

$entryTimestamp = strtotime($entryDateTime);
$exitTimestamp = strtotime($exitDateTime);

$duration = abs($exitTimestamp - $entryTimestamp);
$totalMinutes = floor($duration / 60);

echo "Total time: " . $totalMinutes . " minutes";
?>