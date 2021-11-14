<?php
require 'header.php';

$query1 = "SELECT * FROM school ";
$result1 = mysqli_query($connect, $query1);

$query2 = "SELECT school FROM school GROUP BY school";
$result2 = mysqli_query($connect, $query2);
?>
<div class="container ml-0">
    <h5>Nuvarande skolor</h5>
    <div class="row bg-secondary text-white mt-1 mb-1">
        <div class="col">
        <?php
            $count = 1;
            while ($row = mysqli_fetch_array($result1)) {
                echo '<small>'.$row['city'].' '.$row['school'].'</small><br/>';
                if ($count % 3 == 0) {
                    echo '</div><div class="col">';
                }
                $count++;
            }
        ?>
        </div>
    </div>
    <div>
        <h5 class="mt-2">Lägg till en skola</h5>
    </div>
    <div>
        <form action="actionschool.php" method="post">
            <label>Ort</label>
            <input type="text" class="form-control" name="city">
            <label>Skola</label>
            <input type="text" class="form-control" name="school">
            <button type="submit" onclick="addbranch()" name="Spara">Spara</button>
        </form>
    </div>
</div>
<?php
require 'footer.php';
?>