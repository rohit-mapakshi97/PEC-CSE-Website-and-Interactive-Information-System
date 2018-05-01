 var person;
    var xp = new XMLHttpRequest();
    xp.open('GET', 'json/rohit.json', true);
    xp.responseType = "text";
    xp.send();

    xp.onload = function () {
        if (xp.status == 200) {
            person = JSON.parse(xp.responseText);
            console.log(person);
            console.log(xp.status);
            document.getElementById("profname").innerHTML = person.name;
            document.getElementById("profdesignation").innerHTML = person.designation;
            document.getElementById("profspecialization").innerHTML = person.specialization;
            console.log(person.name);
        }
    }