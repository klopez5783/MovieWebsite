<?php
class Movie {
    public $Movie_ID;
    public $movie_name;
    public $actors;
    public $Director;
    public $release_date;
    public $genre;
    public $rating;

    // Constructor to initialize the movie object
    public function __construct(
        $Movie_ID, 
        $movie_name, 
        $actors, 
        $Director, 
        $release_date,
        $genre,
        $rating)
        {
        $this->Movie_ID = $Movie_ID;
        $this->movie_name = $movie_name;
        $this->actors = $actors;
        $this->Director = $Director;
        $this->release_date = $release_date;
        $this->genre = $genre;
        $this->rating = $rating;
    }
}
?>
