<?php

interface StudentInterface
{
    public function visAlle() : array;
    public function visStudent(int $id ) : student;
    public function leggTilStudent(student $student) : int;
    public function updateStudent(int $id);
    public function visKlasse() : array;
//    public function visKlasseMatte() : array;
}
