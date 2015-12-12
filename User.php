<?php
/**
 * Klasse für die Userdaten
 */
class User {

    public $name;
    public $kundennummer;
    public $passwort;
    public $str;
    public $plz;
    public $mail;
    public $telefon;
    public $age;
    public $userloggedin;

    /**
     * Konstruktor fuer einen User
     */
    public function __construct($name, $kundennummer, $benutzername, $passwort, $str, $plz, $mail, $telefon, $age, $status) {
        $this->name = $name;
        $this->kundennummer = $kundennummer;
        $this->benutzername = $benutzername;
        $this->passwort = $passwort;
        $this->str = $str;
        $this->plz = $plz;
        $this->mail = $mail;
        $this->telefon = $telefon;
        $this->age = $age;
        $this->userloggedin = $status;
    }

    /**
     * Abmelden des Users
     */
    public function __destruct() {
        if ($this->userloggedin) {
        	$this->false;
        }
    }

    /**
     * User anmelden
     */
    public function userLogin() {
        $this->userloggedin = true;
    }

    /**
     * User ausloggen
     */
    public function userLogout() {
        $this->userloggedin = false;
    }

    public function getPasswort(){
      return $this->passwort;
    }
}
?>
