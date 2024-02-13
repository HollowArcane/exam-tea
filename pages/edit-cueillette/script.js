const form = document.getElementById("form");
const parcelle = document.getElementById("parcelle");
const cueilleur = document.getElementById("cueilleur");
const poids = document.getElementById("poids");

function addOptions(select, data, keys)
{
    select.replaceChildren();
    for(let item of data)
    { select.append(newNode("option", { value: item[keys.value] }, [ textNode(item[keys.label]) ])); }
}

function loadOptions(select, link, keys)
{
    sendGetRequest(link, req => {
        try
        { addOptions(select, JSON.parse(req.responseText), keys); }
        catch (err)
        { error(); }
    }, () => error());
}

function loadCueilleur(select)
{ loadOptions(select, `../list-cueilleur/get-cueilleurs.php`, { value: "id", label: "nom" }); }

function loadParcelle(select)
{ loadOptions(select, `../list-parcelle/get-parcelles.php`, { value: "id", label: "id" }); }


function createCueillette(form)
{
    sendPostRequest(`get-poids-restant.php`, form, req => {
        try
        {
            console.log(parseFloat(poids.value));
            console.log(parseInt(req.responseText));
            if(parseFloat(poids.value) <= parseFloat(req.responseText))
            {
                sendPostRequest("insert-cueillette.php", form, req => {
                    if(req.responseText == "success")
                    { insertMsg(); }
                    else
                    { error(); }
                }, () => error());
            }
            else
            { error(); }
        }
        catch (err)
        { error(); }
        
    }, () => error());
}

loadCueilleur(cueilleur);
loadParcelle(parcelle);
form.addEventListener("submit", e => {
    e.preventDefault();
    createCueillette(form);
})