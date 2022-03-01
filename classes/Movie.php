<?php
class Movie
{
    private $title;
    private $genres;

    public function __construct($_title, $_genres)
    {
        $this->title = $_title;
        $this->genres = $_genres;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($_title)
    {
        $this->title = $_title;
    }

    public function getGenres()
    {
        return $this->genres;
    }

    public function addGenresArray($_genre)
    {
        $this->genres[] = $_genre;
    }

    public function getGenresString()
    {
        $output = "";
        foreach ($this->genres as $genre) {
            $output .= $genre . " ";
        }
        return $output;
    }

    public function getInfo()
    {
        $genres = $this->getGenresString();
        return "{$this->title} {$genres}";
    }
}
