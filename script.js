function changeView() {
  var signInbox = document.getElementById("signInBox");
  var signUpbox = document.getElementById("signUpBox");

  signInbox.classList.toggle("d-none");
  signUpbox.classList.toggle("d-none");
}

function signUp() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  var f = new FormData();

  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("e", email.value);
  f.append("m", mobile.value);
  f.append("p", password.value);
  f.append("u", username.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      //alert(response);

      if (response == "success") {
        document.getElementById("msg1").innerHTML = "Successful";
        document.getElementById("msg1").className = "alert alert-success";
        document.getElementById("msgDiv1").className = "d-block";

        fname.value = "";
        lname.value = "";
        email.value = "";
        mobile.value = "";
        username.value = "";
        password.value = "";
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgDiv1").className = "d-block";
      }
    }
  };

  request.open("POST", "signUprocess.php", true);
  request.send(f);
}

function signIn() {
  var un = document.getElementById("un");
  var pw = document.getElementById("pw");
  var rm = document.getElementById("rm");

  // alert(un.value);

  var f = new FormData();

  f.append("u", un.value);
  f.append("p", pw.value);
  f.append("r", rm.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        window.location = "index.php";
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";
      }
    }
  };

  request.open("POST", "signInprocess.php", true);
  request.send(f);
}

function adminSignIn() {
  var un = document.getElementById("un");
  var pw = document.getElementById("pw");

  var f = new FormData();
  f.append("u", un.value);
  f.append("p", pw.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response === "Success") {
        window.location = "adminDashboard.php";
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgDiv").className = "d-block";
      }
    }
  };

  request.open("POST", "adminSignInProcess.php", true);
  request.send(f);
}

function loadUser() {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      document.getElementById("tb").innerHTML = response;
    } else {
    }
  };

  request.open("POST", "loadUserProcess.php", true);
  request.send();
}

function brandReg() {
  var brand = document.getElementById("brand");

  var f = new FormData();
  f.append("b", brand.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg1").innerHTML = "Brand Registered";
        document.getElementById("msg1").className = "alert alert-success";
        document.getElementById("msgDiv1").className = "d-block";
        brand.value = "";
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgDiv1").className = "d-block";
      }
    }
  };

  request.open("POST", "brandRegisterProcess.php", true);
  request.send(f);
}

function categoryReg() {
  var cat = document.getElementById("cat");

  var f = new FormData();
  f.append("c", cat.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg2").innerHTML = "Category Registered";
        document.getElementById("msg2").className = "alert alert-success";
        document.getElementById("msgDiv2").className = "d-block";
        category.value = "";
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";
      }
    }
  };

  request.open("POST", "categoryRegisterProcess.php", true);
  request.send(f);
}

function colorReg() {
  var clr = document.getElementById("clr");

  var f = new FormData();
  f.append("cl", clr.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg3").innerHTML = "Color Registered";
        document.getElementById("msg3").className = "alert alert-success";
        document.getElementById("msgDiv3").className = "d-block";
        color.value = "";
      } else {
        document.getElementById("msg3").innerHTML = response;
        document.getElementById("msgDiv3").className = "d-block";
      }
    }
  };

  request.open("POST", "colorRegisterProcess.php", true);
  request.send(f);
}

function sizeReg() {
  var size = document.getElementById("size");

  var f = new FormData();
  f.append("sz", size.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msgDiv4").className = "d-block";
        document.getElementById("msg4").className = "alert alert-success";
        document.getElementById("msg4").innerHTML = "Size Registered";        
        size.value = "";
      } else {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgDiv4").className = "d-block";
      }
    }
  };

  request.open("POST", "sizeRegisterProcess.php", true);
  request.send(f);
}

function regProduct(){
  var pname = document.getElementById("pname");
  var brand = document.getElementById("brand");
  var cat = document.getElementById("cat");
  var color = document.getElementById("color");
  var size = document.getElementById("size");
  var desc = document.getElementById("desc");
  var image = document.getElementById("image");

  var form = new FormData();

  form.append("pname", pname.value);
  form.append("brand", brand.value);
  form.append("cat", cat.value);
  form.append("color", color.value);
  form.append("size", size.value);
  form.append("desc", desc.value);
  form.append("image", image.files[0]);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if(request.readyState == 4 && request.status == 200){
      var response = request.responseText;
      alert(response);
    }
  }

  request.open("POST", "productRegProcess.php", true);
  request.send(form);

}