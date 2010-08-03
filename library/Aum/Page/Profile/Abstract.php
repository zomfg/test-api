<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aum_Page_Profile_Abstract
 *
 * @author dirk
 */
abstract class Aum_Page_Profile_Abstract extends Aum_Page_Abstract{

    /**
     * @var integer
     */
    private $visitsCounter = 0;
    /**
     * @var string
     */
    private $about = '';
    /**
     *
     * @var string
     */
    private $name = '';
    /**
     *
     * @var string
     */
    private $quote = '';
    /**
     * @var string
     */
    private $age = '';
    /**
     * @var string
     */
    private $location = '';
    /**
     * @var string
     */
    private $eyes = '';
    /**
     * @var string
     */
    private $hair = '';
    /**
     * @var string
     */
    private $measurements = '';
    /**
     * @var string
     */
    private $style = '';
    /**
     * @var string
     */
    private $origins = '';
    /**
     * @var string
     */
    private $job = '';
    /**
     * @var string
     */
    private $food = '';
    /**
     * @var string
     */
    private $alcohol = '';
    /**
     * @var string
     */
    private $smoke = '';
     /**
     * @var string
     */
    private $hobbies = '';
    /**
     *
     * @var array
     */
    private $movies = array();
    /**
     *
     * @var array
     */
    private $music = array();
    /**
     *
     * @var array
     */
    private $books = array();
    /**
     *
     * @var array
     */
    private $tvShows = array();

    /**
     *
     * @var string
     */
    private $mainPhotoThumb = '';
    /**
     *
     * @var array
     */
    private $secondaryPhotoThumbs = array();

    public function getVisitsCounter() {
        return $this->visitsCounter;
    }

    public function getAbout() {
        return $this->about;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuote() {
        return $this->quote;
    }

    public function getAge() {
        return $this->age;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getEyes() {
        return $this->eyes;
    }

    public function getHair() {
        return $this->hair;
    }

    public function getStyle() {
        return $this->style;
    }

    public function getOrigins() {
        return $this->origins;
    }

    public function getJob() {
        return $this->job;
    }

    public function getFood() {
        return $this->food;
    }

    public function getAlcohol() {
        return $this->alcohol;
    }

    public function getSmoke() {
        return $this->smoke;
    }

    public function getHobbies() {
        return $this->hobbies;
    }

    public function &getMovies() {
        return $this->movies;
    }

    public function &getMusic() {
        return $this->music;
    }

    public function &getBooks() {
        return $this->books;
    }

    public function &getTvShows() {
        return $this->tvShows;
    }

    public function getMeasurements() {
        return $this->measurements;
    }

    public function getMainPhotoThumb() {
        return $this->mainPhotoThumb;
    }

    public function &getSecondaryPhotoThumbs() {
        return $this->secondaryPhotoThumbs;
    }














    public function setVisitsCounter($visitsCounter) {
        $this->visitsCounter = $visitsCounter;
    }

    public function setAbout($about) {
        $this->about = $about;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setQuote($quote) {
        $this->quote = $quote;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function setEyes($eyes) {
        $this->eyes = $eyes;
    }

    public function setHair($hair) {
        $this->hair = $hair;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

    public function setOrigins($origins) {
        $this->origins = $origins;
    }

    public function setJob($job) {
        $this->job = $job;
    }

    public function setFood($food) {
        $this->food = $food;
    }

    public function setAlcohol($alcohol) {
        $this->alcohol = $alcohol;
    }

    public function setSmoke($smoke) {
        $this->smoke = $smoke;
    }

    public function setHobbies($hobbies) {
        $this->hobbies = $hobbies;
    }

    public function setMovies($movies) {
        $this->movies = $movies;
    }

    public function setMusic($music) {
        $this->music = $music;
    }

    public function setBooks($books) {
        $this->books = $books;
    }

    public function setTvShows($tvShows) {
        $this->tvShows = $tvShows;
    }

    public function setMeasurements($measurements) {
        $this->measurements = $measurements;
    }


    /**
     *
     * @param string $movie
     */
    public function addMovie($movie){
        array_push($this->getMovies(), $movie);
    }
    /**
     *
     * @param string $song
     */
    public function addSong($song){
        array_push($this->getMusic(), $song);
    }
    /**
     *
     * @param string $book
     */
    public function addBook($book){
        array_push($this->getBooks(), $book);
    }
    /**
     *
     * @param string $show
     */
    public function addTvShow($show){
        array_push($this->getTvShows(), $show);
    }

    public function setMainPhotoThumb($mainPhotoThumb) {
        $this->mainPhotoThumb = $mainPhotoThumb;
    }

    public function addSecondaryPhotoThumb($secondaryPhotoThumb) {
        array_push($this->getSecondaryPhotoThumbs(), $secondaryPhotoThumb);
    }


}
?>
