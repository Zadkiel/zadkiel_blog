<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $blog_article->getId() ?></td>
    </tr>
    <tr>
      <th>User:</th>
      <td><?php echo $blog_article->getUserId() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $blog_article->getStatus() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $blog_article->getTitle() ?></td>
    </tr>
    <tr>
      <th>Subcontent:</th>
      <td><?php echo $blog_article->getSubcontent() ?></td>
    </tr>
    <tr>
      <th>Content:</th>
      <td><?php echo $blog_article->getContent() ?></td>
    </tr>
    <tr>
      <th>Published at:</th>
      <td><?php echo $blog_article->getPublishedAt() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $blog_article->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $blog_article->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('article/edit?id='.$blog_article->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('article/index') ?>">List</a>
