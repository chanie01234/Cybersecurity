# Project 10 - Honeypot

Time spent: 7 hours spent in total

> Objective: Setup a honeypot and provide a working demonstration of its features.

### Required: Overview & Setup

- [x] A basic writeup (250-500 words) describing the overall approach, resources/tools used, findings,etc. when setting up the honeypot.
	- Summary: My overall approach to Honeypots is to first understand the functionalities and uses of the Honeypot. There are multiple honeypots for most languages and almost every purpose according to the developer. From the resources provided, honeypots are a great way to analyze, attack, and prevent threats toward a user, organization, etc. Implementing a Honeypot is fairly easy and provide the flexibility of serving the purpose of the developer. For this assignment, I set up my honeypot using a server and a target(honeypot) on virtualbox. Through this, I can use my mhn server to detect types of attacks, ports, country of origin of any attack placed on the honeypot. Using nmap, a hacking tool that sends malicious packets and records the responses of the a system, web app, etc., I was able to launch an attack on my honeypot. I was able to witness the power of a honeypot and it's use in everyday cyber security. Of course, there are ways to conceal your identity via IP address and country of origin via "proxy servers" so that the attacker remains anonymous. After the attack was launched, I was able to keep track of my attacks using the Attacks Report page on the MHN server. Here, lists date/time of detection, country of origin, source IP address, destination port, protocol, type of honeypot that detected the attack. Analyzing this report can reveal tremendous information about the attack and attacker. There are multiple honeypots you can use at a time to gather various information about an attack and to prevent it from appearing in your crosshairs ever again. 

- [x] A specific, reproducible honeypot setup, ideally automated. There are several possibilities for this:
	- A Vagrantfile or Dockerfile which provisions the honeypot as a VM or container <= **my-approach**
	- A bash script that installs and configures the honeypot for a specific OS
	- Alternatively, **detailed** notes added to the `README.md` regarding the setup, requirements, features, etc.

### Required: Demonstration

- [x] A basic writeup of the attack (what offensive tools were used, what specifically was detected by the honeypot)
	- Summary: I used nmap is attack the target aka Honeypot. Nmap is a hacking tool that sends malicious packets and records the responses of the Honeypot. This recorded on the MHN Server site. I used Dionea, a honeypot that aims to capture malware that exploits vulnerabilities exposed by services offered over a network. Whatever was caught in the Honeypot is displayed in the Attacks section of the site where the date/time, sensor, country of origin, source IP address, destination port, protocol, and type of honeypot.

- [x] An example of the data captured by the honeypot (example: IDS logs including IP, request paths, alerts triggered)
<img src='http://i.imgur.com/BR6FZf6.png' title='Video Walkthrough' width='' alt='Video Walkthrough' />

- [x] A screen-cap of the attack being conducted:
<img src='http://i.imgur.com/w1EUokc.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

### Optional: Features
- Honeypot
	- [ ] HTTPS enabled (self-signed SSL cert)
	- [ ] A web application with both authenticated and unauthenticated footprint
	- [ ] Database back-end
	- [ ] Custom exploits (example: intentionally added SQLI vulnerabilities)
	- [ ] Custom traps (example: modified version of known vulnerability to prevent full exploitation)
	- [ ] Custom IDS alert (example: email sent when footprinting detected)
	- [ ] Custom incident response (example: IDS alert triggers added firewall rule to block an IP)
- Demonstration
	- [ ] Additional attack demos/writeups
	- [ ] Captured malicious payload
	- [ ] Enhanced logging of exploit post-exploit activity (example: attacker-initiated commands captured and logged)

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
