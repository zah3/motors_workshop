<?php

namespace OldMotorsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RenovatedMotors
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OldMotorsBundle\Entity\RenovatedMotorsRepository")
 */
class RenovatedMotors
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="renovation_date", type="datetime")
     */
    private $renovationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="production_date", type="datetime")
     */
    private $productionDate;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=100)
     */
    private $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="mileage", type="integer")
     */
    private $mileage;

    /**
     * @var integer
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

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
     * Set name
     *
     * @param string $name
     * @return RenovatedMotors
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set renovationDate
     *
     * @param \DateTime $renovationDate
     * @return RenovatedMotors
     */
    public function setRenovationDate($renovationDate)
    {
        $this->renovationDate = $renovationDate;

        return $this;
    }

    /**
     * Get renovationDate
     *
     * @return \DateTime 
     */
    public function getRenovationDate()
    {
        return $this->renovationDate;
    }

    /**
     * Set productionDate
     *
     * @param \DateTime $productionDate
     * @return RenovatedMotors
     */
    public function setProductionDate($productionDate)
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    /**
     * Get productionDate
     *
     * @return \DateTime 
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return RenovatedMotors
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set mileage
     *
     * @param integer $mileage
     * @return RenovatedMotors
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return integer 
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return RenovatedMotors
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
