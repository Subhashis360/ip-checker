<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Address Checker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .animation {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="animation">
    <center>
        <br>
        <h1>Instant IP Address Lookup</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                <?php
                    session_start();

                    function getUserPublicIP() {
                        $ipApiResponse = file_get_contents('https://api64.ipify.org?format=json');
                        $ipData = json_decode($ipApiResponse, true);
                        return $ipData['ip'];
                    }
                    if (!isset($_SESSION['user_ip'])) {
                        $_SESSION['user_ip'] = getUserPublicIP();
                    } else {
                        $currentIP = getUserPublicIP();
                        if ($_SESSION['user_ip'] == $currentIP) {
                            echo "<p class='text-danger'>IP address has not changed! Turn on/off airplane mode twice </p>";
                        } else {
                            $_SESSION['user_ip'] = $currentIP;
                            echo "<p class='text-success'>Public IP address has changed! Hurray </p>";
                        }
                    }
                    echo "<p>Current Public IP Address: " . getUserPublicIP() . "</p>";
                    // echo "<p>Old Public IP Address: " . $_SESSION['user_ip'] . "</p>";
                    ?>
                    <button class="btn btn-primary" onclick="location.reload();">Refresh Page</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<h5>made with ❤️ by <a href="https://www.instagram.com/subhashis_op">SUBHASHIS</a></h5>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </center>
</body>
</html>
