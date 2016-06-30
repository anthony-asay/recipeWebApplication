<div id="result">

	<table class="table" id="data-table">
          <thead>
            <tr>
              <th>Recipe Type</th>
              <th>Name</th>
              <th>Rating</th>
              <th>Ingredients</th>
              <th>Link</th>
            </tr>
          </thead>
          <tbody>  
	
	<?php foreach ($recipes as $item): ?>

	 	  <tr>
             <td><?php echo $item->type; ?></td>
             <td><?php echo $item->name; ?></td>
             <td><?php echo $item->rating; ?></td>
            <td><?php echo $item->ingredients; ?></td>
            <td onclick="openRecipe(<?php echo $item->id;?>)"></td>
          </tr>
    <?php endforeach; ?>
    	</tbody>
    </table>
</div>