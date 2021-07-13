 <?php
    require_once("db.php");
    require_once("util.php");
    $db = new Database;
    $util = new util;

    //handle add new user ajax request
    if (isset($_POST['add'])) {
        $fname = $util->testInput($_POST['fname']);
        $lname = $util->testInput($_POST['lname']);
        $email = $util->testInput($_POST['email']);
        $phone = $util->testInput($_POST['phone']);
        if ($db->insert($fname, $lname, $email, $phone)) {
            echo $util->showMessage('success', 'User updated successfully!');
        } else {
            echo $util->showMessage('danger', 'Something went wrong!');
        }
    }


    //handle fetch all user ajax request
    if (isset($_GET['read'])) {
        $users = $db->read();
        $output = '';
        if ($users) {
            foreach ($users as $row) {
                $output .= '<tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['first_name'] . '</td>
                            <td>' . $row['last_name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['phone'] . '</td>
                            <td>
                            <a href="#" id="' . $row['id'] . '" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal" data-target="#editUserModal">Edit</a>

                            <a href="#" id="' . $row['id'] . '" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                            </td>
                        </tr>';
            }
            echo $output;
        } else {
            echo '<tr>
                <td colspan="6">No Users Found in the Database!</td>
              </tr>';
        }
    }


    // handling edit user ajax request

    if (isset($_GET['edit'])) {
        $id = $_GET['id'];
        $users = $db->readOne($id);
        echo json_encode($users);
    }

    //handle update user ajax request

    if (isset($_POST['update'])) {
        $id = $util->testInput($_POST['id']);
        $fname = $util->testInput($_POST['fname']);
        $lname = $util->testInput($_POST['lname']);
        $email = $util->testInput($_POST['email']);
        $phone = $util->testInput($_POST['phone']);


        if ($db->update($id, $fname, $lname, $email, $phone)) {
            echo $util->showMessage('success', 'User updated successfully!');
        } else {
            echo $util->showMessage('danger', 'Something went wrong!');
        }
    }

    //handle delete user ajax request

    if (isset($_GET['delete'])) {
        $id = $_GET['id'];

        if ($db->delete($id)) {
            echo $util->showMessage('success', 'User deleted successfully!');
        } else {
            echo $util->showMessage('danger', 'Something went wrong!');
        }
    }
