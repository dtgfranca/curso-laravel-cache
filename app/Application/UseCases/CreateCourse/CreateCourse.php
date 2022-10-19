<?php
namespace App\Application\UseCases\CreateCourse;


use App\Domain\Entities\Course\Course;
use App\Domain\ValueObjects\Title;
use App\UseCases\Repositories\CreateCourseRespository;

final class CreateCourse
{
    private CreateCourseRespository $courseRespository;

    public function __construct()
    {//CreateCourseRespository $courseRespository
       // $this->courseRespository = $courseRespository;
    }
    public function handle(InputBoundary $inputBoundary): OutputBoundary
    {
         $course = Course::create($inputBoundary->getName(),$inputBoundary->getDescription());
//        if (!$course) {
//            throw  new Exception('Usuario invalido');
//        }
        $name = $inputBoundary->getName();
        $description =  $inputBoundary->getDescription();
        //$course = $this->courseRespository->save(['name'=>$name, 'description'=>$description]);
        return new OutputBoundary([
            'name'=>$course->getName(),
            'description'=>$course->getDescription()
        ]);
    }

}
