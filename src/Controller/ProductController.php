<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    private readonly array $products;
    public function __construct(){
        $this->products = [
            1=>['id' => 1, 'name' => 'Product 1', 'price' => 100, 'description'=>'This is the description of product 1'],
            2=>['id' => 2, 'name' => 'Product 2', 'price' => 200, 'description'=>'This is the description of product 2'],
            3=>['id' => 3, 'name' => 'Product 3', 'price' => 300, 'description'=>'This is the description of product 3'],
            4=>['id' => 4, 'name' => 'Product 4', 'price' => 400, 'description'=>'This is the description of product 4'],
            5=>['id' => 5, 'name' => 'Product 5', 'price' => 500, 'description'=>'This is the description of product 5'],
            6=>['id' => 6, 'name' => 'Product 6', 'price' => 600, 'description'=>'This is the description of product 6']
        ];
    }
    #[Route('/products', name: 'app_products')]
    public function Products(): Response
    {
        return $this->render('product/product_catalog.html.twig', [
            'products' => $this->products,
        ]);
    }

    #[Route('/products/{id}', name: 'app_product_show')]
    public function GetById($id){
        if(array_key_exists($id, $this->products) == false){
            throw $this->createNotFoundException('Product not found');
        }

        $product = $this->products[$id];
        
        return $this->render('product/product_details.html.twig',[
            'product' => $product
        ]);
    }
}
