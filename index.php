<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Google Drive Uploader</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>

<meta name="google-signin-client_id" content="57064433868-ebkvuv5druld2jah3h8hmt5l71ennfqb.apps.googleusercontent.com">

<script>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  var id_token = googleUser.getAuthResponse().id_token;

  document.getElementById('loginForm').style.display = "none";

  document.getElementById('profileinfo').style.display = "block";
  document.getElementById('label_name').innerHTML = profile.getName();
  document.getElementById('label_email').innerHTML = profile.getEmail();
  document.getElementById("imageid").src=profile.getImageUrl();

}

</script>
</head>

<body>

<div class="container" style="margin-top: 100px" id="loginForm">
    <h2 class="text-center">Login</h2>
    <div class="row justify-content-center">

        <div class="col-md-9">
            <form method="post" action="server.php" name="loginform">
                Username:<br/>
                <input type="text" name="username" class="form-control" placeholder="Username" required><br/>
                Password:<br/>
                <input type="password" name="password"class="form-control" placeholder="Password" required><br/>

                <input type="submit" name="submit" value="Login"  class="btn btn-success"/>
                <br/><br/>
                Or you can sign in using google<br/>
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
            </form>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 100px; display:none;" id="profileinfo">
    <h2 class="text-center">Profile</h2><br/>
    <div class="row justify-content-center">

        <div class="col-md-9">
            <div class="text-center"> <img src="" id="imageid" /></div><br/>
            Name:<br/>
            <label id="label_name" class="form-control"></label><br/>
            Email:<br/>
            <label id="label_email" class="form-control"></label><br/>

            <input type="button" value="Drive Uploader" onclick="window.location.href='drive.php'" class="btn btn-success"/>
        </div>
    </div>
</div>




</body>