<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        $basket = Basket::getBasket();
        //var_dump ($basket);
        //die();
        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

}