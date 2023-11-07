<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('shop/index.html.twig', []);
    }
    
    #[Route('/shop-single', name: 'shop-single')]
    public function indexShopSingle(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('shop/shop-singleindex.html.twig', []);
    }
}
