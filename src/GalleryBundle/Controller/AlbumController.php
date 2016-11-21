<?php

namespace GalleryBundle\Controller;

use GalleryBundle\Service\GalleryService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class AlbumController extends Controller
{
    /**
     * @Route("/rest/album", name="get_albums")
     */
    public function getAlbumsAction()
    {
        /** @var GalleryService $gallery */
        $gallery = $this->get('app.gallery');
        $albums = $gallery->getAlbumsWithLimitedImages(3);

        return new Response($this->get('app.serializer')->serialize($albums, 'json'), 200, [
            'Content-Type' => 'application/json'
        ]);
    }

    /**
     * @Route("/rest/album/{id}", name="get_album")
     */
    public function getAlbumAction($id, Request $request)
    {
        /** @var GalleryService $gallery */
        $gallery = $this->get('app.gallery');
        $album = $gallery->getAlbum($id);

        return new Response($this->get('app.serializer')->serialize($album, 'json'), 200, [
            'Content-Type' => 'application/json'
        ]);
    }
}
