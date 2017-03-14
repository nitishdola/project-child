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
		$this->call('VaccinesTableSeeder');
		$this->command->info("Vaccines table seeded :)"); 
    }


}


class VaccinesTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
     DB::table('vaccines')->insert(array(
		array('name'=>'OPV','number_of_doses'=> 3),
		array('name'=>'DPT','number_of_doses'=> 3),
		array('name'=>'Hepatits-B','number_of_doses'=> 3),
		array('name'=>'Hib','number_of_doses'=> 3),

		array('name'=>'Hepatits-A','number_of_doses'=> 2),
		array('name'=>'BCG','number_of_doses'=> 1),
		array('name'=>'Typhoid','number_of_doses'=> 1),
		array('name'=>'Measles','number_of_doses'=> 1),

		array('name'=>'MMR','number_of_doses'=> 1),
		array('name'=>'Tetanus Toxoid','number_of_doses'=> 1),
		array('name'=>'Chicken Pox','number_of_doses'=> 1),
      )); 
   }
}
