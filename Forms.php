<?php
class Forms{


	function __construc(){
	
	}

	public function Signup(){
		return '<div class="container">
		<h2>User Account Creation Form</h2>
	              <form method="POST">
                        <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                </form>
        </div>';
	}


	public function Login(){
	return '<div class="container">
                <h2>User Login Form</h2>
                <form method="POST">
                        <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                </form>
        </div>';
	
	}

	public function ServeSignup(){
		return "ServeSignup function called..........";
	}

	public function ServeLogin(){
		return "ServeLogin function called..........";
	}



}
?>
