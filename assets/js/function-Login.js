function login()
{
    sendPostRequest("handle-login.php", form, req => {
        if(req.responseText == "success")
        { window.location = "../home"; }
        else
        { alert(req.responseText); }
    });
}