<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\TestFixture\func;

class CourseRepository
{
    private Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getAll()
    {
        return Cache::rememberForever('courses', function(){
            return $this->course
                ->with('modules.lessons')
                ->get();
        });
    }

    public function store(array $data)
    {
        Cache::forget('courses');
        return $this->course->create($data);
    }

    public function getCourseByUuid(string $identify)
    {
        return $this->course->where('uuid', $identify)
            ->with('modules.lessons')
            ->firstOrFail();
    }
    public function deleteByUuid(string $identify)
    {
        $course = $this->getCourseByUuid($identify);
        $course->delete();
    }

    public function updateCouseByUuid(string $identify, array $data)
    {
        Cache::forget('courses');
        return $this->getCourseByUuid($identify)->update($data);
    }


}
