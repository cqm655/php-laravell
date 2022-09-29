<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <div class="nav-bar">
        <div class="logo">
            <span class="title">Deezer Search</span>
        </div>
    </div>
    <section>
        <!-- background area -->
        <div class="bg-img" id="bg-img">
            <div class="bg-text">
                <form action="api.php" method="post">
                    <div class="checkbox">
                        <input class="inputSyle" type="text" placeholder="name" name="name">
                        <button type="submit" class="formBtn">Search</button>
                    </div>
                </form>
            </div>


            <div class="showContent">
                <div class="table-wrapper">
                    <table class="fl-table">

                        <thead>
                            <tr>
                                <th>Artist Name</th>
                                <th>Song Name</th>
                                <th>Duration</th>
                                <th>Album</th>
                            </tr>
                        </thead>
                        <!-- end background area -->

                        <?php
                        // second argument for making as an array
                        $value = json_decode($_SESSION['response'], true);
                        if (!empty($value)) {
                            foreach ($value as $key => $v) {
                            }
                            // get parameters from url 
                            $url_components = parse_url($v);
                            parse_str($url_components['query'], $params);
                            // get value from parameter
                            $len = $params['index'];

                            echo '<tbody>';
                            while ($len > 0) {
                                echo
                                '<tr>' .
                                    '<td>' . $value['data'][$len - 1]['artist']['name'] . '</td>' .
                                    '<td>' . $value['data'][$len - 1]['title'] . '</td>' .
                                    '<td>' . $value['data'][$len - 1]['duration'] . '</td>' .
                                    '<td>' . $value['data'][$len - 1]['album']['title'] . '</td>' .
                                    '</tr>';
                                $len--;
                            }
                            echo '</tbody>';
                        }
                        ?>

                    </table>
                </div>
            </div>

        </div>
    </section>
</body>

</html>

<?php
$_SESSION['response'] = '';

?>