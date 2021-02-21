<?php

namespace App\Controller\Pages\Rendering;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Css extends AbstractController {
    public function load($css): Response
    {
        $desiredFilepath = dirname(__FILE__) . '/../../../../templates/pages/css/' . $css;
        $content = file_get_contents($desiredFilepath);
        $cssResponse = new Response($content, 200);
        $cssResponse->headers->set('Content-Type', 'text/css');
        return $cssResponse;
    }
}