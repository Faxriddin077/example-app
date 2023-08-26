<?php

namespace App\DTO\Product;

class CreateProductDto
{
    private string $name;

    private int $price;

    private int $status;

    private int $category_id;

    private $main_image;

    private array $images;

    /**
     * @param $name
     * @param $price
     * @param $status
     * @param $category_id
     * @param $main_image
     * @param $images
     */
    public function __construct($name, $price, $status, $category_id, $main_image, $images)
    {
        $this->name = $name;
        $this->price = $price;
        $this->status = $status;
        $this->category_id = $category_id;
        $this->main_image = $main_image;
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @return mixed
     */
    public function getMainImage()
    {
        return $this->main_image;
    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }
}
