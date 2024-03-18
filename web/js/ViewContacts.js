function display(name, lastname, dob, tel, desc){ 
    var box = document.getElementById("text");
    var str = "<b>Name:</b> " + name + "<br/><b>Lastname:</b> " + lastname + "<br/><b>Birthdate:</b> " + dob + "<br/><b>Tel:</b> " + tel;
    box.innerHTML = str;
    document.getElementById("mockup").style.display = "block";
    document.getElementById("mockup").style.marginTop = "15px";
    document.getElementById("mockup").style.marginBottom = "15px";
    document.getElementById("desc").innerHTML = '<b>Description:</b><br/>' + desc;
    document.getElementById("desc").style.marginTop = "15px";
}
