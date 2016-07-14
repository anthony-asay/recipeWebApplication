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
	
<button type="button" class="remove" style="margin: 0px; padding: 12px;" onclick="removeIngInput(this)"></button>
</div>