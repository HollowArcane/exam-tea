const form = document.getElementById("form");

function handle_login(form)
{
    sendPostRequest("handle-login.php", form, req => {
        if(req.responseText == "success")
        { window.location = "../result"; }
        else
        { error(); }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    handle_login(form);
})