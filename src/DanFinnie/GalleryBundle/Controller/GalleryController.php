<?php

namespace DanFinnie\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    public function showCategoriesAction()
    {
        $Router = $this->get('router');
    	$CategoriesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Category');
    	$categories = $CategoriesRepo->findAll(array(), array("title"));

        return $this->render('DanFinnieGalleryBundle:Gallery:grid_display.html.twig', array(
            'title' => "Zackerman's Gallery",
            'grid' => array_map(function($Category) use ($Router) {
                return array(
                    "title" => $Category->getTitle(),
                    "path" => $Router->generate('dan_finnie_gallery_category_page', array('id' => $Category->getId())),
                );
            }, $categories),
        ));
    }

    public function showCategoryAction($id)
    {
        $Router = $this->get('router');
        $CategoriesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Category');
        $PiecesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Piece');

        $Category = $CategoriesRepo->find($id);
        $pieces = $PiecesRepo->findAll(array("category" => $Category), array("order"));

        return $this->render('DanFinnieGalleryBundle:Gallery:grid_display.html.twig', array(
            'title' => $Category->getTitle(),
            'grid' => array_map(function($Piece) use ($Router) {
                return array(
                    "title" => $Piece->getTitle(),
                    "path" => $Router->generate('dan_finnie_gallery_piece_page', array('id' => $Piece->getId())),
                );
            }, $pieces),
        ));
    }

    public function showPieceAction($id)
    {
        $PiecesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Piece');
        $Piece = $PiecesRepo->find($id);

        return $this->render('DanFinnieGalleryBundle:Gallery:piece.html.twig', array('piece' => $Piece));
    }
}
