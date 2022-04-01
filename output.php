<?php


include("connect.php");

$query = "select * from client order by client.data desc;";
$result = mysqli_query($con, $query);

// if (!$result) {
//     echo "Could not successfully run query from DB: " . mysqli_error();
//     exit;
// }

// if (mysqli_num_rows($result) == 0) {
//     echo "No rows found, nothing to print so am exiting";
//     exit;
// }

// echo "<br><ol>";
// echo "<h1>Output page</h1>";
// echo "<br><table>";
// echo "<tr>";
// echo "<th>First name</th>";
// echo "<th>Last name</th>";
// echo "<th>Email</th>";
// echo "<th>Phone number</th>";
// echo "<th>Inquiry</th>";
// echo "<th>Data</th>";
// echo "</tr>";

// // mysqli_fetch_assoc:　returns an array corresponding to the rows of the executed query.
// // While a row of data exists, set it to $row
// while ($row = mysqli_fetch_assoc($result)) {
//     {
//         echo "<tr>";
//         echo "<td>".$row["first_name"]."</td>";
//         echo "<td>".$row["last_name"]."</td>";
//         echo "<td>".$row["email"]."</td>";
//         echo "<td>".$row["phone_number"]."</td>";
//         echo "<td>".$row["inquiry"]."</td>";
//         echo "<td>".$row["data"]."</td>";
//         echo "</tr>";
//     }
// }

// echo "</table>";
// echo "</ol>";

// array(7) { ["id"]=> string(1) "1" ["first_name"]=> string(4) "Yuka" ["last_name"]=> string(8) "Yamamoto" ["email"]=> string(25) "yamamoto_yuka@hotmail.com" ["phone_number"]=> string(10) "1234567890" ["inquiry"]=> string(6) "Hello!" ["data"]=> string(19) "2022-01-17 20:09:15" }
$a = mysqli_fetch_assoc($result);

echo var_dump($a);

for ($i=0; $i< count($a); ++$i) {
    echo $a[$i]["first_name"];
    echo $a[$i]["last_name"];
    echo $a[$i]["email"];
    echo $a[$i]["phone_number"];
    echo $a[$i]["inquiry"];
    echo $a[$i]["data"];
}
