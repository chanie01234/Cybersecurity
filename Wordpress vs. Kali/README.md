# Project 7 - WordPress Pentesting

Time spent: 11 hours spent in total

> Objective: Find, analyze, recreate, and document **three vulnerabilities** affecting an old version of WordPress

## Pentesting Report

1. Authenticated Stored Cross-Site Scripting via Image Filename
  - [x] Summary: WordPress performs insufficient validation on the file name of uploaded media types and in specific images. The file name of an image is used as image Title (meta) in so called ‘attachment pages’ (HTML).
    - Vulnerability types: XSS Injection
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.10
  - [x] GIF Walkthrough: <img src='http://i.imgur.com/dpN8lXQ.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />
  - [x] Steps to recreate: An attacker can exploit this vulnerability by crafting an image file name with Cross-Site Scripting payload and lure an admin into uploading the image with the malicious file name. First, I used "cengizhansahinsumofpwn<img src=a onerror=alert(document.cookie)>.jpg" to name my image file. With my burp suite running, I uploaded the malicious filename to my wordpress account. Then, I brought up the image via attachment pages. As a result, a prompt kept popping up on my webpage with the mysterious message before the page is loaded. Once the page is loaded, there is a broken image file next to filename of the uploaded image.
  - [x] Affected source code:
    - N/A
  - [x] Links:
    - [Link 1](https://sumofpwn.nl/advisory/2016/persistent_cross_site_scripting_vulnerability_in_wordpress_due_to_unsafe_processing_of_file_names.html)

1. Content Injection Vulnerability in WordPress
  - [x] Summary:This vulnerability allows an unauthenticated user to modify the content of any post or page within a WordPress site. One of these REST endpoints allows access (via the API) to view, edit, delete and create posts. Within this particular endpoint, a subtle bug allows visitors to edit any post on the site.
    - Vulnerability types: Privilege Escalation / Content Injection
    - Tested in version: 4.7.0
    - Fixed in version: 4.7.2
  - [x] GIF Walkthrough: <img src='http://i.imgur.com/TBSF6mS.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />
  - [x] Steps to recreate: For this vulnerability, I will be showing a simple duplication of a published post with an invalid post id. Mind you, the post id should only be numerical not alphanumerical and that's the exploit I will demonstrate. Interesting enough, the admin would never know that the hacker created the duplicated post since it doesn't show up in the Posts homepage. I used burp suite for this exploit. I simply caught the GET call on a random post and sent it to my repeater. From there, I simply changed the post id from '4' to '4abc' which allows me to create a post using an invalid post id. The admin has access to the post via post = 4 while I, the hacker, has access to the via post = 4abc.
  - [x] Affected source code:
    - N/A
  - [x] Links:
    - [Link 1](https://blog.sucuri.net/2017/02/content-injection-vulnerability-wordpress-rest-api.html)

1. Legacy Theme Preview Cross-Site Scripting (XSS)
  - [x] Summary: Cross-site scripting (XSS) vulnerability in the legacy theme preview implementation allows remote attackers to inject arbitrary javascript or HTML via a crafted string.
    - Vulnerability types: Persistent XSS
    - Tested in version: 4.2.2
    - Fixed in version: 4.2.4
  - [x] GIF Walkthrough: <img src='http://i.imgur.com/MgHSQ53.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />
  - [x] Steps to recreate:
  - [x] Affected source code:
    - [Link 1](https://core.trac.wordpress.org/changeset/33549)
  - [x] Links:
    - [Link 1](https://blog.sucuri.net/2015/08/persistent-xss-vulnerability-in-wordpress-explained.html)

## Assets

List any additional assets, such as scripts or files

## Resources

- [WordPress Source Browser](https://core.trac.wordpress.org/browser/)
- [WordPress Developer Reference](https://developer.wordpress.org/reference/)

GIFs created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while doing the work

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
