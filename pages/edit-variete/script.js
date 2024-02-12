const form = document.getElementById("form");
let modeUpdate = false;

function createVariete(form)
{
    sendPostRequest("insert-variete.php", form, req => {
        if(req.responseText == "success")
        {  }
        else
        { error(); }
    }, error);
}

function updateVariete(id, form)
{
    sendPostRequest(`update-variete.php?id=${id}`, form, req => {
        if(req.responseText == "success")
        {  }
        else
        { error(); }
    }, error);
}

function getVariete(id)
{
    sendGetRequest(`get-variete.php?id=${id}`, req => {
        try
        {
            const data = JSON.parse(req.responseText);
        }
        catch (error)
        { error(); }
    }, error);
}

form.addEventListener("submit", e => {
    e.preventDefault();
    modeUpdate ? createVariete(form): updateVariete(form);
})