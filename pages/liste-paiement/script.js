const form = document.getElementById("form");
const tableBody = document.getElementById("list");

function setTable(tableBody, data, keys)
{
    tableBody.replaceChildren();
    for(let item of data)
    {
        const columns = keys.map(key => newNode("td", {}, [textNode(item[key])]));
        tableBody.append(newNode("tr", {}, columns));
    }
}

function getPaiements(tableBody, form)
{
    sendPostRequest("get-paiement.php", form, req => {
        try
        { setTable(tableBody, JSON.parse(req.responseText), [ "date", "nom", "quantite", "bonus", "montant" ]); }
        catch (err)
        {
            console.log(err);
            error();
        }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    getPaiements(tableBody, form);
});