<?php 
// src/Entity/Hive.php
namespace App\Entity;

use App\Repository\HiveRepository;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HiveRepository::class)
 */
class Hive
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Hive")
     */
    private $hive;

    /**
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @ORM\Column(type="float")
     */
    private $temperature;

    /**
     * @ORM\Column(type="float")
     */
    private $humidity;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHiveId()
    {
        return $this->hive->getId();
    }

    public function getHiveName()
    {
        return $this->hive->getName();
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }
    public function getHumidity()
    {
        return $this->humidity;
    }

    public function setHive($hive)
    {
        $this->hive = $hive;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function setTemperature($temp)
    {
        $this->temperature = $temp;
    }
    public function setHumidity($hum)
    {
        $this->humidity = $hum;
    }
}
