<?php
/**
 * Repräsentation eines beliebigen Autos
 */
class Car {
    /**
     * Hersteller des Autos
     *
     * @var string
     */
    public $manufacturer;

    /**
     * Farbe des Autos
     *
     * @var string
     */
    public $color;
    
    /**
     * Kilometerstand des Autos
     *
     * @var integer
     */
    public $milage;

    /**
     * Gibt an, ob der Motor schon gestartet wurde
     *
     * @var boolean
     */
    public $engineStarted = false;
    
    /**
     * Konstruktor für ein neues Auto
     *
     * @param string $manufacturer
     * @param string $color
     * @param integer $milage
     */
    public function __construct($manufacturer, $color, $milage = 0) {
        $this->manufacturer = $manufacturer;
        $this->color = $color;
        $this->milage = $milage;
    }
    
    /**
     * Destruktor des Autos
     * Falls der Motor noch läuft wird dieser ausgeschalten.
     */
    public function __destruct() {
        if ($this->engineStarted) {
        	$this->stopEngine();
        }
    }
    
    /**
     * Motor anlassen
     */
    public function startEngine() {
        $this->engineStarted = true;
    }

    /**
     * Einige Kilometer fahren
     *
     * @param integer $miles
     */
    public function driveForward($miles) {
        // Wenn der Motor nicht läuft, kann nicht gefahren werden.
        if ($this->engineStarted !== true) {
        	return false;
        }
        // Kilometerstand erhöhen
        $this->milage = $this->milage + $miles;
        return true;
    }

    /**
     * Motor wieder stoppen
     */
    public function stopEngine() {
        $this->engineStarted = false;
    }
}
?>