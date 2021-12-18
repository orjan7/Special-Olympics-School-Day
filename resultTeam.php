<?php
$sql = "SELECT * FROM R_$branch INNER JOIN school ON school.idSchool=R_$branch.idSchoolR";
$result = $mysqli -> query($sql);

if (!$result) {
    echo ($mysqli -> error);
} else {
    echo $tab.'<div class="cont">'.$nl;
    echo $tab.$tab.'<table class="table table-striped table-sm w-auto ml-2">'.$nl;
        echo $tab.$tab.$tab.'<thead class="report-header">'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Elever</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Skola</th>'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Resultat</th>'.$nl;
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
        echo $tab.$tab.$tab.'</thead>'.$nl;
        echo $tab.$tab.$tab.'<tbody>'.$nl;
    
    while ($row = mysqli_fetch_array($result)){
        echo $tab.$tab.$tab.$tab.'<tr>'.$nl;
        echo $tab.$tab.$tab.$tab.$tab.'<td><a href="result.php?branch='.$branch.'&branchURL='.$branch.'&schoolURL='.$row['school'].'">Elevel</a></td>'.$nl;
        echo $tab.$tab.$tab.$tab.$tab.'<td><a href="addteamresult.php?schoolTeam='.$row['school'].'&branchURL='.$branch.'">'.$row['school'].'</a></td>'.$nl;
        echo $tab.$tab.$tab.$tab.$tab.'<td>'.$row['result'].'</td></tr>'.$nl;
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
    }
    echo $tab.$tab.$tab.'</tbody>'.$nl;
    echo $tab.$tab.'</table>'.$nl;
    
    if (!empty($_GET['branchURL'])) {
        $getSchool = $_GET['schoolURL'];
        $getBranch = $_GET['branchURL'];
        $sql = "SELECT * FROM athletes INNER JOIN school ON school.idSchool=athletes.schoolNumber INNER JOIN branch ON branch.startNumberA=athletes.startNumber WHERE school.school='$getSchool' AND branch.$getBranch='1'";
        $result = $mysqli->query($sql);
        echo '<h5 class="ml-2">Elever som delar i laget '.$getSchool.'</h5>';
        echo $tab.$tab.'<table class="table table-striped table-sm w-auto ml-2">'.$nl;
        echo $tab.$tab.$tab.'<thead class="report-header">'.$nl;
        echo $tab.$tab.$tab.$tab.'<tr">'.$nl;
            echo $tab.$tab.$tab.$tab.$tab.'<th class="report-header-cell" scope="col">Elever</th>'.$nl;
        echo $tab.$tab.$tab.$tab.'</tr>'.$nl;
        echo $tab.$tab.$tab.'</thead>'.$nl;
        echo $tab.$tab.$tab.'<tbody>'.$nl;
        while ($rowCity = mysqli_fetch_array($result)) {
            echo '<tr>'.$nl;
            echo '<td>'.$rowCity['firstName'].' '.$rowCity['lastName'].'</td>'.$nl;
            echo '</tr>'.$nl;
        }
        echo $tab.$tab.$tab.'</tbody>'.$nl;
    echo $tab.$tab.'</table>'.$nl;
    }
    else {
        echo '<p class="no-print ml-2">Klicka på antal elever för att se vilka som deltar i laget</p>';
    }
}
?>