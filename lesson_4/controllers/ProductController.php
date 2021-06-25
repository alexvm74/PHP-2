<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        //$this->useLayout = false; // отключение главного Layout
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $catalog = Product::getAll();
        $page = $_GET['page'] ?? 0;
        //$catalog = Product::getLimit(($page + 1) * PRODUCT_PER_PAGE);
        //var_dump($catalog);
        //die();

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $good = Product::getOne($id);
        echo $this->render('card', [
            'good' => $good
        ]);
    }
}
