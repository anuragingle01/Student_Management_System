<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        
        .profile-image-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            position: absolute;
            top: 20px;
            right: 20px;
            margin-top: 60px;
            margin-right: 50px;
        }

        .profile-info {
            color: purple;
            text-align: right;
            margin-bottom: 20px;
        }

        .profile-info p {
            margin-bottom: 5px;
        }

        .dropdown {
            margin-top: 130px;
            margin-right: -1300px;
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dashboard-heading {
            color: #001f3f; 
            margin-top: -100px;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar {
            background-color: #001f3f; 
            color: #ffffff;
        }
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        .profile-info {
            text-align: center;
            margin-top: 10px;
            color: #001f3f; 
        }

        .profile-info p {
            margin: 5px 0;
        }

        .profile-info-container {
            margin-top: 15px;
            border-top: 1px solid #001f3f; 
            padding-top: 10px; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #001f3f;">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #ffffff;">Student Dashboard</a>
    </div>
</nav>

<div class="container">
    <?php if ($user) { ?>
        <div class="profile-info">
            <?php if ($user['profile_image']) { ?>
                <img class="profile-image-large" src="<?php echo base_url($user['profile_image']); ?>" alt="Profile Image">
            <?php } ?>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello, <?php echo $user['first_name']; ?>
                </a>
                <div class="dropdown-content" aria-labelledby="profileDropdown">
                    <a href="<?php echo base_url('index.php/profile/view'); ?>">View Profile</a>
                    <a href="<?php echo base_url('index.php/profile/edit'); ?>">Update Profile</a>
                    <a href="<?php echo base_url('index.php/profile/change_password'); ?>">Change Password</a>
                    <a href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>

        <div class="profile-container">
            <?php if ($user['profile_image']) { ?>
                <img src="<?php echo base_url($user['profile_image']); ?>" alt="Profile Image">
            <?php } ?>
            <div class="profile-info-container">
                <p><strong>First Name:</strong> <?php echo $user['first_name']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $user['last_name']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            </div>
        </div>

    <?php } else { ?>
        <p>Error retrieving user data.</p>
    <?php } ?>
</div>

</body>
</html>