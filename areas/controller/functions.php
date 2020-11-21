<?php
include("sprint/db_config.php");

function fakeFunction() {
  echo "Controller configured properly, this text can be found in areas/controller/views/index.php on line 10";
}

function addNote($note_name, $note_content) {
  global $link;
  $sql = "INSERT INTO notes (note_name, note_content) VALUES ('$note_name', '$note_content')";
  mysqli_query($link, $sql);
}

function updateNote($id, $note_name, $note_content) {
  global $link;
  $sql = "UPDATE notes SET note_name = '$note_name', note_content = '$note_content' WHERE id = '$id'";
  mysqli_query($link, $sql);
}

function deleteNote($id) {
  global $link;
  $sql = "DELETE FROM notes WHERE id = '$id'";
  mysqli_query($link, $sql);
}

function getNote($id) {
  global $link;
  $sql = "SELECT note_name, note_content FROM notes WHERE id = '$id'";
  $result = mysqli_fetch_assoc(mysqli_query($link, $sql));

  // Retrieve data from $result
  $note_name = $result['note_name'];
  $note_content = $result['note_content'];
  
  // Echo retrieved data as json
  echo json_encode(['note_name' => $note_name, 'note_content' => $note_content]);
}