<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/create", name="app_create")
     */
    public function create()
    {
        return $this->render('admin/create.html.twig');

    }

    /**
     * @Route("/show", name="app_show")
     */
    public function show()
    {
        return $this->render('admin/show.html.twig');

    }    
}
