<?php

namespace GalleryBundle\Entity;
use \Doctrine\ORM\Mapping\Entity;
use \Doctrine\ORM\Mapping\Table;
use \Doctrine\ORM\Mapping\ManyToOne;
use \Doctrine\ORM\Mapping\JoinColumn;
use \Doctrine\ORM\Mapping\Column;
use \Doctrine\ORM\Mapping\OneToMany;
use \Doctrine\ORM\Mapping\Id;
use \Doctrine\ORM\Mapping\GeneratedValue;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @Entity
 * @Table(name="image")
 *
 */
class Image
{
    /**
     * @Id
     * @Column(type="integer", name="id")
     * @GeneratedValue
     * @Groups({"default"})
     */
    private $id;

    /**
     * @ManyToOne(targetEntity="Album", inversedBy="album")
     * @JoinColumn(name="album_id", referencedColumnName="id")
     */
    private $album;

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

    /**
     * @return Album
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param Album $album
     */
    public function setAlbum( $album )
    {
        $this->album = $album;
    }

    public function getImageUrl()
    {
        return '/img/image/'.sprintf('%04d', $this->getId()).'.jpg';
    }
}
