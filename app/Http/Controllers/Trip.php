<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Trip extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * @var
     */
    private $boardingCard;

    /**
     * @return mixed
     */
    public function getBoardingCards()
    {
        return $this->boardingCard;
    }

    /**
     * @var
     */
    private $sortedBaseBoardingCard;


    /**
     *
     */
    public function sortCard(){
        $this->sortedBaseBoardingCard = Sorter::sort($this->boardingCard);
    }


    /**
     * @param Card $boardingCard
     */
    public function addCard(Card $boardingCard){
        $this->boardingCard[] = $boardingCard;
    }
    /**
     * Define how to convert a trip to a string. This function takes an object of class 'Trip' and converts each
     * boarding pass within it's object to a string using the object's respective class' toString() method
     *
     *
     * @return string  $str  Complete string for the whole human readable instructions each
     * created individually for all boarding passes.
     */

    public function toWelcome()
    {
        // Lets plan a trip :)
        $journey = new  Trip();

        $journey->addCard(new Flight('Gerona Airport', 'Stockholm', '3A', 'SK455', '45B', '344'));
        $journey->addCard(new Train('Madrid', 'Barcelona', '45B', '78A'));
        $journey->addCard(new Flight('Stockholm', 'New York JFK', '7B', 'SK22', '22'));

        $journey->addCard(new Airport('Barcelona', 'Gerona Airport'));

        $journey->sortCard();

        $data =  ($journey->toHtml());
        //dd($data);

        return view('welcome', compact('data'));
//        return $str;
    }


    public function toHtml()
    {

        /**
         *Convert each boarding pass to a string, and concatenate them together.
         */
        $str = '<ol>';

        foreach( $this->sortedBaseBoardingCard as $boarding){

            $str .= '<li>' . $boarding->toString() . '</li>' ;
        }
        /*
         *  Final greetings.
         */

        $str .= '<li>You have arrived at your final destination.</li>';
        $str .= '</ol>';

        return $str;
    }

}
