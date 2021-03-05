<?php
// src/Controller/HiveController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HiveRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HiveController extends AbstractController
{
    private $hiverepository;
    private $em;

    public function __construct(EntityManagerInterface $em, HiveRepository $hiverepository)
    {
        $this->hiverepository = $hiverepository;
        $this->em = $em;
    }

    /**
    * @Route("/hives", name="all_hive")
    */
    public function showAllHives(Request $request): Response
    {
        $hives = $this->hiverepository->findAll();
        return $this->render('hives.html.twig', [
            'hive_number'=> sizeof($hives),
            'hives' => '$hives',
        ]);
        
    }
}