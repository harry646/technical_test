<?php

class Person {
    private $age_of_death;
    private $year_of_death;
    private $year_of_birth;
  
    public function __construct($age_of_death, $year_of_death) {
      $this->age_of_death = $age_of_death;
      $this->year_of_death = $year_of_death;
      $this->year_of_birth = $year_of_death - $age_of_death;
    }
  
    public function get_year_of_birth() {
      return $this->year_of_birth;
    }
  
    public function get_number_of_people_killed($year) {
      $age_at_death = $year - $this->year_of_birth;
      if ($age_at_death < 0 || $age_at_death >= $this->age_of_death) {
        return 0;
      }
      $year_of_death = $this->year_of_birth + $this->age_of_death;
      if ($year >= $year_of_death) {
        return 1;
      }
      return 1 - ($year - $this->year_of_birth) / $this->age_of_death;
    }
  }
  