
  function js() {
    var password = document.getElementById("password").value;
    var username = document.getElementById("input").value;
    if (username == "" && password == "" )
    {
      alert("Field must not empty");
      document.getElementById('input').style.borderColor="red";
      document.getElementById('password').style.borderColor="red";
    }

    else if (username == 'admin' && password == '1234') {

      alert("admin");
    }
    // else{
      
    //   //window.open("bill_informations.html", "_self");
    //   // window.history.forward();
    // }
  }