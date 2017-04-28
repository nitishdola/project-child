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
  		//$this->call('VaccinesTableSeeder');
  		//$this->command->info("Vaccines table seeded :)"); 
      //$this->call('ClassesTableSeeder');
     //$this->command->info("classes table seeded :)"); 
      //$this->call('SectionTableSeeder');
      //$this->call('SemesterTableSeeder');
      $this->call('StreamTableSeeder');
    }


}

class StreamTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
      for($i = 11; $i <=12; $i++) {
            DB::table('streams')->insert(array(
            array('name'=>'Science','class_id' => $i),
            array('name'=>'Arts','class_id' => $i),
            array('name'=>'Commerce','class_id' => $i),
          ));
      }
   }
}

class SemesterTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
      for($i = 14; $i <=35; $i++) {
          $arr = [14,17,18,19,20,21,22,23,24,25,28,29,30,31,32,33,34,35];
          if(in_array($i, $arr)) {
            DB::table('semesters')->insert(array(
            array('name'=>'1st SEM','class_id' => $i),
            array('name'=>'2nd SEM','class_id' => $i),
            array('name'=>'3rd SEM','class_id' => $i),
            array('name'=>'4th SEM','class_id' => $i),

            array('name'=>'5th SEM','class_id' => $i),
            array('name'=>'6th SEM','class_id' => $i),
            array('name'=>'7th SEM','class_id' => $i),
            array('name'=>'8th SEM','class_id' => $i),
          ));
        }
      }
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


class SectionTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
    for($i = 1; $i <=10; $i++) {
      DB::table('sections')->insert(array(
          array('name'=>'A','class_id' => $i),
          array('name'=>'B','class_id' => $i),
          array('name'=>'C','class_id' => $i),
          array('name'=>'D','class_id' => $i),

          array('name'=>'E','class_id' => $i),
          array('name'=>'F','class_id' => $i),
          array('name'=>'G','class_id' => $i),
          array('name'=>'H','class_id' => $i),

          array('name'=>'I','class_id' => $i),
          array('name'=>'J','class_id' => $i),
          array('name'=>'K','class_id' => $i),
        ));
    }
   }
}

class ClassesTableSeeder extends Seeder {
 
   public function run()
   {
     //insert s records
    DB::table('classes')->insert(array(
      array('name'=>'1'),
      array('name'=>'2'),
      array('name'=>'3',),
      array('name'=>'4'),

      array('name'=>'5'),
      array('name'=>'6'),
      array('name'=>'7'),
      array('name'=>'8'),

      array('name'=>'9'),
      array('name'=>'10'),
      array('name'=>'11'),
      array('name'=>'12'),

      array('name'=>'KG'),
      array('name'=>'ENGINEERING'),
      array('name'=>'UKG'),
      array('name'=>'LKG'),

      array('name'=>'CIVIL'),
      array('name'=>'EEE'),
      array('name'=>'ECE'),
      array('name'=>'OTHERS'),

      array('name'=>'NURSERY'),
      array('name'=>'CSE'),
      array('name'=>'MAEL'),
      array('name'=>'MNE'),

      array('name'=>'MPC'),
      array('name'=>'PLAYGROUP'),
      array('name'=>'PREPARATORY'),
      array('name'=>'M.Sc(Phy)'),
      array('name'=>'MSC-PHD'),

      array('name'=>'MCMT'),

      array('name'=>'MCA'),
      array('name'=>'MSW'),
      array('name'=>'BCA'),
      array('name'=>'MSP'),
      array('name'=>'MEL'),
    )); 
   }
}

