<?php
 namespace App\Entity;

 use Doctrine\Common\Collections\ArrayCollection;
 use Doctrine\Common\Collections\Collection;

 class Search {
     private $minSurface;
     private $minBedrooms;
     private $postalCode;
     private $animals;
     private $equipements;

     /**
      * Get the value of minSurface
      */
     public function getMinSurface()
     {
          return $this->minSurface;
     }

     /**
      * Set the value of minSurface
      */
     public function setMinSurface(int $minSurface): self
     {
          $this->minSurface = $minSurface;

          return $this;
     }

     /**
      * Get the value of minBedrooms
      */
     public function getMinBedrooms()
     {
          return $this->minBedrooms;
     }

     /**
      * Set the value of minBedrooms
      */
     public function setMinBedrooms(int $minBedrooms): self
     {
          $this->minBedrooms = $minBedrooms;

          return $this;
     }

     /**
      * Get the value of postalCode
      */
     public function getPostalCode()
     {
          return $this->postalCode;
     }

     /**
      * Set the value of postalCode
      */
     public function setPostalCode($postalCode): self
     {
          $this->postalCode = $postalCode;

          return $this;
     }

     /**
      * Get the value of animals
      */
     public function getAnimals()
     {
          return $this->animals;
     }

     /**
      * Set the value of animals
      */
     public function setAnimals(bool $animals): self
     {
          $this->animals = $animals;

          return $this;
     }

     /**
      * Get the value of equipements
      */ 
     public function getEquipements()
     {
          return $this->equipements;
     }

     /**
      * Set the value of equipements
      *
      * @return  self
      */ 
     public function setEquipements($equipements)
     {
          $this->equipements = $equipements;

          return $this;
     }
     }

     