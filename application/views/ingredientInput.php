<div>
		<h5 class="form-label">Ingredient Type:</h5>
		<select id="<?php echo $T;?>" onchange="getIngredients('<?php echo $T;?>', '<?php echo $I;?>')">
			<option>-</option>
			<?php foreach ($types as $item): ?>
				<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
			<?php endforeach;?>
		</select>
	
		<h5 class="form-label">Ingredient:</h5>
		<select id="<?php echo $I;?>">	
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