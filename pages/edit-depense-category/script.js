const form = document.getElementById("form");
const update = form.getAttribute("update");

const nom = document.getElementById("nom");

function createCategory(form)
{
    sendPostRequest("insert-category.php", form, req => {
        if(req.responseText == "success")
        { insertMsg(); }
        else
        { error(); }
    }, () => error());
}

function updateCategory(id, form)
{
    sendPostRequest(`update-category.php?id=${id}`, form, req => {
        if(req.responseText == "success")
        { updateMsg(); }
        else
        { error(); }
    }, () => error());
}

function getCategory(id)
{
    sendGetRequest(`get-category.php?id=${id}`, req => {
        try
        { setForm(JSON.parse(req.responseText));  }
        catch (err)
        { error(); }
    }, () => error());
}

function setForm(data)
{ nom.value = data.description; }

if(update != "")
{ getCategory(update); }

form.addEventListener("submit", e => {
    e.preventDefault();
    update != "" ? updateCategory(update, form): createCategory(form);
})