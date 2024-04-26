<?php

class ShowObj {
    public $showtime_ID;
    public $end_time;
    public $start_time;
    public $language;
    public $Date;
    public $theater_id;
    public $Movie_ID;

    // Constructor
    public function __construct($showtime_ID, $end_time, $start_time, $language, $Date, $theater_id, $Movie_ID) {
        $this->showtime_ID = $showtime_ID;
        $this->end_time = $end_time;
        $this->start_time = $start_time;
        $this->language = $language;
        $this->Date = $Date;
        $this->theater_id = $theater_id;
        $this->Movie_ID = $Movie_ID;
    }

    // Setter methods
    public function setShowtimeID($showtime_ID) {
        $this->showtime_ID = $showtime_ID;
    }

    public function setEndTime($end_time) {
        $this->end_time = $end_time;
    }

    public function setStartTime($start_time) {
        $this->start_time = $start_time;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function setDate($Date) {
        $this->Date = $Date;
    }

    public function setTheaterID($theater_id) {
        $this->theater_id = $theater_id;
    }

    public function setMovieID($Movie_ID) {
        $this->Movie_ID = $Movie_ID;
    }

    // Static method to create a Showtime object from an associative array
    public static function createFromArray($data) {
        return new self(
            $data['showtime_ID'],
            $data['end_time'],
            $data['start_time'],
            $data['language'],
            $data['Date'],
            $data['theater_id'],
            $data['Movie_ID']
        );
    }
}




?>