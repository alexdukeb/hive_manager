<?php 
// src/Entity/Information.php
namespace App\Entity;

use App\Repository\InformationRepository;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InformationRepository::class)
 */
class Information
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

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

   
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

    public function getCreationDateTime()
    {
        $datetime = $this->created_at->format('d F Y \à H\Hi');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Décember');
        $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        return str_replace($english_months, $french_months, $datetime);
        
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
