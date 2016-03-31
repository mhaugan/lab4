<?php
include "../tpl/template.php";
function __autoload($class_name) {
    require_once $class_name . '.class.php';
}
require_once '../auth/auth.php';

$studReg = new StudentRegister($db);
$student = new student();


if(isset($_GET['btn_add'])) {
    try {

        $nyStudent = $studReg->leggTilStudent($student);

        $student->setEtternavn('etternavn');
        $student->setFornavn('fornavn');
        $student->setKlasse('klasse');
        $student->setMobil('mobil');
        $student->setWww('www');
        $student->setEpost('epost');

        print("<br>");
        print("<a>");
        echo "Ny student lagt til!";
        print("<br>");
        print("</a>");

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<html>
<form action="" method="get">

    <p>
        <label for="lastname">
            Etternavn:
            <br>
            <input id="etternavn" type="text" name="etternavn">
        </label>
    </p>

    <p>
        <label for="firstname">
            Fornavn:
            <br>
            <input id="fornavn" type="text" name="fornavn">
        </label>

    </p>

    <p>
        <label for="class">
            Klasse:
            <br>
            <input id="klasse" type="text" name="klasse">
        </label>
    </p>

    <p>
        <label for="mobile">
            Mobil:
            <br>
            <input id="mobil" type="text" name="mobil">
        </label>
    </p>

    <p>
        <label for="homepage">
            www:
            <br>
            <input id="www" type="text" name="www">
        </label>
    </p>

    <p>
        <label for="mail">
            epost:
            <br>
            <input id="epost" type="text" name="epost">
        </label>
    </p>

    <p>
        <button type="submit" name = "btn_add">Legg til student</button>
    </p>
</form>
</html>