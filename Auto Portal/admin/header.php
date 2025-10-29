<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dash Board</title>

    <link rel="stylesheet" href="./css/style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
</head>

<body>
    <!-- header -->
    <section id="header">
        <div class="row container-fluid">
            <div class="col-3 fs-3 text-white shadow p-3">Guru Kripa Admin</div>
            <div class="col-6 fs-3 text-white p-3 text-center">
                <span class="bi bi-grid text-white"></span>Standard Admin View
            </div>
            <div class="col-3 fs-2 text-white p-3">
                <img src="./images/admin1.png" alt="" width="50px" height="50px" class="rounded-5 float-end" />
            </div>
        </div>
    </section>
    <!-- admin dash board -->

    <section id="admin_dashboard">
        <div class="row">
            <div class="col-md-3 shadow h-100 p-5">

                <img src="./images/dashboard1.png" alt="" class="rounded-5 img-fluid w-50">

                <ul class="sidebar-links">
                  
                    <li><a href="./registration.php" class="text-dark"><span class="class bi bi-person text-dark"></span> Registration <span class="bi bi-chevron-left float-end"></span>
                    </li></a>
                    <li><a href="./manual_attandence.php" class="text-dark"><span class="class bi bi-calendar text-dark"></span> Manual <span class="bi bi-chevron-left float-end"></span>
                            Attandence</li></a>
                    <li><a href="./shift.php" class="text-dark"><span class="class bi bi-calendar text-dark"></span> Shift <span class="bi bi-chevron-left float-end"></span></li></a>
                    <li><a href="./rejoin_employee.php" class="text-dark"><span class="class bi bi-people-fill text-dark"></span> Re-join <span class="bi bi-chevron-left float-end"></span>
                            Employee</li></a>
                    <li><a href="./registered_employee.php" class="text-dark"><span class="class bi bi-people-fill text-dark"></span> Registered <span class="bi bi-chevron-left float-end"></span>
                            Employee</li></a>
                    <li><a href="./leave.php" class="text-dark"><span class="class bi bi-calendar text-dark"></span> Leave <span class="bi bi-chevron-left float-end"></span>
                            Submission</li></a>
                    <li><a href="./daily_reports.php" class="text-dark"><span class="class bi bi-back text-dark"></span> Daily Reports <span class="bi bi-chevron-left float-end"></span></li>
                    </a>
                    <li><a href="./monthly_reports.php" class="text-dark"><span class="class bi bi-bar-chart-line-fill text-dark"></span> <span class="bi bi-chevron-left float-end"></span>
                            Monthly Reports</li></a>
                </ul>
            </div>

            <div class="col-md-9 p-5">
                <div class="row d-flex justify-content-around">
                    <h3 class=" text-dark mb-4">Loged In On: <span class="text-success">10/07/2025 01:09 pm</span></h3>

                    <div class="text-white col-md-3 bg-info" style="font-size: 21px;" style="background-color: #00c0ef;">
                      <div class="row">
                        <div class="col-3 d-flex justify-content-center align-items-center" style="background-color: #009abe;"><span
                            class="bi bi-people-fill text-center icon" ></span>
                        </div>
                        <div class="col-9">Total Registrations <br>
                            <p>46</p>
                        </div>
                        
                       </div>
                    </div>
                    <div class="text-white col-md-3 " style="background-color: #00a65a;">
                      <div class="row">
                        <div class="col-3 d-flex justify-content-center align-items-center" style="background-color:#008548 ;"><span
                            class="bi bi-calendar3 text-center icon text-white" ></span>
                        </div>
                        <div class="col-9">Present <br>
                            <p>7</p>
                        </div>
                        
                       </div>
                    </div>
                    <div class="text-white col-md-3" style="background-color: #dd4c39;"><div class="row">
                        <div class="col-3 d-flex justify-content-center align-items-center" style="background-color: #b13b2d;"><span
                            class="bi bi-phone text-center icon" ></span>
                        </div>
                        <div class="col-9">Absent
                            <p>39</p>
                        </div>
                        
                       </div>
                    </div>
                </div>