#!/usr/bin/env python
# Button on GPIO 24 to shutdown Pi
# When grounded:
# Blanks OLED and initiates shutdown 


import RPi.GPIO as GPIO
import subprocess
import time


GPIO.setmode(GPIO.BCM)
GPIO.setup(24, GPIO.IN, pull_up_down=GPIO.PUD_UP)
GPIO.wait_for_edge(24, GPIO.FALLING)

# SHUTDOWN OS
subprocess.call(['shutdown', '-h', 'now'], shell=False)



#########
# OLED SCREEN
#########
from luma.core.interface.serial import i2c
from luma.core.render import canvas
from luma.oled.device import sh1106

# I2C interface and address
serial = i2c(port=1, address=0x3C)
# OLED Device
device = sh1106(serial)

# CLEAR SCREEN
with canvas(device) as draw:
    draw.rectangle(device.bounding_box, outline="black", fill="black")
    draw.text((30, 10), "Goodbye", fill="white")
    time.sleep(1) 
#########
 
