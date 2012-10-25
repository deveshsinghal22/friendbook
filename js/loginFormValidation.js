function loginCheck()
    {
        document.getElementById("userError").innerHTML = "";
        document.getElementById('passError').innerHTML = "";
        var ulen = document.getElementById("username").value.length;
        
        if(ulen == 0) {
            document.getElementById("userError").innerHTML = "username cant be blank";
            document.getElementById("userError").style.color = 'white';
            }

        var plen = document.getElementById("pass").value.length;
        if(plen == 0) {
            document.getElementById('passError').innerHTML = "password cant be blank";
            document.getElementById("passError").style.color = 'white';
            return false;
        }

        if(ulen != 0 && plen != 0){
            document.frm.submit();
            return false;
        }
    }           