<?php

use App\DailyTask;
use Illuminate\Database\Seeder;

class DailyTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $tasks = [
        '1h php',
        '1h mysql',
        '1h math',
        '1.5h excercise',
        '4h bimabd',
      ];

     // $true_or_false = [true, false];

      foreach ($tasks as $task) {
        DailyTask::create(
          [
            'user_id' => 1,
            'title' => $task,
            'is_enable' => [true, false][rand(0,1)],
          ]
        );
      }
    }
}
