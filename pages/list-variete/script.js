const button = document.getElementById("btn");

function createVariete(variete)
{ console.log(variete); }

function deleteVariete(id)
{
    sendGetRequest(`delete-variete.php?id=${id}`, req => {
        try
        { console.log(req.responseText); }
        catch (error)
        { error(); }
    }, () => error());
}

function getVarietes()
{
    sendGetRequest("get-varietes.php", req => {
        try
        {
            const data = JSON.parse(req.responseText);
            for(variete of data)
            { createVariete(variete); }
        }
        catch (error)
        { error(); }
    }, () => error());
}

getVarietes();
button.addEventListener("click", e => deleteVariete("0"));