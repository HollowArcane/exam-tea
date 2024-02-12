const form = document.getElementById("form");
let modeUpdate = false;

function createParcelle(form)
{
    sendPostRequest("insert-parcelle.php", form, req => {
        if(req.responseText == "success")
        {  }
        else
        { error(); }
    }, error);
}

function updateParcelle(id, form)
{
    sendPostRequest(`update-parcelle.php?id=${id}`, form, req => {
        if(req.responseText == "success")
        {  }
        else
        { error(); }
    }, error);
}

function getParcelle(id)
{
    sendGetRequest(`get-parcelle.php${id}`, req => {
        try
        {
            const data = JSON.parse(req.responseText);
        }
        catch (error)
        { error(); }
    }, error);
}

form.addEventListener("submit", e => {
    e.preventDefault();
    modeUpdate ? createParcelle(form): updateParcelle(form);
})