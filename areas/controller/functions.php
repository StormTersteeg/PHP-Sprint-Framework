<?php

function fakeFunction() {
  echo "Controller configured properly, this text can be found in areas/controller/views/index.php on line 17";
}

function addNote($note_name, $note_content) {
  $db = new SprintDB('example_db');
  $sql = "INSERT INTO notes (note_name, note_content) VALUES ('$note_name', '$note_content')";
  $db->query($sql);
}

function updateNote($id, $note_name, $note_content) {
  $db = new SprintDB('example_db');
  $sql = "UPDATE notes SET note_name = '$note_name', note_content = '$note_content' WHERE id = '$id'";
  $db->query($sql);
}

function deleteNote($id) {
  $db = new SprintDB('example_db');
  $sql = "DELETE FROM notes WHERE id = '$id'";
  $db->query($sql);
}

function getNote($id) {
  $db = new SprintDB('example_db');
  $sql = "SELECT note_name, note_content FROM notes WHERE id = '$id'";
  $result = $db->fetch($sql);

  if (!$result) {
    echo "No notes with id $id";
  } else {
    // Retrieve data from $result
    $note_name = $result['note_name'];
    $note_content = $result['note_content'];
    
    // Echo retrieved data as json
    echo json_encode(['note_name' => $note_name, 'note_content' => $note_content]);
  }
}