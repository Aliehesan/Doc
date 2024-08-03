<?php
include "datacon.php";

$id = "";
$name = "";
$department = "";
$specialization = "";
$degree = "";
$mobile = "";
$email = "";
$join_date = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: /DocCare/SuperAdmin/Doctors.php");
        exit;
    }
    $id = $_GET["id"];

    // Read the row of the selected doctor from the database table
    $sql = "SELECT * FROM doctors WHERE id=$id";
    $result = mysqli_query($link, $sql) or die("Invalid query");

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header("location: /DocCare/SuperAdmin/Doctors.php");
        exit;
    }

    $name = $row["name"];
    $mobile = $row["mobile"];
    $email = $row["email"];
    $specialization = $row["specialization"];
    $degree = $row["degree"];
    $department = $row["department"];
    $join_date = $row["joining_date"];
} else {
    // Post method: update the data of the doctors

    $id = $_POST["id"];
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $specialization = $_POST["specialization"];
    $degree = $_POST["degree"];
    $department = $_POST["department"];
    $join_date = $_POST["join_date"];


    do {
        if (empty($name) || empty($department) || empty($specialization) || empty($degree) || empty($mobile) || empty($Email) || empty($join_date)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE 
                    doctors 
                SET 
                    name = '$name', 
                    mobile = '$mobile', 
                    email = '$email', 
                    specialization = '$specialization', 
                    degree = '$degree', 
                    department = '$department',
                    joining_date = '$join_date'
                WHERE 
                    id = $id";

        $result = mysqli_query($link, $sql) or die("Invalid query");

        $successMessage = "Doctor updated successfully";

        // Move header outside the do-while loop
        break;
    } while (false);

    header("location: /DocCare/SuperAdmin/Doctors.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/edit-doctor.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 14:58:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <title>DocCare</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt> <span>DocCare</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><img src="assets/img/icons/bar-icon.svg" alt></a>
            <a id="mobile_btn" class="mobile_btn float-start" href="#sidebar"><img src="assets/img/icons/bar-icon.svg" alt></a>
            <div class="top-nav-search mob-view">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <a class="btn"><img src="assets/img/icons/search-normal.svg" alt></a>
                </form>
            </div>
            <ul class="nav user-menu float-end">
                <li class="nav-item dropdown d-none d-md-block">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"><img src="assets/img/icons/note-icon-02.svg" alt><span class="pulse"></span> </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">
                                                <img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
                                            </span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added
                                                    new task <span class="noti-title">Patient appointment booking</span>
                                                </p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">V</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Tarah Shropshire</span>
                                                    changed the task name <span class="noti-title">Appointment booking
                                                        with payment gateway</span></p>
                                                <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">L</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Misty Tison</span>
                                                    added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
                                                <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">G</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Rolland Webber</span>
                                                    completed task <span class="noti-title">Patient and Doctor video
                                                        conferencing</span></p>
                                                <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="notification-message">
                                    <a href="activities.html">
                                        <div class="media">
                                            <span class="avatar">V</span>
                                            <div class="media-body">
                                                <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span>
                                                    added new task <span class="noti-title">Private chat module</span>
                                                </p>
                                                <p class="noti-time"><span class="notification-time">2 days ago</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-md-block">
                    <a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><img src="assets/img/icons/note-icon-01.svg" alt><span class="pulse"></span> </a>
                </li>
                <li class="nav-item dropdown has-arrow user-profile-list">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-bs-toggle="dropdown">
                        <div class="user-names">
                            <h5>Liam Michael </h5>
                            <span>Admin</span>
                        </div>
                        <span class="user-img">
                            <img src="assets/img/user-06.jpg" alt="Admin">
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="settings.html" class="hasnotifications nav-link"><img src="assets/img/icons/setting-icon-01.svg" alt> </a>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-end">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="submenu">
                        <li><a href="index.html">
                                <span class="menu-side"><img src="assets/img/icons/menu-icon-01.svg" alt></span>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        </li>
                        <li class="submenu">
                            <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-02.svg" alt></span>
                                <span> Doctors </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="doctors.php">Doctor List</a></li>
                                <li><a href="add-doctor.php">Add Doctor</a></li>
                                <li><a class="active" href="edit-doctor.php">Edit Doctor</a></li>
                                <li><a href="doctor-profile.html">Doctor Profile</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-03.svg" alt></span>
                                <span>Patients </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="patients.html">Patients List</a></li>
                                <li><a href="add-patient.html">Add Patients</a></li>
                                <li><a href="edit-patient.html">Edit Patients</a></li>
                                <li><a href="patient-profile.html">Patients Profile</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-04.svg" alt></span>
                                <span> Appointments </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="appointments.html">Appointment List</a></li>
                                <li><a href="add-appointment.html">Book Appointment</a></li>
                                <li><a href="edit-appointment.html">Edit Appointment</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-05.svg" alt></span>
                                <span> Doctor Schedule </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="schedule.html">Schedule List</a></li>
                                <li><a href="add-schedule.html">Add Schedule</a></li>
                                <li><a href="edit-schedule.html">Edit Schedule</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><span class="menu-side"><img src="assets/img/icons/menu-icon-06.svg" alt></span>
                                <span> Departments </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="departments.html">Department List</a></li>
                                <li><a href="add-department.html">Add Department</a></li>
                                <li><a href="edit-department.html">Edit Department</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="settings.html"><span class="menu-side"><img src="assets/img/icons/menu-icon-16.svg" alt></span> <span>Settings</span></a>
                        </li>
                    </ul>
                    <div class="logout-btn">
                        <a href="login.html"><span class="menu-side"><img src="assets/img/icons/logout.svg" alt></span>
                            <span>Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="doctors.html">Doctors </a></li>
                                <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                                <li class="breadcrumb-item active">Edit Doctor</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-heading">
                                                <h4>Doctor Details</h4>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <div class="input-block local-forms">
                                                <label>Name<span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block local-forms">
                                                <label>Mobile <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="mobile" value="<?php echo $mobile; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block local-forms">
                                                <label>Email <span class="login-danger">*</span></label>
                                                <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block local-forms cal-icon">
                                                <label>Joining Date <span class="login-danger">*</span></label>
                                                <input class="form-control datetimepicker" type="text" name="join_date" value="<?php echo $join_date; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <div class="input-block local-forms">
                                                <label>Degree<span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="degree" value="<?php echo $degree; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <div class="input-block local-forms">
                                                <label>Department <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="department">
                                                    <option value="" disabled>Select Department</option>
                                                    <option value="1" <?php echo ($department == 1) ? 'selected' : ''; ?>>Orthopedics</option>
                                                    <option value="2" <?php echo ($department == 2) ? 'selected' : ''; ?>>Radiology</option>
                                                    <option value="3" <?php echo ($department == 3) ? 'selected' : ''; ?>>Dentist</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-4">
                                            <div class="input-block local-forms">
                                                <label>Specialization <span class="login-danger">*</span></label>
                                                <select class="form-control select" name="specialization">
                                                    <option value="" disabled>Select Specialization</option>
                                                    <option value="1" <?php echo ($specialization == 1) ? 'selected' : ''; ?>>Infertility</option>
                                                    <option value="2" <?php echo ($specialization == 2) ? 'selected' : ''; ?>>Prostate</option>
                                                    <option value="3" <?php echo ($specialization == 3) ? 'selected' : ''; ?>>Cancer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="doctor-submit text-end">
                                                <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
                                                <button type="submit" class="btn btn-primary cancel-form">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification-box">
                <div class="msg-sidebar notifications msg-noti">
                    <div class="topnav-dropdown-header">
                        <span>Messages</span>
                    </div>
                    <div class="drop-scroll msg-list-scroll" id="msg_list">
                        <ul class="list-box">
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Richard Miles </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item new-message">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">John Doe</span>
                                            <span class="message-time">1 Aug</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Tarah Shropshire </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Mike Litorus</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Catherine Manseau </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">D</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Domenic Houston </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">B</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Buster Wigton </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">R</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Rolland Webber </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">C</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author"> Claire Mapes </span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">M</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Melita Faucher</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">J</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Jeffery Lalor</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Loren Gatlin</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="chat.html">
                                    <div class="list-item">
                                        <div class="list-left">
                                            <span class="avatar">T</span>
                                        </div>
                                        <div class="list-body">
                                            <span class="message-author">Tarah Shropshire</span>
                                            <span class="message-time">12:28 AM</span>
                                            <div class="clearfix"></div>
                                            <span class="message-content">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="chat.html">See all messages</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="delete_patient" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/img/sent.png" alt width="50" height="46">
                        <h3>Are you sure want to delete this ?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff></div>

    <script src="assets/js/jquery-3.7.1.min.js" type="c374df77087a752db6091386-text/javascript"></script>

    <script src="assets/js/bootstrap.bundle.min.js" type="c374df77087a752db6091386-text/javascript"></script>

    <script src="assets/js/feather.min.js" type="c374df77087a752db6091386-text/javascript"></script>

    <script src="assets/js/jquery.slimscroll.js" type="c374df77087a752db6091386-text/javascript"></script>

    <script src="assets/js/select2.min.js" type="c374df77087a752db6091386-text/javascript"></script>

    <script src="assets/plugins/moment/moment.min.js" type="c374df77087a752db6091386-text/javascript"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="c374df77087a752db6091386-text/javascript"></script>

    <script src="assets/js/app.js" type="c374df77087a752db6091386-text/javascript"></script>
    <script src="assets/js/rocket-loader.min.js" data-cf-settings="c374df77087a752db6091386-|49" defer></script>
</body>

<!-- Mirrored from preclinic.dreamstechnologies.com/html/template/edit-doctor.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2024 14:58:26 GMT -->

</html>