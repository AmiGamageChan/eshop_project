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
          window.location = "adminDashboardWelcome.php";
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

//User Processes
function userUpdate(id) {
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var pwd = document.getElementById("pw");
  var username = document.getElementById("uname");
  var no = document.getElementById("no");
  var line_1 = document.getElementById("line_1");
  var line_2 = document.getElementById("line_2");

  var f = new FormData();
  f.append("id", id);
  f.append("e", email.value);
  f.append("m", mobile.value);
  f.append("p", pwd.value);
  f.append("u", username.value);
  f.append("no", no.value);
  f.append("l1", line_1.value);
  f.append("l2", line_2.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        Swal.fire({
          title: "Updated!",
          text: "Your Account has been updated.",
          icon: "success",
        }).then(() => {
          // Delay
          setTimeout(() => {
            window.location = "Profile.php";
          }, 2000);
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: response,
          icon: "error",
        });
      }
    }
  };
  request.open("POST", "updateUserProcess.php", true);
  request.send(f);
}

function updateImg(id) {
  var file = document.getElementById("imgUploader");

  var f = new FormData();
  f.append("id", id);
  f.append("image", file.files[0]);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        Swal.fire({
          title: "Updated!",
          text: "Your Account Image has been updated.",
          icon: "success",
        }).then(() => {
          // Delay
          setTimeout(() => {
            window.location = "Profile.php";
          }, 1500);
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: response,
          icon: "error",
        });
      }
    }
  };
  request.open("POST", "updateImgProcess.php", true);
  request.send(f);
}

function userDelete() {
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
      var id = document.getElementById("uid");

      var f = new FormData();
      f.append("id", id.value);

      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          if (response == "Success") {
            Swal.fire({
              title: "Deleted!",
              text: "Your Account has been deleted.",
              icon: "success",
            }).then(() => {
              // Delay
              setTimeout(() => {
                window.location = "signIn.php";
              }, 2000);
            });
          } else {
            Swal.fire({
              title: "Error!",
              text: response,
              icon: "error",
            });
          }
        }
      };
      request.open("POST", "deleteUserProcess.php", true);
      request.send(f);
    }
  });
}
//User Processes

function printDiv(areaId) {
  var originalContent = document.body.innerHTML;
  var printArea = document.getElementById(areaId).innerHTML;

  document.body.innerHTML = printArea;
  window.print();
  document.body.innerHTML = originalContent;
  window.location.reload();
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

function addtoCartIndex(productId) {
  var qtyElement = document.getElementById("qty-" + productId);
  var qty = qtyElement ? qtyElement.innerText : 1;

  if (productId) {
    var f = new FormData();
    f.append("id", productId);
    f.append("qty", qty); // Include the quantity

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        if (response === "Success") {
          Swal.fire({
            title: "Success!",
            text: "Cart item added successfully!",
            icon: "success",
          });
        } else if (response === "Stock exceeded") {
          Swal.fire("Error", "Stock exceeded!", "error");
        } else if (response === "No stock") {
          Swal.fire("Error", "No stock available!", "error");
        } else if (response === "Invalid quantity") {
          Swal.fire("Error", "Invalid quantity!", "error");
        } else {
          Swal.fire("Error", "Item already in cart or other error!", "error");
        }
      }
    };
    request.open("POST", "addtoCartIndexProcess.php", true);
    request.send(f);
  } else {
    Swal.fire("Error", "ID not found!", "error");
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

  request.open("POST", "loadCartProcess.php", true);
  request.send();
}

// Wish List
function addToWishList(stockId) {
  var qty = 1;

  var f = new FormData();
  f.append("s", stockId); // Assuming "s" represents the stock ID
  f.append("q", qty);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        Swal.fire({
          title: "Success!",
          text: "Item added to Wishlist Successfully!",
          icon: "success",
          showConfirmButton: false,
        });
      } else {
        Swal.fire({
          title: "Error!",
          text: response,
          icon: "error",
          showConfirmButton: false,
        });
      }
      setTimeout(function () {
        Swal.close();
      }, 1500);
    }
  };
  request.open("POST", "addToWishListProcess.php", true);
  request.send(f);
}

function loadWishlist() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      document.getElementById("cartBody").innerHTML = response;
    }
  };

  request.open("POST", "loadWishlistProcess.php", true);
  request.send();
}

function removeWishlist(x) {
  Swal.fire({
    title: "Are you sure?",
    text: "You want to remove this item!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Remove it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var f = new FormData();
      f.append("c", x);

      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          if (response == "Success") {
            Swal.fire({
              title: "Deleted!",
              text: "Your item has been deleted from the Wishlist.",
              icon: "success",
              timer: 1200,
              timerProgressBar: true,
              showConfirmButton: false,
            });
            setTimeout(function () {
              window.location = "wishlist.php";
            }, 1200);
          }
        }
      };
      request.open("POST", "removeWishListProcess.php", true);
      request.send(f);
    }
  });
}
// Wish List

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

  request.open("POST", "updateCartQtyProcess.php", true);
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

  request.open("POST", "updateCartQtyProcess.php", true);
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
          var response = request.responseText;
          location.reload();
        }
      };
      request.open("POST", "removeCartProcess.php", true);
      request.send(f);
      Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success",
        delay: 2000,
      });
      window.location = "cart.php";
    }
  });
}
// Payment Processes

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
        // alert(response);
        var order = JSON.parse(response);
        if (order.respo == "Success") {
          // location.reload();
          window.location = "invoice.php";
          window.location = "invoice.php?order_id=" + order.order_id;
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
  if (Number(qty.value) > 0) {
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
    let timerInterval;
    Swal.fire({
      html: "Please Enter a Valid Quantity",
      timer: 1500,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading();
        const timer = Swal.getPopup().querySelector("b");
        timerInterval = setInterval(() => {
          timer.textContent = `${Swal.getTimerLeft()}`;
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);
      },
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log("I was closed by the timer");
      }
    });
  }
}

// Payment Processes

// Forget Password Processes

function forgetPassword() {
  var email = document.getElementById("e");

  if (email.value != "") {
    var f = new FormData();
    f.append("e", email.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);
        if (response == "Success") {
          document.getElementById("msg").innerHTML =
            "Password Reset Link Sent to Your Email";
          document.getElementById("msg").className = "alert alert-success";
          document.getElementById("msgDiv").className = "d-block";
          email.value = "";
        } else {
          document.getElementById("msg").innerHTML = "Email Not Found";
          document.getElementById("msg").className = "alert alert-danger";
          document.getElementById("msgDiv").className = "d-block";
          email.value = "";
        }
      }
    };
    request.open("POST", "forgetPasswordProcess.php", true);
    request.send(f);
  } else {
    document.getElementById("signInBox").classList.add("d-none");
    Swal.fire("Please Enter Your Email!");
    setTimeout(function () {
      window.location.reload();
    }, 1500);
  }
}

function resetPassword() {
  var vcode = document.getElementById("vcode");
  var np = document.getElementById("np");
  var np2 = document.getElementById("np2");

  var f = new FormData();
  f.append("vcode", vcode.value);
  f.append("np", np.value);
  f.append("np2", np2.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        window.location = "signIn.php";
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msg").className = "alert alert-danger";
        document.getElementById("msgDiv").className = "d-block";
      }
    }
  };
  request.open("POST", "resetPasswordProcess.php", true);
  request.send(f);
}
// Forget Password Processes

// Chart Process
function loadChart() {
  const ctx = document.getElementById("myChart");
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      var data = JSON.parse(response);
      new Chart(ctx, {
        type: "bar",
        data: {
          labels: data.labels,
          datasets: data.datasets,
        },
        options: {
          plugins: {
            legend: {
              display: false, //Legend
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  };

  request.open("GET", "loadChartProcess.php", true);
  request.send();
}

//Utility Processes

// 
// Nav-Bar Hide and show
let lastScrollTop = 0;
const navbar = document.querySelector(".navbar");

window.addEventListener("scroll", function () {
  let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

  if (currentScroll > lastScrollTop) {
    // Downscroll code
    navbar.classList.add("navbar-hide");
    navbar.classList.remove("navbar-show");
  } else {
    // Upscroll code
    navbar.classList.remove("navbar-hide");
    navbar.classList.add("navbar-show");
  }

  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
});
// Nav-Bar Hide and show

// Function to toggle Themes nd Load theme preference from localStorage
function toggleDarkMode() {
  // Get the checkbox element
  var darkModeSwitch = document.getElementById("darkModeSwitch");
  // Get the body element
  var body = document.body;
  // Toggle data-bs-theme attribute
  if (darkModeSwitch.checked) {
    body.setAttribute("data-bs-theme", "dark");
    // Save theme preference to localStorage
    localStorage.setItem("theme", "dark");
    // Change navbar text color to white
    document;
    document
      .querySelectorAll(
        ".navbar-nav .nav-link, .navbar-nav .btn, .navbar-brand"
      )
      .forEach((item) => {
        item.classList.remove("text-black");
        item.classList.add("text-white");
      });
  } else {
    body.setAttribute("data-bs-theme", "light");
    // Save theme preference to localStorage
    localStorage.setItem("theme", "light");
    // Change navbar text color to black
    document;
    document
      .querySelectorAll(
        ".navbar-nav .nav-link, .navbar-nav .btn, .navbar-brand"
      )
      .forEach((item) => {
        item.classList.remove("text-white");
        item.classList.add("text-black");
      });
  }
}

// Function to load theme preference from localStorage
function loadThemePreference() {
  var theme = localStorage.getItem("theme");
  var navbarBrand = document.querySelector(".navbar-brand");
  
  if (theme === "dark") {
    document.getElementById("darkModeSwitch").checked = true;
    document.body.setAttribute("data-bs-theme", "dark");
    document
      .querySelectorAll(".navbar-nav .nav-link, .navbar-nav .btn")
      .forEach((item) => {
        item.classList.remove("text-dark");
        item.classList.add("text-light");
      });
    if (navbarBrand) {
      navbarBrand.classList.remove("text-dark");
      navbarBrand.classList.add("text-light");
      navbarBrand.querySelector('img').setAttribute('src', 'Resources/img/logowhite.png');
    }
  } else {
    document.body.setAttribute("data-bs-theme", "light");
    document
      .querySelectorAll(".navbar-nav .nav-link, .navbar-nav .btn")
      .forEach((item) => {
        item.classList.remove("text-light");
        item.classList.add("text-dark");
      });
    if (navbarBrand) {
      navbarBrand.classList.remove("text-light");
      navbarBrand.classList.add("text-dark");
      navbarBrand.querySelector('img').setAttribute('src', 'Resources/img/logo.png');
    }
  }
}

// Function to toggle dark mode
function toggleDarkMode() {
  var isChecked = document.getElementById("darkModeSwitch").checked;
  if (isChecked) {
    localStorage.setItem("theme", "dark");
    document.body.setAttribute("data-bs-theme", "dark");
    document
      .querySelectorAll(".navbar-nav .nav-link, .navbar-nav .btn, .navbar-brand")
      .forEach((item) => {
        item.classList.remove("text-dark");
        item.classList.add("text-light");
      });
    document.querySelector(".navbar-brand img").setAttribute("src", "Resources/img/logowhite.png");
  } else {
    localStorage.setItem("theme", "light");
    document.body.setAttribute("data-bs-theme", "light");
    document
      .querySelectorAll(".navbar-nav .nav-link, .navbar-nav .btn, .navbar-brand")
      .forEach((item) => {
        item.classList.remove("text-light");
        item.classList.add("text-dark");
      });
    document.querySelector(".navbar-brand img").setAttribute("src", "Resources/img/logo.png");
  }
}

// Event listener for checkbox change
document
  .getElementById("darkModeSwitch")
  .addEventListener("change", toggleDarkMode);

// Load theme preference on page load
window.addEventListener("load", loadThemePreference);

