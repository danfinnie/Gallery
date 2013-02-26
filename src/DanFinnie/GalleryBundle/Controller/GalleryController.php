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
        $CategoriesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Category');
        $PiecesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Piece');

        $Category = $CategoriesRepo->find($id);
        $pieces = $PiecesRepo->findAll(array("category" => $Category), array("order"));

        return $this->render('DanFinnieGalleryBundle:Gallery:category.html.twig', array(
            'pieces' => $pieces,
            'category' => $Category
        ));
    }

    public function showPieceAction($id)
    {
        $PiecesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Piece');
        $Piece = $PiecesRepo->find($id);

        return $this->render('DanFinnieGalleryBundle:Gallery:piece.html.twig', array('piece' => $Piece));
    }
}
