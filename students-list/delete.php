<?php

require_once 'db.php';

global $conn;

// Ensure the connection is established
if (!$conn->connect()) {
    die("Database connection failed.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

    if (empty($id)) {
        echo "Invalid student ID.";
    } else {
        if ($conn->delete_student($id)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to delete student.";
        }
    }
} else {
    $id = $_GET['id'];
    $student = $conn->fetch_student($id);
    if (empty($student)) {
        echo "Student not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include './layout/head.html'; ?>

<body class="w-screen h-screen bg-gray-100 flex flex-col">
    <?php include './layout/nav.html'; ?>
    <div class="flex-grow p-6 flex items-center justify-center">
        <form action="delete.php" method="post" class="w-xl p-6 bg-white shadow-md rounded">
            <h1 class="text-xl font-bold tracking-wide mb-5">Delete student</h1>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="border border-gray-300 p-2 w-full bg-gray-200" placeholder="Enter name" value="<?php echo htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8'); ?>" disabled />
            </div>

            <div class="mb-4">
                <label for="age" class="block text-gray-700">Age:</label>
                <input type="number" id="age" name="age" class="border border-gray-300 p-2 w-full bg-gray-200" placeholder="Enter age" value="<?php echo htmlspecialchars($student['age'], ENT_QUOTES, 'UTF-8'); ?>" disabled />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 w-full bg-gray-200" placeholder="Enter email" value="<?php echo htmlspecialchars($student['email'], ENT_QUOTES, 'UTF-8'); ?>" disabled />
            </div>

            <div class="mb-4">
                <p class="text-red-600">Are you sure you want to delete this student?</p>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                <a href="index.php" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancel</a>
            </div>
        </form>
    </div>
</body>

</html>