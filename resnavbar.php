<?php
$query1 = "SELECT * FROM branchHeader ORDER BY sortNr ASC";
$result1 = $mysqli->query ($query1);
// resnav
echo $nl.'<nav class="navbar navbar-expand-sm bg-dark navbar-dark">'.$nl;
    echo $tab.'<ul class="navbar-nav">'.$nl;
        while ($row = $result1->fetch_assoc()) {
            echo $tab.$tab.'<li class="nav-item">'.$nl;
            if ($row['branch'] === 'Prova på') {
                echo $tab.$tab.$tab.''.$nl;
            }
            else {
                $replaceB = str_replace(' ', '%20', $row["branch"]);
                echo $tab.$tab.$tab.'<a class="nav-link" href="result.php?branch='.$replaceB.'">'.$row["branch"].'</a>'.$nl;
            }
            echo $tab.$tab.'</li>'.$nl;
        }
    echo $tab.'</ul>'.$nl;
echo '</nav>';
?>