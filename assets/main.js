const url_string = location.href;
const url = new URL(url_string);
const add_emp = url.searchParams.get("add_emp");
const edit_emp = url.searchParams.get("edit_emp");
const del_emp = url.searchParams.get("delete");


if (add_emp == "ok") {
    alert("Elave edildi.");
    refreshPage();
} else if (add_emp == "no") {
    alert("Xeta bas verdi.");
    refreshPage();
}

if (edit_emp == "ok") {
    alert("Redakte edildi.");
    refreshPage();
} else if (edit_emp == "no") {
    alert("Xeta bas verdi.");
    refreshPage();
}

if (del_emp == "ok") {
    alert("Ugurla silindi.");
    refreshPage();
} else if (del_emp == "no") {
    alert("Xeta bas verdi.");
    refreshPage();
}


function refreshPage() {
    location.href = "https://localhost/dersPHP/CRUD/";
}



function deleteEmp(id, name) {
    let conf = confirm(`Siz ${name} telebesinin melumatlarini silirsiz.`);
    if (conf) {
        location.href = `index.php?delete=ok&id=${id}`;
    } else {
        alert("Imtina edildi.");
    }
}

function editView(id) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "./app/ajax.php");
    xhttp.onload = function () {
        const data = JSON.parse(this.responseText);
        
        
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_fullname').value = data.adsoyad;
        document.getElementById('edit_specialty').value = data.ixtisas;
        document.getElementById('edit_phone').value = data.telefon;
        document.getElementById('edit_gender').value = data.cinsi;

        $('#edit').modal('show');

    };
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`id=${id}&view=ok`);
}