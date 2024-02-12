const form = document.getElementById("form");

function createDepense(form)
{
    sendPostRequest("insert-cueillette.php", form, req => {
        if(req.responseText == "success")
        { insertMsg(); }
        else
        { error(); }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    createDepense(form);
})