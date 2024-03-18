// fare form nascosto a cui passare l'indice
function modify(pos, name, lastname, dob, tel, desc){
    document.getElementById('info').style.display = 'none';
    document.getElementById('mod').style.display = 'block';
    document.getElementById('pos').value = pos;
    document.getElementById('name').value = name;
    document.getElementById('lastname').value = lastname;
    document.getElementById('DOB').value = dob;
    document.getElementById('tel').value = tel;
    document.getElementById('desc').innerText = desc;
}
