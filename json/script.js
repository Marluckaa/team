document.addEventListener("DOMContentLoaded", function () {
    // Fetch data from the JSON file
    fetch('data.json')
        .then(response => response.json())
        .then(data => displayData(data))
        .catch(error => console.error('Error fetching data:', error));
});

function displayData(data) {
    // Access the table body element
    const tbody = document.getElementById('data-body');

    // Loop through the data and create table rows
    data.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>$${item.price.toFixed(2)}</td>
        `;
        tbody.appendChild(row);
    });
}
