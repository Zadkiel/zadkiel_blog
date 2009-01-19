<h1>Category List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($blog_category_list as $blog_category): ?>
    <tr>
      <td><a href="<?php echo url_for('category/show?id='.$blog_category->getId()) ?>"><?php echo $blog_category->getId() ?></a></td>
      <td><?php echo $blog_category->getName() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('category/new') ?>">New</a>
