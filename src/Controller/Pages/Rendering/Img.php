<?php

namespace App\Controller\Pages\Rendering;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Img extends AbstractController {
    public function load_from_base_folder($img): Response
    {
        $desiredFilepath = dirname(__FILE__) . '/../../../../templates/pages/img/' . $img;
        $content = file_get_contents($desiredFilepath);
        $cssResponse = new Response($content, 200);
        $cssResponse->headers->set('Content-Type', 'image');
        return $cssResponse;
    }

    public function load_with_folder($img_folder, $img): Response
    {
        $desiredFilepath = dirname(__FILE__) . '/../../../../templates/pages/img/' . $img_folder . '/' . $img;
        $content = file_get_contents($desiredFilepath);
        $cssResponse = new Response($content, 200);
        $cssResponse->headers->set('Content-Type', 'image');
        return $cssResponse;
    }
}