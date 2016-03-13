<!DOCTYPE html>

<html>
<body>
<h1>Studentregister</h1>
<?php  
//  Viser alle poster ved hjelp av fetch_object - navn er hyperlenke

    require_once ('auth.php');
    require_once ('student.class.php'); 
    $resultat = $db->query("SELECT * FROM studenter");

    while ($student = $resultat->fetchObject('Student') )
    {
        print("<a href=" . $_SERVER['PHP_SELF'] . "?id=" . $student->hentId() . ">". $student->hentNavn() .  "</a><br/>\n");
    }

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $stmt = $db->prepare("SELECT * FROM studenter WHERE id= :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        if($student = $stmt->fetchObject('Student')) {
            print("<br />");
            print("Navn: " . htmlentities($student->hentNavn()) . "<br />\n");
            print("Klasse: " . htmlentities($student->hentKlasse()). "<br />\n");
            print("Mobil: " . htmlentities($student->hentMobil()) . "<br />\n");
            print("Epost: " . htmlentities($student->hentEpost()) . "<br />\n");
            print("Web: " . htmlentities($student->hentUrl()) . "<br />\n");
        }
        else {
            echo "Beklager, fant ingen poster!";
        }
    }
?>
</body>
</html>