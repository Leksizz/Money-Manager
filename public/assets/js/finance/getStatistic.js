$(document).ready(function () {
    const url = (location.pathname.split('/'))
    $.ajax({
        url: '/api/statistic/' + url[2],
        method: 'GET',
        dataType: 'json',
    })
        .done(function (data) {

            let incomeAmount = 0;
            let expenseAmount = 0;

            const incomes = data.data.income
            const expenses = data.data.expense

            if (!incomes.length && !expenses.length) {
                return emptyChart();
            }

            if (incomes.length) {
                for (let i = 0; i < incomes.length; i++) {
                    incomeAmount = parseInt(incomes[i].amount) + incomeAmount;
                }
            }

            if (expenses.length) {
                for (let i = 0; i < expenses.length; i++) {
                    expenseAmount = parseInt(expenses[i].amount) + expenseAmount;
                }
            }

            renderChart([incomeAmount, expenseAmount]);
        })
})

function renderChart(data, chartElementId = "doughnut-chart") {
    if (currentChart) {
        currentChart.destroy();
    }

    currentChart = new Chart(document.getElementById(chartElementId), {
        type: 'doughnut',
        data: {
            labels: ["Доходы", "Расходы"],
            datasets: [
                {
                    label: "Сумма",
                    backgroundColor: ["#fa0", "#4a4343"],
                    data: [data[0], data[1]]
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

let currentChart;

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
