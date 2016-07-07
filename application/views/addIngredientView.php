
	<div id="formRegister" class="form">
		<div class="header"><h3>Add or <button class="btn" onclick="loadHome()">Return Home</button></h3></div>
		<form action="" method="post">
			<ul id="formList">
				<li>
					<h4>Ingredient Type:</h4>
					<select id="type" onchange="enableItem('nameIngredient')"required>
						<option>-</option>
						<?php foreach ($types as $item): ?>
							<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
						<?php endforeach;?>
					</select>
					<div class="error" id="typeMessage"></div>
				</li>
				<li>
					<h4>Name:</h4>
					<input id="nameIngredient" disabled class="form-control" value='' onkeyup="VerifyIngredient('nameIngredient', 'nameIngredientMessage', 'type')" type="name" title="name" name="name" placeholder="name" required/>
					<div class="error" id="nameIngredientMessage"></div>
				</li>
			</ul>
			<button type="button" id="buttonAdd" onclick="addIngredient('nameIngredient', 'nameIngredientMessage', 'type')" disabled class="btn">Submit</button> 
		</form>
	</div>
	<div id="RegisterMessage" class="message positive"></div>