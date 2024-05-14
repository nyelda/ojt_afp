<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registrations</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .table thead th {
            vertical-align: middle;
            font-weight: bold;
            background-color: #f8f9fa;
            color: #333;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .btn-back {
            margin-top: 20px;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Recent Data</h2>
        <table class="table" id="userData">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Function to get recent data
                function getRecentData($limit = 10)
                {
                    // Replace this with your actual data retrieval logic
                    $data = array();
                    for ($i = 1; $i <= $limit; $i++) {
                        $data[] = array(
                            'id' => $i,
                            'name' => 'User ' . $i,
                            'email' => 'user' . $i . '@example.com',
                            'date' => date('Y-m-d H:i:s', strtotime('-' . $i . ' days'))
                        );
                    }
                    return $data;
                }

                // Get recent data
                $recentData = getRecentData();

                // Display recent data in table rows
                foreach ($recentData as $row) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['email']}</td>";
                    echo "<td>{$row['date']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Button back to the dashboard -->
        <div class="btn-container d-flex justify-content-end">
            <a href="/dashboard" class="btn btn-primary btn-back">Back to Dashboard</a>
        </div>

        <!-- Form to add new user -->
        <div class="mt-5" id="addUserForm">
            <h2>Add New User</h2>
            <form action="add_user.php" method="post" id="addUserFormSubmit">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Add User</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("addUserFormSubmit").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var form = event.target;
            var formData = new FormData(form);

            // Send a POST request to the server
            fetch(form.action, {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Update table with new data
                    var newRow = "<tr>";
                    newRow += "<td>" + data.id + "</td>";
                    newRow += "<td>" + data.name + "</td>";
                    newRow += "<td>" + data.email + "</td>";
                    newRow += "<td>" + data.date + "</td>";
                    newRow += "</tr>";
                    document.querySelector("#userData tbody").innerHTML += newRow;

                    // Clear form fields
                    form.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
