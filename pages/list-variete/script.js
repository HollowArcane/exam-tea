const button = document.getElementById("btn");
const tableBody = document.getElementById("liste");

function setTable(tableBody, data, keys)
{
    console.log(data);
    tableBody.replaceChildren();
    for(let item of data)
    {
        const columns = keys.map(key => newNode("td", {}, [textNode(item[key])]));
        const btnUpdate = newNode("button", {id:"modify"}, [textNode("Update")]);
        const btnDelete = newNode("button", {id:"delete"}, [textNode("Delete")]);
        btnUpdate.addEventListener("click", e => { window.location = `../edit-variete?id=${item.id}` });
        btnDelete.addEventListener("click", e => deleteVariete(item.id));

        columns.push(newNode("td", {}, [btnUpdate]), newNode("td", {}, [btnDelete]));

        tableBody.append(newNode("tr", {}, columns));
    }
}

function createVariete(variete)
{ console.log(variete); }

function deleteVariete(id)
{
    sendGetRequest(`delete-variete.php?id=${id}`, req => {
        try
        {
            if(req.responseText == "success")
            { getVarietes(tableBody); }
            else
            { error(); }
        }
        catch (err)
        { error(); }
    }, () => error());
}

function getVarietes()
{
    sendGetRequest("get-varietes.php", req => {
        try
        { setTable(tableBody, JSON.parse(req.responseText), ["nom", "occupation", "rendement", "prix"]); }
        catch (error)
        { error(); }
    }, () => error());
}

getVarietes(tableBody);