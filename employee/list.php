<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "ems";
$empNum;
$tableContents = "";

function generateData () {
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbName']);
    $retrieveSql = "SELECT * FROM `tbl_employee`";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $result = $conn->query($retrieveSql);
    
        if ($result->num_rows > 0) {
            $GLOBALS['empNum'] = $result->num_rows;
            while ($row = $result->fetch_assoc()) {
                $GLOBALS['tableContents'] .= '<tr class="tbl-row">
                        <td>' . $row["empId"] . '</td>
                        <td>' . $row["empUsername"] . '</td>
                        <td>' . $row["empPassword"] . '</td>
                        <td>
                            <div class="action-btn-container">
                                <button type="button"
                                    class="action-btns btn-edit">Edit</button>
                                <button type="button"
                                    class="action-btns btn-delete">Delete</button>
                            </div>
                        </td>
                    </tr>';
            }
        } else {
            $GLOBALS['empNum'] = 0;
        }
    }
    $conn->close();
};
generateData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="list-style.css" />
    <title>Employees</title>
</head>

<body>
    <main>
        <section class="top-section">
            <div class="top-left">
                <div class="title-top-left">
                    <h2>Employees</h2>
                    <span>
                        <p><?= $empNum ?> employee(s)</p>
                    </span>
                </div>
                <p>See your active workforce and make changes</p>
            </div>
            <div class="top-right">
                <button type="button" id="btn-add-employee">+ Add employee</button>
            </div>
        </section>
        <section class="bottom-section">
            <table>
                <thead>
                    <tr class="tbl-row">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password (encrypted)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $tableContents; ?>
                </tbody>
            </table>
        </section>
    </main>
    <div class="modal">
        <div class="modal-content" id="edit-modal">
            <h3>Enter new details</h3>
            <hr>
            <form action="./process.php" method="post">
                <div class="edit-form-fields">
                    <input type="hidden" name="editId" id="editId" />
                    <input type="hidden" name="purpose" value="edit">
                    <div class="inline">
                        <label for="editUsername">Username</label>
                        <input type="text" name="editUsername" id="editUsername"
                            required />
                    </div>
                    <div class="inline">
                        <label
                            for="editPassword">Password</label>
                        <input type="password" name="editPassword" id="editPassword"
                            required />
                    </div>
                </div>
                <div class="edit-buttons">
                    <button type="reset" id="btn-cancel-edit">Cancel</button>
                    <button type="submit" id="btn-save-changes">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal">
        <div class="modal-content" id="add-modal">
            <h3>Add new employee</h3>
            <hr>
            <form action="./process.php" method="post">
                <input type="hidden" name="purpose" value="add">
                <div class="edit-form-fields">
                    <div class="inline">
                        <label for="addUsername">Username</label>
                        <input type="text" name="addUsername" id="addUsername"
                            required />
                    </div>
                    <div class="inline">
                        <label
                            for="addPassword">Password</label>
                        <input type="password" name="addPassword" id="addPassword"
                            required />
                    </div>
                </div>
                <div class="edit-buttons">
                    <button type="reset" id="btn-cancel-add">Cancel</button>
                    <button type="submit" id="btn-confirm">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal">
        <div class="modal-content" id="delete-modal">
            <div class="d-modal-top">
                <button type="button" class="btn-close"></button>
                <div class="image-container">
                    <img src="./assets/images/danger.svg" alt="danger">
                </div>
                <h3>Are you sure?</h3>
                <p>Are you sure you want to delete this employee's
                    credentials?<br>This action cannot be undone.</p>
            </div>
            <form action="./process.php" method="post">
                <input type="hidden" name="delId" id="delId" />
                <input type="hidden" name="purpose" value="delete">
                <button type="submit" id="btn-confirm-delete">Delete</button>
                <button type="reset" id="btn-cancel-delete">Cancel</button>
            </form>
        </div>
    </div>
    <script src="./script.js" defer></script>
</body>

</html>