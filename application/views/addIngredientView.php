
	<div id="formRegister" class="form">
		<div class="header">Register or <button class="btn" onclick="loadLoginForm()">Return to Login</button></div>
		<form action="" method="post">
			<ul id="formList">
				<li>
					<h4>Ingredient Type:</h4>
					<select required>
						<option>-</option>
						<?php foreach ($types as $item): ?>
							<option value="<?php echo $item->name;?>"><?php echo $item->name;?></option>
						<?php endforeach;?>
					</select>
					<div class="error" id="typeMessage"></div>
				</li>
				<li>
					<h4>Name:</h4>
					<input id="nameIngredient" class="form-control" value='' onkeyup="ValidateIngredient('nameIngredient', 'nameIngredientMessage')" type="name" title="name" name="name" placeholder="name" required/>
					<div class="error" id="nameIngredientMessage"></div>
				</li>
			</ul>
			<button type="button" id="buttonRegister" onclick="registerUser()" disabled class="btn">Submit</button> 
		</form>
	</div>
	<div id="RegisterMessage" class="message positive"></div>