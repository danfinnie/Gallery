<?php

namespace DanFinnie\GalleryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Piece
 */
class Piece
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $picture;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Piece
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set picture
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $picture
     * @return Piece
     */
    public function setPicture(\Application\Sonata\MediaBundle\Entity\Media $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getPicture()
    {
        return $this->picture;
    }
    /**
     * @var \DanFinnie\GalleryBundle\Entity\Category
     */
    private $category;


    /**
     * Set category
     *
     * @param \DanFinnie\GalleryBundle\Entity\Category $category
     * @return Piece
     */
    public function setCategory(\DanFinnie\GalleryBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \DanFinnie\GalleryBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}