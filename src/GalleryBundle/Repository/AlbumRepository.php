<?php

namespace GalleryBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @package GalleryBundle\Repository
 */
class AlbumRepository extends EntityRepository
{
    const DEFAULT_IMAGE_LIMIT = 10;

    /**
     * @param int $imageLimit
     */
    public function getAlbumsWithLimitedAmountImages( $imageLimit = self::DEFAULT_IMAGE_LIMIT)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
    }
}
