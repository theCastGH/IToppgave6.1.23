<?php

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
  file_put_contents('presence.json', $jsonString);
}

?>
