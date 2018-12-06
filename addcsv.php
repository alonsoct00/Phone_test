<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title></title>
</head>
<body>
 <?php
 //read data from form

 $carrier = filter_input(INPUT_POST, "carrier");
 $phone = filter_input(INPUT_POST, "phone");
 $status = filter_input(INPUT_POST, "status");
 

$phonev = $_GET['phone'];
$pattern = "/^(?:0|\+?44)(?:\d\s?){9,10}$/";

$match = preg_match($pattern,$phonev);

if ($match != false) {
  $match = ("valid");
  $phonev = filter_input(INPUT_POST, "phone");
} else {
  $match = ("invalid");
  $phonev = filter_input(INPUT_POST, "phone");
}


 //print form results to user
 print <<< HERE
 <h1>Thanks!</h1>
<br/>
 <p>Carrier: $carrier</p>
 <p>Phone: $phonev</p>
 <p>Status: $status</p>
 <p>Valid: $match</p>
HERE;
 //generate output for text file
 $output = $carrier . "t";
 $output .= $phonev . "t";
 $output .= $status . "t";
 $output .= $match . "t";

 //open file for output
 $fp = fopen("contacts.csv", "a");
 //write to the file
 fwrite($fp, $output);
 fclose($fp);
 ?>
</body>
</html>