<?php
include("sprint/config.php");

function addNote($note_name, $note_content) {
  global $link;
  $sql = "INSERT INTO db_table (note_name, note_content) VALUES ('$note_name', '$note_content')";
  mysqli_query($link, $sql);
}

function updateNote($id, $note_name, $note_content) {
  global $link;
  $sql = "UPDATE db_table SET note_name = '$note_name', note_content = '$note_content' WHERE id = '$id'";
  mysqli_query($link, $sql);
}

function deleteNote($id) {
  global $link;
  $sql = "DELETE FROM db_table WHERE id = '$id'";
  mysqli_query($link, $sql);
}

function getNote($id) {
  global $link;
  $sql = "SELECT * FROM db_table WHERE id = '$id'";
  mysqli_query($link, $sql);
}