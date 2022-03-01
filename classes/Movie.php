<?php
class Movie
{
    private $title;
    private $genres;
    private $actors;

    public function __construct($_title, $_genres, $_actors)
    {
        $this->title = $_title;
        $this->genres = $_genres;
        $this->actors = $_actors;
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

    protected function getGenresString()
    {
        return implode(", ", $this->genres);
    }

    public function addGenresArray($_genre)
    {
        $this->genres[] = $_genre;
    }

    public function getActors()
    {
        return $this->actors;
    }

    protected function getActorsString()
    {
        return implode(", ", $this->actors);
    }

    public function addActorsArray($_actor)
    {
        $this->actors[] = $_actor;
    }

    public function getInfo()
    {
        $genres = $this->getGenresString();
        return "{$this->title} {$genres}";
    }
}
