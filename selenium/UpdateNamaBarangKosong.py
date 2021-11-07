import time

from selenium import webdriver

from selenium.common.exceptions import NoSuchElementException

driver = webdriver.Edge(r"browser\msedgedriver.exe")

# URL of website
url = "http://127.0.0.1"

# Opening the website
driver.get(url)

time.sleep(1)
try:
    button = driver.find_element_by_xpath("//button[@onclick=\"fillUpdateForm(17)\"]")

    # Click Button
    button.click()

except NoSuchElementException:
    pass

time.sleep(2)
try:
    driver.find_element_by_id("nama-barang").send_keys("")

except NoSuchElementException:
    pass

time.sleep(1)
try:
    driver.find_element_by_id("price").send_keys("20000")

except NoSuchElementException:
    pass

time.sleep(1)
try:
    driver.find_element_by_id("amount").send_keys("5")

except NoSuchElementException:
    pass

time.sleep(1)
try:
    field = driver.find_element_by_id("date").send_keys("08/11/2021")

except NoSuchElementException:
    pass

time.sleep(1)
try:
    button = driver.find_element_by_xpath("//input[@name=\"submit\"]")

    # Click da button
    button.click()
except NoSuchElementException:
    pass