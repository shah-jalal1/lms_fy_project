<?php
    require_once '../dbconn.php';
    $result = mysqli_query($conn, "SELECT * FROM students");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print All Student</title>
    <style type="text/css">
        body {
            margin: 0;
            font-family: Kalpurush;
        }
        .print-area {
            width: 755px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }
        .header, .page-info {
            text-align: center;
        }
        .header h3 {
            margin: 0;
        }
        .data-info{}
        .data-info table{
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table th,
        .data-info table td {
            border: 1px solid #555;
            padding: 4px;
            line-height: 1em;
        }
    </style>
</head>
<body onload="window.print()">
                <?php
                    $sl = 1;
                    $page = 1;
                    $total = mysqli_num_rows($result);
                    $per_page =35;
                    while ($row = mysqli_fetch_assoc($result)) {

                        if ($sl % $per_page == 1) {
                            echo page_header();
                        }
                        ?>

                        <tr>
                            <td><?= $sl; ?></td>
                            <td><?= ucwords($row['fname'] . ' ' . $row['lname']) ?></td>
                            <td><?= $row['roll'] ?></td>
                            <td><?= $row['reg'] ?></td>
                            <td><?= $row['phone'] ?></td>

                        </tr>

                        <?php
                        if ($sl % $per_page == 0 || $total == $per_page) {
                            echo page_footer($page++);
                        }
                        $sl++;
                    }
                ?>




</body>
</html>

<?php
//    ------------------------------------------------------------------------
//    ----------Header Area --------------------------------------------------
//    ------------------------------------------------------------------------

    function page_header() {
        $data = '
        <div class="print-area">     <!--  Any Name-->
        <div class="header">
            <h3>Southeast University Library</h3>
        </div>
        <div class="data-info">     <!--  Any Name-->
            <table>
                <tr>
                    <th>S1 no</th>
                    <th>Student Name</th>
                    <th>Student Roll</th>
                    <th>Student Reg No</th>
                    <th>Phone</th>
                </tr>
        ';
        return $data;
    }

//    -------------------------------------------------------------------------
//    ----------Footer Area ----------------------------------------------------
//    ------------------------------------------------------------------------

    function page_footer($page) {
        $data = '
        </table>
            <div class="page-info">Page :- '.$page.' </div>
        </div>
    </div>
        ';
        return $data;
    }
?>