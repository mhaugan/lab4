<?php
include "../tpl/template.php";
function __autoload($class_name) {
    require_once $class_name . '.class.php';
}
require_once '../auth/auth.php';

$studReg = new StudentRegister($db);

if(isset($_GET['id']) && ctype_digit($_GET['id']))
{
    $id = intval($_GET['id']);
    if($student = $studReg->visStudent($id)) {

        print("<br />");
        print("Navn: ". htmlentities($student->hentNavn()) . "<br />\n");
        print("Klasse: ". htmlentities($student->hentKlasseNavn()) . "<br />\n");
        print("Mobil: "   . htmlentities($student->hentMobil()) . "<br />\n");
        print("Epost: ". htmlentities($student->hentEpost()) . "<br />\n");
    }
    else {
        echo "Beklager, fant ingen poster!";
    }
}
else{
    print("<h1>Studenter:</h1><br />");
    $studenter = $studReg->visAlle();

    foreach ($studenter as $student )
    {
        print("<a href=" . $_SERVER['PHP_SELF'] . "?id=" . $student->hentId() . ">". $student->hentNavn() .  "</a><br/>\n");
    }
}
if(isset($_GET['btn_add'])){

    $nyStudent = $studReg->leggTilStudent($student);

    $etternavn = htmlentities($_GET['etternavn']);
    $fornavn = htmlentities($_GET['fornavn']);
    $klasse = htmlentities($_GET['klasse']);
    $mobil = htmlentities($_GET['mobil']);
    $www = htmlentities($_GET['www']);
    $epost = htmlentities($_GET['epost']);


    print("AAAAAAAAAAAAAA");
}