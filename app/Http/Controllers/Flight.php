<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 08/10/2017
 * Time: 05:09 م
 */

namespace App\Http\Controllers;


class Flight extends Card
{

    /**
     * @var string
     */
    /**
     * @var string
     */
    /**
     * @var null|string
     */
    private $flight, $gate, $counter;

    /**
     * Constructor for FlightBaseBoardingCard
     *
     * @param string $departureLocation Each flight boarding pass has a departure location, an origin airport for example
     * @param string $arrivalLocation Each flight boarding pass has a arrival location, a destination airport for example
     * @param string $seat A flight boarding pass has a seat # assigned to it. On rare occasions, the passenger makes a choice
     * @param string $flight Each flight has a flight number
     * @param string $gate The gate # to reach the airport flight bus
     * @param string $counter which is used in case some one drops off luggage. This can't always be the case ( web check in for example)
     *
     */
    function __construct($departureLocation, $arrivalLocation, $seat, $flight, $gate, $counter = null)
    {
        parent::__construct($departureLocation, $arrivalLocation, $seat);

        $this->flight = $flight;
        $this->gate = $gate;
        $this->counter = $counter;
    }

    /**
     * Converts an object of FlightBaseBoardingCard into human readable instruction set. This relates to only Flight boarding passes.
     *
     */
    public function toString()
    {
        return 'From ' . $this->get('departureLocation') . ', take flight ' . $this->flight . ' to ' . $this->get('arrivalLocation') . '. Gate ' . $this->gate . ', seat ' . $this->get('seat') . '. ' . ($this->counter ? 'Baggage drop at ticket counter ' . $this->counter . '.' : 'Baggage will be automatically transferred from your last leg.');
    }
}