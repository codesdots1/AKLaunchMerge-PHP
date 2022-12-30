<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>AKLaunch Merge Site</title>
</head>

<body>
    <div class="container"><br />
        <?php
            $start_time = microtime(true);

            $str_names = file_get_contents("email_names.json");
            $json_names = json_decode($str_names, true);

            $str_num = file_get_contents("email_numbers.json");
            $json_num = json_decode($str_num, true);

            $temp  = [];
            $temp1 = [];

            foreach ($json_num as $key => $value) {
                array_push($temp, $json_num[$key]['email']);
            }
            foreach ($json_names as $key1 => $value1) {
                array_push($temp1, $json_names[$key1]['email']);
            }

            $found = [];
            $found1 = [];

            foreach ($temp as $index => $value) {
                if (!isset($found[$value])) {
                    $found[$value] = $index;
                } else {
                    unset($temp[$index], $temp[$found[$value]]);
                }
            }

            foreach ($temp1 as $index1 => $value1) {
                if (!isset($found1[$value1])) {
                    $found1[$value1] = $index1;
                } else {
                    unset($temp1[$index1], $temp1[$found1[$value1]]);
                }
            } 
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th> First name </th>
                    <th> Last name </th>
                    <th> cc number </th>
                    <th> Email </th> 
                </tr>
            </thead>
            <tbody>
                <?php 
                for ($i = 0; $i < sizeof($temp); $i++) {
                    if (!empty($temp[$i])) {
                        $j = array_search($temp[$i], $temp1);
                        if(isset($temp[$i]) && isset($temp1[0]) && $temp[$i] == $temp1[0]){
                            echo "<tr>
                            <td>" . $json_names[0]['first_name'] . "</td>
                            <td>" . $json_names[0]['last_name'] . "</td>
                            <td>" . $json_num[0]['cc_number'] . "</td>
                            <td>" . $json_num[0]['email'] . "</td>
                         </tr>";
                        }
                        if (!empty($j)) {

                            echo "<tr>
                                <td>" . $json_names[$j]['first_name'] . "</td>
                                <td>" . $json_names[$j]['last_name'] . "</td>
                                <td>" . $json_num[$i]['cc_number'] . "</td>
                                <td>" . $json_num[$i]['email'] . "</td>
                            </tr>";
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>