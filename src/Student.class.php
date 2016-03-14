<?php
class Student {
    private $id;
    private $etternavn;
    private $fornavn;
    private $klasse;
    private $mobil;
    private $www;
    private $epost;

    function __construct() { }

    function hentId() {
        return $this->id;
    }
    function hentNavn() {
        return $this->fornavn . " " . $this->etternavn;
    }
    function hentMobil() {
        return $this->mobil;
    }
    function hentKlasseNavn() {
        return $this->klasse;
    }
    function hentEpost() {
        return $this->epost;
    }
    function hentUrl() {
        return$this->www;
    }
}

