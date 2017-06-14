<?php
    if(!defined('RESTRICTED'))exit('No direct script access allowed!');
    $model = new ArticleModel;
    $statement = $model->getData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ongis school - Backend Class</title>

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo $baseUrl; ?>assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $baseUrl; ?>">Ongis School</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $baseUrl; ?>" class="active">Home</a></li>
                <li class="active"><a href="<?php echo $baseUrl; ?>index.php?page=articles">Articles</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <div class="row">
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
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted">Lorem ipsum dolor sit amet</p>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo $baseUrl; ?>assets/js/jquery.min.js" ></script>
<script src="<?php echo $baseUrl; ?>assets/js/bootstrap.min.js" ></script>


<script type="text/javascript">
        $('.delete').click(function()
        {
            if (confirm('Delete article?')) {
                var url = $(this).val();
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {},
                    success: function(result) {
                        document.location.reload(true);
                    },
                    error: function(xhr) {
                        alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                    }
                });
            };
        });
    </script>
</body>
</html>
