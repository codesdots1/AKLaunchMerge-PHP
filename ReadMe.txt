https://recordit.co/e4MQIo1SiA

Step 1 - Install Xampp or Wampp server from browser
Step 2 - Move this folder to Xampp --> htdocs or Wampp Server
Step 3 - Hit http://localhost/aklaunch_merge_sit/code.php

Output:
The output of running the given code will show up entries [emails] which exists ONCE in EACH list. Below are the scenarios I have looked over:

1) If abc@gmail.com exists in 01st list as well as in 02nd list, the entry will be displayed.
2) If abc@gmail.com exists in 01st list but is not present in 02nd list, the entry will not be displayed.
3) If abc@gmail.com exists more than once in 01st list and only once in the 02nd list, the entry will not be displayed. [Vice-versa]