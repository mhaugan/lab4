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
            $result = $this->db->query("SELECT * FROM studenter");
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

        $id = 100;
        try {
            $stmt = $this->db->prepare("INSERT INTO `studenter` (`id`, `etternavn`, `fornavn`, `klasse`, `mobil`, `www`, `epost`, `opprettet`) VALUES (NULL, :etternavn, :fornavn, :klasse, :mobil, :www, :epost, NULL)");

            $stmt->bindParam(':etternavn', $etternavn);
            $stmt->bindParam(':fornavn', $fornavn);
            $stmt->bindParam(':klasse', $klasse);
            $stmt->bindParam(':mobil', $mobil);
            $stmt->bindParam(':www', $www);
            $stmt->bindParam(':epost', $epost);
            $stmt->execute();

            if(!$id = $stmt->fetchObject('Student')){
                throw new InvalidArgumentException('Student not created');
            }
            else
                return $id;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $id;
    }
}