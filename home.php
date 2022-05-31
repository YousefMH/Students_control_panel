

<?php 

// الاتصال مع قاعدة البيانات

$host = "localhost";
$user = "root";
$pass = "";
$db = "students";
$con = mysqli_connect($host , $user , $pass , $db);
$result = mysqli_query($con , "select * from students");

//______________________________
$id = "";
$name = "";
$address = "";
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
if(isset($_POST['name'])){
    $name=$_POST['name'];
}
if(isset($_POST['address'])){
    $address=$_POST['address'];
}
$sqls = "";
if(isset($_POST['add'])){
    $sqls = "insert into students value('$id','$name','$address')";
    mysqli_query($con,$sqls);
    header("Location: home.php");
}

if(isset($_GET['del'])){
    $sqls = "delete from students where id='$id'";
    mysqli_query($con,$sqls);
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>

    body{
        height: 1000px;
        background-color: whitesmoke;
        font-family: 'Roboto', sans-serif;
        font-family: 'Tajawal', sans-serif;
        color: #00004d;
    }
    .mother{
        display: flex;
    }
    #side_content{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 26vw;
        background-color: rgb(155, 155, 155);
        height: 98vh;
        border-radius: 8px;
        position: fixed;
    }
    #side_content img{
        width: 50%;
        margin: 15px 0;
    }
    #side_content form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #side_content button{
        margin-bottom: 25px;
    }
    #side_content form input{
        padding: 8px 5px;
        width: 15vw;
        border-radius: 5px;
        border: none;
        margin: 10px;
    }

    #side_content form button{
        padding: 10px 15px;
        font-size: 15px;
        font-weight: bold;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        background-color: #a3d5e0;
        font-family: 'Roboto', sans-serif;
        font-family: 'Tajawal', sans-serif;
    }

        main{
            display: flex;
            width: 72vw;
            justify-content: center;
            position: relative;
            left: -26vw;
            top: 0;
        }

        #tbl{
            width: 1055px;
            font-size: 20px;
        }

        table th{
            background-color: silver;
            color: black;
            font-size: 20px;
            padding: 10px;
            border-radius: 5px;
            }

        table tr{
            text-align: center;
            background-color: lightblue;
            border-radius: 5px;
        }

        table tr:hover{
            background-color: #f3faff;
        }

        img{
            width: 200px;
        }

        input{
            padding: 4px;
            margin: 4px;
            border: 2px solid black;
            text-align: center;
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
        }
    </style>
</head>
<body dir="rtl">
    <div class="mother">
            <!-- لوحة التحكم -->
        <aside>
            <div id="side_content">
                    <img src="logo.png" alt="Logo">
                <form method="POST" class="login_form">
                    <h2>Control Panel</h2>
                    <input type="text" name="name" id="name" placeholder="Enter student name" required>
                    <input type="text" name="address" id="address" placeholder="Enter Student address" required>
                    <button type="submit" id="btn" name="add">Add</button>
                </form>
                <form method="GET" class="Remove_form">
                    <input type="text" id="id" name="id" placeholder=" Entetr student ID" required>
                    <button type="submit" id="btn" name="del">Delete</button>
                </form>
            </div>
        </aside>

            <!-- Console -->

            <main>
            <table id="tbl">
                    <tr>
                        <th> ID </th>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                    <?php
                    while($row=mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td class='box'>" . $row['id'] . "</rd>";
                        echo "<td class='box'>" . $row['name'] . "</rd>";
                        echo "<td class='box'>" . $row['address'] . "</rd>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
    </div>
</body>
</html>
