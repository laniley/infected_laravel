<?php

class QuestTableSeeder extends BaseSeeder {

  public function __construct() {
    $this->table = 'quests'; // name of the db-table
  }

  /**
  * Run DB seed
  */
  public function run() {

    DB::table($this->table)->truncate();

    ########## collect stars ###############
    // collect 5 stars
    Quest::create(array());
    // collect 20 stars
    Quest::create(array(
      'parent_id' => 1
    ));
    // collect 50 stars
    Quest::create(array(
      'parent_id' => 2
    ));
    // collect 100 stars
    Quest::create(array(
      'parent_id' => 3
    ));
    // collect 500 stars
    Quest::create(array(
      'parent_id' => 4
    ));
    // collect 1000 stars
    Quest::create(array(
      'parent_id' => 5
    ));

    ########## finish stage #################
    // finish stage 1
    Quest::create(array());

    Quest::create(array(
      'parent_id' => 7
    ));

    Quest::create(array(
      'parent_id' => 8
    ));

    Quest::create(array(
      'parent_id' => 9
    ));

    Quest::create(array(
      'parent_id' => 10
    ));

    Quest::create(array(
      'parent_id' => 11
    ));

    Quest::create(array(
      'parent_id' => 12
    ));

  }



} // EOF
