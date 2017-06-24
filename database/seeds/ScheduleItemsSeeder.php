<?php

use Illuminate\Database\Seeder;

class ScheduleItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule_items')->insert([
            'user_id' => 1,
            'event_date_time' => '2017-09-23 00:00:00',
            'event_end_time' => '2017-09-25 00:00:00',
            'location' => 'Oak Grove, KY',
            'type'     => 'Meeting',
            'description' => 'Meet up for instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 1,
            'event_date_time' => '2017-10-23 00:00:00',
            'event_end_time' => '2017-10-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Meeting',
            'description' => 'Meet up for more instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 1,
            'event_date_time' => '2017-06-23 00:00:00',
            'event_end_time' => '2017-06-23 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Assignment',
            'description' => 'Assignment 2 die',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 2,
            'event_date_time' => '2017-10-23 00:00:00',
            'event_end_time' => '2017-10-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Meeting',
            'description' => 'Meet up for more instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 2,
            'event_date_time' => '2017-10-23 00:00:00',
            'event_end_time' => '2017-10-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Meeting',
            'description' => 'Meet up for more instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 3,
            'event_date_time' => '2017-10-23 00:00:00',
            'event_end_time' => '2017-10-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Meeting',
            'description' => 'Meet up for more instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 3,
            'event_date_time' => '2017-10-23 00:00:00',
            'event_end_time' => '2017-10-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Meeting',
            'description' => 'Meet up for more instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 3,
            'event_date_time' => '2017-10-23 00:00:00',
            'event_end_time' => '2017-10-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Meeting',
            'description' => 'Meet up for more instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 3,
            'event_date_time' => '2017-10-23 00:00:00',
            'event_end_time' => '2017-10-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Meeting',
            'description' => 'Meet up for more instructional design',
        ]);
        DB::table('schedule_items')->insert([
            'user_id' => 1,
            'course_id' => 1,
            'event_date_time' => '2017-08-25 00:00:00',
            'event_end_time' => '2017-08-25 00:00:00',
            'location' => 'Clarksville, TN',
            'type'     => 'Assignment 1 Due',
            'description' => 'Meet up for more instructional design',
        ]);


    }
}
