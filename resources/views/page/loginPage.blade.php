<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="../style/UI/home1.css" /> -->
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="{{asset('UI/home.css')}}" />
  <link rel="stylesheet" href="{{asset('UI/login.css')}}" />
  <style type="text/css">
    select{
      display: block;
      
    }
    .cont h2{
      margin-top: 0;
    }
  </style>
</head>

<body>
  <p class="tip"></p>
<div class="cont">
  <form id="form" action="login" method="post">
    @csrf
  <div class="form sign-in">
    <h2>Chào mừng bạn quay trở lại,</h2>
    <label>
      <span>Usename</span>
      <input required type="text" name="user" />
    </label>
    <label>
      <span>Password</span>
      <input required type="password" name="pass" />
    </label>
    <p class="forgot-pass">Quên mật khẩu?</p>
    <button type="submit" class="submit">Đăng nhập</button>
  </div>
    </form >
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>Nicegame</h2>
        <p>Đăng nhập và tham gia với cộng đồng chúng tôi!</p>
      </div>
      <div class="img__text m--in">
        <h2>Đã là thành viên?</h2>
        <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập!</p>
      </div>
      <div class="img__btn">
        <span class="m--up" id="reg">Đăng ký</span>
        <span class="m--in">Đăng nhập</span>
      </div>
    </div>
    <form action="register" method="post">
      @csrf
    <div class="form sign-up">
      <h2>Đăng ký</h2>
      <label>
        <span>Usename</span>
        <input required type="text" name="user" />
      </label>
      <label>
        <span>Password</span>
        <input required type="password" name="pass" />
      </label>
      <label>
        <span>Confirm password</span>
        <input required type="password" name="repass" />
      </label>
      <button type="submit" class="submit">Đăng ký</button>
      {{-- <button type="button" class="fb-btn">Join with <span>facebook</span></button> --}}
    </div>
    </form>
  </div>
</div>

<a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
</body>
<script type="text/javascript">
 
  document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});
  

</script>

</html>