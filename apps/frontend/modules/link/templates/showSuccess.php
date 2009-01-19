<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $blog_link->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $blog_link->getName() ?></td>
    </tr>
    <tr>
      <th>Target:</th>
      <td><?php echo $blog_link->getTarget() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $blog_link->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('link/edit?id='.$blog_link->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('link/index') ?>">List</a>
