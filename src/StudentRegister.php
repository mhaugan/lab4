<?php
include "../tpl/template.php";
function __autoload($class_name) {
    require_once $class_name . '.class.php';
}
require_once '../auth/auth.php';

$studReg = new StudentRegister($db);

if(isset($_GET['id'])  && ctype_digit($_GET['id']))
{
    $id = intval($_GET['id']);
    if($student = $studReg->visStudent($id)) {

        print("<br/>");
        print("<a>");
        print("Navn:". htmlentities($student->hentNavn()) . "<br/>\n");
        print("Klasse: ". htmlentities($student->hentKlasseNavn()) . "<br />\n");
        print("Mobil: "   . htmlentities($student->hentMobil()) . "<br />\n");
        print("Epost: ". htmlentities($student->hentEpost()) . "<br />\n");
        print("</a>");
        print("<br/>");
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
?>
    <html>
    <form action="" method="get">
        <b>
            <br>
            Velg hvilken klasse du vil se:
            <br>
        </b>
        <select name="klasse">
            <option value="">Velg tilhorighet</option>
            <option value="2sta" id="2sta">2STA</option>
            <option value="1stb" id="1stb">1STB</option>
        </select>
        <br>
        <br>
        <input type="submit" name="btn_class" value="submit">
    </form>

    </html>

<?php
if(isset($_GET['btn_class'])){
    $val = $_GET['klasse'];
    print("<br>");
    $studenter = $studReg->visKlasse();
    foreach ($studenter as $student) {
        print("<a href=" . $_SERVER['PHP_SELF'] . "?id=" . $student->hentId() . ">". $student->hentNavn() .  "</a><br/>\n");
    }
}