 <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Articles
                </div>
                <div class="panel-body">
                    <?php flash('article_flash'); ?>
                    <a href="<?php echo $baseUrl; ?>index.php?page=articles&action=create" class="btn btn-sm btn-primary">Create</a>
                    <a href="<?php echo $baseUrl; ?>index.php?page=articles&action=createMultiple" class="btn btn-sm btn-success">Create Multiple</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $statement = $model->getData();
                            $no = 1;
                            foreach ($statement as $article) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $article->title; ?></td>
                                <td><?php echo (! empty($article->author)) ? $article->author : '-'; ?></td>
                                <td><?php echo $article->created_at; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo $baseUrl; ?>index.php?page=articles&action=detail&id=<?php echo $article->id; ?>" class="btn btn-sm btn-info">Detail</a>
                                    <a href="<?php echo $baseUrl; ?>index.php?page=articles&action=edit&id=<?php echo $article->id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <button value="<?php echo $baseUrl; ?>index.php?page=articles&action=delete&id=<?php echo $article->id; ?>" class="btn btn-sm btn-danger delete" id="<?php echo $article->id; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php    
                            }
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>