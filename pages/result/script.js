const form = document.getElementById("form");
const tableBody = document.getElementById("table-body");

function setTableData(tableBody, data)
{
    console.log(data);
    tableBody.replaceChildren();
    for(let item of data.poids_restant)
    {
        tableBody.append(newNode("tr", {}, [
            newNode("td", {}, [textNode(item.id_parcelle)]),
            newNode("td", {}, [textNode(item.reste)])
        ]));
    }

    tableBody.append(newNode("tr", {}, [
        newNode("td", {}, [textNode("Ventes Total")]),
        newNode("td", {}, [textNode(data.vente || 0)])
    ]), newNode("tr", {}, [
        newNode("td", {}, [textNode("Depenses Total")]),
        newNode("td", {}, [textNode(data.depense)])
    ]), newNode("tr", {}, [
        newNode("td", {}, [textNode("Bénéfice")]),
        newNode("td", {}, [textNode(parseFloat(data.vente) - parseFloat(data.depense))])
    ]), newNode("tr", {}, [
        newNode("td", {}, [textNode("Poids Total")]),
        newNode("td", {}, [textNode(data.poids_total)])
    ]), newNode("tr", {}, [
        newNode("td", {}, [textNode("Coût de revient par kg")]),
        newNode("td", {}, [textNode(parseFloat(data.depense || 0)/parseFloat(data.poids_total || 0))])
    ]));
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