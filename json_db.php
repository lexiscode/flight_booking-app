<?php

$filePath = 'ind.txt';

if (!file_exists($filePath)) {
    $file = fopen($filePath, 'w');
    fclose($file);
}

function readList()
{
    global $filePath;
    $airports = [];
    $file = fopen($filePath, 'r');
    while (($line = fgets($file)) !== false) {
        $airports[] = json_decode(trim($line), true);
    }
    fclose($file);
    return $airports;
}

function writeList($airports)
{
    global $filePath;
    $file = fopen($filePath, 'w');
    foreach ($airports as $airport) {
        fwrite($file, json_encode($airport) . PHP_EOL);
    }
    fclose($file);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $name = trim($_POST['name']);
        $date = trim($_POST['date']);
        $time = trim($_POST['time']);
        $from = trim($_POST['from']);
        $to = trim($_POST['to']);
        $message = trim($_POST['message']);
        $phoneNo = trim($_POST['phoneNo']);
        $email = trim($_POST['email']);
        $seat = trim($_POST['seat']);
        $airline = trim($_POST['airline']);
        $fare = trim($_POST['fare']);
        $adults = trim($_POST['adults']);
        $children = trim($_POST['children']);
        $infants = trim($_POST['infants']);

        if (
            !empty($name) && !empty($date) && !empty($time) && !empty($from) && !empty($to)  && !empty($message) && !empty($phoneNo)  && !empty($email)  && !empty($seat)
            && !empty($airline) && !empty($fare)  && !empty($adults)  && !empty($children) && !empty($infants)
        ) {
            $airport = [
                'name' => $name,
                'date' => $date,
                'from' => $from,
                'to' => $to,
                'time' => $time,
                'message' => $message,
                'phoneNo' => $phoneNo,
                'email' => $email,
                'seat' => $seat,
                'airline' => $airline,
                'fare' => $fare,
                'adults' => $adults,
                'children' => $children,
                'infants' => $infants,
            ];

            $airports = readList();
            $airports[] = $airport;
            writeList($airports);
        }
    }

    if (isset($_POST['removeTask'])) {
        $index = $_POST['index'];
        $airports = readList();
        if (isset($airports[$index])) {
            unset($airports[$index]);
            $airports = array_values($airports);
            writeList($airports);
        }
    }

    if (isset($_POST['clear'])) {
        $airports = [];
        writeList($airports);
    }
}

$airports = readList();
