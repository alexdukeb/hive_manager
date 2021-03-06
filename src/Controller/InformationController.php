<?php
// src/Controller/InformationController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\InformationRepository;
use App\Repository\HiveRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class InformationController extends AbstractController
{
    private $hiverepository;
    private $informationrepository;
    private $em;

    public function __construct(EntityManagerInterface $em, InformationRepository $informationrepository, HiveRepository $hiverepository)
    {
        $this->informationrepository = $informationrepository;
        $this->hiverepository = $hiverepository;
        $this->em = $em;
    }

    /**
    * @Route("/informations", name="all_information")
    */
    public function showAllInformations(Request $request): Response
    {
        $hives_count = $this->hiverepository->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();
        $informations = $this->informationrepository->findAll();
        return $this->render('informations.html.twig', [
            'hive_number'=> $hives_count,
            'infos' => $informations,
        ]);
        
    }
}