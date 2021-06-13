<?php

class Product
{
    public $name;
    public $price;
    public $quantity;
    public $status;

    public function __construct($name = '', $price = 0, $quantity = 0, $status = '')
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->status = $status;
    }

    public function description()
    {
        echo "******************************************************************************<br>";
        echo "Название: " . $this->name . "<br>";
        echo "Цена: " . $this->price . " руб.<br>";
        echo "Количество: " . $this->quantity . "<br>";
        echo "Статус: " . $this->status . "<br>";
    }
}

class Auto extends Product
{
    public $type;
    public $color;
    public $equipment;
    public $age;
    public $state;

    public function __construct(
        $name = '',
        $price = 0,
        $quantity = 0,
        $status = '',
        $type = '',
        $color = '',
        $equipment = '',
        $age = 0,
        $state = 1
    ) {
        parent::__construct($name, $price, $quantity, $status);
        $this->type = $type;
        $this->color = $color;
        $this->equipment = $equipment;
        $this->age = $age;
        if ($state >= 0 && $state <= 1)  $this->state = $state;
        else $this->state = 1;
    }

    public function description()
    {
        parent::description();
        echo "Тип: " . $this->type . "<br>";
        echo "Цвет: " . $this->color . "<br>";
        echo "Комплектация: " . $this->equipment . "<br>";
        echo "Возраст в годах: " . $this->age . "<br>";
        echo "Состояние: " . $this->state . "<br>";
        $this->price *= $this->state;
        echo "Цена {$this->name}, с учётом состояния \"{$this->state}\", равна {$this->price} руб.<br>";
    }

    public function nPrice(Product $target)
    {
        $target->price *= $target->quantity;
        echo "Цена партии {$target->name} из {$target->quantity}шт., равна {$target->price} руб.<br>";
        $target->price /= $target->quantity;
    }

    public function pricePlusOption(Auto $auto, AutoOption $option)
    {
        $auto->price += $option->price * $option->quantity;
        echo "Цена {$auto->name} с доп. опцией ({$option->name}, {$option->quantity}шт.) равна {$auto->price} руб.<br>";
    }
}

class AutoOption extends Product
{
    public $target;

    public function __construct($name = '', $price = 0, $quantity = 0, $status = '', $target = '')
    {
        parent::__construct($name, $price, $quantity, $status);
        $this->target = $target;
    }

    public function description()
    {
        parent::description();
        echo "Для авто: " . $this->target . "<br>";
    }
}


echo "<h2>Описание продуктов:</h2>";

$petrol = new Product('АИ-92', '45', 1, 'В наличии');
$petrol->description();

$option1 = new AutoOption('Сигнализация с автозапуском', 23000, 1, 'доступно', 'Веста');
$option1->description();

$granta = new Auto('Гранта', 668000, 1, 'Резерв', 'седан', 'синий', 'люкс', 3, 0.5);
$granta->description();

$vesta = new Auto('Веста', 927000, 3, 'В наличии', 'универсал', 'белый', 'комфорт');
$vesta->description();
$vesta->nPrice($vesta);
$vesta->pricePlusOption($vesta, $option1);

echo "******************************************************************************<br>";
echo "<h4>task: 3-5</h4>";

class A
{
    public function foo()
    { // метод "foo" класса "A"
        static $x = 0; // статическая переменная "x" принадлежит классу "A"
        echo ++$x; // сначала приращение "x", потом вывод
    }
}

$a1 = new A(); // создание объекта "a1" как экземпляра класса "A"
$a2 = new A(); // создание объекта "a2" как экземпляра класса "A"
$a1->foo(); // x=1 (приращение "x" класса A)
$a2->foo(); // x=2 (приращение "x" класса A)
$a1->foo(); // x=3 (приращение "x" класса A)
$a2->foo(); // x=4 (приращение "x" класса A)

echo "<br>";

class A1
{
    public function foo()
    {
        static $x = 0; // статическая переменная "x" принадлежит классу "A1"
        echo ++$x;
    }
}

class B1 extends A1
{
} // новая статическая переменная "x" принадлежит классу "B" как наследнику класса A1

$a1 = new A1();
$b1 = new B1();
$a1->foo(); // x=1 (приращение "x" класса A1)
$b1->foo(); // x=1 (приращение "x" класса B1)
$a1->foo(); // x=2 (приращение "x" класса A1)
$b1->foo(); // x=2 (приращение "x" класса B1

echo "<br>";

class A2 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B2 extends A2 {
}
$a1 = new A2; // нет скобок после названия класса
$b1 = new B2; // нет скобок после названия класса
$a1->foo(); // x=1 (приращение "x" класса A2)
$b1->foo(); // x=1 (приращение "x" класса B2)
$a1->foo(); // x=2 (приращение "x" класса A2)
$b1->foo(); // x=2 (приращение "x" класса B2)