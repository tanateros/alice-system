<?php

namespace Module\Dashboard\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pages")
 * @ORM\Entity
 */
class Pages {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(length=255)
     */
    protected $title;
    /**
     * @ORM\Column(length=255, unique=true)
     */
    protected $link;
    /**
     * @ORM\Column(length=355, name="title_SEO")
     */
    protected $titleSEO;
    /**
     * @ORM\Column(type="text")
     */
    protected $content;
    /**
     * @ORM\Column(length=1000)
     */
    protected $description;
    /**
     * @ORM\Column(length=500)
     */
    protected $keywords;
    /**
     * @ORM\Column(type="integer", length=3)
     */
    protected $weight;
    /**
     * @ORM\Column(type="datetime", name="date_create")
     */
    protected $dateCreate;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitleSEO()
    {
        return $this->titleSEO;
    }

    /**
     * @param mixed $titleSEO
     */
    public function setTitleSEO($titleSEO)
    {
        $this->titleSEO = $titleSEO;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * @param mixed $dateCreate
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}