<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $blog_category->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $blog_category->getName() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('category/edit?id='.$blog_category->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('category/index') ?>">List</a>
