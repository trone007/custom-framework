<?php
namespace Core;

use Doctrine\ORM\EntityManagerInterface;
use Http\Request;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

abstract class Controller
{
    private $vars=[];
    protected $request;
    private $twig;
    protected $entityManager;

    public function __construct(Environment $twig, EntityManagerInterface $entityManager)
    {
        $this->request = Request::getInstance();
        $this->twig = $twig;
        $this->entityManager = $entityManager;

    }

    /**
     * rendering template
     * @param $filename
     * @param array $variables
     */
    public function render($filename, $variables = [])
    {
        extract($this->vars);

        try {
            $className = (new \ReflectionClass($this))->getShortName();

            $path = sprintf('%s/%s.html.twig',
                ucfirst(str_replace('Controller', '', $className)),
                $filename);

            echo $this->twig->render($path, $variables);
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        } catch (\ReflectionException $e) {
        }

    }

    public function redirect()
    {
    }

    private function secureInputData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secureFormData($form)
    {
        foreach ($form as $key => $value)
        {
            $form[$key] = $this->secureInputData($value);
        }
    }
}
