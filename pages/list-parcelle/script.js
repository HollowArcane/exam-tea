const button = document.getElementById("btn");

function createParcelle(parcelle)
{ console.log(parcelle); }

function deleteParcelle(id)
{
    sendGetRequest(`delete-parcelle.php?id=${id}`, req => {
        try
        { console.log(req.responseText); }
        catch (error)
        { error(); }
    }, () => error());
}

function getParcelles()
{
    sendGetRequest("get-parcelles.php", req => {
        try
        {
            const data = JSON.parse(req.responseText);
            for(parcelle of data)
            { createParcelle(parcelle); }
        }
        catch (error)
        { error(); }
    }, () => error());
}

getParcelles();
button.addEventListener("click", e => deleteParcelle("0"));