<?php include "auth/login.php"; ?>

<!Doctype html>
<html lang="en">

<head>
  <?php include "components/title.php"; ?>
  <link rel="shortcut icon" href="./assets/img/favicon.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <style>
    .tm-copyright-text {
      color: #000;
      text-align: center;
      font-size: .8rem;
      display: block;
      margin-top: 20px;
    }

    .scroll {
      writing-mode: vertical-rl;
      position: relative;
      font-size: 20px;
      margin-left: -196px;
      top: 184px;
    }

    .scroll::before {
      content: "";
      position: absolute;
      height: 80px;
      border-right: solid 1px #000;
      top: 115%;
      left: calc(50% - 1px);
      transform: translateX(-60%);
      animation: scroll-line-animation 3s infinite ease-in-out;
    }

    @keyframes scroll-line-animation {
      0% {
        transform: translateY(-10px);
        opacity: 0;
      }

      25% {
        transform: translateY(5px);
        opacity: 1;
      }

      75% {
        transform: translateY(-5px);
        opacity: 1;
      }

      100% {
        transform: translateY(10px);
        opacity: 0;
      }
    }

    .mainpic {
      position: relative;
      top: 0px;

    }

    .hoz_title {
      font-weight: 600 !important;
      font-size: 18px;
      transform: rotate(-90deg);
      position: relative;
      top: 79px;
      float: left;
      left: -109px;
    }

    @media only screen and (max-width: 768px) {
      .mainpic {
        position: relative !important;
        top: -21px !important;

      }

      .hoz_title {
        font-weight: 600 !important;
        font-size: 18px;
        transform: rotate(-90deg);
        position: relative;
        top: -139px;
        float: left;
        left: 277px;
      }

      .scroll {
        writing-mode: vertical-rl;
        position: relative;
        font-size: 20px;
        margin-left: 18px;
        top: -436px;
      }

    }

    @media only screen and (max-width: 360px) {

      .mainpic {
        position: relative !important;
        top: -50px !important;
        width: 102%;
      }

      .scroll {
        writing-mode: vertical-rl;
        position: relative;
        font-size: 20px;
        margin-left: -12px;
        top: -388px;
      }

      .hoz_title {
        font-weight: 600 !important;
        font-size: 18px;
        transform: rotate(-90deg);
        position: relative;
        top: -476px;
        float: left;
        left: 237px;
      }

    }
  </style>
</head>

<body>
  <div class="d-lg-flex half mainpic">
    <div class="bg order-1 order-md-2" style="background-image: url('./assets/img/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <img src="./assets/img/final_logo.png" style="width: 25%;margin-left: auto;margin-right: auto;position: relative;display: block;">
            <h1 style="font-weight: 600 !important;font-size: 33px;">BALIK PROBINSYA, BAGONG PAG-ASA PROGRAM</h1>
            <br>
            <h1 class="hoz_title">Applicant ID System</h1>
            <span class="scroll"></span>
            <form action="" method="post">
              <div class="form-group first">
                <input type="text" name="nha_bp2_email" class="form-control" value="<?php echo $nha_bp2_email; ?>" placeholder="Email" id="username">
                <span class="error" style="color:red"><?php echo $nha_bp2_emailErr; ?></span>
              </div>
              <div class="form-group last mb-3">
                <input type="password" name="nha_bp2_password_login" value="<?php echo $nha_bp2_password_login; ?>" placeholder="Password" class="form-control" id="password">
                <span class="error" style="color:red"><?php echo $nha_bp2_password_loginErr; ?></span>
              </div>
              <input type="submit" name="btnLogin" value="Log In" class="btn btn-block btn-primary" style="border-radius: 25px;">
              <p class="tm-copyright-text">
                Copyright &copy; <span>2020-2023</span><br>
                Balik Probinsya, Bagong Pag-asa<br>
                System Developed By: Ricardo Liera Jr
              </p>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>