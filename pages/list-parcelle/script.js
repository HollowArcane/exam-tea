const button = document.getElementById("btn");
const tableBody = document.getElementById("liste");

function setTable(tableBody, data, keys)
{
    tableBody.replaceChildren();
    for(let item of data)
    {
        const columns = keys.map(key => newNode("td", {}, [textNode(item[key])]));
        const btnUpdate = newNode("button", {id:"modify"}, [textNode("Update")]);
        const btnDelete = newNode("button", {id:"delete"}, [textNode("Delete")]);
        btnUpdate.addEventListener("click", e => { window.location = `../edit-parcelle?id=${item.id}` });
        btnDelete.addEventListener("click", e => deleteParcelle(item.id));

        columns.push(newNode("td", {}, [btnUpdate]), newNode("td", {}, [btnDelete]));

        tableBody.append(newNode("tr", {}, columns));
    }
}

function deleteParcelle(id)
{
    sendGetRequest(`delete-parcelle.php?id=${id}`, req => {
        try
        {
            if(req.responseText == "success")
            { getParcelles(tableBody); }
            else
            { error(); }
        }
        catch (err)
        { error(); }
    }, () => error());
}

function getParcelles(tableBody)
{
    sendGetRequest("get-parcelles.php", req => {
        try
        { setTable(tableBody, JSON.parse(req.responseText), ["surface", "variete"]); }
        catch (error)
        { error(); }
    }, () => error());
}

getParcelles(tableBody);