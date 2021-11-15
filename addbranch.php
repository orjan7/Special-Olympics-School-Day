<?php
require 'header.php';

$sql_1 = "SELECT * FROM branchHeader";
$result_1 = $mysqli -> query($sql_1);
$sql_2 = "SELECT * FROM branchHeader ORDER BY sortNr DESC LIMIT 1";
$result_2 = $mysqli -> query($sql_2);
$last_nr = mysqli_num_rows($result_2);
// mysqli_num_rows($result3);
?>
<div class="container ml-0">
    <h3>Nuvarande grenare</h3>
    <div class="row">
        <p class="ml-3"><?php
            while ($row_1 = $result_1->fetch_assoc()) {
                echo $row_1['branch'].' ';
            }
        ?></p>
    </div>
    <div>
        <h3>Lägg till en gren</h3>
    </div>
    <div>
        <form action="actionbranch.php" method="post">
            <label>Gren</label>
            <input type="hidden" class="form-control" name="lastnr" value="<?php echo $last_nr[0]+1; ?>">
            <input type="text" class="form-control" name="branch">
            <button type="submit" onclick="addbranch()" name="Spara">Spara</button>
        </form>
    </div>
</div>
<?php
require 'footer.php';
?>