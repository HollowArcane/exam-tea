const form = document.getElementById("form");
const tableBody = document.getElementById("table-body");

function setTableData(tableBody, data)
{
    tableBody.append(newNode("tr", {}, [
        newNode("td", {}, ["Cueillette Total"]),
        newNode("td", {}, ["Prix de revient/kg"])
    ]), newNode("tr", {}, [
        newNode("td", {}, [textNode(data.poids_total)]),
        newNode("td", {}, [textNode(parseInt(data.cout_revient)/parseInt(data.poids_total))])
    ]));

    for(let item of data.poids_restant)
    {
        tableBody.append(newNode("tr", {}, [
            newNode("td", {}, [textNode(item.id_parcelle)]),
            newNode("td", {}, [textNode(item.reste)])
        ]));
    }
}

function getInfos(tableBody, form)
{
    const url = "get-results.php";
    sendPostRequest(url, form, req => {
        try
        {
            setTableData(tableBody, JSON.parse(req.responseText));
            alert("Données récupérées avec succès");
        }
        catch (err)
        { error(); }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    getInfos(tableBody, form);
});