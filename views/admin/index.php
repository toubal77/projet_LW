<h1>Admin Page</h1>

<h2>Posts</h2>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php //foreach ($posts as $post) : ?>
            <tr>
                <td>titre <?php //echo $post->id; ?></td>
                <td>image<?php //echo $post->title; ?></td>
                <td>hhh hhhh hhhh hhhh hhhh hhh hhh hhh hh hh h h h h h<?php //echo $post->content; ?></td>
                <td><button>Show</button></td>
            </tr>
        <?php //endforeach; ?>
    </tbody>
</table>

<h2>User Accounts</h2>
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  //foreach ($users as $user) : ?>
            <tr>
                <td>TOubal<?php //echo $user->name; ?></td>
                <td>toubal@gmail.com<?php //echo $user->email; ?></td>
                <td>admin<?php //echo $user->role; ?></td>
                <td><button>change role</button><button>delete</button></td>
            </tr>
        <?php //endforeach; ?>
    </tbody>
</table>