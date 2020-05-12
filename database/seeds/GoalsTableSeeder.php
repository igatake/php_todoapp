<?php

use Illuminate\Database\Seeder;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['レポート', '就活', 'プログラミング'];
        $user = DB::table('users')->first();
        $format = 'Y-m-d';
        $dates = ['2020-5-4', '2020-5-5', '2020-5-25'];


        foreach ($titles as $key => $title) {
            DB::table('goals')->insert([
                'title' => $title,
                'due_date' => DateTime::createFromFormat($format, $dates[$key]),
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
