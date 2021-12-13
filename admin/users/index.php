<?php

require_once '../../functions/users.php';

$users = getUsers();
$page = ['title' => 'Liste des utilisateurs'];

require_once '../../template-parts/layout/admin/header.php'; ?>

    <main id="main">

        <table class="table table-hover table-bordered">

            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Date d'inscription</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo isAdmin($user) ? 'Oui' : 'Non'; ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>

    </main>

<?php require_once '../../template-parts/layout/admin/footer.php'; ?>