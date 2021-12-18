<?php
require 'includes/dbh.inc.php';

$sqlNew = $_GET['sqlNew'];
$id = $_GET['id'];
$replaceGren = str_replace(' ', '_', $sqlNew);
$res1 = 'r' .$replaceGren. 'One';
$fromSite = $_GET['site'];
$sql1 = "SELECT * FROM `Result` WHERE `startNumberR` = $id AND `$res1` NOT LIKE 'null'";
$result1 = $mysqli -> query($sql1);
if (mysqli_num_rows($result1) > 0) {?>
    <script>
        var sqlNew = "<?php echo $sqlNew ?>";
        var site = "<?php echo $fromSite ?>";
        var id = "<?php echo $id ?>";
        if (window.confirm("Vill du ta bort resultatet för deltagaren startnummer?")) {
            window.location = './actionchecdeletekbranch.php?branch=' + sqlNew + '&id=' + id + '&site=' + site +'';
        } else {
            window.location = './editstudent.php?editstudent=' + id + '&startNumber=' + id + '&site=' + site +'';
        }
    </script>
<?php
} else {
    $sql2 = "UPDATE branch SET `$sqlNew` = NULL WHERE startNumberA = $id";
    if ($mysqli -> query($sql2)) {
        echo "<script type='text/javascript'>
            alert('Grenen ".$sqlNew." har tagit bort ifrån deltagaren med startnummer ".$id."');
            window.location='editstudent.php?editstudent=".$id."&startNumber=".$id."&site=".$fromSite."';
        </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Grenen ".$sqlNew." har tagit bort ifrån deltagaren med startnummer ".$id."');
            window.location='editstudent.php?editstudent=".$id."&startNumber=".$id."&site=".$fromSite."';
        </script>";
    }
}

// echo "<script type='text/javascript'>
// alert('".$sqlNew."');
// window.location='test.php';
// </script>";
// $sql = "SELECT * FROM athletes LIMIT $commentNewCount";
//     $result = $mysqli -> query($sql) or die($mysqli -> error);
//     $countRow = mysqli_num_rows($result);
//     if (mysqli_num_rows($result) > 0) {
//       while ($row = mysqli_fetch_array($result)) {
//         echo "<p>";
//           echo $row['firstName'].' ';
//           echo $row['lastName'].' ';
//           echo $row['startNumber'];
//         echo "<p>";
//       }
//     } else {
//       echo "The are no comments";
//     }
?>