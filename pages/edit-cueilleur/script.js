const form = document.getElementById("form");
const update = form.getAttribute("update");

const nom = document.getElementById("nom");
const gender = document.getElementById("genre");
const naissance = document.getElementById("dtn");
const salaire = document.getElementById("salaire");

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
        { setForm(JSON.parse(req.responseText)); }
        catch (err)
        { error(); }
    }, () => error());
}

function setForm(data)
{
    nom.value = data.nom;
    gender.value = data.genre;
    naissance.value = data.naissance;
    salaire.value = data.salaire;
}

if(update != "")
{ getCueilleur(update); }

form.addEventListener("submit", e => {
    e.preventDefault();
    update != "" ? updateCueilleur(update, form): createCueilleur(form);
})