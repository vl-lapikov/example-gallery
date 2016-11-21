<?php

namespace GalleryBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @package GalleryBundle\Repository
 */
class AlbumRepository extends EntityRepository
{
    const DEFAULT_IMAGE_LIMIT = 10;

    /**
     * @param int $imageLimit
     *
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getAlbumsWithLimitedImages($imageLimit = self::DEFAULT_IMAGE_LIMIT)
    {
        $this->getEntityManager()->getConnection()->query("set @num = 1; set @album = '';");

        $rsm = new ResultSetMappingBuilder($this->getEntityManager());
        $rsm->addRootEntityFromClassMetadata('GalleryBundle\Entity\Album', 'album');
        $rsm->addJoinedEntityFromClassMetadata('GalleryBundle\Entity\Image', 'image', 'album', 'images', ['id' => 'image_id']);

        $query = $this->getEntityManager()->createNativeQuery("SELECT ".$rsm->generateSelectClause()."
            FROM album 
            LEFT JOIN(
                SELECT id, album_id, @num := if(@album = album_id, @num + 1, 1) as row_number, @album := album_id as dummy 
                FROM image 
                ORDER BY album_id
            ) AS image ON album.id = image.album_id 
            WHERE image.row_number <= ?;", $rsm);
        $query->setParameter(1, $imageLimit);

        return $query->getResult();
    }
}
