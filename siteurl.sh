#!/bin/sh

if [ "$1" == "" ]; then
    echo 'usage: siteurl show'
    echo '       siteurl set HOSTNAME'
    exit 1
fi

cmd=$1

if [ "$cmd" == "set" ]; then
    hostname=$2
    echo "update core_config_data set value = 'http://$hostname/' where path = 'web/unsecure/base_url';" | database.sh
    echo "update core_config_data set value = 'https://$hostname/' where path = 'web/secure/base_url';" | database.sh
    echo "update core_config_data set value = 'http://$hostname/' where path = 'zone/store/default_redirect_url';" | database.sh
    echo "Site URL updated to $hostname"
    echo ''
fi

if [ "$cmd" == "show" -o "$cmd" == "set" ]; then
    echo 'Magento Site URLs'
    echo 'select * from core_config_data where path like "web/%secure/base_url" or path = "zone/store/default_redirect_url"' | database.sh
    echo ''
    echo 'WordPress Site URLs'
    echo 'select * from wpblog_options where option_name in ("siteurl", "home")' | database.sh
    echo ''
else
    echo "error: unknown command '$cmd'"
    exit 1
fi

exit 0
