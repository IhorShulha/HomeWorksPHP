<?php

/**
 * Class Bevarage
 */

class Bevarage
{
    public $cost;
    public $ingredients = [];
    public function __construct($cost, $ingredients=['coffee']) {
        $this->cost = $cost;
        if (!is_array($ingredients)) {
            $ingredients = array($ingredients);
        }
        $this->ingredients = $ingredients;
    }
    public function getCost() { return $this->cost; }
    public function getIngredients() { return $this->ingredients; }
}


/**
 * Class Coffee
 */
class Espresso
{
    public $coffee;
    public $cost;
    public $ingredients = [];

    /**
     * Coffee constructor.
     * @param Coffee $coffee
     */
    public function __construct(Bevarage $espresso)
    {
        $this->coffee = $espresso;
        $this->setCost();
        $this->setIngredients();
    }

    public function setCost()
    {
        $this->cost = $this->coffee->getCost();
    }
    public function setIngredients()
    {
        $this->ingredients = $this->coffee->getIngredients();
    }
    public function getCost()
    {
        return $this->cost;
    }
    public function getIngredients()
    {
        return $this->ingredients;
    }
    public function getSortedIngredients()
    {
        $ingredients = $this->getIngredients();
        $arr = array();
        foreach ($ingredients as $ingredient)
        {
            $arr[$ingredient] = (array_key_exists($ingredient, $arr) ? $arr[$ingredient] : 0) + 1;
        }
        return $arr;
    }
}

/**
 * Class MilkyCoffee
 */
class MilkyCoffee extends Espresso
{
    public $decorator;
    public $cost = 0.5;
    public $ingredients = ['Milk'];
    public function __construct(Espresso $decorator)
    {
        $this->decorator = $decorator;
        $this->addMilk();
    }
    public function addMilk()
    {
        $this->decorator->cost = $this->decorator->getCost() + $this->cost;
        $this->decorator->ingredients = array_merge($this->ingredients, $this->decorator->getIngredients());
    }
}

/**
 * Class СoniacCoffee
 */
class СoniacCoffee extends Espresso
{
    public $decorator;
    public $cost = 0.75;
    public $ingredients = ['Coniac'];
    public function __construct(Espresso $decorator)
    {
        $this->decorator = $decorator;
        $this->addСoniac();
    }
    public function addСoniac()
    {
        $this->decorator->cost = $this->decorator->getCost() + $this->cost;
        $this->decorator->ingredients = array_merge($this->ingredients, $this->decorator->getIngredients());
    }
}

/**
 * Class СhocolateCoffee
 */
class СhocolateCoffee extends Espresso
{
    public $decorator;
    public $cost = 0.35;
    public $ingredients = ['Chocolate'];
    public function __construct(Espresso $decorator)
    {
        $this->decorator = $decorator;
        $this->addChocolate();
    }
    public function addChocolate()
    {
        $this->decorator->cost = $this->decorator->getCost() + $this->cost;
        $this->decorator->ingredients = array_merge($this->ingredients, $this->decorator->getIngredients());
    }
}

class VanillaCoffee extends Espresso
{
    public $decorator;
    public $cost = 0.35;
    public $ingredients = ['Vanilla'];
    public function __construct(Espresso $decorator)
    {
        $this->decorator = $decorator;
        $this->addVanilla();
    }
    public function addVanilla() {
        $this->decorator->cost = $this->decorator->getCost() + $this->cost;
        $this->decorator->ingredients = array_merge($this->ingredients, $this->decorator->getIngredients());
    }
}


class Wafel extends Espresso
{
    public $decorator;
    public $cost = 0.15;
    public $ingredients = ['Wafel'];
    public function __construct(Espresso $decorator)
    {
        $this->decorator = $decorator;
        $this->addWafel();
    }
    public function addWafel() {
        $this->decorator->cost = $this->decorator->getCost() + $this->cost;
        $this->decorator->ingredients = array_merge($this->ingredients, $this->decorator->getIngredients());
    }
}

class Сookies extends Espresso
{
    public $decorator;
    public $cost = 0.11;
    public $ingredients = ['Cookie'];
    public function __construct(Espresso $decorator)
    {
        $this->decorator = $decorator;
        $this->addCookie();
    }

    public function addCookie()
    {
        $this->decorator->cost = $this->decorator->getCost() + $this->cost;
        $this->decorator->ingredients = array_merge($this->ingredients, $this->decorator->getIngredients());
    }
}

echo "<h3>Цена для Франции</h3>" . PHP_EOL;
$espresso = new Bevarage(0.51);
$decorator = new Espresso($espresso);
echo "Чистый espresso: (€" . $espresso->getCost() . ")- Cостав:" . json_encode($espresso->getIngredients()) . PHP_EOL;

$coniac = new СoniacCoffee($decorator);
$coniac->addСoniac();
echo "Эспрессо с коньяком: (€" . $decorator->getCost() . ")- Состав:" . json_encode($decorator->getSortedIngredients()) . "\n";

$wafel = new Wafel($decorator);
$wafel->addWafel();
echo "Эспрессо с коньяком и 2 вафлями: (€" . $decorator->getCost() . ")- Состав:" . json_encode($decorator->getSortedIngredients()) . "\n";

echo "<h3>Цены для Италии</h3>" . PHP_EOL;
$espresso = new Bevarage(0.71);
$decorator = new Espresso($espresso);
echo "Чистый espresso: (€" . $espresso->getCost() . ")- Cостав:" . json_encode($espresso->getIngredients()) . PHP_EOL;

$coniac = new СoniacCoffee($decorator);
$coniac->addСoniac();
echo "Эспрессо с коньяком: (€" . $decorator->getCost() . ")- Состав:" . json_encode($decorator->getSortedIngredients()) . PHP_EOL;

$cookie = new Cookies($decorator);
$wafel->addCookie();
echo "Эспрессо с коньяком и печеньем: (€" . $decorator->getCost() . ")- Состав:" . json_encode($decorator->getSortedIngredients()) . "\n";
