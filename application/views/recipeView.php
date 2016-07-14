<div class="form">
	<h2>Recipe Name: <label class="results"><?php echo $recipe->name; ?></label></h2>
	<h2>Type of Recipe: <label class="results"><?php echo $recipe->type; ?></label></h2>
	<h2>Ingredients List:</h2>
	<?php foreach ($recipe->ingredients as $ingredient): ?>
		<ul>
			<li class="ingredientLi results"><?php echo htmlspecialchars($ingredient->ingredient);?></li>
			<li class="ingredientLi results"><?php echo htmlspecialchars($ingredient->quantity);?></li>
			<li class="ingredientLi results"><?php echo htmlspecialchars($ingredient->measure);?></li>
		</ul>
	<?php endforeach; ?>
	<h2>Recipe Steps:</h2>
	<h3 class="results"><?php echo $recipe->steps;?></h3>
</div>