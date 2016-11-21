<?php

namespace GalleryBundle\Service;

use Doctrine\ORM\EntityManager;
use GalleryBundle\Entity\Album;
use GalleryBundle\Repository\AlbumRepository;

class GalleryService
{
    const DEFAULT_IMAGE_LIMIT = 10;

    private $em;

    /**
     * @var AlbumRepository
     */
    private $albumRepository;

    public function __construct(EntityManager $em) {
        $this->em = $em;
        $this->albumRepository = $em->getRepository(Album::class);
    }

    /**
     * @return array
     */
    public function getAlbums()
    {
        return $this->albumRepository->findAll();
    }

    /**
     * @param int $limit
     *
     * @return array
     */
    public function getAlbumsWithLimitedImages($limit = self::DEFAULT_IMAGE_LIMIT)
    {
        return $this->albumRepository->getAlbumsWithLimitedImages($limit);
    }

    /**
     * @param $id
     *
     * @return null|object
     */
    public function getAlbum($id)
    {
        return $this->albumRepository->find($id);
    }
}
