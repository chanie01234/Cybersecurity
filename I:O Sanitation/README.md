# Project 2 - Input/Output Sanitization

Time spent: 23 hours spent in total

## User Stories

The following **required** functionality is completed:

1\. [x] Import the Starting Database

2\. [x] Set Up the Starting Code

3\. [x] Review code for Staff CMS for Users

4\. Complete Staff CMS for Salespeople
  * [x]  Required: index.php
  * [x]  Required: show.php
  * [x]  Required: new.php
  * [x]  Required: edit.php

5\. Complete Staff CMS for States
* [x]  Required: index.php
* [x]  Required: show.php
* [x]  Required: new.php
* [x]  Required: edit.php

6\. Complete Staff CMS for Territories
* [x]  Required: index.php
* [x]  Required: show.php
* [x]  Required: new.php
* [x]  Required: edit.php

7\. Add Data Validations
  * [x]  Required: Validate that no values are left blank.
  * [x]  Required: Validate that all string values are less than 255 characters.
  * [x]  Required: Validate that usernames contain only the whitelisted characters.
  * [x]  Required: Validate that phone numbers contain only the whitelisted characters.
  * [x]  Required: Validate that email addresses contain only whitelisted characters.
  * [x]  Required: Add *at least 5* other validations of your choosing.

8\. Sanitization
  * [x]  Required: All input and dynamic output should be sanitized.
  * [x]  Required: Sanitize dynamic data for URLs
  * [x]  Required: Sanitize dynamic data for HTML
  * [x]  Required: Sanitize dynamic data for SQL

9\. Penetration Testing
  * [x]  Required: Verify form inputs are not vulnerable to SQLI attacks.
  * [x]  Required: Verify query strings are not vulnerable to SQLI attacks.
  * [x]  Required: Verify form inputs are not vulnerable to XSS attacks.
  * [x]  Required: Verify query strings are not vulnerable to XSS attacks.
  * [x]  Required: Listed other bugs or security vulnerabilities


The following advanced user stories are optional:

- [ ]  Bonus: On "public/staff/territories/show.php", display the name of the state.

- [ ]  Bonus: Validate the uniqueness of `users.username`.

- [ ]  Bonus: Add a page for "public/staff/users/delete.php".

- [ ]  Bonus: Add a Staff CMS for countries.

- [ ]  Advanced: Nest the CMS for states inside of the Staff CMS for countries


## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://i.imgur.com/NQmKC7L.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while building the app.

## License

    Copyright [2017] [Chantelle Levy]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
