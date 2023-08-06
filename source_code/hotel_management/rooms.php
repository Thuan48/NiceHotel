<!DOCTYPE html>
<html>
<head>
    <title>Hotel Personal Account Management System</title>
</head>
<body>
    <h1>Welcome to the Hotel Personal Account Management System</h1>
    <form method="post">
        <label>Guest's Name: </label>
        <input type="text" name="name" required><br>
        <label>Room Number: </label>
        <input type="text" name="room_number" required><br>
        <label>Balance: </label>
        <input type="text" name="balance" required><br>
        <input type="submit" name="add_guest" value="Add Guest">
        <input type="submit" name="display_guest" value="Display Guest Details">
        <input type="submit" name="update_guest" value="Update Guest Information">
    </form>

    <?php
    function save_guest($name, $room_number, $balance) {
        $guests = [];
        if (file_exists('guests.json')) {
            $guests = json_decode(file_get_contents('guests.json'), true);
        }

        $guests[$name] = [
            'room_number' => $room_number,
            'balance' => $balance
        ];

        file_put_contents('guests.json', json_encode($guests));
        echo "Guest added successfully!";
    }

    function display_guest_details($name) {
        if (file_exists('guests.json')) {
            $guests = json_decode(file_get_contents('guests.json'), true);
            if (isset($guests[$name])) {
                $guest = $guests[$name];
                echo "<h2>Guest Details</h2>";
                echo "Name: $name<br>";
                echo "Room Number: " . $guest['room_number'] . "<br>";
                echo "Balance: $" . $guest['balance'] . "<br>";
            } else {
                echo "Guest not found!";
            }
        } else {
            echo "No guests found!";
        }
    }

    function update_guest_information($name, $room_number, $balance) {
        if (file_exists('guests.json')) {
            $guests = json_decode(file_get_contents('guests.json'), true);
            if (isset($guests[$name])) {
                $guests[$name]['room_number'] = $room_number;
                $guests[$name]['balance'] = $balance;

                file_put_contents('guests.json', json_encode($guests));
                echo "Guest information updated successfully!";
            } else {
                echo "Guest not found!";
            }
        } else {
            echo "No guests found!";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $room_number = $_POST['room_number'];
        $balance = $_POST['balance'];

        if (isset($_POST['add_guest'])) {
            save_guest($name, $room_number, $balance);
        } elseif (isset($_POST['display_guest'])) {
            display_guest_details($name);
        } elseif (isset($_POST['update_guest'])) {
            update_guest_information($name, $room_number, $balance);
        }
    }
    ?>
</body>
</html>