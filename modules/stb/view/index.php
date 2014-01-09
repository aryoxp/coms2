<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <h2>Media Index</h2>
    </div><!-- /.col-lg-6 -->
    <div class="col-lg-6 col-md-6 col-sm-6">
        <form role="form">
        <div class="input-group" style="padding-top: 1.5em;">
            <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
                <a href="<?php echo $this->location('media/newmedia', true); ?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> New Media</a>
            </span>
        </div><!-- /input-group -->
        </form>
    </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
<hr>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tv" data-toggle="tab">TV</a></li>
    <li><a href="#radio" data-toggle="tab">Radio</a></li>
    <li><a href="#vod" data-toggle="tab">Video on Demand</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content" style="padding-top: 1em;">
    <div class="tab-pane fade in active" id="tv">
        <?php //var_dump($media_tv);
            if(isset($media_tv) and is_array($media_tv) and count($media_tv)) {
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Media</th>
                            <th>Media Action</th>
                        </tr>
                    </thead>
                <?php
                foreach($media_tv as $m) { //var_dump($m);
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $this->file('files/logo/'.md5($m->id).'.png'); ?>" class="logo pull-right">
                            <h3><?php echo $m->name; ?>
                            <?php if($m->status) echo '<small><div class="label label-success">Active</div></small>';
                            else echo '<div class="label label-warning">Inactive</div>'
                            ?>
                            </h3>
                            <span class="media-description"><?php echo $m->description; ?></span>
                            <br><div class="label label-info">File</div><code><?php echo $m->file; ?></code>
                            <br><div class="label label-success">Stream</div><code><?php echo $m->stream; ?></code>
                        </td>
                        <td style="width: 120px">
                            <div class="btn-group">
                            <a href="<?php echo $this->location('module/stb/media/edit/'.$m->id); ?>" class="btn btn-sm btn-warning" data-id="<?php echo $m->id; ?>">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger btn-delete" data-type="tv" data-id="<?php echo $m->id; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </table>
                <?php
            } else echo '<div class="alert alert-info">No Media</div>';
        ?>
    </div>
    <div class="tab-pane fade" id="radio">
        <?php //var_dump($media_tv);
        if(isset($media_radio) and is_array($media_radio) and count($media_radio)) {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Media</th>
                    <th>Media Action</th>
                </tr>
                </thead>
                <?php
                foreach($media_radio as $m) { //var_dump($m);
                    ?>
                    <tr>
                        <td><h3><?php echo $m->name; ?>
                                <?php if($m->status) echo '<small><div class="label label-success">Active</div></small>';
                                else echo '<div class="label label-warning">Inactive</div>'
                                ?>
                            </h3>
                            <span class="media-description excerpt"><?php echo $m->description; ?></span>
                            <br><div class="label label-info">File</div><code><?php echo $m->file; ?></code>
                            <br><div class="label label-success">Stream</div><code><?php echo $m->stream; ?></code>
                        </td>
                        <td style="width: 120px">
                            <div class="btn-group">
                                <a href="<?php echo $this->location('module/stb/media/edit/'.$m->id); ?>" class="btn btn-sm btn-warning" data-id="<?php echo $m->id; ?>">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger btn-delete" data-type="radio" data-id="<?php echo $m->id; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        } else echo '<div class="alert alert-info">No Media</div>';
        ?>
    </div>
    <div class="tab-pane fade" id="vod">
        <?php //var_dump($media_vod);
        if(isset($media_vod) and is_array($media_vod) and count($media_vod)) {
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Media</th>
                    <th>Media Action</th>
                </tr>
                </thead>
                <?php
                foreach($media_vod as $m) { //var_dump($m);
                    ?>
                    <tr>
                        <td><h3><?php echo $m->name; ?>
                                <?php if($m->status) echo '<small><div class="label label-success">Active</div></small>';
                                else echo '<div class="label label-warning">Inactive</div>'
                                ?>
                            </h3>
                            <span class="media-description excerpt"><?php echo $m->description; ?></span>
                            <br><div class="label label-info">File</div><code><?php echo $m->file; ?></code>
                            <br><div class="label label-success">Stream</div><code><?php echo $m->stream; ?></code>
                        </td>
                        <td style="width: 120px">
                            <div class="btn-group">
                                <a href="<?php echo $this->location('module/stb/media/edit/'.$m->id); ?>" class="btn btn-sm btn-warning" data-id="<?php echo $m->id; ?>">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger btn-delete" data-type="vod" data-id="<?php echo $m->id; ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php
        } else echo '<div class="alert alert-info">No Media</div>';
        ?>
    </div>
</div>
