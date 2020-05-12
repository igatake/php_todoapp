<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        foreach (range(0, 2) as $num) {
            DB::table('tasks')->insert([
                'goal_id' => 1,
                'title' => "サンプルタスク {$num}",
                'status' => $num,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]); 
        }
    }
}
