<?php
// src/Controller/HiveController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hive;
use App\Repository\HiveRepository;
use App\Form\CreateHiveFormType;
use App\Form\EditHiveFormType;
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
    * @Route("/hives", name="index_hives")
    */
    public function indexHives(Request $request): Response
    {
        $hives = $this->hiverepository->findAll();

        return $this->render('hives.html.twig', [
            'hive_number'=> sizeof($hives),
            'hives' => $hives,
        ]);
        
    }

    /**
    * @Route("/hives/add", name="create_hive")
    */
    public function createHive(Request $request): Response
    {
        $hives_count = $this->hiverepository->createQueryBuilder('a')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();

        $createHiveForm = $this->createForm(CreateHiveFormType::class, null);
        $createHiveForm->handleRequest($request);


        if ($createHiveForm->isSubmitted() && $createHiveForm->isValid()) {
            $hive = new Hive();
            $hive->setHiveName($createHiveForm->getData()["name"]);
            $hive->setHiveLat($createHiveForm->getData()["geo_lat"]);
            $hive->setHiveLong($createHiveForm->getData()["geo_long"]);

            $this->em->persist($hive);
            $this->em->flush();
            return $this->redirectToRoute('index_hives');
        }

        return $this->render('hives_create.html.twig', [
            'hive_number'=> $hives_count,
            'createHiveForm'=> $createHiveForm->createView(),
        ]);
        
    }

    /**
    * @Route("/hives/edit/{id}", name="edit_hive", requirements={"id"="[0-9]+"})
    */
    public function editHive(Request $request, $id): Response
    {
        $hive = $this->hiverepository->findOneBy(array('id' => $id));
        if($hive) {
            $hives_count = $this->hiverepository->createQueryBuilder('a')
                ->select('count(a.id)')
                ->getQuery()
                ->getSingleScalarResult();

            $editHiveForm = $this->createForm(EditHiveFormType::class, null, [
                'hive_name' => $hive->getName(),
                'hive_geo_lat' => $hive->getHiveLat(),
                'hive_geo_long' => $hive->getHiveLong(),
            ]);
            $editHiveForm->handleRequest($request);


            if ($editHiveForm->isSubmitted() && $editHiveForm->isValid()) {
                $hive = $this->hiverepository->findOneBy(array('id' => $id));
                $hive->setHiveName($editHiveForm->getData()["name"]);
                $hive->setHiveLat($editHiveForm->getData()["geo_lat"]);
                $hive->setHiveLong($editHiveForm->getData()["geo_long"]);

                $this->em->persist($hive);
                $this->em->flush();
                return $this->redirectToRoute('index_hives');
            }

            return $this->render('hives_edit.html.twig', [
                'hive_number'=> $hives_count,
                'hive_name'=> $hive->getName(),
                'editHiveForm'=> $editHiveForm->createView(),
            ]);
        } else {
            throw $this->createNotFoundException("La ressource n'existe pas");
        }
        
    }

    /**
    * @Route("/hives/delete/{id}", name="delete_hive", requirements={"id"="[0-9]+"})
    */
    public function deleteHive(Request $request, $id): Response
    {
        $hive = $this->hiverepository->findOneBy(array('id' => $id));
        if($hive) {
            $this->em->remove($hive);
            $this->em->flush();

            return $this->redirectToRoute('index_hives');
        } else {
            return $this->redirectToRoute('index_hives');
        }   
    }
}