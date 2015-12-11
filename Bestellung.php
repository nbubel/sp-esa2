<?php
/**
 * Klasse für Bestellungen im Shop
 */
class Bestellung {

    public $bestellnummer;
    public $datum;
    public $kundennummer;
    public $artikelnummer;
    public $anmerkung;

    /**
     * Konstruktor fuer einen User
     */
    public function __construct($bestellnummer, $datum, $kundennummer, $artikelnummer, $anmerkung) {
        $this->bestellnummer= $bestellnummer;
        $this->datum = $datum;
        $this->kundennummer = $kundennummer;
        $this->artikelnummer = $artikelnummer;
        $this->anmerkung = $anmerkung;
    }

}
?>
