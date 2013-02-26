<?php

namespace DanFinnie\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function showCategoriesAction()
    {
    	$CategoriesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Category');
    	$categories = $CategoriesRepo->findAll(array(), array("title"));

        return $this->render('DanFinnieGalleryBundle:Gallery:category_list.html.twig', array('categories' => $categories));
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
