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
          'tooltip' => 'The reproduction rate defines how many people you can infect per day.',
          'infection_skill_type_id' => 1
        ));

        InfectionSkill::create(array(
          'name' => 'incubation time',
          'tooltip' => 'The incubation time decides how often you can start an infection wave. After every wave you have to wait for the incubation time to end.',
          'infection_skill_type_id' => 1
        ));

        // defense skills
        InfectionSkill::create(array(
          'name' => 'complexity',
          'tooltip' => 'With a higher comlexity level your opponents will need more Research Points to cure your infection.',
          'infection_skill_type_id' => 2
        ));

        InfectionSkill::create(array(
          'name' => 'membran thickness',
          'tooltip' => 'With a thicker membran it will take longer to cure your infection, even with a working drug.',
          'infection_skill_type_id' => 2
        ));
    }
}
