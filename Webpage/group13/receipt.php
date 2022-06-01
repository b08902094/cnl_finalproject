<!DOCTYPE html>
<html>
    <script>
        function afterwards() {
            location.href="user.php";
        }
    </script>
    <head>
        <title>Receipt Input</title>
    </head>
    <body>
        <center>
            <h1><?php echo "Receipt Center" ?></h1>
            <p><?php echo "Please fill in the form below to gain free Wi-Fi access" ?></p>
            <form action="user.php">
                <label for="rnum">Receipt No.:</label><br>
                <input type="text" id="rnum" name="rnum"><br>
                <label for="datepur">Date of Purchase:</label><br>
                <input type="date" id="datepur" name="datepur"><br>
                <input type="submit" value="Submit" onClick="afterwards()"/>
            </form>
        </center>
    </body>
</html>