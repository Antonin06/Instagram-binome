

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/a58b6117a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/lucas.css">
  <title>Instagram</title>
</head>
<body>
    <form class="sign_up shadow p-3" action="./data/sign_up_register.php" method="POST">
        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="validationDefault01">First name</label>
            <input type="text" name="firstname" class="form-control" id="validationDefault01" placeholder="First name" value="" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="validationDefault02">Last name</label>
            <input type="text" name="lastname" class="form-control" id="validationDefault02" placeholder="Last name" value="" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="validationDefault02">E-mail</label>
            <input type="text" name="mail" class="form-control" id="validationDefault02" placeholder="email" value="" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="validationDefaultUsername">username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
              </div>
              <input type="text" name="username" class="form-control" id="validationDefaultUsername" placeholder="username" aria-describedby="inputGroupPrepend2" required>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationDefault04">Phone</label>
            <input type="tel" name="phone" class="form-control" id="validationDefault04" placeholder="phone" required>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
            <label class="form-check-label" for="invalidCheck2">
              Agree to terms and conditions
            </label>
          </div>
        </div>
        <button class="btn btn-success col-md-12" type="submit">Sign Up</button>
     </form>
    
</body>
</html>