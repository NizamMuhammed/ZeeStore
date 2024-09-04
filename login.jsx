import React, { useState } from "react";
import "bootstrap/dist/css/bootstrap.min.css";

function LoginForm() {
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const [errors, setErrors] = useState([]);

  const handleLogin = (e) => {
    e.preventDefault();
    let validationErrors = [];

    // Validation
    if (!username) validationErrors.push("Username is required");
    if (!password) validationErrors.push("Password is required");

    if (validationErrors.length > 0) {
      setErrors(validationErrors);
      return;
    }

    // Simulate an API call (replace this with your actual API request)
    const mockUser = { username: "testuser", password: "password" }; // Replace with real user data
    if (username === mockUser.username && password === mockUser.password) {
      // Redirect to dashboard
      alert("Login successful!");
      // Perform redirection here
    } else {
      setErrors(["Incorrect username/password."]);
    }
  };

  return (
    <div className="container">
      <div className="row">
        <div className="welcome">
          <h1>Reliance Store | JNU Branch</h1>
          <h4>Inventory Management System</h4>
        </div>
        <div className="col-md-5" style={{ left: "30%", position: "relative", marginTop: "8%" }}>
          <div className="panel panel-success">
            <div className="panel-heading">
              <h3 className="panel-title">Sign in</h3>
            </div>
            <div className="panel-body">
              <div className="message">
                {errors.length > 0 &&
                  errors.map((error, index) => (
                    <div key={index} className="alert alert-danger" role="alert">
                      {error}
                    </div>
                  ))}
              </div>

              <form className="form-horizontal" onSubmit={handleLogin}>
                <div className="form-group">
                  <label className="control-label col-sm-3" htmlFor="username">
                    Username:
                  </label>
                  <div className="col-sm-9">
                    <input type="text" className="form-control" id="username" name="username" placeholder="Username" value={username} onChange={(e) => setUsername(e.target.value)} />
                  </div>
                </div>
                <div className="form-group">
                  <label className="control-label col-sm-3" htmlFor="password">
                    Password:
                  </label>
                  <div className="col-sm-9">
                    <input type="password" className="form-control" id="password" name="password" placeholder="Password" value={password} onChange={(e) => setPassword(e.target.value)} />
                  </div>
                </div>
                <div className="form-group">
                  <div className="col-sm-offset-3 col-sm-9">
                    <button type="submit" className="btn btn-default">
                      Login
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default LoginForm;
