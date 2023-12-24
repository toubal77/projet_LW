<h1 style="background-color: #333; color: #fff; padding: 20px; text-align: center;">Admin page</h1>

<h2 style="text-align: center; color: #333;">Posts</h2>
<table style="width: 100%; border-collapse: collapse; margin: 20px 0; text-align: left;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Title</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Image</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Content</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php //foreach ($posts as $post) : ?>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">post <?php //echo $post->title; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;">post<?php //echo $post->image; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;">post <?php //echo $post->content; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><button style="padding: 5px 10px; cursor: pointer;">Show</button></td>
            </tr>
        <?php //endforeach; ?>
    </tbody>
</table>

<h2 style="text-align: center; color: #333;">User Accounts</h2>
<table style="width: 100%; border-collapse: collapse; margin: 20px 0; text-align: left;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Username</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Email</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Role</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php// foreach ($users as $user) : ?>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;">user<?php //echo $user->name; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;">user@gmail.com<?php //echo $user->email; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;">role<?php //echo $user->role; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    <button style="padding: 5px 10px; cursor: pointer;">Change Role</button>
                    <button style="padding: 5px 10px; cursor: pointer;">Delete</button>
                </td>
            </tr>
        <?php //endforeach; ?>
    </tbody>
</table>
