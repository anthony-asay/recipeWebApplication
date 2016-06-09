    <li id="child">
        <div id="formLogin" class="form">
            <div class="header">Login or <button class="btn" onclick="loadRegisterForm()">Register</button></div>
            <form action="<?php echo site_url('user/authenticate');?>" method="post">
                <ul id="formList">
                    <li>
                        <h4>Email:</h4>
                        <input id="emailLogin" class="form-control" value='' onkeyup="ValidateLoginEmail('emailLogin', 'loginEmail')" type="email" title="emailLogin" name="emailLogin" placeholder="Email" required/>
                        <div class="error" id="loginEmail"></div>
                    </li>
                    <li>
                        <h4>Password:</h4>
                        <input id="passwordLogin" class="form-control" onkeyup="VerifyInput('passwordLogin', 'loginPassword')" type="password" title="passwordLogin" name="passwordLogin" placeholder="Password" required/>
                        <div class="error" id="loginPassword"></div>
                    </li>
                </ul>
                <button type="button" id="buttonLogin" onclick="loginUser()" disabled class="btn">Login</button> 
            </form>
            
            
        </div>
    </li>
        
