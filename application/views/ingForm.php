<div>
	<h3>Add Ingredient For Keeps</h3>
		<h4>Ingredient Type:</h4>
			<select id="type" onchange="enableItem('nameIngredient')"required>
				<option>-</option>
				<?php foreach ($types as $item): ?>
					<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
				<?php endforeach;?>
			</select>
		<div class="error" id="typeMessage"></div>
	
		<h4>Name:</h4>
			<input id="nameIngredient" disabled class="form-control" value='' onkeyup="VerifyIngredient('nameIngredient', 'nameIngredientMessage', 'type')" type="name" title="name" name="name" placeholder="name" required/>
			<div class="error" id="nameIngredientMessage"></div>
	
<button type="button" id="buttonAdd" onclick="addIngredient('nameIngredient', 'nameIngredientMessage', 'type')" disabled class="btn">Submit</button> 
<button type="button" id="removeId" class="remove" style="margin: 0px; padding: 12px;" onclick="removeIngInput(this)"></button>
</div>