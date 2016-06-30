<button class="btn" onclick="loadLoginForm()">Logout</button>
<div id="logList" class="form">
		<div class="header"><button class="btn" onclick="loadEditForm()">Edit Account Info</button></div>
			<ul id="logs">
				<?php foreach ($logs as $log): ?>
					<li>
						<table>
							<tr>
								<th>Medium</th>
								<th>Title</th>
								<th>Rating</th>
								<th>Time Spent</th>
								<th>Date Finished</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<tr><p></p>
								<th><?php echo htmlspecialchars($item['medium'])?></th>
								<th><?php echo htmlspecialchars($item['title'])?></th>
								<th><?php echo htmlspecialchars($item['rating'])?></th>
								<th><?php echo htmlspecialchars($item['hoursSpent'])?></th>
								<th><?php echo htmlspecialchars($item['date_finished'])?></th>
								<th><button class="link" onclick="function(<?php echo $item['id'] ?>)">Edit</button></th>
								<th><button class="link" onclick="function(<?php echo $item['id'] ?>)">Delete</button></th>
							</tr>
						</table>
					</li>
				<?php endforeach; ?>
			</ul>
		<button class="btn" onclick="loadNewLog()">Log new media</button>

</div>