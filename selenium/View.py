import time

from selenium import webdriver

from selenium.common.exceptions import NoSuchElementException

driver = webdriver.Edge(r"browser\msedgedriver.exe")

# URL of website
url = "http://127.0.0.1/RPL-Unit-Testing/"

# Opening the website
driver.get(url)
