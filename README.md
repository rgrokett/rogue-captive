# Rogue captive portal for Raspberry Pi
# For simulating Google and Xfinity login screens

This is modified from the original version to work with Raspbian Stretch and to simulate the either the Google or Xfinity captured portal WiFi Access Point and login screen. 

See https://braindead-security.blogspot.com/2017/06/building-rogue-captive-portal-for.html

## Features 
- Uses Raspberry Pi Zero W
- WiFi Access Point w/o Internet connection
- Portable using 5V battery
- Supports OLED Display
- Selectable portal: Google or Xfinity simulations
- Capture credentials
- Push button graceful Shutdown 

## DETAILS
This is a simple website and set of configuration files that turns a Raspberry Pi Zero W (or other Pi with WiFi) into a rogue access point named either "Google Free Wifi" or "xfinitywifi" It spoofs a captive portal that looks like either the Google Wifi login page or the Xfinity Account login page, however authentication always fails and the credentials are logged to a text file.

It was designed to demonstrate the simplicity of offline credential grabbing and to educate about wireless security. Using this for malicious purposes is against the author's intent and could lead to prosecution under privacy laws.

You select which type portal you want during installation. You can change by rerunning the install.sh script and then rebooting.

See the CaptivePortal.PDF document for details on this hardware and software addition.

[CaptivePortal.pdf](/CaptivePortal.pdf)


## INSTALLATION
Installation after a fresh install of Rasbian Stretch Lite:
```
sudo apt-get install git
git clone https://github.com/rgrokett/rogue-captive
cd rogue-captive
sudo bash install.sh
sudo reboot
```

During installation, macchanger will ask whether or not MAC addresses should be changed automatically - choose "No". The startup script in rc.local will perform this task more reliably.

After reboot, look for an access point name displayed at the end of the install. Connecting to it from an Apple or Android device should automatically bring up a captive portal login screen.

Credentials are logged in `/var/www/html/creds.txt`.

## OPTIONAL FEATURES

NOTE: This version also contains the ability to add a OLED screen that will display current connections as they occur as well as add a shutdown button to gracefully shutdown the Pi.


See the PDF doc for details of adding these.



