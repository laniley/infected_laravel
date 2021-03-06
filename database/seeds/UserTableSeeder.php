<?php

use App\User;

class UserTableSeeder extends BaseSeeder {

  public function __construct() {
    $this->table = 'users'; // name of the db-table
    $this->filename = app_path().'/database/csv/users.csv'; // Filename and location of data in csv file
  }

  /**
  * Run DB seed
  */
  public function run() {

    DB::table($this->table)->truncate();

    User::create(array(
      'fb_id' => '704935849573086',
      'first_name' => 'Dennis',
      'last_name' => 'Mende',
      'score' => 0,
      'stars' => 0,
      'reached_stage' => 1,
      'first_login' => false
    ));

    User::create(array(
      'fb_id' => '10202654621741836',
      'first_name' => 'Christoph',
      'last_name' => 'Langhof',
      'score' => 0,
      'stars' => 0,
      'reached_stage' => 1,
      'first_login' => false
    ));

    // $csvData = $this->getDataFromCSV($this->filename, ',');
    //
    // $seedData = array();
    //
    // if($csvData) {
    //   foreach($csvData as $oldData) {
    //
    //     // $newData["email"] = "";
    //     $newData["fb_id"] = $oldData["id"];
    //
    //     if(strrpos($oldData["name"], ' ') > -1) {
    //       list($newData["first_name"], $newData["last_name"]) = explode(' ', $oldData["name"], 2);
    //     }
    //     else {
    //       $newData["first_name"] = $oldData["name"];
    //       $newData["last_name"] = "";
    //     }
    //
    //     $newData["img_url"] = $oldData["img_url"];
    //     $newData["gender"] = "";
    //     $newData["score"] = $oldData["score"];
    //     $newData["stars"] = $oldData["stars"];
    //     $newData["last_login"] = $oldData["updated_at"];
    //     $newData["created_at"] = $oldData["inserted_at"];
    //     $newData["updated_at"] = $oldData["updated_at"];
    //
    //     User::create(array(
    //       'fb_id' => $newData["fb_id"],
    //       'first_name' => $newData["first_name"],
    //       'last_name' => $newData["last_name"],
    //       'img_url' => $newData["img_url"],
    //       'gender' => $newData["gender"],
    //       'score' => $newData["score"],
    //       'stars' => $newData["stars"],
    //       'reached_level' => 1,
    //       'first_login' => false,
    //       'created_at' => $newData["created_at"],
    //       'updated_at' => $newData["updated_at"]
    //     ));
    //   }
    // }
    // else  {
    //   echo "No csv-data available for User-Seeder.";
    // }
  }



} // EOF
