<!DOCTYPE html>
<html>

<head>
    <title>Resultat der Berechnung</title>
    <meta charset="utf8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
</head>

<body class="w3-pale-green">
    <?php
    if (validateParameters()) {
        if ($_POST['geometrischeForm'] == 'rechteck') {
            cookieSetter('rechteck');
            echo "<h3 class='w3-container w3-teal w3-margin'>Rechtecks-Berechnung</h3>";
            berechneRechteck();
        } else if ($_POST['geometrischeForm'] == 'dreieck') {
            cookieSetter('dreieck');
            echo "<h3 class='w3-container w3-teal w3-margin'>Dreiecks-Berechnung</h3>";
            berechneDreieck();
        }
    }

    function berechneRechteck()
    {
        if (isset($_POST['berechneFlaeche'])) {
            $flaeche = $_POST['seiteA'] * $_POST['seiteB'];
            $outputString = "Die Fläche beträgt: " . $flaeche . " " . "q" . $_POST['einheiten'];
            echo "<p class='w3-margin'>$outputString</p>";
        }

        if (isset($_POST['berechneUmfang'])) {
            $umfang = 2 * $_POST['seiteA'] + 2 * $_POST['seiteB'];
            $outputString = "Der Umfang beträgt: " . $umfang . " " . $_POST['einheiten'];
            echo "<p class='w3-margin'>$outputString</p>";
        }
    }

    function berechneDreieck()
    {
        if (isset($_POST['berechneFlaeche'])) {
            $flaeche = ($_POST['hoehe'] * $_POST['grundlinie']) / 2;
            $outputString = "Die Fläche beträgt: " . number_format($flaeche, 2) . " " . "q" . $_POST['einheiten'];
            echo "<p class='w3-margin'>$outputString</p>";
        }

        if (isset($_POST['berechneUmfang'])) {
            $seitenlaenge = sqrt((pow(($_POST['grundlinie']) / 2, 2)) + pow($_POST['hoehe'], 2));
            $umfang = 2 * $seitenlaenge + $_POST['grundlinie'];
            $outputString = "Der Umfang beträgt: " . number_format($umfang, 2) . " " . $_POST['einheiten'];
            echo "<p class='w3-margin'>$outputString</p>";
        }
    }

    function cookieSetter($cookiestring){
        if(isset($_COOKIE[$cookiestring])){
            $actual = $_COOKIE[$cookiestring];
            $actual++;
            setcookie($cookiestring, $actual, time() + 3600);
            $_COOKIE[$cookiestring] = $actual;
        }else{
            setcookie($cookiestring, 1, time() + 3600);
            $_COOKIE[$cookiestring] = 1;
        }
    }

    function validateParameters()
    {
        if (!(isset($_POST['geometrischeForm']) && ($_POST['geometrischeForm'] == "rechteck" || $_POST['geometrischeForm'] == "dreieck"))) {
            echo "<p>Rechteck oder Dreieck nicht ausgewählt</p>";
            return false;
        }

        if (!(isset($_POST['berechneFlaeche']) && $_POST['berechneFlaeche'] == 'berechneFlaeche' ||
            isset($_POST['berechneUmfang']) && $_POST['berechneUmfang'] == 'berechneUmfang')) {
            echo "<p>Berechnungsart nicht gewählt</p>";
            return false;
        }

        if (!(isset($_POST['einheiten']) &&
            ($_POST['einheiten'] == 'm' || $_POST['einheiten'] == 'mm' || $_POST['einheiten'] == 'cm'))) {
            echo "<p>Einheit nicht ausgewählt</p>";
            echo ($_POST['einheiten']);
            return false;
        }

        if ($_POST['geometrischeForm'] == 'rechteck') {
            if (!(isset($_POST['seiteA']) && $_POST['seiteA'] > 0 && $_POST['seiteA'] < 1000 &&
                isset($_POST['seiteB']) && $_POST['seiteB'] > 0 && $_POST['seiteB'] < 1000)) {
                echo "<p>Ungültige Eingabe Rechteck</p>";
                return false;
            }
        }

        if ($_POST['geometrischeForm'] == 'dreieck') {
            if (!(isset($_POST['grundlinie']) && $_POST['grundlinie'] > 0 && $_POST['grundlinie'] < 1000 &&
                isset($_POST['hoehe']) && $_POST['hoehe'] > 0 && $_POST['hoehe'] < 1000)) {
                echo "<p>Ungültige Eingabe Dreieck</p>";
                return false;
            }
        }
        return true;
    }

    echo "<h3 class='w3-container w3-teal w3-margin'>Statistik</h3>";
    if(isset($_COOKIE['rechteck'])){
        $outputString = "Anzahl berechnete Rechtecke: " . $_COOKIE['rechteck'];
        echo "<p class='w3-margin'>$outputString</p>";
    }

    if(isset($_COOKIE['dreieck'])){
        $outputString = "Anzahl berechnete Dreiecke: " . $_COOKIE['dreieck'];
        echo "<p class='w3-margin'>$outputString</p>";
    }
    ?>
     <a href="application.html" class="w3-margin">Zurück zur Applikation</a>
</html>