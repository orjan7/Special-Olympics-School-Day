<?php
$sql = "SELECT * FROM R_$branch INNER JOIN school ON school.idSchool=R_$branch.idSchool";
$result = $mysqli -> query($sql);

if (!$result) {
    echo ($mysqli -> error);
} else {
    echo $tab.$tab.'<table class="table table-striped table-sm w-auto">'.$nl;
        echo $tab.$tab.$tab.'<thead class="report-header">'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr">'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Antal elever</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Skola</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Elever</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Resultat</th>'.$nl;
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
        echo $tab.$tab.$tab.'</thead>'.$nl;
        echo $tab.$tab.$tab.'<tbody>'.$nl;
    while ($row = mysqli_fetch_array($result)) {
        $school[] = $tab.$tab.$tab.$tab.'<tr>'.$nl;
        $school[] = $tab.$tab.$tab.$tab.$tab.'<td><a href="result.php?branch='.$branch.'&branchURL='.$branch.'&cityURL='.$row['city'].'">'.$row['total'].'</a></td>'.$nl;
        $school[] = $tab.$tab.$tab.$tab.$tab.'<td>'.$row['city'].'</a></td>'.$nl;
        $school[] = $tab.$tab.$tab.$tab.$tab.'<td>'.$row['athletes'].'</a></td>'.$nl;
        $school[] = $tab.$tab.$tab.$tab.'</tr>'.$nl;
    }
    echo implode('', $school);
    echo $tab.$tab.$tab.'</tbody>'.$nl;
    echo $tab.$tab.'</table>'.$nl;
    echo implode('', $test);
}
?>