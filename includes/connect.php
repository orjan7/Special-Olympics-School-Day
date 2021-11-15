<?php
$sql1 = "SELECT * FROM athletes";
$result1 = mysqli_query($connect, $sql1);
$rowconunt1 = mysqli_num_rows($result1);

$sql2 = "SELECT * FROM branchHeader";
$result2 = mysqli_query($connect, $sql2);

$sql3 = "SELECT * FROM athletes INNER JOIN branch ON athletes.startNumber=branch.startNumberA ORDER BY athletes.school, FIELD (athletes.stage, 'L','M','H','G')";
$result2 = mysqli_query($connect, $sql3);


$query4 = "SELECT school, COUNT(*) FROM athletes GROUP BY school";
$result4 = mysqli_query($connect, $query4);
$rowconunt4 = mysqli_num_rows($result4);

$sql5 = "SELECT branch FROM branchHeader";
$result5 = mysqli_query($connect, $sql5);
$rowconunt5 = mysqli_num_rows($result5)+10;
?>