<div id="recipeList" class="form" style="width: 80%; margin: auto;">
			<ul id="rList">
				
					<li>
						<table>
							<tr>
								<th>Type of Recipe</th>
								<th>Name</th>
								<th>Ingredient List</th>
								<th>Rating</th>
							</tr>
							<?php foreach ($recipes as $item): ?>
							<tr><p></p>
								
								<td><?php echo htmlspecialchars($item->type)?></td>
								<td><button class="btn" onclick="loadRecipePage(<?php echo $item->id;?>)"><?php echo htmlspecialchars($item->name)?></button></td>
								<td>
									
									<?php foreach ($item->ingredients as $ingredient): ?>
									<ul>
										<li class="ingredientLi"><?php echo htmlspecialchars($ingredient->ingredient);?></li>
										<li class="ingredientLi"><?php echo htmlspecialchars($ingredient->quantity);?></li>
										<li class="ingredientLi"><?php echo htmlspecialchars($ingredient->measure);?></li>
									</ul>
									<?php endforeach; ?>
									
								</td>
								<td><p></p>
									<div class="stars">
            <input class="star star-5" <?php if($item->rating == 5){echo 'checked';} ?> onclick="rateRecipe(<?php echo $item->id;?>, '5', this)" id="star5<?php echo $item->id;?>" type="radio" name="<?php echo $item->name;?>"/>
            <label class="star star-5" for="star5<?php echo $item->id;?>"></label>
            <input class="star star-4" <?php if($item->rating < 5){echo 'checked';} ?> onclick="rateRecipe(<?php echo $item->id;?>, '4', this)" id="star4<?php echo $item->id;?>" type="radio" name="<?php echo $item->name;?>"/>
            <label class="star star-4" for="star4<?php echo $item->id;?>"></label>
            <input class="star star-3" <?php if($item->rating < 4){echo 'checked';} ?> onclick="rateRecipe(<?php echo $item->id;?>, '3', this)" id="star3<?php echo $item->id;?>" type="radio" name="<?php echo $item->name;?>"/>
            <label class="star star-3" for="star3<?php echo $item->id;?>"></label>
            <input class="star star-2" <?php if($item->rating < 3){echo 'checked';} ?> onclick="rateRecipe(<?php echo $item->id;?>, '2', this)" id="star2<?php echo $item->id;?>" type="radio" name="<?php echo $item->name;?>"/>
            <label class="star star-2" for="star2<?php echo $item->id;?>"></label>
            <input class="star star-1" <?php if($item->rating < 2){echo 'checked';} ?> onclick="rateRecipe(<?php echo $item->id;?>, '1', this)" id="star1<?php echo $item->id;?>" type="radio" name="<?php echo $item->name;?>"/>
            <label class="star star-1" for="star1<?php echo $item->id;?>"></label>
        </div>
								</td>
							</tr>
							<?php endforeach; ?>
						</table>
					</li>
				
			</ul>
</div>