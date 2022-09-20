<?php
namespace App\Application\Usecases\CreateCourse;

final class OutputBoundary
{
    public string $name;
    public string $description;

    public function __construct(array $params)
    {
        $this->name =  $params['name']?? null;
        $this->description = $params['description']?? null;
    }
}
