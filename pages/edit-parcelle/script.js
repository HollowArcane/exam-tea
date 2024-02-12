const form = document.getElementById("form");
const select = document.getElementById("variete");
let modeUpdate = false;

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
        {
            const data = JSON.parse(req.responseText);
        }
        catch (error)
        { error(); }
    }, () => error());
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
        { addVarieteOptions(JSON.parse(req.responseText)); }
        catch (error)
        { error(); }
    }, () => error());
}

loadVariete(select);
form.addEventListener("submit", e => {
    e.preventDefault();
    modeUpdate ? updateParcelle(form): createParcelle(form);
})