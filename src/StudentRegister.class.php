<?php

class StudentRegister implements StudentInterface
{

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function visAlle(): array
    {
        $studenter= array();

        try
        {
            $result = $this->db->query("SELECT * FROM `studenter` ORDER BY `studenter`.`etternavn` ASC");
            while ($student = $result->fetchObject('Student')) {
                $studenter[] = $student;
            }
        }
        catch (Exception $e) {
            print $e->getMessage() . PHP_EOL;
        }

        return $studenter;
    }

    public function visStudent(int $id) : Student
    {
        try
        {
            $stmt = $this->db->prepare("SELECT etternavn, fornavn, mobil, www, epost FROM studenter WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if(!$student = $stmt->fetchObject('Student')) {
                throw new InvalidArgumentException('No student with id: ' . $id);
            }
            else
                return $student;
        }
        catch (InvalidArgumentException $e) {
            print $e->getMessage() . PHP_EOL;
        }
        return $student;
    }


    public function  leggTilStudent(student $student) : int
    {
        $etternavn = htmlentities($_GET['etternavn']);
        $fornavn = htmlentities($_GET['fornavn']);
        $klasse = htmlentities($_GET['klasse']);
        $mobil = htmlentities($_GET['mobil']);
        $www = htmlentities($_GET['www']);
        $epost = htmlentities($_GET['epost']);
        try {
            $stmt = $this->db->prepare("INSERT INTO `studenter` (`id`, `etternavn`, `fornavn`, `klasse`, `mobil`, `www`, `epost`, `opprettet`) VALUES (NULL, :etternavn, :fornavn, :klasse, :mobil, :www, :epost, CURRENT_TIMESTAMP)");

            $stmt->bindParam(':etternavn', $etternavn);
            $stmt->bindParam(':fornavn', $fornavn);
            $stmt->bindParam(':klasse', $klasse);
            $stmt->bindParam(':mobil', $mobil);
            $stmt->bindParam(':www', $www);
            $stmt->bindParam(':epost', $epost);
            $stmt->execute();

            $id = $this->db->lastInsertId();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $id;
    }

    public function updateStudent(int $id)
    {
        $etternavn = htmlentities($_GET['etternavn']);
        $fornavn = htmlentities($_GET['fornavn']);
        $klasse = htmlentities($_GET['klasse']);
        $mobil = htmlentities($_GET['mobil']);
        $www = htmlentities($_GET['www']);
        $epost = htmlentities($_GET['epost']);

        try {
            $stmt = $this->db->prepare("UPDATE studenter SET fornavn= :fornavn, etternavn= :etternavn, klasse= :klasse, mobil= :mobil, www= :www, epost= :epost WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':etternavn', $etternavn);
            $stmt->bindParam(':fornavn', $fornavn);
            $stmt->bindParam(':klasse', $klasse);
            $stmt->bindParam(':mobil', $mobil);
            $stmt->bindParam(':www', $www);
            $stmt->bindParam(':epost', $epost);
            $stmt->execute();

        }
        catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function visKlasse() : array
    {
        $klassenavn = htmlentities($_GET['klasse']);
        $studenter = array();

        try {
            $stmt = $this->db->prepare("SELECT * FROM `studenter` INNER JOIN klasse on studenter.klasse = klasse.id WHERE klasse.klassenavn = :klassenavn ORDER BY `studenter`.`etternavn` ASC");
            $stmt->bindParam(':klassenavn', $klassenavn);
            $stmt->execute();
            while ($student = $stmt->fetchObject('Student')) {
                $studenter[] = $student;
            }
        }
        catch (Exception $e){
            print $e->getMessage() . PHP_EOL;
        }
        return $studenter;
    }
}