<?php

class AuthorisationRole {
    private $RoleId;
    private $Name;
    private $RoleDescription;

    function __construct($RoleId, $Name, $RoleDescription, $CreatedOn)
    {
        $this->RoleId = $RoleId;
        $this->Name = $Name;
        $this->RoleDescription = $RoleDescription;
        $this->CreatedOn = $CreatedOn;
    }

    public function getRoleId()
    {
        return $this->RoleId;
    }

    public function setRoleId($RoleId)
    {
        $this->RoleId = $RoleId;
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
    private $CreatedOn;
}
