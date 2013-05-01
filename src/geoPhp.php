<?php

class GeoPhp{

    private $latitudeB;
    private $latitudeA;
    private $longtitudeB;
    private $longtitudeA;
    
    function __construct() {
        null;
    }
    
    /**
     * Setter method for the Starting Point
     * @access public
     * @param type $latitude
     * @param type $longtitude
     * @return void
     */
    public function setLocationB($latitude, $longtitude){
        $this->latitudeB = $latitude;
        $this->longtitudeB = $longtitude;
    }
    
    /**
     * Setter method for the Destination
     * @access public
     * @param float $latitude
     * @param float $longtitude
     * @return void
     */
    public function setLocationA($latitude, $longtitude){
        $this->latitudeA = $latitude;
        $this->longtitudeA = $longtitude;
    }
    
    /**
     * This function returns the distance from point A to point B
     * @access public
     * @param none
     * @return float $distance Distance in kilometers
     */
    public function getDistanceBetweenAtoB(){
        $radiusOfEarth = 6371;
        $a = pow(sin(deg2rad(($this->latitudeA - $this->latitudeB) / 2)), 2)
            + pow(sin(deg2rad(($this->longtitudeA - $this->longtitudeB) / 2)), 2)
            * cos(deg2rad($this->latitudeB)) * cos(deg2rad($this->latitudeA));
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = round((($radiusOfEarth * $c)/1.6), $mode = PHP_ROUND_HALF_UP);
        
        return $distance;
        
    }
    
    /**
     * This function returns the cardinal direction from point A to point B
     * @access public
     * @param none
     * @return String $direction Cardinal direction
     */
    public function getCardinalDirectionFromBToA(){
        
        $x = (deg2rad($this->longtitudeB) - deg2rad($this->longtitudeA))
            * cos((deg2rad($this->latitudeB) + deg2rad($this->latitudeA)) / 2);
        $y = (deg2rad($this->latitudeB) - deg2rad($this->latitudeA));
        $degree = 360 - (rad2deg(atan2($x, $y)));
        
        if((0 <= $degree && $degree <= 22.5) || (337.5 <= $degree && $degree <= 360) ){
            $direction = 'North';
        }
        elseif((22.5 <= $degree && $degree <= 67.5)){
            $direction = "Northeast";
        }
        elseif((67.5 <= $degree) && ($degree <= 112.5)){
            $direction = "East";
        }
        elseif((112.5 <= $degree) && ($degree <= 157.5)){
            $direction = "South East";
        }
        elseif((157.5 <= $degree) && ($degree <= 202.5)){
            $direction = "South";
        }
        elseif((202.5 <= $degree) && ($degree <= 247.5)){
            $direction = "South West";
        }
        elseif((247.5 <= $degree) && ($degree <= 292.5)){
            $direction = "West";
        }
        elseif((292.5 <= $degree) && ($degree <= 337.5)){
            $direction = "North West";
        }
        
        return $direction;
    }
    
}