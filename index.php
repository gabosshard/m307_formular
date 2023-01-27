<?php
//  print_r($_POST

$vorname = $_POST['vorname'] ?? "";
$projekt = $_POST['projekt'] ?? "";
$datum= $_POST['datum'] ?? "";


function nameChecked($wert){
    global $lehrgang;
    if($lehrgang === $wert) {
        return 'checked="checked"';
    }
}


$message = "";

$host = "localhost";
$name = "m307_formular";
$user = "m307_admin";
$pass = "m307_admin";

$db = new PDO(
  "mysql:host=$host;dbname=$name",
  $user, $pass);

 
if(isset($_POST["action"])) {
  $query = "INSERT 
  INTO `stundenerfassung` (`id`, `vorname`, `projekt`, `datum`) 
  VALUES (NULL,                   :vorname, :projekt, :datum)";


$befehl = $db->prepare($query);
if($befehl-> execute([
     ":vorname" => $vorname,
     ":projekt" => $projekt,
     ":datum" => $datum ])) {
  $message = "Ihre Daten wurden erfolgreich gespeichert.";
} else{
  $message = "Ihre Daten wurden erfolgreich gespeichert.";
        }
}

?>

<!DOCTYPE html>
<!-- __   __                ___       ___           ___  __     ___      
    /__` |__) |  |    |\ | |__  |  | |__      |\/| |__  |  \ | |__  |\ | 
    .__/ |__) |/\|    | \| |___ \__/ |___     |  | |___ |__/ | |___ | \| -->
<html lang="de">
<head>
  <link rel="stylesheet" href="./stylesheet.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP & Form</title>
</head>
<body>
<main>



<form method='POST' class="form-wrapper">

<p class="message"><?=$message?></p> 


<label for="vorname">Name</label>
<input  <?= nameChecked('gabriel'); ?> type='radio' name='vorname' value='gabriel' id='gabriel'>
<label for='male'>Gabriel Bosshard</label>
<input <?= nameChecked('noah'); ?> type='radio' name='vorname' value='noah' id='noah'> 
<label for='male'>Noah Faes</label>
<input <?= nameChecked('gian'); ?>type='radio' name='vorname' value='gian' id='noah'> 
<label for='male'>Gian Schubnell</label>


<label for="projekt">Projekt</label>
  <select name="projektname" id="projektname">
    <option value="">---</option>
        <option value="concordia">Concordia</option>
        <option value="laf">LAF</option>
        <option value="petrichor">Petrichot</option>
  </select>

  <label for="Datum"> Datum</label> 
    <input id="Datum" type="date">

    <input type='submit' value='ok' name="action">

</form>

</main>

</body>
</html>

