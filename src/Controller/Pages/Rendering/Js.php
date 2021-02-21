<?php

namespace App\Controller\Pages\Rendering;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Js extends AbstractController {
    public function load($js): Response
    {
        $desiredFilepath = dirname(__FILE__) . '/../../../../templates/pages/js/' . $js;
        $content = file_get_contents($desiredFilepath);
        $jsResponse = new Response($content, 200);
        $jsResponse->headers->set('Content-Type', 'text/javascript');
        return $jsResponse;
    }
}