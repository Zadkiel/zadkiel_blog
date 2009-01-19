<h1>Tag List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blog_tag_list as $blog_tag): ?>
    <tr>
      <td><a href="<?php echo url_for('tag/show?id='.$blog_tag->getId()) ?>"><?php echo $blog_tag->getId() ?></a></td>
      <td><?php echo $blog_tag->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tag/new') ?>">New</a>
