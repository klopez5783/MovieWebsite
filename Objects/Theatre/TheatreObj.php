<?php
class Theatre {
    public $theatre_id;
    public $name;
    public $location;

    // Constructor to initialize the movie object
    public function __construct(
        $theatre_id, 
        $name, 
        $location)
        {
        $this->theatre_id = $theatre_id;
        $this->name = $name;
        $this->location = $location;
    }
}
?>