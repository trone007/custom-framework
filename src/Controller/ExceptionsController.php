<?php
namespace Src\Controller;

use Core\Controller;

class ExceptionsController extends Controller
{
    /**
     * render page 404
     */
    public function page404()
    {
        $this->render('404');
    }

    /**
     * render page 403
     */
    public function page403()
    {
        $this->render('403');
    }

    /**
     * render page 405
     */
    public function page405()
    {
        $this->render('405');
    }
}