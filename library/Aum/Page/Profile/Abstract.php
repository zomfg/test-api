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
abstract class Aum_Page_Profile_Abstract extends Aum_Page_Abstract {
    /**
     * @var integer
     */
    protected $aumId = 0;

    /**
     * @var integer
     */
    protected $visitsCounter = 0;
    /**
     * @var string
     */
    protected $about = '';
    /**
     * @var string
     */
    protected $name = '';
    /**
     * @var string
     */
    protected $quote = '';
    /**
     * @var string
     */
    protected $age = '';
    /**
     * @var string
     */
    protected $location = '';
    /**
     * @var string
     */
    protected $eyes = '';
    /**
     * @var string
     */
    protected $hair = '';
    /**
     * @var string
     */
    protected $measurements = '';
    /**
     * @var string
     */
    protected $style = '';
    /**
     * @var string
     */
    protected $origins = '';
    /**
     * @var string
     */
    protected $job = '';
    /**
     * @var string
     */
    protected $food = '';
    /**
     * @var string
     */
    protected $alcohol = '';
    /**
     * @var string
     */
    protected $smoke = '';
     /**
     * @var string
     */
    protected $hobbies = '';
    /**
     * @var array
     */
    protected $movies = array();
    /**
     * @var array
     */
    protected $music = array();
    /**
     * @var array
     */
    protected $books = array();
    /**
     * @var array
     */
    protected $tvShows = array();

    /**
     * @var string
     */
    protected $mainPhotoThumb = '';
    /**
     * @var array
     */
    protected $secondaryPhotoThumbs = array();

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

    public function getMovies() {
        return $this->movies;
    }

    public function getMusic() {
        return $this->music;
    }

    public function getBooks() {
        return $this->books;
    }

    public function getTvShows() {
        return $this->tvShows;
    }

    public function getMeasurements() {
        return $this->measurements;
    }

    public function getMainPhotoThumb() {
        return $this->mainPhotoThumb;
    }

    public function getSecondaryPhotoThumbs() {
        return $this->secondaryPhotoThumbs;
    }

    public function getAumId() {
        return $this->aumId;
    }












    public function setAumId($aumId) {
        $this->aumId = $aumId;
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
     * @param string $movie
     */
    public function addMovie($movie){
        array_push($this->movies, $movie);
    }
    /**
     * @param string $song
     */
    public function addSong($song){
        array_push($this->music, $song);
    }
    /**
     *
     * @param string $book
     */
    public function addBook($book){
        array_push($this->books, $book);
    }
    /**
     *
     * @param string $show
     */
    public function addTvShow($show){
        array_push($this->tvShows, $show);
    }

    /**
     * @param string $mainPhotoThumb
     */
    public function setMainPhotoThumb($mainPhotoThumb) {
        $this->mainPhotoThumb = $mainPhotoThumb;
    }
    /**
     * @param string $secondaryPhotoThumb
     */
    public function addSecondaryPhotoThumb($secondaryPhotoThumb) {
        array_push($this->secondaryPhotoThumbs, $secondaryPhotoThumb);
    }

    public function  getURL() {
        $url = parent::getURL();
        return sprintf($url, $this->aumId);
    }

    protected function  getPageUrlKey() {
        return 'profile';
    }
}
?>
