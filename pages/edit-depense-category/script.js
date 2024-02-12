const form = document.getElementById("form");

function createDepense(form)
{
    sendPostRequest("insert-depense.php", form, req => {
        if(req.responseText == "success")
        {  }
        else
        { error(); }
    }, error);
}

form.addEventListener("submit", e => {
    e.preventDefault();
    createDepense(form);
})