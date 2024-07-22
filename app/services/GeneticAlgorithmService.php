<?php

namespace App\Services;

use App\Models\Teacher;
use App\Models<Classroom;
use App\Models\Timeslot;
use App\Models\Schedule;

class GeneticAlgorithmService
{
    protected $populationSize = 50;
    protected $mutationRate = 0.01;
    protected $generations = 1000;

    public function run()
    {
        // Fetch data from the database
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        $timeslots = Timeslot::all();
        
        // Initialize population
        $population = $this->initializePopulation($teachers, $classrooms, $timeslots);

        for ($i = 0; $i < $this->generations; $i++) {
            // Evaluate fitness
            $fitnessScores = $this->evaluateFitness($population);
            
            // Selection
            $selected = $this->selection($population, $fitnessScores);
            
            // Crossover
            $offspring = $this->crossover($selected);
            
            // Mutation
            $this->mutation($offspring);

            // Create new population
            $population = $this->createNewPopulation($selected, $offspring);
        }

        // Save the best schedule to the database
        $bestSchedule = $this->getBestSchedule($population);
        $this->saveSchedule($bestSchedule);
    }

    protected function initializePopulation($teachers, $classrooms, $timeslots)
    {
        // Create initial random population
        $population = [];
        for ($i = 0; $i < $this->populationSize; $i++) {
            $individual = [];
            foreach ($teachers as $teacher) {
                foreach ($classrooms as $classroom) {
                    foreach ($timeslots as $timeslot) {
                        $individual[] = [
                            'teacher_id' => $teacher->id,
                            'classroom_id' => $classroom->id,
                            'timeslot_id' => $timeslot->id,
                            'day' => 'Monday' // Example day
                        ];
                    }
                }
            }
            shuffle($individual); // Randomize the order
            $population[] = $individual;
        }
        return $population;
    }

    protected function evaluateFitness($population)
    {
        // Evaluate how good each individual is
        $fitnessScores = [];
        foreach ($population as $individual) {
            // Placeholder fitness calculation
            $fitnessScores[] = $this->calculateFitness($individual);
        }
        return $fitnessScores;
    }

    protected function calculateFitness($individual)
    {
        // Implement fitness calculation logic
        // Example: minimize conflicts and respect constraints
        return rand(0, 100); // Placeholder fitness score
    }

    protected function selection($population, $fitnessScores)
    {
        // Select individuals based on fitness scores
        $selected = [];
        // Example: Select top individuals
        asort($fitnessScores);
        $bestIndices = array_keys(array_slice($fitnessScores, 0, $this->populationSize / 2, true));
        foreach ($bestIndices as $index) {
            $selected[] = $population[$index];
        }
        return $selected;
    }

    protected function crossover($selected)
    {
        // Perform crossover to create offspring
        $offspring = [];
        for ($i = 0; $i < count($selected); $i += 2) {
            if (isset($selected[$i + 1])) {
                $parent1 = $selected[$i];
                $parent2 = $selected[$i + 1];
                // Simple crossover example
                $point = rand(1, count($parent1) - 1);
                $child1 = array_merge(array_slice($parent1, 0, $point), array_slice($parent2, $point));
                $child2 = array_merge(array_slice($parent2, 0, $point), array_slice($parent1, $point));
                $offspring[] = $child1;
                $offspring[] = $child2;
            }
        }
        return $offspring;
    }

    protected function mutation(&$offspring)
    {
        // Apply mutation to the offspring
        foreach ($offspring as &$individual) {
            if (rand(0, 100) / 100 < $this->mutationRate) {
                $index1 = rand(0, count($individual) - 1);
                $index2 = rand(0, count($individual) - 1);
                $temp = $individual[$index1];
                $individual[$index1] = $individual[$index2];
                $individual[$index2] = $temp;
            }
        }
    }

    protected function createNewPopulation($selected, $offspring)
    {
        // Combine selected and offspring to create a new population
        return array_merge($selected, $offspring);
    }

    protected function getBestSchedule($population)
    {
        // Get the best schedule from the final population
        $bestIndex = array_keys($population)[0]; // Placeholder: assumes first is best
        return $population[$bestIndex];
    }

    protected function saveSchedule($schedule)
    {
        // Save the best schedule to the database
        foreach ($schedule as $entry) {
            Schedule::updateOrCreate([
                'teacher_id' => $entry['teacher_id'],
                'classroom_id' => $entry['classroom_id'],
                'timeslot_id' => $entry['timeslot_id'],
                'day' => $entry['day']
            ]);
        }
    }
}
