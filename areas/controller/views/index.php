<title>Home</title>
<?php
// Wanneer het login systeem van KNLTB aan dit systeem is vastgemaakt,
// moet hier worden gecontrolleerd of de gebruiker is ingelogt.

// Importeer de database gegevens en de benodigde functies die de queries bevatten.
include("sprint/config.php");
include_once("areas/controller/functions.php");

// Geef een error weer wanneer er geen request type is gedefined.
if (isset($_POST['request'])) {$request = $_POST['request'];} else {echo "ERROR: No request defined"; exit();}

switch ($request) {
    case "deelnemerToevoegen":
        // Haal alle variabelen uit de POST.
        $roepnaam = $_POST['roepnaam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];
        $school = $_POST['school'];
        // Roep de deelnemerToevoegen functie aan om de nieuwe deelnemer toe te voegen aan de database.
        deelnemerToevoegen($roepnaam, $tussenvoegsel, $achternaam, $school);
        // Redirect de gebruiker.
        header("Refresh: 3; url=handmatig");
        break;
    case "deelnemerUpdaten":
        $id = $_POST['id'];
        $roepnaam = $_POST['roepnaam'];
        $tussenvoegsel = $_POST['tussenvoegsel'];
        $achternaam = $_POST['achternaam'];
        $school = $_POST['school'];
        deelnemerUpdaten($id, $roepnaam, $tussenvoegsel, $achternaam, $school);
        header("Refresh: 3; url=spelers");
        break;
    case "deelnemerVerwijderen":
        $id = $_POST['id'];
        deelnemerVerwijderen($id);
        header("Refresh: 3; url=spelers");
        break;
    case "deelnemersImporteren":
        // Controlleer of er een bestand is geupload.
        if ($_FILES['file']['tmp_name']=="") {
            displayBevestig("Geen bestand gevonden", "Er is geen bestand geupload.", "red");
            exit;
        }

        // Maak een string van de inhoud van de upload
        $content = file_get_contents($_FILES['file']['tmp_name']);

        // Verwijder de eerste lijn van het xml bestand
        $content = preg_replace('/^.+\n/', '', $content);

        // Roep de functie aan om de data te importeren
        deelnemersImporteren($content);
        break;
}
?>

<br><br><br>