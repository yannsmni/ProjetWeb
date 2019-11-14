let xhr = new XMLHttpRequest();
let searchBar = document.querySelector('.search_bar input');
let tbody = document.querySelector('.tbody_evenements');

searchBar.addEventListener('keyup', function () 
{
    let value = searchBar.value;
    xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) 
    {

        let data = JSON.parse(xhr.responseText);
        let divProds = document.querySelectorAll('.admin_event');

        console.log(data)

        for (let i = 0; i < divProds.length; i++) 
        {
            divProds[i].parentNode.removeChild(divProds[i]);
        }

        for (let j = 0; j < data.length; j++) 
        {
            let tr = document.createElement('tr');
            let td1 = document.createElement('td');
            let td2 = document.createElement('td');
            let td3 = document.createElement('td');
            let td4 = document.createElement('td');
            let td5 = document.createElement('td');
            let td6 = document.createElement('td');
            let link1 = document.createElement('a');
            let link2 = document.createElement('a');

            console.log(data[j])
            console.log(data[j].Id)

            tr.classList.add('admin_event')
            td1.innerText = data[j].nom;
            td1.classList.add('font-weight-bold');
            td2.innerText = data[j].prix;
            td2.classList.add('font-weight-bold');
            td3.innerText = data[j].statut;
            td4.innerText = data[j].Date;
            td5.innerText = data[j].Date_creation;
            link1.setAttribute('href', '/administration/evenements/edit/'+data[j].id)
            link1.innerText = "Modifier";
            link1.classList.add('btn btn-primary');
            link2.setAttribute('href', '/administration/evenements/delete/'+data[j].id)
            link2.innerText = "Supprimer";
            link2.classList.add('btn btn-danger');

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td6);
            td6.appendChild(link1);
            td6.appendChild(link2);
            tbody.appendChild(tr);
        }
    }
};

xhr.open('GET', '/administration/evenements/' + value);
xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
xhr.send();
});