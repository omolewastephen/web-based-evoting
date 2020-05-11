<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-Voting - Admin | FPI SUG</title>
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./assets/css/custom.css"/>
    <link rel="stylesheet" href="./assets/css/animate.css"/>
    <link rel="stylesheet" href="./assets/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="./assets/css/pnotify.css"/>
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css"/>

    <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
	<link rel="manifest" href="./site.webmanifest">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <a href="dashboard" class="navbar-brand">
        <img src="./assets/img/logo-w.png" class="img-fluid" width="210" height="100">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="dashboard" class="nav-item nav-link active">
                <i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <div class="nav-item dropdown">
                <a href="#!" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-th-list" aria-hidden="true"></i> Election</a>
                <div class="dropdown-menu">
                    <a href="create" class="dropdown-item">Create</a>
                    <a href="manage" class="dropdown-item">Manage Election</a>
                    <a href="manage" class="dropdown-item">Manage Candidates</a>
                    <a href="results" class="dropdown-item">Manage Results</a>
                </div>
            </div>
           <div class="nav-item dropdown">
                <a href="#!" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-poll" aria-hidden="true"></i> Result</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Manage Results</a>
                    <a href="#" class="dropdown-item">Archived Results</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#!" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-users" aria-hidden="true"></i> Student</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Manage Students</a>
                    <a href="#" class="dropdown-item">Feedbacks</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#!" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                <div class="dropdown-menu">
                    <a href="setting#election" class="dropdown-item">Election</a>
                    <a href="setting#general" class="dropdown-item">General</a>
                    <a href="setting#admin" class="dropdown-item">System Admin</a>
                </div>
            </div>
        </div>
        <form class="form-inline">
            <div class="switch-mode"><i class="far fa-moon"></i> Dark Mode</div>
        </form>
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link"><i class="fa fa-power-off" aria-hidden="true"></i> Log Out</a>
        </div>
    </div>
</nav>