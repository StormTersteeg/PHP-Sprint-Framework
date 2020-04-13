<?php
include("sprint/config.php");
include_once("areas/controller/functions.php");

if (isset($_POST['request'])) {$request = $_POST['request'];} else {echo "ERROR: No request defined"; exit();}

switch ($request) {
    // TEST POST
    case "test":
        $value = $_POST['value'];
        echo "value: " . $value . "<br>Controller works properly.";
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
?>

<br><br><br>