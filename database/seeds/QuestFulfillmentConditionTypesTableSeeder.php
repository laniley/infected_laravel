<?php

class QuestFulfillmentConditionTypesTableSeeder extends BaseSeeder {

  public function __construct() {
    $this->table = 'quest_fulfillment_condition_types'; // name of the db-table
  }

  /**
  * Run DB seed
  */
  public function run() {

    DB::table($this->table)->truncate();

    QuestFulfillmentConditionType::create(array(
      'id' => 1,
      'action' => 'collect',
      'object' => 'stars'
    ));

    QuestFulfillmentConditionType::create(array(
      'id' => 2,
      'action' => 'finish',
      'object' => 'stage'
    ));

    QuestFulfillmentConditionType::create(array(
      'action' => 'spend',
      'object' => 'stars'
    ));

    QuestFulfillmentConditionType::create(array(
      'action' => 'shoot',
      'object' => 'asteroids'
    ));
  }



} // EOF
