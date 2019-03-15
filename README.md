<h1>PlayerJoinSettings<img src="https://github.com/Anders233/PlayerJoinSettings/blob/master/icon.png" height="64" width="64" align="left"></img></h1>

[![Poggit](https://poggit.pmmp.io/ci.shield/Anders233/PlayerJoinSettings/~)](https://poggit.pmmp.io/ci/Anders233/PlayerJoinSettings/~)
[![Discord](https://img.shields.io/discord/555689914679951380.svg)](https://discord.gg/jKh85hR)[![](https://poggit.pmmp.io/shield.state/PlayerJoinSettings)](https://poggit.pmmp.io/p/PlayerJoinSettings)
<a href="https://poggit.pmmp.io/p/PlayerJoinSettings"><img src="https://poggit.pmmp.io/shield.state/PlayerJoinSettings">
[![Download](https://img.shields.io/github/downloads/Anders233/PlayerJoinSettings/total.svg?label=Download)](https://github.com/Anders233/PlayerJoinSettings/releases)</a>

My first PocketMine plugin<br />
I will try to make his creation more perfect.<br />
If you have any questions, please feel free to provide feedback.[![Discord](https://img.shields.io/discord/555689914679951380.svg)](https://discord.gg/jKh85hR)<br />
Email: fox404@foxmail.com<br />

Fully customized player joins or exits the message, 
or sends a message to the player when joining, Title, SubTitle, pops up the UI form

![image](https://github.com/Anders233/PlayerJoinSettings/blob/master/Demonstration.png)
![image](https://github.com/Anders233/PlayerJoinSettings/blob/master/Demonstration1.png)

Configuration file:

Currently supported tags:
{name}          - The name of the player.
{line}          - Switch to the next line.
{online}        - The number of online players currently on the server
{max_online}    - The maximum number of players the server can accommodate
You can also use & replace with color symbols.

The headline on the screen when joining (Title).
Title: "&l&6Welcome!"

The text above the item bar when you join (SubTitle).
SubTitle: "&bThis is a great server"

Private chat message sent to the player when joining (Message).
Message: "&aHello {name}. {line}&bwelcome to this server. {line}&eI wish you a happy time!"

Server broadcast message when the player joins (PlayerJoinMessage).
PlayerJoinMessage: "&l&7(&9 + &7) &r&a{name} &ejoined the server.&7[&a{online}&7/&6{max_online}&7]"

Server broadcast message when the player Quits (PlayerQuitMessage).
PlayerQuitMessage: "&l&7(&c - &7) &r&a{name} &eQuit the server.&7[&a{online}&7/&6{max_online}&7]"

- Planning project：
  - [x] Fully configurable configuration file
  - [x] There are configurable variables: {name}, {line}, {online},
 {max_online}......
  - [x]	Custom player joins to send private chat messages
  - [x]	Custom player join message
  - [x]	Custom player Quit message
  - [x]	Customize player screen text prompts
  - [x]	Pop up UI box when player joins
    - [ ] Click the button to execute the command
