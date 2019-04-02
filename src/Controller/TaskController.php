<?php
namespace Src\Controller;

use Core\Controller;
use Core\ValidateHelper;
use Doctrine\ORM\EntityManagerInterface;
use Src\Exceptions\ForbiddenException;
use Src\Model\Task;
use Src\Service\CredentialsServiceInterface;
use Src\Service\TaskServiceInterface;
use Twig\Environment;

class TaskController extends Controller
{
    private $taskService;
    private $credentialsService;

    /**
     * TaskController constructor.
     * @param Environment $twig
     * @param EntityManagerInterface $entityManager
     * @param TaskServiceInterface $taskService
     * @param CredentialsServiceInterface $credentialsService
     */
    public function __construct(
        Environment $twig,
        EntityManagerInterface $entityManager,
        TaskServiceInterface $taskService,
        CredentialsServiceInterface $credentialsService
    )
    {
        parent::__construct($twig, $entityManager);
        $this->taskService = $taskService;
        $this->credentialsService = $credentialsService;
    }

    /**
     * list of tasks
     */
    public function index()
    {
        $page = ValidateHelper::validatePage($this->request->getParameter('page', 1));

        $orderBy =  $this->request->getParameter('orderBy', 'id');
        $orderDirection =  $this->request->getParameter('orderDirection', 'DESC');

        $this->render('list', [
            'tasks' => $this->taskService->getTaskList($page, $orderBy, $orderDirection),
            'pages' => $this->taskService->getTaskPagesCount(),
            'currentPage' => $page
        ]);
    }

    /**
     * create task
     */
    public function create()
    {
        $username = $this->request->postParameter('username');
        $email = $this->request->postParameter('email');
        $message = $this->request->postParameter('message');

        $this->taskService->createTask($username, $email, $message);
        $this->redirect('/');
    }

    /**
     * edit task
     * @throws ForbiddenException
     */
    public function edit()
    {
        if(!$this->credentialsService->hasCredentials()) {
            throw new ForbiddenException();
        }

        $id = $this->request->getParameter('id');
        $task = $this->taskService->getTask($id);

        if($this->request->isPost()) {
            $parameters = [
                'message' => $this->request->postParameter('message'),
                'status' => $this->request->postParameter('status')
            ];

            $this->taskService->editTask($task, $parameters);

            $this->redirect('/');
        }

        $this->render('edit', [
            'task' => $task,
            'statuses' => Task::STATUSES
        ]);
    }
}