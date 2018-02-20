<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
{
    // CHAMPS
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="string", length=50)
     * @Assert\Length(min=2, max=50)
     * @var string
     */
    private $name;
    
    /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="menus")
     * @var Collection
     */
    private $products;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=20, max=2500)
     */
    private $description;
    
     /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $price;
        
    /**
     * @ORM\ManyToMany(targetEntity="Cart", mappedBy="menus")
     * @var Collection
     */
    private $carts;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="menus")
     * @var Collection
     */
    private $tags;


    // ACTIONS
    public function __construct() {
        $this->products= new ArrayCollection();
        $this->tags= new ArrayCollection();
        $this->carts= new ArrayCollection();
    }
    
    

    
    // GETTERS
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getProducts(): Collection {
        return $this->products;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }
    
    public function getTags(): Collection {
        return $this->tags;
    }
    
    public function getCarts(): Collection {
        return $this->carts;
    }
    
    
    
    // SETTERS
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setProducts(Collection $products) {
        $this->products = $products;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }
    
     public function setTags(Collection $tags) {
        $this->tags = $tags;
        return $this;
    }

     public function setCarts(Collection $carts) {
        $this->carts = $carts;
        return $this;
    }

}
