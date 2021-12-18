function checkBranch( slask) {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck"+slask).value;
    // var replace = checkBox.replace(' ', '_');
    // var sql = 'r'+replace+'One';
    var valueTow = document.getElementById("myCheck"+slask).getAttribute("data-valuetwo");
    var valueThree = document.getElementById("myCheck"+slask).getAttribute("data-valuethree");
    
    window.location = './actioncheckbranch.php?sqlNew=' + checkBox + '&id=' + valueTow + '&site=' + valueThree;
    
    console.log(checkBox);
    console.log(valueTow);
}