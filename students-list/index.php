<?php

require_once 'db.php';
$username = "root";
$password = "root";
$dbname = "student_list";
$students = array();
global $conn;
// Ensure the connection is established
if (!$conn->connect()) {
  die("Database connection failed.");
}
// Fetch data from the database
$students = $conn->fetch_students();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Student List</title>
</head>

<body class="w-screen h-screen bg-gray-100 flex flex-col">
  <?php include './layout/nav.html'; ?>
  <div class="flex-grow p-6">
    <h1 class="text-2xl font-bold mb-4">Student List</h1>
    <table class="table-auto w-full border-collapse border border-gray-300">
      <thead>
        <tr class="bg-gray-200">
          <th class="border border-gray-300 px-4 py-2">ID</th>
          <th class="border border-gray-300 px-4 py-2">Name</th>
          <th class="border border-gray-300 px-4 py-2">Email</th>
          <th class="border border-gray-300 px-4 py-2">Age</th>
          <th class="border border-gray-300 px-4 py-2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($students as $id => $student): ?>
          <tr class="text-center">
            <td class="border border-gray-300 px-4 py-2"><?php echo $id; ?></td>
            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($student['name'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($student['email'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($student['age'], ENT_QUOTES, 'UTF-8'); ?></td>
            <td class="border border-gray-300 px-4 py-2">
              <a href="edit.php?id=<?php echo $id; ?>" class="text-blue-500 hover:underline">Edit</a>
              <a href="delete.php?id=<?php echo $id; ?>" class="text-red-500 hover:underline ml-4">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>