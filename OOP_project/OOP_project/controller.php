<?php

class Controller {
    private $model;
    private $view;

    public function __construct(Model $model, View $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function index() {
        $this->showAll();
    }

    public function newRecipe() {
        $this->view->newRecipe();
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $directions = $_POST['directions'] ?? '';
            $ingredients = isset($_POST['ingredients']) ? explode(',', $_POST['ingredients']) : [];

            $newRecipe = $this->model->addRecipe($name, $directions);

            if ($newRecipe) {
                foreach ($ingredients as $ingredient) {
                    $newRecipe->setIngredient(trim($ingredient));
                }
            }
        }

        $this->showAll();
    }

    public function delete($id) {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id !== false) {
            $this->model->deleteRecipe($id);
        }

        $this->showAll();
    }

    public function edit($id) {
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id !== false) {
            $recipe = $this->model->getRecipe($id);

            $this->view->showEditPage($recipe);
        } else {

            $this->showAll();
        }
    }

    public function update() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $directions = $_POST['directions'] ?? '';
            $ingredients = isset($_POST['ingredients']) ? explode(',', $_POST['ingredients']) : [];

            $updatedRecipe = $this->model->getRecipe($id);
            $updatedRecipe->setName($name);
            $updatedRecipe->setDirections($directions);

            $updatedRecipe->setIngredients($ingredients);

            $this->model->updateRecipe($updatedRecipe);
        }

        $this->showAll();
    }

    public function showAll() {
        $recipes = $this->model->getRecipes();

        $this->view->listRecipes($recipes);
    }

}
?>