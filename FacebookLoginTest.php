<?php
require_once('vendor/autoload.php');

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class FacebookLoginTest
{
    private $driver;

    public function __construct()
    {
        $capabilities = DesiredCapabilities::chrome();
        $this->driver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    public function runTests()
    {
        $this->negativeTest1();
        $this->negativeTest2();
        $this->negativeTest3();
        $this->negativeTest4();
        $this->negativeTest5();
        $this->positiveTest();
    }

    private function positiveTest()
    {
        $this->driver->get('https://www.facebook.com');

        // Fill in valid credentials

        //This email is temp/ But can logged to the facebook
        $this->driver->findElement(WebDriverBy::id('email'))->sendKeys('pearly640@yalhethun.com');
        $this->driver->findElement(WebDriverBy::id('pass'))->sendKeys('qwertQWERT');

        // Click the login button
        $this->driver->findElement(WebDriverBy::name('login'))->click();

        // Wait for the login to be successful 
        $this->driver->wait(10)->until(WebDriverExpectedCondition::urlContains('facebook.com'));
    }

    private function negativeTest1()
    {
        $this->driver->get('https://www.facebook.com');

        // Fill in incorrect email and correct password
        $this->driver->findElement(WebDriverBy::id('email'))->sendKeys('asdfa@gmail.com');
        $this->driver->findElement(WebDriverBy::id('pass'))->sendKeys('qwertQWERT');

        // Click the login button
        $this->driver->findElement(WebDriverBy::name('login'))->click();

        // Wait for an error message
        $this->driver->wait(10)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.error_message')));
    }

    private function negativeTest2()
    {
        $this->driver->get('https://www.facebook.com');

        // Fill in correct email and incorrect password
        $this->driver->findElement(WebDriverBy::id('email'))->sendKeys('pearly640@yalhethun.com');
        $this->driver->findElement(WebDriverBy::id('pass'))->sendKeys('xdgxsfd');

        // Click the login button
        $this->driver->findElement(WebDriverBy::name('login'))->click();

        // Wait for an error message 
        $this->driver->wait(10)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.error_message')));
    }

    private function negativeTest3()
    {
        $this->driver->get('https://www.facebook.com');

        // Fill in invalid credentiols
        $this->driver->findElement(WebDriverBy::id('email'))->sendKeys('ara@gmail.com');
        $this->driver->findElement(WebDriverBy::id('pass'))->sendKeys('sdfsf');

        // Click the login button
        $this->driver->findElement(WebDriverBy::name('login'))->click();

        // Wait for an error message 
        $this->driver->wait(10)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.error_message')));
    }

    private function negativeTest4()
    {
        $this->driver->get('https://www.facebook.com');

        // Click the login button 
        $this->driver->findElement(WebDriverBy::name('login'))->click();

        // Wait for an error message 
        $this->driver->wait(10)->until(WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector('.error_message')));
    }

    private function negativeTest5()
    {
        $this->driver->get('https://www.facebook.com');

        // Fill in valid credentiols
        $this->driver->findElement(WebDriverBy::id('email'))->sendKeys('pearly640@yalhethun.com');
        $this->driver->findElement(WebDriverBy::id('pass'))->sendKeys('qwertQWERT');

        // Click the "Forgotten Password?" button
        $this->driver->findElement(WebDriverBy::linkText('Forgotten Password?'))->click();
    }


        public function __destruct()
        {
            // Close the browser 
            $this->driver->quit();
        }
    }

    // Run the tests
    $test = new FacebookLoginTest();
    $test->runTests();
    ?>
