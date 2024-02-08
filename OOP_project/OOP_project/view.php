<?php

class View {
    public function listRecipes($recipes) {
        echo "<h2>Recipe List</h2>";

        if (empty($recipes)) {
            echo "<p>No recipes found.</p>";

            echo "<p><a href='?action=new'>Add Recipe</a></p>";

        } else {
            echo "<ul>";
            foreach ($recipes as $recipe) {
                echo "<li>";
                echo "<strong>ID:</strong> {$recipe->getID()}, ";
                echo "<strong>Name:</strong> {$recipe->getName()}, ";
                echo "<strong>Directions:</strong> {$recipe->getDirections()}";

                $ingredients = $recipe->getIngredients();
                if (!empty($ingredients)) {
                    echo "<br><strong>Ingredients:</strong> " . implode(", ", $ingredients);
                }

                echo " [<a href='?action=edit&id={$recipe->getID()}'>Edit</a>] ";
                echo " [<a href='?action=delete&id={$recipe->getID()}'>Delete</a>] ";

                echo "</li>";
            }
            echo "</ul>";
        }
    }

    public function newRecipe() {
        echo "<h2>Create a New Recipe</h2>";
        echo "<form action='?action=insert' method='post'>";
        echo "<label for='name'>Recipe Name:</label>";
        echo "<input type='text' name='name' required><br>";
        echo "<label for='directions'>Directions:</label>";
        echo "<textarea name='directions' required></textarea><br>";
        echo "<label for='ingredients'>Ingredients (comma-separated):</label>";
        echo "<input type='text' name='ingredients'><br>";
        echo "<input type='submit' value='Create Recipe'>";
        echo "</form>";
    }

    public function showEditPage(Recipe $recipe) {
        echo "<h2>Edit Recipe</h2>";
        echo "<form action='?action=update' method='post'>";
        echo "<input type='hidden' name='id' value='{$recipe->getID()}'>";
        echo "<label for='name'>Recipe Name:</label>";
        echo "<input type='text' name='name' value='{$recipe->getName()}' required><br>";
        echo "<label for='directions'>Directions:</label>";
        echo "<textarea name='directions' required>{$recipe->getDirections()}</textarea><br>";
        echo "<label for='ingredients'>Ingredients (comma-separated):</label>";
        echo "<input type='text' name='ingredients' value='" . implode(", ", $recipe->getIngredients()) . "'><br>";
        echo "<input type='submit' value='Update Recipe'>";
        echo "</form>";
    }
}
?>