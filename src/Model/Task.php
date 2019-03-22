<?php
namespace Src\Model;

use Doctrine\ORM\Annotation as ORM;

/**
 * @ORM\Entity(repositoryClass="TaskRepository")
 * @ORM\Table(name="task")
 **/
class Task
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Src\Model\User",
     *     inversedBy="tasks"
     * )
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    private $user;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $text;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     * @var boolean
     */
    private $isActive;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Task
     */
    public function setId(int $id): Task
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Task
     */
    public function setUser(User $user): Task
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Task
     */
    public function setText(string $text): Task
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}