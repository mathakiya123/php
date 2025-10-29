        <?php
        require_once('header.php');
        ?>
            <div class="col-md-9 p-5">
                <div class="row d-flex justify-content-around">
                    <div class="col-md-5 shadow mt-4 p-3">
                        <div id="chart_div"></div>
                    </div>
                    <div class="col-md-5 mt-5">

                        <div class="card shadow mb-1">
                            <table>
                                <tr class="bg-white mt-4">
                                    <td><span class="bi bi-check-circle-fill text-success"></span> Present </td>
                                    <td align="right"><span class="bi bi-file-earmark text-success"></span> Export</td>
                                </tr>
                            </table>
                        </div>

                        <div class="card shadow mb-1">
                            <table>
                                <tr class="bg-white mt-4">
                                    <td><span class="bi bi-check-circle-fill text-success"></span> Present </td>
                                    <td align="right"><span class="bi bi-file-earmark text-success"></span> Export</td>
                                </tr>
                            </table>
                        </div>

                        <div class="card shadow mb-1">
                            <table>
                                <tr class="bg-white mt-4">
                                    <td><span class="bi bi-check-circle-fill text-success"></span> Present </td>
                                    <td align="right"><span class="bi bi-file-earmark text-success"></span> Export</td>
                                </tr>
                            </table>
                        </div>

                        <div class="card shadow mb-1">
                            <table>
                                <tr class="bg-white mt-4">
                                    <td><span class="bi bi-check-circle-fill text-success"></span> Present </td>
                                    <td align="right"><span class="bi bi-file-earmark text-success"></span> Export</td>
                                </tr>
                            </table>
                        </div>

                        <div class="card shadow mb-1">
                            <table>
                                <tr class="bg-white mt-4">
                                    <td><span class="bi bi-check-circle-fill text-success"></span> Present </td>
                                    <td align="right"><span class="bi bi-file-earmark text-success"></span> Export</td>
                                </tr>
                            </table>
                        </div>

                        <div class="card shadow mb-1">
                            <table>
                                <tr class="bg-white mt-4">
                                    <td><span class="bi bi-check-circle-fill text-success"></span> Present </td>
                                    <td align="right"><span class="bi bi-file-earmark text-success"></span> Export</td>
                                </tr>
                            </table>
                        </div>

                        <div class="card shadow mb-1">
                            <table>
                                <tr class="bg-white mt-4">
                                    <td><span class="bi bi-check-circle-fill text-success"></span> Present </td>
                                    <td align="right"><span class="bi bi-file-earmark text-success"></span> Export</td>
                                </tr>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', { packages: ['corechart'] });
    
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);
    
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['Present', 7],
                ['Absent', 39],
    
            ]);
    
            // Set chart options
            var options = {
                title: 'Attendance Chart By Status',
                width: 500,
                height: 300,
    
            };
    
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(
                document.getElementById('chart_div')
            );
            chart.draw(data, options);
        }
    </script>
   
</body>

</html>