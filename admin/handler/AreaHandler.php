<?php
$area_key = 'AREA';
$sql = "SELECT * FROM `hosting_area` WHERE `area_key`= ? LIMIT 1";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $area_key);
$stmt->execute();
$result = $stmt->get_result();
$AreaInfo = $result->fetch_assoc();
?>