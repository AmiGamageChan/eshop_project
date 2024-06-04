function changeView() {
  var signInbox = document.getElementById("signInBox");
  var signUpbox = document.getElementById("signUpBox");

  signInbox.classList.toggle("d-none");
  signUpbox.classList.toggle("d-none");
}
// Signing Processes
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

  var f = new FormData();

  f.append("u", un.value);
  f.append("p", pw.value);
  f.append("r", rm.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        document.getElementById("signInBox").className = "d-none";
        Swal.fire({
          title: "Success!",
          text: "Logged in Successfully!",
          icon: "success",
          timer: 2000, // 2 seconds timer
          showConfirmButton: false,
        }).then(() => {
          window.location = "index.php";
        });
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";
      }
    }
  };
  request.open("POST", "signInprocess.php", true);
  request.send(f);
}

// Cookie Delete Function
function deleteCookie(PHPSESSID) {
  document.cookie =
    PHPSESSID + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function signOut() {
  var request = new XMLHttpRequest();
  request.open("GET", "checkSession.php", true);
  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      var session = request.responseText;
      if (session === "true") {
        // Session exists
        Swal.fire({
          title: "Are you sure?",
          text: "You Will Be Logged Out!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, Log Out!",
        }).then((result) => {
          if (result.isConfirmed) {
            // Perform logout actions
            deleteCookie("PHPSESSID");
            Swal.fire({
              title: "Logged Out!",
              text: "You Have Been Logged Out.",
              icon: "success",
              timer: 2000, // 2 seconds timer to show the success message
              showConfirmButton: false,
            }).then(() => {
              window.location = "signIn.php"; // Navigate to the sign-in page
            });
          }
        });
      } else {
        // Handle case where session doesn't exist
        console.log("No active session");
      }
    }
  };
  request.send();
}
// Signing Processes

// Admin Processes
// Admin Login
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
        document.getElementById("AdminSI").className = "d-none";
        Swal.fire({
          title: "Success!",
          text: "Logged in Successfully!",
          icon: "success",
          timer: 2000, // 2 seconds timer
          showConfirmButton: false,
        }).then(() => {
          window.location = "adminDashboard.php";
        });
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgDiv").className = "d-block";
      }
    }
  };
  request.open("POST", "adminSignInProcess.php", true);
  request.send(f);
}
// Admin Login

function adminSignOut() {
  var request = new XMLHttpRequest();
  request.open("GET", "checkSession.php", true);
  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      var session = request.responseText;
      if (session === "true") {
        // Session exists
        Swal.fire({
          title: "Are you sure?",
          text: "You Will Be Logged Out!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, Log Out!",
        }).then((result) => {
          if (result.isConfirmed) {
            // Perform logout actions
            deleteCookie("PHPSESSID");
            Swal.fire({
              title: "Logged Out!",
              text: "You Have Been Logged Out.",
              icon: "success",
              timer: 2000, // 2 seconds timer to show the success message
              showConfirmButton: false,
            }).then(() => {
              window.location = "adminSignIn.php"; // Navigate to the sign-in page
            });
          }
        });
      } else {
        // Handle case where session doesn't exist
        console.log("No active session");
      }
    }
  };
  request.send();
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

function regProduct() {
  var pname = document.getElementById("pname");
  var brand = document.getElementById("brand");
  var cat = document.getElementById("cat");
  var color = document.getElementById("color");
  var size = document.getElementById("size");
  var desc = document.getElementById("desc");
  var file = document.getElementById("file");

  var f = new FormData();

  f.append("p", pname.value);
  f.append("b", brand.value);
  f.append("ca", cat.value);
  f.append("co", color.value);
  f.append("s", size.value);
  f.append("d", desc.value);
  f.append("image", file.files[0]);

  // alert(cat.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      Swal.fire("Product Registered!");
    }
  };

  request.open("POST", "productRegProcess.php", true);
  request.send(f);
}

function updateStock() {
  var pname = document.getElementById("selectProduct");
  var qty = document.getElementById("qty");
  var price = document.getElementById("uprice");

  // alert(pname.value)

  var f = new FormData();
  f.append("p", pname.value);
  f.append("q", qty.value);
  f.append("up", price.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      if (this.responseText == "success") {
        Swal.fire({
          this: "Stock Updated Successfully",
          timer: 2000, // 2 seconds timer
          showConfirmButton: false,
        }).then(() => {
          window.location = "adminStock.php";
        });
      } else {
        Swal.fire({
          title: response,
          timer: 2000, // 2 seconds timer
          showConfirmButton: false,
        }).then(() => {
          window.location = "adminStock.php";
        });
      }
    }
  };

  request.open("POST", "updateStockProcess.php", true);
  request.send(f);
}

function updateUserStatus() {
  var userid = document.getElementById("uid");
  // alert(userid.value);

  var f = new FormData();
  f.append("u", userid.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      // alert(response);

      if (response == "Deactive") {
        document.getElementById("msg").innerHTML =
          "User Account Deactivated Successfully";
        document.getElementById("msg").className = "alert alert-danger";
        document.getElementById("msgDiv").className = "d-block";
        userid.value = "";
        loadUser();
      } else if (response == "Active") {
        document.getElementById("msg").innerHTML =
          "User Activated Successfully";
        document.getElementById("msg").className = "alert alert-success";
        document.getElementById("msgDiv").className = "d-block";
        userid.value = "";
        loadUser();
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgDiv").className = "d-block";
      }
    }
  };

  request.open("POST", "updateUserStatusProcess.php", true);
  request.send(f);
}
// Admin Processes

function printDiv(areaId) {
  var originalContent = document.body.innerHTML;
  var printArea = document.getElementById(areaId).innerHTML;

  document.body.innerHTML = printArea;

  window.print();
  window.reload();
}

// Product Processes
function loadProduct(x) {
  var page = x;

  //alert(x);

  var f = new FormData();
  f.append("p", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("pid").innerHTML = response;
    }
  };

  request.open("POST", "loadProductProcess.php", true);
  request.send(f);
}

function searchProduct(x) {
  var page = x;
  var product = document.getElementById("product");
  // alert(page);
  // alert(product.value);

  var f = new FormData();
  f.append("p", product.value);
  f.append("pg", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("pid").innerHTML = response;
    }
  };

  request.open("POST", "searchProductProcess.php", true);
  request.send(f);
}

function viewFilter() {
  var filter = document.getElementById("filterId");
  if (filter.className === "d-block") {
    filter.className = "d-none"; // Hide the filter
  } else {
    filter.className = "d-block"; // Show the filter
  }
}

function advSearchProduct(x) {
  // alert("ok");
  var page = x;
  var color = document.getElementById("color");
  var cat = document.getElementById("cat");
  var brand = document.getElementById("brand");
  var size = document.getElementById("size");
  var min = document.getElementById("min");
  var max = document.getElementById("max");

  var f = new FormData();
  f.append("pg", page);
  f.append("co", color.value);
  f.append("cat", cat.value);
  f.append("b", brand.value);
  f.append("s", size.value);
  f.append("min", min.value);
  f.append("max", max.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var response = r.responseText;
      // alert(response);
      document.getElementById("pid").innerHTML = response;

      color.value = "0";
      cat.value = "0";
      brand.value = "0";
      size.value = "0";
      min.value = "";
      max.value = "";
    }
  };

  r.open("POST", "advSearchProductProcess.php", true);
  r.send(f);
}
// Product Processes

// Cart Processes
function addtoCart(x) {
  var stockId = x;
  var qty = document.getElementById("qty");

  if (qty.value > 0) {
    var f = new FormData();
    f.append("s", stockId);
    f.append("q", qty.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        Swal.fire({
          title: "Success!",
          text: "Cart item added successfully!",
          icon: "success",
        });
      }
    };

    request.open("POST", "addtoCartProcess.php", true);
    request.send(f);
  } else {
    Swal.fire("Please enter your quantity");
  }
}

function loadCart() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("cartBody").innerHTML = response;
    }
  };

  request.open("POST", "loadCartprocess.php", true);
  request.send();
}

function incrementCartQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) + 1;

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        qty.value = parseInt(qty.value) + 1;
        loadCart();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "updateCartQtyprocess.php", true);
  request.send(f);
}

function decrementCartQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) - 1;

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        qty.value = parseInt(qty.value) - 1;
        loadCart();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "updateCartQtyprocess.php", true);
  request.send(f);
}

function removeCart(x) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var f = new FormData();
      f.append("c", x);

      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var responce = request.responseText;
          location.reload();
        }
      };
      request.open("POST", "removeCartProcess.php", true);
      request.send(f);
      Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success",
      });
    }
  });
}
// Cart Processes

// Payment Processes
function checkOut() {
  // Alert("OK");

  var f = new FormData();
  f.append("cart", true);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      var payment = JSON.parse(response);
      doCheckout(payment, "checkOutProcess.php");
    }
  };
  request.open("POST", "paymentProcess.php", true);
  request.send(f);
}

function doCheckout(payment, path) {
  // Payment completed. It can be a successful failure.
  payhere.onCompleted = function onCompleted(orderId) {
    console.log("Payment completed. OrderID:" + orderId);
    // Note: validate the payment and show success or failure page to the customer

    var f = new FormData();
    f.append("payment", JSON.stringify(payment));

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        if (response == "Success") {
          location.reload();
        } else {
          alert(response);
        }
      }
    };
    request.open("POST", path, true);
    request.send(f);
  };

  // Payment window closed
  payhere.onDismissed = function onDismissed() {
    // Note: Prompt user to pay again or show an error page
    console.log("Payment dismissed");
  };

  // Error occurred
  payhere.onError = function onError(error) {
    // Note: show an error page
    console.log("Error:" + error);
  };

  // Show the payhere.js popup, when "PayHere Pay" is clicked
  document.getElementById("payhere-payment").onclick = function (e) {
    payhere.startPayment(payment);
  };
}

function buyNow(stockId) {
  //alert(stockId);
  var qty = document.getElementById("qty");
  if (Number(qty.value)> 0) {
    var f = new FormData();
    f.append("cart", false);
    f.append("stockId", stockId);
    f.append("qty", qty.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);
        var payment = JSON.parse(response);
        payment.stock_id = stockId;
        payment.qty = qty.value;
        doCheckout(payment, "buynowProcess.php");
      }
    };

    request.open("POST", "paymentProcess.php", true);
    request.send(f);
  } else {
    alert("Please enter valid quantity");
  }
}
// Payment Processes
