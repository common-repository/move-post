<div class="wrap">

<div class="icon32" id="icon-edit-pages"></div>

<h2>Move Post</h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">

		<div id="post-body">

			<div id="post-body-content" class="form-wrap">

                <form name="post_form" method="post" action="" enctype="multipart/form-data">

				<div id="titlediv">

					<div class="form-field">

					<label for="title"><?php _e('From Category') ?></label>

					<?php wp_dropdown_categories(array('show_option_none'=>'None','hide_empty' => 0, 'name' => 'fromcategory', 'hierarchical' => true)); ?>

					</div>

				</div>

                <div id="titlediv">

					<div class="form-field">

					<label for="title"><?php _e('To Category') ?></label>

					<?php wp_dropdown_categories(array('show_option_none'=>'None','hide_empty' => 0, 'name' => 'tocategory', 'hierarchical' => true)); ?>

					</div>

				</div>

                
				

                <div style="margin-top:15px;">
              

                <input type="submit" name="submit" value="Submit" class="button" />

                <input type="hidden" name="act" value="save" />

                </form>

			</div>

		</div>

	</div>  

</div>