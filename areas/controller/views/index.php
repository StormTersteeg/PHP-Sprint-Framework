<?php
include("areas/controller/functions.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['request'])) {
    $request = $_POST['request'];
  } else {
    echo "ERROR: No request defined";
    exit();
  }
  
  switch ($request) {
    // TEST CASE
    case "getTest":
      // fakeFunction() can be found in areas/controller/functions.php
      fakeFunction();
      break;
  
    // SQL EXAMPLE CASES
    case "addNote":
      $note_name = $_POST['note_name'];
      $note_content = $_POST['note_content'];
      addNote($note_name, $note_content);
      break;
    case "updateNote":
      $id = $_POST['id'];
      $note_name = $_POST['note_name'];
      $note_content = $_POST['note_content'];
      updateNote($id, $note_name, $note_content);
      break;
    case "deleteNote":
      $id = $_POST['id'];
      deleteNote($id);
      break;
    case "getNote":
      $id = $_POST['id'];
      getNote($id);
      break;
  }

} else {
  header("Location: 404");
}
