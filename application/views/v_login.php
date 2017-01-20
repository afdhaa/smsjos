<html>
<head>
<style type="text/css">
body{
background:url(assets/img/akakom.jpg)no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;}
  
.wrap {
  max-width: 280px;
  padding: 40px 40px;  
  font-family: "helvetica";
  padding: 20px;
}

form {
  width: 350px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -184px 0px 0px -155px;
  background: rgba(0,0,0,0.20);
  padding: 20px 30px;
  border-radius: 5px;
  box-shadow: 0px 1px 0px rgba(0,0,0,0.3),inset 0px 1px 0px rgba(255,255,255,0.04)
}

form h3 {
  font-size: 28px;
  font-weight: 640;
  text-align: center;
  margin-bottom: 10px;
  color: #e7e7e7;
}

input,
button {
	display: block;
	width: 100%;
	margin: 20px auto;
	border: none;
	padding: 10px;
    font-size: 15px;
}

button {
	background-color: #16aa56;
	color: #fff;
	font:600 14px sans-serif;
	width: 100%
}

button:hover {
	background-color: #17cb58;
}

.alert {
  background-position: 10px 50%;
  color:#e7e7e7;
  font:750 21px helvetica;
}

input {
	background: #eee;
	padding-left: 40px;
}

input[name="username"] {
	background: transparent url("http://oi59.tinypic.com/e7mr0z.jpg") no-repeat;
	background-position: 10px 50%;
	color:#e7e7e7;
	font:750 21px helvetica;
}

input[name="password"] {
	background: transparent url("http://oi60.tinypic.com/os92eo.jpg") no-repeat;
	background-position: 10px 50%;
	color:#e7e7e7;
	font:750 21px helvetica;
}

.forgot{
  margin-top: 30px;
  display: block;
  font-size: 11px;
  text-align: center;
  font-weight: bold;
  color: #e7e7e7;
  text-decoration: none;
}
.forgot:hover {
  margin-top: 30px;
  display: block;
  font-size: 11px;
  text-align: center;
  font-weight: bold;
  color: #6d7781;
}
</style>
<link href="<?php echo base_url('assets/css')?>/bootstrap.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body> 

<div class="container">
<div class="wrap">

  <form action="login/cek" method="post">
<?php if($this->session->flashdata('message') !== null){
        echo $this->session->flashdata('message'); 
    }
    ?>
      <h3>Login</h3>
      <input type="text" name="username" placeholder="Username" required autofocus>
      <input type="password" name="password" placeholder="Password"  required>
      <button type="submit">Log In</button>
      <a class='forgot' href='#'>Forgot your password??</a>
    </div>
  </form>
</div>
  
</div>
</body>
</html>