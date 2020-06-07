<?php

namespace App\Controller;

use App\Entity\Portfolio;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function homepage()
    {

        $portfolios = $this->getDoctrine()->getRepository(Portfolio::class)->findAll();
        dump($portfolios);
        return $this->render('default/homepage.html.twig', [
            'portfolios' => $portfolios
        ]);
    }
}
