<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Classroom;
use App\Models\Timeslot;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed teachers
        Teacher::create(['name' => 'Nandang, S.Ag']);
        Teacher::create(['name' => 'H. Hono, M.Pd']);
        Teacher::create(['name' => 'Jamiyah, S.Pd']);
        Teacher::create(['name' => 'Hj. Oti Wamati, S.Pd.I'])

        // Seed classrooms
        Classroom::create(['name' => '1']);
        Classroom::create(['name' => '2']);
        Classroom::create(['name' => '3']);
        Classroom::create(['name' => '4']);
        Classroom::create(['name' => '5']);
        Classroom::create(['name' => '6']);
        Classroom::create(['name' => '7']);
        Classroom::create(['name' => '8']);
        Classroom::create(['name' => '9']);
        Classroom::create(['name' => '10']);
        Classroom::create(['name' => '11']);
        Classroom::create(['name' => '12']);

        // Seed timeslots
        Timeslot::create(['start_time' => '06:45:00', 'end_time' => '07:15:00']);
        Timeslot::create(['start_time' => '07:15:00', 'end_time' => '08:00:00']);
        Timeslot::create(['start_time' => '08:00:00', 'end_time' => '08:45:00']);
        Timeslot::create(['start_time' => '08:45:00', 'end_time' => '09:25:00']);
        Timeslot::create(['start_time' => '09:25:00', 'end_time' => '10:05:00']);
        Timeslot::create(['start_time' => '10:05:00', 'end_time' => '10:20:00']);
        Timeslot::create(['start_time' => '10:20:00', 'end_time' => '11:00:00']);
        Timeslot::create(['start_time' => '11:00:00', 'end_time' => '11:40:00']);
        Timeslot::create(['start_time' => '11:40:00', 'end_time' => '12:20:00']);
        Timeslot::create(['start_time' => '12:20:00', 'end_time' => '12:50:00']);
        Timeslot::create(['start_time' => '12:50:00', 'end_time' => '13:30:00']);
        Timeslot::create(['start_time' => '13:30:00', 'end_time' => '14:10:00']);
        Timeslot::create(['start_time' => '14:10:00', 'end_time' => '14:50:00']);
    }
}
