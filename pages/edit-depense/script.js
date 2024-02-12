const form = document.getElementById("form");

function createCueillette(form)
{
    sendPostRequest("insert-cueillette.php", form, req => {
        if(req.responseText == "success")
        {  }
        else
        { error(); }
    }, error);
}

form.addEventListener("submit", e => {
    e.preventDefault();
    createCueillette(form);
})