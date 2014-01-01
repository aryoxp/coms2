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
<div class="tab-content">
    <div class="tab-pane fade in active" id="tv">TV</div>
    <div class="tab-pane fade" id="radio">Radio</div>
    <div class="tab-pane fade" id="vod">VoD</div>
</div>
