<?php
  $dataURL = $_POST["dataURL"];
  $encodedData = explode(',', $dataURL);
  $encodedData = $encodedData[1];
  $decodedData = base64_decode($encodedData);
  file_put_contents("images/log.txt", $encodedData);
  file_put_contents("images/test.png", $decodedData);
  echo "ews.serveftp.com/images/test.png";
?>
