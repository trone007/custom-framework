<?php
namespace Src\Repository;

use Core\EntityRepositoryConfigurator;
use Src\Model\Task;

class TaskRepository extends EntityRepositoryConfigurator
{
    /**
     * @param int $offset
     * @param string $orderBy
     * @param string $orderDirection
     * @return Task[]
     */
    public function getTaskList(int $offset, string $orderBy, string $orderDirection): array
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('t')
            ->from('Src\Model\Task', 't')
            ->setFirstResult($offset)
            ->setMaxResults(MAX_ON_PAGE)
            ->orderBy('t.' . $orderBy, $orderDirection)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return int
     */
    public function getTaskCount(): int
    {
        $qb = $this->getEntityManager()
            ->createQueryBuilder();

        return $qb
            ->select($qb->expr()->count('t'))
            ->from('Src\Model\Task', 't')
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $message
     * @return Task
     */
    public function createTask(string $username, string $email, string $message): Task
    {
        $task = new Task();
        $task->setUsername($username)
            ->setEmail($email)
            ->setText($message)
            ;

        $this->save($task);

        return $task;
    }

    /**
     * @param Task $task
     * @param string $username
     * @param string $email
     * @param string $message
     * @return Task
     */
    public function updateTask(Task $task, string $message, string $status): Task
    {
        $task->setText($message)
            ->setStatus($status)
            ->setUpdatedAt(new \DateTime())
            ;

        $this->save($task);

        return $task;
    }

    /**
     * @param Task $task
     */
    public function save(Task $task)
    {
        $this->getEntityManager()->persist($task);
        $this->getEntityManager()->flush();
    }
}