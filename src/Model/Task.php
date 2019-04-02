<?php
namespace Src\Model;

use Doctrine\ORM\Annotation as ORM;

/**
 * @ORM\Entity(repositoryClass="TaskRepository")
 * @ORM\Table(name="task")
 **/
class Task
{
    const STATUSES = [
        'NEW' => 'NEW',
        'IN_PROGRESS' => 'IN_PROGRESS',
        'CLOSED' => 'CLOSED'
    ];
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
     * @ORM\Column(name="status", type="string")
     * @var string
     */
    private $status;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $email;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->status = self::STATUSES['NEW'];
    }

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
    public function setCreatedAt(\DateTime $createdAt): Task
    {
        $this->createdAt = $createdAt;
        return $this;
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
     * @return Task
     */
    public function setUpdatedAt(\DateTime $updatedAt): Task
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Task
     */
    public function setUsername(string $username): Task
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Task
     */
    public function setEmail(string $email): Task
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function isStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Task
     */
    public function setStatus(string $status): Task
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusAsString(string $status = null): string
    {
        $status = $status ?? $this->status;

        switch ($status) {
            case self::STATUSES['NEW']:
                return 'New';
                break;
            case self::STATUSES['IN_PROGRESS']:
                return 'In progress';
                break;
            case self::STATUSES['CLOSED']:
                return 'Closed';
                break;
        }
    }


}