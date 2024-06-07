$(document).ready(function () {
    const url = (location.pathname.split('/'))
    $.ajax({
        url: '/api/' + url[2] + '/today/' + url[3],
        method: 'GET',
        dataType: 'json',
    })
        .done(function (data) {
            const values = matchValues(data.data)

            if (data.data.length) {
                renderChart(values)
            } else {
                emptyChart();
            }
        })
})

$(document).ready(function () {
    $('.dropdown-item').on('click', function (e) {
        e.preventDefault();
        let url = $(this).data('url');
        if (url) {
            $.get(url, function (data) {
                const finance = data.data;

                const values = matchValues(finance);
                if (finance.length) {
                    renderChart(values)
                } else {
                    emptyChart();
                }
            });
        }
    });
});

function matchValues(finance) {

    let values = [
        {name: 'Зарплата', value: 0},
        {name: 'Инвестиции', value: 0},
        {name: 'Лотерея', value: 0},
        {name: 'Подработка', value: 0},
        {name: 'Подарок', value: 0},
        {name: 'Продажа', value: 0},
    ];

    if (window.location.pathname.split('/')[2] === 'expense') {
         values = [
            {name: 'Продукты', value: 0},
            {name: 'Транспорт', value: 0},
            {name: 'Здоровье', value: 0},
            {name: 'Дом', value: 0},
            {name: 'Учеба', value: 0},
            {name: 'Бытовые товары', value: 0},
        ];
    }

    for (let i = 0; i < finance.length; i++) {
        const matchingIndex = values.findIndex(value => value.name === finance[i].category.name);
        if (matchingIndex !== -1) {
            values[matchingIndex].value += Math.round(parseInt(finance[i].amount));
        }
    }
    return values;
}

let currentChart;

function renderChart(data, chartElementId = "doughnut-chart") {
    if (currentChart) {
        currentChart.destroy();
    }

    currentChart = new Chart(document.getElementById(chartElementId), {
        type: 'doughnut',
        data: {
            labels: [data[0].name, data[1].name, data[2].name, data[3].name, data[4].name, data[5].name],
            datasets: [
                {
                    label: "Сумма",
                    backgroundColor: ["#fa0", "#2E8B57", "#6A5ACD", "#e8c3b9", "#008B8B", "#DC143C"],
                    data: [data[0].value, data[1].value, data[2].value, data[3].value, data[4].value, data[5].value]
                }
            ]
        },
        options: {
            title: {
                display: true,
            }
        }
    });
}

function emptyChart() {

    if (currentChart) {
        currentChart.destroy();
    }

    currentChart = new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        data: {
            labels: ["Данные отсутствуют"],
            datasets: [
                {
                    label: "Данные отсутствуют",
                    backgroundColor: ["#808080"],
                    data: [1]
                }
            ]
        },
        options: {
            title: {
                display: true,
            }
        }
    });

}

