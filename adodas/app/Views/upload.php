<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        .btn-back {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-back:hover {
            background-color: #495057;
        }
        .button-container {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Files</h2>
        <p class="file-instructions">Accepted file types: JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, and TXT.</p>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file">Select file to upload:</label><br>
            <input type="file" name="file" id="file"><br>
            <input type="submit" value="Upload" name="submit">
        </form>

        <div class="button-container">
            <a href="/dashboard" class="btn-back">Back to Dashboard</a>
        </div>

        <?php
        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            $targetDir = "uploads/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Allow certain file formats
            $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'txt');
            if (in_array($fileType, $allowedTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    echo "<p>The file " . $fileName . " has been uploaded.</p>";
                } else {
                    echo "<p>Sorry, there was an error uploading your file.</p>";
                }
            } else {
                echo "<p>Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX, and TXT files are allowed.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
