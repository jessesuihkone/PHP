<?php
class Recipe {
    private $recipeID;
    private $recipeName;
    private $recipeDirections;
    private $ingredients = [];

    public function __construct($name, $directions) {
        $this->recipeName = $name;
        $this->recipeDirections = $directions;
    }

    public function setIngredient($ingredient) {
        $this->ingredients[] = $ingredient;
    }

    public function setName($name) {
        $this->recipeName = $name;
    }

    public function setDirections($directions) {
        $this->recipeDirections = $directions;
    }

    public function getName() {
        return $this->recipeName;
    }

    public function getDirections() {
        return $this->recipeDirections;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function getID() {
        return $this->recipeID;
    }
}

?>