# Kanboard SAML Authentication Plugin

Plugin for [Kanboard](https://github.com/fguillot/kanboard) :ok_hand:

This is a plugin that allows Kanboard to be used as a SP (Service Provider) and authenticate against an IDP (Identity Provider) via the SAML2 protocol.

## Instructions
Download the plugin and upload it to the /plugins directory of your Kanboard install. Then login with your admin account and fill out the required fields under **Settings** → **Integrations**. Click **Save settings** to store the data, and then **Generate metadata**. The resulting XML file can be used to set up your identity provider.

After filling out all of the fields, click the **Save** button before clicking **Generate Metadata**.

### Webserver

This plugin expects to have the [DOM extension](https://secure.php.net/en/dom) for php. This can be installed on Debian / Ubuntu using:

```
# apt install php5-dom
```

And on CentOS/Fedora/Red Hat:

```
# yum install php-xml
```

However, since using Kanboard with MySQL/MariaDB requires PHP 7.1, if you followed the instructions to [enable the webtastic yum repository](https://www.vultr.com/docs/how-to-install-kanboard-on-centos-7), you can install this extension with:

```
# yum install php71w-xml
```

## Contributors
* Trajche Kralev (trajche)
* Pietro Saccardi (LizardM4)
* smacz42
