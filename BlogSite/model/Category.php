<?php

class Category {
    private $CategoryId;
    private $Name;
    private $CategoryDescription;
    private $CreatedOn;

    function __construct($CategoryId, $Name, $CategoryDescription, $CreatedOn)
    {
        $this->CategoryId = $CategoryId;
        $this->Name = $Name;
        $this->CategoryDescription = $CategoryDescription;
        $this->CreatedOn = $CreatedOn;
    }

    public function getCategoryId()
    {
        return $this->CategoryId;
    }

    public function setCategoryId($CategoryId)
    {
        $this->CategoryId = $CategoryId;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getCategoryDescription()
    {
        return $this->CategoryDescription;
    }

    public function setCategoryDescription($CategoryDescription)
    {
        $this->CategoryDescription = $CategoryDescription;
    }

    public function getCreatedOn()
    {
        return $this->CreatedOn;
    }

    public function setCreatedOn($CreatedOn)
    {
        $this->CreatedOn = $CreatedOn;
    }
}
