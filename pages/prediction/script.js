const form = document.getElementById("form");
const cropWrap = document.getElementById("crop-wrap");

const images = [ "the-vert.jpg", "c.jpg", "the-noir.jpg", "the-noir-ou-the-rouge_1.jpg", "image.jpg" ];

function randomImage()
{
    let rand = parseInt(Math.random() * images.length);
    return images[rand];
}

function createCrops(cropWrap, data)
{
    cropWrap.replaceChildren();
    let montantTotal = 0;
    let poidsTotal = 0;

    for(let item of data)
    {
        montantTotal += parseFloat(item.montant);
        poidsTotal += parseFloat(item.reste);
        cropWrap.append(createCrop(item));
    }

    const spanMontant = document.getElementById("montant-total");
    spanMontant.textContent = montantTotal;

    const spanPoids = document.getElementById("poids-total");
    spanPoids.textContent = `${poidsTotal} kg`;
}

function createCrop(data)
{
    const crop = newNode("div", { class: "aff" }, [
        newNode("h3", {}, [ textNode(`Parcelle #${data.id}`) ]),
        newNode("div", { class: "nom" }, [ newNode("h2", {}, [ textNode(data.nom) ]) ]),
        newNode("div", { class: "information" }, [
            newNode("h3", {}, [ textNode(data.surface) ]),
            newNode("div", { class: "image" }, [
                newNode("img", { src: `../../assets/img/${randomImage()}` }, [])
            ]),
            newNode("p", {}, [ `Nombre de pied: ${data.nombre_pieds}` ]),
            newNode("p", {}, [ `Poids restant: ${data.reste} kg` ])
        ])
    ]);

    return crop;
}

function getPrediction(cropWrap, form)
{
    sendPostRequest("get-prediction.php", form, req => {
        try
        {
            console.log(req.responseText);
            createCrops(cropWrap, JSON.parse(req.responseText));    
            alert("Données récupérées avec succès");
        }
        catch (err)
        {
            console.log(err);
            error();
        }
    }, () => error());
}

form.addEventListener("submit", e => {
    e.preventDefault();
    getPrediction(cropWrap, form);
});