<?php
namespace Src\Service;

use Core\ValidateHelper;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\Query\QueryException;
use Src\Model\Task;
use Src\Repository\TaskRepository;
use Src\Exceptions\WrongParametersException;

class TaskService implements TaskServiceInterface
{
    /** @var TaskRepository  */
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $message
     * @throws WrongParametersException
     */
    public function createTask(string $username, string $email, string $message): void
    {
        if(empty($username) || empty($email) || empty($message)) {
            throw new WrongParametersException();
        }
        $this->taskRepository->createTask($username, $email, $message);
    }

    /**
     * @param int $page
     * @param string $orderBy
     * @param string $orderDirection
     * @return array
     */
    public function getTaskList($page = 1, $orderBy = 'id', $orderDirection = 'DESC'): array
    {
        $page =  ValidateHelper::validatePage($page);
        $orderDirection = ValidateHelper::validateOrderDirection($orderDirection);

        $offset = ($page - 1) * MAX_ON_PAGE;
        try {
            $result = $this->taskRepository->getTaskList($offset, $orderBy, $orderDirection);
        } catch (QueryException $e) {
            $result = [];
        }

        return $result;
    }

    /**
     * @param int $id
     * @return Task
     * @throws WrongParametersException
     */
    public function getTask(int $id): Task
    {
        if(!$id){
            throw new WrongParametersException();
        }
        /** @var Task $task */
        $task = $this->taskRepository->find($id);

        if(!$task) {
            throw new EntityNotFoundException();
        }

        return $task;
    }

    public function getTaskPagesCount(): int
    {
        return ceil($this->taskRepository->getTaskCount() / MAX_ON_PAGE);
    }

    /**
     * @param Task $task
     * @param $params
     * @return Task
     * @throws WrongParametersException
     */
    public function editTask(Task $task, array $params = []): Task
    {
        if(!in_array($params['status'], Task::STATUSES)) {
            throw new WrongParametersException();
        }

        return $this->taskRepository->updateTask(
            $task,
            $params['message'],
            $params['status']
        );
    }
}