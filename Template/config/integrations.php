<h3><i class="fa fa-gitlab fa-fw" aria-hidden="true"></i><?= t('Saml2 Authentication') ?></h3>
<div class="listing">

  <h3>Service Provider Configuration (Kanboard Instance)</h3>

  <?= $this->form->label(t('SP Entity ID'), 'samlauth_sp_entity_id') ?>
  <?= $this->form->text('samlauth_sp_entity_id', $values, array(), array('required')) ?>

  <?= $this->form->label(t('Single Signon Service'), 'samlauth_sp_signon') ?>
  <?= $this->form->text('samlauth_sp_signon', $values, array(''), array('placeholder="http://your-kanboard-url.com"')) ?>

  <?= $this->form->label(t('Single Logout Service'), 'samlauth_sp_signout') ?>
  <?= $this->form->text('samlauth_sp_signout', $values, array(''), array('placeholder="http://your-kanboard-url.com/logout"')) ?>

  <?= $this->form->label(t('Technical Contact (Name)'), 'samlauth_techcontact_name')   ?>
  <?= $this->form->text('samlauth_techcontact_name', $values, array(''), array('required', 'placeholder="Trajche Kralev"')) ?>

  <?= $this->form->label(t('Technical Contact (Email)'), 'samlauth_techcontact_email') ?>
  <?= $this->form->text('samlauth_techcontact_email', $values, array(''), array('required', 'placeholder="trajche@kralev.eu"')) ?>

  <?= $this->form->label(t('SP Certificate'), 'samlauth_sp_cert') ?>
  <?= $this->form->textarea('samlauth_sp_cert', $values, array(), array('placeholder=""')) ?>

  <?= $this->form->label(t('SP Certificate Private Key'), 'samlauth_sp_key') ?>
  <?= $this->form->textarea('samlauth_sp_key', $values, array(), array('placeholder=""')) ?>

  <hr style="margin:20px 0;">

  <h3>Identity Provider Configuration</h3>
  <?= $this->form->label(t('IDP Entity ID'), 'samlauth_idp_entity_id') ?>
  <?= $this->form->text('samlauth_idp_entity_id', $values, array(''), array('required')) ?>

  <?= $this->form->label(t('Single Signon Service'), 'samlauth_idp_signon') ?>
  <?= $this->form->text('samlauth_idp_signon', $values, array(''), array('placeholder="http://youridpurl.com/uas/SingleSignOnService"')) ?>

  <?= $this->form->label(t('Single Logout Service'), 'samlauth_idp_signout') ?>
  <?= $this->form->text('samlauth_idp_signout', $values, array(''), array('placeholder="http://youridpurl.com/uas/SingleSignOutService"')) ?>

  <?= $this->form->label(t('IDP Certificate'), 'samlauth_idp_cert') ?>
  <?= $this->form->textarea('samlauth_idp_cert', $values, array(), array('placeholder=""')) ?>

  <hr style="margin:20px 0;">

  <h3>Identity Provider Attribute Mapping</h3>
  <?= $this->form->label(t('First-name Attribute'), 'samlauth_firstname_attribute') ?>
  <?= $this->form->text('samlauth_firstname_attribute', $values, array(), array('placeholder="fname"')) ?>
  <p class="form-help"><?= t('Enter the attribute that is returned by your IDP. Default is "fname"') ?></p>

  <?= $this->form->label(t('Last-name Attribute'), 'samlauth_lastname_attribute') ?>
  <?= $this->form->text('samlauth_lastname_attribute', $values, array(), array('placeholder="lname"')) ?>
  <p class="form-help"><?= t('Enter the attribute that is returned by your IDP. Default is "lname"') ?></p>

  <?= $this->form->label(t('Username Attribute'), 'samlauth_username_attribute') ?>
  <?= $this->form->text('samlauth_username_attribute', $values, array(), array('placeholder="username"')) ?>
  <p class="form-help"><?= t('Enter the attribute that is returned by your IDP. Default is "username"') ?></p>

  <?= $this->form->label(t('Remove text in username attribute'), 'samlauth_replace_attribute') ?>
  <?= $this->form->text('samlauth_replace_attribute', $values, array(), array('placeholder="@company.com"')) ?>
  <p class="form-help">
    <?= t('If you want to remove a string from the username attribute returned, write it here.') ?>
    <br>
    <?= t('For example: by using "@company.com", it will turn "your.name@company.com" into your.name.') ?>
  </p>

  <?= $this->form->label(t('Email Attribute'), 'samlauth_email_attribute') ?>
  <?= $this->form->text('samlauth_email_attribute', $values, array(), array('placeholder="email"')) ?>
  <p class="form-help"><?= t('Enter the attribute that is returned by your IDP. Default is "email"') ?></p>




  <hr style="margin:20px 0;">

  <h3>Other Settings</h3>

  <?= $this->form->label(t('Login Button Text'), 'samlauth_login_button') ?>
  <?= $this->form->text('samlauth_login_button', $values, array(''), array('required', 'placeholder="Login with SAML"')) ?>
  <br><br>
  <p class="form-help"><?= t('Submit this form to save the settings before generating the metadata!') ?></p>
  <br>
  <input type="submit" value="<?= t('Save settings') ?>" class='btn'>
  <?= $this->url->button('fa-certificate', t('Generate Metadata'), 'SamlAuthController', 'metadata', array('plugin'=>'SamlAuth'), false, '', t('SAML SP Metadata')) ?>

  <div style="margin:20px 0;"></div>


</div>
