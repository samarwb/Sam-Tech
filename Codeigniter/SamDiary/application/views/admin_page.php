<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div id="profile">
            <?php
            echo "Hello <b id='welcome'><i>" . $email . "</i> !</b>";
            echo "<br/>";
            echo "<br/>";
            echo "Welcome to Admin Page";
            echo "<br/>";
            echo "<br/>";
            echo "Your User id is " . $uid;
            echo "<br/>";
            ?>
            <b id="logout"><a href="logout">Logout</a></b>
        </div>
        <br/>
        <?php include 'footer.php'; ?>
    </body>
</html>