<?php
include "../tpl/template.php";
function __autoload($class_name) {
    require_once $class_name . '.class.php';
}
require_once '../auth/auth.php';
$studReg = new StudentRegister($db);
$student = new student();

$studenter = $studReg->visAlle();

foreach ($studenter as $student )
{
    print("<a href=" . $_SERVER['PHP_SELF'] . "?id=" . $student->hentId() . ">". $student->hentNavn() .  "</a><br/>\n");

    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        if($student = $studReg->visStudent($id)){
        }
    }
}

if(isset($_GET['btn_update'])) {

    try {
        $nyStudent = $studReg->updateStudent($student->hentId());


        print("<br>");
        print("<a>");
        echo "Student Oppdatert!";
        print("<br>");
        print("</a>");
    } catch (PDOException $e) {
        print("<br>");
        print("<a>");
        echo "Error: " . $e->getMessage();
        print("<br>");
        print("</a>");
    }
}

$etternavn = htmlentities($student->hentEtternavn());
$fornavn = htmlentities($student->hentFornavn());
$klasse = htmlentities($student->hentKlasseNavn());
$mobil = htmlentities($student->hentMobil());
$www = htmlentities($student->hentUrl());
$epost = htmlentities($student->hentEpost());
?>

<html>
<form action="" method="get">

    <p>
        <label for="lastname">
            Etternavn:
            <br>
            <input id="etternavn" type="text" name="etternavn" value="<?=$etternavn?>">
        </label>
    </p>

    <p>
        <label for="firstname">
            Fornavn:
            <br>
            <input id="fornavn" type="text" name="fornavn" value="<?=$fornavn?>">
        </label>

    </p>

    <p>
        <label for="class">
            Klasse:
            <br>
            <input id="klasse" type="text" name="klasse" value="<?=$klasse?>">
            <select name="klasse">
                <option value="">Velg tilhorighet</option>
                <option value="2sta" id="2sta">2STA</option>
                <option value="1stb" id="1stb">1STB</option>
            </select>
        </label>
    </p>

    <p>
        <label for="mobile">
            Mobil:
            <br>
            <input id="mobil" type="text" name="mobil" value="<?=$mobil?>">
        </label>
    </p>

    <p>
        <label for="homepage">
            www:
            <br>
            <input id="www" type="text" name="www" value="<?=$www?>">
        </label>
    </p>

    <p>
        <label for="mail">
            epost:
            <br>
            <input id="epost" type="text" name="epost" value="<?=$epost?>">
        </label>
    </p>

    <p>
        <button type="submit" name = "btn_update">Oppdater informasjon</button>
    </p>
</form>
</html>