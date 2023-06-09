function blog_in_day(chartData) {
    console.log(chartData);
    google.charts.load('current', { 'packages': ['line'] });
    google.charts.setOnLoadCallback(function() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'Date');
        data.addColumn('number', 'Count');
        data.addRows(chartData.labels.map((label, index) => [new Date(label), chartData.data[index]]));

        var options = {
            title: 'Blog Posts',
            titlePosition: 'center', // Add this line to center the title
            chartArea: { width: '80%', height: '70%' },
            hAxis: {
                title: 'Date',
                format: 'MMM d',
                textStyle: {
                    color: '#333',
                    fontSize: 12
                },
                titleTextStyle: {
                    color: '#666',
                    fontSize: 14,
                    bold: true
                },
                gridlines: {
                    color: 'transparent'
                }
            },
            vAxis: {
                title: 'Count',
                minValue: 0,
                textStyle: {
                    color: '#333',
                    fontSize: 12
                },
                titleTextStyle: {
                    color: '#666',
                    fontSize: 14,
                    bold: true
                },
                gridlines: {
                    color: '#eee'
                }
            },
            titleTextStyle: {
                color: '#888',
                fontSize: 18,
                bold: true
            },
            colors: ['#2f1a82'],
            backgroundColor: '#f5f5f5',
            legend: {
                position: 'none'
            }
        };

        var chart = new google.charts.Line(document.getElementById('myChart'));
        chart.draw(data, google.charts.Line.convertOptions(options));
    });
}

function blog_with_category(categoryChartData) {
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(function() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Category');
        data.addColumn('number', 'Count');

        // Add data rows
        for (var category in categoryChartData) { // Corrected variable name
            if (categoryChartData.hasOwnProperty(category)) {
                data.addRow([category, categoryChartData[category]]);
            }
        }

        var options = {
            title: 'Number of Blogs by Category',
            titlePosition: 'center', // Add this line to center the title
            chartArea: { width: '80%', height: '70%' },
            hAxis: {
                title: 'Category',
                textStyle: {
                    color: '#333',
                    fontSize: 12
                },
                titleTextStyle: {
                    color: '#666',
                    fontSize: 14,
                    bold: true
                },
                gridlines: {
                    color: 'transparent'
                }
            },
            vAxis: {
                title: 'Count',
                minValue: 0,
                textStyle: {
                    color: '#333',
                    fontSize: 12
                },
                titleTextStyle: {
                    color: '#666',
                    fontSize: 14,
                    bold: true
                },
                gridlines: {
                    color: '#eee'
                }
            },
            titleTextStyle: {
                color: '#888',
                fontSize: 18,
                bold: true
            },
            colors: ['#2f1a82'],
            backgroundColor: '#f5f5f5',
            legend: {
                position: 'none'
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('categoryChart'));
        chart.draw(data, options);
    });
}
