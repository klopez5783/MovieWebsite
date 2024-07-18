<?php
class MoviePrices {
    public $Price_ID;
    public $Movie_ID;
    public $Price;
    // Constructor to initialize the movie object
    public function __construct(
        $Price_ID,
        $Movie_ID, 
        $Price
        )
        {
        $this->Price_ID = $Price_ID;
        $this->Movie_ID = $Movie_ID;
        $this->Price = $Price ;
    }
}