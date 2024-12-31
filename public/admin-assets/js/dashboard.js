$(document).ready(function() {
    "use strict";
    createrevenuechart(revenue_lables, revenue_data);
    createpiechart(piechart_lables, piechart_data);
});
function createrevenuechart(revenue_lables, revenue_data) {
    "use strict";
    if (revenue_chart != null) {
        revenue_chart.destroy();
    }
    revenue_chart = new Chart(document.getElementById('linechart'), {
        type: 'line',
        data: {
            labels: revenue_lables,
            datasets: [{
                label: 'Revenue',
                data: revenue_data,
                fill: {
                    target: 'origin',
                    above:'#fbd6bd',
                },
                borderColor: '#fbd6bd',
                tension: 0.1,
                pointBackgroundColor: '#F15A24',
                pointBorderColor: '#F15A24',
            }]
        }
    });
}
$('#revenue_year').on('change',function() {
    "use strict";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: location.href,
        type: 'get',
        dataType: 'json',
        data: {
            revenue_year: $(this).val(),
        },
        success: function(response) {
            createrevenuechart(response.revenue_lables, response.revenue_data);
        },
    });
});
function createpiechart(piechart_lables, piechart_data) {
    "use strict";
    if (piechart != null) {
        piechart.destroy();
    }
    piechart = new Chart(document.getElementById('piechart'), {
        type: 'pie',
        data: {
            labels: piechart_lables,
            datasets: [{
                label: 'Total Count : ',
                data: piechart_data,
                backgroundColor: ['rgba(54, 162, 235, 0.4)', 'rgba(255, 150, 86, 0.4)',
                    'rgba(140, 162, 198, 0.4)', 'rgba(255, 206, 86, 0.4)',
                    'rgba(255, 99, 132, 0.4)',
                    'rgba(255, 159, 64, 0.4)', 'rgba(255, 205, 86, 0.4)',
                    'rgba(75, 192, 192, 0.4)',
                    'rgba(54, 170, 235, 0.4)', 'rgba(153, 102, 255, 0.4)',
                    'rgba(201, 203, 207, 0.4)',
                    'rgba(255, 159, 64, 0.4)',
                ],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 150, 86, 1)',
                    'rgba(140, 162, 198, 1)',
                    'rgba(255, 206, 86, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(54, 170, 235, 1)',
                    'rgba(153, 102, 255, 1)', 'rgba(201, 203, 207, 1)', 'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 2,
                hoverOffset: 5
            }]
        },
        options: {
            maintainAspectRatio: false,
        }
    });
}
$('#booking_year').on('change', function() {
    "use strict";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: location.href,
        type: 'get',
        dataType: 'json',
        data: {
            booking_year: $(this).val(),
        },
        success: function(response) {
            createpiechart(response.piechart_lables, response.piechart_data);
        },
    });
});