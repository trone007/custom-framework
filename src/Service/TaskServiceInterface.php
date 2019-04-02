<?php
namespace Src\Service;

use Src\Model\Task;

interface TaskServiceInterface
{
    /**
     * @param string $username
     * @param string $email
     * @param string $message
     */
    public function createTask(string $username, string $email, string $message): void;

    /**
     * @param Task $task
     * @param $params
     * @return Task
     */
    public function editTask(Task $task, array $params = []): Task;

    /**
     * @param int $page
     * @param string $orderBy
     * @param string $orderDirection
     * @return array
     */
    public function getTaskList($page = 0, $orderBy = 'id', $orderDirection = 'ASC'): array;

    /**
     * @return int
     */
    public function getTaskPagesCount(): int;

    /**
     * @param int $id
     * @return Task
     */
    public function getTask(int $id): Task;
}