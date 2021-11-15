<?php
require 'header.php';
require 'resnavbar.php';
require 'includes/branch.php';

if (!empty ($_GET['branch'])) {
    $branch = $_GET['branch'];
    $replaceGren = str_replace(' ', '_', $branch);
    $res1 = 'r' .$replaceGren. 'One';
    $res2 = 'r' .$replaceGren. 'Two';
    
    if ($branch == 'Unified' || $branch == 'Innebandy' || $branch == 'Stafett') {
        echo $nl.'<h5 class="ml-2">'.$branch.' resultat</h5>'.$nl;
        echo '<p class="no-print ml-2">Lägg till en elev i resultatlistan för '.$branch.'</p>'.$nl;
        require 'resultTeam.php';
        if (!empty($_GET['branchURL'])) {
            $getCity = $_GET['cityURL'];
            $sql = "SELECT * FROM athletes INNER JOIN school ON school.idSchool=athletes.schoolNumber INNER JOIN branch ON branch.startNumberA=athletes.startNumber WHERE school.city='$getCity'";
            $result = $mysqli->query($sql);

            while ($rowCity = mysqli_fetch_array($result)) {
                echo $rowCity['firstName'].' ';
            }
        }
        else {
            echo 'Klicka på staden  för att se vilka som deltar i laget';
        }
    }
    else {
        $sql2 = "SELECT * FROM athletes INNER JOIN school ON school.idSchool=athletes.schoolNumber INNER JOIN branch ON athletes.startNumber=branch.startNumberA INNER JOIN Result ON Result.startNumberR=branch.startNumberA WHERE branch.`$branch`  LIKE '1'";
        $result1 = $mysqli->query($sql2);

        $sql3 = "SELECT * FROM athletes";
        $result2 = $mysqli->query($sql3);

    
        echo $nl.'<h5 class="ml-2 mt-2">'.$branch.'</h5>'.$nl;
        echo '<p class="no-print ml-2">Lägg till en elev</p>'.$nl;
        echo '<form class="no-print ml-2">'.$nl;
        echo $tab.'<select name="forma" onchange="location = this.value;">'.$nl;
            echo $tab.$tab.'<option>Elev</option>'.$nl;
            while ($row = mysqli_fetch_array($result2)) {
                echo $tab.$tab.'<option value="editstudent.php?editstudent=2&startNumber='.$row["startNumber"].'&site=result.php?branch='.$branch.'">'.$row["firstName"].' '.$row["lastName"].'</option>'.$nl;
            }
            echo $tab.'</select>'.$nl;
        echo '</form>'.$nl;
        echo '<table class="table table-striped table-responsive table-sm table-show ml-2 mt-2">'.$nl;
            echo $tab.'<thead class="report-header">'.$nl;
                echo $tab.$tab.'<tr>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Ort</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Skola</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Nivå</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Namn</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" nowrap scope="col">Start nr</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Skada</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Foto</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Försök 1</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Försök 2</th>'.$nl;
                    echo $tab.$tab.$tab.'<th class="report-header-cell" scope="col">Bästa försök</th>'.$nl;                                
                echo $tab.$tab.'</tr>'.$nl;
            echo $tab.'</thead>'.$nl;
            echo $tab.'<tbody>'.$nl;
        
        $i = 0;
        while ($row1 = mysqli_fetch_array($result1)) {
            $startNumber[] = $row1["startNumber"];
            echo $tab.$tab.'<tr>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1["city"].'</td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1["school"].'</td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1["stage"].'</td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1["firstName"].' '.$row1["lastName"].'</td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left"><a href="addresult.php?startNumber='.$row1["startNumber"].'&branch='.$branch.'">'.$row1["startNumber"].'</a></td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1["disabilities"].'</td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1["photo"].'</td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1[$res1].'</td>'.$nl;
            echo $tab.$tab.$tab.'<td class="text-left">'.$row1[$res2].'</td>'.$nl;
            $total = max ($row1[$res1], $row1[$res2]);
                if($total < 0){
                    $sum += $total;
                }
            echo $tab.$tab.$tab.'<td class="text-center">'.$total.'</td>'.$nl;
        }
        // echo $tab.$tab.$tab.implode(',', $table);
        echo $tab.'</tbody>'.$nl;
        echo $tab.'<tfoot class="report-footer">'.$nl;
            echo $tab.$tab.'<td colspan="4" class="text-left">'.$branch.' resultat</td>'.$nl;
        echo $tab.'</tfoot>';
    echo '</table>'.$nl;
    }    
}
else {
    echo 'Välj en gren i menyn';
}
require 'footer.php';
?>