<fieldset>
    <legend>
        Create New Content
        <a href="<?php echo $this->location('module/content'); ?>" class="btn btn-default pull-right">
            <span class="glyphicon glyphicon-th-list"></span> Contents List</a>
    </legend>
    <form id="write-form" class="form-horizontal" role="form" name="auth" method="post" action="<?php echo $this->location('module/content/home/post'); ?>">
    <input class="form-control" type="hidden" name="id" id="id" value="" />
    <input class="form-control" type="hidden" name="content_author_id" id="content-author-id" value="<?php echo $user->username; ?>" />
        <div class="col-md-12">
        
            <div class="form-group">
                <div class="hide" id="notification-container"></div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="content_title">Content Identifier</label>
                <div class="col-sm-9">
                <input class="form-control" type="text" name="content_page" id="content_page" class="input-xlarge" value="" placeholder="This value will be used as content identifier or displayed file name" />
                </div>
            </div><!-- /control-group -->            
            
            <div class="form-group">
                <label class="col-sm-3 control-label" for="content_title">Title</label>
                <div class="col-sm-9">
                <input class="form-control" type="text" name="content_title" id="content_title" class="input-xlarge" value="" placeholder="Content Title" />
                </div>
            </div><!-- /control-group -->


            <div class="form-group">
                <label class="col-sm-3 control-label">Date</label>
                <div class="col-sm-3">
                <input class="form-control" type="text" name="content_date" value="<?php echo date('d/m/Y'); ?>" id="date-time" />
                </div>

                <label class="col-md-3 control-label">Time</label>
                <div class="col-sm-3">
                <input class="form-control" type="text" name="content_time" value="<?php echo date('H:i:s'); ?>" />
                </div>
            </div>

            <div class="control-group" style="margin-top:1em;">
                
                <ul class="nav nav-tabs" id="writeTab">
                  <li class="active"><a href="#tab-write">Write Contents</a></li>
                  <li><a href="#tab-upload">Upload</a></li>
                </ul>
                 
                <div class="tab-content">
                  <div class="tab-pane active" id="tab-write" style="padding-top: 1em">
                    <textarea class="form-control" name="content_content" id="ckeditor" class="ckeditor" style="height:300px;" ></textarea>
                  </div><!--/tab-write-->
                  <div class="tab-pane" id="tab-upload">
                  	  <?php $this->view('upload-frame.php', null, true); ?>
                  </div>
                  
                </div>                
                
                
            </div><!-- /control-group -->

        </div><!-- /span8 -->
               
        <div class="col-md-12" style="margin-top: 1em;">
            <button class="btn btn-danger pull-right btn-discard">Discard</button>
            <button class="btn btn-primary" data-loading-text="Publishing..." id="btn-publish">Save and Publish</button>
            <button class="btn" data-loading-text="Saving..." id="btn-draft">Save as Draft</button>
            <span id="save-status"></span>
        </div>
    </form>
</fieldset>