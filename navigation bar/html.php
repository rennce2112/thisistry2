<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Navigation Bar</title>
    <link rel="stylesheet" href="navigation.css" />
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
<nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#page2">Callaborators</a></li>
                <li><a href="index.php#page9">Category</a></li> 
                <li><a href="#">Register</a></li>
            </ul>
            <h1 class="logo">HEALTH</h1>
        </div>
    </nav>
    <div class="raper">
        <div class="water-effect" onclick="showRipple(event)">
        <form action="server/upload.php" method="POST">
            <div>
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div>
                <label for="middle_name">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" required>
            </div>
            <div>
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div>
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div>
                <fieldset>
                    <legend>Gender</legend>
                    <label>
                        <input type="radio" name="gender" value="male" checked> Male
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="gender" value="female"> Female
                    </label>
                    <br>
                </fieldset>
            </div>
            <div>
                <label for="contactNumber">Contact Number</label>
                <input type="tel" id="contactNumber" name="contact_number" required>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" name="create" value="Submit">
        </form>

            <div class="ripple"></div>
        </div>
    </div>

    <script>
        feather.replace()
    </script>
    
</body>

</html>
