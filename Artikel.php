<?php
/**
 * Klasse für die Artikel im Shop
 */
class Artikel {

    public $artikelnummer;
    public $artikelname;
    public $groesse;
    public $farbe;
    public $bild;
    public $artikelonline;
    public $artikelnr;

    /**
     * Konstruktor fuer einen User
     */
    public function __construct($artikelnummer, $artikelname, $groesse, $farbe, $bild, $artikelonline) {
        $this->artikelnummer = $artikelnummer;
        $this->artikelname = $artikelname;
        $this->groesse = $groesse;
        $this->farbe = $farbe;
        $this->bild = $bild;
        $this->artikelonline = $artikelonline;
        $artikelnr = $artikelnr + 1;
    }


    public function __toString(){
      return (string)$this->artikelnummer;
    }

    public function getArtikelnummer(){
      return $artikelnr;
    }
}
?>
