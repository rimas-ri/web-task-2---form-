<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>smarmethods web Task 2</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      padding: 40px;
      background-color: #f7f7f7;
    }
    form {
      margin-bottom: 20px;
    }
    input[type="text"], input[type="number"] {
      padding: 5px;
      margin: 5px;
      width: 150px;
    }
    button {
      padding: 5px 15px;
    }
    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 60%;
      background-color: #fff;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
    }
    th {
      background-color: #f0f0f0;
    }
    a.toggle-button {
      background-color: #007BFF;
      color: white;
      padding: 5px 10px;
      text-decoration: none;
      border-radius: 5px;
    }
    a.toggle-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<form method="POST" action="submit.php">
  Name: <input type="text" name="name" required>
  Age: <input type="number" name="age" required>
  <button type="submit">Submit</button>
</form>

<?php
$conn = new mysqli("localhost", "root", "root", "task2", 8889);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM user");

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th></tr>";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ID']}</td>
                <td>{$row['Name']}</td>
                <td>{$row['Age']}</td>
                <td>{$row['Status']}</td>
                <td><a class='toggle-button' href='toggle.php?id={$row['ID']}'>Toggle</a></td>
            </tr>";
       }

} else {
    echo "<tr><td colspan='5'>No users found.</td></tr>";
}

echo "</table>";
$conn->close();
?>

</body>
</html>x