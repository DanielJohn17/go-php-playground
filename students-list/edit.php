<?php

require_once 'db.php';

global $conn;

// Ensure the connection is established
if (!$conn->connect()) {
    die("Database connection failed.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $age = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');

    if (empty($name) || empty($age) || empty($email)) {
        echo "Please fill in all fields.";
    } else {
        if ($conn->update_student($id, $name, $email, $age)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to update student.";
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
        <form action="edit.php" method="post" class="w-xl p-6 bg-white shadow-md rounded">
            <h1 class="text-xl font-bold tracking-wide mb-5">Edit student</h1>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" class="border border-gray-300 p-2 w-full" placeholder="Enter name" value="<?php echo htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8'); ?>" required />
            </div>

            <div class="mb-4">
                <label for="age" class="block text-gray-700">Age:</label>
                <input type="number" id="age" name="age" class="border border-gray-300 p-2 w-full" placeholder="Enter age" value="<?php echo htmlspecialchars($student['age'], ENT_QUOTES, 'UTF-8'); ?>" required />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="email" id="email" name="email" class="border border-gray-300 p-2 w-full" placeholder="Enter email" value="<?php echo htmlspecialchars($student['email'], ENT_QUOTES, 'UTF-8'); ?>" required />
            </div>

            <div class="w-full flex justify-end items-center">
                <button
                    type="submit"
                    name="submit"
                    class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200 cursor-pointer">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>

</html>