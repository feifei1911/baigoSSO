<?php $cfg = array(
    'title'             => $lang->get('System settings', 'console.common') . ' &raquo; ' . $lang->get('SMTP Settings', 'console.common'),
    'menu_active'       => 'opt',
    'sub_active'        => 'smtp',
    'baigoValidate'     => 'true',
    'baigoSubmit'       => 'true',
    'pathInclude'       => $path_tpl . 'include' . DS,
);

include($cfg['pathInclude'] . 'console_head' . GK_EXT_TPL); ?>

    <form name="opt_form" id="opt_form" action="<?php echo $route_console; ?>opt/smtp-submit/">
        <input type="hidden" name="__token__" value="<?php echo $token; ?>">

        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>
                        <?php echo $lang->get('SMTP Host'); ?> <span class="text-danger">*</span>
                    </label>
                    <input type="text" value="<?php echo $config['var_extra']['smtp']['host']; ?>" name="host" id="host" class="form-control">
                    <small class="form-text" id="msg_host"></small>
                </div>

                <div class="form-group">
                    <label>
                        <?php echo $lang->get('Host port'); ?> <span class="text-danger">*</span>
                    </label>
                    <input type="text" value="<?php echo $config['var_extra']['smtp']['port']; ?>" name="port" id="port" class="form-control">
                    <small class="form-text" id="msg_port"></small>
                </div>

                <div class="form-group">
                    <label>
                        <?php echo $lang->get('Secure type'); ?> <span class="text-danger">*</span>
                    </label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input type="radio"<?php if ($config['var_extra']['smtp']['secure'] == 'off') { ?> checked<?php } ?> value="off" name="secure" id="secure_off" class="form-check-input">
                            <label for="secure_off" class="form-check-label">
                                <?php echo $lang->get('Off'); ?>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio"<?php if ($config['var_extra']['smtp']['secure'] == 'ssl') { ?> checked<?php } ?> value="ssl" name="secure" id="secure_ssl" class="form-check-input">
                            <label for="secure_ssl" class="form-check-label">
                                <?php echo $lang->get('SSL'); ?>
                                <span class="text-muted">(<?php echo $lang->get('Need to enable related SSL, such as: <code>OpenSSL</code>'); ?>)</span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio"<?php if ($config['var_extra']['smtp']['secure'] == 'tls') { ?> checked<?php } ?> value="tls" name="secure" id="secure_tls" class="form-check-input">
                            <label for="secure_tls" class="form-check-label">
                                <?php echo $lang->get('TLS'); ?>
                                <span class="text-muted">(<?php echo $lang->get('Need to enable the relevant TLS'); ?>)</span>
                            </label>
                        </div>
                    </div>
                    <small class="form-text" id="msg_secure"></small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" <?php if ($config['var_extra']['smtp']['auth'] == 'true') { ?>checked<?php } ?> value="true" name="auth" id="auth" class="custom-control-input">
                        <label for="auth" class="custom-control-label">
                            <?php echo $lang->get('Server authentication'); ?>
                        </label>
                    </div>
                    <small class="form-text" id="msg_auth"></small>
                </div>

                <div class="form-group">
                    <label>
                        <?php echo $lang->get('Username'); ?> <span class="text-danger">*</span>
                    </label>
                    <input type="text" value="<?php echo $config['var_extra']['smtp']['user']; ?>" name="user" id="user" class="form-control">
                    <small class="form-text" id="msg_user"></small>
                </div>

                <div class="form-group">
                    <label>
                        <?php echo $lang->get('Password'); ?> <span class="text-danger">*</span>
                    </label>
                    <input type="text" value="<?php echo $config['var_extra']['smtp']['pass']; ?>" name="pass" id="pass" class="form-control">
                    <small class="form-text" id="msg_pass"></small>
                </div>

                <div class="form-group">
                    <label>
                        <?php echo $lang->get('From'); ?> <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><?php echo $lang->get('Email'); ?></span>
                        </div>
                        <input type="text" value="<?php echo $config['var_extra']['smtp']['from_addr']; ?>" name="from_addr" id="from_addr" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><?php echo $lang->get('Name'); ?></span>
                        </div>
                        <input type="text" value="<?php echo $config['var_extra']['smtp']['from_name']; ?>" name="from_name" id="from_name" class="form-control">
                    </div>
                    <small class="form-text" id="msg_from_addr"></small>
                </div>

                <div class="form-group">
                    <label>
                        <?php echo $lang->get('Reply'); ?> <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><?php echo $lang->get('Email'); ?></span>
                        </div>
                        <input type="text" value="<?php echo $config['var_extra']['smtp']['reply_addr']; ?>" name="reply_addr" id="reply_addr" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text"><?php echo $lang->get('Name'); ?></span>
                        </div>
                        <input type="text" value="<?php echo $config['var_extra']['smtp']['reply_name']; ?>" name="reply_name" id="reply_name" class="form-control">
                    </div>
                    <small class="form-text" id="msg_reply_addr"></small>
                </div>

                <div class="form-group">
                    <label><?php echo $lang->get('SMTP Debug'); ?> <span class="text-danger">*</span></label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" <?php if ($config['var_extra']['smtp']['debug'] == '0') { ?>checked<?php } ?> name="debug" id="debug_0" value='0'>
                            <label class="form-check-label">
                                <?php echo $lang->get('Off'); ?>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" <?php if ($config['var_extra']['smtp']['debug'] == '1') { ?>checked<?php } ?> name="debug" id="debug_1" value='1'>
                            <label class="form-check-label">
                                <?php echo $lang->get('Client'); ?>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" <?php if ($config['var_extra']['smtp']['debug'] == '2') { ?>checked<?php } ?> name="debug" id="debug_2" value='2'>
                            <label class="form-check-label">
                                <?php echo $lang->get('Client &amp; Server'); ?>
                            </label>
                        </div>
                    </div>
                    <small class="form-text" id="msg_debug"></small>
                </div>

                <div class="bg-validate-box"></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <?php echo $lang->get('Save'); ?>
                </button>
            </div>
        </div>
    </form>

<?php include($cfg['pathInclude'] . 'console_foot' . GK_EXT_TPL); ?>

    <script type="text/javascript">
    var opts_validate_form = {
        rules: {
            host: {
                require: true
            },
            port: {
                require: true,
                format: 'int'
            },
            secure: {
                require: true
            },
            auth: {
                require: true
            },
            user: {
                require: true
            },
            pass: {
                require: true
            },
            from_addr: {
                require: true,
                format: 'email'
            },
            reply_addr: {
                require: true,
                format: 'email'
            },
            debug: {
                require: true
            }
        },
        attr_names: {
            host: '<?php echo $lang->get('SMTP Host'); ?>',
            port: '<?php echo $lang->get('Host port'); ?>',
            secure: '<?php echo $lang->get('Secure type'); ?>',
            auth: '<?php echo $lang->get('Server authentication'); ?>',
            user: '<?php echo $lang->get('Username'); ?>',
            pass: '<?php echo $lang->get('Password'); ?>',
            from_addr: '<?php echo $lang->get('From'); ?>',
            reply_addr: '<?php echo $lang->get('Reply'); ?>',
            debug: '<?php echo $lang->get('SMTP Debug'); ?>'
        },
        selector_types: {
            secure: 'name',
            auth: 'name',
            debug: 'name'
        },
        type_msg: {
            require: '<?php echo $lang->get('{:attr} require'); ?>'
        },
        format_msg: {
            'int': '<?php echo $lang->get('{:attr} must be numeric'); ?>'
        },
        box: {
            msg: '<?php echo $lang->get('Input error'); ?>'
        }
    };

    var opts_submit_form = {
        modal: {
            btn_text: {
                close: '<?php echo $lang->get('Close'); ?>',
                ok: '<?php echo $lang->get('OK'); ?>'
            }
        },
        msg_text: {
            submitting: '<?php echo $lang->get('Saving'); ?>'
        }
    };

    $(document).ready(function(){
        var obj_validate_form   = $('#opt_form').baigoValidate(opts_validate_form);
        var obj_submit_form     = $('#opt_form').baigoSubmit(opts_submit_form);

        $('#opt_form').submit(function(){
            if (obj_validate_form.verify()) {
                obj_submit_form.formSubmit();
            }
        });
    });
    </script>

<?php include($cfg['pathInclude'] . 'html_foot' . GK_EXT_TPL);