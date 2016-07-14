<div id="formRegister" class="form" style="width: 1050px; margin-left: 200px;">
	<div class="header"><h3>Add a Recipe</h3></div>
	<form action="" method="post">
		<div class="error" id="typeMessage"></div>
		<ul id="formList">
			<li>
				<h4>Name:</h4>
				<input id="nameRecipe" value='' onkeyup="VerifyRecipe('nameRecipe', 'nameRecipeMessage')" type="text" title="name" name="name" placeholder="Recipe Name" required/>
				<div class="error" id="nameRecipeMessage"></div>
			</li>
			<li>
				<h4>Recipe Type:</h4>
				<select id="typeRecipe" required onchange="enableRecipeSubmit()">
					<option>-</option>
					<?php foreach ($recipeTypes as $item): ?>
								<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
					<?php endforeach;?>
				</select>
			</li>
			<li>
				<h4 style="float: left; display: block; width:100%">Ingredients:</h4><br>
				<ul id="ingList">
					
				</ul>
				<div>
					<button style="margin: 0; margin-top: 15px;" type="button" class="btn" onclick="addIngInput('ingList')">Add Ingredient</button>
				<button style="margin: 0; margin-top: 15px; " id="buttonIngForm" type="button" class="altbtn" onclick="addIngForm('ingList', this)">If Ingredient is not available click me</button>
				</div>
				
			</li>
			<li>
				<h4 style="display: block;">Steps:</h4>
				<textarea id="stepsRecipe" onkeyup="enableRecipeSubmit()" placeholder="Write the steps of your recipe here..."></textarea>
				<div class="error" id="stepsIngredientMessage"></div>
			</li>
		</ul>
		<div class="header"><h3><button type="button" style="margin-left:15px;" id="buttonRecipe" onclick="addRecipe('nameRecipe', 'nameRecipeMessage', 'typeRecipe', 'stepsRecipe', 'ingList')" disabled class="btn">Submit Recipe</button></h3></div>
	</form>
</div>
<div id="RegisterMessage" class="message positive"></div>