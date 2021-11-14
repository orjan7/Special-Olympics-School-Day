<?php
require 'header.php';
require 'resnavbar.php';
if (!empty ($_GET['startNumber'])) {
    $startNumber = $_GET['startNumber'];
    $branch = $_GET['branch'];

    $replaceGren = str_replace(' ', '_', $branch);
    $sql1 = "SELECT * FROM athletes INNER JOIN branch ON athletes.startNumber=branch.startNumberA 
        WHERE athletes.startNumber='$startNumber'";
    $result1 = mysqli_query($connect, $sql1);
    
    $replaceGren = str_replace(' ', '_', $branch);
    $res1 = 'r' .$replaceGren. 'One';
    $res2 = 'r' .$replaceGren. 'Two';
                    
    $sql2 = "SELECT * FROM Result WHERE startNumberR = '$startNumber' AND  $res1 LIKE '%%' AND $res2 LIKE '%%'";
    //$sql2 = "SELECT * FROM Result WHERE startNumberR=$startnumber"; 
    $result2 = mysqli_query($connect, $sql2);

    if ($connect->query($sql2) === FALSE) {
        echo 'Något är fel'. mysqli_connect_error();
    }
    
?>
    <div class="container ml-0">
        <?php 
            while ($row1 = mysqli_fetch_array($result1)) {
                $startnr[] = $row1['startNumber'];
                echo '<h5> Lägg till resultat i '.$branch.' för '.$row1['firstName'].' '.$row1['lastName'].' med startnummer: '.$row1['startNumber'].'</h5>'; 
            }
        ?>
        <form action="actionresult.php" method="post">
            <table class="table table-sm col-3">
                <thead>
                    <th>Försök 1</th>
                    <th>Försök 2</th>
                </thead>
                <tbody>
                <?php
                    if ($result2->num_rows === 0) {
                        echo '<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="resultOne"></td>';
                        echo '<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="resultTwo"></td>';
                        echo '</tbody>
                            </table>';
                            echo '<input type="hidden" name="startnr" value="'.$startNumber.'">';
                            echo '<input type="hidden" name="branch" value="'.$branch.'">';
                            echo '<button type="submit" onclick="save()" name="save">Spara</button>';
                    }
                    else {
                        while ($row2 = mysqli_fetch_array($result2)) {
                            if (!empty($row2[$res1])) {
                                echo '<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="resultOne" value="'.$row2[$res1].'"></td>';
                            }
                            else {
                                echo '<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="resultOne"></td>';
                            }
                            if (!empty($row2[$res2])) {
                                echo '<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="resultTwo" value="'.$row2[$res2].'"></td>';
                            }
                            else {
                                echo '<td class="text-left"><input type="number" data-decimals="2" min="0" max="60" step="0.01" name="resultTwo"></td>';
                            }
                            // if (!empty($row2[$res1]) && !empty($row2[$res2])) {
                            //     echo '</tbody>
                            //     </table>';
                            //     echo '<input type="hidden" name="startnr" value="'.$startnumber.'">';
                            //     echo '<input type="hidden" name="branch" value="'.$branch.'">';
                            //     echo '<button type="submit" onclick="update()" name="update">Uppdater</button>';
                            // }
                            echo '<input type="hidden" name="startnr" value="'.$startNumber.'">';
                            echo '<input type="hidden" name="branch" value="'.$branch.'">';
                            echo '<button type="submit" onclick="update()" name="update">Uppdater</button>';
                        }
                    }
                ?>
        </form>
    </div>
<?php
}
else {
    echo "<script type='text/javascript'>
            alert('Välj ett start nr från resultatsidan.');
                history.go(-1);
        </script>";
}
?>