<?php
class student {

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

    function hentEtternavn() {
        return $this->etternavn;
    }

    function  hentFornavn(){
        return $this->fornavn;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setEtternavn($etternavn)
    {
        $this->etternavn = $etternavn;
    }

    public function setFornavn($fornavn)
    {
        $this->fornavn = $fornavn;
    }

    public function setKlasse($klasse)
    {
        $this->klasse = $klasse;
    }

    public function setMobil($mobil)
    {
        $this->mobil = $mobil;
    }

    public function setWww($www)
    {
        $this->www = $www;
    }

    public function setEpost($epost)
    {
        $this->epost = $epost;
    }
}

