<?php
class Movie {
    public $Movie_ID;
    public $movie_name;
    public $actors;
    public $Director;
    public $release_date;

    // Constructor to initialize the movie object
    public function __construct(
        $Movie_ID, 
        $movie_name, 
        $actors, 
        $Director, 
        $release_date)
        {
        $this->Movie_ID = $Movie_ID;
        $this->movie_name = $movie_name;
        $this->actors = $actors;
        $this->Director = $Director;
        $this->release_date = $release_date;
    }
}
?>
