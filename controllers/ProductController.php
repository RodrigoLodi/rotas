<?php

class ProductController
{
    public function index()
    {
        //Pegar dados do BD
        $products = [
            ['id' => 1, 'name' => 'Produto 1', 'description' => 'Descrição do Produto 1', 'price' => 100.00],
            ['id' => 2, 'name' => 'Produto 2', 'description' => 'Descrição do Produto 2', 'price' => 200.00],
            ['id' => 3, 'name' => 'Produto 3', 'description' => 'Descrição do Produto 3', 'price' => 300.00],
        ];

        // Passando a variável $products para a view
        require_once __DIR__ . '/../views/produtos/index.php';
    }

    public function show($id)
    {
        // Definindo um produto manualmente para fins de teste
        $product = ['id' => $id, 'name' => 'Produto ' . $id, 'description' => 'Descrição do Produto ' . $id, 'price' => ($id * 100)];

        // Passando a variável $product para a view
        require_once __DIR__ . '/../views/produtos/show.php';
    }
}
