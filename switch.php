<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $jsonString = file_get_contents('precense.json');
  $students = json_decode($jsonString, true);

  foreach ($students['students'] as &$student) {
    if ($student['id'] == $id) {

      $student['precence'] = !$student['precence'];
      break;
    }
  }

  $jsonString = json_encode($students);
  file_put_contents('precense.json', $jsonString);
}else {
  echo "error"; 
}

?>
