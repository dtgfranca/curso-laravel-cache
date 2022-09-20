<?php
namespace App\Domain\Entities;
use App\Domain\ValueObjects\Title;

final class Course
{
    private Title $name;
    private string $description;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Course
     */
    public function setName(string $name): Course
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Course
     */
    public function setDescription(string $description): Course
    {
        $this->description = $description;
        return $this;
    }

}
