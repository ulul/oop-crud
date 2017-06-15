<?php
    if(!defined('RESTRICTED'))exit('No direct script access allowed!');
    $data = $model->getDataById(@$_GET['id']);

?>

        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                <h2><?php echo $data->title; ?></h2>
                </div>
                <div class="panel-body">
                	<blockquote>
						<p>Author: <?php echo $data->author; ?> created: <?php echo $data->created_at; ?> updated: <?php echo $data->updated_at; ?></p>
					</blockquote>
                	<p>
                		<?php echo $data->content; ?>
                	</p>
                	<div class="text-center">
                		<a href="<?php echo $baseUrl; ?>index.php?page=articles" class="btn btn-default btn-sm">Back</a>
                	</div>
                </div>    
            </div>
        </div>
  