function formatDate(dateObject)
{
  const year = dateObject.getFullYear();
  const month = String(dateObject.getMonth() + 1).padStart(2, '0');
  const day = String(dateObject.getDate()).padStart(2, '0');

  const formattedDate = `${year}-${month}-${day}`;
  return formattedDate;
}

function getDates(firstDay, lastDay)
{
    const dates = [];

    for (let currentDate = firstDay; currentDate <= lastDay; currentDate.setDate(currentDate.getDate() + 1))
    { dates.push(currentDate); }

    return dates;
}

function getDatesOfMonth(month = new Date().getMonth(), year = new Date().getFullYear())
{
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);

    return getDates(firstDay, lastDay);
}