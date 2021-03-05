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
     * @ORM\Column(type="float")
     */
    private $geo_lat;

    /**
     * @ORM\Column(type="float")
     */
    private $geo_long;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHiveLat(): ?int
    {
        return $this->geo_lat;
    }

    public function getHiveLong(): ?int
    {
        return $this->geo_long;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setHiveLat($lat)
    {
        $this->geo_lat = $lat;
    }
    public function setHiveLong($long)
    {
        $this->geo_long = $long;
    }
}
