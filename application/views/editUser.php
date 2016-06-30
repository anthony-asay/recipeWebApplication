<button class="btn" onclick="loadLoginForm()">Logout</button>
	<div id="formRegister" class="form" onload="loadUserData()">
		<div class="header"><button class="btn" onclick="loadUserLog()">Return to Log</button></div>
		<form action="" method="post">
			<div id="RegisterMessage" class="message positive"></div>
			<ul id="formList">
				<li>
					<h4>User Name:</h4>
					<input id="userName" class="form-control" type="text" onkeyup="VerifyName('userName', 'nameMessage')" title="name" name="name" placeholder="Name" required/>
					<div class="error" id="nameMessage"></div>
				</li>
				<li>
					<h4>Email:</h4>
					<input id="userEmail" class="form-control" value='' onkeyup="ValidateEmail('userEmail', 'emailMessage')" type="email" title="email" name="email" placeholder="Email" required/>
					<div class="error" id="emailMessage"></div>
				</li>
				<li>
					<h4>Password:</h4>
					<input id="userPassword" class="form-control" onkeyup="ValidatePassword('userPassword', 'passwordMessage')" type="password" title="password" name="password" placeholder="Password" required/>
					<div class="error" id="passwordMessage"></div>
				</li>
				<li>
					<h4>Confirm Password:</h4>
					<input id="confirmPassword" class="form-control" type="password" onkeyup="verifyPassword('confirmPassword', 'confirmMessage')" title="confirm" name="confirm" placeholder="Confirm Password" required/>
					<div class="error" id="confirmMessage"></div>
				</li>
				<li>
					<h4>Birth Date:</h4>
					<input id="birthDate" class="form-control" type="date" onkeyup="VerifyDate('birthDate', 'dateMessage')" title="birthday" name="birthday" placeholder="Birthday" required/>
					<div class="error" id="dateMessage"></div>
				</li>
			</ul>
			<button type="button" id="buttonRegister" onclick="editUser()" class="btn">Submit Changes</button> 
		</form>
	</div>
	

