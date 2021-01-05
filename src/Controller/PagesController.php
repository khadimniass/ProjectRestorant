<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PublicationRepository;


class PagesController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(Request $request, PublicationRepository $publicationrepository)
    {

        $publications= $publicationrepository->findBy([],['createdAt'=>'DESC']);
        return $this->render('pages/home.html.twig', compact('publications'));
    }
}
