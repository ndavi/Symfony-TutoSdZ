<?php

// src/Sdz/BlogBundle/Controller/BlogController.php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;

class BlogController extends Controller {

    public function indexAction() {
        return $this->redirect($this->generateUrl("oc_platform_home"));
    }

}
