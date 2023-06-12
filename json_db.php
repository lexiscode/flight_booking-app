<?php




// Function to load the todo list from JSON file
function loadTodoList($filename) {
    if (file_exists($filename)) {
        $json = file_get_contents($filename);
        $todoList = json_decode($json, true);

    } else {
        $todoList = [];
    }

    return $todoList;
}

// Function to save the todo list to JSON file
function saveTodoList($filename, $todoList) {
    $json = json_encode($todoList); 
    file_put_contents($filename, $json);
}

// Set the filename for the todo list JSON file
$filename = 'todo_list.json';

// Load the todo list from JSON file
$todoList = loadTodoList($filename);

// Check if a new task is submitted and its not empty, then add it to the todo list
if (isset($_POST['submit'])){

        $name = trim(htmlspecialchars($_POST['name']));
        $date = trim($_POST['date']);
        $time = trim($_POST['time']);
        $from = trim($_POST['from']);
        $to = trim($_POST['to']);
        $message = trim(htmlspecialchars($_POST['message']));
        $phoneNo = trim(htmlspecialchars($_POST['phoneNo']));
        $email = trim(htmlspecialchars($_POST['email']));
        $seat = trim($_POST['seat']);
        $airline = trim($_POST['airline']);
        $fare = trim($_POST['fare']);
        $adults = trim($_POST['adults']);
        $children = trim($_POST['children']);
        $infants = trim($_POST['infants']);

        if (!empty($name) && !empty($date) && !empty($time) && !empty($from) && !empty($to)  && !empty($message) && !empty($phoneNo)  && !empty($email)  && !empty($seat)
            && !empty($airline) && !empty($fare)  && !empty($adults)  && !empty($children) && !empty($infants)){
            
             // Create a new task array with task and due date
            $newTask = ['name' => $name, 'date' => $date, 'time' => $time, 'from' => $from, 'to' => $to, 'message' => $message,
            'phoneNo' => $phoneNo, 'email' => $email, 'seat' => $seat, 'airline' => $airline, 'fare' => $fare, 'adults' => $adults,
            'children' => $children, 'infants' => $infants];

            // Add the new task to the todo list
            $todoList[] = $newTask;

            // Save the updated todo list
            saveTodoList($filename, $todoList);
        }

}

// Check if a task is marked as remove, then delete the task from the list
if (isset($_POST['removeTask'])) {
    $removeIndex = $_POST['remove'];

    // Remove the marked task from the todo list
    if (isset($todoList[$removeIndex])) { // checks/ensures if there's a value where u wish to delete
        unset($todoList[$removeIndex]); // delete that task

        // Re-index the array
        $todoList = array_values($todoList);

        // Save the updated todo list
        saveTodoList($filename, $todoList);
    }
}


// Check if an updated task is submitted
if (isset($_POST['edit_index']) && isset($_POST['updated_name']) && isset($_POST['updated_date']) 
&& isset($_POST['updated_time']) && isset($_POST['updated_from']) && isset($_POST['updated_to']) && isset($_POST['updated_message'])
&& isset($_POST['updated_phoneNo']) && isset($_POST['updated_email']) && isset($_POST['updated_seat']) && isset($_POST['updated_airline'])
&& isset($_POST['updated_fare']) && isset($_POST['updated_adults']) && isset($_POST['updated_children']) && isset($_POST['updated_infants'])) {
    $editIndex = $_POST['edit_index']; // Get the index
    $updatedName = $_POST['updated_name']; 
    $updatedDate = $_POST['updated_date']; 
    $updatedTime = $_POST['updated_time']; 
    $updatedFrom = $_POST['updated_from']; 
    $updatedTo = $_POST['updated_to']; 
    $updatedMessage = $_POST['updated_message']; 
    $updatedPhoneNo = $_POST['updated_phoneNo']; 
    $updatedEmail = $_POST['updated_email']; 
    $updatedSeat = $_POST['updated_seat']; 
    $updatedAirline = $_POST['updated_airline']; 
    $updatedFare = $_POST['updated_fare']; 
    $updatedAdults = $_POST['updated_adults'];
    $updatedChildren = $_POST['updated_children']; 
    $updatedInfants = $_POST['updated_infants'];  

    // Update the task and due date
    if (isset($todoList[$editIndex])) { // checks/ensures if there is a value where u wish to update
        $todoList[$editIndex]['name'] = $updatedName; 
        $todoList[$editIndex]['date'] = $updatedDate; 
        $todoList[$editIndex]['time'] = $updatedTime; 
        $todoList[$editIndex]['from'] = $updatedFrom; 
        $todoList[$editIndex]['to'] = $updatedTo; 
        $todoList[$editIndex]['message'] = $updatedMessage; 
        $todoList[$editIndex]['phoneNo'] = $updatedPhoneNo; 
        $todoList[$editIndex]['email'] = $updatedEmail; 
        $todoList[$editIndex]['seat'] = $updatedSeat; 
        $todoList[$editIndex]['airline'] = $updatedAirline; 
        $todoList[$editIndex]['fare'] = $updatedFare; 
        $todoList[$editIndex]['adults'] = $updatedAdults; 
        $todoList[$editIndex]['children'] = $updatedChildren; 
        $todoList[$editIndex]['infants'] = $updatedInfants;  
    

        // Save the updated todo list
        saveTodoList($filename, $todoList);
    }
}


// Clear the todo list and delete file content
if (isset($_POST['clearLists'])) {
    $todoList = [];
    saveTodoList($filename, $todoList);
}





/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $name = trim(htmlspecialchars($_POST['name']));
        $date = trim($_POST['date']);
        $time = trim($_POST['time']);
        $from = trim($_POST['from']);
        $to = trim($_POST['to']);
        $message = trim(htmlspecialchars($_POST['message']));
        $phoneNo = trim(htmlspecialchars($_POST['phoneNo']));
        $email = trim(htmlspecialchars($_POST['email']));
        $seat = trim($_POST['seat']);
        $airline = trim($_POST['airline']);
        $fare = trim($_POST['fare']);
        $adults = trim($_POST['adults']);
        $children = trim($_POST['children']);
        $infants = trim($_POST['infants']);

        if (
            !empty($name) && !empty($date) && !empty($time) && !empty($from) && !empty($to)  && !empty($message) && !empty($phoneNo)  && !empty($email)  && !empty($seat)
            && !empty($airline) && !empty($fare)  && !empty($adults)  && !empty($children) && !empty($infants)

*/












