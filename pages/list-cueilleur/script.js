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
        btnUpdate.addEventListener("click", e => { window.location = `../edit-cueilleur?id=${item.id}` });
        btnDelete.addEventListener("click", e => deleteCueilleur(item.id));

        columns.push(newNode("td", {}, [btnUpdate]), newNode("td", {}, [btnDelete]));

        tableBody.append(newNode("tr", {}, columns));
    }
}

function deleteCueilleur(id)
{
    sendGetRequest(`delete-cueilleur.php?id=${id}`, req => {
        try
        {
            if(req.responseText == "success")
            { getDepenses(tableBody); }
            else
            { error(); }
        }
        catch (err)
        { error(); }
    }, () => error());
}

function getCueilleurs(tableBody)
{
    sendGetRequest("get-cueilleurs.php", req => {
        try
        { setTable(tableBody, JSON.parse(req.responseText), ["nom", "genre", "naissance", "salaire"]); }
        catch (error)
        { error(); }
    }, () => error());
}

getCueilleurs(tableBody);