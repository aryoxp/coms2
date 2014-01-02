<h2>New Media</h2>
<hr>
<form id="form-newmedia" class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="<?php echo $this->location('module/stb/media/save'); ?>">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Media Name</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="media-name" placeholder="Name of Media Content">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Media Description</label>
        <div class="col-sm-10">
            <textarea id="ckeditor" class="ckeditor" name="description"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Media File URL</label>
        <div class="col-sm-10">
            <input type="text" name="file" class="form-control" placeholder="Media File URL">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Stream URL</label>
        <div class="col-sm-10">
            <input type="text" name="stream" class="form-control" placeholder="Media Stream URL">
        </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Media Type</label>
        <div class="col-sm-10">
            <div class="radio-inline">
                <label>
                    <input type="radio" name="mediatype" id="optionsRadios1" value="tv" checked>
                    TV
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="mediatype" id="optionsRadios2" value="radio">
                    Radio
                </label>
            </div>
            <div class="radio-inline">
                <label>
                    <input type="radio" name="mediatype" id="optionsRadios2" value="vod">
                    Video on Demand (VoD)
                </label>
            </div>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <label class="col-sm-2 control-label">Media Logo</label>
        <div class="col-lg-10 col-md-10 col-sm-10 input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file">
                Browse&hellip; <input type="file" name="logo">
            </span>
        </span>
        <input type="text" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Media Icon</label>
        <div class="col-lg-10 col-md-10 col-sm-10 input-group">
        <span class="input-group-btn">
            <span class="btn btn-primary btn-file">
                Browse&hellip; <input type="file" name="icon">
            </span>
        </span>
            <input type="text" class="form-control" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="status" value="1" checked>
                    Active and Enabled
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">

        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="btn-submit" data-loading-text="Saving..." >Save</button>
            <p id="save-status"></p>
        </div>

    </div>
</form>