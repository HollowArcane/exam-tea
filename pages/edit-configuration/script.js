const poids = document.getElementById("min-poids-form");
const bonus = document.getElementById("bonus-form");
const malus = document.getElementById("malus-form");

const season = document.getElementById("form");

const forms = [poids, bonus, malus];
const labels = ["poids minimum", "bonus", "malus"];

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