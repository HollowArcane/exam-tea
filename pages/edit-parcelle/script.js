const form = document.getElementById("form");
const update = form.getAttribute("update");

const select = document.getElementById("variete");
const surface = document.getElementById("surface");

function createParcelle(form)
{
    sendPostRequest("insert-parcelle.php", form, req => {
        if(req.responseText == "success")
        { insertMsg(); }
        else
        { error(); }
    }, () => error());
}

function updateParcelle(id, form)
{
    sendPostRequest(`update-parcelle.php?id=${id}`, form, req => {
        if(req.responseText == "success")
        { updateMsg() }
        else
        { error(); }
    }, () => error());
}

function getParcelle(id)
{
    sendGetRequest(`get-parcelle.php?id=${id}`, req => {
        try
        { setForm(JSON.parse(req.responseText)); }
        catch (err)
        { error(); }
    }, () => error());
}

function setForm(data)
{
    surface.value = data.surface;
    select.value = data.variete;
}

function addVarieteOptions(select, data)
{
    select.replaceChildren();
    for(let item of data)
    { select.append(newNode("option", { value: item.id }, [ textNode(item.nom) ])); }
}

function loadVariete(select)
{
    sendGetRequest(`../list-variete/get-varietes.php`, req => {
        try
        { addVarieteOptions(select, JSON.parse(req.responseText)); }
        catch (err)
        { error(); }
    }, () => error());
}

loadVariete(select);

if(update != "")
{ getParcelle(update); }

form.addEventListener("submit", e => {
    e.preventDefault();
    update != "" ? updateParcelle(update, form): createParcelle(form);
})