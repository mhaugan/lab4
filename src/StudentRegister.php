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

