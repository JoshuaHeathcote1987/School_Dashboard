var ctx = document.getElementById('lineChart').getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Parents',
            fill: false,
            data: [8, 23, 12, 18, 9],
            backgroundColor: [
                'rgba(255, 0, 0, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(255, 0, 0, 1)',

            ],
            borderColor: [
                'rgba(255, 0, 0, 1)',
            ],
            borderWidth: 1
        },
        {
            label: 'Students',
            fill: false,
            data: [4, 12, 6, 9, 18],
            backgroundColor: [
                'rgba(0, 0, 255, 1)',
                'rgba(0, 0, 255, 1)',
                'rgba(0, 0, 255, 1)',
                'rgba(0, 0, 255, 1)',
                'rgba(0, 0, 255, 1)',

            ],
            borderColor: [
                'rgba(0, 0, 255, 1)',
            ],
            borderWidth: 1
        }
    ]},
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});