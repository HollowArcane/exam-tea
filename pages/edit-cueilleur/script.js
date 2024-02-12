const form = document.getElementById("form");
let modeUpdate = false;

function createCueilleur(form)
{
    sendPostRequest("insert-cueilleur.php", form, req => {
        if(req.responseText == "success")
        { insertMsg(); }
        else
        { error(); }
    }, () => error());
}

function updateCueilleur(id, form)
{
    sendPostRequest(`update-cueilleur.php?id=${id}`, form, req => {
        if(req.responseText == "success")
        { updateMsg(); }
        else
        { error(); }
    }, () => error());
}

function getCueilleur(id)
{
    sendGetRequest(`get-cueilleur.php?id=${id}`, req => {
        try
        { const data = JSON.parse(req.responseText); }
        catch (error)
        { error(); }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    modeUpdate ? updateCueilleur(form): createCueilleur(form);
})