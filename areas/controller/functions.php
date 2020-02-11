<?php

function displayBevestig($titel, $tekst, $kleur) {
    echo '<br><br><br>
    <card color="' . $kleur . '">
        <bar color="' . $kleur . '">' . $titel . '</bar>
        <txt>' . $tekst . '</txt>
    </card>
    ';
}

function deelnemerToevoegen($roepnaam, $tussenvoegsel, $achternaam, $school) {
    include("sprint/config.php");

    $sql = "SELECT COUNT(id) as aantal FROM speler WHERE SchoolID = '$school'";
    $do = mysqli_query($link, $sql);
    $school_result = mysqli_fetch_assoc($do);
    $school_aantal = $school_result['aantal'];

    if ($roepnaam=="" || $achternaam=="" || $school=="") {
        displayBevestig("Deelnemer niet toegevoegd", "Alle velden moeten worden ingevuld.", "red");
    } else if ($school_aantal>20) {
        displayBevestig("Deelnemer niet toegevoegd", "School heeft het maximale aantal deelnemers overschreden.", "red");
    } else {
        $sql = "INSERT INTO speler (Roepnaam, Tussenvoegsels, Achternaam, SchoolID) VALUES ('$roepnaam', '$tussenvoegsel', '$achternaam', '$school')";
        mysqli_query($link, $sql);
        displayBevestig("Deelnemer toegevoegd", $roepnaam . " is succesvol toegevoegd.", "k-blauw");
    }
}

function deelnemerUpdaten($id, $roepnaam, $tussenvoegsel, $achternaam, $school) {
    include("sprint/config.php");

    if ($roepnaam=="" || $achternaam=="" || $school=="") {
        displayBevestig("Deelnemer niet bewerkt", "Alle velden moeten worden ingevuld.", "red");
        exit;
    } else {
        $sql = "UPDATE speler SET roepnaam = '$roepnaam', tussenvoegsels = '$tussenvoegsel', achternaam = '$achternaam', schoolID = '$school' WHERE id = '$id'";
        mysqli_query($link, $sql);
        displayBevestig("Deelnemer bewerkt", "Deelnemer " . $roepnaam . " succesvol bewerkt.", "k-blauw");
    }
}

function deelnemerVerwijderen($id) {
    include("sprint/config.php");

    $sql = "DELETE FROM speler WHERE id = '$id'";
    mysqli_query($link, $sql);
    displayBevestig("Deelnemer verwijderd", "Deelnemer succesvol verwijderd.", "k-blauw");
}

function deelnemersImporteren($file) {
    include("sprint/config.php");

    $xml = simplexml_load_string($file);

    foreach ($xml as $key) {
        // Convert elk object uit de XML naar een PHP Array
        $array = json_encode($key,JSON_PRETTY_PRINT);
        $array = json_decode($array, true);

        // Kijk of de school al bestaat.
        $school_naam = $array['schoolnaam'];
        $sql = "SELECT COUNT(id) as aantal, Email FROM school WHERE Naam = '$school_naam'";
        $do = mysqli_query($link, $sql);
        $school_result = mysqli_fetch_assoc($do);
        $school_aantal = $school_result['aantal'];
        $school_email = $school_result['Email'];

        if ($school_aantal==0) {
            // De school bestaat niet, voeg hem toe.
            $sql = "INSERT INTO school (Naam) VALUES ('$school_naam')";
            mysqli_query($link, $sql);
            displayBevestig("Nieuwe school toegevoegd", $school_naam . " is toegevoegd.", "k-oranje");
        }

        // Haal het juist school id op, zodat de deelnemer meteen kan worden gekoppeld
        $sql = "SELECT id FROM school WHERE Naam = '$school_naam'";
        $do = mysqli_query($link, $sql);
        $school_result = mysqli_fetch_assoc($do);
        $school_id = $school_result['id'];

        $roepnaam = $array['spelervoornaam'];
        // Kijk of het tussenvoegsel leeg is (een array)
        // Als het tussenvoegsel een lege array is, vervang hem met een lege string
        if (is_array($array['spelertussenvoegsels'])) {
            $tussenvoegsel = "";
        } else {
            $tussenvoegsel = $array['spelertussenvoegsels'];
        }
        $achternaam = $array['spelerachternaam'];
        deelnemerToevoegen($roepnaam, $tussenvoegsel, $achternaam, $school_id);
    }

    // Stuur een email naar de school.
    sendMail($school_email, $school_naam);
}

function sendMail($receiver, $receiver_name) {
    $name = "KNLTB";
    $mail = "toernooi@knltb.com";
    $msg = "De%20aanmelding%20van%20uw%20deelnemers%20is%20verwerkt.%20Wij%20wensen%20u%20veel%20plezier%20en%20succes!";
    $subject = "Bevestiging%20Aanmelding";
    $receiver_name = str_replace(" ", "%20", $receiver_name);

    $url = "http://dontdalon.com/mail.php?name=" . $name . "&email=" . $mail . "&msg=" . $msg . "&subject=" . $subject . "&receiver=" . $receiver . "&receiver_name=" . $receiver_name;
    
    echo '
    <script>
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", "' . $url . '", false );
        xmlHttp.send( null );
    </script>
    ';
}