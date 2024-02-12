const button = document.getElementById("btn");

function createCueilleur(cueilleur)
{ console.log(cueilleur); }

function deleteCueilleur(id)
{
    sendGetRequest(`delete-cueilleur.php?id=${id}`, req => {
        try
        { console.log(req.responseText); }
        catch (error)
        { error(); }
    }, () => error());
}

function getCueilleurs()
{
    sendGetRequest("get-cueilleurs.php", req => {
        try
        {
            const data = JSON.parse(req.responseText);
            for(cueilleur of data)
            { createCueilleur(cueilleur); }
        }
        catch (error)
        { error(); }
    }, () => error());
}

getCueilleurs();
button.addEventListener("click", e => deleteCueilleur("0"));