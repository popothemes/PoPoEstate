// JavaScript Document

$(
    function () {
        $('#line-chart').highcharts(
            {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Snow depth at Vikjafjellet, Norway'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { // don't display the dummy year
                        month: '%e. %b',
                        year: '%b'
                    },
                    title: {
                        text: 'Date'
                    }
                        
                },
                yAxis: {
                    title: {
                        text: 'Snow depth (m)'
                    },
                    min: 0
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
                },

                plotOptions: {
                    spline: {
                        marker: {
                            enabled: true,
                            color: '#808080'
                        }
                    }
                },

                series: [{
                    name: 'Winter 2012-2013',
                    // Define the data points. All series have a dummy year
                    // of 1970/71 in order to be compared on the same x axis. Note
                    // that in JavaScript, months start at 0 for January, 1 for February etc.
                    data: [
                    [Date.UTC(1970, 9, 21), 20],
                    [Date.UTC(1970, 10, 4), 15],
                    [Date.UTC(1970, 10, 9), 16],
                    [Date.UTC(1970, 10, 27), 22],
                    [Date.UTC(1970, 11, 2), 17],
                    [Date.UTC(1970, 11, 26), 14],
                    [Date.UTC(1970, 11, 29), 16],
                    [Date.UTC(1971, 0, 11), 21],
                    [Date.UTC(1971, 0, 26), 11],
                    [Date.UTC(1971, 1, 3), 10],
                    [Date.UTC(1971, 1, 11), 19],
                    [Date.UTC(1971, 1, 25), 18],
                    [Date.UTC(1971, 2, 11), 17],
                    [Date.UTC(1971, 3, 11), 15],
                    [Date.UTC(1971, 4, 1), 12],
                    [Date.UTC(1971, 4, 5), 12],
                    [Date.UTC(1971, 4, 19), 21],
                    [Date.UTC(1971, 5, 3), 21]
                    ]
                }]
            }
        );
    }
);