<div class="form" style="width: 700px;">
		<h1>Search for a Recipe by type or by ingredients</h1>
		<h4 class="form-label">Recipe Type:</h4>
			<select id="type" class="form-label" onchange="">
				<option>-</option>
				<?php foreach ($types as $item): ?>
					<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
				<?php endforeach;?>
			</select>
		<h4>Ingredients:</h4>
		<ul id="ingList">
					
		</ul>
		<div><button style="margin: 0; margin-top: 15px;" type="button" class="altbtn" onclick="addIngSearch('ingList')">Add Ingredient</button></div>
		<div><h3><button style="margin: 0; margin-top: 15px; font-size:25px;" type="button" class="btn" onclick="searchForRecipe('ingList', 'type')">Search</button></h3></div>
</div>