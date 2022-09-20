<?php
namespace App\Application\Usecases\CreateCourse;

final class InputBoundary
{
    private string $name;
    private string $description;

    public function __construct(array $params)
    {
        $this->name =  $params['name']?? null;
        $this->description = $params['description']?? null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }



}
