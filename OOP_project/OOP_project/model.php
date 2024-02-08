<?php

class Model {
    private $pdo;

        public function __construct($db_host, $db_name, $db_user, $db_password) {
            try {
                $this->pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    
        private function createRecipeTable() {
            $sql = "CREATE TABLE IF NOT EXISTS Recipe (
                recipeID INT PRIMARY KEY AUTO_INCREMENT,
                recipeName VARCHAR(255) NOT NULL,
                recipeDirections TEXT
            )";
    
            $this->pdo->exec($sql);
        }
    
        private function createRecipeIngredientsTable() {
            $sql = "CREATE TABLE IF NOT EXISTS RecipeIngredients (
                riId INT PRIMARY KEY AUTO_INCREMENT,
                riIngredients VARCHAR(255) NOT NULL,
                recipe INT,
                FOREIGN KEY (recipe) REFERENCES Recipe(recipeID)
            )";
    
            $this->pdo->exec($sql);
        }
    

    public function getRecipes() {
        try {
            $sql = "SELECT * FROM Recipe";
            $stmt = $this->pdo->query($sql);
            $recipes = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $recipe = new Recipe($row['recipeName'], $row['recipeDirections']);
                $recipe->recipeID = $row['recipeID'];

                $recipe->setIngredients($this->getIngredientsForRecipe($row['recipeID']));

                $recipes[] = $recipe;
            }

            return $recipes;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getRecipe($recipeID) {
        try {
            $sql = "SELECT * FROM Recipe WHERE recipeID = :recipeID";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':recipeID', $recipeID, PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $recipe = new Recipe($row['recipeName'], $row['recipeDirections']);
                $recipe->recipeID = $row['recipeID'];

                $recipe->setIngredients($this->getIngredientsForRecipe($row['recipeID']));

                return $recipe;
            } else {
                return null; // Recipe not found
            }
        } catch (PDOException $e) {
            return null;
        }
    }

    public function addRecipe($name, $directions) {
        try {
            $sql = "INSERT INTO Recipe (recipeName, recipeDirections) VALUES (:name, :directions)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':directions', $directions, PDO::PARAM_STR);
            $stmt->execute();

            $recipeID = $this->pdo->lastInsertId();

            return $this->getRecipe($recipeID);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function deleteRecipe($recipeID) {
        try {
            $this->deleteRecipeIngredients($recipeID);

            $sql = "DELETE FROM Recipe WHERE recipeID = :recipeID";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':recipeID', $recipeID, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function updateRecipe(Recipe $recipe) {
        try {
            $sql = "UPDATE Recipe SET recipeName = :name, recipeDirections = :directions WHERE recipeID = :recipeID";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $recipe->getName(), PDO::PARAM_STR);
            $stmt->bindParam(':directions', $recipe->getDirections(), PDO::PARAM_STR);
            $stmt->bindParam(':recipeID', $recipe->getID(), PDO::PARAM_INT);
            $stmt->execute();

            $this->updateRecipeIngredients($recipe);

            return $stmt->rowCount();
        } catch (PDOException $e) {
            return 0;
        }
    }

        public function getIngredientsForRecipe($recipeID) {
            try {
                $sql = "SELECT riIngredients FROM RecipeIngredients WHERE recipe = :recipeID";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':recipeID', $recipeID, PDO::PARAM_INT);
                $stmt->execute();
    
                $ingredients = [];
    
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $ingredients[] = $row['riIngredients'];
                }
    
                return $ingredients;
            } catch (PDOException $e) {
                return [];
            }
        }
}
?>