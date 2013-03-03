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
            'grid' => $this->getGrid($categories, 'dan_finnie_gallery_category_page'),
        ));
    }

    public function showCategoryAction($id)
    {
        $CategoriesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Category');
        $PiecesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Piece');

        $Category = $CategoriesRepo->find($id);
        $pieces = $PiecesRepo->findAll(array("category" => $Category), array("order"));

        return $this->render('DanFinnieGalleryBundle:Gallery:grid_display.html.twig', array(
            'title' => $Category->getTitle(),
            'grid' => $this->getGrid($pieces, 'dan_finnie_gallery_piece_page'),
        ));
    }

    public function showPieceAction($id)
    {
        $PiecesRepo = $this->get('doctrine')->getRepository('DanFinnieGalleryBundle:Piece');
        $Piece = $PiecesRepo->find($id);

        return $this->render('DanFinnieGalleryBundle:Gallery:piece.html.twig', array('piece' => $Piece));
    }

    /**
     * Given an array of objects and routes, generate an array suitable for passing
     * in as the "grid" for grid_display.html.twig.
     * 
     * The elemens in $ary must respond to the getId() and getTitle() methods.  The route
     * must have an id parameter to put the result of getId().
     */
    private function getGrid($ary, $route) {
        $Router = $this->get('router');

        return array_map(function($elem) use ($Router, $route) {
            return array(
                "title" => $elem->getTitle(),
                "path" => $Router->generate($route, array('id' => $elem->getId())),
            );
        }, $ary);
    }
}
