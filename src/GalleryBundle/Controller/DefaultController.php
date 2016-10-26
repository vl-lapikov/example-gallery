<?php

namespace GalleryBundle\Controller;

use GalleryBundle\Service\GalleryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /** @var GalleryService $gallery */
        $gallery = $this->get('app.gallery');
        $albums = $gallery->getAlbums();

        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            ''
        ));
    }
}
