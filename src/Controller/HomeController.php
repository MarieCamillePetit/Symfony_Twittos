<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://animechan.vercel.app/api/random");
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        $obj = json_decode($data, true);
        curl_close($curl);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'quote' => $obj,
        ]);
    }
}
