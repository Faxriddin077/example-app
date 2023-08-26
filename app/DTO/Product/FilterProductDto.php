<?php

namespace App\DTO\Product;

class FilterProductDto
{
    private string|null $search;

    private int|null $status;

    private int|null $category_id;

    private mixed $date;

    /**
     * @param $search
     * @param $status
     * @param $category_id
     * @param $date
     */
    public function __construct($search, $status, $category_id, $date)
    {
        $this->search = $search;
        $this->status = $status;
        $this->category_id = $category_id;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
}
