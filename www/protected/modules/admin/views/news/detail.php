<?php
    $this->breadcrumbs=array(
        'Tin tức'
    );
?>
<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Cras justo odio
            </a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item">Morbi leo risus</a>
            <a href="#" class="list-group-item">Porta ac consectetur ac</a>
            <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $content->content; ?></h3>
            </div>
            <div class="panel-body">
                <article class="article">
                    <?php echo $content->content; ?>
                </article>
            </div>
        </div>
    </div>
</div>
