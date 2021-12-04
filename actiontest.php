<?php
require 'header.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['Spara'])) {
    $school = $_POST['school'];
    $stage = $_POST['stage'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $startNumber = $_POST['startNumber'];
    $disabilities = $_POST['disabilities'];
    $update = $_POST['update'];
    $fromSite = $_POST['site'];
    
    if (!isset($_POST['photo'])){
        $photo = '';
    }
    else {
        $photo = 'Ej fotas';
    }
    $sql1 = "SELECT * FROM branch WHERE startNumberA=$startNumber";
    $result1 = $mysqli -> query($sql1);
    $row1 = mysqli_fetch_array($result1);

    $sql2 = "SELECT * FROM branchHeader";
    $result2 = $mysqli -> query($sql2);
    print_r($_POST['checkbox']);
    print_r($row1);
    // $branchCheck = array();
    // while ($row1 = mysqli_fetch_array($result1)) {
    //     $branchCheck[] = $row1['branch'];
    // }
    // $New_start_index = 13;
  
    // $branchCheck = array_combine(range($New_start_index, 
    // count($branchCheck) + ($New_start_index-1)),
    // array_values($branchCheck));
    
    // foreach ($_POST['checkbox'] as $key => $value) {
    //     while ($row = mysqli_fetch_array($result2)) {
    //         $a = $value;
    //         print_r($row['branch']);
    //     }
        // foreach ($_POST['checkbox'] as $key => $value) {                
        //     if ($row['branch'] === $value) {
        //         echo '1<br>';
        //     } else {
        //         echo '0<br>';
        //     }
        // }
    // }
    
    // print_r($_POST['checkbox']);
}
?>