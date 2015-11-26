<?php print '<pre>' . print_r($this->session->userdata, TRUE) . '</pre>'; ?>
<?php print validation_errors(); ?>
<?php print form_open(); ?>

    <label>E-mail</label>
    <?php print form_input('em_mail', '', 'class="span12"'); ?>
    <label>Hasło</label>
    <?php print form_password('em_pass', '', 'class="span12"'); ?>
    <?php print form_submit('submit', 'Loguj', 'class="btn btn-primary pull-right"'); ?>
    <?php print anchor('', 'Zapomniałem hasła', 'class="btn btn-danger pull-left"'); ?>
    <?php // print $this->db->last_query(); ?>
    <div class="clearfix"></div>
                    
<?php print form_close(); ?>