<?php
namespace Src\Model;

use Doctrine\ORM\Annotation as ORM;

/**
 * @ORM\Entity(repositoryClass="ImageRepository")
 * @ORM\Table(name="image")
 **/
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $referenceName;


    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $realName;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Image
     */
    public function setId(int $id): Image
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getReferenceName(): string
    {
        return $this->referenceName;
    }

    /**
     * @param string $referenceName
     * @return Image
     */
    public function setReferenceName(string $referenceName): Image
    {
        $this->referenceName = $referenceName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRealName(): string
    {
        return $this->realName;
    }

    /**
     * @param string $realName
     * @return Image
     */
    public function setRealName(string $realName): Image
    {
        $this->realName = $realName;
        return $this;
    }

}