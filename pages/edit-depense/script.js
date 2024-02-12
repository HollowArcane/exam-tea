const form = document.getElementById("form");
const select = document.getElementById("choix");

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
        { console.log(err); error(); }
    }, () => error());
}

function loadCategories(select)
{ loadOptions(select, `../list-depense-category/get-depenses.php`, { value: "id", label: "description" }); }

function createDepense(form)
{
    sendPostRequest("insert-depense.php", form, req => {
        if(req.responseText == "success")
        { insertMsg(); }
        else
        { error(); }
    }, () => error());
}

loadCategories(select);
form.addEventListener("submit", e => {
    e.preventDefault();
    createDepense(form);
})