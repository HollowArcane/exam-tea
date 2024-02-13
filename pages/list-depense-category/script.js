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
        btnDelete.addEventListener("click", e => deleteDepense(item.id));
        btnUpdate.addEventListener("click", e => { window.location = `../edit-depense-category?id=${item.id}` });

        columns.push(newNode("td", {}, [btnUpdate]), newNode("td", {}, [btnDelete]));

        tableBody.append(newNode("tr", {}, columns));
    }
}

function deleteDepense(id)
{
    sendGetRequest(`delete-depense.php?id=${id}`, req => {
        try
        {
            if(req.responseText == "success")
            { getDepenses(tableBody); }
        }
        catch (err)
        { error(); }
    }, () => error());
}

function getDepenses(tableBody)
{
    sendGetRequest("get-depenses.php", req => {
        try
        { setTable(tableBody, JSON.parse(req.responseText), ["description"]); }
        catch (err)
        {
            console.log(err);
            error();
        }
    }, () => error());
}

getDepenses(tableBody);