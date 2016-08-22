<?php

use Illuminate\Database\Seeder;

use App\InfectionSkill;

class InfectionSkillsTableSeeder extends Seeder
{
    public function __construct() {
      $this->table = 'infection_skills'; // name of the db-table
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();

        // distribution skills
        InfectionSkill::create(array(
          'name' => 'reproduction rate',
          'infection_skill_type_id' => 1
        ));

        InfectionSkill::create(array(
          'name' => 'incubation time',
          'infection_skill_type_id' => 1
        ));

        // defense skills
        InfectionSkill::create(array(
          'name' => 'complexity',
          'infection_skill_type_id' => 2
        ));

        InfectionSkill::create(array(
          'name' => 'membran thickness',
          'infection_skill_type_id' => 2
        ));
    }
}
