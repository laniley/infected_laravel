<?php

class QuestFulfillmentConditionsTableSeeder extends BaseSeeder {

  public function __construct() {
    $this->table = 'quest_fulfillment_conditions'; // name of the db-table
  }

  /**
  * Run DB seed
  */
  public function run() {

    DB::table($this->table)->truncate();

    // collect stars

    QuestFulfillmentCondition::create(array(
      'quest_id' => '1',
      'quest_fulfillment_condition_type_id' => '1',
      'fulfillment_amount' => 5
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '2',
      'quest_fulfillment_condition_type_id' => '1',
      'fulfillment_amount' => 20
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '3',
      'quest_fulfillment_condition_type_id' => '1',
      'fulfillment_amount' => 50
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '4',
      'quest_fulfillment_condition_type_id' => '1',
      'fulfillment_amount' => 100
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '5',
      'quest_fulfillment_condition_type_id' => '1',
      'fulfillment_amount' => 500
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '6',
      'quest_fulfillment_condition_type_id' => '1',
      'fulfillment_amount' => 1000
    ));

    // reach level
    QuestFulfillmentCondition::create(array(
      'quest_id' => '7',
      'quest_fulfillment_condition_type_id' => '2',
      'fulfillment_amount' => 1
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '8',
      'quest_fulfillment_condition_type_id' => '2',
      'fulfillment_amount' => 2
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '9',
      'quest_fulfillment_condition_type_id' => '2',
      'fulfillment_amount' => 3
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '10',
      'quest_fulfillment_condition_type_id' => '2',
      'fulfillment_amount' => 4
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '11',
      'quest_fulfillment_condition_type_id' => '2',
      'fulfillment_amount' => 5
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '12',
      'quest_fulfillment_condition_type_id' => '2',
      'fulfillment_amount' => 6
    ));

    QuestFulfillmentCondition::create(array(
      'quest_id' => '13',
      'quest_fulfillment_condition_type_id' => '2',
      'fulfillment_amount' => 7
    ));
  }



} // EOF
