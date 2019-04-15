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

- Planning project：
  - [x] Fully configurable configuration file
  - [x] There are configurable variables: {name}, {line}, {online},
 {max_online}......
  - [x]	Custom player joins to send private chat messages
  - [x]	Custom player join message
  - [x]	Custom player Quit message
  - [x]	Customize player screen text prompts
  - [x]	Pop up UI box when player joins
    - [x] Click the button to execute the command
   全部完成了！

Configuration file:
---
#Currently supported tags:
#目前支持的变量:
#{name}          - The name of the player.
#{name}          - 玩家的名字
#{line}          - Switch to the next line.
#{line}          - 切换到下一行
#{online}        - The number of online players currently on the server.
#{online}        - 当前服务器在线玩家
#{max_online}    - The maximum number of players the server can accommodate
#{max_online}    - 服务器最多在线玩家
#You can also use & replace with color symbols.
#您也可以使用 & 替换颜色符号

#----------==========<<<[Title and SubTitle]>>>==========----------

#Show title when players join? (true or false)
#玩家加入时显示标题？(true 或 false)
TitleSwitch: true

#The headline on the screen when joining (Title)
#加入时屏幕上的标题内容(大标题)
Title: "&l&6 Welcome!"

#The text above the item bar when you join (SubTitle)
#加入时屏幕上的标题内容(小标题)
SubTitle: "&b This is a great server"

#----------==========<<<[Jion and Quit MSG]>>>==========----------

#Send a message when the player joins? (true or false)
#玩家加入时发送消息？(true 或 false)
MessageSwitch: true

#Private chat message sent to the player when joining (Message)
#玩家加入时发送给玩家的消息
Message: "&a Hello {name}. {line}&b Welcome to this server. {line}&e I wish you a happy time!"

#Undo the original player join prompt for the server? (true or false)
#撤销服务器自带的玩家加入提示？(true 或 false)
UndoPlayerJoinMessage: true

#Whether to prompt the message when the player joins? (true or false)
#玩家加入时发送自定义加入提示？(true 或 false)
PlayerJoinMessageSwitch: true

#Server broadcast message when the player joins (Player Join Message).
#玩家加入服务器时全服广播的内容
PlayerJoinMessage: "&l&7(&9+&7) &r&a{name} &ejoined the server.&7[&a{online}&7/&6{max_online}&7]"


#Undo the original player exit prompt for the server? (true or false)
#撤销服务器自带的玩家退出提示？(true 或 false)
UndoPlayerQuitMessage: true

#Whether to prompt the message when the player Quits? (true or false)
#玩家退出时发送自定义退出提示？(true 或 false)
PlayerQuitMessageSwitch: true

#Server broadcast message when the player Quits (Player Quit Message)
#玩家退出服务器时全服广播的内容
PlayerQuitMessage: "&l&7(&c-&7) &r&a{name} &eQuit the server.&7[&a{online}&7/&6{max_online}&7]"

#----------==========<<<[UI form Setting]>>>==========----------

#Pop up the UI form when the player joins? (true or false)

#玩家加入时发送一个UI界面？(true 或 false)

PlayerJoinUIform: true



#Title text content above the UI form

#自定义UI界面的顶部标题

UIformTitle: "&l&6 Welcome"



#Text content in the UI form

#自定义UI界面的文字内容

UIformContent: "&a Hello {name}. {line}&b Welcome to this server. {line}&e I wish you a happy time!"



#The first button of the UI form displays the text

#自定义UI界面的第一个按钮文字

UIformbutton1: "&a Confirm"



#The second button of the UI form displays the text

#自定义UI界面的第二个按钮文字

UIformbutton2: "&c Cancel"



#Click the button to execute the command? (true or false)

#点击按钮执行命令？(true 或 false)

ButtonCommand: true



#Set the command to be executed when the player presses the first button

#设置玩家按下第一个按钮时执行的命令

UIformbutton1cmd: "give {name} 297 3"



#Set the command to be executed when the player presses the second button

#设置玩家按下第二个按钮时执行的命令

UIformbutton2cmd: "give {name} 297 1"

...
