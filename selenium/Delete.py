import time

from selenium import webdriver

from selenium.common.exceptions import NoSuchElementException

driver = webdriver.Edge(r"browser\msedgedriver.exe")

# URL of website
url = "http://127.0.0.1/RPL-Unit-Testing/"

# Opening the website
driver.get(url)

time.sleep(1)
try:
    button = driver.find_element_by_xpath("//a[@href=\"/RPL-Unit-Testing/index.php?action=delete&id=28\"]")

    # Click Button
    button.click()

except NoSuchElementException:
    pass