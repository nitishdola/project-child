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
      //$this->call('StreamTableSeeder');
      //$this->call('AllergyTableSeeder');
      //$this->call('AllergyCategoriesTableSeeder');
      //$this->call('OtherVaccinesTableSeeder'); 
      //$this->call('FamilyHistoriesTableSeeder');
      //$this->call('EyesightTableSeeder');
      $this->call('BranchesTableSeeder');
    }


}

class BranchesTableSeeder extends Seeder {
 
   public function run()
   {
      DB::table('branches')->insert(array(
        array('name' => 'Mechanical Engineering'),
        array('name' =>  'Civil Engineering'),
        array('name' =>  'Computer Science & Engineering'),
        array('name' =>  'Electronics & Communication Engineering'),
        array('name' =>  'Computer Science'),
        array('name' =>  'Bachelor of Computer Application'),
        array('name' =>  'Bachelor of Science in Digital Film Making & Visual Effects'),
        array('name' =>  'Bachelor of Science and Information Technology'),
      ));
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

class AllergyTableSeeder extends Seeder {
 
   public function run()
   {
      DB::table('allergies')->insert(array(
        array('name'=>'Drug'),
        array('name'=>'Food'),
        array('name'=>'Environment'),
      ));
   }
}

class AllergyCategoriesTableSeeder extends Seeder {
 
   public function run()
   {
      DB::table('allergy_categories')->insert(array(
        array('name'=>'Antibiotics', 'allergy_id' => 1),
        array('name'=>'Pain Killer', 'allergy_id' => 1),
        array('name'=>'Antipyretic', 'allergy_id' => 1),
        array('name'=>'Other', 'allergy_id' => 1),

        array('name'=>'Other', 'allergy_id' => 2),

        array('name'=>'Dust', 'allergy_id' => 3),
        array('name'=>'Sunlight', 'allergy_id' => 3),
        array('name'=>'Insect', 'allergy_id' => 3),
        array('name'=>'Pollen', 'allergy_id' => 3),
        array('name'=>'Other', 'allergy_id' => 3),
      ));
   }
}
class OtherVaccinesTableSeeder extends Seeder {
 
   public function run()
   {
      DB::table('other_vaccines')->insert(array(
        array('name'=>'Rotavirus Vaccine'),
        array('name'=>'Influenza Vaccine'),
        array('name'=>'Japanese Encephalities'),
        array('name'=>'Meningococcal Vaccine'),
        array('name'=>'Pneumococcal Vaccine'),
        array('name'=>'Human Papilloma Vaccine'),
        array('name'=>'Injectable Polio Vaccine'),
        array('name'=>'Yellow Fever'),
        array('name'=>'Anti rabies Vaccine'),
      ));
   }
}

class FamilyHistoriesTableSeeder extends Seeder {
 
   public function run()
   {
      DB::table('family_histories')->insert(array(
        array('name'=>'Diabetes'),
        array('name'=>'Hypertension'),
        array('name'=>'Cancer'),
        array('name'=>'Dyslipidemia'),
        array('name'=>'Insomenia'),
        array('name'=>'Obesity'),
        array('name'=>'Gout'),
        array('name'=>'Hypothyroid'),
        array('name'=>'Others'),
      ));
   }
}
 

class EyesightTableSeeder extends Seeder {
 
   public function run()
   {
      DB::table('eyesights')->insert(array(
        array('name'=>'6/6'),
        array('name'=>'6/9'),
        array('name'=>'6/12'),
        array('name'=>'6/18'),
        array('name'=>'6/24'),
        array('name'=>'6/34'),
        array('name'=>'6/60'),
      ));
   }
}