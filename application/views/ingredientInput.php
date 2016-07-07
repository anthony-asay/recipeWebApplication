<div>
		<h5 class="form-label">Ingredient Type:</h5>
		<select id="ingT0" onchange="getIngredients('ingT0', 'ingI0')">
			<option>-</option>
			<?php foreach ($types as $item): ?>
				<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
			<?php endforeach;?>
		</select>
	
		<h5 class="form-label">Ingredient:</h5>
		<select id="ingI0">	
			<option>-</option>
		</select>
	
		<h5 class="form-label">Measurement (optional):</h5>
		<select id="ingM0">
			<option>-</option>
			<?php foreach ($measurements as $item): ?>
				<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
			<?php endforeach;?>
		</select>
	
		<h5 class="form-label">Quantity:</h5>
		<input style="width: 40px;" id="ingQ0" type="number">
	
<button type="button" class="remove" style="margin: 0px; padding: 12px;" onclick="removeIngInput(this)"></button>
</div>