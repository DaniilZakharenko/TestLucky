<?php
if(isset($_GET['start']) && isset($_GET['end'])){
    require 'src/LuckyTicket.php';
    require 'src/ValidateRequest.php';
    $validateMessage = ValidateRequest::check($_GET['start'], $_GET['end']);
    if($validateMessage === true) {
        $luckyClass = new LuckyTicket($_GET['start'], $_GET['end']);
        $countLucky = $luckyClass->getCountOptimize();
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="get">

    <?php echo isset($validateMessage) && $validateMessage !== true ?  $validateMessage : ''; ?><br/>
    <label for="start">Start</label>
    <input id="start" type="number"  name="start" value="<?php echo $_GET['start'] ?? '000000'?>">
    <label for="end">End</label>
    <input type="number" name="end" id="end" value="<?php echo $_GET['end'] ?? '999999'?>">
    <button type="submit">Run</button>
</form>
</body>
<?php
if(isset($countLucky)){
    echo 'Number of tickets: '.$countLucky;
}
?>
<script src="src/js/script.js"></script>
</html>