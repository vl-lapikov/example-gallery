<?php

namespace GalleryBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use \Doctrine\ORM\Mapping\Entity;
use \Doctrine\ORM\Mapping\Table;
use \Doctrine\ORM\Mapping\ManyToOne;
use \Doctrine\ORM\Mapping\JoinColumn;
use \Doctrine\ORM\Mapping\Column;
use \Doctrine\ORM\Mapping\OneToMany;
use \Doctrine\ORM\Mapping\Id;
use \Doctrine\ORM\Mapping\GeneratedValue;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @Entity(repositoryClass="GalleryBundle\Repository\AlbumRepository")
 * @Table(name="album")
 *
 */
class Album
{
    /**
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue
     * @Groups({"default"})
     */
    private $id;

    /**
     * @OneToMany(targetEntity="Image", mappedBy="album")
     * @Groups({"default"})
     */
    private $images;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId( $id )
    {
        $this->id = $id;
    }

    public function getImageUrl()
    {
        return '/img/album/'.sprintf('%04d', $this->getId()).'.jpg';
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }
}
