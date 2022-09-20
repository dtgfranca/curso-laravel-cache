<?php
namespace App\Application\Usecases\CreateCourse;

use App\UseCases\Repositories\CreateCourseRespository;

final class CreateCourse
{
    private CreateCourseRespository $courseRespository;

    public function __construct(CreateCourseRespository $courseRespository)
    {
        $this->courseRespository = $courseRespository;
    }
    public function handle(InputBoundary $inputBoundary): OutputBoundary
    {
        $name = $inputBoundary['name'];
        $description =  $inputBoundary['name'];
        $course = $this->courseRespository->save(['name'=>$name, 'description'=>$description]);
        return new OutputBoundary([
            'name'=>$course->getName(),
            'description'=>$course->getDescription()
        ]);
    }

}
