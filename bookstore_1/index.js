function myfunction(){
    var x = document.getElementById("pwd");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");

    if(x.type === 'password'){
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
    }
    else{
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
    }
}

function myfunction1(){
    var ax = document.getElementById("cpwd");
    var ay = document.getElementById("hide3");
    var az = document.getElementById("hide4");

    if(ax.type === 'password'){
        ax.type = "text";
        ay.style.display = "block";
        az.style.display = "none";
    }
    else{
        ax.type = "password";
        ay.style.display = "none";
        az.style.display = "block";
    }
}
function myfunction2(){
    var bx = document.getElementById("pwd1");
    var by = document.getElementById("hide5");
    var bz = document.getElementById("hide6");

    if(bx.type === 'password'){
        bx.type = "text";
        by.style.display = "block";
        bz.style.display = "none";
    }
    else{
        bx.type = "password";
        by.style.display = "none";
        bz.style.display = "block";
    }
}

$('#cpwd').keyup(function(){
    var pwd = $('#pwd').val();
    var cpwd = $('#cpwd').val();

    if(cpwd!=pwd){
        $('#showerror').html('**password is not matching');
        $('#showerror').css('color', 'white');
        return false;
    }
    else{
        $('#showerror').html(''); 
        return true;
    }

})
    