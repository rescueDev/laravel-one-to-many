<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Employee;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 20)
            ->make()
            ->each(function ($task) {
                $employee = Employee::inRandomOrder()->first();

                $task->employee()->associate($employee); //associo l' employee al task
                $task->save(); //salvo il task nel db
            });
    }
}
