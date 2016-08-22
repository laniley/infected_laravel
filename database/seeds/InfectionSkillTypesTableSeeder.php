<?php

use Illuminate\Database\Seeder;

use App\InfectionSkillType;

class InfectionSkillTypesTableSeeder extends Seeder
{
    public function __construct() {
      $this->table = 'infection_skill_types'; // name of the db-table
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        InfectionSkillType::create(array(
          'name' => 'distribution'
        ));

        InfectionSkillType::create(array(
          'name' => 'defense'
        ));
    }
}
