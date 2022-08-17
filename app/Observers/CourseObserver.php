<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Str;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     *
     * @param  \App\Models\Course  $course
     * @return void
     */
    public function creating(Course $course)
    {
        $course->uuid=(string) \Str::uuid();
    }

}
