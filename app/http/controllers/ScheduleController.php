<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeneticAlgorithmService;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    protected $geneticAlgorithmService;

    public function __construct(GeneticAlgorithmService $geneticAlgorithmService)
    {
        $this->geneticAlgorithmService = $geneticAlgorithmService;
    }

    public function index()
    {
        $schedules = Schedule::all(); // Retrieve all schedules from the database
        return view('schedule.index', compact('schedules'));
    }

    public function generateSchedule()
    {
        $this->geneticAlgorithmService->run(); // Run the genetic algorithm to generate the schedule
        return redirect()->route('schedule.index');
    }
}
