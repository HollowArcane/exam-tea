const season = document.getElementById("form");

const forms = [
    document.getElementById("min-poids-form"),
    document.getElementById("bonus-form"),
    document.getElementById("malus-form")
];
const labels = ["poids minimum", "bonus", "malus"];

const inputs = [
    document.getElementById("min-poids-input"),
    document.getElementById("bonus-input"),
    document.getElementById("malus-input")
];
const months = ["janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre"];

function getConfiguration(inputs, months)
{
    sendGetRequest("get-configuration.php", req => {
        try
        {
            const data = JSON.parse(req.responseText);
            inputs[0].value = data.min_poids;
            inputs[1].value = data.bonus;
            inputs[2].value = data.malus;

            for(let month of data.saison)
            {
                const checkbox = document.getElementById(months[parseInt(month.mois) - 1]);
                checkbox.setAttribute("checked", "");
            }
        }
        catch (err)
        {
            console.log(err);
            error();
        }
    }, () => error());
}

function updateConfiguration(form, label)
{
    sendPostRequest(`update-configuration.php?label=${label}`, form, req => {
        if(req.responseText == "success")
        { updateMsg(); }
        else
        { error(); }
    }, () => error);
}

function updateSeasons(form)
{
    sendPostRequest(`update-season.php`, form, req => {
        if(req.responseText == "success")
        { updateMsg(); }
        else
        { error(); }
    }, () => error());
}

season.addEventListener("submit", e => {
    e.preventDefault();
    updateSeasons(season);
});

for(let i in forms)
{
    const form = forms[i];
    form.addEventListener("submit", e => {
        e.preventDefault();
        updateConfiguration(form, labels[i]);
    })
}

getConfiguration(inputs, months);