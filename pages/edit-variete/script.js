const form = document.getElementById("form");
const update = form.getAttribute("update");

const nom = document.getElementById("nom");
const occupation = document.getElementById("Occupation");
const rendement = document.getElementById("rendement");

function createVariete(form)
{
    sendPostRequest("insert-variete.php", form, req => {
        if(req.responseText == "success")
        { insertMsg(); }
        else
        { error(); }
    }, () => error());
}

function updateVariete(id, form)
{
    sendPostRequest(`update-variete.php?id=${id}`, form, req => {
        if(req.responseText == "success")
        { updateMsg(); }
        else
        { error(); }
    }, () => error());
}

function getVariete(id)
{
    sendGetRequest(`get-variete.php?id=${id}`, req => {
        try
        {  setForm(JSON.parse(req.responseText));  }
        catch (error)
        { error(); }
    }, () => error());
}

function setForm(data)
{
    nom.value = data.nom;
    occupation.value = data.occupation;
    rendement.value = data.rendement;
}

if(update != "")
{ getVariete(update); }

form.addEventListener("submit", e => {
    e.preventDefault();
    update != "" ? updateVariete(update, form): createVariete(form);
})