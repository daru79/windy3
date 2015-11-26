<?php $this->load->view('component/head_v'); ?>

    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                </ul>
            <a class="brand" href="<?php print base_url('dashboard'); ?>"><span class="first"><?php print $product; ?></span> <span class="second"><?php print $version; ?></span></a>
        </div>
    </div>

    <div class="row-fluid">
        <div class="dialog">
            <div class="block">
                <p class="block-heading">Sign In</p>
                <div class="block-body">
                    <?php $this->load->view($subview); ?>
                    
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('component/footer_v'); ?>