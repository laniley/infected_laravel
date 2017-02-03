<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

    	// disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		$this->call(UserTableSeeder::class);
		$this->call(RocketComponentTypesTableSeeder::class);
		$this->call(RocketComponentModelsTableSeeder::class);
		$this->call(AchievementsTableSeeder::class);
		// $this->call(QuestFulfillmentConditionTypesTableSeeder::class);
		// $this->call(QuestRewardTypesTableSeeder::class);
		// $this->call(QuestTableSeeder::class);
		// $this->call(QuestFulfillmentConditionsTableSeeder::class);
		// $this->call(QuestRewardsTableSeeder::class);

        // enable foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
