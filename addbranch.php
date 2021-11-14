<?php
require 'header.php';

$sql_1 = "SELECT * FROM branchHeader";
$result = $connect->query($sql_1);
$sql_2 = mysqli_query($connect, "SELECT * FROM branchHeader ORDER BY sortNr DESC LIMIT 1");
$last_nr = mysqli_fetch_row($sql_2);
?>
<div class="container ml-0">
    <h3>Nuvarande grenare</h3>
    <div class="row">
        <p class="ml-3"><?php
            while ($row_1 = $result->fetch_assoc()) {
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