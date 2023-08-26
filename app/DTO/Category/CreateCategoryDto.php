<?php

namespace App\DTO\Category;

class CreateCategoryDto
{
    private string $title;

    private string $description;

    private int|null $parent_id;

    /**
     * @param $title
     * @param $description
     * @param $parent_id
     */
    public function __construct($title, $description, $parent_id)
    {
        $this->title = $title;
        $this->description = $description;
        $this->parent_id = $parent_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }
}
