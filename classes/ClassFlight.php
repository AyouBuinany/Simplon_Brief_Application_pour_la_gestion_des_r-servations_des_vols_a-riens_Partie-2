<?php
 class flights_list{
    public $id;
    public $flyingFrom;
    public $flyingTo;
    public $departingDate;
    public $returningDate;
    public $seats ;
    public $statusFlight ;
    public $id_users;

    public function __construct(){}

    public function readFlying(){
    $query = "SELECT DISTINCT flyingFrom, flyingTo from flights_list where statusFlight='exist'";
    $result=request($query);
    return $result;
  }
public function showFlights($flyingFrom,$flyingTo){
$query = "SELECT * FROM flights_list WHERE flyingFrom='$flyingFrom' AND flyingTo='$flyingTo' AND seats>0 AND statusFlight='exist'";
    $result=request($query) or die("request ne pas valid tester request");
    return $result;
}
public function showAllFlights($query){
 // $query = "SELECT * FROM flights_list WHERE seats>0 AND statusFlight='exist'";
      $result=request($query) or die("request ne pas valid tester request");
      return $result;
  }
}