<?php

use App\RocketComponentType;

class RocketComponentTypesTableSeeder extends BaseSeeder {

  public function __construct() {
    $this->table = 'rocket_component_types'; // name of the db-table
  }

  /**
  * Run DB seed
  */
  public function run() {

    DB::table($this->table)->truncate();
    // Cannon
    RocketComponentType::create(array(
      'type' => 'cannon',
      'costs' => 250,
      'construction_time' => 120
    ));

	RocketComponentType::create(array(
      'type' => 'shield',
      'costs' => 500,
      'construction_time' => 2400
    ));

	RocketComponentType::create(array(
      'type' => 'engine',
      'costs' => 1000,
      'construction_time' => 4800
    ));
  }



} // EOF
