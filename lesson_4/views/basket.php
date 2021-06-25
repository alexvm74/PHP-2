<h2>Корзина</h2>

<?php
//var_dump($basket);
?>

<?php foreach ($basket as $item):?>
    <hr>
    <div>
        <h3><?=$item['name']?></h3>
        <p><?=$item['description']?></p>
        <p>price: <?=$item['price']?>, count: <?=$item['count']?></p>
        <button>Купить</button>
    </div>
    
<?php endforeach;?>