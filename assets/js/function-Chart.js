function createChart(element, options)
{ return new Chart(element, options); }

function pieChartOptions(labels, data)
{
    return {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#EF5350', '#7E57C2', '#26A69A', '#FFA000', '#AB47BC', '#2196F3', '#CDDC39', '#8D6E63'],
            }]
          }
    };
}

function graphChartDataset(label, values, color, lineTension)
{
    return {
        label: label,
        data: values,
        borderColor: color,
        pointRadius: 5,
        pointHoverRadius: 10,
        lineTension: lineTension
    }
}

function graphChartDatasets(data, lineTension = .3)
{
    const colors = ['#EF5350', '#7E57C2', '#26A69A', '#FFA000', '#AB47BC', '#2196F3', '#CDDC39', '#8D6E63'];
    const datasets = [];

    let i = 0;
    for(let key in data)
    {
        datasets.push(graphChartDataset(key, data[key], colors[i], lineTension));
        i = (i + 1) % colors.length;
    }

    return datasets;
}

function graphChartOptions(labels, datasets)
{
    return {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        }
    };
}