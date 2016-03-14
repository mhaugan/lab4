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

            if(!$studentKiller = $stmt->fetchObject('Student')) {
                throw new InvalidArgumentException('No student with id: ' + $id);
            }
            else
                return $studentKiller;
        }
        catch (InvalidArgumentException $e) {
            print $e->getMessage() . PHP_EOL;
        }
        return $studentKiller;
    }

    public function leggTilStudent(Student $student) : int
    {
/*
        try {
            $stmt = $this->db->prepare("INSERT INTO `studenter` (`id`, `etternavn`, `fornavn`, `klasse`, `mobil`, `www`, `epost`, `opprettet`) VALUES (NULL, 'dog', 'meit', '1STA', '90090900', 'www.vg.no', 'meit@dog.com', '2016-03-14 00:00:00');");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        catch (Exception $e){
            print $e->getMessage() . PHP_EOL;
        }*/
        // TODO: Implement leggTilStudent() method.
        //INSERT INTO `studenter` (`id`, `etternavn`, `fornavn`, `klasse`, `mobil`, `www`, `epost`, `opprettet`) VALUES (NULL, 'dog', 'meit', '1STA', '90090900', 'www.vg.no', 'meit@dog.com', '2016-03-14 00:00:00');

    }
}