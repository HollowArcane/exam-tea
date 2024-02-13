const form = document.getElementById("form");
const cropWrap = document.getElementById("crop-wrap");

function createCrops(cropWrap, data)
{
    cropWrap.replaceChildren();
    for(let item of data)
    { cropWrap.append(createCrop(item)); }
}

function createCrop(data)
{
    console.log(data);
    const crop = document.createElement("div");

    return crop;
}

function getPrediction(form)
{
    sendPostRequest("get-prediction.php", form, req => {
        try
        {
            createCrops(JSON.parse(req.responseText));    
            alert("Données récupérées avec succès");
        }
        catch (err)
        { error(); }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    getPrediction(form);
});