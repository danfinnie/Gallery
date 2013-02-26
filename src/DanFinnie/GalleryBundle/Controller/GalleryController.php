<?php

namespace DanFinnie\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function showCategoriesAction()
    {
        return $this->render('DanFinnieGalleryBundle:Default:index.html.twig', array('name' => "yes"));
    }

    public function showCategoryAction($id)
    {
        return $this->render('DanFinnieGalleryBundle:Default:index.html.twig', array('name' => "yes"));
    }

    public function showPieceAction($id)
    {
        return $this->render('DanFinnieGalleryBundle:Default:index.html.twig', array('name' => "yes"));
    }
}
