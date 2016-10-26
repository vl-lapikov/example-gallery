<?php

namespace GalleryBundle\Controller;

use GalleryBundle\Service\GalleryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AlbumController extends Controller
{
    /**
     * @Route("/album", name="get_albums")
     */
    public function getAlbumsAction()
    {
        /** @var GalleryService $gallery */
        $gallery = $this->get('app.gallery');
        $albums = $gallery->getAlbums();

        return new Response($this->get('serializer')->serialize($albums, 'json'));
    }

    /**
     * @Route("/album/{id}", name="get_album")
     */
    public function getAlbumAction($id, Request $request)
    {
        /** @var GalleryService $gallery */
        $gallery = $this->get('app.gallery');
        $album = $gallery->getAlbum($id);

        return new Response($this->get('serializer')->serialize($album, 'json'));
    }
}
