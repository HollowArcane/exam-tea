const form = document.getElementById("form");

function createCategory(form)
{
    sendPostRequest("insert-category.php", form, req => {
        if(req.responseText == "success")
        { insertMsg(); }
        else
        { error(); }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    createCategory(form);
})