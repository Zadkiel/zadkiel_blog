<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $blog_tag->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $blog_tag->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tag/edit?id='.$blog_tag->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tag/index') ?>">List</a>
