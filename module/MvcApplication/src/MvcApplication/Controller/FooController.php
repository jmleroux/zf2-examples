<?php

namespace MvcApplication\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FooController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
