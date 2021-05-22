<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>Verification Code</title>
  <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
  <link href="../CSS/otp.css" rel="stylesheet">
  <script>
    window.console = window.console || function(t) {};
  </script>
  <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
  </script>
</head>

<body translate="no" style="background-color: rgb(238,238,238);">
  <div id="wrapper">
    <div id="dialog" style="top: 100px; background-color: white; border:0; border-radius:30px;">
      <h3>Please enter the 4-digit verification code we sent via SMS:</h3>
      <span>(Please Verify Your Mobile Number)</span>
      <div id="form">
        <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
        <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" /><input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" /><input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
        <button class="btn btn-primary btn-embossed">Verify</button>
      </div>

      <div>
        Didn't receive the code?<br />
        <a href="#">Resend</a><br />
        <a href="#">Change Phone Number</a>
      </div>
      <img src="http://jira.moovooz.com/secure/attachment/10424/VmVyaWZpY2F0aW9uLnN2Zw==" alt="test" />
    </div>
  </div>
  <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script id="rendered-js">
    $(function() {
      'use strict';

      var body = $('body');

      function goToNextInput(e) {
        var key = e.which,
          t = $(e.target),
          sib = t.next('input');

        if (key != 9 && (key < 48 || key > 57)) {
          e.preventDefault();
          return false;
        }

        if (key === 9) {
          return true;
        }

        if (!sib || !sib.length) {
          sib = body.find('input').eq(0);
        }
        sib.select().focus();
      }

      function onKeyDown(e) {
        var key = e.which;

        if (key === 9 || key >= 48 && key <= 57) {
          return true;
        }

        e.preventDefault();
        return false;
      }

      function onFocus(e) {
        $(e.target).select();
      }

      body.on('keyup', 'input', goToNextInput);
      body.on('keydown', 'input', onKeyDown);
      body.on('click', 'input', onFocus);

    });
    //# sourceURL=pen.js
  </script>



</body>

</html>