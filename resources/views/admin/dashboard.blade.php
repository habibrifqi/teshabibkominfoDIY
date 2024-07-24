<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables with Bootstrap</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>DataTables with Bootstrap</h2>
    <table id="myTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>username</th>
                <th>course</th>
                <th>mentor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->course }}</td>
                    <td>{{ $item->mentor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="chart"></div>
    <div id="chart2"></div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
$(document).ready(function() {
    $('#myTable').DataTable({
        "pagingType": "full_numbers",
        // Opsional: tambahkan opsi di sini
    });
});
</script>
<script>
    $(document).ready(function() {
        let datachart = {!! json_encode($datachart) !!};
        var options = {
          series: [],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: [],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };
        datachart.map((item) => {
                    // console.log(item);
                    options.series.push(item.user_count);
                    options.labels.push(item.course);
                });

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        let datachartfee = {!! json_encode($datachartfee) !!};

        let data = [];
        let categories = [];

        
        var optionsbar = {
          series: [{
          data: data
            }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            borderRadiusApplication: 'end',
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: categories,
        }
        };
                datachartfee.forEach(item => {
                data.push(item.total_amount); // Replace 'value' with the property name for the data values
                categories.push(item.mentor); // Replace 'category' with the property name for the categories
                });


        var chartbar = new ApexCharts(document.querySelector("#chart2"), optionsbar);
        chartbar.render();
    });
    </script>

</body>
</html>
