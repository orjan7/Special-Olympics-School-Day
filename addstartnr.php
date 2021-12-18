<?php
require 'header.php';
$query1 = "SELECT * FROM startNumber";
$result1 = $mysqli -> query($query1); 
?>
<div class="container ml-0">
    <h5>Nuvarande start nr</h5>
    <div class="row bg-secondary text-white mt-1 mb-1">
        <div class="col">
        <?php
            $count = 1;
            while ($row = mysqli_fetch_array($result1)) {
                echo '<small><b>Start nr:</b>'.$row['startNumber'].'</small><br/>';
                if($count % 21 == 0) {
                    echo '</div><div class="col">';
                }
                $count++;
            }
        ?>
        </div>
    </div>
    <div>
        <h5>Lägg till ett start Nr</h5>
    </div>
    <div>
        <form action="actionstartnumber.php" method="post">
            <label>Start Nr</label>
            <input type="number" class="form-control" name="startNumber">
            <button type="submit" onclick="addbranch()" name="Spara">Spara</button>
        </form>
    </div>
</div>
<?php
require 'footer.php';
?>