<?php

class Article {
    private $ArticleId;
    private $CategoryId;
    private $UserId;
    private $PostTitle;
    private $CreatedOn;
    private $Content;
    private $RoleId;
    private $Author;
    private $CategoryName;

    function __construct($ArticleId, $CategoryId, $UserId, $PostTitle, $CreatedOn, $Content, $RoleId)
    {
        $this->ArticleId = $ArticleId;
        $this->CategoryId = $CategoryId;
        $this->UserId = $UserId;
        $this->PostTitle = $PostTitle;
        $this->CreatedOn = $CreatedOn;
        $this->RoleId = $RoleId;
        $this->Content = $Content;
    }

    public function getArticleId()
    {
        return $this->ArticleId;
    }

    public function setArticleId($ArticleId)
    {
        $this->ArticleId = $ArticleId;
    }

    public function getCategoryId()
    {
        return $this->CategoryId;
    }

    public function setCategoryId($CategoryId)
    {
        $this->CategoryId = $CategoryId;
    }

    public function getUserId()
    {
        return $this->UserId;
    }

    public function setUserId($UserId)
    {
        $this->UserId = $UserId;
    }

    public function getPostTitle()
    {
        return $this->PostTitle;
    }

    public function setPostTitle($PostTitle)
    {
        $this->PostTitle = $PostTitle;
    }

    public function getCreatedOn()
    {
        return $this->CreatedOn;
    }

    public function setCreatedOn($CreatedOn)
    {
        $this->CreatedOn = $CreatedOn;
    }

    public function getContent()
    {
        return $this->Content;
    }

    public function setContent($Content)
    {
        $this->Content = $Content;
    }

    public function getRoleId()
    {
        return $this->RoleId;
    }

    public function setRoleId($RoleId)
    {
        $this->RoleId = $RoleId;
    }

    public function getAuthor()
    {
        return $this->Author;
    }

    public function setAuthor($AuthorName)
    {
        $this->Author = $AuthorName;
    }

    public function getCategoryName()
    {
        return $this->CategoryName;
    }

    public function setCategoryName($CategoryName)
    {
        $this->CategoryName = $CategoryName;
    }
}

