<div id="userHub">
<button class="btn" type="button" onclick="">Add Log</button>
<button class="btn" type="button" onclick="">Add Log</button>
<button class="btn" type="button" onclick="">Add Log</button>
<?php foreach ($logs as $log): ?>

		<table style="width:100%">
		 	<tr>
			    <td>Date</td>
			    <td>Time</td> 
			    <td>Title</td>
			    <td>Medium</td>
			    <td>Rating</td>
		  	</tr>
		  	<tr>
			    <td><?php echo $log['date_finished']; ?></td>
			    <td><?php echo $log['hoursSpent']; ?></td> 
			    <td><?php echo $log['title']; ?></td>
			    <td><?php echo $log['medium']; ?></td>  
			    <td><?php echo $log['rating']; ?></td> 
		  	</tr>
		</table>
<?php endforeach; ?>
</div>