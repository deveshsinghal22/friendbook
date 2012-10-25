function chkBlank(){
        var numbers = /^[0-9]+$/;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        document.getElementById("nameError").innerHTML = "";
        document.getElementById("surnameError").innerHTML = "";
        document.getElementById("genderError").innerHTML = "";
        document.getElementById("passwordError").innerHTML = "";
        document.getElementById("phoneError").innerHTML = "";
        document.getElementById("bdayError").innerHTML = "";
        document.getElementById("addressError").innerHTML = "";
        document.getElementById("emailError").innerHTML = "";
        document.getElementById("picError").innerHTML = "";
        document.getElementById("complete").innerHTML = "";



        var name = document.getElementById("name").value.length;
        if( name == 0){
            document.getElementById("nameError").innerHTML = "dont leave blank";
            document.getElementById("nameError").style.color = 'red';
            return false;
        }


        var surname = document.getElementById("surname").value.length;
        if( surname == 0){
            document.getElementById("surnameError").innerHTML = "dont leave blank";
            document.getElementById("surnameError").style.color = 'red';

            return false;
        }

        if ( !(document.getElementById("gender_f").checked ) && !(document.getElementById("gender_m").checked )){
            document.getElementById("genderError").innerHTML = "select one gender";
            document.getElementById("genderError").style.color = 'red';

            return false;
        }



        var password = document.getElementById("password").value.length;
        if( password == 0){
            document.getElementById("passwordError").innerHTML = "dont leave blank password";
            document.getElementById("passwordError").style.color = 'red';
            return false;
        }
        if(!(password <= 8 && password >=4)){
            document.getElementById("passwordError").innerHTML = "password should be between 4 to 8 letters";
            document.getElementById("passwordError").style.color = 'red';
            return false;
        }


        var phone_no = document.getElementById("phone").value;
        if( phone_no.length == 0){
            document.getElementById("phoneError").innerHTML = "dont leave blank";
            document.getElementById("phoneError").style.color = 'red';
            return false;
        }
        if( !(phone_no.match(numbers))){
            document.getElementById("phoneError").innerHTML = "enter no.s only";
            document.getElementById("phoneError").style.color = 'red';
            return false;
        }
        if( phone_no.length > 10 || phone_no.length < 10){
            document.getElementById("phoneError").innerHTML = "enter 10 no.s only";
            document.getElementById("phoneError").style.color = 'red';
            return false;
        }

        if( (document.getElementById("date").value == 'date') || (document.getElementById("month").value == 'month') || (document.getElementById("year").value == 'year') ){
            document.getElementById("bdayError").innerHTML = "choose a proper date";
            document.getElementById("bdayError").style.color = 'red';
            return false;
        }

        var address = document.getElementById("address").value.trim().length;
        if( address == 0){
            document.getElementById("addressError").innerHTML = "dont leave address blank";
            document.getElementById("addressError").style.color = 'red';
            return false;
        }


        var email = document.getElementById("email").value.trim();
        if( email.length == 0){
            document.getElementById("emailError").innerHTML = "dont leave blank";
            document.getElementById("emailError").style.color = 'red';
            return false;
        }
        if(!( email.match(mailformat))){
            document.getElementById("emailError").innerHTML = "enter a proper mail id";
            document.getElementById("emailError").style.color = 'red';
            return false;
        }



        var pic = document.getElementById("pic").value.length;
        if( pic == 0){
            document.getElementById("picError").innerHTML = "dont leave blank";
            document.getElementById("picError").style.color = 'red';
            return false;
        }


        //document.frm1.submit();
        //document.getElementById("frm1").submit();
        var cnf = confirm("confirm registation");
        if(cnf == true) {
            alert("registration complete!!");
        }
        else {
            return false;
        }
    }