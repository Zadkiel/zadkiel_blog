<h1>Link List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Target</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blog_link_list as $blog_link): ?>
    <tr>
      <td><a href="<?php echo url_for('link/show?id='.$blog_link->getId()) ?>"><?php echo $blog_link->getId() ?></a></td>
      <td><?php echo $blog_link->getName() ?></td>
      <td><?php echo $blog_link->getTarget() ?></td>
      <td><?php echo $blog_link->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('link/new') ?>">New</a>
