<?php

class Category {
    private $CategoryId;
    private $Name;
    private $RoleDescription;
    private $CreatedOn;

    function __construct($CategoryId, $Name, $RoleDescription, $CreatedOn)
    {
        $this->CategoryId = $CategoryId;
        $this->Name = $Name;
        $this->RoleDescription = $RoleDescription;
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

    public function getRoleDescription()
    {
        return $this->RoleDescription;
    }

    public function setRoleDescription($RoleDescription)
    {
        $this->RoleDescription = $RoleDescription;
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
