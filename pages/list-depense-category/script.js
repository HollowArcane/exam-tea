const button = document.getElementById("btn");

function createDepense(depense)
{ console.log(depense); }

function deleteDepense(id)
{
    sendGetRequest(`delete-depense.php?id=${id}`, req => {
        try
        { console.log(req.responseText); }
        catch (error)
        { error(); }
    }, () => error());
}

function getDepenses()
{
    sendGetRequest("get-depenses.php", req => {
        try
        {
            const data = JSON.parse(req.responseText);
            for(depense of data)
            { createDepense(depense); }
        }
        catch (error)
        { error(); }
    }, () => error());
}

getDepenses();
button.addEventListener("click", e => deleteDepense("0"));