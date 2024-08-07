function changeView() {
    var signinbox = document.getElementById("signinbox");
    var signupbox = document.getElementById("signupbox");

    signinbox.classList.toggle("d-none");
    signupbox.classList.toggle("d-none");
}

function signup() {
    var fn = document.getElementById("fn");
    var ln = document.getElementById("ln");
    var e = document.getElementById("email");
    var m = document.getElementById("mobile");
    var un = document.getElementById("up_un");
    var pw = document.getElementById("up_pw");

    var f = new FormData();
    f.append("fn", fn.value);
    f.append("ln", ln.value);
    f.append("e", e.value);
    f.append("m", m.value);
    f.append("un", un.value);
    f.append("pw", pw.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);

            if (response == "Success") {

                //alert("ok");
                document.getElementById("msg1").innerHTML = "Registation successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fn.value = "";
                ln.value = "";
                e.value = "";
                m.value = "";
                un.value = "";
                pw.value = "";

            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-danger";
                document.getElementById("msgDiv1").classList = "d-block";
            }
        }
    }
    r.open("POST", "signupProcess.php", true);
    r.send(f)
}

function signin() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    // alert(un.value);
    // alert(pw.value);
    // alert(rm.value);

    var f = new FormData();
    f.append("un", un.value);
    f.append("pw", pw.value);
    f.append("rm", rm.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);

            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }

    request.open("POST", "signinProcess.php", true);
    request.send(f);

}

function addminsign() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    var f = new FormData();
    f.append("un", un.value);
    f.append("pw", pw.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                window.location = "addmindashbord.php";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }
    r.open("POST", "addminsigninProcess.php", true);
    r.send(f);
}

function loaduser() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    }

    r.open("POST", "loaduserProcess.php", true);
    r.send();
}

function updateTextField(userId) {
    //document.querySelector('.form-control').value = userId;
    document.getElementById("userIdTextFild").value = userId;
}

function updateuserstatus() {
    var userId = document.getElementById("userIdTextFild");
    var f = new FormData();
    f.append("u", userId.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            var msgDiv = document.getElementById("msgDiv");
            var msg = document.getElementById("msg");

            if (response == "Inactive") {
                msg.innerHTML = "User inactive successfully";
                msg.className = "alert alert-success";
                msgDiv.className = "d-block";
                userId.value = "";
                loaduser();
            } else if (response == "Active") {
                msg.innerHTML = "User active successfully";
                msg.className = "alert alert-success";
                msgDiv.className = "d-block";
                userId.value = "";
                loaduser();
            } else {
                msg.innerHTML = response;
                msg.className = "alert alert-danger";
                msgDiv.className = "d-block";
            }

            // Automatically hide the alert after 5 seconds
            setTimeout(function () {
                msgDiv.className = "d-none";
            }, 5000);
        }
    };
    r.open("POST", "upsateuserprofilestatus.php", true);
    r.send(f);
}

function brandReg() {

    //alert("ok");
    var brand = document.getElementById("brand");

    var f = new FormData();
    f.append("b", brand.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "The registation is success.";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
            }

            else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }

            setTimeout(function () {
                document.getElementById("msgDiv1").className = "d-none";
            }, 5000);

        }
    }

    r.open("POST", "brandprocess.php", true);
    r.send(f);
}

function categoryReg() {

    var cat = document.getElementById("cat");
    var f = new FormData();
    f.append("c", cat.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "The registation is success.";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                cat.value = "";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msg2").className = "alert alert-danger";
                document.getElementById("msgDiv2").className = "d-block";
            }

            setTimeout(function () {
                document.getElementById("msgDiv2").className = "d-none";
            }, 5000);
        }
    }

    r.open("POST", "categotyProcess.php", true);
    r.send(f);
}

function colourReg() {

    var c = document.getElementById("colour");
    //alert(c.value);

    var f = new FormData();
    f.append("c", c.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "The Colour registation is success.";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
                c.value = "";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msg3").className = "alert alert-danger";
                document.getElementById("msgDiv3").className = "d-block";
            }
            setTimeout(function () {
                document.getElementById("msgDiv3").className = "d-none";
            }, 5000);
        }
    }

    r.open("POST", "colourProcrss.php", true);
    r.send(f);
}

function sizeReg() {
    var s = document.getElementById("size");
    //alert(s.value);

    var f = new FormData();
    f.append("s", s.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "The Colour registation is success.";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
                s.value = "";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msg4").className = "alert alert-danger";
                document.getElementById("msgDiv4").className = "d-block";
            }
            setTimeout(function () {
                document.getElementById("msgDiv4").className = "d-none";
            }, 5000);
        }
    }

    r.open("POST", "sizeProcrss.php", true);
    r.send(f);
}

function regProduct() {
    var n = document.getElementById("name");
    var b = document.getElementById("brand");
    var c = document.getElementById("cat");
    var col = document.getElementById("colour");
    var size = document.getElementById("size");
    var dis = document.getElementById("dis");
    var img = document.getElementById("img");

    //alert(n.value);
    //alert(b.value);
    //alert(c.value);
    //alert(col.value);
    // alert(size.value);
    // alert(dis.value);
    // alert(img.value);

    var f = new FormData();
    f.append("n", n.value);
    f.append("b", b.value);
    f.append("c", c.value);
    f.append("col", col.value);
    f.append("size", size.value);
    f.append("dis", dis.value);
    f.append("img", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            //alert(response);
            if (response == "Success") {
                alert("Product registation successfuly");
                location.reload();
            } else {
                alert(response);
            }
        }
    }

    r.open("POST", "productRegProccess.php", true);
    r.send(f);
}

function updateStock() {
    var selectP = document.getElementById("selectProduct");
    var qut = document.getElementById("quantity");
    var unit = document.getElementById("unitprice");

    // alert(selectP.value);
    // alert(qut.value);
    // alert(unit.value);

    var f = new FormData();
    f.append("selectP", selectP.value);
    f.append("qut", qut.value);
    f.append("unit", unit.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            alert(response);
            location.reload();
        }
    }

    r.open("POST", "addminstockProcess.php", true);
    r.send(f);
}

/*function buttonPrint() {
    // Add the 'd-none' class to hide the elements
    document.getElementById("div1").classList.add("d-none");
    document.getElementById("icon").classList.add("d-none");

    // Call the print function
    window.print();

    // Optionally, you can remove the 'd-none' class after printing
    // to make the elements visible again
    document.getElementById("div1").classList.remove("d-none");
    document.getElementById("icon").classList.remove("d-none");

}*/

function buttonPrint() {
    var orginalContainer = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;
    window.print();
    document.body.innerHTML = orginalContainer;
}

function loadProduct(x) {
    var page = x;
    // alert(page);

    var f = new FormData();
    f.append("p", page);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    r.open("POST", "loadProductProcess.php", true);
    r.send(f);

}

function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("page", page);
    f.append("p", product.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            document.getElementById("pid").innerHTML = response;
        }
    }

    r.open("POST", "searchProduct.php", true);
    r.send(f);
}

function viewFilter() {
    document.getElementById("filterID").className = "container d-block";
}

function advSearchProduct(x) {
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

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };
    request.open("POST", "advanceSearchProductProcess.php", true);
    request.send(f);
}

function uploadimage() {
    var img = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("i", img.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            if (response == "empty") {
                alert("You did not choose an image file.");
            } else {
                document.getElementById("i").src = response;
                img.value = "";
            }
        }
    }

    r.open("POST", "profileImageUpload.php", true);
    r.send(f);
}

function updatedata() {
    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var e = document.getElementById("email");
    var m = document.getElementById("mobile");
    var pw = document.getElementById("password");
    var no = document.getElementById("no");
    var a01 = document.getElementById("add01");
    var a02 = document.getElementById("add02");

    var f = new FormData();
    f.append("fn", fn.value);
    f.append("ln", ln.value);
    f.append("e", e.value);
    f.append("m", m.value);
    f.append("pw", pw.value);
    f.append("no", no.value);
    f.append("a01", a01.value);
    f.append("a02", a02.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            alert(response);
            location.reload();
        }
    }
    r.open("POST", "uploadProfileDetails.php", true);
    r.send(f);
}

function signOut() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            alert(response);
            location.reload();
        }
    }
    r.open("POST", "signOutProcess.php", true);
    r.send();
}

function addtoCart(x) {
    var stockID = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("stockID", stockID);
        f.append("qty", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                if (response == "stockID not aveilabale") {
                    window.open('signin.php', '_blank');
                } else {
                    Swal.fire({
                        title: "Good job!",
                        text: response,
                        icon: "success"
                    });
                    qty.value = "";
                }
            }
        }

        r.open("POST", "addtocartProcess.php", true);
        r.send(f);

    } else {
        alert("Please Enter valid Quantity");
    }
}

function loadcart() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            document.getElementById("cartBody").innerHTML = response;
        }
    }

    r.open("POST", "loadCartProcess.php", true);
    r.send();
}

function incremantCartQty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) + 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == "success") {
                qty.value = parseInt(qty.value) + 1;
                loadcart();
            } else {
                alert(response);
            }
        }
    }

    r.open("POST", "updateCartQtyProcess.php", true);
    r.send(f);
}

function decrementCartQty(x) {
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) - 1;

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty > 0) {
        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                if (response == "success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadcart();
                } else {
                    alert(response);
                }
            }
        }

        r.open("POST", "updateCartQtyProcess.php", true);
        r.send(f);
    }
}

function removeCart(x) {

    if (confirm("Are you suru you want ot delete this iterm?")) {


        var f = new FormData();
        f.append("c", x);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                alert(response);
                location.reload();
            }
        }

        r.open("POST", "removeCartProcess.php", true);
        r.send(f);
    }
}

function checkOut() {
    var f = new FormData();
    f.append("cart", true);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            var paydata = JSON.parse(response);
            docheckOut(paydata, "checkOutProcess.php");
        }
    }

    r.open("POST", "paymentProcess.php", true);
    r.send(f);
}

function docheckOut(paydata, path) {
    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(paydata));

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {

            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                // alert(response);

                var order = JSON.parse(response);

                if (order.res == "success") {
                    // location.reload();
                    window.location = "invoice.php?orderId=" + order.order_id;
                    // alert(order.order_id);
                } else {
                    alert(response);
                }
            }

        }
        r.open("POST", path, true);
        r.send(f);
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

    // Put the payment variables here
    var payment = {
        "sandbox": paydata["sandbox"],
        "merchant_id": paydata["merchant_id"],    // Replace your Merchant ID
        "return_url": paydata["return_url"],     // Important
        "cancel_url": paydata["cancel_url"],     // Important
        "notify_url": paydata["notify_url"],
        "order_id": paydata["order_id"],
        "items": paydata["items"],
        "amount": paydata["amount"],
        "currency": paydata["currency"],
        "hash": paydata["hash"], // *Replace with generated hash retrieved from backend
        "first_name": paydata["first_name"],
        "last_name": paydata["last_name"],
        "email": paydata["email"],
        "phone": paydata["phone"],
        "address": paydata["address"],
        "city": paydata["city"],
        "country": paydata["country"],
        "delivery_address": paydata["address"],
        "delivery_city": paydata["city"],
        "delivery_country": paydata["country"],
        "custom_1": "",
        "custom_2": ""
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    payhere.startPayment(payment);
}

function buyNow(stockID) {
    // alert(stcockID);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var f = new FormData();
        f.append("cart", false);
        f.append("stockID", stockID);
        f.append("qty", qty.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                var paydata = JSON.parse(response);
                paydata.stock_id = stockID;
                paydata.qty = qty.value;
                docheckOut(paydata, "buynowProcess.php");
            }
        }

        r.open("POST", "paymentProcess.php", true);
        r.send(f);

    } else {
        alert("Please enter valid Quantity");
    }
}


function frogetpassword() {

    var email = document.getElementById("e");

    if (email.value != "") {

        var f = new FormData();
        f.append("e", email.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                // alert(response);
                if (response == "Message has been sent") {
                    document.getElementById("msg").innerHTML = "Email sent! Please check your email inbox.";
                    document.getElementById("msg").className = "alert alert-success";
                    document.getElementById("msgDiv").className = "d-block";
                    email.value = '';
                } else {
                    // document.getElementById("msg").innerHTML = response;
                    // document.getElementById("msg").className = "alert alert-danger";
                    // document.getElementById("msgDiv").className = "d-block";
                    alert(response);
                }
            }
        }

        r.open("POST", "forgetPasswordProcess.php", true);
        r.send(f);

    } else {
        alert("Please enter your valid email address.");
    }
}

function resetpassword() {
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    if (np.value != '') {
        var f = new FormData();
        f.append("vcode", vcode.value);
        f.append("np", np.value);
        f.append("np2", np2.value);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4 && r.status == 200) {
                var response = r.responseText;
                // alert(response);
                if (response == 'success') {
                    window.location.href = 'signin.php';
                } else {
                    document.getElementById("msg").innerHTML = response;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }
            }
        }

        r.open("POST", "resetPasswordProcess.php", true);
        r.send(f);
    } else {
        // alert("Please enter your new password.");
        document.getElementById("msg").innerHTML = "Please enter your new password.";
        document.getElementById("msg").className = "alert alert-danger";
        document.getElementById("msgDiv").className = "d-block";
    }

}

function loadchart() {
    var ctx = document.getElementById('myChart');

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            // alert(response);
            var data = JSON.parse(response);

            ////chart
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.lebals,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            /////////////////

        }
    }

    r.open("POST", "loadchartProcess.php", true);
    r.send();
}
