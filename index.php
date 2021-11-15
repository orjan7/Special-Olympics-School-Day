<?php
require 'header.php';

$sql2 = "SELECT * FROM branchHeader";
$result2 = $mysqli -> query($sql2);

$sql3 = "SELECT * FROM athletes INNER JOIN school ON school.idSchool=athletes.schoolNumber INNER JOIN branch ON branch.startNumberA=athletes.startNumber ORDER BY athletes.schoolNumber";
$result3 = $mysqli -> query($sql3);
$rowconunt3 = mysqli_num_rows($result3);

$query4 = "SELECT school FROM school";
$result4 = $mysqli -> query($query4);
$rowconunt4 = mysqli_num_rows($result4);

$sql5 = "SELECT branch FROM branchHeader";
$result5 = $mysqli -> query($sql5);
$rowconunt5 = mysqli_num_rows($result5)+12;

while ($row1 = mysqli_fetch_array($result5)) {
    $branchHeader[] = $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" nowrap>'.$row1["branch"].'</th>'.$nl;                    
}
//  -- Athletes list --
echo $nl.$tab.'<div class="container ml-0">'.$nl;
    echo $tab.$tab.'<h4>Special Olympics School '.date('yy').'</h4> Antal elever: '.$rowconunt3.' Antal skolor: '.$rowconunt4.$nl; 
    echo $tab.$tab.'<table class="table table-striped table-sm">'.$nl;
        echo $tab.$tab.$tab.'<thead class="report-header">'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr">'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Ort</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Skola</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Nivå</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Namn</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" nowrap scope="col">Start nr</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Skada</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Foto</th>'.$nl;
            echo implode('', $branchHeader);
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
        echo $tab.$tab.$tab.'</thead>'.$nl;
        echo $tab.$tab.$tab.'<tbody>'.$nl;
            while ($row2 = mysqli_fetch_array($result3)) {
                echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<td class="text-left">'.$row2["city"].'</td>'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<td class="text-left" nowrap>'.$row2["school"].'</td>'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<td class="text-left" nowrap>'.$row2["stage"].'</td>'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<td class="text-left" nowrap>'.$row2["firstName"].' '.$row2['lastName'].'</td>'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<td><a href="editstudent.php?editstudent=1&startNumber='.$row2["startNumber"].'&site=index.php" class="text-dark">'.$row2["startNumber"].'</a></td>'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<td>'.$row2["disabilities"].'</td>'.$nl;
                echo $tab.$tab.$tab.$tab.$tab.'<td nowrap>'.$row2["photo"].'</td>'.$nl;
                for ($x = 13; $x <=$rowconunt5; $x++ ) {
                    if ($row2[$x] == 0) {
                        echo $tab.$tab.$tab.$tab.$tab.'<td> </td>'.$nl;
                    }
                    else {
                        echo $tab.$tab.$tab.$tab.$tab.'<td>X</td>'.$nl;
                    }
                }
                echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
            }
        echo $tab.$tab.$tab.'</tbody>'.$nl;
    echo $tab.$tab.'</table>'.$nl;
echo $tab.'</div>'.$nl;
//-- Athletes list --
require 'footer.php';
?>