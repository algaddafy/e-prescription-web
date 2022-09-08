<div class="p-3">
    <?php include 'includes/users.php';
    if (mysqli_num_rows($res) > 0) { ?>

        <h1 class="display-4 fs-1">Users</h1>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">User name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($rows = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $rows['first_name'] . ' ' . $rows['last_name'] ?></td>
                            <td><?= $rows['username'] ?></td>
                            <td><?= $rows['role'] ?></td>
                            <td><button class="btn btn-outline-info btn-sm"><a href="edit_user.php?edit_id=<?php echo $rows['user_id'] ?>">Update / Edit </a></button> ||
                                <?php if ($_SESSION['user_id'] == $rows['user_id']) { ?>
                                    <button class="btn btn-outline-danger btn-sm" disabled> Delete</button>
                                <?php } else { ?>
                                    <button class="btn btn-outline-info btn-sm"><a href="includes/user_delete.php?user_id=<?php echo $rows['user_id'] ?>" onclick=" return confirm('Are you sure you want to delete this item?')"> Delete</a></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        <?php } ?>
        </div>