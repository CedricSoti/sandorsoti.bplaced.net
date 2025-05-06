<?php
// App/models/ProductModel.php

class ProductModel {
    public function getAllProducts(): array {
        return [
            1 => ['id'=>1,  'name'=>'Design-Stuhl',      'price'=>99,  'image'=>'stuhl.jpg'],
            2 => ['id'=>2,  'name'=>'Rattan-Lounge',     'price'=>299, 'image'=>'lounge.jpg'],
            3 => ['id'=>3,  'name'=>'Stehlampe Bambus',  'price'=>59,  'image'=>'bambuslampe.jpg'],
            4 => ['id'=>4,  'name'=>'Holztisch Natur',   'price'=>199, 'image'=>'holztisch.jpg'],
            5 => ['id'=>5,  'name'=>'Wanddeko',          'price'=>39,  'image'=>'wanddeko.jpg'],
            6 => ['id'=>6,  'name'=>'Hängematte',        'price'=>49,  'image'=>'haengematte.jpg'],
            7 => ['id'=>7,  'name'=>'Kissen Set (4 Stk.)','price'=>35,  'image'=>'kissen.jpg'],
            8 => ['id'=>8,  'name'=>'Gartenlaterne',     'price'=>19,  'image'=>'laterne.jpg'],
            9 => ['id'=>9,  'name'=>'Outdoor-Teppich',   'price'=>89,  'image'=>'teppich.jpg'],
            10=> ['id'=>10, 'name'=>'Blumentopf-Set',    'price'=>24,  'image'=>'toepfe.jpg'],
            11=> ['id'=>11, 'name'=>'Sonnenschirm',      'price'=>129, 'image'=>'sonnenschirm.jpg'],
        ];
    }

    public function getProductById(int $id): ?array {
        $all = $this->getAllProducts();
        return $all[$id] ?? null;
    }
}
