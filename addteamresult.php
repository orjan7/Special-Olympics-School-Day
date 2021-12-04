<?php
require 'header.php';
require 'resnavbar.php';
if (!empty ($_GET['schoolTeam'])) {
    $schoolTeam = $_GET['schoolTeam'];
    $branch = $_GET['branchURL'];
    
    $sql1 = "SELECT * FROM school WHERE school='$schoolTeam'";
    $result1 = $mysqli -> query($sql1);
    while ($row1 = mysqli_fetch_array($result1)) {
        $schoolId[] = $row1['idSchool'];
    }
    $schoolIdsql = implode('', $schoolId);

    $sql2 = "SELECT * FROM R_$branch WHERE idSchoolR='$schoolIdsql' AND result LIKE '%%'";
    $result2 = $mysqli -> query($sql2);
    $count = mysqli_num_rows($result2);

    if ($count <= 0) {
        echo '<h5 class="mt-2 ml-2">Lägg till resultat i '.$branch.' för lag '.$schoolTeam.'</h5>';
    } else {
        echo '<h5 class="mt-2 ml-2">Uppdatera resultat i '.$branch.' för lag '.$schoolTeam.'</h5>';
    }
    echo '<form action="actionteam.php" method="post">'.$nl;
        echo $tab.'<table class="table table-sm col-1 ml-2">'.$nl;
            echo $tab.$tab.'<thead>'.$nl;
                echo $tab.$tab.$tab.'<tr>'.$nl;
                    echo $tab.$tab.$tab.$tab.'<th>Resultat</th>'.$nl;
                echo $tab.$tab.$tab.'</tr>'.$nl;
            echo $tab.$tab.'</thead>'.$nl;
            echo $tab.$tab.'<tbody>'.$nl;
                echo $tab.$tab.$tab.'<tr>'.$nl;
                    if ($count <= 0) {
                        echo $tab.$tab.$tab.$tab.'<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="result"></td>'.$nl;
                        $buttonTitle = 'Spara';
                    } else {
                        while ($row2 = mysqli_fetch_array($result2)) {
                            echo '<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="result" value="'.$row2['result'].'"></td>';
                        }
                        $buttonTitle = 'Uppdatera';
                    }
                        echo $tab.$tab.$tab.'</tr>'.$nl;
                        echo $tab.$tab.'</tbody>'.$nl;
                        echo $tab.'</table>'.$nl;
                        echo $tab.'<input type="hidden" name="schoolTeam" value="'.$schoolIdsql.'">'.$nl;
                        echo $tab.'<input type="hidden" name="branch" value="'.$branch.'">'.$nl;
                        echo '<button type="submit" onclick="save()" name="Spara" value="Spara" class="ml-2">'.$buttonTitle.'</button>';
        echo $tab.'</form>'.$nl;
}
?>