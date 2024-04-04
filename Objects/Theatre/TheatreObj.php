<?php
class TheatreObj  {
    public $theater_id;
    public $name;
    public $location;

    // Constructor to initialize the movie object
    public function __construct(
        $theater_id, 
        $name, 
        $location)
        {
        $this->theater_id = $theater_id;
        $this->name = $name;
        $this->location = $location;
    }
}
?>