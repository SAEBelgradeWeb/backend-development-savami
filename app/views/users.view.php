<?php require('partials/head.php'); ?>
    <hr>
    <h1>All Users</h1>
    <table style="border:1px solid black">

        <tr>
            <th style="border:1px solid black; text-align:center">Username</th>
            <th style="border:1px solid black; text-align:center">E-mail</th>
            <th style="border:1px solid black; text-align:center">Password</th>
        </tr>

        <?php foreach ($users as $user) : ?>
            <tr>
                <td style="border:1px solid black; text-align:center"><?= $user->username ?></td>
                <td style="border:1px solid black; text-align:center"><?= $user->email ?></td>
                <td style="border:1px solid black; text-align:center"><?= $user->password ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <hr>
    <form method="POST" action="/register">
        <label for="username"></label>
        <input type="text" name="username" id="username" placeholder="Enter name">

        <label for="email"></label>
        <input type="text" name="email" id="email" placeholder="Enter email">

        <label for="password"></label>
        <input type="password" name="password" id="password" placeholder="Enter password">

        <button type="submit">Submit</button>
    </form>

<?php require('partials/footer.php');
