<?php

class RecipeIngredients {
    private $model;
    private $riId;
    private $riIngredients;
    private $recipe;

    public function __construct($model, $ingredient, $recipe) {
        $this->model = $model;
        $this->riIngredients = $ingredient;
        $this->recipe = $recipe;
    }

    public function setIngredient($ingredient, $recipe) {
        $this->riIngredients = $ingredient;
        $this->recipe = $recipe;
    }

    public function getIngredient($recipeID) {
        return $this->model->getIngredientsForRecipe($recipeID);
    }
}
?>