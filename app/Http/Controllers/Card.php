<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Card extends Controller
{
    /**
     * BoardingCards Constructor
     *
     * @param string $departureLocation Departing point for a boarding pass. Origin of the traveller
     * @param string $arrivalLocation Arrival Location for a boarding pass. This is the destination point for one leg of trip, for a traveller
     * @param string $seat Seat # for a boarding pass, common to all kinds of boarding passes
     */
    function __construct($departureLocation, $arrivalLocation, $seat)
    {
        $this->departureLocation = $departureLocation;
        $this->arrivalLocation = $arrivalLocation;
        $this->seat = $seat;
    }

    /**
     * @var string
     */
    protected  $departureLocation;
    /**
     * @var string
     */
    protected  $arrivalLocation;
    /**
     * @var string
     */
    protected  $seat;

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return $this->$name;
    }
}
