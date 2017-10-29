Feature:Testing
In order to teach Behat
As a teach
I want to demonstrate how to install and create features

Scenario: Home Page
  Given I am on the homepage
  Then I should see "Laravel"
  And I can do something with laravel